<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BelajarEksporModel;
use App\Models\KategoriBelajarEksporModel;
use App\Models\Member;
use App\Models\Sertifikat;
use App\Models\Produk;
use App\Models\Buyers;
use App\Models\KategoriVidioModel;
use App\Models\VidioTutorialModel;
use App\Models\Exwork;
use App\Models\FOB;
use App\Models\CFR;
use App\Models\CIF;
use App\Models\Satuan;
use CodeIgniter\HTTP\ResponseInterface;

class KomunitasEkspor extends BaseController
{
    public function index()
    {
        $model_member = new Member();

        $member = $model_member->findAll();
        $top4_member = $model_member
            ->orderBy('popular_point', 'DESC')
            ->limit(4)
            ->findAll();

        $data['member'] = $member;
        $data['top4_member'] = $top4_member;

        return view('beranda/index', $data);
    }

    public function belajar_ekspor($slug = null)
    {
        $belajarEksporModel = new BelajarEksporModel();
        $kategoriBelajarEksporModel = new KategoriBelajarEksporModel();

        // Mengambil semua kategori
        $data['kategori_belajar_ekspor'] = $kategoriBelajarEksporModel->findAll();

        if ($slug) {
            // Jika slug kategori dipilih, ambil data sesuai kategori
            $kategori = $kategoriBelajarEksporModel->where('slug', $slug)->first();
            if (!$kategori) {
                return redirect()->to('/')->with('error', 'Kategori tidak ditemukan');
            }
            // Mengambil data berdasarkan kategori
            $data['belajar_ekspor'] = $belajarEksporModel->getByCategory($kategori['id_kategori_belajar_ekspor']);

            // Mengirimkan data kategori yang dipilih ke view
            $data['active_category'] = $kategori['id_kategori_belajar_ekspor'];
        } else {
            // Jika tidak ada slug, tampilkan semua data
            $data['belajar_ekspor'] = $belajarEksporModel->getAllWithCategory();

            // Tidak ada kategori yang aktif
            $data['active_category'] = null;
        }

        return view('belajar-ekspor/belajar_ekspor', $data);
    }

    public function search_belajar_ekspor()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        // Instansiasi model yang diperlukan
        $belajarEksporModel = new BelajarEksporModel();
        $kategoriBelajarEksporModel = new KategoriBelajarEksporModel();

        // Mengambil semua kategori untuk ditampilkan di sidebar/filter
        $data['kategori_belajar_ekspor'] = $kategoriBelajarEksporModel->findAll();

        // Query pencarian: mencari berdasarkan judul, tags, atau deskripsi
        $hasilPencarian = $belajarEksporModel->like('judul_belajar_ekspor', $keyword)
            ->orLike('tags', $keyword)
            ->orLike('deskripsi_belajar_ekspor', $keyword)
            ->getAllWithCategory(); // Pastikan method ini mengembalikan data dengan kategori

        // Jika ada hasil pencarian
        if (count($hasilPencarian) > 0) {
            $data['hasilPencarian'] = $hasilPencarian;
        } else {
            $data['hasilPencarian'] = [];
        }

        // Kirimkan keyword pencarian untuk ditampilkan di view
        $data['keyword'] = $keyword;

        // Tidak ada kategori yang aktif di pencarian
        $data['active_category'] = null;

        // Render view hasil pencarian
        return view('belajar-ekspor/belajar_ekspor_search', $data);
    }

    public function kategori_belajar_ekspor($slug)
    {
        $belajarEksporModel = new BelajarEksporModel();
        $kategoriBelajarEksporModel = new KategoriBelajarEksporModel();

        // Mengambil kategori berdasarkan slug
        $kategori = $kategoriBelajarEksporModel->where('slug', $slug)->first();
        if (!$kategori) {
            // Jika kategori tidak ditemukan, redirect atau tampilkan error
            return redirect()->to('/')->with('error', 'Kategori tidak ditemukan');
        }

        // Mengambil data belajar ekspor yang terkait dengan kategori yang dipilih
        $data['belajar_ekspor'] = $belajarEksporModel->getByCategory($kategori['id_kategori_belajar_ekspor']);

        // Mengambil semua kategori untuk menu dropdown
        $data['kategori_belajar_ekspor'] = $kategoriBelajarEksporModel->findAll();

        // Mengirim data kategori yang dipilih untuk ditampilkan di view
        $data['active_category'] = $kategori['id_kategori_belajar_ekspor'];

        return view('belajar-ekspor/belajar_ekspor', $data);
    }

    public function belajar_ekspor_detail($slug)
    {
        $belajarEksporModel = new BelajarEksporModel();

        // Mengambil artikel berdasarkan slug
        $artikel = $belajarEksporModel->where('slug', $slug)->first();

        if (!$artikel) {
            // Jika artikel tidak ditemukan, redirect atau tampilkan pesan error
            return redirect()->to('/')->with('error', 'Artikel tidak ditemukan');
        }

        // Mengirim data artikel ke view
        $data['artikel'] = $artikel;

        $data['belajar_ekspor'] = $belajarEksporModel->where('slug !=', $slug)->orderBy('created_at', 'DESC')->limit(3)->findAll();

        return view('belajar-ekspor/belajar_ekspor_detail', $data);
    }

    public function pendaftaran()
    {
        return view('pendaftaran/pendaftaran');
    }

    public function video_tutorial($slug = null)
    {
        $vidioModel = new VidioTutorialModel();
        $kategoriModel = new KategoriVidioModel();

        // Mengambil semua kategori
        $kategori = $kategoriModel->findAll();

        if ($slug) {
            // Jika ada slug kategori, ambil video berdasarkan kategori
            $vidio = $vidioModel->getVideosByKategori($slug);
        } else {
            // Jika tidak ada kategori, ambil semua video tutorial
            $vidio = $vidioModel->getAllVideos();
        }

        // Mengirimkan data ke view
        $data['video_tutorial'] = $vidio;
        $data['kategori_vidio'] = $kategori;
        $data['selected_category'] = $slug;

        return view('video-tutorial/video_tutorial', $data);
    }

    public function video_selengkapnya($slug)
    {
        $vidioModel = new VidioTutorialModel();
        $kategoriModel = new KategoriVidioModel();

        // Ambil data kategori berdasarkan slug
        $kategori = $kategoriModel->where('slug', $slug)->first();

        // Jika kategori ditemukan, ambil video yang sesuai
        if ($kategori) {
            $videos = $vidioModel->getVideosByKategori($slug);
        } else {
            $videos = [];
        }

        // Mengirim data ke view
        $data = [
            'kategori' => $kategori,
            'video_tutorial' => $videos
        ];

        return view('video-tutorial/video_selengkapnya', $data);
    }

    public function video_tutorial_detail($slug)
    {
        // Inisialisasi model untuk video dan kategori
        $vidioModel = new VidioTutorialModel();
        $kategoriModel = new KategoriVidioModel();

        // Mengambil data video berdasarkan slug
        $video = $vidioModel->getVideoBySlug($slug);

        // Memastikan bahwa video ditemukan, jika tidak redirect atau tampilkan error
        if (!$video) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Video tidak ditemukan");
        }

        // Mengambil video terkait berdasarkan kategori video saat ini, dan pastikan tidak mengambil video yang sedang dilihat
        $related_videos = $vidioModel->getRelatedVideos($video['id_kategori_video'], $video['id_video']);

        // Mengambil informasi kategori video
        $kategori = $kategoriModel->find($video['id_kategori_video']);

        // Menyiapkan data untuk dikirimkan ke view
        $data = [
            'video' => $video,
            'related_videos' => $related_videos,
            'kategori' => $kategori
        ];

        // Mengembalikan view dengan data yang telah disiapkan
        return view('video-tutorial/video_tutorial_detail', $data);
    }


    public function registrasiMember()
    {
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email_member');
        $password = $this->request->getPost('password');
        $reveral = $this->request->getPost('referral');
        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $pic = $this->request->getPost('pic');
        $nomor_pic = $this->request->getPost('nomor_pic');

        // pesan Wa
        $pesan = "Pendaftaran Member Komunitas Ekspor Indonesia Baru:\n\n" .
            "Username: $username\n" .
            "Email: $email\n" .
            "Password: $password\n" .
            "Nama Perusahaan: $nama_perusahaan\n" .
            "Nama PIC: $pic\n" .
            "Nomor PIC: $nomor_pic\n" .
            ($reveral ? "Kode Reveral: $reveral\n" : "");

        // Nomor tujuan WA, Tambahkan Kode negeara seperi (+62) tanpa tanda +
        $nomor_wa = '62';
        // $nomor_wa = '6283153270334'; // Nomor Tio

        $whatsapp = "https://wa.me/$nomor_wa?text=" . urlencode($pesan);

        return redirect()->to($whatsapp);
    }

    // public function data_member()
    // {
    //     $model_member = new Member();

    //     // Set pagination
    //     $perPage = 12; // Number of members per page
    //     $page = $this->request->getVar('page') ?? 1; // Get the current page number

    //     // Fetch members with pagination
    //     $members = $model_member
    //         ->orderBy('popular_point', 'DESC')
    //         ->paginate($perPage);

    //     // Modify members to add slug
    //     foreach ($members as &$item) {
    //         $item['slug'] = url_title($item['username'], '-', true);
    //     }

    //     $data['member'] = $members;
    //     $data['pager'] = $model_member->pager; // Get the pager instance

    //     return view('data-member/index', $data);
    // }

    public function data_member_visitor()
    {
        $model_member = new Member();

        $top4_member = $model_member
            ->orderBy('popular_point', 'DESC')
            ->limit(4)
            ->findAll();

        $blur_member = $model_member
            ->orderBy('popular_point', 'DESC')
            ->limit(4, 4)
            ->findAll();

        $data['top4_member'] = $top4_member;
        $data['blur_member'] = $blur_member;

        return view('data-member/index', $data);
    }

    public function detail_member($slug)
    {
        $model_member = new Member();
        $model_sertifikat = new Sertifikat();
        $model_produk = new Produk();

        // Cari member berdasarkan username, karena slug dibuat dari username
        $member = $model_member->where('username', url_title($slug, '-', true))->first();

        // Jika member ditemukan
        if ($member) {
            // Iterasi setiap field dalam array member
            foreach ($member as $key => $value) {
                // Cek jika field kosong atau null
                if (empty($value)) {
                    $member[$key] = '-';
                }
            }
        } else {
            // Jika member tidak ditemukan, lemparkan 404
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Member tidak ditemukan: ' . $slug);
        }

        // Top 3 popular members
        $members = $model_member
            ->orderBy('popular_point', 'DESC')
            ->findAll(); // Tambahkan findAll() untuk mengambil data

        $top3_members = [];
        foreach ($members as $key => $item) {
            if ($item['id_member'] != $member['id_member']) {
                // Buat slug dari judul_artikel dan tanggal
                $item['slug'] = url_title($item['username'], '-', true);
                $top3_members[] = $item;
            }
        }

        $top3_members = array_slice($top3_members, 0, 3);

        $member_id = $member['id_member'];

        // Mengambil data sertifikat dan produk berdasarkan id_member
        $sertifikat = $model_sertifikat->where('id_member', $member_id)->findAll();
        $produk = $model_produk->where('id_member', $member_id)->findAll();

        // Kirimkan data ke view
        $data['member'] = $member;
        $data['members'] = $top3_members;
        $data['sertifikat'] = $sertifikat;
        $data['produk'] = $produk;

        return view('data-member/detail', $data);
    }

    public function data_buyers()
    {
        $model_buyers = new Buyers();

        $new4_buyers = $model_buyers
            ->orderBy('verif_date', 'DESC')
            ->limit(4)
            ->findAll();

        $buyers_lanjutan = $model_buyers
            ->orderBy('verif_date', 'DESC')
            ->limit(4, 4)
            ->findAll();

        $total_buyers = $model_buyers->countAllResults();

        $data['new4_buyers'] = $new4_buyers;
        $data['buyers_lanjutan'] = $buyers_lanjutan;
        $data['total_buyers'] = $total_buyers;

        return view('data-buyers/index', $data);
    }

    public function edit_profile()
    {
        return view('data-member/edit-profile');
    }

    public function index_kalkulator()
    {
        $model_exwork = new Exwork();
        $model_fob = new FOB();
        $model_cfr = new CFR();
        $model_cif = new CIF();
        $model_satuan = new Satuan();

        $exwork = $model_exwork->findAll();
        $fob = $model_fob->findAll();
        $cfr = $model_cfr->findAll();
        $cif = $model_cif->findAll();
        $satuan = $model_satuan->findAll();

        $data['exwork'] = $exwork;
        $data['fob'] = $fob;
        $data['cfr'] = $cfr;
        $data['cif'] = $cif;
        $data['satuan'] = $satuan;

        return view('kalkulator-ekspor/kalkulator_ekspor', $data);
    }

    public function ganti_satuan($id)
    {
        $model_satuan = new Satuan();

        // Mencari satuan berdasarkan ID
        $satuan = $model_satuan->find($id);

        // Jika satuan ditemukan, lakukan update
        if ($satuan) {
            // Mengambil input dari form
            $data = [
                'satuan' => $this->request->getPost('satuan'),
            ];

            // Melakukan update data pada model
            $model_satuan->update($id, $data);

            // Redirect setelah update berhasil
            return redirect()->to('/');
        } else {
            // Jika data tidak ditemukan, bisa diarahkan ke halaman error
            return redirect()->to('/')->with('error', 'Data satuan tidak ditemukan.');
        }
    }

    public function add_exwork()
    {
        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'komponenExwork.*' => 'required',  // Ensure each component is required
        ]);

        if (!$this->validate($validation->getRules())) {
            // If validation fails, redirect back with errors
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        // Get the array of komponenExwork
        $komponenExworkArray = $this->request->getPost('komponenExwork');

        $model_exwork = new Exwork();

        // Loop through the array and insert each komponenExwork into the database
        foreach ($komponenExworkArray as $komponenExwork) {
            $data = [
                'komponen_exwork' => esc($komponenExwork),  // Sanitize the input
            ];
            $model_exwork->insert($data);
        }

        return redirect()->to('/')->with('success', 'Komponen Exwork berhasil ditambahkan!');
    }

    public function delete_exwork($id)
    {
        $model_exwork = new Exwork();

        $model_exwork->delete($id);

        return redirect()->to('/');
    }

    public function add_fob()
    {
        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'komponenFOB.*' => 'required',  // Ensure each component is required
        ]);

        if (!$this->validate($validation->getRules())) {
            // If validation fails, redirect back with errors
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        // Get the array of komponenFOB
        $komponenFOBArray = $this->request->getPost('komponenFOB');

        $model_fob = new FOB();

        // Loop through the array and insert each komponenFOB into the database
        foreach ($komponenFOBArray as $komponenFOB) {
            $data = [
                'komponen_fob' => esc($komponenFOB),  // Sanitize the input
            ];
            $model_fob->insert($data);
        }

        return redirect()->to('/')->with('success', 'Komponen FOB berhasil ditambahkan!');
    }

    public function delete_fob($id)
    {
        $model_fob = new FOB();

        $model_fob->delete($id);

        return redirect()->to('/');
    }

    public function add_cfr()
    {
        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'komponenCFR.*' => 'required',  // Ensure each component is required
        ]);

        if (!$this->validate($validation->getRules())) {
            // If validation fails, redirect back with errors
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        // Get the array of komponenCFR
        $komponenCFRArray = $this->request->getPost('komponenCFR');

        $model_cfr = new CFR();

        // Loop through the array and insert each komponenCFR into the database
        foreach ($komponenCFRArray as $komponenCFR) {
            $data = [
                'komponen_cfr' => esc($komponenCFR),  // Sanitize the input
            ];
            $model_cfr->insert($data);
        }

        return redirect()->to('/')->with('success', 'Komponen CFR berhasil ditambahkan!');
    }

    public function delete_cfr($id)
    {
        $model_cfr = new CFR();

        $model_cfr->delete($id);

        return redirect()->to('/');
    }

    public function add_cif()
    {
        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'komponenCIF.*' => 'required',  // Ensure each component is required
        ]);

        if (!$this->validate($validation->getRules())) {
            // If validation fails, redirect back with errors
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        // Get the array of komponenCIF
        $komponenCIFArray = $this->request->getPost('komponenCIF');

        $model_cif = new CIF();

        // Loop through the array and insert each komponenCIF into the database
        foreach ($komponenCIFArray as $komponenCIF) {
            $data = [
                'komponen_cif' => esc($komponenCIF),  // Sanitize the input
            ];
            $model_cif->insert($data);
        }

        return redirect()->to('/')->with('success', 'Komponen CIF berhasil ditambahkan!');
    }

    public function delete_cif($id)
    {
        $model_cif = new CIF();

        $model_cif->delete($id);

        return redirect()->to('/');
    }

    public function pengumuman()
    {
        return view('pengumuman/pengumuman');
    }

    public function detail_pengumuman()
    {
        return view('pengumuman/detail-pengumuman');
    }
}

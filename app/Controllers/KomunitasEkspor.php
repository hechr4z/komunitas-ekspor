<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Stichoza\GoogleTranslate\GoogleTranslate;
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
use App\Models\MPM;
use App\Models\Slider;
use App\Models\WebProfile;
use App\Models\ManfaatJoin;
use App\Models\Pengumuman;
use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\ResponseInterface;

class KomunitasEkspor extends BaseController
{
    public function index()
    {
        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_slider = new Slider();
        $model_member = new Member();
        $model_manfaatjoin = new ManfaatJoin();

        $slider = $model_slider->findAll();
        $member = $model_member->findAll();
        $top4_member = $model_member
            ->orderBy('popular_point', 'DESC')
            ->limit(4)
            ->findAll();
        $manfaatjoin = $model_manfaatjoin->findAll();

        foreach ($member as &$item) {
            $item['slug'] = url_title($item['username'], '-', true);
        }

        $data['slider'] = $slider;
        $data['member'] = $member;
        $data['manfaatjoin'] = $manfaatjoin;
        $data['top4_member'] = $top4_member;

        return view('beranda/index', $data);
    }

    public function belajar_ekspor($slug = null)
    {
        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

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
        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

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
            ->orLike('judul_belajar_ekspor_en', $keyword)
            ->orLike('tags', $keyword)
            ->orLike('tags_en', $keyword)
            ->orLike('deskripsi_belajar_ekspor', $keyword)
            ->orLike('deskripsi_belajar_ekspor_en', $keyword)
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
        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $belajarEksporModel = new BelajarEksporModel();
        $kategoriBelajarEksporModel = new KategoriBelajarEksporModel();

        // Mengambil kategori berdasarkan slug
        $kategori = $kategoriBelajarEksporModel->where('slug', $slug)->orWhere('slug_en', $slug)->first();
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
        $lang = session()->get('lang') ?? 'id';

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $belajarEksporModel = new BelajarEksporModel();
        $kategoriModel = new KategoriBelajarEksporModel();

        // Mengambil artikel berdasarkan slug
        $artikel = $belajarEksporModel->where('slug', $slug)->orWhere('slug_en', $slug)->first();

        if (!$artikel) {
            // Jika artikel tidak ditemukan, redirect atau tampilkan pesan error
            return redirect()->to('/')->with('error', 'Artikel tidak ditemukan');
        }

        // Cek apakah slug sesuai dengan bahasa yang sedang aktif
        if (($lang === 'id' && $slug !== $artikel['slug']) || ($lang === 'en' && $slug !== $artikel['slug_en'])) {
            // Redirect ke URL slug yang benar sesuai bahasa
            $correctSlug = $lang === 'id' ? $artikel['slug'] : $artikel['slug_en'];
            $correctulr = $lang === 'id' ? 'belajar-ekspor' : 'export-learning';
            return redirect()->to("$lang/$correctulr/$correctSlug");
        }

        // Mengambil kategori artikel berdasarkan id_kategori
        $kategori = $kategoriModel->find($artikel['id_kategori_belajar_ekspor']);

        // Mengambil artikel terkait
        $related_artikel = $belajarEksporModel->where('slug !=', $slug)->orderBy('created_at', 'DESC')->limit(3)->findAll();

        // Mengirim data artikel, kategori, dan artikel terkait ke view
        $data = [
            'artikel' => $artikel,
            'kategori' => $kategori,
            'belajar_ekspor' => $related_artikel,
            'webprofile' => $webprofile,
            'lang' => $lang
        ];

        return view('belajar-ekspor/belajar_ekspor_detail', $data);
    }


    public function pendaftaran()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        return view('pendaftaran/pendaftaran', $data);
    }

    public function video_tutorial($slug = null)
    {
        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $vidioModel = new VidioTutorialModel();
        $kategoriModel = new KategoriVidioModel();

        // Mengambil semua kategori
        $kategori = $kategoriModel->findAll();

        $vidio = [];

        if ($slug) {
            // Jika ada slug kategori, ambil video berdasarkan kategori dan batasi hanya 3
            $vidio = $vidioModel->getLimitedVideosByKategori($slug, 3);
        } else {
            // Jika tidak ada kategori, ambil 3 video dari setiap kategori
            foreach ($kategori as $kat) {
                $vidio[$kat['nama_kategori_video']] = $vidioModel->getLimitedVideosByKategori($kat['slug'], 3);
            }
        }

        // Mengirimkan data ke view
        $data['video_tutorial'] = $vidio;
        $data['kategori_vidio'] = $kategori;
        $data['selected_category'] = $slug;

        return view('video-tutorial/video_tutorial', $data);
    }


    public function video_selengkapnya($slug)
    {
        $lang = session()->get('lang') ?? 'id';

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $vidioModel = new VidioTutorialModel();
        $kategoriModel = new KategoriVidioModel();

        // Ambil data kategori berdasarkan slug
        $kategori = $kategoriModel->where('slug', $slug)
            ->orWhere('slug_en', $slug)->first();


        // Jika kategori ditemukan, ambil video yang sesuai
        if ($kategori) {
            $videos = $vidioModel->getVideosByKategori($slug);
        } else {
            $videos = [];
        }

        // Mengirim data ke view
        $data = [
            'kategori' => $kategori,
            'video_tutorial' => $videos,
            'webprofile' => $webprofile,
            'lang' => $lang
        ];

        return view('video-tutorial/video_selengkapnya', $data);
    }

    public function video_tutorial_detail($slug)
    {
        $lang = session()->get('lang') ?? 'id';

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        // Inisialisasi model untuk video dan kategori
        $vidioModel = new VidioTutorialModel();
        $kategoriModel = new KategoriVidioModel();


        // Mengambil data video berdasarkan slug
        $video = $vidioModel->getVideoBySlug($slug);

        // Cek apakah slug sesuai dengan bahasa yang sedang aktif
        if (($lang === 'id' && $slug !== $video['slug']) || ($lang === 'en' && $slug !== $video['slug_en'])) {
            // Redirect ke URL slug yang benar sesuai bahasa
            $correctSlug = $lang === 'id' ? $video['slug'] : $video['slug_en'];
            $correctulr = $lang === 'id' ? 'tutorial-video' : 'video-tutorial';
            return redirect()->to("$lang/$correctulr/$correctSlug");
        }

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
            'kategori' => $kategori,
            'webprofile' => $webprofile,
            'lang' => $lang
        ];

        // Mengembalikan view dengan data yang telah disiapkan
        return view('video-tutorial/video_tutorial_detail', $data);
    }

    public function registrasiMember()
    {
        $userModel = new Member(); // Asumsikan UserModel digunakan untuk mengakses tabel pengguna

        // Ambil input dari form
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $referral = $this->request->getPost('referral');
        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $pic = $this->request->getPost('pic');
        $nomor_pic = $this->request->getPost('nomor_pic');

        // Cek apakah username sudah ada di database
        $existingUserByUsername = $userModel->where('username', $username)->first();
        if ($existingUserByUsername) {
            return redirect()->back()->withInput()->with('error', 'Username sudah digunakan. Silakan pilih username lain.');
        }

        // Cek apakah email sudah ada di database
        $existingUserByEmail = $userModel->where('email', $email)->first();
        if ($existingUserByEmail) {
            return redirect()->back()->withInput()->with('error', 'Email sudah digunakan. Silakan gunakan email lain.');
        }

        if ($referral && $referral == $username) {
            return redirect()->back()->withInput()->with('error', 'Kode referral tidak boleh sama dengan username.');
        }

        // Pesan untuk WhatsApp
        $pesan = "Pendaftaran Member Komunitas Ekspor Indonesia Baru:\n\n" .
            "Username: $username\n" .
            "Email: $email\n" .
            "Password: $password\n" .
            "Nama Perusahaan: $nama_perusahaan\n" .
            "Nama PIC: $pic\n" .
            "Nomor PIC: $nomor_pic\n" .
            ($referral ? "Kode Referral: $referral\n" : "");

        // Nomor tujuan WA
        $nomor_wa = '6283153270334'; // Ganti dengan nomor WA yang benar

        // Membuat URL WhatsApp dengan pesan
        $whatsapp = "https://wa.me/$nomor_wa?text=" . urlencode($pesan);

        // Redirect ke WhatsApp dengan pesan yang sudah dibuat
        return redirect()->to($whatsapp);
    }

    public function checkAvailability()
    {
        // Mengambil data dari request
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $referral = $this->request->getPost('referral');
        $userModel = new Member();

        // Cek apakah username ada
        if ($username) {
            $userExists = $userModel->where('username', $username)->first();
            if ($userExists) {
                return $this->response->setJSON(['status' => 'exists', 'field' => 'username']);
            } else {
                return $this->response->setJSON(['status' => 'available', 'field' => 'username']);
            }
        }

        // Cek apakah email ada
        if ($email) {
            $emailExists = $userModel->where('email', $email)->first();
            if ($emailExists) {
                return $this->response->setJSON(['status' => 'exists', 'field' => 'email']);
            } else {
                return $this->response->setJSON(['status' => 'available', 'field' => 'email']);
            }
        }

        // Cek apakah referral valid (harus ada di database)
        if ($referral) {
            $referralExists = $userModel->where('username', $referral)->first();  // Cek referral sebagai username di database
            if (!$referralExists) {
                return $this->response->setJSON(['status' => 'invalid', 'field' => 'referral', 'message' => 'Kode referral tidak valid']);
            } else {
                return $this->response->setJSON(['status' => 'valid', 'field' => 'referral']);
            }
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request']);
    }

    public function visitor_data_member()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

        $model_member = new Member();

        // Set pagination
        $perPage = 12; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        // Fetch members with pagination
        $members = $model_member
            ->orderBy('popular_point', 'DESC')
            ->paginate($perPage);

        // Modify members to add slug
        foreach ($members as &$item) {
            $item['slug'] = url_title($item['username'], '-', true);
        }

        $data['member'] = $members;
        $data['pager'] = $model_member->pager; // Get the pager instance

        return view('data-member/index', $data);
    }

    // public function data_member_visitor()
    // {
    //     $model_member = new Member();

    //     $top4_member = $model_member
    //         ->orderBy('popular_point', 'DESC')
    //         ->limit(4)
    //         ->findAll();

    //     $blur_member = $model_member
    //         ->orderBy('popular_point', 'DESC')
    //         ->limit(4, 4)
    //         ->findAll();

    //     $data['top4_member'] = $top4_member;
    //     $data['blur_member'] = $blur_member;

    //     return view('data-member/index', $data);
    // }

    public function detail_member($slug)
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

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

    public function member_data_member()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

        $model_member = new Member();

        // Set pagination
        $perPage = 12; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        // Fetch members with pagination
        $members = $model_member
            ->orderBy('popular_point', 'DESC')
            ->paginate($perPage);

        // Modify members to add slug
        foreach ($members as &$item) {
            $item['slug'] = url_title($item['username'], '-', true);
        }

        $data['member'] = $members;
        $data['pager'] = $model_member->pager; // Get the pager instance

        return view('member/data-member/index', $data);
    }

    public function member_detail_member($slug)
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

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

        return view('member/data-member/detail', $data);
    }

    public function data_buyers()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

        $model_buyers = new Buyers();

        // Set pagination
        $perPage = 10; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        $buyers = $model_buyers
            ->orderBy('verif_date', 'DESC')
            ->paginate($perPage);

        $data['buyers'] = $buyers;
        $data['pager'] = $model_buyers->pager;

        return view('data-buyers/index', $data);
    }

    public function search_buyers()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_buyers = new Buyers();

        // Set pagination
        $perPage = 10; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        // Query pencarian: mencari berdasarkan judul, tags, atau deskripsi
        $hasilPencarian = $model_buyers->like('nama_perusahaan', $keyword)
            ->orLike('hs_code', $keyword)
            ->orLike('negara_perusahaan', $keyword)
            ->paginate($perPage); // Pastikan method ini mengembalikan data dengan kategori

        // Jika ada hasil pencarian
        if (count($hasilPencarian) > 0) {
            $data['hasilPencarian'] = $hasilPencarian;
        } else {
            $data['hasilPencarian'] = [];
        }

        // Kirimkan keyword pencarian untuk ditampilkan di view
        $data['keyword'] = $keyword;
        $data['pager'] = $model_buyers->pager;

        return view('data-buyers/search', $data);
    }

    public function edit_profile()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_member = new Member();
        $model_produk = new Produk();

        $member = $model_member->where('id_member', $user_id)->first();
        $produk = $model_produk->where('id_member', $user_id)->findAll();

        $data['member'] = $member;
        $data['produk'] = $produk;

        return view('member/edit-profile', $data);
    }

    public function ubah_informasi_akun()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_member = new Member();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($email != null && $password == null) {
            $data = [
                'email' => $email,
            ];

            $model_member->update($user_id, $data);
        } elseif ($email == null && $password != null) {
            $data = [
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $model_member->update($user_id, $data);
        } elseif ($email != null && $password != null) {
            $data = [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $model_member->update($user_id, $data);
        }

        return redirect()->to('/edit-profile');
    }

    public function ubah_profil_perusahaan()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_member = new Member();

        $tr = new GoogleTranslate('en');

        $fields = [
            'nama_perusahaan',
            'tipe_bisnis',
            'deskripsi_perusahaan',
            'produk_utama',
            'tahun_dibentuk',
            'skala_bisnis',
            'kategori_produk',
            'pic',
            'pic_phone',
            'latitude',
            'longitude'
        ];

        // Initialize validation rules without individual error messages
        $validationRules = array_fill_keys($fields, [
            'rules' => 'required'
        ]);

        // Perform validation
        if (!$this->validate($validationRules)) {
            // Get all validation errors
            $errors = $this->validator->getErrors();

            // Count the number of missing fields
            $missingCount = count($errors);

            // Set the custom error message with the missing count
            $generalErrorMessage = "Ada $missingCount Input Yang Masih Belum Diisi!";

            // Redirect back with the input and only the general error message
            return redirect()->back()->withInput()->with('errors', ['general' => $generalErrorMessage]);
        }

        $data = [
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'tipe_bisnis' => $this->request->getPost('tipe_bisnis'),
            'tipe_bisnis_en' => $tr->translate($this->request->getPost('tipe_bisnis')),
            'deskripsi_perusahaan' => $this->request->getPost('deskripsi_perusahaan'),
            'deskripsi_perusahaan_en' => $tr->translate($this->request->getPost('deskripsi_perusahaan')),
            'produk_utama' => $this->request->getPost('produk_utama'),
            'produk_utama_en' => $tr->translate($this->request->getPost('produk_utama')),
            'tahun_dibentuk' => $this->request->getPost('tahun_dibentuk'),
            'skala_bisnis' => $this->request->getPost('skala_bisnis'),
            'skala_bisnis_en' => $tr->translate($this->request->getPost('skala_bisnis')),
            'kategori_produk' => $this->request->getPost('kategori_produk'),
            'kategori_produk_en' => $tr->translate($this->request->getPost('kategori_produk')),
            'pic' => $this->request->getPost('pic'),
            'pic_phone' => $this->request->getPost('pic_phone'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
        ];

        $model_member->update($user_id, $data);

        return redirect()->to('/edit-profile');
    }

    public function add_produk()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_produk = new Produk();

        $tr = new GoogleTranslate('en');

        $fields = [
            'nama_produk',
            'deskripsi_produk',
            'hs_code',
            'minimum_order_qty',
            'kapasitas_produksi_bln',
        ];

        // Set validation rules without `foto_produk` and apply only required rules
        $validationRules = array_fill_keys($fields, [
            'rules' => 'required'
        ]);

        // Validate other fields
        if (!$this->validate($validationRules)) {
            $errors = $this->validator->getErrors();
        } else {
            $errors = [];
        }

        // Separate check for `foto_produk`
        $fotoProduk = $this->request->getFile('foto_produk');
        if (!$fotoProduk || !$fotoProduk->isValid()) {
            $errors['foto_produk'] = "Foto produk harus diunggah!";
        }

        // Count errors and handle response if there are any missing inputs
        if (!empty($errors)) {
            $missingCount = count($errors);
            $generalErrorMessage = "Ada $missingCount Input Yang Masih Belum Diisi!";
            return redirect()->back()->withInput()->with('errors', ['general' => $generalErrorMessage]);
        }

        // Process and move `foto_produk` if uploaded
        $namaFile = null;
        if ($fotoProduk && $fotoProduk->isValid() && !$fotoProduk->hasMoved()) {
            $namaFile = uniqid() . '.' . $fotoProduk->getClientExtension();
            $fotoProduk->move(ROOTPATH . 'public/img', $namaFile);
        }

        // Prepare data for insertion
        $data = [
            'id_member' => $user_id,
            'foto_produk' => $namaFile,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'nama_produk_en' => $tr->translate($this->request->getPost('nama_produk')),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'deskripsi_produk_en' => $tr->translate($this->request->getPost('deskripsi_produk')),
            'hs_code' => $this->request->getPost('hs_code'),
            'minimum_order_qty' => $this->request->getPost('minimum_order_qty'),
            'kapasitas_produksi_bln' => $this->request->getPost('kapasitas_produksi_bln'),
        ];

        // Insert data into the database
        $model_produk->insert($data);

        // Redirect after successful insert
        return redirect()->to('/edit-profile');
    }

    public function delete_produk($id)
    {
        $model_produk = new Produk();

        $produk = $model_produk->find($id);

        if ($produk['foto_produk'] && file_exists(ROOTPATH . 'public/img/' . $produk['foto_produk'])) {
            unlink(ROOTPATH . 'public/img/' . $produk['foto_produk']);
        }

        $model_produk->delete($id);

        return redirect()->to('/edit-profile');
    }

    public function index_kalkulator()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

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
        $model_webprofile = new WebProfile();
        $model_pengumuman = new Pengumuman();

        $pengumuman = $model_pengumuman->findAll();
        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;
        $data['pengumuman'] = $pengumuman;

        return view('member/pengumuman/pengumuman', $data);
    }

    public function detail_pengumuman()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        return view('member/pengumuman/detail-pengumuman', $data);
    }

    public function mpm()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_mpm = new MPM();
        $mpm = $model_mpm->findAll();

        $bulanIndonesia = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        foreach ($mpm as &$item) {
            // Mengubah format tgl_kirim_email
            $tgl_kirim = date('d F Y', strtotime($item['tgl_kirim_email']));
            $bulanInggris_kirim = date('F', strtotime($item['tgl_kirim_email']));
            $item['tgl_kirim_email'] = str_replace($bulanInggris_kirim, $bulanIndonesia[$bulanInggris_kirim], $tgl_kirim);

            // Memeriksa jika update_terakhir bernilai null
            if (is_null($item['update_terakhir'])) {
                $item['update_terakhir'] = '';
            } else {
                // Mengubah format update_terakhir jika tidak null
                $tgl_update = date('d F Y', strtotime($item['update_terakhir']));
                $bulanInggris_update = date('F', strtotime($item['update_terakhir']));
                $item['update_terakhir'] = str_replace($bulanInggris_update, $bulanIndonesia[$bulanInggris_update], $tgl_update);
            }
        }

        // Cari tahun paling lama yang ada di database
        $oldest_year = $model_mpm
            ->select('YEAR(tgl_kirim_email) as tahun_kirim')
            ->orderBy('tahun_kirim', 'ASC') // Ambil yang terlama
            ->first(); // Hanya ambil satu record (tahun terlama)

        // Jika data ada, set tahun terlama dari database, jika tidak, default ke tahun sekarang
        $start_year = isset($oldest_year['tahun_kirim']) ? $oldest_year['tahun_kirim'] : date('Y');

        $current_year = date('Y'); // Tahun sekarang

        // Buat array tahun dari tahun terlama hingga tahun saat ini
        $years = [];
        for ($year = $start_year; $year <= $current_year; $year++) {
            $years[] = $year;
        }

        // Balik array agar tahun terbaru ada di atas
        $years = array_reverse($years);

        // // Ambil data dari database hanya untuk tahun-tahun yang ada
        // $mpm_data = $model_mpm
        //     ->select('YEAR(tgl_kirim_email) as tahun_kirim, COUNT(*) as jumlah') // Hitung jumlah data per tahun
        //     ->groupBy('tahun_kirim')
        //     ->orderBy('tahun_kirim', 'DESC')
        //     ->findAll();

        // // Buat array untuk memetakan data dari database berdasarkan tahun
        // $mpm_year = [];
        // foreach ($mpm_data as $data) {
        //     $mpm_year[$data['tahun_kirim']] = $data['jumlah']; // Simpan jumlah data per tahun
        // }

        $data['mpm'] = $mpm;
        $data['years'] = $years; // Semua tahun dari yang terlama sampai sekarang, dengan urutan terbaru di atas
        // $data['mpm_year'] = $mpm_year; // Data dari database

        return view('mpm/mpm', $data);
    }

    public function add_mpm()
    {
        $tgl_kirim_email = $this->request->getPost('tgl_kirim_email');

        $bulanIndonesia = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        $tgl = date('d F Y', strtotime($tgl_kirim_email));
        $bulanInggris = date('F', strtotime($tgl_kirim_email));
        $tgl_kirim_email = str_replace($bulanInggris, $bulanIndonesia[$bulanInggris], $tgl);

        $data = [
            'id_member' => 1,
            'tgl_kirim_email' => $this->request->getPost('tgl_kirim_email'),
            'update_terakhir' => NULL,
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'negara_perusahaan' => $this->request->getPost('negara_perusahaan'),
            'status_progres' => $this->request->getPost('status_progres'),
            'progres' => '1. Mengirim email pada tanggal ' . $tgl_kirim_email,
        ];

        $model_mpm = new MPM();
        $model_mpm->insert($data);

        return redirect()->to('/mpm');
    }

    public function edit_mpm()
    {
        $model_mpm = new MPM();

        $id_mpm = $this->request->getPost('id_mpm');

        $now = Time::now();

        $data = [
            'update_terakhir' => $now,
            'progres' => $this->request->getPost('progres'),
        ];

        $model_mpm->update($id_mpm, $data);

        return redirect()->to('/mpm');
    }

    public function getEmailsByDate($month, $year)
    {
        $model_mpm = new MPM();

        // Ambil jumlah email yang dikirim per tanggal dalam bulan dan tahun tertentu
        $result = $model_mpm
            ->select('DAY(tgl_kirim_email) as hari, COUNT(*) as jumlah_email')
            ->where('MONTH(tgl_kirim_email)', $month)
            ->where('YEAR(tgl_kirim_email)', $year)
            ->groupBy('hari')
            ->findAll();

        // Buat array dengan format [hari => jumlah_email]
        $emailData = [];
        foreach ($result as $row) {
            $emailData[$row['hari']] = $row['jumlah_email'];
        }

        return $this->response->setJSON($emailData);
    }

    public function login()
    {
        return view('login/login');
    }

    public function authenticate()
    {
        $session = session();
        $memberModel = new Member();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $memberModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'user_id' => $user['id_member'],
                    'username' => $user['username'],
                    'logged_in' => true
                ];
                $session->set($sessionData);
                return redirect()->to('/pengumuman');
            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function member_data_buyers()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_produk = new Produk();
        $model_buyers = new Buyers();

        $produk = $model_produk->where('id_member', $user_id)->findColumn('hs_code');

        // If there are hs_codes, find buyers with matching hs_codes
        $buyers = [];
        if ($produk) {
            $buyers = $model_buyers->whereIn('hs_code', $produk)->findAll();
        }

        // Prepare data to pass to the view
        $data['buyers'] = $buyers;

        return view('member/data-buyers/index', $data);
    }

    public function member_belajar_ekspor($slug = null)
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

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

        return view('member/belajar-ekspor/belajar_ekspor', $data);
    }

    public function member_search_belajar_ekspor()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

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
        return view('member/belajar-ekspor/belajar_ekspor_search', $data);
    }

    public function member_kategori_belajar_ekspor($slug)
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

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

        return view('member/belajar-ekspor/belajar_ekspor', $data);
    }

    public function member_belajar_ekspor_detail($slug)
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $belajarEksporModel = new BelajarEksporModel();
        $kategoriModel = new KategoriBelajarEksporModel();

        // Mengambil artikel berdasarkan slug
        $artikel = $belajarEksporModel->where('slug', $slug)->first();

        if (!$artikel) {
            // Jika artikel tidak ditemukan, redirect atau tampilkan pesan error
            return redirect()->to('/')->with('error', 'Artikel tidak ditemukan');
        }

        // Mengambil kategori artikel berdasarkan id_kategori
        $kategori = $kategoriModel->find($artikel['id_kategori_belajar_ekspor']);

        // Mengambil artikel terkait
        $related_artikel = $belajarEksporModel->where('slug !=', $slug)->orderBy('created_at', 'DESC')->limit(3)->findAll();

        // Mengirim data artikel, kategori, dan artikel terkait ke view
        $data = [
            'artikel' => $artikel,
            'kategori' => $kategori,
            'belajar_ekspor' => $related_artikel,
            'webprofile' => $webprofile,
        ];

        return view('member/belajar-ekspor/belajar_ekspor_detail', $data);
    }

    public function member_video_tutorial($slug = null)
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $vidioModel = new VidioTutorialModel();
        $kategoriModel = new KategoriVidioModel();

        // Mengambil semua kategori
        $kategori = $kategoriModel->findAll();

        $vidio = [];

        if ($slug) {
            // Jika ada slug kategori, ambil video berdasarkan kategori dan batasi hanya 3
            $vidio = $vidioModel->getLimitedVideosByKategori($slug, 3);
        } else {
            // Jika tidak ada kategori, ambil 3 video dari setiap kategori
            foreach ($kategori as $kat) {
                $vidio[$kat['nama_kategori_video']] = $vidioModel->getLimitedVideosByKategori($kat['slug'], 3);
            }
        }

        // Mengirimkan data ke view
        $data['video_tutorial'] = $vidio;
        $data['kategori_vidio'] = $kategori;
        $data['selected_category'] = $slug;

        return view('member/video-tutorial/video_tutorial', $data);
    }


    public function member_video_selengkapnya($slug)
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

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
            'video_tutorial' => $videos,
            'webprofile' => $webprofile,
        ];

        return view('member/video-tutorial/video_selengkapnya', $data);
    }

    public function member_video_tutorial_detail($slug)
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

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
            'kategori' => $kategori,
            'webprofile' => $webprofile,
        ];

        // Mengembalikan view dengan data yang telah disiapkan
        return view('member/video-tutorial/video_tutorial_detail', $data);
    }

    public function website_audit()
    {

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        return view('member/website-audit/website-audit', $data);
    }
}

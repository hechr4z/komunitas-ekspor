<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Seeds\KategoriBelajarEkspor;
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
use App\Models\WebsiteAudit;
use App\Models\Slider;
use App\Models\WebProfile;
use App\Models\ManfaatJoin;
use App\Models\Pengumuman;
use CodeIgniter\I18n\Time;
use DateTime;
use Exception;
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
        $member = $model_member->whereIn('role', ['member', 'premium'])->findAll();
        $top4_member = $model_member
            ->whereIn('role', ['member', 'premium'])
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

    public function freeindex()
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
        $member = $model_member->whereIn('role', ['member', 'premium'])->findAll();
        $top4_member = $model_member
            ->whereIn('role', ['member', 'premium'])
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

        return view('member/beranda/index', $data);
    }

    public function tentang_kami()
    {
        $lang = session()->get('lang') ?? 'id';
        $data['lang'] = $lang;

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        return view('tentang/index', $data);
    }

    public function premiumindex()
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
        $member = $model_member->whereIn('role', ['member', 'premium'])->findAll();
        $top4_member = $model_member
            ->whereIn('role', ['member', 'premium'])
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

        return view('premium/beranda/index', $data);
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

        foreach ($related_artikel as &$item) {
            $item['kategori'] = $kategoriModel->find($item['id_kategori_belajar_ekspor']);
        }
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

    public function video_tutorial_member($slug = null)
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

        // Cek apakah slug sesuai dengan bahasa yang sedang aktif
        if (($lang === 'id' && $slug !== $kategori['slug']) || ($lang === 'en' && $slug !== $kategori['slug_en'])) {
            // Redirect ke URL slug yang benar sesuai bahasa
            $correctSlug = $lang === 'id' ? $kategori['slug'] : $kategori['slug_en'];
            $correctulr = $lang === 'id' ? 'tutorial-video' : 'video-tutorial';
            $correctulr2 = $lang === 'id' ? 'kategori' : 'category';
            return redirect()->to("$lang/$correctulr/$correctulr2/$correctSlug");
        }

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

    public function daftarMemberPremium()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_member = new Member();

        $member = $model_member->where('id_member', $user_id)->first();

        $pesan = "Saya " . $member['username'] . ", Ingin Mendaftar Member Premium Komunitas Ekspor Indonesia!";

        $nomor_wa = '6283153270334';

        $whatsapp = "https://wa.me/$nomor_wa?text=" . urlencode($pesan);

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

    public function visitor_landing_page()
    {
        return view('landing-page/index');
    }

    public function data_member()
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
            ->whereIn('role', ['member', 'premium'])
            ->orderBy('popular_point', 'DESC')
            ->paginate($perPage);

        // Modify members to add slug
        foreach ($members as &$item) {
            $item['slug'] = url_title($item['username'], '-', true);
        }

        $data['member'] = $members;
        $data['pager'] = $model_member->pager; // Get the pager instance

        return view('premium/data-member/index', $data);
    }

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
        $member = $model_member->whereIn('role', ['member', 'premium'])->where('username', url_title($slug, '-', true))->first();

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
            ->whereIn('role', ['member', 'premium'])
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

        return view('premium/data-member/detail', $data);
    }

    // public function visitor_data_member()
    // {
    //     $model_webprofile = new WebProfile();

    //     $webprofile = $model_webprofile->findAll();

    //     $data['webprofile'] = $webprofile;

    //     $lang = session()->get('lang') ?? 'id';
    //     $data['lang'] = $lang;

    //     $model_member = new Member();

    //     // Set pagination
    //     $perPage = 12; // Number of members per page
    //     $page = $this->request->getVar('page') ?? 1; // Get the current page number

    //     // Fetch members with pagination
    //     $members = $model_member
    //         ->where('role', 'member')
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

    // public function detail_member($slug)
    // {
    //     $model_webprofile = new WebProfile();

    //     $webprofile = $model_webprofile->findAll();

    //     $data['webprofile'] = $webprofile;

    //     $lang = session()->get('lang') ?? 'id';
    //     $data['lang'] = $lang;

    //     $model_member = new Member();
    //     $model_sertifikat = new Sertifikat();
    //     $model_produk = new Produk();

    //     // Cari member berdasarkan username, karena slug dibuat dari username
    //     $member = $model_member->where('role', 'member')->where('username', url_title($slug, '-', true))->first();

    //     // Jika member ditemukan
    //     if ($member) {
    //         // Iterasi setiap field dalam array member
    //         foreach ($member as $key => $value) {
    //             // Cek jika field kosong atau null
    //             if (empty($value)) {
    //                 $member[$key] = '-';
    //             }
    //         }
    //     } else {
    //         // Jika member tidak ditemukan, lemparkan 404
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Member tidak ditemukan: ' . $slug);
    //     }

    //     // Top 3 popular members
    //     $members = $model_member
    //         ->where('role', 'member')
    //         ->orderBy('popular_point', 'DESC')
    //         ->findAll(); // Tambahkan findAll() untuk mengambil data

    //     $top3_members = [];
    //     foreach ($members as $key => $item) {
    //         if ($item['id_member'] != $member['id_member']) {
    //             // Buat slug dari judul_artikel dan tanggal
    //             $item['slug'] = url_title($item['username'], '-', true);
    //             $top3_members[] = $item;
    //         }
    //     }

    //     $top3_members = array_slice($top3_members, 0, 3);

    //     $member_id = $member['id_member'];

    //     // Mengambil data sertifikat dan produk berdasarkan id_member
    //     $sertifikat = $model_sertifikat->where('id_member', $member_id)->findAll();
    //     $produk = $model_produk->where('id_member', $member_id)->findAll();

    //     // Kirimkan data ke view
    //     $data['member'] = $member;
    //     $data['members'] = $top3_members;
    //     $data['sertifikat'] = $sertifikat;
    //     $data['produk'] = $produk;

    //     return view('data-member/detail', $data);
    // }

    // public function member_data_member()
    // {
    //     $model_webprofile = new WebProfile();

    //     $webprofile = $model_webprofile->findAll();

    //     $data['webprofile'] = $webprofile;

    //     $lang = session()->get('lang') ?? 'id';
    //     $data['lang'] = $lang;

    //     $model_member = new Member();

    //     // Set pagination
    //     $perPage = 12; // Number of members per page
    //     $page = $this->request->getVar('page') ?? 1; // Get the current page number

    //     // Fetch members with pagination
    //     $members = $model_member
    //         ->where('role', 'member')
    //         ->orderBy('popular_point', 'DESC')
    //         ->paginate($perPage);

    //     // Modify members to add slug
    //     foreach ($members as &$item) {
    //         $item['slug'] = url_title($item['username'], '-', true);
    //     }

    //     $data['member'] = $members;
    //     $data['pager'] = $model_member->pager; // Get the pager instance

    //     return view('member/data-member/index', $data);
    // }

    // public function member_detail_member($slug)
    // {
    //     $model_webprofile = new WebProfile();

    //     $webprofile = $model_webprofile->findAll();

    //     $data['webprofile'] = $webprofile;

    //     $lang = session()->get('lang') ?? 'id';
    //     $data['lang'] = $lang;

    //     $model_member = new Member();
    //     $model_sertifikat = new Sertifikat();
    //     $model_produk = new Produk();

    //     // Cari member berdasarkan username, karena slug dibuat dari username
    //     $member = $model_member->where('role', 'member')->where('username', url_title($slug, '-', true))->first();

    //     // Jika member ditemukan
    //     if ($member) {
    //         // Iterasi setiap field dalam array member
    //         foreach ($member as $key => $value) {
    //             // Cek jika field kosong atau null
    //             if (empty($value)) {
    //                 $member[$key] = '-';
    //             }
    //         }
    //     } else {
    //         // Jika member tidak ditemukan, lemparkan 404
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Member tidak ditemukan: ' . $slug);
    //     }

    //     // Top 3 popular members
    //     $members = $model_member
    //         ->where('role', 'member')
    //         ->orderBy('popular_point', 'DESC')
    //         ->findAll(); // Tambahkan findAll() untuk mengambil data

    //     $top3_members = [];
    //     foreach ($members as $key => $item) {
    //         if ($item['id_member'] != $member['id_member']) {
    //             // Buat slug dari judul_artikel dan tanggal
    //             $item['slug'] = url_title($item['username'], '-', true);
    //             $top3_members[] = $item;
    //         }
    //     }

    //     $top3_members = array_slice($top3_members, 0, 3);

    //     $member_id = $member['id_member'];

    //     // Mengambil data sertifikat dan produk berdasarkan id_member
    //     $sertifikat = $model_sertifikat->where('id_member', $member_id)->findAll();
    //     $produk = $model_produk->where('id_member', $member_id)->findAll();

    //     // Kirimkan data ke view
    //     $data['member'] = $member;
    //     $data['members'] = $top3_members;
    //     $data['sertifikat'] = $sertifikat;
    //     $data['produk'] = $produk;

    //     return view('member/data-member/detail', $data);
    // }

    // public function data_buyers()
    // {
    //     $model_webprofile = new WebProfile();

    //     $webprofile = $model_webprofile->findAll();

    //     $data['webprofile'] = $webprofile;

    //     $lang = session()->get('lang') ?? 'id';
    //     $data['lang'] = $lang;

    //     $model_buyers = new Buyers();

    //     // Set pagination
    //     $perPage = 10; // Number of members per page
    //     $page = $this->request->getVar('page') ?? 1; // Get the current page number

    //     $buyers = $model_buyers
    //         ->orderBy('verif_date', 'DESC')
    //         ->paginate($perPage);

    //     $data['buyers'] = $buyers;
    //     $data['pager'] = $model_buyers->pager;
    //     $data['page'] = $page;
    //     $data['perPage'] = $perPage;

    //     return view('data-buyers/index', $data);
    // }

    // public function search_buyers()
    // {
    //     $model_webprofile = new WebProfile();

    //     $webprofile = $model_webprofile->findAll();

    //     $data['webprofile'] = $webprofile;

    //     $lang = session()->get('lang') ?? 'id';
    //     $data['lang'] = $lang;

    //     helper('text');

    //     // Ambil keyword dari query string
    //     $keyword = $this->request->getGet('keyword');

    //     $model_buyers = new Buyers();

    //     // Set pagination
    //     $perPage = 10; // Number of members per page
    //     $page = $this->request->getVar('page') ?? 1; // Get the current page number

    //     // Query pencarian: mencari berdasarkan judul, tags, atau deskripsi
    //     $hasilPencarian = $model_buyers->like('nama_perusahaan', $keyword)
    //         ->orLike('hs_code', $keyword)
    //         ->orLike('negara_perusahaan', $keyword)
    //         ->paginate($perPage); // Pastikan method ini mengembalikan data dengan kategori

    //     // Jika ada hasil pencarian
    //     if (count($hasilPencarian) > 0) {
    //         $data['hasilPencarian'] = $hasilPencarian;
    //     } else {
    //         $data['hasilPencarian'] = [];
    //     }

    //     // Kirimkan keyword pencarian untuk ditampilkan di view
    //     $data['keyword'] = $keyword;
    //     $data['pager'] = $model_buyers->pager;
    //     $data['page'] = $page;
    //     $data['perPage'] = $perPage;

    //     return view('data-buyers/search', $data);
    // }

    public function data_buyers()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_produk = new Produk();
        $model_buyers = new Buyers();

        $produk = $model_produk->where('id_member', $user_id)->findColumn('hs_code');

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // If there are hs_codes, find buyers with matching hs_codes
        $buyers = [];
        if ($produk) {
            $buyers = $model_buyers->whereIn('hs_code', $produk)->paginate($perPage);
        }

        // Prepare data to pass to the view
        $data['buyers'] = $buyers;
        $data['pager'] = $model_buyers->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('premium/data-buyers/index', $data);
    }

    public function edit_profile()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_member = new Member();
        $model_sertifikat = new Sertifikat();
        $model_produk = new Produk();

        $member = $model_member->where('id_member', $user_id)->first();
        $sertifikat = $model_sertifikat->where('id_member', $user_id)->findAll();
        $produk = $model_produk->where('id_member', $user_id)->findAll();

        $data['member'] = $member;
        $data['sertifikat'] = $sertifikat;
        $data['produk'] = $produk;

        return view('member/edit-profile', $data);
    }

    public function updateFotoProfil()
    {
        // Ambil ID user dari session
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $memberModel = new Member();

        // Ambil data pengguna dari database
        $member = $memberModel->find($userId);

        if (!$member) {
            return redirect()->back()->with('error', 'Data member tidak ditemukan.');
        }

        // Validasi file yang diupload
        if (!$this->validate([
            'foto_profil' => [
                'rules' => 'uploaded[foto_profil]|is_image[foto_profil]|mime_in[foto_profil,image/jpg,image/jpeg,image/png]|max_size[foto_profil,8048]',
                'errors' => [
                    'uploaded' => 'Silakan pilih file untuk diupload.',
                    'is_image' => 'File yang diupload harus berupa gambar.',
                    'mime_in' => 'Gambar harus berformat jpg, jpeg, atau png.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Ambil file yang diupload
        $file = $this->request->getFile('foto_profil');
        $newFileName = $file->getRandomName(); // Nama file baru

        if ($file->isValid() && !$file->hasMoved()) {
            $file->move('img', $newFileName); // Simpan file baru
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload file.');
        }

        // Siapkan data untuk diupdate
        $data = ['foto_profil' => $newFileName];

        // Perbarui data di database
        $updateStatus = $memberModel->update($userId, $data);

        if ($updateStatus) {
            // Hapus file lama jika ada
            $oldFileName = $member['foto_profil'];
            if ($oldFileName && file_exists('img/' . $oldFileName)) {
                unlink('img/' . $oldFileName);
            }

            return redirect()->to('/edit-profile')->with('success', 'Foto profil berhasil diperbarui.');
        } else {
            // Jika update gagal, hapus file baru
            if (file_exists('img/' . $newFileName)) {
                unlink('img/' . $newFileName);
            }

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
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

    public function add_sertifikat()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_sertifikat = new Sertifikat();

        $fileSertifikat = $this->request->getFile('sertifikat');
        $namaFile = null;
        if ($fileSertifikat && $fileSertifikat->isValid() && !$fileSertifikat->hasMoved()) {
            $namaFile = uniqid() . '.' . $fileSertifikat->getClientExtension();
            $fileSertifikat->move(ROOTPATH . 'public/certificate', $namaFile);
        }

        $data = [
            'id_member' => $user_id,
            'sertifikat' => $namaFile,
        ];

        // Insert data into the database
        $model_sertifikat->insert($data);

        // Redirect after successful insert
        return redirect()->to('/edit-profile');
    }

    public function delete_sertifikat($id)
    {
        $session = session();
        $user_id = $session->get('user_id'); // Ambil user_id dari sesi

        $model_sertifikat = new Sertifikat();
        $sertifikat = $model_sertifikat->find($id);

        // Cek apakah sertifikat ada dan apakah sertifikat milik user yang sedang login
        if ($sertifikat && $sertifikat['id_member'] == $user_id) {
            // Hapus file foto sertifikat jika ada
            if ($sertifikat['sertifikat'] && file_exists(ROOTPATH . 'public/certificate/' . $sertifikat['sertifikat'])) {
                unlink(ROOTPATH . 'public/certificate/' . $sertifikat['sertifikat']);
            }

            // Hapus sertifikat dari database
            $model_sertifikat->delete($id);

            return redirect()->to('/edit-profile')->with('success', 'Sertifikat berhasil dihapus');
        } else {
            // Redirect dengan pesan error jika sertifikat tidak ditemukan atau tidak dimiliki user yang sedang login
            return redirect()->to('/edit-profile')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus sertifikat ini']);
        }
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
        $session = session();
        $user_id = $session->get('user_id'); // Ambil user_id dari sesi

        $model_produk = new Produk();
        $produk = $model_produk->find($id);

        // Cek apakah produk ada dan apakah produk milik user yang sedang login
        if ($produk && $produk['id_member'] == $user_id) {
            // Hapus file foto produk jika ada
            if ($produk['foto_produk'] && file_exists(ROOTPATH . 'public/img/' . $produk['foto_produk'])) {
                unlink(ROOTPATH . 'public/img/' . $produk['foto_produk']);
            }

            // Hapus produk dari database
            $model_produk->delete($id);

            return redirect()->to('/edit-profile')->with('success', 'Produk berhasil dihapus');
        } else {
            // Redirect dengan pesan error jika produk tidak ditemukan atau tidak dimiliki user yang sedang login
            return redirect()->to('/edit-profile')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
    }

    public function edit_profile_premium()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_member = new Member();
        $model_sertifikat = new Sertifikat();
        $model_produk = new Produk();

        $member = $model_member->where('id_member', $user_id)->first();
        $sertifikat = $model_sertifikat->where('id_member', $user_id)->findAll();
        $produk = $model_produk->where('id_member', $user_id)->findAll();
        $jumlahProduk = $model_produk->where('id_member', $user_id)->countAll();

        $data['member'] = $member;
        $data['sertifikat'] = $sertifikat;
        $data['produk'] = $produk;
        $data['jumlahProduk'] = $jumlahProduk;

        return view('premium/edit-profile', $data);
    }

    public function updateFotoProfil_premium()
    {
        // Ambil ID user dari session
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $memberModel = new Member();

        // Ambil data pengguna dari database
        $member = $memberModel->find($userId);

        if (!$member) {
            return redirect()->back()->with('error', 'Data member tidak ditemukan.');
        }

        // Validasi file yang diupload
        if (!$this->validate([
            'foto_profil' => [
                'rules' => 'uploaded[foto_profil]|is_image[foto_profil]|mime_in[foto_profil,image/jpg,image/jpeg,image/png]|max_size[foto_profil,8048]',
                'errors' => [
                    'uploaded' => 'Silakan pilih file untuk diupload.',
                    'is_image' => 'File yang diupload harus berupa gambar.',
                    'mime_in' => 'Gambar harus berformat jpg, jpeg, atau png.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Ambil file yang diupload
        $file = $this->request->getFile('foto_profil');
        $newFileName = $file->getRandomName(); // Nama file baru

        if ($file->isValid() && !$file->hasMoved()) {
            $file->move('img', $newFileName); // Simpan file baru
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload file.');
        }

        // Siapkan data untuk diupdate
        $data = ['foto_profil' => $newFileName];

        // Perbarui data di database
        $updateStatus = $memberModel->update($userId, $data);

        if ($updateStatus) {
            // Hapus file lama jika ada
            $oldFileName = $member['foto_profil'];
            if ($oldFileName && file_exists('img/' . $oldFileName)) {
                unlink('img/' . $oldFileName);
            }

            return redirect()->to('/edit-profile-premium')->with('success', 'Foto profil berhasil diperbarui.');
        } else {
            // Jika update gagal, hapus file baru
            if (file_exists('img/' . $newFileName)) {
                unlink('img/' . $newFileName);
            }

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function ubah_informasi_akun_premium()
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

        return redirect()->to('/edit-profile-premium');
    }

    public function ubah_profil_perusahaan_premium()
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

        return redirect()->to('/edit-profile-premium');
    }

    public function add_sertifikat_premium()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_sertifikat = new Sertifikat();

        $fileSertifikat = $this->request->getFile('sertifikat');
        $namaFile = null;
        if ($fileSertifikat && $fileSertifikat->isValid() && !$fileSertifikat->hasMoved()) {
            $namaFile = uniqid() . '.' . $fileSertifikat->getClientExtension();
            $fileSertifikat->move(ROOTPATH . 'public/certificate', $namaFile);
        }

        $data = [
            'id_member' => $user_id,
            'sertifikat' => $namaFile,
        ];

        // Insert data into the database
        $model_sertifikat->insert($data);

        // Redirect after successful insert
        return redirect()->to('/edit-profile-premium');
    }

    public function delete_sertifikat_premium($id)
    {
        $session = session();
        $user_id = $session->get('user_id'); // Ambil user_id dari sesi

        $model_sertifikat = new Sertifikat();
        $sertifikat = $model_sertifikat->find($id);

        // Cek apakah sertifikat ada dan apakah sertifikat milik user yang sedang login
        if ($sertifikat && $sertifikat['id_member'] == $user_id) {
            // Hapus file foto sertifikat jika ada
            if ($sertifikat['sertifikat'] && file_exists(ROOTPATH . 'public/certificate/' . $sertifikat['sertifikat'])) {
                unlink(ROOTPATH . 'public/certificate/' . $sertifikat['sertifikat']);
            }

            // Hapus sertifikat dari database
            $model_sertifikat->delete($id);

            return redirect()->to('/edit-profile-premium')->with('success', 'Sertifikat berhasil dihapus');
        } else {
            // Redirect dengan pesan error jika sertifikat tidak ditemukan atau tidak dimiliki user yang sedang login
            return redirect()->to('/edit-profile-premium')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus sertifikat ini']);
        }
    }

    public function add_produk_premium()
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
        return redirect()->to('/edit-profile-premium');
    }

    public function delete_produk_premium($id)
    {
        $session = session();
        $user_id = $session->get('user_id'); // Ambil user_id dari sesi

        $model_produk = new Produk();
        $produk = $model_produk->find($id);

        // Cek apakah produk ada dan apakah produk milik user yang sedang login
        if ($produk && $produk['id_member'] == $user_id) {
            // Hapus file foto produk jika ada
            if ($produk['foto_produk'] && file_exists(ROOTPATH . 'public/img/' . $produk['foto_produk'])) {
                unlink(ROOTPATH . 'public/img/' . $produk['foto_produk']);
            }

            // Hapus produk dari database
            $model_produk->delete($id);

            return redirect()->to('/edit-profile-premium')->with('success', 'Produk berhasil dihapus');
        } else {
            // Redirect dengan pesan error jika produk tidak ditemukan atau tidak dimiliki user yang sedang login
            return redirect()->to('/edit-profile-premium')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
    }

    public function index_kalkulator()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_exwork = new Exwork();
        $model_fob = new FOB();
        $model_cfr = new CFR();
        $model_cif = new CIF();
        $model_satuan = new Satuan();

        $exwork = $model_exwork->where('id_member', $user_id)->findAll();
        $fob = $model_fob->where('id_member', $user_id)->findAll();
        $cfr = $model_cfr->where('id_member', $user_id)->findAll();
        $cif = $model_cif->where('id_member', $user_id)->findAll();
        $satuan = $model_satuan->where('id_member', $user_id)->findAll();

        $data['exwork'] = $exwork;
        $data['fob'] = $fob;
        $data['cfr'] = $cfr;
        $data['cif'] = $cif;
        $data['satuan'] = $satuan;

        return view('member/kalkulator-ekspor/kalkulator_ekspor', $data);
    }

    public function ganti_satuan($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_satuan = new Satuan();

        // Mencari satuan berdasarkan ID
        $satuan = $model_satuan->find($id);

        // Jika satuan ditemukan, lakukan update
        if ($satuan) {
            // Mengambil input dari form
            $data = [
                'id_member' => $user_id,
                'satuan' => $this->request->getPost('satuan'),
            ];

            // Melakukan update data pada model
            $model_satuan->update($id, $data);

            // Redirect setelah update berhasil
            return redirect()->to('/kalkulator-ekspor');
        } else {
            // Jika data tidak ditemukan, bisa diarahkan ke halaman error
            return redirect()->to('/kalkulator-ekspor')->with('error', 'Data satuan tidak ditemukan.');
        }
    }

    public function add_exwork()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
                'id_member' => $user_id,
                'komponen_exwork' => esc($komponenExwork),  // Sanitize the input
            ];
            $model_exwork->insert($data);
        }

        return redirect()->to('/kalkulator-ekspor')->with('success', 'Komponen Exwork berhasil ditambahkan!');
    }

    public function delete_exwork($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_exwork = new Exwork();

        $exwork = $model_exwork->find($id);

        if ($exwork && $exwork['id_member'] == $user_id) {
            $model_exwork->delete($id);
            return redirect()->to('/kalkulator-ekspor')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->to('/kalkulator-ekspor')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
    }

    public function add_fob()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
                'id_member' => $user_id,
                'komponen_fob' => esc($komponenFOB),  // Sanitize the input
            ];
            $model_fob->insert($data);
        }

        return redirect()->to('/kalkulator-ekspor')->with('success', 'Komponen FOB berhasil ditambahkan!');
    }

    public function delete_fob($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_fob = new FOB();

        $fob = $model_fob->find($id);

        if ($fob && $fob['id_member'] == $user_id) {
            $model_fob->delete($id);
            return redirect()->to('/kalkulator-ekspor')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->to('/kalkulator-ekspor')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
    }

    public function add_cfr()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
                'id_member' => $user_id,
                'komponen_cfr' => esc($komponenCFR),  // Sanitize the input
            ];
            $model_cfr->insert($data);
        }

        return redirect()->to('/kalkulator-ekspor')->with('success', 'Komponen CFR berhasil ditambahkan!');
    }

    public function delete_cfr($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_cfr = new CFR();

        $cfr = $model_cfr->find($id);

        if ($cfr && $cfr['id_member'] == $user_id) {
            $model_cfr->delete($id);
            return redirect()->to('/kalkulator-ekspor')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->to('/kalkulator-ekspor')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
    }

    public function add_cif()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
                'id_member' => $user_id,
                'komponen_cif' => esc($komponenCIF),  // Sanitize the input
            ];
            $model_cif->insert($data);
        }

        return redirect()->to('/kalkulator-ekspor')->with('success', 'Komponen CIF berhasil ditambahkan!');
    }

    public function delete_cif($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_cif = new CIF();

        $cif = $model_cif->find($id);

        if ($cif && $cif['id_member'] == $user_id) {
            $model_cif->delete($id);
            return redirect()->to('/kalkulator-ekspor')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->to('/kalkulator-ekspor')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
    }

    public function index_kalkulator_premium()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_exwork = new Exwork();
        $model_fob = new FOB();
        $model_cfr = new CFR();
        $model_cif = new CIF();
        $model_satuan = new Satuan();

        $exwork = $model_exwork->where('id_member', $user_id)->findAll();
        $fob = $model_fob->where('id_member', $user_id)->findAll();
        $cfr = $model_cfr->where('id_member', $user_id)->findAll();
        $cif = $model_cif->where('id_member', $user_id)->findAll();
        $satuan = $model_satuan->where('id_member', $user_id)->findAll();

        $data['exwork'] = $exwork;
        $data['fob'] = $fob;
        $data['cfr'] = $cfr;
        $data['cif'] = $cif;
        $data['satuan'] = $satuan;

        return view('premium/kalkulator-ekspor/kalkulator_ekspor', $data);
    }

    public function ganti_satuan_premium($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_satuan = new Satuan();

        // Mencari satuan berdasarkan ID
        $satuan = $model_satuan->find($id);

        // Jika satuan ditemukan, lakukan update
        if ($satuan) {
            // Mengambil input dari form
            $data = [
                'id_member' => $user_id,
                'satuan' => $this->request->getPost('satuan'),
            ];

            // Melakukan update data pada model
            $model_satuan->update($id, $data);

            // Redirect setelah update berhasil
            return redirect()->to('/kalkulator-ekspor-premium');
        } else {
            // Jika data tidak ditemukan, bisa diarahkan ke halaman error
            return redirect()->to('/kalkulator-ekspor-premium')->with('error', 'Data satuan tidak ditemukan.');
        }
    }

    public function add_exwork_premium()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
                'id_member' => $user_id,
                'komponen_exwork' => esc($komponenExwork),  // Sanitize the input
            ];
            $model_exwork->insert($data);
        }

        return redirect()->to('/kalkulator-ekspor-premium')->with('success', 'Komponen Exwork berhasil ditambahkan!');
    }

    public function delete_exwork_premium($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_exwork = new Exwork();

        $exwork = $model_exwork->find($id);

        if ($exwork && $exwork['id_member'] == $user_id) {
            $model_exwork->delete($id);
            return redirect()->to('/kalkulator-ekspor-premium')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->to('/kalkulator-ekspor-premium')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
    }

    public function add_fob_premium()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
                'id_member' => $user_id,
                'komponen_fob' => esc($komponenFOB),  // Sanitize the input
            ];
            $model_fob->insert($data);
        }

        return redirect()->to('/kalkulator-ekspor-premium')->with('success', 'Komponen FOB berhasil ditambahkan!');
    }

    public function delete_fob_premium($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_fob = new FOB();

        $fob = $model_fob->find($id);

        if ($fob && $fob['id_member'] == $user_id) {
            $model_fob->delete($id);
            return redirect()->to('/kalkulator-ekspor-premium')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->to('/kalkulator-ekspor-premium')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
    }

    public function add_cfr_premium()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
                'id_member' => $user_id,
                'komponen_cfr' => esc($komponenCFR),  // Sanitize the input
            ];
            $model_cfr->insert($data);
        }

        return redirect()->to('/kalkulator-ekspor-premium')->with('success', 'Komponen CFR berhasil ditambahkan!');
    }

    public function delete_cfr_premium($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_cfr = new CFR();

        $cfr = $model_cfr->find($id);

        if ($cfr && $cfr['id_member'] == $user_id) {
            $model_cfr->delete($id);
            return redirect()->to('/kalkulator-ekspor-premium')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->to('/kalkulator-ekspor-premium')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
    }

    public function add_cif_premium()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
                'id_member' => $user_id,
                'komponen_cif' => esc($komponenCIF),  // Sanitize the input
            ];
            $model_cif->insert($data);
        }

        return redirect()->to('/kalkulator-ekspor-premium')->with('success', 'Komponen CIF berhasil ditambahkan!');
    }

    public function delete_cif_premium($id)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_cif = new CIF();

        $cif = $model_cif->find($id);

        if ($cif && $cif['id_member'] == $user_id) {
            $model_cif->delete($id);
            return redirect()->to('/kalkulator-ekspor-premium')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->to('/kalkulator-ekspor-premium')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus produk ini']);
        }
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

    public function pengumuman_premium()
    {
        $model_webprofile = new WebProfile();
        $model_pengumuman = new Pengumuman();

        $pengumuman = $model_pengumuman->findAll();
        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;
        $data['pengumuman'] = $pengumuman;

        return view('premium/pengumuman/pengumuman', $data);
    }

    public function detail_pengumuman($slug = null)
    {
        $model_webprofile = new WebProfile();
        $model_pengumuman = new Pengumuman();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;
        $data['pengumuman'] = $model_pengumuman->where('slug', $slug)->first();
        // Mendapatkan pengumuman lainnya, selain yang sedang dibuka
        $data['pengumuman_lainnya'] = $model_pengumuman->where('slug !=', $slug)->findAll(3); // Limit untuk 3 pengumuman lainnya

        return view('member/pengumuman/detail-pengumuman', $data);
    }

    public function detail_pengumuman_premium($slug = null)
    {
        $model_webprofile = new WebProfile();
        $model_pengumuman = new Pengumuman();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;
        $data['pengumuman'] = $model_pengumuman->where('slug', $slug)->first();
        // Mendapatkan pengumuman lainnya, selain yang sedang dibuka
        $data['pengumuman_lainnya'] = $model_pengumuman->where('slug !=', $slug)->findAll(3); // Limit untuk 3 pengumuman lainnya

        return view('premium/pengumuman/detail-pengumuman', $data);
    }

    public function mpm()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_mpm = new MPM();

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

        // Set pagination
        $perPage = 10; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        $mpmtable = $model_mpm->where('id_member', $user_id)->paginate($perPage);

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

        foreach ($mpmtable as &$item) {
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

        $data['mpmtable'] = $mpmtable;
        $data['pager'] = $model_mpm->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;
        $data['years'] = $years; // Semua tahun dari yang terlama sampai sekarang, dengan urutan terbaru di atas
        // $data['mpm_year'] = $mpm_year; // Data dari database

        return view('member/mpm/mpm', $data);
    }

    public function add_mpm()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
            'id_member' => $user_id,
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

        // Ambil ID MPM yang akan diedit
        $id_mpm = $this->request->getPost('id_mpm');

        // Ambil ID user yang sedang login
        $session = session();
        $user_id = $session->get('user_id');  // Sesuaikan dengan session yang kamu pakai

        // Cari data MPM berdasarkan ID MPM
        $mpm = $model_mpm->find($id_mpm);

        // Pastikan data ditemukan
        if (!$mpm) {
            return redirect()->to('/mpm')->withInput()->with('errors', ['MPM tidak ditemukan.']);
        }

        // Cek apakah user yang sedang login adalah pemilik MPM tersebut
        if ($mpm['id_member'] != $user_id) {
            // Jika ID user yang sedang login tidak sama dengan id_member MPM, larang akses
            return redirect()->to('/mpm')->withInput()->with('errors', ['Anda tidak memiliki izin untuk mengedit MPM ini.']);
        }

        // Jika lolos pengecekan, lanjutkan untuk mengupdate MPM
        $now = Time::now();
        $data = [
            'update_terakhir' => $now,
            'progres' => $this->request->getPost('progres'),
        ];

        $model_mpm->update($id_mpm, $data);

        return redirect()->to('/mpm')->with('success', 'MPM telah berhasil diperbarui.');
    }

    public function getEmailsByDate($month, $year)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_mpm = new MPM();

        // Ambil jumlah email yang dikirim per tanggal dalam bulan dan tahun tertentu
        $result = $model_mpm
            ->select('DAY(tgl_kirim_email) as hari, COUNT(*) as jumlah_email')
            ->where('id_member', $user_id)
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

    public function mpm_premium()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $model_mpm = new MPM();

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

        // Set pagination
        $perPage = 10; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        $mpmtable = $model_mpm->where('id_member', $user_id)->paginate($perPage);

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

        foreach ($mpmtable as &$item) {
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

        $data['mpmtable'] = $mpmtable;
        $data['pager'] = $model_mpm->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;
        $data['years'] = $years; // Semua tahun dari yang terlama sampai sekarang, dengan urutan terbaru di atas
        // $data['mpm_year'] = $mpm_year; // Data dari database

        return view('premium/mpm/mpm', $data);
    }

    public function add_mpm_premium()
    {
        $session = session();
        $user_id = $session->get('user_id');

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
            'id_member' => $user_id,
            'tgl_kirim_email' => $this->request->getPost('tgl_kirim_email'),
            'update_terakhir' => NULL,
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'negara_perusahaan' => $this->request->getPost('negara_perusahaan'),
            'status_progres' => $this->request->getPost('status_progres'),
            'progres' => '1. Mengirim email pada tanggal ' . $tgl_kirim_email,
        ];

        $model_mpm = new MPM();
        $model_mpm->insert($data);

        return redirect()->to('/mpm-premium');
    }

    public function edit_mpm_premium()
    {
        $model_mpm = new MPM();

        // Ambil ID MPM yang akan diedit
        $id_mpm = $this->request->getPost('id_mpm');

        // Ambil ID user yang sedang login
        $session = session();
        $user_id = $session->get('user_id');  // Sesuaikan dengan session yang kamu pakai

        // Cari data MPM berdasarkan ID MPM
        $mpm = $model_mpm->find($id_mpm);

        // Pastikan data ditemukan
        if (!$mpm) {
            return redirect()->to('/mpm-premium')->withInput()->with('errors', ['MPM tidak ditemukan.']);
        }

        // Cek apakah user yang sedang login adalah pemilik MPM tersebut
        if ($mpm['id_member'] != $user_id) {
            // Jika ID user yang sedang login tidak sama dengan id_member MPM, larang akses
            return redirect()->to('/mpm-premium')->withInput()->with('errors', ['Anda tidak memiliki izin untuk mengedit MPM ini.']);
        }

        // Jika lolos pengecekan, lanjutkan untuk mengupdate MPM
        $now = Time::now();
        $data = [
            'update_terakhir' => $now,
            'progres' => $this->request->getPost('progres'),
        ];

        $model_mpm->update($id_mpm, $data);

        return redirect()->to('/mpm-premium')->with('success', 'MPM telah berhasil diperbarui.');
    }

    public function getEmailsByDate_premium($month, $year)
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_mpm = new MPM();

        // Ambil jumlah email yang dikirim per tanggal dalam bulan dan tahun tertentu
        $result = $model_mpm
            ->select('DAY(tgl_kirim_email) as hari, COUNT(*) as jumlah_email')
            ->where('id_member', $user_id)
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

        // Look for the user by username
        $user = $memberModel->where('username', $username)->first();

        // Check if user exists
        if ($user) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Prepare session data
                $sessionData = [
                    'user_id' => $user['id_member'],
                    'username' => $user['username'],
                    'role' => $user['role'],  // Store role in session
                    'logged_in' => true
                ];
                $session->set($sessionData);

                // Check if the user is an admin
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin-dashboard');  // Redirect to admin dashboard
                } else if ($user['role'] === 'member') {
                    return redirect()->to('/beranda');  // Redirect to regular user page
                } else if ($user['role'] === 'premium') {
                    return redirect()->to('/beranda-premium');  // Redirect to regular user page
                }
            } else {
                // Password incorrect
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->back();
            }
        } else {
            // Username not found
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

    // public function member_data_buyers()
    // {
    //     $session = session();
    //     $user_id = $session->get('user_id');

    //     $model_webprofile = new WebProfile();

    //     $webprofile = $model_webprofile->findAll();

    //     $data['webprofile'] = $webprofile;

    //     $model_produk = new Produk();
    //     $model_buyers = new Buyers();

    //     $produk = $model_produk->where('id_member', $user_id)->findColumn('hs_code');

    //     $perPage = 10;
    //     $page = $this->request->getVar('page') ?? 1;

    //     // If there are hs_codes, find buyers with matching hs_codes
    //     $buyers = [];
    //     if ($produk) {
    //         $buyers = $model_buyers->whereIn('hs_code', $produk)->paginate($perPage);
    //     }

    //     // Prepare data to pass to the view
    //     $data['buyers'] = $buyers;
    //     $data['pager'] = $model_buyers->pager;
    //     $data['page'] = $page;
    //     $data['perPage'] = $perPage;

    //     return view('member/data-buyers/index', $data);
    // }

    public function member_belajar_ekspor($slug = null)
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $belajarEksporModel = new BelajarEksporModel();

        // Query untuk mendapatkan data
        $belajarEkspor = $belajarEksporModel->getFreeCategory();

        $data['belajar_ekspor'] = $belajarEkspor;

        return view('member/belajar-ekspor/belajar_ekspor', $data);
    }

    public function premium_belajar_ekspor($slug = null)
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

        return view('premium/belajar-ekspor/belajar_ekspor', $data);
    }

    public function premium_search_belajar_ekspor()
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
        return view('premium/belajar-ekspor/belajar_ekspor_search', $data);
    }

    public function premium_kategori_belajar_ekspor($slug)
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

        return view('premium/belajar-ekspor/belajar_ekspor', $data);
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
        $related_artikel = $belajarEksporModel->getRelatedFreeCategory($slug);

        // Mengirim data artikel, kategori, dan artikel terkait ke view
        $data = [
            'artikel' => $artikel,
            'kategori' => $kategori,
            'belajar_ekspor' => $related_artikel,
            'webprofile' => $webprofile,
        ];

        return view('member/belajar-ekspor/belajar_ekspor_detail', $data);
    }

    public function premium_belajar_ekspor_detail($slug)
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

        return view('premium/belajar-ekspor/belajar_ekspor_detail', $data);
    }

    public function premium_video_tutorial($slug = null)
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

        return view('premium/video-tutorial/video_tutorial', $data);
    }

    public function member_video_tutorial($slug = null)
    {
        $model_webprofile = new WebProfile();
        $vidioModel = new VidioTutorialModel();
        $kategoriModel = new KategoriVidioModel();

        // Mengambil data profil web
        $webprofile = $model_webprofile->findAll();

        // Mengambil semua kategori
        $kategori = $kategoriModel->findAll();

        // Mengambil 3 video terlama
        $video = $vidioModel
            ->orderBy('created_at', 'ASC') // Urutkan berdasarkan tanggal pembuatan (terlama)
            ->limit(3)                     // Batasi hanya 3 data
            ->getAllVideos();

        // Menyiapkan data untuk dikirimkan ke view
        $data = [
            'webprofile' => $webprofile,
            'video_tutorial' => $video, // Hanya 3 video terlama
            'kategori_vidio' => $kategori,
            'selected_category' => $slug,
        ];

        return view('member/video-tutorial/video_tutorial', $data);
    }

    public function premium_video_selengkapnya($slug)
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

        return view('premium/video-tutorial/video_selengkapnya', $data);
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

        // Mengambil video terkait berdasarkan kategori video saat ini
        // Urutkan berdasarkan tanggal pembuatan terlama dan tidak termasuk video yang sedang dilihat
        $related_videos = $vidioModel
            ->where('id_video !=', $video['id_video'])
            ->orderBy('created_at', 'ASC')
            ->limit(2)
            ->findAll();

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

    public function premium_video_tutorial_detail($slug)
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

        // Mengambil video terkait berdasarkan kategori video saat ini
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
        return view('premium/video-tutorial/video_tutorial_detail', $data);
    }

    public function website_audit()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        $session = session();
        $user_id = $session->get('user_id');

        $model_webaudit = new WebsiteAudit();

        $webaudit = $model_webaudit->where('id_member', $user_id)->first();

        $data['webaudit'] = $webaudit;

        return view('premium/website-audit/website-audit', $data);
    }

    public function add_website_audit()
    {
        $session = session();
        $user_id = $session->get('user_id');

        $model_webaudit = new WebsiteAudit();

        $data = [
            'id_member' => $user_id,
            'link_website' => $this->request->getPost('link_website'),
        ];

        $model_webaudit->insert($data);

        return redirect()->to('/website-audit');
    }

    public function delete_website_audit($id)
    {
        $session = session();
        $user_id = $session->get('user_id'); // Ambil user_id dari sesi

        $model_webaudit = new WebsiteAudit();
        $webaudit = $model_webaudit->find($id);

        if ($webaudit && $webaudit['id_member'] == $user_id) {
            $model_webaudit->delete($id);
            return redirect()->to('/website-audit')->with('success', 'Website Audit berhasil dihapus');
        } else {
            return redirect()->to('/website-audit')->withInput()->with('errors', ['Anda tidak memiliki izin untuk menghapus website audit ini']);
        }
    }

    public function admin_dashboard()
    {
        $model_belajarekspor = new BelajarEksporModel();
        $model_buyers = new Buyers();
        $model_cfr = new CFR();
        $model_cif = new CIF();
        $model_exwork = new Exwork();
        $model_fob = new FOB();
        $model_kategoribelajarekspor = new KategoriBelajarEksporModel;
        $model_kategorivideo = new KategoriVidioModel();
        $model_manfaatjoin = new ManfaatJoin();
        $model_member = new Member();
        $model_mpm = new MPM();
        $model_pengumuman = new Pengumuman();
        $model_produk = new Produk();
        $model_satuan = new Satuan();
        $model_sertifikat = new Sertifikat();
        $model_slider = new Slider();
        $model_videotutorial = new VidioTutorialModel();
        $model_webprofile = new WebProfile();
        $model_websiteaudit = new WebsiteAudit();

        $belajarekspor = $model_belajarekspor->countAll();
        $buyers = $model_buyers->countAll();
        $cfr = $model_cfr->countAll();
        $cif = $model_cif->countAll();
        $exwork = $model_exwork->countAll();
        $fob = $model_fob->countAll();
        $kategoribelajarekspor = $model_kategoribelajarekspor->countAll();
        $kategorivideo = $model_kategorivideo->countAll();
        $manfaatjoin = $model_manfaatjoin->countAll();
        $member = $model_member->whereIn('role', ['member', 'premium'])->countAllResults();
        $mpm = $model_mpm->countAll();
        $pengumuman = $model_pengumuman->countAll();
        $produk = $model_produk->countAll();
        $satuan = $model_satuan->countAll();
        $sertifikat = $model_sertifikat->countAll();
        $slider = $model_slider->countAll();
        $videotutorial = $model_videotutorial->countAll();
        $webprofile = $model_webprofile->countAll();
        $websiteaudit = $model_websiteaudit->countAll();

        $data['belajarekspor'] = $belajarekspor;
        $data['buyers'] = $buyers;
        $data['cfr'] = $cfr;
        $data['cif'] = $cif;
        $data['exwork'] = $exwork;
        $data['fob'] = $fob;
        $data['kategoribelajarekspor'] = $kategoribelajarekspor;
        $data['kategorivideo'] = $kategorivideo;
        $data['manfaatjoin'] = $manfaatjoin;
        $data['member'] = $member;
        $data['mpm'] = $mpm;
        $data['pengumuman'] = $pengumuman;
        $data['produk'] = $produk;
        $data['satuan'] = $satuan;
        $data['sertifikat'] = $sertifikat;
        $data['slider'] = $slider;
        $data['videotutorial'] = $videotutorial;
        $data['webprofile'] = $webprofile;
        $data['websiteaudit'] = $websiteaudit;

        return view('admin/dashboard/index', $data);
    }

    public function admin_member()
    {
        $model_member = new Member();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        $member = $model_member
            ->whereIn('role', ['member', 'premium'])
            ->orderBy('tanggal_verifikasi', 'DESC')
            ->paginate($perPage);

        $data['member'] = $member;
        $data['pager'] = $model_member->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/member/index', $data);
    }

    public function admin_search_member()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_member = new Member();

        // Set pagination
        $perPage = 10; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        // Query pencarian: mencari berdasarkan judul, tags, atau deskripsi
        $hasilPencarian = $model_member
            ->whereIn('role', ['member', 'premium'])
            ->groupStart()
            ->like('role', $keyword)
            ->orLike('username', $keyword)
            ->orLike('kode_referral', $keyword)
            ->orLike('popular_point', $keyword)
            ->orLike('nama_perusahaan', $keyword)
            ->orLike('deskripsi_perusahaan', $keyword)
            ->orLike('tipe_bisnis', $keyword)
            ->orLike('produk_utama', $keyword)
            ->orLike('tahun_dibentuk', $keyword)
            ->orLike('skala_bisnis', $keyword)
            ->orLike('email', $keyword)
            ->orLike('pic', $keyword)
            ->orLike('pic_phone', $keyword)
            ->orLike('kategori_produk', $keyword)
            ->orLike('latitude', $keyword)
            ->orLike('longitude', $keyword)
            ->groupEnd()
            ->orderBy('tanggal_verifikasi', 'DESC')
            ->paginate($perPage); // Pastikan method ini mengembalikan data dengan kategori

        // Jika ada hasil pencarian
        if (count($hasilPencarian) > 0) {
            $data['hasilPencarian'] = $hasilPencarian;
        } else {
            $data['hasilPencarian'] = [];
        }

        // Kirimkan keyword pencarian untuk ditampilkan di view
        $data['keyword'] = $keyword;
        $data['pager'] = $model_member->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/member/search', $data);
    }

    public function admin_add_member()
    {
        return view('admin/member/add');
    }

    public function admin_create_member()
    {
        $model_member = new Member();
        $model_satuan = new Satuan();

        $tr = new GoogleTranslate('en');

        $now = Time::now();

        $password = $this->request->getPost('password');

        $fotoProfil = $this->request->getFile('foto_profil');

        $namaFile = null;
        if ($fotoProfil && $fotoProfil->isValid() && !$fotoProfil->hasMoved()) {
            $namaFile = uniqid() . '.' . $fotoProfil->getClientExtension();
            $fotoProfil->move(ROOTPATH . 'public/img', $namaFile);
        }

        $data = [
            'role' => $this->request->getPost('role'),
            'username' => $this->request->getPost('username_referral'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'foto_profil' => $namaFile,
            'kode_referral' => $this->request->getPost('username_referral'),
            'popular_point' => 0,
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'deskripsi_perusahaan' => $this->request->getPost('deskripsi_perusahaan'),
            'deskripsi_perusahaan_en' => $tr->translate($this->request->getPost('deskripsi_perusahaan')),
            'tipe_bisnis' => $this->request->getPost('tipe_bisnis'),
            'tipe_bisnis_en' => $tr->translate($this->request->getPost('tipe_bisnis')),
            'produk_utama' => $this->request->getPost('produk_utama'),
            'produk_utama_en' => $tr->translate($this->request->getPost('produk_utama')),
            'tahun_dibentuk' => $this->request->getPost('tahun_dibentuk'),
            'skala_bisnis' => $this->request->getPost('skala_bisnis'),
            'skala_bisnis_en' => $tr->translate($this->request->getPost('skala_bisnis')),
            'email' => $this->request->getPost('email'),
            'pic' => $this->request->getPost('pic'),
            'pic_phone' => $this->request->getPost('pic_phone'),
            'tanggal_verifikasi' => $now,
            'kategori_produk' => $this->request->getPost('kategori_produk'),
            'kategori_produk_en' => $tr->translate($this->request->getPost('kategori_produk')),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
        ];

        $model_member->insert($data);
        $id_member = $model_member->insertID();

        $data1 = [
            'id_member' => $id_member,
            'satuan' => 'pcs',
        ];

        $model_satuan->insert($data1);

        return redirect()->to('/admin-member');
    }

    public function admin_edit_member($id)
    {
        $model_member = new Member();

        $member = $model_member->whereIn('role', ['member', 'premium'])->find($id);

        $data['member'] = $member;

        return view('admin/member/edit', $data);
    }

    public function admin_update_member($id)
    {
        $model_member = new Member();
        $member = $model_member->find($id);
        $tr = new GoogleTranslate('en');
        $password = $this->request->getPost('password');
        $fotoProfil = $this->request->getFile('foto_profil');
        $data = []; // Initialize data array

        // Check if the password is null or provided
        if ($password == null) {
            if ($fotoProfil->isValid() && !$fotoProfil->hasMoved()) {
                // Set new file name
                $namaFile = uniqid() . '.' . $fotoProfil->getClientExtension();

                // Remove old file if exists
                if ($member['foto_profil'] && file_exists(ROOTPATH . 'public/img/' . $member['foto_profil'])) {
                    unlink(ROOTPATH . 'public/img/' . $member['foto_profil']);
                }

                // Move new file and update data array
                $fotoProfil->move(ROOTPATH . 'public/img/', $namaFile);
                $data['foto_profil'] = $namaFile;
            } else {
                // Keep existing file if new file is invalid
                $data['foto_profil'] = $member['foto_profil'];
            }
        } else {
            // Update password if provided
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Populate the remaining fields for data array
        $data = array_merge($data, [
            'role' => $this->request->getPost('role'),
            'username' => $this->request->getPost('username_referral'),
            'kode_referral' => $this->request->getPost('username_referral'),
            'popular_point' => $this->request->getPost('popular_point'),
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'deskripsi_perusahaan' => $this->request->getPost('deskripsi_perusahaan'),
            'deskripsi_perusahaan_en' => $tr->translate($this->request->getPost('deskripsi_perusahaan')),
            'tipe_bisnis' => $this->request->getPost('tipe_bisnis'),
            'tipe_bisnis_en' => $tr->translate($this->request->getPost('tipe_bisnis')),
            'produk_utama' => $this->request->getPost('produk_utama'),
            'produk_utama_en' => $tr->translate($this->request->getPost('produk_utama')),
            'tahun_dibentuk' => $this->request->getPost('tahun_dibentuk'),
            'skala_bisnis' => $this->request->getPost('skala_bisnis'),
            'skala_bisnis_en' => $tr->translate($this->request->getPost('skala_bisnis')),
            'email' => $this->request->getPost('email'),
            'pic' => $this->request->getPost('pic'),
            'pic_phone' => $this->request->getPost('pic_phone'),
            'kategori_produk' => $this->request->getPost('kategori_produk'),
            'kategori_produk_en' => $tr->translate($this->request->getPost('kategori_produk')),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
        ]);

        // Perform update operation
        $model_member->update($id, $data);

        return redirect()->to('/admin-member');
    }

    public function admin_delete_member($id)
    {
        $model_member = new Member();

        $member = $model_member->whereIn('role', ['member', 'premium'])->find($id);

        if ($member['foto_profil'] && file_exists(ROOTPATH . 'public/img/' . $member['foto_profil'])) {
            unlink(ROOTPATH . 'public/img/' . $member['foto_profil']);
        }

        $model_member->delete($id);

        return redirect()->to('/admin-member');
    }

    public function admin_buyers()
    {
        $model_buyers = new Buyers();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        $buyers = $model_buyers
            ->orderBy('verif_date', 'DESC')
            ->paginate($perPage);

        $data['buyers'] = $buyers;
        $data['pager'] = $model_buyers->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/buyers/index', $data);
    }

    public function admin_search_buyers()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_buyers = new Buyers();

        // Set pagination
        $perPage = 10; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        // Query pencarian: mencari berdasarkan judul, tags, atau deskripsi
        $hasilPencarian = $model_buyers->like('nama_perusahaan', $keyword)
            ->orLike('email_perusahaan', $keyword)
            ->orLike('website_perusahaan', $keyword)
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
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/buyers/search', $data);
    }

    public function admin_add_buyers()
    {
        return view('admin/buyers/add');
    }

    public function admin_create_buyers()
    {
        $model_buyers = new Buyers();

        $now = Time::now();

        $data = [
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'email_perusahaan' => $this->request->getPost('email_perusahaan'),
            'website_perusahaan' => $this->request->getPost('website_perusahaan'),
            'hs_code' => $this->request->getPost('hs_code'),
            'negara_perusahaan' => $this->request->getPost('negara_perusahaan'),
            'verif_date' => $now,
        ];

        $model_buyers->insert($data);

        return redirect()->to('/admin-buyers');
    }

    public function admin_edit_buyers($id)
    {
        $model_buyers = new Buyers();

        $buyers = $model_buyers->find($id);

        $data['buyers'] = $buyers;

        return view('admin/buyers/edit', $data);
    }

    public function admin_update_buyers($id)
    {
        $model_buyers = new Buyers();

        $data = [
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'email_perusahaan' => $this->request->getPost('email_perusahaan'),
            'website_perusahaan' => $this->request->getPost('website_perusahaan'),
            'hs_code' => $this->request->getPost('hs_code'),
            'negara_perusahaan' => $this->request->getPost('negara_perusahaan'),
        ];

        $model_buyers->update($id, $data);

        return redirect()->to('/admin-buyers');
    }

    public function admin_delete_buyers($id)
    {
        $model_buyers = new Buyers();

        $model_buyers->delete($id);

        return redirect()->to('/admin-buyers');
    }

    // Admin Produk
    public function admin_produk()
    {
        $model_produk = new Produk();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query with join to get `username` from `member` table
        $produk = $model_produk
            ->select('produk.*, member.username AS username_member')
            ->join('member', 'member.id_member = produk.id_member', 'left')
            ->paginate($perPage);

        $data['produk'] = $produk;
        $data['pager'] = $model_produk->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/produk/index', $data);
    }

    public function admin_search_produk()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_produk = new Produk();

        // Set pagination
        $perPage = 10; // Jumlah item per halaman
        $page = $this->request->getVar('page') ?? 1; // Mendapatkan halaman saat ini

        // Query pencarian dengan join ke tabel `member` untuk mendapatkan `username`
        $hasilPencarian = $model_produk
            ->select('produk.*, member.username AS username_member')
            ->join('member', 'member.id_member = produk.id_member', 'left')
            ->groupStart() // Memulai grup kondisi
            ->like('produk.nama_produk', $keyword)
            ->orLike('produk.deskripsi_produk', $keyword)
            ->orLike('produk.hs_code', $keyword)
            ->orLike('produk.minimum_order_qty', $keyword)
            ->orLike('produk.kapasitas_produksi_bln', $keyword)
            ->orLike('member.username', $keyword) // Pencarian di `username` dari `member`
            ->groupEnd() // Mengakhiri grup kondisi
            ->paginate($perPage);

        // Jika ada hasil pencarian
        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;
        $data['pager'] = $model_produk->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/produk/search', $data);
    }

    public function admin_add_produk()
    {
        $model_member = new Member();

        $member = $model_member->whereIn('role', ['member', 'premium'])->select('id_member, username')->findAll();

        $data['member'] = $member;

        return view('admin/produk/add', $data);
    }

    public function admin_create_produk()
    {
        $model_produk = new Produk();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->whereIn('role', ['member', 'premium'])->first();

        if (!$memberData) {
            return redirect()->to('/admin-produk')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $tr = new GoogleTranslate('en');

        $fotoProduk = $this->request->getFile('foto_produk');

        $namaFile = null;
        if ($fotoProduk && $fotoProduk->isValid() && !$fotoProduk->hasMoved()) {
            $namaFile = uniqid() . '.' . $fotoProduk->getClientExtension();
            $fotoProduk->move(ROOTPATH . 'public/img', $namaFile);
        }

        $data = [
            'id_member' => $id_member,
            'foto_produk' => $namaFile,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'nama_produk_en' => $tr->translate($this->request->getPost('nama_produk')),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'deskripsi_produk_en' => $tr->translate($this->request->getPost('deskripsi_produk')),
            'hs_code' => $this->request->getPost('hs_code'),
            'minimum_order_qty' => $this->request->getPost('minimum_order_qty'),
            'kapasitas_produksi_bln' => $this->request->getPost('kapasitas_produksi_bln'),
        ];

        $model_produk->insert($data);

        return redirect()->to('/admin-produk');
    }

    public function admin_edit_produk($id)
    {
        $model_produk = new Produk();
        $model_member = new Member();

        $produk = $model_produk->find($id);

        $member = $model_member->whereIn('role', ['member', 'premium'])->select('id_member, username')->findAll();

        $data['produk'] = $produk;
        $data['member'] = $member;

        return view('admin/produk/edit', $data);
    }

    public function admin_update_produk($id)
    {
        $model_produk = new Produk();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->whereIn('role', ['member', 'premium'])->first();

        if (!$memberData) {
            return redirect()->to('/admin-produk')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $produk = $model_produk->find($id);

        $tr = new GoogleTranslate('en');

        $fotoProduk = $this->request->getFile('foto_produk');

        if ($fotoProduk->isValid() && !$fotoProduk->hasMoved()) {
            // Set new file name
            $namaFile = uniqid() . '.' . $fotoProduk->getClientExtension();

            // Remove old file if exists
            if ($produk['foto_produk'] && file_exists(ROOTPATH . 'public/img/' . $produk['foto_produk'])) {
                unlink(ROOTPATH . 'public/img/' . $produk['foto_produk']);
            }

            // Move new file and update data array
            $fotoProduk->move(ROOTPATH . 'public/img/', $namaFile);
            $data['foto_produk'] = $namaFile;
        } else {
            // Keep existing file if new file is invalid
            $data['foto_produk'] = $produk['foto_produk'];
        }

        $data = array_merge($data, [
            'id_member' => $id_member,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'nama_produk_en' => $tr->translate($this->request->getPost('nama_produk')),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'deskripsi_produk_en' => $tr->translate($this->request->getPost('deskripsi_produk')),
            'hs_code' => $this->request->getPost('hs_code'),
            'minimum_order_qty' => $this->request->getPost('minimum_order_qty'),
            'kapasitas_produksi_bln' => $this->request->getPost('kapasitas_produksi_bln'),
        ]);

        $model_produk->update($id, $data);

        return redirect()->to('/admin-produk');
    }

    public function admin_delete_produk($id)
    {
        $model_produk = new Produk();

        $produk = $model_produk->find($id);

        if ($produk['foto_produk'] && file_exists(ROOTPATH . 'public/img/' . $produk['foto_produk'])) {
            unlink(ROOTPATH . 'public/img/' . $produk['foto_produk']);
        }

        $model_produk->delete($id);

        return redirect()->to('/admin-produk');
    }

    // Admin Sertifikat
    public function admin_sertifikat()
    {
        $model_sertifikat = new Sertifikat();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query with join to get `username` from `member` table
        $sertifikat = $model_sertifikat
            ->select('sertifikat.*, member.username AS username_member')
            ->join('member', 'member.id_member = sertifikat.id_member', 'left')
            ->paginate($perPage);

        $data['sertifikat'] = $sertifikat;
        $data['pager'] = $model_sertifikat->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/sertifikat/index', $data);
    }

    public function admin_search_sertifikat()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_sertifikat = new Sertifikat();

        // Set pagination
        $perPage = 10; // Jumlah item per halaman
        $page = $this->request->getVar('page') ?? 1; // Mendapatkan halaman saat ini

        // Query pencarian dengan join ke tabel `member` untuk mendapatkan `username`
        $hasilPencarian = $model_sertifikat
            ->select('sertifikat.*, member.username AS username_member')
            ->join('member', 'member.id_member = sertifikat.id_member', 'left')
            ->groupStart() // Memulai grup kondisi
            ->like('sertifikat.sertifikat', $keyword)
            ->orLike('member.username', $keyword) // Pencarian di `username` dari `member`
            ->groupEnd() // Mengakhiri grup kondisi
            ->paginate($perPage);

        // Jika ada hasil pencarian
        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;
        $data['pager'] = $model_sertifikat->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/sertifikat/search', $data);
    }

    public function admin_add_sertifikat()
    {
        $model_member = new Member();

        $member = $model_member->whereIn('role', ['member', 'premium'])->select('id_member, username')->findAll();

        $data['member'] = $member;

        return view('admin/sertifikat/add', $data);
    }

    public function admin_create_sertifikat()
    {
        $model_sertifikat = new Sertifikat();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->whereIn('role', ['member', 'premium'])->first();

        if (!$memberData) {
            return redirect()->to('/admin-sertifikat')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $fileSertifikat = $this->request->getFile('sertifikat');

        $namaFile = null;

        if ($fileSertifikat && $fileSertifikat->isValid() && !$fileSertifikat->hasMoved()) {
            $namaFile = uniqid() . '.' . $fileSertifikat->getClientExtension();
            $fileSertifikat->move(ROOTPATH . 'public/certificate', $namaFile);
        }

        $data = [
            'id_member' => $id_member,
            'sertifikat' => $namaFile,
        ];

        $model_sertifikat->insert($data);

        return redirect()->to('/admin-sertifikat');
    }

    public function admin_edit_sertifikat($id)
    {
        $model_sertifikat = new Sertifikat();
        $model_member = new Member();

        $sertifikat = $model_sertifikat->find($id);

        $member = $model_member->whereIn('role', ['member', 'premium'])->select('id_member, username')->findAll();

        $data['sertifikat'] = $sertifikat;
        $data['member'] = $member;

        return view('admin/sertifikat/edit', $data);
    }

    public function admin_update_sertifikat($id)
    {
        $model_sertifikat = new Sertifikat();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->whereIn('role', ['member', 'premium'])->first();

        if (!$memberData) {
            return redirect()->to('/admin-sertifikat')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $sertifikat = $model_sertifikat->find($id);

        $fileSertifikat = $this->request->getFile('sertifikat');

        if ($fileSertifikat->isValid() && !$fileSertifikat->hasMoved()) {
            // Set new file name
            $namaFile = uniqid() . '.' . $fileSertifikat->getClientExtension();

            // Remove old file if exists
            if ($sertifikat['sertifikat'] && file_exists(ROOTPATH . 'public/certificate/' . $sertifikat['sertifikat'])) {
                unlink(ROOTPATH . 'public/certificate/' . $sertifikat['sertifikat']);
            }

            // Move new file and update data array
            $fileSertifikat->move(ROOTPATH . 'public/certificate', $namaFile);
            $data['sertifikat'] = $namaFile;
        } else {
            // Keep existing file if new file is invalid
            $data['sertifikat'] = $sertifikat['sertifikat'];
        }

        $data = array_merge($data, [
            'id_member' => $id_member,
        ]);

        $model_sertifikat->update($id, $data);

        return redirect()->to('/admin-sertifikat');
    }

    public function admin_delete_sertifikat($id)
    {
        $model_sertifikat = new Sertifikat();

        $sertifikat = $model_sertifikat->find($id);

        if ($sertifikat['sertifikat'] && file_exists(ROOTPATH . 'public/certificate/' . $sertifikat['sertifikat'])) {
            unlink(ROOTPATH . 'public/certificate/' . $sertifikat['sertifikat']);
        }

        $model_sertifikat->delete($id);

        return redirect()->to('/admin-sertifikat');
    }

    public function admin_belajar_ekspor()
    {
        $model_belajarekspor = new BelajarEksporModel();
        $model_kategori = new KategoriBelajarEksporModel();

        $belajar_ekspor = $model_belajarekspor->getAllWithCategory();

        $data['belajar_ekspor'] = $belajar_ekspor;

        return view('admin/belajar-ekspor/index', $data);
    }

    public function admin_search_belajar()
    {
        helper('text');

        $keyword = $this->request->getGet('keyword');
        $model_belajarekspor = new BelajarEksporModel();

        // Set pagination
        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query pencarian dengan join
        $hasilPencarian = $model_belajarekspor
            ->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->groupStart()
            ->like('judul_belajar_ekspor', $keyword)
            ->orLike('kategori_belajar_ekspor.nama_kategori', $keyword)
            ->orLike('deskripsi_belajar_ekspor', $keyword)
            ->orLike('belajar_ekspor.slug', $keyword) // Menyebutkan tabel untuk slug
            ->groupEnd()
            ->paginate($perPage, 'group1');

        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;

        return view('admin/belajar-ekspor/search', $data);
    }


    public function admin_belajar_ekspor_tambah()
    {
        $model_kategori = new KategoriBelajarEksporModel();

        $kategori_ekspor = $model_kategori->findAll();

        $data['nama_kategori'] = $kategori_ekspor;

        return view('admin/belajar-ekspor/tambah', $data);
    }

    public function admin_belajar_ekspor_store()
    {
        $tr = new GoogleTranslate('en');

        $model_belajarekspor = new BelajarEksporModel();

        $data = [
            'judul_belajar_ekspor' => $this->request->getPost('judul_belajar_ekspor'),
            'judul_belajar_ekspor_en' => $tr->translate($this->request->getPost('judul_belajar_ekspor')),
            'id_kategori_belajar_ekspor' => $this->request->getPost('id_kategori'),
            'id_kategori_en' => $tr->translate($this->request->getPost('id_kategori')),
            'deskripsi_belajar_ekspor' => $this->request->getPost('deskripsi_belajar_ekspor'),
            'deskripsi_belajar_ekspor_en' => $tr->translate($this->request->getPost('deskripsi_belajar_ekspor')),
            'slug' => $this->request->getPost('slug'),
            'slug_en' => $tr->translate($this->request->getPost('slug')),
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_title_en' => $tr->translate($this->request->getPost('meta_title')),
            'meta_deskripsi' => $this->request->getPost('meta_deskripsi'),
            'meta_deskripsi_en' => $tr->translate($this->request->getPost('meta_deskripsi')),
        ];

        // Mengambil file gambar
        $file = $this->request->getFile('foto_belajar_ekspor');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Beri nama acak pada file gambar untuk menghindari konflik nama
            $newName = $file->getRandomName();

            // Pindahkan file ke folder 'img' dengan nama baru
            $file->move('img/', $newName);

            // Simpan nama file gambar ke dalam array data untuk disimpan ke database
            $data['foto_belajar_ekspor'] = $newName;
        }

        $model_belajarekspor->insert($data);

        return redirect()->to('/admin-belajar-ekspor');
    }

    public function admin_belajar_ekspor_ubah($id)
    {
        $model_belajarekspor = new BelajarEksporModel();
        $model_kategori = new KategoriBelajarEksporModel();

        $belajar_ekspor = $model_belajarekspor->find($id);
        $kategori_ekspor = $model_kategori->findAll();

        $data['belajar_ekspor'] = $belajar_ekspor;
        $data['kategori_belajar_ekspor'] = $kategori_ekspor;

        return view('admin/belajar-ekspor/edit', $data);
    }

    public function admin_belajar_ekspor_update($id)
    {
        $tr = new GoogleTranslate('en');

        $model_belajarekspor = new BelajarEksporModel();
        $model_kategori = new KategoriBelajarEksporModel();

        // Ambil data lama dari database
        $existingData = $model_belajarekspor->find($id);
        if (!$existingData) {
            return redirect()->to('/admin-belajar-ekspor')->with('error', 'Data tidak ditemukan.');
        }

        // Menyiapkan data yang akan diperbarui
        $data = [
            'judul_belajar_ekspor' => $this->request->getPost('judul_belajar_ekspor'),
            'judul_belajar_ekspor_en' => $tr->translate($this->request->getPost('judul_belajar_ekspor')),
            'id_kategori_belajar_ekspor' => $this->request->getPost('id_kategori'),
            'id_kategori_en' => $tr->translate($this->request->getPost('id_kategori')),
            'deskripsi_belajar_ekspor' => $this->request->getPost('deskripsi_belajar_ekspor'),
            'deskripsi_belajar_ekspor_en' => $tr->translate($this->request->getPost('deskripsi_belajar_ekspor')),
            'slug' => $this->request->getPost('slug'),
            'slug_en' => $tr->translate($this->request->getPost('slug')),
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_title_en' => $tr->translate($this->request->getPost('meta_title')),
            'meta_deskripsi' => $this->request->getPost('meta_deskripsi'),
            'meta_deskripsi_en' => $tr->translate($this->request->getPost('meta_deskripsi')),
        ];

        // Menangani upload gambar jika ada file baru
        $file = $this->request->getFile('foto_belajar_ekspor');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Menghapus gambar lama jika ada dan file baru berhasil diunggah
            if (file_exists(FCPATH . 'img/' . $existingData['foto_belajar_ekspor'])) {
                unlink(FCPATH . 'img/' . $existingData['foto_belajar_ekspor']);
            }

            // Simpan gambar baru dan tambahkan ke data
            $newName = $file->getRandomName();
            $file->move('img/', $newName);
            $data['foto_belajar_ekspor'] = $newName;
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $data['foto_belajar_ekspor'] = $existingData['foto_belajar_ekspor'];
        }

        // Update data di database
        $model_belajarekspor->update($id, $data);

        // Redirect ke halaman dengan pesan sukses
        return redirect()->to('/admin-belajar-ekspor')->with('message', 'Data berhasil diperbarui.');
    }


    public function admin_belajar_ekspor_delete($id)
    {
        $model_belajarekspor = new BelajarEksporModel();

        $model_belajarekspor->delete($id);

        return redirect()->to('/admin-belajar-ekspor');
    }

    public function admin_kategori_belajar_ekspor()
    {
        $kategori_model = new KategoriBelajarEksporModel();

        $kategori = $kategori_model->findAll();

        $data['kategori_belajar_ekspor'] = $kategori;

        return view('admin/kategori-belajar/index', $data);
    }

    public function admin_kategori_belajar_ekspor_tambah()
    {
        return view('admin/kategori-belajar/tambah');
    }

    public function admin_kategori_belajar_ekspor_store()
    {
        $tr = new GoogleTranslate('en');

        $kategori_model = new KategoriBelajarEksporModel();

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'nama_kategori_en' => $tr->translate($this->request->getPost('nama_kategori')),
            'slug' => $this->request->getPost('slug'),
            'slug_en' => $tr->translate($this->request->getPost('slug')),
        ];

        $kategori_model->insert($data);

        return redirect()->to('/admin-kategori-belajar-ekspor');
    }

    public function admin_kategori_belajar_ekspor_ubah($id)
    {
        $kategori_model = new KategoriBelajarEksporModel();

        $kategori = $kategori_model->find($id);

        $data['kategori_belajar_ekspor'] = $kategori;

        return view('admin/kategori-belajar/edit', $data);
    }

    public function admin_kategori_belajar_ekspor_update($id)
    {
        $tr = new GoogleTranslate('en');

        $kategori_model = new KategoriBelajarEksporModel();

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'nama_kategori_en' => $tr->translate($this->request->getPost('nama_kategori')),
            'slug' => $this->request->getPost('slug'),
            'slug_en' => $tr->translate($this->request->getPost('slug')),
        ];

        $kategori_model->update($id, $data);

        return redirect()->to('/admin-kategori-belajar-ekspor');
    }

    public function admin_kategori_belajar_ekspor_delete($id)
    {
        $kategori_model = new KategoriBelajarEksporModel();

        $kategori_model->delete($id);

        return redirect()->to('/admin-kategori-belajar-ekspor');
    }

    public function admin_video_tutorial()
    {
        $model_video = new VidioTutorialModel();

        $video = $model_video->getAllVideos();

        $data['video_tutorial'] = $video;

        return view('admin/video-tutorial/index', $data);
    }

    public function admin_video_tutorial_tambah()
    {
        $model_kategori = new KategoriVidioModel();

        $kategori = $model_kategori->findAll();

        $data['nama_kategori_video'] = $kategori;

        return view('admin/video-tutorial/tambah', $data);
    }

    public function admin_video_tutorial_store()
    {
        $tr = new GoogleTranslate('en');

        $model_video = new VidioTutorialModel();

        $data = [
            'judul_video' => $this->request->getPost('judul_video'),
            'judul_video_en' => $tr->translate($this->request->getPost('judul_video')),
            'id_kategori_video' => $this->request->getPost('id_kategori'), // Menggunakan nilai asli, bukan hasil terjemahan
            'video_url' => $this->request->getPost('video_url'),
            'deskripsi_video' => $this->request->getPost('deskripsi_video'),
            'deskripsi_video_en' => $tr->translate($this->request->getPost('deskripsi_video')),
            'slug' => $this->request->getPost('slug'),
            'slug_en' => $tr->translate($this->request->getPost('slug')),
        ];

        // Mengambil file gambar
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Beri nama acak pada file gambar untuk menghindari konflik nama
            $newName = $file->getRandomName();

            // Pindahkan file ke folder 'img' dengan nama baru
            $file->move('img/', $newName);

            // Simpan nama file gambar ke dalam array data untuk disimpan ke database
            $data['thumbnail'] = $newName;
        }

        $model_video->insert($data);

        return redirect()->to('/admin-video-tutorial');
    }

    public function admin_video_tutorial_ubah($id)
    {
        $model_video = new VidioTutorialModel();
        $model_kategori = new KategoriVidioModel();

        $video = $model_video->find($id);
        $kategori = $model_kategori->findAll();

        $data['video_tutorial'] = $video;
        $data['kategori_video'] = $kategori;

        return view('admin/video-tutorial/edit', $data);
    }

    public function admin_video_tutorial_update($id)
    {
        $tr = new GoogleTranslate('en');

        $model_video = new VidioTutorialModel();

        $existingData = $model_video->find($id);
        if (!$existingData) {
            return redirect()->to('/admin-belajar-ekspor')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'judul_video' => $this->request->getPost('judul_video'),
            'judul_video_en' => $tr->translate($this->request->getPost('judul_video')),
            'id_kategori_video' => $this->request->getPost('id_kategori'), // Menggunakan nilai asli, bukan hasil terjemahan
            'video_url' => $this->request->getPost('video_url'),
            'deskripsi_video' => $this->request->getPost('deskripsi_video'),
            'deskripsi_video_en' => $tr->translate($this->request->getPost('deskripsi_video')),
            'slug' => $this->request->getPost('slug'),
            'slug_en' => $tr->translate($this->request->getPost('slug')),
        ];

        // Menangani upload gambar jika ada file baru
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Menghapus gambar lama jika ada dan file baru berhasil diunggah
            if (file_exists(FCPATH . 'img/' . $existingData['thumbnail'])) {
                unlink(FCPATH . 'img/' . $existingData['thumbnail']);
            }

            // Simpan gambar baru dan tambahkan ke data
            $newName = $file->getRandomName();
            $file->move('img/', $newName);
            $data['thumbnail'] = $newName;
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $data['thumbnail'] = $existingData['thumbnail'];
        }

        $model_video->update($id, $data);

        return redirect()->to('/admin-video-tutorial');
    }

    public function admin_video_tutorial_delete($id)
    {
        $model_video = new VidioTutorialModel();

        $model_video->delete($id);

        return redirect()->to('/admin-video-tutorial');
    }

    public function admin_kategori_video_tutorial()
    {
        $model_video = new KategoriVidioModel();

        $video = $model_video->findAll();

        $data['kategori_video'] = $video;

        return view('admin/Kategori-video/index', $data);
    }

    public function admin_kategori_video_tutorial_tambah()
    {
        return view('admin/Kategori-video/tambah');
    }

    public function admin_kategori_vidio_tutorial_store()
    {
        $tr = new GoogleTranslate('en');

        $kategori_video = new KategoriVidioModel();

        $data = [
            'nama_kategori_video' => $this->request->getPost('kategori_vidio'),
            'nama_kategori_video_en' => $tr->translate($this->request->getPost('kategori_vidio')),
            'slug' => $this->request->getPost('slug'),
            'slug_en' => $tr->translate($this->request->getPost('slug')),
        ];

        $kategori_video->insert($data);

        return redirect()->to('/admin-kategori-video-tutorial');
    }

    public function admin_kategori_video_tutorial_ubah($id)
    {
        $model_video = new KategoriVidioModel();

        $video = $model_video->find($id);

        $data['kategori_video'] = $video;

        return view('admin/Kategori-video/edit', $data);
    }

    public function admin_kategori_video_tutorial_update($id)
    {
        $tr = new GoogleTranslate('en');

        $kategori_video = new KategoriVidioModel();

        $data = [
            'nama_kategori_video' => $this->request->getPost('kategori_video'),
            'kategori_kategori_video_en' => $tr->translate($this->request->getPost('kategori_video')),
            'slug' => $this->request->getPost('slug'),
            'slug_en' => $tr->translate($this->request->getPost('slug')),
        ];

        $kategori_video->update($id, $data);

        return redirect()->to('/admin-kategori-video-tutorial');
    }

    public function admin_kategori_video_tutorial_delete($id)
    {
        $kategori_video_model = new KategoriVidioModel();

        $kategori_video_model->delete($id);

        return redirect()->to('/admin-kategori-video-tutorial');
    }

    // Admin Exwork
    public function admin_exwork()
    {
        $model_exwork = new Exwork();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query with join to get `username` from `member` table
        $exwork = $model_exwork
            ->select('exwork.*, member.username AS username_member')
            ->join('member', 'member.id_member = exwork.id_member', 'left')
            ->paginate($perPage);

        $data['exwork'] = $exwork;
        $data['pager'] = $model_exwork->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/exwork/index', $data);
    }

    public function admin_search_exwork()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_exwork = new Exwork();

        // Set pagination
        $perPage = 10; // Jumlah item per halaman
        $page = $this->request->getVar('page') ?? 1; // Mendapatkan halaman saat ini

        // Query pencarian dengan join ke tabel `member` untuk mendapatkan `username`
        $hasilPencarian = $model_exwork
            ->select('exwork.*, member.username AS username_member')
            ->join('member', 'member.id_member = exwork.id_member', 'left')
            ->groupStart() // Memulai grup kondisi
            ->like('exwork.komponen_exwork', $keyword) // Pencarian di `komponen_exwork`
            ->orLike('member.username', $keyword) // Pencarian di `username` dari `member`
            ->groupEnd() // Mengakhiri grup kondisi
            ->paginate($perPage);

        // Jika ada hasil pencarian
        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;
        $data['pager'] = $model_exwork->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/exwork/search', $data);
    }

    public function admin_add_exwork()
    {
        $model_member = new Member();

        $member = $model_member->where('role', 'member')->select('id_member, username')->findAll();

        $data['member'] = $member;

        return view('admin/kalkulator-ekspor/exwork/add', $data);
    }

    public function admin_create_exwork()
    {
        $model_exwork = new Exwork();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->where('role', 'member')->first();

        if (!$memberData) {
            return redirect()->to('/admin-exwork')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $data = [
            'id_member' => $id_member,
            'komponen_exwork' => $this->request->getPost('komponen_exwork'),
        ];

        $model_exwork->insert($data);

        return redirect()->to('/admin-exwork');
    }

    public function admin_edit_exwork($id)
    {
        $model_exwork = new Exwork();
        $model_member = new Member();

        $exwork = $model_exwork->find($id);

        $member = $model_member->where('role', 'member')->select('id_member, username')->findAll();

        $data['exwork'] = $exwork;
        $data['member'] = $member;

        return view('admin/kalkulator-ekspor/exwork/edit', $data);
    }

    public function admin_update_exwork($id)
    {
        $model_exwork = new Exwork();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->where('role', 'member')->first();

        if (!$memberData) {
            return redirect()->to('/admin-exwork')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $data = [
            'id_member' => $id_member,
            'komponen_exwork' => $this->request->getPost('komponen_exwork'),
        ];

        $model_exwork->update($id, $data);

        return redirect()->to('/admin-exwork');
    }

    public function admin_delete_exwork($id)
    {
        $model_exwork = new Exwork();

        $model_exwork->delete($id);

        return redirect()->to('/admin-exwork');
    }

    // Admin FOB
    public function admin_fob()
    {
        $model_fob = new FOB();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query with join to get `username` from `member` table
        $fob = $model_fob
            ->select('fob.*, member.username AS username_member')
            ->join('member', 'member.id_member = fob.id_member', 'left')
            ->paginate($perPage);

        $data['fob'] = $fob;
        $data['pager'] = $model_fob->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/fob/index', $data);
    }

    public function admin_search_fob()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_fob = new FOB();

        // Set pagination
        $perPage = 10; // Jumlah item per halaman
        $page = $this->request->getVar('page') ?? 1; // Mendapatkan halaman saat ini

        // Query pencarian dengan join ke tabel `member` untuk mendapatkan `username`
        $hasilPencarian = $model_fob
            ->select('fob.*, member.username AS username_member')
            ->join('member', 'member.id_member = fob.id_member', 'left')
            ->groupStart() // Memulai grup kondisi
            ->like('fob.komponen_fob', $keyword) // Pencarian di `komponen_fob`
            ->orLike('member.username', $keyword) // Pencarian di `username` dari `member`
            ->groupEnd() // Mengakhiri grup kondisi
            ->paginate($perPage);

        // Jika ada hasil pencarian
        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;
        $data['pager'] = $model_fob->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/fob/search', $data);
    }

    public function admin_add_fob()
    {
        $model_member = new Member();

        $member = $model_member->where('role', 'member')->select('id_member, username')->findAll();

        $data['member'] = $member;

        return view('admin/kalkulator-ekspor/fob/add', $data);
    }

    public function admin_create_fob()
    {
        $model_fob = new FOB();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->where('role', 'member')->first();

        if (!$memberData) {
            return redirect()->to('/admin-fob')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $data = [
            'id_member' => $id_member,
            'komponen_fob' => $this->request->getPost('komponen_fob'),
        ];

        $model_fob->insert($data);

        return redirect()->to('/admin-fob');
    }

    public function admin_edit_fob($id)
    {
        $model_fob = new FOB();
        $model_member = new Member();

        $fob = $model_fob->find($id);

        $member = $model_member->where('role', 'member')->select('id_member, username')->findAll();

        $data['fob'] = $fob;
        $data['member'] = $member;

        return view('admin/kalkulator-ekspor/fob/edit', $data);
    }

    public function admin_update_fob($id)
    {
        $model_fob = new FOB();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->where('role', 'member')->first();

        if (!$memberData) {
            return redirect()->to('/admin-fob')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $data = [
            'id_member' => $id_member,
            'komponen_fob' => $this->request->getPost('komponen_fob'),
        ];

        $model_fob->update($id, $data);

        return redirect()->to('/admin-fob');
    }

    public function admin_delete_fob($id)
    {
        $model_fob = new FOB();

        $model_fob->delete($id);

        return redirect()->to('/admin-fob');
    }

    // Admin CFR
    public function admin_cfr()
    {
        $model_cfr = new CFR();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query with join to get `username` from `member` table
        $cfr = $model_cfr
            ->select('cfr.*, member.username AS username_member')
            ->join('member', 'member.id_member = cfr.id_member', 'left')
            ->paginate($perPage);

        $data['cfr'] = $cfr;
        $data['pager'] = $model_cfr->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/cfr/index', $data);
    }

    public function admin_search_cfr()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_cfr = new CFR();

        // Set pagination
        $perPage = 10; // Jumlah item per halaman
        $page = $this->request->getVar('page') ?? 1; // Mendapatkan halaman saat ini

        // Query pencarian dengan join ke tabel `member` untuk mendapatkan `username`
        $hasilPencarian = $model_cfr
            ->select('cfr.*, member.username AS username_member')
            ->join('member', 'member.id_member = cfr.id_member', 'left')
            ->groupStart() // Memulai grup kondisi
            ->like('cfr.komponen_cfr', $keyword) // Pencarian di `komponen_cfr`
            ->orLike('member.username', $keyword) // Pencarian di `username` dari `member`
            ->groupEnd() // Mengakhiri grup kondisi
            ->paginate($perPage);

        // Jika ada hasil pencarian
        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;
        $data['pager'] = $model_cfr->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/cfr/search', $data);
    }

    public function admin_add_cfr()
    {
        $model_member = new Member();

        $member = $model_member->where('role', 'member')->select('id_member, username')->findAll();

        $data['member'] = $member;

        return view('admin/kalkulator-ekspor/cfr/add', $data);
    }

    public function admin_create_cfr()
    {
        $model_cfr = new CFR();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->where('role', 'member')->first();

        if (!$memberData) {
            return redirect()->to('/admin-cfr')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $data = [
            'id_member' => $id_member,
            'komponen_cfr' => $this->request->getPost('komponen_cfr'),
        ];

        $model_cfr->insert($data);

        return redirect()->to('/admin-cfr');
    }

    public function admin_edit_cfr($id)
    {
        $model_cfr = new CFR();
        $model_member = new Member();

        $cfr = $model_cfr->find($id);

        $member = $model_member->where('role', 'member')->select('id_member, username')->findAll();

        $data['cfr'] = $cfr;
        $data['member'] = $member;

        return view('admin/kalkulator-ekspor/cfr/edit', $data);
    }

    public function admin_update_cfr($id)
    {
        $model_cfr = new CFR();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->where('role', 'member')->first();

        if (!$memberData) {
            return redirect()->to('/admin-cfr')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $data = [
            'id_member' => $id_member,
            'komponen_cfr' => $this->request->getPost('komponen_cfr'),
        ];

        $model_cfr->update($id, $data);

        return redirect()->to('/admin-cfr');
    }

    public function admin_delete_cfr($id)
    {
        $model_cfr = new CFR();

        $model_cfr->delete($id);

        return redirect()->to('/admin-cfr');
    }

    // Admin CIF
    public function admin_cif()
    {
        $model_cif = new CIF();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query with join to get `username` from `member` table
        $cif = $model_cif
            ->select('cif.*, member.username AS username_member')
            ->join('member', 'member.id_member = cif.id_member', 'left')
            ->paginate($perPage);

        $data['cif'] = $cif;
        $data['pager'] = $model_cif->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/cif/index', $data);
    }

    public function admin_search_cif()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_cif = new CIF();

        // Set pagination
        $perPage = 10; // Jumlah item per halaman
        $page = $this->request->getVar('page') ?? 1; // Mendapatkan halaman saat ini

        // Query pencarian dengan join ke tabel `member` untuk mendapatkan `username`
        $hasilPencarian = $model_cif
            ->select('cif.*, member.username AS username_member')
            ->join('member', 'member.id_member = cif.id_member', 'left')
            ->groupStart() // Memulai grup kondisi
            ->like('cif.komponen_cif', $keyword) // Pencarian di `komponen_cif`
            ->orLike('member.username', $keyword) // Pencarian di `username` dari `member`
            ->groupEnd() // Mengakhiri grup kondisi
            ->paginate($perPage);

        // Jika ada hasil pencarian
        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;
        $data['pager'] = $model_cif->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/cif/search', $data);
    }

    public function admin_add_cif()
    {
        $model_member = new Member();

        $member = $model_member->where('role', 'member')->select('id_member, username')->findAll();

        $data['member'] = $member;

        return view('admin/kalkulator-ekspor/cif/add', $data);
    }

    public function admin_create_cif()
    {
        $model_cif = new CIF();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->where('role', 'member')->first();

        if (!$memberData) {
            return redirect()->to('/admin-cif')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $data = [
            'id_member' => $id_member,
            'komponen_cif' => $this->request->getPost('komponen_cif'),
        ];

        $model_cif->insert($data);

        return redirect()->to('/admin-cif');
    }

    public function admin_edit_cif($id)
    {
        $model_cif = new CIF();
        $model_member = new Member();

        $cif = $model_cif->find($id);

        $member = $model_member->where('role', 'member')->select('id_member, username')->findAll();

        $data['cif'] = $cif;
        $data['member'] = $member;

        return view('admin/kalkulator-ekspor/cif/edit', $data);
    }

    public function admin_update_cif($id)
    {
        $model_cif = new CIF();
        $model_member = new Member();

        $id_member = $this->request->getPost('id_member');

        $memberData = $model_member->where('id_member', $id_member)->where('role', 'member')->first();

        if (!$memberData) {
            return redirect()->to('/admin-cif')->withInput()->with('errors', ['ID Member tidak valid atau bukan seorang member']);
        }

        $data = [
            'id_member' => $id_member,
            'komponen_cif' => $this->request->getPost('komponen_cif'),
        ];

        $model_cif->update($id, $data);

        return redirect()->to('/admin-cif');
    }

    public function admin_delete_cif($id)
    {
        $model_cif = new CIF();

        $model_cif->delete($id);

        return redirect()->to('/admin-cif');
    }

    // Admin Satuan
    public function admin_satuan()
    {
        $model_satuan = new Satuan();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query with join to get `username` from `member` table
        $satuan = $model_satuan
            ->select('satuan.*, member.username AS username_member')
            ->join('member', 'member.id_member = satuan.id_member', 'left')
            ->paginate($perPage);

        $data['satuan'] = $satuan;
        $data['pager'] = $model_satuan->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/satuan/index', $data);
    }

    public function admin_search_satuan()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        $model_satuan = new Satuan();

        // Set pagination
        $perPage = 10; // Jumlah item per halaman
        $page = $this->request->getVar('page') ?? 1; // Mendapatkan halaman saat ini

        // Query pencarian dengan join ke tabel `member` untuk mendapatkan `username`
        $hasilPencarian = $model_satuan
            ->select('satuan.*, member.username AS username_member')
            ->join('member', 'member.id_member = satuan.id_member', 'left')
            ->groupStart() // Memulai grup kondisi
            ->like('satuan.satuan', $keyword) // Pencarian di `satuan`
            ->orLike('member.username', $keyword) // Pencarian di `username` dari `member`
            ->groupEnd() // Mengakhiri grup kondisi
            ->paginate($perPage);

        // Jika ada hasil pencarian
        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;
        $data['pager'] = $model_satuan->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/kalkulator-ekspor/satuan/search', $data);
    }

    public function admin_edit_satuan($id)
    {
        $model_satuan = new Satuan();
        $model_member = new Member();

        $satuan = $model_satuan->find($id);

        $member = $model_member->where('role', 'member')->select('id_member, username')->findAll();

        $data['satuan'] = $satuan;
        $data['member'] = $member;

        return view('admin/kalkulator-ekspor/satuan/edit', $data);
    }

    public function admin_update_satuan($id)
    {
        $model_satuan = new Satuan();

        $data = [
            'satuan' => $this->request->getPost('satuan'),
        ];

        $model_satuan->update($id, $data);

        return redirect()->to('/admin-satuan');
    }

    // Admin MPM
    public function admin_mpm()
    {
        $model_mpm = new MPM();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query with join to get `username` from `member` table
        $mpm = $model_mpm
            ->select('mpm.*, member.username AS username_member')
            ->join('member', 'member.id_member = mpm.id_member', 'left')
            ->paginate($perPage);

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

        $data['mpm'] = $mpm;
        $data['pager'] = $model_mpm->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/mpm/index', $data);
    }

    public function admin_search_mpm()
    {
        helper('text');

        $keyword = $this->request->getGet('keyword');
        $model_mpm = new MPM();
        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Initialize variables for different date parts
        $isFullDate = false;
        $isDateAndMonth = false;
        $isMonthAndYear = false;
        $dateKeyword = null;

        try {
            // Full date format (e.g., 15 November 2024)
            $date = DateTime::createFromFormat('d F Y', $keyword);
            if ($date) {
                $isFullDate = true;
                $dateKeyword = $date->format('Y-m-d');
            }
        } catch (Exception $e) {
        }

        if (!$isFullDate) {
            // Date and month format (e.g., 15 November)
            $dateAndMonth = DateTime::createFromFormat('d F', $keyword);
            if ($dateAndMonth) {
                $isDateAndMonth = true;
                $dateKeyword = $dateAndMonth->format('-m-d'); // Matches day and month (e.g., -11-15)
            } else {
                // Month and year format (e.g., November 2024)
                $monthAndYear = DateTime::createFromFormat('F Y', $keyword);
                if ($monthAndYear) {
                    $isMonthAndYear = true;
                    $dateKeyword = $monthAndYear->format('Y-m-'); // Matches month and year (e.g., 2024-11-)
                }
            }
        }

        $hasilPencarian = $model_mpm
            ->select('mpm.*, member.username AS username_member')
            ->join('member', 'member.id_member = mpm.id_member', 'left')
            ->groupStart()
            ->like('mpm.tgl_kirim_email', $dateKeyword ?: $keyword)
            ->orLike('mpm.update_terakhir', $dateKeyword ?: $keyword)
            ->orLike('mpm.nama_perusahaan', $keyword)
            ->orLike('mpm.negara_perusahaan', $keyword)
            ->orLike('mpm.status_progres', $keyword)
            ->orLike('mpm.progres', $keyword)
            ->orLike('member.username', $keyword)
            ->groupEnd()
            ->paginate($perPage);

        // Indonesian months for formatting
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

        foreach ($hasilPencarian as &$item) {
            $tgl_kirim = date('d F Y', strtotime($item['tgl_kirim_email']));
            $bulanInggris_kirim = date('F', strtotime($item['tgl_kirim_email']));
            $item['tgl_kirim_email'] = str_replace($bulanInggris_kirim, $bulanIndonesia[$bulanInggris_kirim], $tgl_kirim);

            if (is_null($item['update_terakhir'])) {
                $item['update_terakhir'] = '';
            } else {
                $tgl_update = date('d F Y', strtotime($item['update_terakhir']));
                $bulanInggris_update = date('F', strtotime($item['update_terakhir']));
                $item['update_terakhir'] = str_replace($bulanInggris_update, $bulanIndonesia[$bulanInggris_update], $tgl_update);
            }
        }

        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;
        $data['pager'] = $model_mpm->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/mpm/search', $data);
    }

    // Admin Website Audit
    public function admin_website_audit()
    {
        $model_website_audit = new WebsiteAudit();

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;

        // Query with join to get `username` from `member` table
        $website_audit = $model_website_audit
            ->select('website_audit.*, member.username AS username_member')
            ->join('member', 'member.id_member = website_audit.id_member', 'left')
            ->paginate($perPage);

        $data['website_audit'] = $website_audit;
        $data['pager'] = $model_website_audit->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/website-audit/index', $data);
    }

    public function admin_search_website_audit()
    {
        helper('text');

        // Ambil keyword dari query string
        $keyword = $this->request->getGet('keyword');

        // Map keywords for status_verifikasi
        $mappedKeyword = null;
        switch (strtolower($keyword)) {
            case 'sesuai':
                $mappedKeyword = 'true';
                break;
            case 'tidak sesuai' || 'tidak':
                $mappedKeyword = 'false';
                break;
            case 'waiting':
                $mappedKeyword = 'waiting';
                break;
            default:
                $mappedKeyword = $keyword;
                break;
        }

        $model_website_audit = new WebsiteAudit();

        // Set pagination
        $perPage = 10; // Jumlah item per halaman
        $page = $this->request->getVar('page') ?? 1; // Mendapatkan halaman saat ini

        // Query pencarian dengan join ke tabel `member` untuk mendapatkan `username`
        $hasilPencarian = $model_website_audit
            ->select('website_audit.*, member.username AS username_member')
            ->join('member', 'member.id_member = website_audit.id_member', 'left')
            ->groupStart() // Memulai grup kondisi
            ->like('website_audit.link_website', $keyword) // Pencarian di `website_audit`
            ->orLike('website_audit.catatan_fitur', $keyword)
            ->orLike('website_audit.catatan_bahasa', $keyword)
            ->orLike('website_audit.catatan_seo', $keyword)
            ->orLike('website_audit.status_verifikasi', $mappedKeyword) // Use mappedKeyword here
            ->orLike('member.username', $keyword) // Pencarian di `username` dari `member`
            ->groupEnd() // Mengakhiri grup kondisi
            ->paginate($perPage);

        // Jika ada hasil pencarian
        $data['hasilPencarian'] = $hasilPencarian;
        $data['keyword'] = $keyword;
        $data['pager'] = $model_website_audit->pager;
        $data['page'] = $page;
        $data['perPage'] = $perPage;

        return view('admin/website-audit/search', $data);
    }

    public function admin_process_website_audit($id)
    {
        $model_webaudit = new WebsiteAudit();
        $model_member = new Member();

        $webaudit = $model_webaudit->find($id);

        $member = $model_member->whereIn('role', ['member', 'premium'])->select('id_member, username')->findAll();

        $data['webaudit'] = $webaudit;
        $data['member'] = $member;

        return view('admin/website-audit/process', $data);
    }

    public function admin_done_website_audit($id)
    {
        $model_webaudit = new WebsiteAudit();

        $fitur = $this->request->getPost('fitur');
        $bahasa = $this->request->getPost('bahasa');
        $seo = $this->request->getPost('seo');

        $catatan_fitur_profil_perusahaan = "Fitur Profil Perusahaan masih belum benar";
        $catatan_fitur_katalog_produk = "Fitur Katalog Produk masih belum benar";
        $catatan_fitur_kontak = "Fitur Kontak masih belum benar";
        $catatan_fitur_blog_artikel = "Fitur Blog / Artikel Edukasi masih belum benar";
        $catatan_fitur_aktivitas_berita = "Fitur Aktivitas Perusahaan / Berita masih belum benar";
        $catatan_fitur_sosmed_marketplace = "Fitur Integrasi Ke Social Media / Marketplace masih belum benar";
        $catatan_bahasa_inggris = "Bahasa Inggris masih belum benar";
        $catatan_bahasa_indonesia = "Bahasa Indonesia masih belum benar";
        $catatan_seo_meta_tags = "SEO Meta Tags Optimalisasi masih belum benar";
        $catatan_seo_struktur_data = "SEO Struktur Data masih belum benar";
        $catatan_seo_keyword_research = "SEO Keyword Research masih belum benar";

        if (!empty($fitur)) {
            if (in_array('Profil Perusahaan', $fitur)) {
                $catatan_fitur_profil_perusahaan = "";
            }
            if (in_array('Katalog Produk', $fitur)) {
                $catatan_fitur_katalog_produk = "";
            }
            if (in_array('Kontak', $fitur)) {
                $catatan_fitur_kontak = "";
            }
            if (in_array('Blog / Artikel Edukasi', $fitur)) {
                $catatan_fitur_blog_artikel = "";
            }
            if (in_array('Aktivitas Perusahaan / Berita', $fitur)) {
                $catatan_fitur_aktivitas_berita = "";
            }
            if (in_array('Integrasi Ke Social Media / Marketplace', $fitur)) {
                $catatan_fitur_sosmed_marketplace = "";
            }
        }
        if (!empty($bahasa)) {
            if (in_array('Inggris', $bahasa)) {
                $catatan_bahasa_inggris = "";
            }
            if (in_array('Indonesia', $bahasa)) {
                $catatan_bahasa_indonesia = "";
            }
        }
        if (!empty($seo)) {
            if (in_array('Meta Tags Optimalisasi', $seo)) {
                $catatan_seo_meta_tags = "";
            }
            if (in_array('Struktur Data', $seo)) {
                $catatan_seo_struktur_data = "";
            }
            if (in_array('Keyword Research', $seo)) {
                $catatan_seo_keyword_research = "";
            }
        }

        $catatan_fitur = implode(', ', array_filter([
            $catatan_fitur_profil_perusahaan,
            $catatan_fitur_katalog_produk,
            $catatan_fitur_kontak,
            $catatan_fitur_blog_artikel,
            $catatan_fitur_aktivitas_berita,
            $catatan_fitur_sosmed_marketplace
        ]));
        $catatan_bahasa = implode(', ', array_filter([
            $catatan_bahasa_inggris,
            $catatan_bahasa_indonesia
        ]));
        $catatan_seo = implode(', ', array_filter([
            $catatan_seo_meta_tags,
            $catatan_seo_struktur_data,
            $catatan_seo_keyword_research
        ]));

        $status_verifikasi = empty($catatan_fitur) && empty($catatan_bahasa) && empty($catatan_seo) ? 'true' : 'false';

        $data = [
            'status_verifikasi' => $status_verifikasi,
            'catatan_fitur' => $catatan_fitur,
            'catatan_bahasa' => $catatan_bahasa,
            'catatan_seo' => $catatan_seo,
        ];

        $model_webaudit->update($id, $data);

        return redirect()->to('/admin-website-audit');
    }

    public function admin_pengumuman()
    {
        $model_pengumuman = new Pengumuman();

        $pengumuman = $model_pengumuman->findAll();

        $data['pengumuman'] = $pengumuman;

        return view('admin/pengumuman/index', $data);
    }

    public function admin_add_pengumuman_create()
    {
        $model_pengumuman = new Pengumuman();

        $data = [
            'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
            'deskripsi_pengumuman' => $this->request->getPost('deskripsi_pengumuman'),
            'slug' => $this->request->getPost('slug')
        ];

        // Mengambil file gambar
        $file = $this->request->getFile('poster_pengumuman');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Beri nama acak pada file gambar untuk menghindari konflik nama
            $newName = $file->getRandomName();

            // Pindahkan file ke folder 'img' dengan nama baru
            $file->move('img/', $newName);

            // Simpan nama file gambar ke dalam array data untuk disimpan ke database
            $data['poster_pengumuman'] = $newName;
        }

        $model_pengumuman->insert($data);

        return redirect()->to('/admin-pengumuman');
    }

    public function admin_add_pengumuman()
    {
        return view('admin/pengumuman/add');
    }

    public function admin_edit_pengumuman($id)
    {
        $model_pengumuman = new Pengumuman();

        $pengumuman = $model_pengumuman->find($id);

        $data['pengumuman'] = $pengumuman;

        return view('admin/pengumuman/edit', $data);
    }

    public function admin_update_pengumuman($id)
    {
        $model_pengumuman = new Pengumuman();

        $existingData = $model_pengumuman->find($id);
        if (!$existingData) {
            return redirect()->to('/admin-pengumuman')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
            'deskripsi_pengumuman' => $this->request->getPost('deskripsi_pengumuman'),
            'slug' => $this->request->getPost('slug')
        ];

        // Menangani upload gambar jika ada file baru
        $file = $this->request->getFile('poster_pengumuman');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Menghapus gambar lama jika ada dan file baru berhasil diunggah
            if (file_exists(FCPATH . 'img/' . $existingData['poster_pengumuman'])) {
                unlink(FCPATH . 'img/' . $existingData['poster_pengumuman']);
            }

            // Simpan gambar baru dan tambahkan ke data
            $newName = $file->getRandomName();
            $file->move('img/', $newName);
            $data['poster_pengumuman'] = $newName;
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $data['poster_pengumuman'] = $existingData['poster_pengumuman'];
        }

        $model_pengumuman->update($id, $data);

        return redirect()->to('/admin-pengumuman');
    }

    public function admin_delete_pengumuman($id)
    {
        $model_pengumuman = new Pengumuman();

        $model_pengumuman->delete($id);

        return redirect()->to('/admin-pengumuman');
    }

    public function admin_manfaat_join()
    {
        $model_manfaatjoin = new ManfaatJoin();

        $manfaat = $model_manfaatjoin->findAll();

        $data['manfaatjoin'] = $manfaat;

        return view('admin/manfaat-join/index', $data);
    }

    public function admin_edit_manfaat_join($id)
    {

        $model_manfaatjoin = new ManfaatJoin();

        $manfaat = $model_manfaatjoin->find($id);

        $data['manfaatjoin'] = $manfaat;

        return view('admin/manfaat-join/edit', $data);
    }

    public function admin_update_manfaat_join($id)
    {
        $tr = new GoogleTranslate('en');

        $model_manfaatjoin = new ManfaatJoin();

        $existingData = $model_manfaatjoin->find($id);
        if (!$existingData) {
            return redirect()->to('/admin-pengumuman')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'judul_manfaat' => $this->request->getPost('judul_manfaat'),
            'judul_manfaat_en' => $tr->translate($this->request->getPost('judul_manfaat')),
            'deskripsi_manfaat' => $this->request->getPost('deskripsi_manfaat'),
            'deskripsi_manfaat_en' => $tr->translate($this->request->getPost('deskripsi_manfaat')),
        ];

        $model_manfaatjoin->update($id, $data);

        return redirect()->to('/admin-manfaat-join');
    }

    public function admin_slider()
    {
        $model_slider = new Slider();

        $slider = $model_slider->findAll();

        $data['slider'] = $slider;

        return view('admin/slider/index', $data);
    }

    public function admin_edit_slider($id)
    {
        $model_slider = new Slider();

        $slider = $model_slider->find($id);

        $data['slider'] = $slider;

        return view('admin/slider/edit', $data);
    }

    public function admin_update_slider($id)
    {
        $model_slider = new Slider();

        $slider = $model_slider->find($id);

        $data = [
            'judul_slider' => $this->request->getPost('judul_slider'),
            'deskripsi_slider' => $this->request->getPost('deskripsi_slider'),
        ];

        // Menangani upload gambar jika ada file baru
        $file = $this->request->getFile('img_slider');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Menghapus gambar lama jika ada dan file baru berhasil diunggah
            if (file_exists(FCPATH . 'img/' . $slider['img_slider'])) {
                unlink(FCPATH . 'img/' . $slider['img_slider']);
            }

            // Simpan gambar baru dan tambahkan ke data
            $newName = $file->getRandomName();
            $file->move('img/', $newName);
            $data['img_slider'] = $newName;
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $data['img_slider'] = $slider['img_slider'];
        }


        $model_slider->update($id, $data);

        return redirect()->to('/admin-slider');
    }


    public function admin_web_profile()
    {
        return view('admin/web-profile/index');
    }

    public function admin_edit_web_profile()
    {
        return view('admin/web-profile/edit');
    }

    // Invesment
    public function kelayakan_investasi()
    {
        $model_webprofile = new WebProfile();

        $webprofile = $model_webprofile->findAll();

        $data['webprofile'] = $webprofile;

        return view('premium/kelayakan-investasi/kelayakan-investasi', $data);
    }
}

<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    /* Artikel Detail Section */
    .artikel-detail-section {
        padding: 60px 15px;
        background-color: #f9f9f9;
        border-bottom: 1px solid #ddd;
    }

    .artikel-detail-header h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    /* Artikel Text Styling */
    .artikel-text h2,
    .artikel-text h3 {
        margin-top: 20px;
        margin-bottom: 10px;
    }

    /* Add spacing between elements */
    .artikel-text *+* {
        margin-top: 20px;
    }


    .image-wrapper {
        text-align: center;
        /* Center the image within this wrapper */
        margin-top: 30px;
    }

    /* Image styling */

    .artikel-text {
        line-height: 1.6;
        font-size: 1.1rem;
        padding-inline-start: 50px;
        padding-inline-end: 50px;
        text-align: justify;
    }


    /* Recommended Articles Section */
    .recommended-articles-section {
        padding: 60px 15px;
        background-color: #fff;
    }

    .recommended-articles-section h2 {
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 1.25rem;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1rem;
        color: #03AADE;
        flex-grow: 1;
        /* Allow text to grow and fill available space */
    }

    .btn {
        background-color: #03AADE;
        text-align: center;
        color: #ffffff;
    }

    .btn:hover {
        background-color: #F2BF02;
        color: #ffffff;
    }

    .badge {
        font-weight: normal;
        color: #fff;
        font-size: 0.9rem;
        padding: 0.8em 1.5em;
        border-radius: 3px;
        background-color: #03AADE;
        width: auto;
        /* Membuat lebar badge mengikuti panjang teks */
        display: inline-block;
        /* Menjamin badge sesuai dengan teks */
    }

    .line-separator {
        width: 100%;
        height: 2px;
        background-color: #000;
        margin: 10px 0;
    }

    .card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .card:hover {
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    @media (max-width: 768px) {
        .artikel-text {
            padding: 0px;
        }

        .artikel-detail-header h1 {
            font-size: 2rem;
        }

        .artikel-detail-content {
            padding: 0 15px;
        }

        .artikel-text {
            font-size: 1rem;
        }
    }
</style>

<!-- artikel-detail section start -->
<section class="artikel-detail-section">
    <div class="container">
        <!-- Article Header -->
        <div class="artikel-detail-header text-center">
            <h1>Lorem ipsum dolor sit: amet consectetur adipisicing elit.</h1>
            <p class="text-muted mt-4">19 Juli 2024</p>
        </div>

        <div class="artikel-detail-content">
            <div class="image-wrapper">
                <img src="<?= base_url('/img/artikel1.jpg') ?>" class="artikel-img img-fluid" alt="foto artikel 1" style="width: 750px; aspect-ratio: 16/9;" loading="lazy">
            </div>

            <!-- Tags Badges -->
            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="badge mt-4">
                    #Kategori
                </div>
            </div>

            <div class="py-4">
                <hr class="line-separator">
            </div>

            <div class="artikel-text">
                <strong>Kenapa Digital Marketing Penting?</strong>
                <br>Dalam dunia yang serba cepat dan terkoneksi seperti sekarang, digital marketing bukan lagi pilihan, tapi kebutuhan! Millennials dan Gen Z sekarang lebih suka berbelanja online dan mencari brand yang terhubung secara digital. Nah, inilah kenapa contoh digital marketing yang tepat bisa membantu bisnis kamu berkembang.
                <br>
                <br>Dengan strategi digital marketing yang pas, kamu bisa menjangkau lebih banyak pelanggan dan bikin brand kamu lebih mudah ditemukan. Mulai dari media sosial hingga video marketing, semuanya punya kekuatan tersendiri.
                <br>
                <br> <strong>1. Penggunaan Media Sosial yang Cerdas</strong>
                <br> Teman Jago, siapa sih yang nggak main media sosial hari ini? Facebook, Instagram, TikTok, dan Twitter jadi tempat favorit generasi muda buat terhubung dengan brand. Ini jadi salah satu contoh digital marketing paling efektif, asalkan kamu tahu cara mainnya.
                <br>
                <br> Gunakan konten interaktif, polling, dan live session buat lebih dekat dengan audiens kamu. Pastikan kontennya relevan dan menarik, sesuai dengan kepribadian brand kamu. Jadi, selain menjual, kamu juga bisa membangun hubungan yang lebih personal dengan pelanggan.
                <br>
                <br> <strong>2. SEO (Search Engine Optimization) yang Efektif</strong>
                <br> Selanjutnya, kita masuk ke SEO! Kamu pengin bisnis kamu muncul di hasil pencarian teratas Google, kan? Nah, SEO yang baik akan membantu kamu mencapai itu. Penggunaan kata kunci yang tepat, optimasi konten, dan kecepatan loading website yang cepat adalah bagian penting dari SEO.
                <br>
                <br>Dengan teknik SEO yang solid, website kamu akan lebih mudah ditemukan oleh calon pelanggan yang memang sedang mencari produk atau jasa seperti yang kamu tawarkan.
                <br>
                <br> <strong>3. Email Marketing yang Personal dan Engaging</strong>
                <br> Jangan anggap remeh email marketing, ya, Teman Jago. Walaupun udah lama ada, strategi ini masih jadi salah satu contoh digital marketing yang paling efektif buat membangun hubungan lebih personal dengan pelanggan.
                <br>
                <br> Kirimkan email yang informatif dan personal, seperti newsletter mingguan atau penawaran eksklusif, biar pelanggan kamu merasa spesial. Dengan begitu, kamu bisa menjaga hubungan baik dan meningkatkan loyalitas.
                <br>
                <br><strong>4. Influencer Marketing yang Menggugah</strong>
                <br> Nggak bisa dipungkiri, influencer punya pengaruh besar, terutama di kalangan Gen Z dan millennials. Kerjasama dengan influencer yang punya pengikut loyal bisa membantu brand kamu dilihat oleh audiens yang lebih luas.
                <br>
                <br> Cari influencer yang sesuai dengan bidang bisnis kamu, dan buat kolaborasi yang autentik. Influencer marketing ini adalah contoh digital marketing yang nggak cuma bikin brand kamu dikenal, tapi juga dipercaya.
                <br>
                <br> <strong>5. PPC (Pay-Per-Click) untuk Hasil Cepat</strong>
                <br> Kamu pengin hasil yang cepat dan instan? Nah, iklan berbayar atau PPC bisa jadi jawabannya. PPC memungkinkan kamu menargetkan audiens spesifik dan hanya membayar ketika ada yang mengklik iklan kamu.
                <br>
                <br> Meskipun membutuhkan budget, hasilnya bisa sangat efektif buat menambah trafik ke website kamu dalam waktu singkat. Pastikan kamu tahu cara mengelola kampanye iklan agar nggak boros biaya, ya!
                <br>
                <br> <strong>6. Content Marketing yang Menarik dan Relevan</strong>
                <br> Konten adalah segalanya, Teman Jago! Baik itu artikel, blog, infografis, atau video, pastikan konten kamu memberikan nilai tambah buat audiens. Ini salah satu contoh digital marketing yang terbukti bisa bikin pelanggan datang lagi dan lagi.
                <br>
                <br> Sajikan konten yang nggak cuma menarik, tapi juga relevan dan informatif. Dengan content marketing yang tepat, kamu bisa meningkatkan kepercayaan dan keterlibatan audiens terhadap brand kamu.
                <br>
                <br> <strong>7. Video Marketing yang Bikin Terpikat</strong>
                <br> Generasi sekarang lebih suka konten visual. Maka dari itu, video marketing jadi salah satu contoh digital marketing yang nggak boleh kamu lewatkan. Mulai dari video pendek di TikTok hingga video edukatif di YouTube, semuanya bisa bikin audiens lebih tertarik dan engage dengan brand kamu.
                <br>
                <br> Video nggak cuma lebih mudah dipahami, tapi juga bisa lebih menyentuh emosi. Jadi, kalau belum memulai video marketing, sekarang waktu yang tepat!
                <br>
                <br> <strong>Kelebihan dan Kekurangan Digital Marketing Strategi</strong>
                <br>
                <br> <strong>Kelebihan:</strong>
                <br> Jangkauan yang luas Digital marketing memungkinkan kamu untuk menjangkau audiens global hanya dengan beberapa klik. Ini sangat cocok buat kamu yang pengen memperluas target pasar tanpa batasan geografis.
                <br>
                <br> Biaya yang relatif murah Dibandingkan dengan pemasaran tradisional, digital marketing biasanya memerlukan biaya yang lebih rendah. Kamu bisa menggunakan berbagai platform dengan budget yang disesuaikan dengan kebutuhan bisnis kamu.
                <br>
                <br> Bisa diukur dengan analitik Salah satu keunggulan utama dari digital marketing adalah kamu bisa mengukur performa kampanye secara real-time. Dengan tools analitik, kamu bisa tahu mana strategi yang berhasil dan mana yang perlu ditingkatkan.
                <br>
                <br> <strong>Kekurangan:</strong>
                <br> Persaingan yang ketat Karena jangkauannya yang luas, persaingan di dunia digital marketing juga sangat tinggi. Kamu harus terus berinovasi agar bisnismu bisa bersaing dengan kompetitor lain.
                <br>
                <br> Perubahan algoritma yang cepat Platform seperti Google dan media sosial sering mengubah algoritma mereka, yang bisa mempengaruhi visibilitas konten kamu. Kamu perlu terus update dengan tren terbaru untuk tetap relevan.
                <br>
                <br> Membutuhkan pembelajaran terus-menerus Teknologi dan strategi digital marketing terus berkembang. Kamu perlu belajar dan menyesuaikan diri agar tetap kompetitif. Ini memang jadi tantangan, tapi sekaligus peluang untuk selalu berinovasi.
                <br>
                <br> <strong>Kesimpulan</strong>
                <br> Teman Jago, dari 7 Contoh Digital Marketing yang kita bahas tadi, kamu udah punya banyak pilihan untuk membuat bisnismu lebih dikenal, terutama di kalangan Gen Z dan millennials. Setiap strategi punya kelebihan dan tantangan masing-masing. Mulai dari SEO yang membantu meningkatkan visibilitas, hingga influencer marketing yang bisa memperkuat branding dengan cara yang lebih personal.
                <br>
                <br> Tapi, jangan lupa, digital marketing juga punya beberapa kekurangan. Persaingan yang ketat dan perubahan algoritma yang cepat adalah hal yang perlu kamu perhatikan. Pastikan kamu selalu update dan siap beradaptasi agar bisnismu tetap berada di depan.
                <br>
                <br> Pada akhirnya, kunci sukses digital marketing adalah konsistensi dan kemauan untuk terus belajar. Jangan ragu buat mencoba strategi yang berbeda dan melihat mana yang paling cocok untuk bisnis kamu.
            </div>
        </div>

        <!-- Back Button -->
        <div class="artikel-detail-footer text-center mt-4">
            <a href="#" class="btn btn-primary">
                < Kembali ke Artikel</a>
        </div>
    </div>
</section>
<!-- artikel-detail section end -->

<!-- recommended articles section start -->
<section class="recommended-articles-section">
    <div class="container">
        <h2 class="text-center">Baca lainnya</h2>
        <div class="row">
            <!-- Card -->
            <div class="col-md-4 mt-4">
                <div class="card h-80">
                    <img src="<?= base_url('/img/artikel2.jpeg'); ?>" class="card-img-top img-fluid" alt="foto studio" style="object-fit: cover; object-position: center; aspect-ratio: 16/9;" loading="lazy">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <p class="card-text mb-0" style="font-size: 1rem;">19 Juli 2024</p>
                            <span class="badge">#Kategori</span>
                        </div>
                        <h5 class="card-title" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">Lorem ipsum dolor sit: amet consectetur adipisicing elit.</h5>
                        <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis expedita assumenda fugiat reiciendis sed eum, fuga quo voluptatem quas, deleniti, vel magnam reprehenderit doloremque ducimus illo suscipit. Sapiente, libero iusto.
                        </p>
                        <a href="#" class="btn mt-auto" style="width: 100%; display: block; text-align: center;">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Card -->
            <div class="col-md-4 mt-4">
                <div class="card h-80">
                    <img src="<?= base_url('/img/artikel3.webp'); ?>" class="card-img-top img-fluid" alt="foto studio" style="object-fit: cover; object-position: center; aspect-ratio: 16/9;" loading="lazy">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <p class="card-text mb-0" style="font-size: 1rem;">19 Juli 2024</p>
                            <span class="badge">#Kategori</span>
                        </div>
                        <h5 class="card-title" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">Lorem ipsum dolor sit: amet consectetur adipisicing elit.</h5>
                        <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis expedita assumenda fugiat reiciendis sed eum, fuga quo voluptatem quas, deleniti, vel magnam reprehenderit doloremque ducimus illo suscipit. Sapiente, libero iusto.
                        </p>
                        <a href="#" class="btn mt-auto" style="width: 100%; display: block; text-align: center;">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Card -->
            <div class="col-md-4 mt-4">
                <div class="card h-80">
                    <img src="<?= base_url('/img/artikel4.jpeg'); ?>" class="card-img-top img-fluid" alt="foto studio" style="object-fit: cover; object-position: center; aspect-ratio: 16/9;" loading="lazy">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <p class="card-text mb-0" style="font-size: 1rem;">19 Juli 2024</p>
                            <span class="badge">#Kategori</span>
                        </div>
                        <h5 class="card-title" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">Lorem ipsum dolor sit: amet consectetur adipisicing elit.</h5>
                        <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis expedita assumenda fugiat reiciendis sed eum, fuga quo voluptatem quas, deleniti, vel magnam reprehenderit doloremque ducimus illo suscipit. Sapiente, libero iusto.
                        </p>
                        <a href="#" class="btn mt-auto" style="width: 100%; display: block; text-align: center;">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- recommended articles section end -->

<?= $this->endSection(); ?>
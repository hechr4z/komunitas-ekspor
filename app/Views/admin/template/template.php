<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Member Jago Digital Maarketing</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="<?= base_url('/asset-user/images/Favicon_PRIBADI-Indonesia_20012024041928.jpeg') ?>">

    <!-- FontAwesome JS-->
    <script defer src="<?= base_url('fontawesome/all.min.js') ?>"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="<?= base_url('css/portal.css') ?>">

    <!-- test -->
    <script src="<?= base_url('assets/js/tinymce.min.js') ?>"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tiny',
            plugins: 'powerpaste advcode table lists checklist link image media',
            toolbar: 'undo redo | blocks | bold italic | bullist numlist checklist | code | table | link image media'
        });
    </script>
    <!-- end test -->

</head>

<body class="app">
    <?= $this->include('admin/layout/header'); ?>

    <div class="app-wrapper">

        <?= $this->renderSection('content'); ?>

    </div>

    <?= $this->renderSection('script'); ?>

    <script src="<?= base_url('js/popper.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>


    <!-- Page Specific JS -->
    <script src="<?= base_url('js/app.js') ?>"></script>
    <script src="<?= base_url('assets') ?>/js/lazysizes.min.js"></script>
    <!--  -->

    <!-- Menambahkan class active pada navbar -->
    <script>
        // // Ambil URL saat ini
        // var currentUrl = window.location.href;

        // // Dapatkan semua elemen tautan di dalam navbar
        // var navLinks = document.querySelectorAll("#app-nav-main .nav-link");

        // // Loop melalui setiap tautan untuk memeriksa URL saat ini
        // navLinks.forEach(function(link) {
        //     // Dapatkan href dari tautan
        //     var linkHref = link.getAttribute("href");

        //     // Cek apakah URL saat ini mengandung substring terkait dan tambahkan kelas "active" ke tautan yang sesuai
        //     if (
        //         (currentUrl.indexOf("dashboard") !== -1 && linkHref.indexOf("dashboard") !== -1) ||
        //         (currentUrl.indexOf("user") !== -1 && linkHref.indexOf("user") !== -1) ||
        //         (currentUrl.indexOf("dpc") !== -1 && linkHref.indexOf("dpc") !== -1) ||
        //         (currentUrl.indexOf("member") !== -1 && linkHref.indexOf("member") !== -1) ||
        //         (currentUrl.indexOf("pengumuman") !== -1 && linkHref.indexOf("pengumuman") !== -1) ||
        //         (currentUrl.indexOf("dpd") !== -1 && linkHref.indexOf("dpd") !== -1) ||
        //     ) {
        //         link.classList.add("active");
        //     }
        // });

        // document.addEventListener("DOMContentLoaded", function () {
        //     // Ambil URL saat ini
        //     var currentUrl = window.location.href;

        //     // Dapatkan semua elemen tautan di dalam navbar
        //     var navLinks = document.querySelectorAll("#app-nav-main .nav-link");

        //     // Loop melalui setiap tautan untuk memeriksa URL saat ini
        //     navLinks.forEach(function (link) {
        //         // Dapatkan href dari tautan
        //         var linkHref = link.getAttribute("href");

        //         // Cek apakah URL saat ini mengandung substring terkait dan tambahkan kelas "active" ke tautan yang sesuai
        //         if (currentUrl.indexOf(linkHref) !== -1) {
        //             link.classList.add("active");
        //         }
        //     });
        // });

        // Ambil URL saat ini
        var currentUrl = window.location.href;

        // Dapatkan semua elemen tautan di dalam navbar
        var navLinks = document.querySelectorAll("#app-nav-main .nav-link");

        // Loop melalui setiap tautan untuk memeriksa URL saat ini
        navLinks.forEach(function(link) {
            // Dapatkan href dari tautan
            var linkHref = link.getAttribute("href");

            // Cek apakah URL saat ini mengandung substring terkait dan tambahkan kelas "active" ke tautan yang sesuai
            if (currentUrl.indexOf("admin/member") !== -1 && linkHref.indexOf("admin/member") !== -1) {
                link.classList.add("active");
            } else if (
                (currentUrl.indexOf("admin/dashboard") !== -1 && linkHref.indexOf("admin/dashboard") !== -1) ||
                (currentUrl.indexOf("admin/pengumuman") !== -1 && linkHref.indexOf("admin/pengumuman") !== -1) ||
                (currentUrl.indexOf("admin/dpd") !== -1 && linkHref.indexOf("admin/dpd") !== -1) ||
                (currentUrl.indexOf("admin/dpc") !== -1 && linkHref.indexOf("admin/dpc") !== -1) ||
                (currentUrl.indexOf("admin/user") !== -1 && linkHref.indexOf("admin/user") !== -1)
            ) {
                link.classList.add("active");
            }
        });
    </script>
</body>

</html>
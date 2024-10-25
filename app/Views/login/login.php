<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<style>
    body {
        margin: 0;
    }

    .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .form-group label {
        width: 100px;
        text-align: left;
        font-weight: normal;
    }

    .form-group input,
    .form-group select {
        flex: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .showpw {
        margin-left: 110px;
        margin-top: -5px;
        margin-bottom: 10px;
    }

    .required {
        color: red;
    }

    .btn-custom {
        background-color: #03AADE;
        text-align: center;
        color: #ffffff;
    }

    .btn-custom:hover {
        background-color: #F2BF02;
        color: #ffffff;
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(255, 255, 255, 255.0);
    }


    /*responsive mobile*/
    @media (max-width: 768px) {

        .form-group {
            display: block;
        }

        .form-group label {
            width: 100%;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
        }

        .showpw {
            margin-left: 2px;
        }

    }
</style>

<body style="background-image: url('<?php echo base_url('img/slider-1.jpg'); ?>'); background-size: cover; background-position: center; max-height: 200vh;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-5 mt-4 mb-4" style="width: 100vh; height:auto">
            <div class="mb-5 text-center">
                <a class="app-logo" href="/"><img style="height:60px;" src="<?php echo base_url('img/logokeiwarna.png'); ?>" alt="logo"></a>
            </div>
            <h4 class="auth-heading text-center mb-5">Masuk Sebagai Member Komunitas Ekspor Indonesia</h4>
            <div class="auth-form-container text-start">

                <div class="form-group">
                    <label for="username">Username<span class="required">*</span></label>
                    <input type="text" id="username" name="username" required placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                    <label for="password">Password<span class="required">*</span></label>
                    <input type="password" id="password" name="password" required placeholder="Masukkan Password">
                </div>

                <div class="showpw">
                    <input type="checkbox" id="show-password" onclick="togglePassword()"> Lihat Password
                </div>

                <button type="submit" class="btn btn-custom mt-3 mb-2" style="width: 100%;">Login Member</button>
                <button type="submit" class="btn btn-danger mb-2" style="width: 100%;">Kembali</button>
                </form>
            </div>
        </div><!--//card-->
    </div><!--//app-auth-body-->
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var showPassword = document.getElementById("show-password");
        if (showPassword.checked) {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>


</html>
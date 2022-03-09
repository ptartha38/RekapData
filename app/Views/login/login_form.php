<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <!-- favIcon -->
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/gambar/hacker.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- Css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/style.css" />
    <title>Mesin Cuan Online</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="<?php echo base_url('Login/auth'); ?>" method="POST" id="form-login" name="form-login" class="sign-in-form" autocomplete="off">
                    <img style="display: block; width: 200px; margin-left: auto; margin-right: auto; margin-bottom: 9;" src="<?= base_url() ?>/assets/img/gambar/hacker.png">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-address-card"></i>
                        <input type="text" maxlength="16" placeholder="Username" id="username_login" name="username_login" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="pass_signin" name="pass_signin" placeholder="Password" required />
                    </div>
                    <div class="input">
                        <input type="checkbox" onclick="signin_show()"> Show Password
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <img src="<?= base_url() ?>/assets/img/gambar/login.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Anda Sudah Mendaftar ?</h3>
                    <p>
                        Klik tombol di bawah ini untuk login...
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Login
                    </button>
                </div>
                <img src="<?= base_url() ?>/assets/img/gambar/doc.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="<?= base_url() ?>/assets/login/app.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>

<script>
    <?php if (session()->getFlashdata('status')) { ?>
        Swal.fire(
            'Selamat',
            '<?php echo $session->status ?>',
            'success'
        )
    <?php } ?>

    <?php if (session()->getFlashdata('login_error')) { ?>
        Swal.fire(
            'Terjadi Kesalahan',
            '<?php echo $session->login_error ?>',
            'error'
        )
    <?php } ?>

    function signin_show() {
        var x = document.getElementById("pass_signin");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
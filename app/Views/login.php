<?= $this -> extend('layout') ?>
<?= $this -> section('content') ?>
    <style>
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        .login-container h1 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-custom {
            width: 100%;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>

    <?php
        $username = [
            'name' => 'username',
            'id' => 'username',
            'value' => null,
            'class' => 'form-control',
        ];

        $password = [
            'name' => 'password',
            'id' => 'password',
            'class' => 'form-control',
        ];

        $session = session();
        $errors = $session -> getFlashdata('errors');
    ?>

    <div class="login-container">
        <?php if ($errors != null): ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Terjadi kesalahan</h4>
                <hr>
                <p class="mb-0">
                    <?php foreach($errors as $err) {
                        echo $err.'<br>';
                    } ?>
                </p>
            </div>
        <?php endif ?>

        <h1>Login</h1>

        <?= form_open('auth/login') ?>
            <div class="form-group">
                <?= form_label("Username", "username") ?>
                <?= form_input($username) ?>
            </div>
            <div class="form-group">
                <?= form_label("Password", "password") ?>
                <?= form_password($password) ?> 
            </div>
            <div class="form-group">
                <?= form_submit('login', 'Login', ['class' => 'btn btn-dark btn-custom']) ?>
            </div>
        <?= form_close() ?>
    </div>
<?= $this -> endSection() ?>

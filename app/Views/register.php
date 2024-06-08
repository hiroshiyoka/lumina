<?= $this -> extend('layout') ?>
<?= $this -> section('content') ?>
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

        $confirmPassword = [
            'name' => 'confirmPassword',
            'id' => 'confirmPassword',
            'class' => 'form-control',
        ];

        $session = session();
        $errors = $session -> getFlashdata('errors');
    ?>

    <h1>Register</h1>

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

    <?= form_open('auth/register') ?>
        <div class="form-group mt-4">
            <?= form_label("Username", "username") ?>
            <?= form_input($username) ?>
        </div>
        <div class="form-group">
            <?= form_label("Password", "password") ?>
            <?= form_password($password) ?> 
        </div>
        <div class="form-group">
            <?= form_label("Confirm Password", "confirmPassword") ?>
            <?= form_password($confirmPassword) ?> 
        </div>
        <div class="">
            <?= form_submit('register', 'Register', ['class' => 'btn btn-dark']) ?>
        </div>
    <?= form_close() ?>
<?= $this -> endSection() ?>
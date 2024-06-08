<?= $this -> extend('layout') ?>
<?= $this -> section('content') ?>
    <h1>Hello 
        <?php
            echo session() -> get('username');
        ?>
    </h1>
<?= $this -> endSection() ?>
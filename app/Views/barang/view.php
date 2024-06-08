<?= $this -> extend('layout') ?>
<?= $this -> section('content') ?>
    <h1>Barang</h1>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="<?= base_url('uploads/'.$barang -> gambar) ?>" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h1 class="text-success"><?= $barang -> nama ?></h1>
                <h4>Harga: <?= $barang -> harga ?></h4>
                <h4>Stok: <?= $barang -> stok ?></h4>
            </div>
        </div>
    </div>
<?= $this -> endSection() ?>
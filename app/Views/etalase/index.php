<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .container {
        margin-top: 50px;
    }
    .card {
        margin-bottom: 30px;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card-header {
        background: linear-gradient(45deg, #6a11cb, #2575fc);
        color: #fff;
        padding: 15px;
    }
    .card-body {
        padding: 20px;
    }
    .card-body img {
        max-height: 200px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 15px;
    }
    .card-footer {
        background: #f1f1f1;
        padding: 15px;
    }
    .btn-custom {
        background-color: #6a11cb;
        border: none;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        transition: background-color 0.3s;
    }
    .btn-custom:hover {
        background-color: #2575fc;
    }
</style>

<div class="container">
    <div class="row">
        <?php foreach($model as $m): ?>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        <span>
                            <strong><?= $m->nama ?></strong>
                        </span>
                    </div>
                    <div class="card-body">
                        <img class="img-thumbnail" src="<?= base_url('uploads/'.$m->gambar) ?>" alt="<?= $m->nama ?>">
                        <h5 class="mt-3 text-dark">
                            <?= "Rp ".number_format($m->harga, 2, ',', '.') ?>
                        </h5>
                        <p class="text-info">Stok: <?= $m->stok ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= site_url('etalase/beli/'.$m->id) ?>" class="btn btn-custom">Beli</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection() ?>

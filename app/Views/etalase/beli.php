<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
    $id_barang = [
        'name' => 'id_barang',
        'id' => 'id_barang',
        'value' => $model->id,
        'type' => 'hidden'
    ];

    $id_pembeli = [
        'name' => 'id_pembeli',
        'id' => 'id_pembeli',
        'value' => session()->get('id'),
        'type' => 'hidden'
    ];

    $jumlah = [
        'name' => 'jumlah',
        'id' => 'jumlah',
        'value' => 1,
        'min' => 1,
        'class' => 'form-control',
        'type' => 'number',
        'max' => $model->stok
    ];

    $total_harga = [
        'name' => 'total_harga',
        'id' => 'total_harga',
        'value' => null,
        'class' => 'form-control',
        'readonly' => true
    ];

    $ongkir = [
        'name' => 'ongkir',
        'id' => 'ongkir',
        'value' => null,
        'class' => 'form-control',
        'readonly' => true
    ];

    $alamat = [
        'name' => 'alamat',
        'id' => 'alamat',
        'class' => 'form-control',
        'value' => null
    ];

    $submit = [
        'name' => 'submit',
        'id' => 'submit',
        'type' => 'submit',
        'value' => 'Beli',
        'class' => 'btn btn-dark'
    ];
?>

<style>
    .product-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 30px;
    }
    .product-card, .form-card {
        width: 80%;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .product-card img {
        width: 100%;
        max-width: 300px;
        height: auto;
        border-radius: 10px;
        margin: 0 auto;
        display: block;
    }
    .product-card h1 {
        font-size: 1.5rem;
        text-align: center;
        color: #333;
    }
    .product-card h4 {
        font-size: 1.2rem;
        text-align: center;
        color: #333;
    }
    .form-group label {
        font-weight: bold;
        color: #555;
    }
    .form-control {
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 15px;
    }
    .btn-custom {
        background-color: #ff5722;
        border: none;
        color: #fff;
        padding: 12px 20px;
        border-radius: 8px;
        width: 100%;
        transition: background-color 0.3s;
    }
    .btn-custom:hover {
        background-color: #e64a19;
    }
    .shipping-info h4 {
        font-size: 1.5rem;
        color: #333;
    }
    .shipping-info select {
        margin-top: 10px;
        width: 100%;
        padding: 10px;
        border-radius: 8px;
    }
    #estimasi {
        color: #ff5722;
    }
</style>

<div class="container">
    <div class="product-container">
        <!-- Gambar Produk -->
        <div class="product-card">
            <img class="img-fluid" src="<?= base_url('uploads/'.$model->gambar) ?>" alt="<?= $model->nama ?>">
            <h1><?= $model->nama ?></h1>
            <h4>Harga: <?= "Rp ".number_format($model->harga, 2, ',', '.') ?></h4>
            <h4>Stok: <?= $model->stok ?></h4>
        </div>

        <!-- Form Produk -->
        <div class="form-card">
            <div class="shipping-info">
                <h4>Pengiriman</h4>
                <!-- Provinsi -->
                <div class="form-group">
                    <label for="provinsi">Pilih Provinsi</label>
                    <select class="form-control" id="provinsi">
                        <option value="">Pilih Provinsi</option>
                        <?php foreach($provinsi as $p): ?>
                            <option value="<?= $p->province_id ?>">
                                <?= $p->province ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- Kabupaten -->
                <div class="form-group">
                    <label for="kabupaten">Pilih Kabupaten/Kota</label>
                    <select class="form-control" id="kabupaten">
                        <option value="">Pilih Kabupaten</option>
                    </select>
                </div>

                <!-- Service -->
                <div class="form-group">
                    <label for="service">Pilih Service</label>
                    <select class="form-control" id="service">
                        <option value="">Pilih Service</option>
                    </select>
                </div>

                <strong>Estimasi: <span id="estimasi"></span></strong>
            </div>

            <hr>

            <?= form_open('etalase/beli') ?>
                <?= form_input($id_barang) ?>
                <?= form_input($id_pembeli) ?>

                <div class="form-group">
                    <?= form_label('Alamat', 'alamat') ?>
                    <?= form_input($alamat) ?>
                </div>
                <div class="form-group">
                    <?= form_label('Jumlah Pembelian', 'jumlah') ?>
                    <?= form_input($jumlah) ?>
                </div>
                <div class="form-group">
                    <?= form_label('Ongkir', 'ongkir') ?>
                    <?= form_input($ongkir) ?>
                </div>
                <div class="form-group">
                    <?= form_label('Total Harga', 'total_harga') ?>
                    <?= form_input($total_harga) ?>
                </div>
                <div class="text-right">
                    <?= form_submit($submit, 'Beli', ['class' => 'btn btn-custom']) ?>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>

<script>
    $(document).ready(function() {
        var jumlah_pembelian = 1;
        var harga = <?= $model -> harga ?>;
        var ongkir = 0;

        $("#provinsi").on('change', function() {
            $("#kabupaten").empty().append('<option value="">Pilih Kabupaten</option>');
            var id_province = $(this).val();

            $.ajax({
                url : "<?= site_url('etalase/getcity') ?>",
                type : 'GET',
                data : {
                    'id_province': id_province,
                },
                dataType : 'json',
                success : function(data) {
                    var results = data["rajaongkir"]["results"];

                    for(var i = 0; i < results.length; i++) {
                        $("#kabupaten").append($('<option>', {
                            value : results[i]["city_id"],
                            text : results[i]['city_name']
                        }));
                    }
                },
            });
        });

        $("#kabupaten").on('change', function() {
            $("#service").empty().append('<option value="">Pilih Service</option>');
            var id_city = $(this).val();

            $.ajax({
                url: "<?= site_url('etalase/getcost') ?>",
                type: 'GET',
                data: {
                    'origin': 154,
                    'destination': id_city,
                    'weight': 1000,
                    'courier': 'jne'
                },
                dataType: 'json',
                success: function(data) {
                    var results = data["rajaongkir"]["results"][0]["costs"];

                    for(var i = 0; i < results.length; i++) {
                        var text = results[i]["description"] + "("+results[i]["service"]+")";

                        $("#service").append($('<option>', {
                            value: results[i]["cost"][0]["value"],
                            text: text,
                            etd: results[i]["cost"][0]["etd"]
                        }));
                    }
                },
            });
        });

        $("#service").on('change', function() {
            var estimasi = $('option:selected', this).attr('etd');
            ongkir = parseInt($(this).val());
            $("#ongkir").val(ongkir);
            $("#estimasi").html(estimasi + " Hari");
            var total_harga = (jumlah_pembelian * harga) + ongkir;
            $("#total_harga").val(total_harga);
        });

        $("#jumlah").on('change', function() {
            jumlah_pembelian = $("#jumlah").val();
            var total_harga = (jumlah_pembelian * harga) + ongkir;
            $("#total_harga").val(total_harga);
        });
    });
</script>

<?= $this->endSection() ?>

<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Barang extends Entity {
        public function setgambar($file) {
            $fileName = $file -> getRandomName();
            $writePath = './uploads';
            $file -> move($writePath, $fileName);
            $this -> attributes['gambar'] = $fileName;

            return $this;
        }
    }
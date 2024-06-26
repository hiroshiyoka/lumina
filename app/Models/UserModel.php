<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class UserModel extends Model {
        protected $table = 'users';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'username', 'avatar', 'password', 'salt', 'created_date', 'created_by', 'updated_date', 'updated_by'
        ];
        protected $returnType = 'App\Entities\Users';
        protected $useTimestamps = false;
    }
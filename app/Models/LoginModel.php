<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login';
    protected $allowedFields = ['Username', 'Password'];

    public function ambil($usr)
    {
        return $this->where(['Username' => $usr]);
    }
}

<?php

namespace App\Models;

// memanggil model codeigneter
use CodeIgniter\Model;

class Auth_model extends Model
{
    // buat table user modifiernya protected
    protected $table = "users";

    // membuat fungsi regis untuk memasukan data
    public function register($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query ? true : false;
    }

    // membuat fungsi cek_login untuk mengambil data user
    public function cek_login($email)
    {
        $query = $this->table($this->table)
            ->where('email', $email)
            ->countAll();

        if ($query > 0) {
            $hasil = $this->table($this->table)
                ->where('email', $email)
                ->limit(1)
                ->get()
                ->getRowArray();
        } else {
            $hasil = array();
        }
        return $hasil;
    }
}

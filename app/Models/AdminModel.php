<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    // PERBAIKAN PENTING:
    // Arahkan ke tabel 'admins' (sesuai migration), bukan 'admin'.
    protected $table            = 'admins'; 
    
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Pastikan semua kolom ini terdaftar agar bisa di-update
    protected $allowedFields    = [
        'name',         // Nama Panggilan
        'full_name',    // Nama Lengkap
        'role',         // Jabatan (ex: Master Barber)
        'description',  // Deskripsi Diri
        'skill_title',  // Judul Skill
        'photo'         // Foto Profil
    ];
}
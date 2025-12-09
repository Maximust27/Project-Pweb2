<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admins'; 
    
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Pastikan semua kolom ini terdaftar agar bisa di-update
    protected $allowedFields    = [
        'name',         
        'full_name',
        'role',         
        'description',
        'skill_title',  
        'photo'         
    ];
}
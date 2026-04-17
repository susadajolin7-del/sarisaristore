<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['name', 'email', 'password', 'role'];

    // Dates
    // Set to FALSE to prevent database crash if missing created_at/updated_at columns
    protected $useTimestamps = false; 
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // This helps with password hashing automatically before saving
    protected $beforeInsert =['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
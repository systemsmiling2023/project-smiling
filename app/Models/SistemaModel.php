<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

// date_default_timezone_set('America/El_Salvador');

class SistemaModel extends Model
{

    protected $db;
    protected $builder;

    // public function __construct()
    // {
    //     $this->db = \Config\Database::connect();
    //     $this->builder = $this->db->table('bi_bitacoras');
    // }

    protected $table = 'bi_bitacoras';
    protected $primaryKey = 'bitacoraId';
    // protected $allowedFields = ['tidoDocId', 'tipoDocumento'];

    public function bitacora($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $builder->insert($data);
    }
}

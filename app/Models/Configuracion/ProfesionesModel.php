<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class ProfesionesModel extends Model
{

    protected $table = 'co_profesiones';
    protected $primaryKey = 'profesionId';
    protected $allowedFields = ['profesionId', 'profesion'];

    public function guardarProfesion($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
        $id = $db->insertID();
 
        return $id;
    }

    public function eliminarProfesion($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['profesionId' => $id]);
    }

    public function actualizarProfesion($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('profesionId', $id);
        $update = $builder->update($data);
    }

    public function obtenerElemento($id){
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->where('profesionId', $id);
        $dato = $builder->get()->getResultArray();
        return $dato;
    }
}

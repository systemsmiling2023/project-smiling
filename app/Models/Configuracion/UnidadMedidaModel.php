<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class UnidadMedidaModel extends Model
{
    protected $table = 'in_unidades_medida';
    protected $primaryKey = 'unidadId';
    protected $allowedFields = ['unidad', 'abreviatura', 'medidaInter'];

    public function eliminarUMedida($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['unidadId' => $id]);
    }

    public function obtenerElemento($id){
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->where('unidadId', $id);
        $dato = $builder->get()->getResultArray();
        return $dato;
    }

    public function guardarUnidadMedida($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
        $id = $db->insertID();

        return $id;
    }

    public function actualizarUnidadMedida($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('unidadId', $id);
        $update = $builder->update($data);
    }

    public function validar($tabla, $unidad)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($tabla);
        $builder->select('*');
        $builder->where('unidad', $unidad);

        $numRows = $builder->get()->getNumRows();
       
        if($numRows>0){
            return false;
        }else{
            return true;
        }
    }
}
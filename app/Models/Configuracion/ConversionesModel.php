<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class ConversionesModel extends Model
{

    protected $table = 'in_unidad_detalle';
    protected $primaryKey = 'uniDetId';
    protected $allowedFields = ['uniDetId', 'unidadId', 'presentacion','factorConversion','insumoId'];

    public function guardarConversion($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarConversion($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['uniDetId' => $id]);
    }

    public function actualizarConversion($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('uniDetId', $id);
        $update = $builder->update($data);
    }

    public function nombreUnidad()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('in_unidades_medida a');
        $builder->select('*');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function nombreInsumo()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('in_insumos');
        $builder->select('*');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function mostrarJoin()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('in_unidad_detalle a');
        $builder->select('
        a.uniDetId, b.unidadId, b.unidad, a.presentacion, a.factorConversion, c.insumoId, c.insumo
        ');
        $builder->join('in_unidades_medida b','a.unidadId = b.unidadId');
        $builder->join('in_insumos c','a.insumoId = c.insumoId');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

}
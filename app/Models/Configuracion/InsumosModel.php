<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class InsumosModel extends Model
{

    protected $table = 'in_insumos';
    protected $primaryKey = 'insumoId';
    protected $allowedFields = ['insumo', 'categoriaId', 'fechaUltCompra', 'costoUltCompra', 'cantidadMax', 'cantidadMin',
                                'cantidadAct', 'unidadId'];

    public function mostrar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('in_insumos ins');
        $builder->select('ins.insumoId,
                        ins.insumo,
                        ins.categoriaId,
                        ins.fechaUltCompra,
                        ins.costoUltCompra,
                        ins.cantidadMax,
                        ins.cantidadMin,
                        ins.cantidadAct,
                        ins.unidadId,
                        catg.categoria,
                        unme.unidad,
                        SUM(exs.cantidadAct) AS totalCantidadAct', false);      
        $builder->join('in_categorias catg', 'catg.categoriaId = ins.categoriaId');
        $builder->join('in_unidades_medida unme', 'unme.unidadId = ins.unidadId');
        $builder->join('in_existencias exs', 'ins.insumoId  = exs.insumoId', 'left');
        $builder->groupBy('  ins.insumoId,
        ins.insumo,
        ins.categoriaId,
        ins.fechaUltCompra,
        ins.costoUltCompra,
        ins.cantidadMax,
        ins.cantidadMin,
        ins.cantidadAct,
        ins.unidadId,
        catg.categoria,
        unme.unidad');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function mostrarCategoria()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('in_categorias');
        $builder->select('*');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function mostrarUnidades()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('in_unidades_medida');
        $builder->select('*');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function guardarInsumo($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
        $id = $db->insertID();

        return $id;
    }

    public function obtenerElemento($id){
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->where('insumoId', $id);
        $dato = $builder->get()->getResultArray();
        return $dato;
    }

    public function actualizarInsumos($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('insumoId', $id);
        $update = $builder->update($data);
    }

    public function eliminarInsumos($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['insumoId' => $id]);
    }


    public function validar($tabla, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($tabla);
        $builder->select('*');
        $builder->where('insumoId', $id);

        $numRows = $builder->get()->getNumRows();
       
        if($numRows>0){
            return false;
        }else{
            return true;
        }
    }

    public function validarInsumo($tabla, $insumo)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($tabla);
        $builder->select('*');
        $builder->where('insumo', $insumo);

        $numRows = $builder->get()->getNumRows();
       
        if($numRows>0){
            return false;
        }else{
            return true;
        }
    }


}
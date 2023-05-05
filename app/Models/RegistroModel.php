<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistroModel extends Model
{

    public function municipios()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_municipios a');
        $builder->select('a.municipioId id, concat(a.nombreMunicipio, ", ", b.nombreDepto) nombre');
        $builder->join('co_departamentos b', 'a.departamentoId = b.departamentoId');
        $builder->orderBy('b.nombreDepto', 'ASC');
        $builder->orderBy('a.nombreMunicipio', 'ASC');
        $datos = $builder->get()->getResultArray();
        return($datos);
    }

    public function guardarPersona($persona)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_personas');
        $insert = $builder->insert($persona);
        $insertId = $db->insertID();
        $db->close();
        return $insertId;
    }

    public function validarPersona($persona){


        $db = \Config\Database::connect();
        $builder = $db->table('pe_personas');
        $builder->select('*');
        $builder->like('nombres', $persona['nombres'] );
        $builder->like('primerApellido', $persona['primerApellido']);
        $builder->like('segundoApellido', $persona['segundoApellido'] );
        $builder->where('fechaNacimiento', $persona['fechaNacimiento']);
        $builder->where('sexo', $persona['sexo']);
        $builder->where('estado', '1');

        $resultado = $builder->get()->getNumRows();

        if($resultado>0){
            return false;
        }else{
            return true;
        }
    }

    public function guardarDocumento($documento)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_documentos');
        $insert = $builder->insert($documento);
        $insertId = $db->insertID();
        $db->close();
        return $insertId;
    }

    public function guardarContacto($contacto)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table('co_contactos');
        $insert = $builder->insert($contacto);
        $insertId = $db->insertID();
        return $insertId;
    }


}

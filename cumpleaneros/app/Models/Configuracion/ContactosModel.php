<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class ContactosModel extends Model
{
    protected $table = 'co_contactos';
    protected $primaryKey = 'contactoId';
    protected $allowedFields = ['contactoId', 'tipoContId', 'contacto', 'principal', 'personaId'];


    public function mostrar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_contactos contc');
        $builder->select('
            contc.contactoId AS contactoId,
            tcontc.tipoContacto AS tipoContacto,
            contc.contacto AS contacto,
            contc.principal AS principal,
            contc.personaId AS personaId');      
        $builder->join('co_tipo_contacto tcontc', 'tcontc.tipoContId = contc.tipoContId');
        $builder->where('contc.personaId', $id);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function mostrarTipoContacto()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_tipo_contacto');
        $builder->select('*');
        $query = $builder->get()->getResultArray();
        return $query;  
    }

    
    public function consultar($contacto, $personaId) {
        $query = $this->db->query("SELECT COUNT(contactoId) AS numContacto 
                                    FROM co_contactos 
                                    WHERE contacto = '$contacto' 
                                    AND personaId = '$personaId'");
        return $query->getRow('numContacto');
    }

    public function guardarContacto($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarContacto($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['contactoId' => $id]);
    }

    public function actualizarContactos($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('contactoId', $id);
        $update = $builder->update($data);
    }

}
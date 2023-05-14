<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'co_usuarios';
    protected $primaryKey = 'usuarioId';
    protected $allowedFields = ['usuarioId', 'usuario', 'clave', 'intentosFallidos','limiteIntentosFallidos',
                'personaId','rolId'];

    

    public function mostrar()
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table('co_roles r');
        $builder->select('*');
        $builder->join('co_usuarios u', 'r.rolId = u.rolId');
        $builder->join('pe_personas pe', 'pe.personaId = u.personaId');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function eliminarUsuarios($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['usuarioId' => $id]);
    }
    
    public function mostrarPersona()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_personas pe');
        $builder->select('
                pe.nombres AS nombres,
                pe.primerApellido AS primerApellido,
                pe.segundoApellido AS segundoApellido,
                pe.personaId AS personaId,
                us.personaId AS user_personaId');
        $builder->join('co_usuarios us', 'pe.personaId = us.personaId', 'left');
        $builder->where('us.personaId IS NULL');
        $query = $builder->get()->getResultArray();
        return $query;
    }
    
    public function user($username) {
        
        $query = $this->db->query("SELECT usuarioId from co_usuarios where usuario = '$username'");
        return $query->getRow();
    }

    public function roles($roles, $persona) {
        
        $query = $this->db->query("SELECT * from co_usuarios where rolId = '$roles' and personaId = '$persona'");
        return $query->getRow();
    }

    public function clave($clave) {
        
        $query = $this->db->query("SELECT usuarioId from co_usuarios where clave = '$clave'");
        return $query->getRow();
    }

    public function mostrarRol()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_roles');
        $builder->select('*');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function guardarUsuario($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function actualizarUsuario($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('usuarioId', $id);
        $update = $builder->update($data);
    }


    


    
}
<?php

namespace App\Models;

// use App\Models\SistemaModel;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class LoginModel extends Model
{

    public function buscarUsuario($usuario){
        $db = \Config\Database::connect();
        $builder = $db->table('co_usuarios');
        $builder->selectCount('usuario');
        $builder->where('usuario', $usuario);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function validarLogin($usuario)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('co_usuarios a');
        $builder->select('a.usuario, a.clave, 
                          a.intentosFallidos, 
                          a.limiteIntentosFallidos,
                          a.usuarioId,
                          a.rolId,
                          b.personaId, 
                          b.nombres, 
                          b.primerApellido,
                          b.sexo');
        $builder->join('pe_personas b', 'a.personaId = b.personaId');
        $builder->where('a.usuario', $usuario);
        $builder->limit(1);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function intentoFallido($usuario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_usuarios');
        $builder->set('intentosFallidos', 'intentosFallidos+1', false);
        $builder->where('usuario', $usuario);
        $builder->update();
    }

    public function reiniciarIntentosFallidos($usuario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_usuarios');
        $builder->set('intentosFallidos', '0', false);
        $builder->where('usuario', $usuario);
        $builder->update();
    }
}

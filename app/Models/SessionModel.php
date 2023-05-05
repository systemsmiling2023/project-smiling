<?php

namespace App\Models;

use CodeIgniter\Model;

class SessionModel extends Model
{

    public function crearSesion($login)
    {
        session();
        session()->set([
            'usuario' => $login['usuario'],
            'persona' => $login['persona'],
            'usuarioId' => $login['usuarioId'],
            'personaId' => $login['personaId'],
            'rolId' => $login['rolId'],
            'sexo' => $login['sexo'],
            'logged' => true
        ]);
    }

    public function eliminarSesion()
    {
        session()->destroy();
        session()->set([
            'logged' => false
        ]);
    }
}

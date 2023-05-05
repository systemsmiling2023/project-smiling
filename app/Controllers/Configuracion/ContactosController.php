<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\TipoContactoModel;

class ContactosController extends BaseController
{
    public function lookup()
    {
        $tipocontacto = new TipoContactoModel();
        $data['tipoContacto'] = $tipocontacto->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function getId()
    {
        $tipocontacto = new TipoContactoModel();
        $id = $this->request->getPost('id');
        $data['tipoContacto'] = $tipocontacto->find($id);
        return $this->response->setJSON($data);
    }

    public function create()
    {
        $tipocontacto = new TipoContactoModel();
        $data = [
            'tipoContacto' => $this->request->getPost('tipoContacto')
        ];
        $tipocontacto->guardarContacto($data);
        return $tipocontacto;
    }

    public function update()
    {
        $tipocontacto = new TipoContactoModel();
        $id = $this->request->getPost('id');
        $data = [
            'tipoContacto' => $this->request->getPost('tipoContacto')
        ];
        $tipocontacto->actualizarContacto($id, $data);
        return $tipocontacto;
    }

    public function delete()
    {
        $tipocontacto = new TipoContactoModel();
        $id = $this->request->getPost('id');
        $tipocontacto->eliminarContacto($id);
        return $tipocontacto;
    }
}

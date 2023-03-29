<?php

namespace App\Controllers;

use App\Models\InteresesModel;

class InteresesController extends BaseController
{
    public function buscar()
    {
        $intereses = new InteresesModel();
        $data['intereses'] = $intereses->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerId()
    {
        $intereses = new InteresesModel();
        $id = $this->request->getPost('id');
        $data['nombreInteres'] = $intereses->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $intereses = new InteresesModel();
        $data = [
            'nombreInteres' => $this->request->getPost('nombreInteres')
        ];
        $intereses->guardarInteres($data);
        return $intereses;
    }

    public function actualizar()
    {
        $intereses = new InteresesModel();
        $id = $this->request->getPost('id');
        $data = [
            'nombreInteres' => $this->request->getPost('nombreInteres')
        ];
        $intereses->actualizarInteres($id, $data);
        return $intereses;
    }

    public function eliminar()
    {
        $intereses = new InteresesModel();
        $id = $this->request->getPost('id');
        $intereses->eliminarInteres($id);
        return $intereses;
    }
}

<?php

namespace App\Controllers;

use App\Models\TipoDocumentoModel;
use App\Models\TipoDocumentoModel2;

class DocumentosController extends BaseController
{
    public function buscar()
    {
        $tipodocumento = new TipoDocumentoModel();
        $data['tipoDocumento'] = $tipodocumento->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerId()
    {
        $tipodocumento = new TipoDocumentoModel();
        $id = $this->request->getPost('id');
        $data['tipoDocumento'] = $tipodocumento->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $tipodocumento = new TipoDocumentoModel();
        $data = [
            'tipoDocumento' => $this->request->getPost('tipoDocumento')
        ];
        $tipodocumento->guardarDocumento($data);
        return $tipodocumento;
    }

    public function actualizar()
    {
        $tipodocumento = new TipoDocumentoModel();
        $id = $this->request->getPost('id');
        $data = [
            'tipoDocumento' => $this->request->getPost('tipoDocumento')
        ];
        $tipodocumento->actualizarDocumento($id, $data);
        return $tipodocumento;
    }

    public function eliminar()
    {
        $tipodocumento = new TipoDocumentoModel();
        $id = $this->request->getPost('id');
        $tipodocumento->eliminarDocumento($id);
        return $tipodocumento;
    }
}

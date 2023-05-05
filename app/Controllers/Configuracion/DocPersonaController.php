<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\DocumentosModel;

class DocPersonaController extends BaseController
{
    public function mostrar()
    {
        $documento = new DocumentosModel();
        $id = $this->request->getPost('id');
        $data['documet'] = $documento->mostrar($id);
        return $this->response->setJSON($data);
   
    }

    public function TipoDoc()
    {
        $documento = new DocumentosModel();
        $data['tipoDocumentos'] = $documento->mostrarTipoDocumento();
        return $this->response->setJSON($data);
   
    }
    
    public function almacenar()
    {
        $documento = new DocumentosModel();

        $tipodocumentos = $this->request->getPost('tipoDocumento');
        $personaId = $this->request->getPost('personaId');

        // Parece que cuando ya existe un documento, la consulta se ejecuta esa cantidad
        // Mejor hagamos un count y valide si es mayor a cero es porque ya existe
        $documentoExists = $documento->consultar($tipodocumentos,$personaId);

        if ($documentoExists > 0) {
            $result = array("ERROR" => true, "data" => 'No se permite ingresar un mismo documento');
        }else{
            $data = [
                    'tipoDocId' => $tipodocumentos,
                    'documento' => $this->request->getPost('documento'),
                    'personaId' => $personaId    
            ];

            $documento->guardarDocumento($data);
            $result = array("ERROR" => false, "data" => 'Documento agregado con éxito');

        }
        return $this->response->setJSON($result);
    }

    public function obtenerId()
    {
        $documento = new DocumentosModel();
        $id = $this->request->getPost('id');
        $data['documentos'] = $documento->find($id);
        return $this->response->setJSON($data);

    }

    public function actualizar()
    {
        $documento = new DocumentosModel();
        $id = $this->request->getPost('documentoId');
        $data = [
            'tipoDocId' => $this->request->getPost('tipoDocumento'),
            'documento' => $this->request->getPost('documento'),
        ];
        $documento->actualizarDocumento($id, $data);
        return $documento;
    }

    public function eliminar()
    {
        $documento = new DocumentosModel();
        $id = $this->request->getPost('id');
        $documento->eliminarDoc($id);
        return $documento;
    }
}
<?php

namespace App\Controllers\Configuracion;
use App\Controllers\BaseController;
use App\Models\Configuracion\TipoDocumentoModel;
use App\Models\SistemaModel;

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
        $sistema = new SistemaModel();

        $data = [
            'tipoDocumento' => strtoupper($this->request->getPost('tipoDocumento'))
        ];


        if($sistema->validarExistencia('co_tipo_documento', $data)){
            $insertedId = $tipodocumento->guardarDocumento($data);
            
            // GUARDAR EN BITACORA
            $regBitacora = array(
                'idMovimiento' => 5,
                'fechaHora' => date('Y-m-d H:i:s'),
                'idTabla' => $insertedId,
                'tablaRelacionada' => 'co_tipo_documento',
                'usuario' => session('usuarioId'), 
                'detalle' => json_encode($data)
            );

            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Agregado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar el tipo de documento');
        }   

        return json_encode($result);
    }

    public function actualizar()
    {
        $tipodocumento = new TipoDocumentoModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoActualizar = $tipodocumento->obtenerElemento($id);

        $data = [
            'tipoDocumento' => strtoupper($this->request->getPost('tipoDocumento'))
        ];

        $detalleBitacora = array();
        $detalleBitacora['dato_anterior'] = $datoActualizar;
        $detalleBitacora['dato_nuevo'] = $data;
        $detalleBitacora = json_encode($detalleBitacora);


        // GUARDAR EN BITACORA
        $regBitacora = array(
            'idMovimiento' => 6,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => $id,
            'tablaRelacionada' => 'co_tipo_documento',
            'usuario' => session('usuarioId'), 
            'detalle' => $detalleBitacora
        );

        if($sistema->validarExistencia('co_tipo_documento', $data)){
            $tipodocumento->actualizarDocumento($id, $data);
            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Actualizado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar el tipo de documento');
        } 

        return json_encode($result);
    }

    public function eliminar()
    {
        $tipodocumento = new TipoDocumentoModel();
        $sistema = new SistemaModel();
        
        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoEliminar = $tipodocumento->obtenerElemento($id);
        $datoEliminar = json_encode($datoEliminar);

        $tipodocumento->eliminarDocumento($id);


        // GUARDAR EN BITACORA
        $regBitacora = array(
            'idMovimiento' => 7,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => $id,
            'tablaRelacionada' => 'co_tipo_documento',
            'usuario' => session('usuarioId'), 
            'detalle' => $datoEliminar
        );

        $sistema->guardarBitacora($regBitacora);
        $result = array('ERROR'=>false, 'dato'=> 'Eliminado con éxito');
        
        return json_encode($result);
    }
}

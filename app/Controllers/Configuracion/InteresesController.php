<?php

namespace App\Controllers\Configuracion;
use App\Controllers\BaseController;
use App\Models\Configuracion\InteresesModel;
use App\Models\SistemaModel;

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
        $sistema = new SistemaModel();

        $data = [
            'nombreInteres' => $this->request->getPost('nombreInteres')
        ];

        if($sistema->validarExistencia('ex_intereses', $data)){
            $insertedId = $intereses->guardarInteres($data);
            
            // GUARDAR EN BITACORA
            $regBitacora = array(
                'idMovimiento' => 5,
                'fechaHora' => date('Y-m-d H:i:s'),
                'idTabla' => $insertedId,
                'tablaRelacionada' => 'ex_intereses',
                'usuario' => session('usuarioId'), 
                'detalle' => json_encode($data)
            );

            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Agregado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar el interés o gusto');
        }   

        return json_encode($result);
    }

    public function actualizar()
    {
        $intereses = new InteresesModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoActualizar = $intereses->obtenerElemento($id);

        $data = [
            'nombreInteres' => $this->request->getPost('nombreInteres')
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
            'tablaRelacionada' => 'ex_intereses',
            'usuario' => session('usuarioId'), 
            'detalle' => $detalleBitacora
        );

        if($sistema->validarExistencia('ex_intereses', $data)){
            $intereses->actualizarInteres($id, $data);
            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Actualizado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar el interés o gusto');
        } 

        return json_encode($result);
    }

    public function eliminar()
    {
        $intereses = new InteresesModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoEliminar = $intereses->obtenerElemento($id);
        $datoEliminar = json_encode($datoEliminar);

        $intereses->eliminarInteres($id);

        // GUARDAR EN BITACORA
        $regBitacora = array(
            'idMovimiento' => 7,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => $id,
            'tablaRelacionada' => 'ex_intereses',
            'usuario' => session('usuarioId'), 
            'detalle' => $datoEliminar
        );

        $sistema->guardarBitacora($regBitacora);
        $result = array('ERROR'=>false, 'dato'=> 'Eliminado con éxito');
        
        return json_encode($result);
    }
}

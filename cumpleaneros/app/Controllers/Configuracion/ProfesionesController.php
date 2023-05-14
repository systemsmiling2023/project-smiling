<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\ProfesionesModel;
use App\Models\SistemaModel;

class ProfesionesController extends BaseController
{
    public function buscar()
    {
        $profesiones = new ProfesionesModel();
        $data['profesiones'] = $profesiones->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerId()
    {
        $profesiones = new ProfesionesModel();
        $id = $this->request->getPost('id');
        $data['profesion'] = $profesiones->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $profesiones = new ProfesionesModel();
        $sistema = new SistemaModel();

        $data = [
            'profesion' => $this->request->getPost('profesion')
        ];
        
        if($sistema->validarExistencia('co_profesiones', $data)){
            $insertedId = $profesiones->guardarProfesion($data);
            
            // GUARDAR EN BITACORA
            $regBitacora = array(
                'idMovimiento' => 5,
                'fechaHora' => date('Y-m-d H:i:s'),
                'idTabla' => $insertedId,
                'tablaRelacionada' => 'co_profesiones',
                'usuario' => session('usuarioId'), 
                'detalle' => json_encode($data)
            );

            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Agregado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar la profesión');
        }   

        return json_encode($result);
    }

    public function actualizar()
    {
        $profesiones = new ProfesionesModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoActualizar = $profesiones->obtenerElemento($id);

        $data = [
            'profesion' => $this->request->getPost('profesion')
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
            'tablaRelacionada' => 'co_profesiones',
            'usuario' => session('usuarioId'), 
            'detalle' => $detalleBitacora
        );

        if($sistema->validarExistencia('co_profesiones', $data)){
            $profesiones->actualizarProfesion($id, $data);
            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Actualizado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar la profesión');
        } 

        return json_encode($result);
    }

    public function eliminar()
    {
        $profesiones = new ProfesionesModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoEliminar = $profesiones->obtenerElemento($id);
        $datoEliminar = json_encode($datoEliminar);

        $profesiones->eliminarProfesion($id);

        // GUARDAR EN BITACORA
        $regBitacora = array(
            'idMovimiento' => 7,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => $id,
            'tablaRelacionada' => 'co_profesiones',
            'usuario' => session('usuarioId'), 
            'detalle' => $datoEliminar
        );

        $sistema->guardarBitacora($regBitacora);
        $result = array('ERROR'=>false, 'dato'=> 'Eliminado con éxito');
        
        return json_encode($result);
    }
}

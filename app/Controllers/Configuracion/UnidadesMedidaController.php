<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\SistemaModel;
use App\Models\Configuracion\UnidadMedidaModel;


class UnidadesMedidaController extends BaseController
{
    public function buscar()
    {
        $unidadMedidas = new UnidadMedidaModel();
        $data['unidadMedida'] = $unidadMedidas->findAll();
        return $this->response->setJSON($data);

    }

    public function obtenerId()
    {
        $unidadMedidas = new UnidadMedidaModel();
        $id = $this->request->getPost('id');
        $data['unidadMedida'] = $unidadMedidas->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $unidadMedidas = new UnidadMedidaModel();
        $sistema = new SistemaModel();

        $unidad = $this->request->getPost('unidadMedida');

        $data = [
            'unidad' => $this->request->getPost('unidadMedida'),
            'abreviatura' => $this->request->getPost('abreviatura'),
            'medidaInter' => $this->request->getPost('sistemaMedida')
        ];

        if($unidadMedidas->validar('in_unidades_medida', $unidad)){
            $insertedId = $unidadMedidas->guardarUnidadMedida($data);
            
            // GUARDAR EN BITACORA
            $regBitacora = array(
                'idMovimiento' => 5,
                'fechaHora' => date('Y-m-d H:i:s'),
                'idTabla' => $insertedId,
                'tablaRelacionada' => 'in_unidades_medida',
                'usuario' => session('usuarioId'), 
                'detalle' => json_encode($data)
            );

            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Agregado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar la unidad de medida');
        }   

        return json_encode($result);
    }


    public function eliminar()
    {
        $unidadMedidas = new UnidadMedidaModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoEliminar = $unidadMedidas->obtenerElemento($id);
        $datoEliminar = json_encode($datoEliminar);

        $unidadMedidas->eliminarUMedida($id);

        // GUARDAR EN BITACORA
        $regBitacora = array(
            'idMovimiento' => 7,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => $id,
            'tablaRelacionada' => 'in_unidades_medida',
            'usuario' => session('usuarioId'), 
            'detalle' => $datoEliminar
        );

        $sistema->guardarBitacora($regBitacora);
        $result = array('ERROR'=>false, 'dato'=> 'Eliminado con éxito');
        
        return json_encode($result);
    }


    public function actualizar()
    {
        $unidadMedidas = new UnidadMedidaModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoActualizar = $unidadMedidas->obtenerElemento($id);

       $data = [
            'unidad' => $this->request->getPost('unidadMedida'),
            'abreviatura' => $this->request->getPost('abreviatura'),
            'medidaInter' => $this->request->getPost('sistemaMedida')
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
            'tablaRelacionada' => 'in_unidades_medida',
            'usuario' => session('usuarioId'), 
            'detalle' => $detalleBitacora
        );

        if($sistema->validarExistencia('in_unidades_medida', $data)){
            $unidadMedidas->actualizarUnidadMedida($id, $data);
            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Actualizado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar la unidad de medida');
        } 

        return json_encode($result);
    }

}
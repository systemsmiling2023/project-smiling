<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\SistemaModel;
use App\Models\Configuracion\InsumosModel;



class InsumosController extends BaseController
{
    public function buscar()
    {
        $insumos = new InsumosModel();
        $data['insumos'] = $insumos->mostrar();
        return $this->response->setJSON($data);

    }

    public function obtenerId()
    {
        $insumos = new InsumosModel();
        $id = $this->request->getPost('id');
        $data['insumos'] = $insumos->find($id);
        return $this->response->setJSON($data);
    }

    public function categoria()
    {
        $insumos = new InsumosModel();
        $data['categorias'] = $insumos->mostrarCategoria();
        return $this->response->setJSON($data);
    }

    public function unidades()
    {
        $insumos = new InsumosModel();
        $data['unidades'] = $insumos->mostrarUnidades();
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $insumos = new InsumosModel();
        $sistema = new SistemaModel();

        $insumo = $this->request->getPost('insumo');

        $data = [
            'insumo' => $this->request->getPost('insumo'),
            'categoriaId' => $this->request->getPost('categoria'),
            'fechaUltCompra' => $this->request->getPost('fechaUltCompra'),
            'costoUltCompra' => $this->request->getPost('costoUlCompra'),
            'cantidadMax' => $this->request->getPost('cantMax'),
            'cantidadMin' => $this->request->getPost('cantMin'),
            'unidadId' => $this->request->getPost('unidadMedida')
        ];

        if($insumos->validarInsumo('in_insumos', $insumo)){
            $insertedId = $insumos->guardarInsumo($data);
            
            // GUARDAR EN BITACORA
            $regBitacora = array(
                'idMovimiento' => 5,
                'fechaHora' => date('Y-m-d H:i:s'),
                'idTabla' => $insertedId,
                'tablaRelacionada' => 'in_insumos',
                'usuario' => session('usuarioId'), 
                'detalle' => json_encode($data)
            );

            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'data'=> 'Agregado con éxito');
        }else{
            $result = array('ERROR'=>true, 'data'=> 'No puedes duplicar el insumo');
        }   

        return $this->response->setJSON($result);
    }


    public function actualizar()
    {
        $insumos = new InsumosModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoActualizar = $insumos->obtenerElemento($id);

        $data = [
                'insumo' => $this->request->getPost('insumo'),
                'categoriaId' => $this->request->getPost('categoria'),
                'fechaUltCompra' => $this->request->getPost('fechaUltCompra'),
                'costoUltCompra' => $this->request->getPost('costoUlCompra'),
                'cantidadMax' => $this->request->getPost('cantMax'),
                'cantidadMin' => $this->request->getPost('cantMin'),
                'unidadId' => $this->request->getPost('unidadMedida')
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
            'tablaRelacionada' => 'in_insumos',
            'usuario' => session('usuarioId'), 
            'detalle' => $detalleBitacora
        );

        if($sistema->validarExistencia('in_insumos', $data)){
            $insumos->actualizarInsumos($id, $data);
            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Actualizado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes actualizar el insumo');
        } 

    return json_encode($result);
}


public function eliminar()
{
    $insumos = new InsumosModel();
    $sistema = new SistemaModel();

    $id = $this->request->getPost('id');


    if($insumos->validar('in_existencias', $id)){
            // Obtener el elemento a eliminar

            $datoEliminar = $insumos->obtenerElemento($id);
            $datoEliminar = json_encode($datoEliminar);

            $insumos->eliminarInsumos($id);

            // GUARDAR EN BITACORA
            $regBitacora = array(
                'idMovimiento' => 7,
                'fechaHora' => date('Y-m-d H:i:s'),
                'idTabla' => $id,
                'tablaRelacionada' => 'in_insumos',
                'usuario' => session('usuarioId'), 
                'detalle' => $datoEliminar
            );

            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Eliminado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'El insumo no puede ser eliminado posee existencia en inventario');
        } 

       return $this->response->setJSON($result);
}

}


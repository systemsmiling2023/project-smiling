<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\MedicamentoModel;
use App\Models\SistemaModel;

class MedicamentosController extends BaseController
{
    public function buscar()
    {
        $medicamento = new MedicamentoModel();
        $data['medicamentoId'] = $medicamento->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerId()
    {
        $medicamento = new MedicamentoModel();
        $id = $this->request->getPost('id');
        $data['medicamentoId'] = $medicamento->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $medicamento = new MedicamentoModel();
        $sistema = new SistemaModel();

        $data = [
            'medicamento' => $this->request->getPost('medicamento'),
        ];

        if($sistema->validarExistencia('ex_medicamentos', $data)){
            $insertedId = $medicamento->guardarMedicamento($data);
            
            // GUARDAR EN BITACORA
            $regBitacora = array(
                'idMovimiento' => 5,
                'fechaHora' => date('Y-m-d H:i:s'),
                'idTabla' => $insertedId,
                'tablaRelacionada' => 'ex_medicamentos',
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
        $medicamento = new MedicamentoModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoActualizar = $medicamento->$id;

        $data = [
            'medicamento' => $this->request->getPost('medicamento')
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
            'tablaRelacionada' => 'ex_medicamentos',
            'usuario' => session('usuarioId'), 
            'detalle' => $detalleBitacora
        );

        if($sistema->validarExistencia('ex_medicamentos', $data)){
            $medicamento->actualizarProfesion($id, $data);
            $sistema->guardarBitacora($regBitacora);
            $result = array('ERROR'=>false, 'dato'=> 'Actualizado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar la profesión');
        } 

        return json_encode($result);
    }

    public function eliminar()
    {
        $medicamento = new MedicamentoModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');

        // Obtener el elemento a eliminar
        $datoEliminar = $medicamento->obtenerElemento($id);
        $datoEliminar = json_encode($datoEliminar);

        $medicamento->eliminarMedicamento($id);

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
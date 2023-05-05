<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\MediosConocerModel;


class MediosConocerController extends BaseController
{
    public function buscar()
    {
        $mediosconocer = new MediosConocerModel();
        $data['medioConocer'] = $mediosconocer->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function almacenar()
    {
        $mediosconocer = new MediosConocerModel();
        $medio = $this->request->getPost('medioConocer');
        $estado = $this->request->getPost('estadoConocer');

        $medioExists = $mediosconocer->medio($medio);

        if ($medioExists){
            $result = array("ERROR" => true, "data" => 'No se permite registrar un mismo medio de información');
        }else{
            $data = [
                'medio' => $medio,
                'estado' => $estado
            ];
            $mediosconocer->guardarMediosConocer($data);
    
            $result = array("ERROR" => false, "data" => 'Usuario agregado con éxito');

        }
        return $this->response->setJSON($result);
    }

    public function obtenerId()
    {
        $mediosconocer = new MediosConocerModel();
        $id = $this->request->getPost('id');
        $data['medioConocer'] = $mediosconocer->find($id);
        return $this->response->setJSON($data);

    }

    public function actualizar()
    {
        $mediosconocer = new MediosConocerModel();
        $id = $this->request->getPost('id');
        $data = [
            'medio' => $this->request->getPost('medioConocer'),
            'estado' => $this->request->getPost('estadoConocer')
        ];
        $mediosconocer->actualizarMedioConocer($id, $data);
        return $mediosconocer;
    }

    public function eliminar()
    {
        $mediosconocer = new MediosConocerModel();
        $id = $this->request->getPost('id');
        $mediosconocer->eliminarMediosConocer($id);
        return $mediosconocer;
    }




}
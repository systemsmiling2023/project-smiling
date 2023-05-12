<?php
namespace App\Controllers\Agenda;

use App\Controllers\BaseController;
use App\Models\Agenda\CumpleanerosModel;

class CumpleaneroController extends BaseController
{
    public function buscar()
    {
        $cumpleanero = new CumpleanerosModel();
        $mes =$this->request->getPost('m');
        $sucursalId = $this->request->getPost('id');
        if ($sucursalId != null) {
            
            $cumpleaneros = $cumpleanero->cumplesXSucursal($sucursalId, $mes);
        } else {
            $cumpleaneros = $cumpleanero->findAll();
        }
        $data = ['cumpleanero'=>$cumpleaneros];
        return $this->response->setJSON($data);
    }

    public function mostrarSucursal()
    {
        $cumpleanero = new CumpleanerosModel();
        $data['sucursalId'] = $cumpleanero->Sucursal();
        return $this->response->setJSON($data);
    }
}

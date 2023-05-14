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
        $cumpleaneros = $cumpleanero->cumplePorMes($mes);
        $data = ['cumpleanero'=>$cumpleaneros];
        return $this->response->setJSON($data);
    }

}

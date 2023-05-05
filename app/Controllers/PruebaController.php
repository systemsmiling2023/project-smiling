<?php

namespace App\Controllers;

use App\Models\PruebaModel;

class PruebaController extends BaseController
{
    public function buscar()
    {
        $prueba = new PruebaModel();
        $data['direcciones'] = $prueba->direccion(1, 1);
        return $this->response->setJSON($data);
    }
}

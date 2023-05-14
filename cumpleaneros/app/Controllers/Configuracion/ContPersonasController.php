<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\ContactosModel;

class ContPersonasController extends BaseController
{

    public function mostrar()
    {
        $contactos = new ContactosModel();
        $id = $this->request->getPost('id');
        $data['contact'] = $contactos->mostrar($id);
        return $this->response->setJSON($data);
   
    }

    public function TipoContacto()
    {
        $contactos = new ContactosModel();
        $data['tipoContactos'] = $contactos->mostrarTipoContacto();
        return $this->response->setJSON($data);
   
    }

    public function almacenar()
    {
        $contactos = new ContactosModel();

        $contacto = $this->request->getPost('contacto');
        $personaId = $this->request->getPost('personaId'); 
        $tipoContacto = $this->request->getPost('tipoContacto'); 

        $contactoExists = $contactos->consultar($contacto, $personaId);

        if ($contactoExists > 0) {
            $result = array("ERROR" => true, "data" => 'Este tipo de contacto ya esta registrado');
        }else{
            $data = [
                    'tipoContId' =>  $this->request->getPost('tipoContacto'),
                    'contacto' => $contacto,
                    'principal' => $this->request->getPost('principal'),
                    'personaId' => $personaId    
            ];

            $contactos->guardarContacto($data);
            $result = array("ERROR" => false, "data" => 'Contacto agregado con éxito');

        }
        return $this->response->setJSON($result);	   
    }

    public function eliminar()
    {
        $contactos = new ContactosModel();
        $id = $this->request->getPost('id');
        $contactos->eliminarContacto($id);
        return $contactos;
    }

    public function obtenerId()
    {
        $contactos = new ContactosModel();
        $id = $this->request->getPost('id');
        $data['contactos'] = $contactos->find($id);
        return $this->response->setJSON($data);

    }

    public function actualizar()
    {
        $contactos = new ContactosModel();
        $id = $this->request->getPost('contactoId');
        $data = [
            'tipoContId' =>  $this->request->getPost('tipoContacto'),
            'contacto' => $this->request->getPost('contacto'),
            'principal' => $this->request->getPost('principal'),
        ];
        $contactos->actualizarContactos($id, $data);
        return $contactos;
    }


}
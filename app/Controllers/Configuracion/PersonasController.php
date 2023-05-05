<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\PersonasModel;


class PersonasController extends BaseController
{
    public function municipios()
    {
        $personas = new PersonasModel();
        $data['municipios'] = $personas->mostrarMuni();
        return $this->response->setJSON($data);
   
    }

    public function almacenar()
    {
        $personas = new PersonasModel();
        $nombres = $this->request->getPost('nombres');
        $apeUno = $this->request->getPost('apeUno');
        $apeDos = $this->request->getPost('apeDos');

        $personaExists = $personas->consultar($nombres,$apeUno,$apeDos);

        if ($personaExists){
            $result = array("ERROR" => true, "data" => 'La persona ya existe en el sistema');
        }else{
            $data = [
                'nombres' => $nombres,
                'primerApellido' => $apeUno,
                'segundoApellido' => $apeDos,
                'tercerApellido' => $this->request->getPost('apeTres'),
                'fechaNacimiento' => $this->request->getPost('fecha'),
                'municipioId' => $this->request->getPost('municipio'),
                'detalleDireccion' => $this->request->getPost('detalle'),
                'sexo' => $this->request->getPost('sexo'),
                'tipoPersona' => $this->request->getPost('tipopersona'),
                'estado' => $this->request->getPost('estadopersona')
    
            ];
            $personas->guardarPersona($data);
            $result = array("ERROR" => false, "data" => 'Persona agregado con éxito');

        }
        return $this->response->setJSON($result);
    }

    public function buscar()
    {
        $personas = new PersonasModel();
        $data['personas'] = $personas->mostrar();
        return $this->response->setJSON($data);
   
    }

    public function eliminar()
    {
        $personas = new PersonasModel();
        $id = $this->request->getPost('id');
        $personas->eliminarPersonas($id);
        return $personas;
   }

   public function obtenerId()
   {
       $personas = new PersonasModel();
       $id = $this->request->getPost('id');
       $data['personas'] = $personas->find($id);
       return $this->response->setJSON($data);

   }

   public function actualizar()
   {
       $personas = new PersonasModel();
       $id = $this->request->getPost('id');
       $data = [
            'nombres' => $this->request->getPost('nombres'),
            'primerApellido' => $this->request->getPost('apeUno'),
            'segundoApellido' => $this->request->getPost('apeDos'),
            'tercerApellido' => $this->request->getPost('apeTres'),
            'fechaNacimiento' => $this->request->getPost('fecha'),
            'municipioId' => $this->request->getPost('municipio'),
            'detalleDireccion' => $this->request->getPost('detalle'),
            'sexo' => $this->request->getPost('sexo'),
            'tipoPersona' => $this->request->getPost('tipopersona'),
            'estado' => $this->request->getPost('estadopersona')
       ];
       $personas->actualizarPersona($id, $data);
       return $personas;
   }



}


<?php

namespace App\Controllers;

use App\Models\RegistroModel;
use App\Models\SistemaModel;

class RegistroController extends BaseController
{
    public function traerMunicipios()
    {
        $registro = new RegistroModel();
        $data['municipios'] = $registro->municipios();
        return $this->response->setJSON($data);
        // print_r($data);
    }

    public function formulario(){

        // Instanciando modelo
        $registro = new RegistroModel();
        $sistema = new SistemaModel();

        $dui = $this->request->getPost('regDUI');

        // Validar con el algoritmo de dui
        if( $sistema->validarDUI( $dui ) ){

            // Recuperando variables
            $datPersona = [
                'nombres' => $this->request->getPost('regNombres'),
                'primerApellido' => $this->request->getPost('regApellido1'),
                'segundoApellido' => $this->request->getPost('regApellido2'),
                'tercerApellido' => $this->request->getPost('regApellido3'),
                'fechaNacimiento' => $this->request->getPost('regFechaNac'),
                'municipioId' => $this->request->getPost('regMunicipio'),
                'detalleDireccion' => $this->request->getPost('regDireccion'),
                'sexo' => $this->request->getPost('regSexo'),
                'comentarios' => 'AGREGADO DESDE EL SISTEMA',
                'estado' => 1,
                'tipoPersona' => 'N'
            ];

            if($registro->validarPersona($datPersona)){

                $personaId = $registro->guardarPersona($datPersona);
    
                if( $personaId>0 ){
    
                    // El DUI siempre debería ser el id = 1
                    $datDui = [
                        'tipoDocId' => 1,
                        'documento' => $dui,
                        'personaId' => $personaId
                    ];
                    $registro->guardarDocumento($datDui);
    
                    // El correo siempre debería ser el id = 1
                    $datCorreo = [
                        'tipoContId' => 1,
                        'contacto' => $this->request->getPost('regEmail'), 
                        'principal' => 1,
                        'personaId' => $personaId
                    ];
                    $registro->guardarContacto($datCorreo);
            
                    // El telefono siempre debería ser el id = 2
                    $datTelefono = [
                        'tipoContId' => 2,
                        'contacto' => $this->request->getPost('regTelefono'), 
                        'principal' => 1,
                        'personaId' => $personaId
                    ];
                    $registro->guardarContacto($datTelefono);
    
                    $result = array('ERROR'=>false, 'dato' => 'DATOS GUARDADOS CORRECTAMENTE');
                }else{
                    $result = array('ERROR'=>false, 'dato' => 'NO SE PUDO GUARDAR LOS DATOS DE LA PERSONA');
                }        
            }else{
                $result = array('ERROR'=>true, 'dato' => 'NO PUEDE INGRESAR ESOS DATOS AL SISTEMA, VERIFIQUE POR FAVOR');
            }
        }else{
            $result = array('ERROR'=>true, 'dato' => 'EL DUI INGRESADO NO ES VÁLIDO');
        }


        echo json_encode($result);
    }
}

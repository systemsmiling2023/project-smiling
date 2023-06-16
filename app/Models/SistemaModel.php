<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Expediente\PacienteModel;
use App\Models\Configuracion\PersonasModel;

class SistemaModel extends Model
{
    protected $table = 'bi_bitacoras';
    protected $primaryKey = 'bitacoraId';

    public function guardarBitacora($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->insert($data);
    }

    public function encriptarClave($password) {
        return strtoupper(md5($password));
    }


    public function verificarClave($password, $hash) {
        if(strtoupper(md5($password)) === $hash){
            return true;
        }else{
            return false;
        }
    }

    public function validarDUI($DUI){
        // Valores iniciales
        $valInicial = array(9,8,7,6,5,4,3,2);
        $valMedio = [];
        $sumMedio = 0;
        $baseMod  = 10;
    
        // 1. Separar por el guion
        $expDUI = explode('-', $DUI);
    
        // 2. La primera parte la vamos a procesar para el resultado compararla con la segunda
        // Separamos cada elemento de la primera parte
        $expPrimeros = preg_split('//', $expDUI[0] , -1, PREG_SPLIT_NO_EMPTY); 
    
        // 3. Cada elemento de expDUI por valInicial
        foreach($expPrimeros as $posicion => $elemento){
            $valX = $elemento * $valInicial[$posicion];
            array_push($valMedio, $valX);
            $sumMedio += $valX;
        }
    
        // 4. Obtener el mod de la suma valMedio
        $modResultado = $sumMedio % $baseMod;

        // 5. Obtener el valor de último digito
        $resultado    = $baseMod - $modResultado;

        if($resultado>9 || $resultado < 1){
            $resultado = 0;
        }
    
        if($resultado==$expDUI[1]){
            return true;
        }else{
            return false;
        }

    }

    public function validarExistencia($tabla, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($tabla);
        $builder->select('*');
        $builder->where($data);

        $numRows = $builder->get()->getNumRows();
        
        if($numRows>0){
            return false;
        }else{
            return true;
        }
    }

    public function generarCodigoPaciente($personaId)
    {
        $personasModel = new PersonasModel();
        $personas = $personasModel->find($personaId);
        $nombres = $personas['nombres'];
        $primerApellido = $personas['primerApellido'];

        $iniciales = substr($nombres, 0, 1) . substr($primerApellido, 0, 1);

        $anioActual = date('y');
        $codigoParcial = $iniciales . $anioActual;

        $exPacientesModel = new PacienteModel();
        $count = $exPacientesModel->like('codPaciente', $codigoParcial, 'after')->countAllResults();

        $correlativo = $count + 1;
        $codigoPaciente = $codigoParcial . $correlativo;

        return $codigoPaciente;
    }
}

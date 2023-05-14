<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class PersonasModel extends Model
{
    protected $table = 'pe_personas';
    protected $primaryKey = 'personaId';
    protected $allowedFields = ['personaId', 'nombres', 'primerApellido', 'segundoApellido','tercerApellido',
                'fechaNacimiento','municipioId','detalleDireccion','sexo','comentarios','estado', 'tipoPersona'];


    public function mostrar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_municipios');
        $builder->select('*');
        $builder->join('pe_personas', 'co_municipios.municipioId = pe_personas.municipioId');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function guardarPersona($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function mostrarMuni()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_municipios');
        $builder->select('*');
        $query = $builder->get()->getResultArray();
        return $query;
    }
    
    public function eliminarPersonas($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['personaId' => $id]);
    }

    public function consultar($nombres, $apeUno, $apeDos) {
        
        $query = $this->db->query("SELECT personaId from pe_personas where nombres= '$nombres' 
        and primerApellido = '$apeUno' and segundoApellido= '$apeDos'");
        return $query->getRow();
    }

    public function actualizarPersona($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('personaId', $id);
        $update = $builder->update($data);
    }

}
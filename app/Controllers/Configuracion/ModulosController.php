<?php

namespace App\Controllers\Configuracion;
use App\Controllers\BaseController;
use App\Models\SistemaModel;

class ModulosController extends BaseController
{

    public function tipodocumento()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Tipo de Documento"
        ];
        $ruta = 'modulos/configuracion/tipodocumento';

        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'co_tipo_documento',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA

        return view($ruta, $title);
    }

    public function intereses()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Intereses"
        ];
        $ruta = 'modulos/configuracion/intereses';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'ex_intereses',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA        

        return view($ruta, $title);
    }

    public function profesiones()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Profesiones"
        ];
        $ruta = 'modulos/configuracion/profesiones';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'co_profesiones',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  
        

        return view($ruta, $title);
    }

    public function mediosconocer()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Medios Conocer"
        ];
        $ruta = 'modulos/configuracion/mediosconocer';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'co_medios_conocer',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function franjahorario()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Franja Horario"
        ];
        $ruta = 'modulos/configuracion/franjahorario';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'ag_franja_horarios',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function personas()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Personas"
        ];
        $ruta = 'modulos/configuracion/personas';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'pe_personas',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function usuarios()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Usuarios"
        ];
        $ruta = 'modulos/configuracion/usuarios';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'co_usuarios',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function tipocontacto()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Tipo de Contacto"
        ];
        $ruta = 'modulos/configuracion/tipocontacto';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'co_tipo_contacto',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function cargo()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Tipo de Cargo"
        ];
        $ruta = 'modulos/configuracion/cargo';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'pe_cargo',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function rol()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Rol de Usuario"
        ];
        $ruta = 'modulos/configuracion/rol';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'co_roles',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function empleado()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Empleados"
        ];
        $ruta = 'modulos/configuracion/empleado';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'pe_empleados',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function proveedor()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Proveedores"
        ];
        $ruta = 'modulos/configuracion/proveedor';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'in_proveedores',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function medicamento()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Medicamentos"
        ];
        $ruta = 'modulos/configuracion/medicamentos';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'ex_medicamentos',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function conversion()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Conversiones"
        ];
        $ruta = 'modulos/configuracion/conversion';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'in_unidad_detalle',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function controlInsumos()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Insumos"
        ];
        $ruta = 'modulos/configuracion/controlInsumos';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'in_insumos',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    public function UniMedida()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Unidad de Medida"
        ];
        $ruta = 'modulos/configuracion/unidadesMedida';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'in_unidades_medida',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

    
}

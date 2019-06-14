<?php
namespace App\Helper_Functions;
use App\Models440\Cilindro;
use App\Models440\Valvula;
use App\Models440\Estacion_De_Valvula;
use App\Models440\Valvula_Auxiliar;
use App\Models440\Equipo_Para_Vacio;
use App\Models440\Manipulacion_Y_Equipo;
use App\Models440\Unidad_FRL;
use App\Models440\Conexion;
use App\Models440\Proceso;
use App\Models440\Automatizacion_Y_Control;
use App\Models440\Family;



trait getClassHelper
{


  public function classGetter($id)
  {
    switch ($id) {
      case 1:
      $class = Cilindro::class;
      break;
      case 2:
      $class = Valvula::class;
      break;
      case 3:
      $class = Estacion_De_Valvula::class;
      break;
      case 4:
      $class = Valvula_Auxiliar::class;
      break;
      case 5:
      $class = Equipo_Para_Vacio::class;
      break;
      case 6:
      $class = Manipulacion_Y_Equipo::class;
      break;
      case 7:
      $class = Unidad_FRL::class;
      break;
      case 8:
      $class = Conexion::class;
      break;
      case 9:
      $class = Proceso::class;
      break;
      case 10:
      $class = Automatizacion_Y_Control::class;
      break;
      default:
      // code...
      break;
    }

    return $class;

  }
}

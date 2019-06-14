<?php

namespace App\Models440;
use App\Models440\Product;

use Illuminate\Database\Eloquent\Model;

class Cilindro extends Product
{


    protected $table = 'cilindros';

    protected $fillable = [
    'category_id', 'model_id', 'Familia', 'Modelo', 'Tipo', 'Descripci_n_1', 'Norma', 'Basado_en_la_norma', 'Di_metro', 'Carrera', 'Operaci_n', 'Resorte', 'C_S_IMAN',
    'C_S_AMORT', 'Column_1Vast_2Vast', 'Column_1Pist_n_2Pist_n', 'Torque_Nm', 'Ajuste_fino', 'Rosca_vast', 'C_digo', 'Descripci_n', 'P_gina', 'Fotos', 'CAD_2D', 'CAD_3D'
    ];




}

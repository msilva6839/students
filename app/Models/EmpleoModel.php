<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleoModel extends Model
{
    protected $table = 'empleos';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id_persona', 'puesto', 'salario', 
        'fecha_inicio', 'fecha_fin'
    ];
    protected $useTimestamps = false;

    // Definir la relación inversa con la persona
    public function persona()
    {
        return $this->belongsTo(PersonaModel::class, 'id_persona', 'id');
    }
}

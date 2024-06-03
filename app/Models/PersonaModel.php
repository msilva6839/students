<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonaModel extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'nombre', 'apellido', 'edad', 'genero', 'email', 
        'telefono', 'direccion', 'fecha_registro'
    ];
    protected $useTimestamps = false;

    // Definir la relación con los empleos
    public function empleos()
    {
        return $this->hasMany(EmpleoModel::class, 'id_persona', 'id');
    }
}



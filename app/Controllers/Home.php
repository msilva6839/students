<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use App\Models\EmpleoModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;

class Home extends Controller
{
    public function index()
    {
        // Establecer la conexión a la base de datos
        $this->db = \Config\Database::connect();
    
        // Consulta SQL y ejecución
        $query = $this->db->query("SELECT personas.id, personas.nombre, personas.apellido, personas.edad, personas.genero, personas.email,
                                          empleos.puesto, empleos.salario, empleos.fecha_inicio, empleos.fecha_fin
                                   FROM personas LEFT JOIN empleos ON personas.id = empleos.id_persona");
    
        // Obtener los resultados de la consulta
        $resultado = $query->getResult();
    
        // Retornar los resultados como respuesta JSON
        return $this->response->setJSON($resultado);
    }

    // Función para crear un nuevo registro de persona y empleo
    public function registro_create()
    {
        $personaModel = new PersonaModel();
        $empleoModel = new EmpleoModel();

        // Obtener los datos del cuerpo de la solicitud en formato JSON
        $data = $this->request->getJSON();

        // Crear el registro de persona
        $personaId = $personaModel->insert($data);

        // Crear el registro de empleo asociado a la persona creada
        $empleoData = [
            'id_persona' => $personaId,
            'puesto' => $data->puesto,
            'salario' => $data->salario,
            'fecha_inicio' => $data->fecha_inicio,
            'fecha_fin' => $data->fecha_fin
        ];
        $empleoModel->insert($empleoData);

        // Responder con un mensaje indicando que el registro fue creado exitosamente
        return $this->response->setJSON(['message' => 'Registro creado exitosamente']);
    }



    // CRUD para personas

    public function personas_index()
    {
        $personaModel = new PersonaModel();
        $personas = $personaModel->findAll();
        return $this->response->setJSON($personas);
    }

    public function personas_show($id)
    {
        $personaModel = new PersonaModel();
        $persona = $personaModel->find($id);
        if ($persona) {
            return $this->response->setJSON($persona);
        } else {
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)->setJSON(['message' => 'Persona no encontrada']);
        }
    }

    public function personas_create()
    {
        $personaModel = new PersonaModel();
        $data = $this->request->getJSON();
        $personaModel->insert($data);
        return $this->response->setJSON(['message' => 'Persona creada exitosamente']);
    }

    public function personas_update($id)
    {
        $personaModel = new PersonaModel();
        $data = $this->request->getJSON();
        $personaModel->update($id, $data);
        return $this->response->setJSON(['message' => 'Persona actualizada exitosamente']);
    }

    public function personas_delete($id)
    {
        $personaModel = new PersonaModel();
        $personaModel->delete($id);
        return $this->response->setJSON(['message' => 'Persona eliminada exitosamente']);
    }

    // CRUD para empleos

    public function empleos_index()
    {
        $empleoModel = new EmpleoModel();
        $empleos = $empleoModel->findAll();
        return $this->response->setJSON($empleos);
    }

    public function empleos_show($id)
    {
        $empleoModel = new EmpleoModel();
        $empleo = $empleoModel->find($id);
        if ($empleo) {
            return $this->response->setJSON($empleo);
        } else {
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)->setJSON(['message' => 'Empleo no encontrado']);
        }
    }

    public function empleos_create()
    {
        $empleoModel = new EmpleoModel();
        $data = $this->request->getJSON();
        $empleoModel->insert($data);
        return $this->response->setJSON(['message' => 'Empleo creado exitosamente']);
    }

    public function empleos_update($id)
    {
        $empleoModel = new EmpleoModel();
        $data = $this->request->getJSON();
        $empleoModel->update($id, $data);
        return $this->response->setJSON(['message' => 'Empleo actualizado exitosamente']);
    }
    



}

<?php

/**
 * Modelo lógico para programadores
 * @author Michael Avila <mstavila99@gmail.com>
 * @date 24/02/2021
 * @package application/models/business
 */
class logProgrammers extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('persistence/dbProgrammers', 'dbProgrammers');
    }

    /**
     * Crear un programador
     * @author Michael Avila <mstavila99@gmail.com>
     * @date 24/02/2021 
     * @param array $postData Datos del formulario
     *      {string} name Nombres
     *      {string} lastName Apellidos
     *      {string} document Número de cédula
     *      {string} email Correo electrónico
     *      {string} language Lenguajes que maneja
     * @return array Respuesta para JSON (status|message|totalProgrammers)
     * @throws Exception
     */
    public function createProgrammerLog($postData) {
        // Validar el envío de los parámetros necesarios
        if (!isset($postData['name']) || !$postData['name']) {throw new Exception('No se ha especificado el nombre');}
        if (!isset($postData['lastName']) || !$postData['lastName']) {throw new Exception('No se ha especificado el apellido');}
        if (!isset($postData['document']) || !$postData['document']) {throw new Exception('No se ha especificado la cédula');}
        if (!isset($postData['email']) || !$postData['email']) {throw new Exception('No se ha especificado el correo electrónico');}
        if (!isset($postData['language']) || !$postData['language']) {throw new Exception('No se ha especificado el lenguaje');}

        // Obtener los datos a utilizar
        $name = trim($postData['name']);
        $lastName = trim($postData['lastName']);
        $document = $postData['document'];
        $email = trim($postData['email']);
        $languages = trim($postData['language']);

        // Validar que el programador no exista
        $programmer = $this->dbProgrammers->getProgrammerByDocumentDb($document);
        if ($programmer) {throw new Exception('Ya existe un programador con el número de cédula ingresado');}

        // Crear nuevo programador
        $dataToInsert = [
            'nombre' => $name,
            'apellido' => $lastName,
            'cedula' => $document,
            'correo' => $email,
            'lenguajes' => $languages
        ];
        $insertedId = $this->dbProgrammers->createProgrammerDb($dataToInsert);
        if (!$insertedId) {throw new Exception('Se ha presentado un problema con la creación del programador');}

        // Obtener todos los programadores
        $countProgrammers = count($this->dbProgrammers->getAllProgrammerDb());

        return [
            'status' => 200,
            'message' => 'Creación de programador exitoso',
            'totalProgrammers' => $countProgrammers
        ];
    }

}

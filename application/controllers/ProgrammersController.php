<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador para programadores
 * @author Michael Avila <mstavila99@gmail.com>
 * @date 24/02/2021
 * @package application/controllers
 */
class ProgrammersController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('business/logProgrammers', 'logProgrammers');
    }

    /**
     * Cargar vista para la creación de programadores
     * @author Michael Avila <mstavila99@gmail.com>
     * @date 24/02/2021
     * @method {{GET}}
     * @route programadores
     * @return {view} programmers
     */
    public function index() {
        $this->load->view('programmers');
    }

    /**
     * Crear un programador
     * @author Michael Avila <mstavila99@gmail.com>
     * @date 24/02/2021
     * @method {{POST}}
     * @param array $_POST Datos del formulario
     *      {string} name Nombres
     *      {string} lastName Apellidos
     *      {string} document Número de cédula
     *      {string} email Correo electrónico
     *      {string} language Lenguajes que maneja
     * @route programadores/crear
     * @return JSON (status|message|totalProgrammers)
     */
    public function createProgrammer() {
        try {
            $postData = $this->input->post();
            $response = $this->logProgrammers->createProgrammerLog($postData);
            echo json_encode($response);
        } catch (Exception $exc) {
            $codeException = ($exc->getCode()) ? $exc->getCode() : 400;
            $messageException = ($exc->getMessage()) ? $exc->getMessage() : 'Ocurrió un error en la solicitud. Intente de nuevo, en caso de persistir el error contáctese con el administrador';
            echo json_encode(['status' => $codeException, 'message' => $messageException]);
        }
    }

}

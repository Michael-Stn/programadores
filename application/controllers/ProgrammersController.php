<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProgrammersController extends CI_Controller {

    public function index() {
        $this->load->view('programmers');
    }

    public function createProgrammer() {
        try {
            $this->load->model('business/logProgrammers', 'logProgrammers');
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

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador para pruebas
 * @author Michael Avila <mstavila99@gmail.com>
 * @date 24/02/2021
 * @package application/controllers
 */
class TestingController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('business/logTesting', 'logTesting');
    }

    /**
     * Realizar ejercicio lógico número 3
     * @author Michael Avila <mstavila99@gmail.com>
     * @date 24/02/2021
     * @method {{POST}}
     * @route ejercicio3
     */
    public function doLogicalExercise() {
        $matrix = [
            [1, 2, 3],
            [4, 5, 6],
            [9, 8, 9]
        ];
        $abs = $this->logTesting->doLogicalExerciseLog($matrix);
        echo "El valor absoluto es: $abs";
    }

}

<?php

/**
 * Modelo lógico para pruebas
 * @author Michael Avila <mstavila99@gmail.com>
 * @date 24/02/2021
 * @package application/models/business
 */
class logTesting extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Ejercicio número 3: Obtener el valor absoluto de la diferencia de diagonales
     * @author Michael Avila <mstavila99@gmail.com>
     * @date 24/02/2021
     * @param array $matrix Matriz de números a operar
     * @return int Valor absoluto
     */
    public function doLogicalExerciseLog(array $matrix) {
        if (!$matrix) {
            return 0;
        }

        $leftDiagonal = 0;
        $rightDiagonal = 0;
        $i = 0;

        foreach ($matrix as $m) {
            $leftDiagonal += $m[$i];
            $rightDiagonal += $m[(count($m) - 1) - $i];
            $i++;
        }

        $difference = $leftDiagonal - $rightDiagonal;
        return abs($difference);
    }

}

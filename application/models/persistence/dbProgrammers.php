<?php

/**
 * Modelo de persistencia para programadores
 * @author Michael Avila <mstavila99@gmail.com>
 * @date 24/02/2021
 * @package application/models/persistence
 */
class dbProgrammers extends CI_Model {

    // Tablas DB
    protected $_tProgrammers;

    public function __construct() {
        parent::__construct();

        // Tablas DB
        $this->_tProgrammers = T_PROGRAMMERS;
    }

    /**
     * Consultar un programador según número de cédula
     * @author Michael Avila <mstavila99@gmail.com>
     * @date 24/02/2021
     * @param string|int $document Número de cédula
     * @return array Información del programador
     * @throws Exception
     */
    public function getProgrammerByDocumentDb($document) {
        $query = $this->db
                ->where('cedula', $document)
                ->get($this->_tProgrammers);

        // Validar los errores que se puedan presentar
        $error = $this->db->error();
        if ($error['message']) {
            throw new Exception($error['message'] . ' class:' . __CLASS__ . ' line:' . __LINE__);
        }

        return $query->row_array();
    }

    /**
     * Crear un programador
     * @author Michael Avila <mstavila99@gmail.com>
     * @date 24/02/2021
     * @param array $dataToInsert Datos necesarios para crear el programador
     * @return int Número del ID insertado
     * @throws Exception
     */
    public function createProgrammerDb($dataToInsert) {
        $this->db->insert($this->_tProgrammers, $dataToInsert);

        // Validar los errores que se puedan presentar
        $error = $this->db->error();
        if ($error['message']) {
            throw new Exception($error['message'] . ' class:' . __CLASS__ . ' line:' . __LINE__);
        }

        return $this->db->insert_id();
    }

    /**
     * Consultar todos los programadores registrados
     * @author Michael Avila <mstavila99@gmail.com>
     * @date 24/02/2021
     * @return array Información de todos los programadores creados
     * @throws Exception
     */
    public function getAllProgrammerDb() {
        $query = $this->db->get($this->_tProgrammers);

        // Validar los errores que se puedan presentar
        $error = $this->db->error();
        if ($error['message']) {
            throw new Exception($error['message'] . ' class:' . __CLASS__ . ' line:' . __LINE__);
        }

        return $query->result_array();
    }

}

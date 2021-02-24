<?php

class dbProgrammers extends CI_Model {

    protected $_tProgrammers;

    public function __construct() {
        parent::__construct();

        $this->_tProgrammers = T_PROGRAMMERS;
    }

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

    public function createProgrammerDb($dataToInsert) {
        $this->db->insert($this->_tProgrammers, $dataToInsert);

        // Validar los errores que se puedan presentar
        $error = $this->db->error();
        if ($error['message']) {
            throw new Exception($error['message'] . ' class:' . __CLASS__ . ' line:' . __LINE__);
        }

        return $this->db->insert_id();
    }
    
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

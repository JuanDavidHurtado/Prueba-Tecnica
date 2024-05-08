<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUsuario extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerUsuarioPorLogin($login) {
        $consulta = $this->db->query("SELECT * FROM users AS u WHERE u.login = '$login'");
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return null;
        }
    }
}

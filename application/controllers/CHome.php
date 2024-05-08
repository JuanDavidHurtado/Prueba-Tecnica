<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CHome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    
        // $this->load->library(array('session', 'form_validation'));
    }
    public function index()
    {

        // Define el título
        $data['title'] = "Dashboard";

        // Carga la vista del encabezado común
        $this->load->view('VPlantilla/VHead', $data);

        $this->load->view('VPlantilla/VHeader');

        // Cargar la vista y pasar los datos como parámetro
        $this->load->view('VHome/VHome');

        $this->load->view('VPlantilla/VFooter');
    }
}

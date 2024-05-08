<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CLogin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$this->load->model('MUsuario');
	}



	public function index()
	{

		// Define el título
		$data['title'] = "Inicio Sesion";

		// Carga la vista del encabezado común
		$this->load->view('VPlantilla/VHead', $data);


		// Cargar la vista y pasar los datos como parámetro
		$this->load->view('VLogin');

		$this->load->view('VPlantilla/VFooter');
	}


	public function login()
{
    $login = $this->input->post('login');
    $pwd = $this->input->post('clave');

    //echo $login.' - '.$pwd; 

    $fila = $this->MUsuario->obtenerUsuarioPorLogin($login);

    if ($fila != null) {

        if ($pwd == $fila[0]->clave) {
            $data = array(
                'id_user' => $fila[0]->idUsers ,
                'nom_user' => $fila[0]->nombre . ' ' . $fila[0]->apellido,
                'login' => true
            );

            $this->session->set_userdata($data);

            echo json_encode(array('status' => 200, 'ruta' => base_url("index.php/CHome/")));
        } else {
            echo json_encode(array('status' => 400, 'msg' => 'El login y la clave no coinciden. Por favor, verifique.'));
        }
    } else {
        echo json_encode(array('status' => 400, 'msg' => 'El usuario no está registrado.'));
    }
}


    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

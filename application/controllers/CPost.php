<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class CPost extends CI_Controller
 {

    public function __construct()
 {
        parent::__construct();
        $this->load->model( 'MPost' );
        // Carga el modelo MPost

        // $this->load->library( array( 'session', 'form_validation' ) );
    }

    public function index()
 {

        // Define el título
        $data[ 'title' ] = 'Post';

        // Carga la vista del encabezado común
        $this->load->view( 'VPlantilla/VHead', $data );

        $this->load->view( 'VPlantilla/VHeader' );

        // Cargar la vista y pasar los datos como parámetro
        $this->load->view( 'VPost/VLista' );

        $this->load->view( 'VPlantilla/VFooter' );
    }

    // Método para obtener los posts y devolverlos como JSON

    public function traerPost()
 {
        $datos = $this->MPost->obtenerPost();
        // Devolver los datos en formato JSON
        echo json_encode( $datos );
    }

    public function guardar() {
        // Obtener el id_post enviado por POST
        $id_post = $this->input->post( 'id_post' );

        // Lógica para guardar el 'Bookmark' en el modelo
        $guardado = $this->MPost->guardar( $id_post );

        // Verificar si se guardó correctamente
        if ( $guardado ) {
            // Enviar respuesta de éxito
            echo json_encode( array( 'status' => 200, 'msg' => '¡El "Bookmark" se ha guardado correctamente!' ) );
        } else {
            // Enviar respuesta de error
            echo json_encode( array( 'status' => 400, 'msg' => 'Ha ocurrido un error al guardar el "Bookmark". Por favor, inténtelo de nuevo.' ) );
        }
    }
}

?>
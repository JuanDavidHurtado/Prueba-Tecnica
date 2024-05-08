<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MPost extends CI_Model
 {

    // Constructor
    public function __construct()
 {
        parent::__construct();
        // Carga la base de datos
        $this->load->database();
    }

    // Método para obtener los posts

    public function obtenerPost() {
        // Realiza la consulta para obtener los posts
        $query = $this->db->select( 'p.*, pb.post_idPost AS bookmark_id' )
        ->from( 'post p' )
        ->join( 'post_bookmark pb', 'p.idPost = pb.post_idPost', 'left' )
        ->get();

        // Devuelve los resultados como un array
        $result = $query->result_array();

        // Iterar sobre los resultados para agregar la información adicional
        foreach ( $result as &$post ) {
            // Si existe un bookmark para este post, establecer el mensaje correspondiente
            if ( $post[ 'bookmark_id' ] ) {
                $post[ 'message' ] = 'Registro en tabla "post_bookmark"';
            } else {
                // Si no hay bookmark, establecer el mensaje para mostrar el botón
                $post[ 'message' ] = '<button class="btn btn-sm btn-outline-primary btn-guardar-bookmark" data-id="' . $post[ 'idPost' ] . '">Guardar</button>';
            }
        }

        return $result;
    }

    // Método para guardar el bookmark
    public function guardar( $id_post ) {

        // Preparar los datos a insertar
        $data = array(
            'post_idPost' => $id_post
        );

        // Insertar el nuevo bookmark en la tabla post_bookmark
        $insertado = $this->db->insert( 'post_bookmark', $data );

        // Verificar si se insertó correctamente
        if ( $insertado ) {
            return true;
        } else {
            return false;
        }
    }
}

?>

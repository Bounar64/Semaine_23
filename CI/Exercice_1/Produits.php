<?php
// ********************* EXERCICE 1 CODEIGNITER *********************
// application/controllers/Produits.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Controller 
{

    public function liste()
    {
        $aView= array('prenom'=> 'Dave', 'nom'=> 'Loper');

        // On passe le tableau en second argument de la méthode 
        $this->load->view('liste', $aView);
    }
}
?>
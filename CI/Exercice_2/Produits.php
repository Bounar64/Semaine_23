<?php
//**************** EXERCICE 2 CODEIGNITER ****************
// application/controllers/Produits.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Controller 
{

    public function liste()
    {
        $aProduits["Produits"]= ["Aramis", "Athos", "Clatronic", "Camping", "Green"];   

        // On passe le tableau en second argument de la méthode 
        $this->load->view('liste', $aProduits);
    }
}
?>
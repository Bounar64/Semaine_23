<?php
// ******************* Exercice PHP P.O.O *******************

// 1 Ecrire une classe Employe avec les informations (propriétés) suivantes :
// Nom
// Prénom
// Date d’embauche dans l’entreprise
// Fonction (Poste) dans l’entreprise
// Salaire en K euros brut annuel
// Service dans lequel se situe l’employé (Comptabilité, Commercial,…)



    class Employe {

        public $nom;
        public $prenom;
        public $date_embauche;
        public $poste;
        public $salaire;
        public $service;
        public $agence;
        public $enfant;

        public function __construct($nom, $prenom, $date_embauche, $poste, $salaire, $service, $agence, $enfant) {
            $this->nom= $nom;
            $this->prenom= $prenom;
            $this->date_embauche= $date_embauche;
            $this->poste= $poste;
            $this->salaire= $salaire;
            $this->service= $service;
            $this->agence= $agence;
            $this->enfant= $enfant;
        }
       //2 Dans la classe Employe, écrire une méthode permettant de savoir depuis combien d’années
        //l’employé est dans l’entreprise.
        public function temps_service() {
            $d1= new Datetime($this->date_embauche);
            $d2= new DateTime();
            $diff= $d1->diff($d2);
            return $diff->format("%y");
        }
        // 3 Dans la classe Employe, écrire le(s) méthode(s) permettant de déduire le montant de cette
        // prime et de donner l’ordre de transfert à la banque le jour du versement. L’ordre de transfert à la
        // banque sera juste un message écrit dans la console spécifiant que l’ordre de transfert a été envoyé à
        // la banque avec mention du montant (salaire annuel 5% du brut, 2% du brut pour chaque année d’ancienneté)
        public function prime() {
                $prim= ($this->salaire * 5 / 100) * 1000;
                $anc= ($this->salaire * 2 / 100) * 1000; 

                if($this->temps_service() > 1) {
                    echo 'Prime annuelle: '. $prim .' euros'.'<br>';
                    echo 'Prime ancienneté: '. $anc .' euros'.'<br>';
                    echo 'Chèques vacances: Oui'.'<br>';
                    if(date('m-d') == ('11-30')) { // 30 Novembre la date du virement 
                        echo 'L’ordre de transfert a été envoyé à la banque montant: '.($prim + $anc).' euros';
                    } else {
                        echo 'Auncun virement attendre le 30 Novembre '. date('Y').'<br>';
                    }
                } else {      
                    echo "Moins d'un an de service, aucune prime ni de chèques vacances".'<br>'; 
                }                  
        }

        // 8 Chaque année, des chèques Noël sont distribués aux enfants des employés. Le montant du chèque
        // Noël dépend de l’âge des enfants :
        // - 20 euros pour les enfants de 0 à 10 ans
        // - 30 euros pour les enfants de 11 à 15 ans.
        // - 50 euros pour les enfants de 16 à 18 ans.
        // Modifier le programme afin de gérer l’attribution des chèques Noël aux enfants des salariés. Afficher
        // dans la console si l’employé a le droit d’avoir des chèques Noël (Oui/Non). Pour ce faire, établir les
        // conditions nécessaires dans le programme. Et si la réponse est Oui, afficher dans la console combien
        // de chèques de chaque montant sera distribué à l’employé. Si aucun chèque n’est distribué pour une
        // tranche d’âge, ne pas afficher dans la console.
        public function prime_noel() {
            if($this->enfant['age'] > 0 && $this->enfant['age'] <= 18) {
                echo "Chèques Noël: Oui".'<br>';
                } else {
                    echo "Chèques Noël: Non";
                }
                if($this->enfant['age'] > 0 && $this->enfant['age'] <= 10) {
                echo "Valeur: 20 euros";
                } if($this->enfant['age'] >= 11 && $this->enfant['age'] <= 15) {
                echo "Valeur: 30 euros";
                } if($this->enfant['age'] >= 16 && $this->enfant['age'] <= 18) {
                echo "Valeur: 50 euros";
                } 
            }
    }

    // 5 L’entreprise est d’envergure nationale, elle est constituée d’agences implantées sur tout le territoire.
    // Un employé fait partie d’une (et une seule) agence. Une agence dispose d’un nom, d’une adresse, d’un
    // code postal, d’une ville. Ecrire une nouvelle classe Agence qui contient tous ces éléments et modifier
    // la classe Employe afin que celui-ci soit rattaché à une agence.

    // 6 En ce qui concerne les repas, les agences ne disposent pas toutes d’un restaurant d’entreprise. Les
    // employés se trouvant dans les agences qui n’ont pas de restaurant d’entreprise bénéficient en
    // contrepartie de tickets restaurants. Chaque agence dispose donc de son propre mode de restauration.
    // Modifier la classe Agence pour gérer ce mode de restauration. Afficher dans la console chaque mode
    // de restauration de chaque employé selon l’agence dans laquelle il se trouve.

    class Agence {

        public $nom;
        public $adresse;
        public $postal;
        public $ville;
        public $restauration;
    
        public function __construct($nom, $adresse, $postal, $ville, $restauration) {
            $this->nom= $nom;
            $this->adresse= $adresse;
            $this->postal= $postal;
            $this->ville= $ville;
            $this->restauration= $restauration;
    }

        public function __toString() { // retourne seulement la valeur de nom en string exp "agence1"
            return $this->nom;             
        }    
    }

    $agence1= new Agence("Agence de Paris", "2 rue de paris", "75002", "Paris", "Restaurant d'entreprise");
    $agence2= new Agence("Agence de Bordeaux", "2 rue de bordeaux", "33100", "Bordeaux", "Ticket restaurant");
    $agence3= new Agence("Agence de Lille", "2 rue de Lille", "59160", "Lille","Restaurant d'entreprise");
    
    // créer au minimum 5 objets Employe avec des informations sensiblement différentes
    $employe1= new Employe("Dupont", "Paul", "2015-03-04", "Développeur front-end", 49, "Programmation", "$agence1", array('nom'=>'Dupont', 'prenom'=>'Pierre', 'age'=> 9)); // utiliser plus d'un enfant pas résolu
    $employe2= new Employe("Michelle", "Vaillant", "2011-03-08", "Développeur back-end", 50, "Programmation", $agence2, array('nom'=>'Michelle', 'prenom'=>'Louise', 'age'=> 12));
    $employe3= new Employe("Toa", "Li", "2018-11-28", "Graphiste", 52, "Design", $agence3, array('nom'=>'Toa', 'prenom'=>'Soun', 'age'=> 17));
    $employe4= new Employe("Bounar", "Rida", "2021-02-15", "Développeur full-stack", 42, "Programmation", $agence1, array('nom'=>'Bounar', 'prenom'=>'K', 'age'=> 4));
    $employe5= new Employe("Fortin", "Luke", "2001-01-01", "Web-master", 80, "Direction", $agence1, array('nom'=>'Fortin', 'prenom'=>'Marie', 'age'=> 28));

    echo $employe1->prime();
    echo $employe1->prime_noel();
    var_dump($employe1);

    // 7 L’entreprise souhaite intégrer dans ce système informatique les activités du comité d’entreprise. Des
    // chèques vacances sont distribués aux employés à condition que celui-ci soit au minimum depuis un an
    // dans l’entreprise. Modifier la classe Employe afin de savoir si celui-ci peut disposer de chèques
    // vacances ou non. LIGNE 52 ET 59.

    // 9 Un directeur est un employé comme un autre qui bénéficie d’un statut particulier. Chaque année, le
    // directeur reçoit une prime calculée sur le salaire annuel (7% du brut) et sur l’ancienneté (3% du brut
    // pour chaque année d’ancienneté). Cette prime est versée au 30/11 de chaque année. Créer la classe
    // Directeur et gérer le calcul de la prime et le versement pour celui-ci.

    class Directeur extends Employe {

        public function prime() {
            $prim= ($this->salaire * 7 / 100) * 1000;
            $anc= ($this->salaire * 3 / 100) * 1000;

            if($this->temps_service() > 1) {
                echo 'Prime annuelle: '. $prim .' euros'.'<br>';
                echo 'Prime ancienneté: '. $anc .' euros'.'<br>';
                if(date('m-d') == ('11-30')) { // 30 Novembre la date du virement 
                    echo 'L’ordre de transfert a été envoyé à la banque montant: '.($prim + $anc).' euros';
                } else {
                    echo 'Auncun virement attendre le 30 Novembre '. date('Y').'<br>';
                }                 
            }
        }
    }

    $employe6= new Directeur("Martin", "Luther", "2005-01-01", "Directeur", 120, "Direction", $agence1,  array('nom'=> null, 'prenom'=>null, 'age'=> null));
    echo $employe6->prime();
    var_dump($employe6);


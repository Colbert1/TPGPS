<?php


class user{
        //Variables
        public $_user;
        public $_password;
        private $_bdd;

        /* Fonctions
        
        Connexion BDD */
        public function __construct($bdd)
        {
                $this->_bdd = $bdd;
        }

        /*A continuer
        Function Connexion($serveur,$user,$passwd,$bdd)
                $serveur : adresse ip du serveur de BDD Lowrance
                $user : utilisateur ayant les droits de connexion sur BDD Lowrance
                $passwd : mot de passe associé à $user
                $bdd : nom de la base de donnée de la station météo 
        valeur de retour : true si la connexion est OK et un message d'erreur explicite
        sinon.*/
        public function Connexion($serveur,$user,$passwd,$bdd){

        }

        public function verifConnexion($username,$password){
        
                if($username !== "" && $password !== ""){
                $sql = $this->_bdd->prepare("SELECT count(*) FROM `user` WHERE `user`.`login` = `$username` AND `user`.`password` = `$password` ");
                $sql->execute();
                $reponse = $sql->fetch();
                $count = $reponse['count(*)'];

                        if($count!=0){ // nom d'utilisateur et mot de passe correctes
                                $_SESSION['username'] = $username;
                        }else{
                        echo "<a href='Accueil.php'>continuer</a>";     // nom d'utilisateur et mot de passe incorrectes
                        }
                }else{
                        echo "<a href='index.php'>Echec de connexion, continuer</a>";     // utilisateur ou mot de passe vide
                }
        }



} 



 /* 
Function Autorisation ($login,$passwd)
	avec  $login : utilisateur ayant autorisation d'accès au site web 
                     $passwd : mot de passe associé à $login
                  
        valeur de retour : true si $login et $passwd correspondent à une personne  
        autorisée dans la table user sinon false.*/


/* 
Function Modification_user ($login,$passwd)
	avec  $login : utilisateur devant être modifié
                     $passwd : mot de passe associé à $login non crypté
                  
           valeur de retour : true si les modifications sont un succès et sinon false. 
*/

/* 
Function Suppression_user ($login,$passwd)
	avec  $login : utilisateur devant être effacé 
                     $passwd : mot de passe associé à $login non crypté
                  
           valeur de retour : true si la suppression est un succès et sinon false. 
*/
?>
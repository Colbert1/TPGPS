<?php


class user
{
        //Variables
        public $_userComparaison;
        public $_passwordComparaison;
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
        public function Connexion($serveur, $user, $passwd, $bdd)
        {
        }

        //Fonction autorisation de connexion
        public function Autorisation($username, $password)
        {

                if ($username !== "" && $password !== "") {
                        $sql = $this->_bdd->prepare("SELECT count(*) FROM `user` WHERE `user`.`login` = '$username' AND `user`.`password` = '$password' ");
                        $sql->execute();
                        $reponse = $sql->fetch();
                        $count = $reponse[0];

                        if ($count != 0) { // nom d'utilisateur et mot de passe correctes
                                $_SESSION['username'] = $username;
                                $sql2 = $this->_bdd->prepare("SELECT `admin` FROM `user` WHERE `user`.`login` = '$username' AND `user`.`password` = '$password'");
                                echo "SELECT `admin` FROM `user` WHERE `user`.`login` = '$username' AND `user`.`password` = '$password'";
                                $sql2->execute();
                                $reponse2 = $sql2->fetch();
                                if ($reponse2 == 1) {
                                        echo "<a href='admin.php'>Connexion reussi, continuer en tant qu'Administrateur</a>";
                                } else {
                                        echo "<a href='compte.php'>Connexion reussi, continuer en tant qu'utilisateur</a>";
                                }
                                return TRUE;
                        } else {
                                echo "<a href='index.php'>User et mdp incorrects, continuer</a>"; // nom d'utilisateur et mot de passe incorrectes
                                return FALSE;
                        }
                } else {
                        echo "<a href='index.php'>Echec de connexion, continuer</a>";     // utilisateur ou mot de passe vide
                        return FALSE;
                }
        }

        //Fonction modification
        public function Modification_user($username, $password, $userModif, $passwordModif)
        {
                $this->_userComparaison = $username;
                $this->_passwordComparaison = $password;

                $sql = $this->_bdd->prepare("UPDATE `user` SET `login` = '$userModif AND `password` = '$passwordModif' WHERE `user`.`login` = '$username' AND `user`.`password` = '$password'");
                $sql->execute();

                //Comparaison entre les mdp et user de départ
                if ($this->_userComparaison == $username && $this->_passwordComparaison) {
                        return FALSE;
                } else {
                        return TRUE;
                }
        }

        //Fonction pour inscription à terminer
        public function Inscription_user($username, $password, $surname, $name, $mail)
        {
                $sql = $this->_bdd->prepare("INSERT INTO `user` (`id_user`, `nom`, `prenom`, `mail`, `login`, `password`, `admin`) VALUES (NULL, '$name', '$surname', '$mail', '$username', '$password', '0');");
                $sql->execute();
                $reponse = $sql->fetch();
                echo $reponse;
        }
} 
        
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

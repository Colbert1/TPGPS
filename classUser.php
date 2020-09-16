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

        //Fonction autorisation de connexion
        public function autorisation($username, $password)
        {

                if ($username !== "" && $password !== "") {
                        $sql = $this->_bdd->prepare("SELECT count(*) FROM `user` WHERE `user`.`login` = '$username' AND `user`.`password` = '$password' ");
                        $sql->execute();
                        $reponse = $sql->fetch();
                        $count = $reponse[0];

                        if ($count != 0) { // nom d'utilisateur et mot de passe correctes
                                $sql2 = $this->_bdd->prepare("SELECT `admin` FROM `user` WHERE `user`.`login` = '$username' AND `user`.`password` = '$password'");
                                $sql2->execute();
                                $reponse2 = $sql2->fetch();
                                if ($reponse2[0] == 1) {
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

        //Sélection de tous les utilisateurs
        public function selecUsers()
        {
                $sql = $this->_bdd->prepare("SELECT `login` FROM `user`");
                $sql->execute();

                
                $tabUser = array();
                $req = "SELECT chiffres FROM `table`";
                foreach  ($db->query($req) as $row) {
                        $tabUser = $row['chiffres'];
                }

                return $tabUser;
        }

        //Fonction modification
        public function modificationUser($username, $password, $userModif, $passwordModif)
        {
                $this->_userComparaison = $username;
                $this->_passwordComparaison = $password;

                $sql = $this->_bdd->prepare("UPDATE `user` SET `login` = '$userModif AND `password` = '$passwordModif' WHERE `user`.`login` = '$username' AND `user`.`password` = '$password'");
                $sql->execute();
                //A continuer : lecture bdd puis comparaison des données

                //Comparaison entre les mdp et user de départ
                if ($this->_userComparaison == $username && $this->_passwordComparaison) {
                        return FALSE;
                } else {
                        return TRUE;
                }
        }

        public function deleteUser($id_user)
        {

        }
        //Fonction pour inscription à terminer
        public function inscriptionUser($username, $password, $surname, $name, $mail)
        {
                $sql = $this->_bdd->prepare("INSERT INTO `user` (`id_user`, `nom`, `prenom`, `mail`, `login`, `password`, `admin`) VALUES (NULL, '$name', '$surname', '$mail', '$username', '$password', '0');");
                $sql->execute();
                $reponse = $sql->fetch();
                echo $reponse;
        }
}

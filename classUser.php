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
                        $sql = $this->_bdd->prepare("SELECT COUNT(*) FROM `user` WHERE `user`.`login` = '$username' AND `user`.`password` = '$password'");
                        $sql->execute();
                        $reponse = $sql->fetch();
                        $count = $reponse[0];
                        echo $count;

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
        //Compteur d'utilisateurs
        public function compteurUsers()
        {
                $sql = $this->_bdd->prepare("SELECT COUNT(*) `login` FROM `user`");
                $sql->execute();
                $compteur = $sql->fetch();

                return $compteur;
        }
        //Sélection de tous les utilisateurs
        public function selecUsers()
        {
                $tabUser = array();
                $req = "SELECT `login` FROM `user`";
                foreach ($this->_bdd->query($req) as $row) {
                        $tabUser[] = $row['login'];
                }

                return $tabUser;
        }

        //Fonction modification
        public function modificationUser($username, $password, $userModif, $passwordModif)
        {
                $this->_userComparaison = $username;
                $this->_passwordComparaison = $password;

                $sql = $this->_bdd->prepare("UPDATE `user` SET `login` = '$userModif' AND `password` = '$passwordModif' WHERE `user`.`login` = '$username' AND `user`.`password` = '$password'");
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
        public function afficheUser($username, $password, $surname, $name, $mail, $admin,$id)
        {
                $sql = $this->_bdd->prepare("SELECT `nom`='$name',`prenom`='$surname',`mail`='$mail',`login`='$username',`password`='$password',`admin`='$admin' FROM `user` WHERE id_user = '$id'");
                $sql->execute();
                $reponse = $sql->fetch();
                echo $reponse;
                //pour plus tard afficher les bateaux
                /*<php $aff = new GPS($conn);
                $affVitesse = $aff->afficheVitesse();
                echo $affVitesse; ?*/
        }
}

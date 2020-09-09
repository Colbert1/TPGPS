<?php /* 
Function Connexion($serveur,$user,$passwd,$bdd)
avec $serveur : adresse ip du serveur de BDD Lowrance
 $user : utilisateur ayant les droits de connexion sur BDD Lowrance
 $passwd : mot de passe associé à $user
 $bdd : nom de la base de donnée de la station météo 
 valeur de retour : true si la connexion est OK et un message d'erreur explicite
 sinon.*/

class user{
        //Variables
        private $_user;
        private $_password;
        private $_dbname;
        private $_dbusername;
        private $_dbpasswd;
        private $_dbhost;

        /* Fonctions
        
        Connexion BDD */
        public function __construct($user,$password)
        {
                $this->_user = $user;
                $this->_password = $password;
        }
        
        public function connectBDD($dbhost,$dbname,$dbusername,$dbpasswrd){
                try {
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpasswrd);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        echo "Connected successfully";
                }catch(PDOException $e){
                        echo "Connection failed" . $e->GetMessage();
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
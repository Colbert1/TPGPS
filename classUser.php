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
        public $_user;
        public $_password;
        private $_bdd;

        /* Fonctions
        
        Connexion BDD */
        public function __construct($bdd)
        {
                
        }

        public function connectBDD($db_host,$db_name,$db_username,$db_passwrd){
                try {
                $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_passwrd);      
                        echo "Connected successfully";
                }catch(PDOException $e){
                        echo "Connection failed" . $e->GetMessage();
                }
                $this->_bdd = $conn; 
        }

        public function verifConnexion($username,$password,$conn){
        
                if($username !== "" && $password !== ""){
                $sql = $this->_bdd->prepare("SELECT count(*) FROM `user` WHERE `user`.`login` = `$username` AND `user`.`password` = `$password` ");
                $sql->execute();
                $reponse = $sql->fetch();
                $count = $reponse['count(*)'];

                        if($count!=0){ // nom d'utilisateur et mot de passe correctes
                                $_SESSION['username'] = $username;
                        }else{
                        echo "<!--Formulaire de connexion-->
                        <form action='verification.php' method='POST'>
                        <h1>Identification</h1>

                                <p>Nom d'utilisateur :</p>
                                        <input type='text' placeholder='Entrer le nom d'utilisateur' name='username' required>    
                                <p>Mot de passe :</p>
                                        <input type='text' placeholder='Entrer le mot de passe' name='password' required>
                                        <input type='submit' id='submit' value='LOGIN'>
                        </form>"; // utilisateur ou mot de passe incorrect
                        }
                }else{
                    header('refresh: 1'); // utilisateur ou mot de passe vide
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
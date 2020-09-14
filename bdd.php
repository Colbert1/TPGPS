public function connectBDD($db_host,$db_name,$db_username,$db_passwrd){
                try {
                $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_passwrd);      
                        echo "Connected successfully";
                }catch(PDOException $e){
                        echo "Connection failed" . $e->GetMessage();
                }
                $this->_bdd = $conn; 
        }
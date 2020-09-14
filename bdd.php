<?php
                try{
                $conn = new PDO("mysql:host='192.168.64.204';dbname='projet_GPS'", 'root', 'root');      
                        echo "Connected successfully";
                }catch(PDOException $e){
                        echo "Connection failed" . $e->GetMessage();
                }
}
?>
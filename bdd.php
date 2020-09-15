<?php
                try{
                $conn = new PDO('mysql:host=localhost;dbname=projetGPS', 'root', 'root');      
                        echo "Connected successfully";
                }catch(PDOException $e){
                        echo "Connection failed" . $e->GetMessage();
                }
?>
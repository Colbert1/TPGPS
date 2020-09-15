<?php
class GPS
{
    public function recupGPS()
    {
        //recupere latitude et longitude
    }
    public function afficheGPS()
    {
        //affiche latitude et longitude
    }
    public function recupVitesse()
    {
        //recupere vitesse et vitesse moyenne

    }
    public function afficheVitesse()
    {
        //affiche vitesse et vitesse moyenne
        /*$reponse = $bdd->query('SELECT `nom_bateau`, `date`, `heure`, `latitude`, `longitude`, `vitesse`, `vitesse_moyenne` FROM `bateau`,`coordonnees` WHERE 2');
        while ($donnees = $reponse->fetch()) {

            echo 'Nom du bateau : ' . $donnees['nom_bateau'] . '<p>';
            echo 'Date : ' . $donnees['date'] . '<p>';
            echo 'Heure : ' . $donnees['heure'] . '<p>';
            echo 'Latitude : ' . $donnees['latitude'] . '<p>';
            echo 'Longitude : ' . $donnees['longitude'] . '<p>';
            echo 'Vitesse : ' . $donnees['vitesse'] . '<p>';
            echo 'Vitesse Moyenne : ' . $donnees['vitesse_moyenne'] . '<p>';
        }*/
    }
}

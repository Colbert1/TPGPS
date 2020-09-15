<!--
Permettre via un menu de pouvoir modifier ou supprimer un compte existant de la BDD.
Il faudra d’abord afficher la liste des comptes existants puis en sélectionner
un pour modification ou suppression.
Cette page ne sera accessible que si l’utilisateur est un administrateur authentifié.
-->

<head>
<link rel="stylesheet" href="styleAdmin.css">    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">
        <img src="favicon.png" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy"> Espace Administration</span>
</nav>
<div class="container">
    <button type="button" class="btn btn-primary btn-lg btn-block">Modification</button>
    <button type="button" class="btn btn-secondary btn-lg btn-block">Suppression</button>
    
</div>
<?php
/* 

condition if si user admin = 0 accès à cette page refusé
footer suppression/modification
menu déroulant qui affiche tous les comptes avec à coté une checkbox pour selectionner le compte à modifier ou supprimer

*/
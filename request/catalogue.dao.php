<?php
require_once 'config/db.php';
// Fonction de requête de tous les cours
function getCours()
{
    $dbh = getConnexion();
    $req = "SELECT * FROM cours";
    return $dbh->query($req)->fetchAll();
}
// Fonction de requête d'un type en fonction de son id
function getCoursType($idType)
{
    $dbh = getConnexion();
    $req2 = "SELECT libelle FROM types WHERE idType = :idType";
    $stmt = $dbh->prepare($req2);
    // On bind la value en paramètre pour sécuriser la requête
    $stmt->bindValue(":idType", $idType, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}
// Fonction de requête du nom d'un cours en fonction de son id
function getCoursNameToDelete($idCours)
{
    $dbh = getConnexion();
    $req = 'SELECT CONCAT(idCours, " : ",libelle) AS monCours FROM cours WHERE idCours = :idCours';
    $stmt = $dbh->prepare($req);
    $stmt->bindValue(":idCours", $idCours, PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetch();
    return $res['monCours'];
}
// Fonction de requête pour supprimer un cours en fonction de son id
function deleteCours($idCours)
{
    $dbh = getConnexion();
    $req = "DELETE FROM cours WHERE idCours = :idCours";
    $stmt= $dbh->prepare($req);
    $stmt->bindValue(":idCours", $idCours, PDO::PARAM_INT);
    return $stmt->execute();
}
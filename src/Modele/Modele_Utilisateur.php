<?php

namespace App\Modele;

use App\Utilitaire\Singleton_ConnexionPDO;
use PDO;

class Modele_Utilisateur
{
    /**
     * @return mixed : le tableau des enregistrements dans la table "table"(something went wrong...)
     */
static function  Utilisateur_Select()
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
select *
    from `Utilisateur`
    order by id');
        $reponse = $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
        $tableauReponse = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
        return $tableauReponse;
    }

    public static function Utilisateur_Insert(mixed $nom, mixed $prenom, mixed $motDePasse)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
        insert into `Utilisateur` (nom, prenom, motDePasse) values (:nom, :prenom, :motDePasse)');
        $reponse = $requetePreparee->execute(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "motDePasse" => $motDePasse
        ));
        return $reponse;
    }

    public static function Utilisateur_Delete(mixed $id)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
        delete from `Utilisateur` where id=:id');
        $reponse = $requetePreparee->execute(array(
            "id" => $id
        ));
        return $reponse;
    }

    public static function Utilisateur_SelectById(mixed $id)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
        select * from `Utilisateur` where id=:id');
        $reponse = $requetePreparee->execute(array(
            "id" => $id
        ));
        $tableauReponse = $requetePreparee->fetch(PDO::FETCH_ASSOC);
        return $tableauReponse;
    }

    public static function Utilisateur_Update(mixed $id, mixed $nom, mixed $prenom, mixed $motDePasse)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        $requetePreparee = $connexionPDO->prepare('
        update `Utilisateur` set nom=:nom, prenom=:prenom, motDePasse=:motDePasse where id=:id');
        $reponse = $requetePreparee->execute(array(
            "id" => $id,
            "nom" => $nom,
            "prenom" => $prenom,
            "motDePasse" => $motDePasse
        ));
        return $reponse;
    }

}
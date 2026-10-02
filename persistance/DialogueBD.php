<?php

require_once 'connexion.php';

class DialogueBD
{
    public function getTousLesFournisseurs()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM fournisseurs ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabFournisseurs = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabFournisseurs;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getUnFournisseur($idFournisseur)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM fournisseurs WHERE id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idFournisseur));
            $fournisseur = $sth->fetchObject();
            return $fournisseur;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getProduitsFournisseur($idFournisseur)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM produits WHERE fournisseur_id=?";
            $sql = $sql . " ORDER BY nom_produit";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idFournisseur));
            $tabProduits = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabProduits;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}
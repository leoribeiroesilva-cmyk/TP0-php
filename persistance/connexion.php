<?php

class Connexion
{
    private static $cnx = null;

    public static function getConnexion()
    {

        $dbhost = 'localhost';
        $dbbase = 'lr_revision';
        $dbuser = 'root';
        $dbpwd = '';

        try {
            self::$cnx = new PDO("mysql:host=$dbhost;dbname=$dbbase", $dbuser, $dbpwd);
            self::$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$cnx->exec('SET CHARACTER SET utf8');
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
        return self::$cnx;
    }

    public static function deConnexion()
    {
        try {
            self::$cnx = null;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}
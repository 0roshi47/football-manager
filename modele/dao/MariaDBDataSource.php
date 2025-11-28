<?php

class MariaDBDataSource {

    private static String $user = "442033_football";
    private static String $password = "A^KM+yN?,~6c+bC";
    private static String $url = "mysql-liam-valty.alwaysdata.net";
    private static String $db = "liam-valty_football";

    protected ?PDO $connection;

    public static function getConnexion(): PDO {
        if (MariaDBDataSource::$connection == null) {
            $url = MariaDBDataSource::$url;
            $db = MariaDBDataSource::$db;
            try {
                MariaDBDataSource::$connection = new PDO("mysql:host=MariaDBDataSource::$url;dbname=MariaDBDataSource::$db", MariaDBDataSource::$user, MariaDBDataSource::$password);
            } catch (PDOException $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return MariaDBDataSource::$connection;
    }

    public static function deconnexion(): void {
        MariaDBDataSource::$connection = null;
    }

}
?>
<?php
class MariaDBDataSource {
    
    private static String $host = "mysql-liam-valty.alwaysdata.net";
    private static String $port = "3306";
    private static String $db = "liam-valty_football";
    private static String $user = "442033_football";
    private static String $password = "A^KM+yN?,~6c+bC";
    private static ?PDO $connection = null;

    public static function getConnexion(): PDO {
        if (!isset(self::$connection)) {
            try {
                self::$connection = new PDO("mysql:host=mysql-liam-valty.alwaysdata.net;port=3306;dbname=liam-valty_football", "442033_football", "A^KM+yN?,~6c+bC");
            } catch (PDOException $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function deconnexion(): void {
        MariaDBDataSource::$connection = null;
    }
}
?>
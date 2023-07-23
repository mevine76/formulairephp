<?php
// Database.php

class Database {
    private static $host = "localhost";
    private static $dbname = "expense";
    private static $username = "root";
    private static $password = "";
    private static $conn;

    public static function connect() {
        try {
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
}


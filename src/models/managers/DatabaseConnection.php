<?php

class DatabaseConnection extends PDO{
    private static $connection = [];

    /**
     * The Singleton's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    private function __construct(String $configFile) { 
        $config = parse_ini_file($configFile);


        $dsn="pgsql:
                host={$config['database_host']};
                port={$config['database_port']};
                dbname={$config['database_name']}";
        $user=$config['database_user'];
        $password=$config['database_password'];
        try {
            $pdo = parent::__construct($dsn,$user,$password);
            return $pdo;
        } catch (PDOException $pdoe) {
            var_dump($pdoe->getMessage());
            return false;
        }
    }

    public static function getConnection(): DatabaseConnection
    {
        $cls = static::class;
        if (!isset(self::$connection[$cls])) {
            self::$connection[$cls] = new static("DBconfig.ini");
        }

        return self::$connection[$cls];
    }

    /**
     * Singletons should not be cloneable.
     */
    protected function __clone() { }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }
    

}


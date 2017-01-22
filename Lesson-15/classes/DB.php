<?php
class DB
{
    public $pdo;
    public function connectToDB()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET NAMES 'utf8'");
        } catch (Exception $e) {
            echo "Ошибка загрузки базы данных";
            exit;
        }
    }

    public function getAllTablesNames()
    {
        $sth = $this->pdo->prepare('SHOW TABLES');
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getTableInfo($table)
    {
        $sth = $this->pdo->prepare('DESCRIBE '. $table);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

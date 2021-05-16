<?php
/*
 * Класс для работы с базой данных MySQL через библиотеку PDO
 * (c)Sergey.V.Repin 2018 s.repin@vkassist.ru
 */
define('DB_PASSWORD', 'MwAVclhFmYhVZvd4');
define('DB_USER', 'dbgorodki');
define('DB_CONNECTION_STRING',"mysql:host=127.0.0.1;dbname=gorodki;charset=utf8");


class DB{
    public $sql; //Строка - запрос
    public $data = array(); //Массив - плейсхолдеры
    
    //Получение одного значения(объекта)
    public function getOne(){
        $pdo = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PASSWORD);
        try{
            $stm = $pdo->prepare($this->sql);
            $stm->execute($this->data);
            return $stm->fetch(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            file_put_contents('PDOErrors.txt', $e->getMessage(),FILE_APPEND);
            return;
        }
    }
    
    //Получение массива значений(объектов)
    public function getArray(){
        $response = array();
        $pdo = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PASSWORD);
        try{
            $stm = $pdo->prepare($this->sql);
            $stm->execute($this->data);
            while($row = $stm->fetch(PDO::FETCH_OBJ)):
                array_push($response,$row);
            endwhile;
            return $response;
        }
        catch(PDOException $e){
            file_put_contents('PDOErrors.txt', $e->getMessage(),FILE_APPEND);
            return;
        }
    }
    
    //Выполнение команды типа(INSERT INTO, CREATE TABLE и.т.п.)
    public function execRequest(){
        $pdo = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PASSWORD);
        try{
            $stm = $pdo->prepare($this->sql);
            $stm->execute($this->data);
        }
        catch(PDOException $e){
            file_put_contents('PDOErrors.txt', $e->getMessage(),FILE_APPEND);
        }  
        return;
    }


    public function getArrayASSOC(){
            $response = array();
            $pdo = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PASSWORD);
            try{
                $stm = $pdo->prepare($this->sql);
                $stm->execute($this->data);
                while($row = $stm->fetch(PDO::FETCH_ASSOC)):
                    array_push($response,$row);
                endwhile;
                return $response;
            }
            catch(PDOException $e){
                file_put_contents('PDOErrors.txt', $e->getMessage(),FILE_APPEND);
                return;
            }
    }
        
    
    public function getOneASSOC(){
        $pdo = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PASSWORD);
        try{
            $stm = $pdo->prepare($this->sql);
            $stm->execute($this->data);
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            file_put_contents('PDOErrors.txt', $e->getMessage(),FILE_APPEND);
            return;
        }
    }
}

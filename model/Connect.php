<?php

namespace Model;

abstract class Connect {

  const HOST = "localhost";
  const DB = "cinema";
  const USER = "root";
  const PASS = "";

  public static function seconnecter() {
    try {
      return new \PDO("mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
    } catch (\PDOException $e) {
      return $e->getMessage();
    }
  }
}
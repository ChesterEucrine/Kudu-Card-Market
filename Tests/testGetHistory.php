<?php
include('php/getHistory.php');
class GetHistoryTest extends PHPUnit\Framework\TestCase
{ 
  private $pdo;
  
  function setUp(): void
  {
    $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->pdo-query("CREATE TABLE MARKET(MARKET_ID int NOT NULL PRIMARY KEY, IMAGE_URL varchar(30), NAME varchar(30), PRICE int, CATEGORY varchar(30), DESCRIPTION varchar(100))");
    $this->pdo->query("CREATE TABLE PURCHASES(STUDENT_NO int NOT NULL PRIMARY KEY, MARKET_ID int FOREIGN KEY REFERENCES MARKET(MARKET_ID))");
    
    #insert dummy values
    $this->pdo-query("INSERT INTO MARKET VALUES(0, 'img_url','Book',250, 'Hobbies', 'A simple technology for entertainment and knowledge sharing' );");
    $this->pdo-query("INSERT INTO PURCHASES(1000, 0)");
  }
  
  public function testGetHIstory()
  {
    $result = getUserHistory($link, 0);
    $this->assertEquals(2, $result.length);
  }
}

?>

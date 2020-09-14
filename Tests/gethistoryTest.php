<?php
include './php/getHistory.php';

class gethistoryTest extends PHPUnit\Framework\TestCase
{
  /**
  * @var PDO
  */
  private $pdo;
  
  public function setUp(): void
  {
    $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //create the PURCHASES table
    $this->pdo->query(
      "CREATE TABLE IF NOT EXISTS PURCHASES (
       STUDENT_NO varchar(20) ,
       MARKET_ID int(11) unsigned ,
       PURCHASE_DATE date
       );"
     );
     
     //create MARKET_NEW table
     $this->pdo->query(
       "CREATE TABLE IF NOT EXISTS MARKET_NEW (
        MARKET_ID int(11) unsigned NOT NULL,
        IMAGE_URL text,
        NAME varchar(30) NOT NULL,
        PRICE decimal(6,2) NOT NULL,
        CATEGORY varchar(30) NOT NULL,
        DESCRIPTION text NOT NULL
        );"
       );  
    
    //insert values into PURCHASE
    $this->pdo->query("INSERT INTO PURCHASES VALUES ('7777777',18,'2020-06-08'),('7777777',18,'2020-06-08'),('1234',10,'2020-06-13'),('1234',18,'2020-06-13');");
        
    //insert values into MARKET_NEW
    $this->pdo->query(
      "INSERT INTO MARKET_NEW VALUES (10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),
      (11,'https://lamp.ms.wits.ac.za/~s1965919/uploads/11.png','Asus Laptop 15',8999.99,'Electronics','Whether for work or play, ASUS M509 is the entry-level laptop that delivers powerful performance and immersive visuals. Its NanoEdge display boasts wide 178? viewing angles and a matte anti-glare coating for a truly engaging experience. Inside, it?s powered by up to AMD Ryzen? processor with 8GB RAM andf a fast 512GB SSD gives you the perfect combination of large storage capacity and fast data read/write speeds.'),
      (12,'https://lamp.ms.wits.ac.za/~s1965919/uploads/12.jpeg','Lenovo ThinkPad UltraSlim Supe',1193.62,'Electronics','PRODUCT DETAILS\n\nBrand:Lenovo\n\nFormat:DVD\n\nType:External\n\nConnection:USB\n\nLenovo ThinkPad UltraSlim USB DVD Burner - Disk drive - DVD?RW (?R DL) / DVD-RAM - SuperSpeed USB 3.0 - external - CRU - for ThinkCentre M83; ThinkPad E440; E540; X1 Carbon'),
      (13,'https://lamp.ms.wits.ac.za/~s1965919/uploads/13.jpeg','Acer Nitro 5',9999.99,'Electronics','PRODUCT DETAILS\n\nOperating system:Windows OS\n\nScreen size:15.6 in\n\nInstalled memory:3 GB RAM\n\nGraphics processor:NVIDIA GPU\n\nExplore and enjoy a new and more immersive level of gaming with the Nitro 5?s full HD display and powerful gaming tech.');"
    );
    
    global $pdo;
    $pdo = $this->pdo;
  }
  
  public function testgetPurchases()
  {
      global $pdo;
     //test to see that the MarketId of the value in the first row is 18
     $this->assertEquals(18,getPurchases($pdo,'7777777'));
  }
  
  public function testgetItemDetails()
  {
    //test 1st column from the first row
    $first = 'Acer Asphire 1';
    
    $this->assertEquals($first, getItemDetails($this->pdo, 10));
  }
 
}
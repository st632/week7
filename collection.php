<?php
include 'dbConn.php';

class collection{

public function __construct(){
  $class24=get_called_class();
  $this->search(6,$class24);
}	
	
public function search($count,$class24){
    $db=dbConn::getConnection();
    $sql = 'SELECT * FROM '.$class24.' where id< :count1';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':count1', $count);
    $stmt->execute();	
    $rows=$stmt->rowCount();
    echo 'Row count= '.$rows;
    echo '<br>';
    $rowtotal=$stmt->fetchALL(PDO::FETCH_ASSOC);
    echo "<table border=2>";
    $this->displayHeaderFiles($class24);
    $this->displayTableContents($rowtotal);
    echo "</table>";
  }

public function displayHeaderFiles($class24){
  $db1=dbConn::getConnection();
  $sql1 = 'SHOW COLUMNS FROM '.$class24;
  $stmt1 = $db1->prepare($sql1);
  $stmt1->execute();
  $headers=$stmt1->fetchAll(PDO::FETCH_COLUMN);
  
  foreach($headers as $col){
        echo "<td>$col</td>";
        }    
    }
   
public function displayTableContents($e){

    foreach( $e as $row) {
      echo "<tr>";
      foreach($row as $col){
        echo "<td>$col</td>";
        }
        echo "<tr>";
      }    
    }
}
class accounts extends collection{
	
	

}
?>
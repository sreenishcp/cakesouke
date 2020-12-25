<?php
// class test {
//   function test1  (int $i,float $j):int {
//     return function() use ($i,$j) {
//      return $i+$j;
//     };
//   }
//   function __construct(){
//      $this->test1(1,2);
//   }
// }
// new test ;
// function createGreeter($who):string {
//               return  $result = function() use ($who) {
//                   return 1;
//               };
// }

// $greeter = createGreeter("World");
// $greeter(); // Hello World
// header('Content-Type: application/json');
//    $dbhost = 'localhost';
//    $dbuser = 'root';
//    $dbpass = 'admin123';
//    $db='safety_db';
//    $dbhandle = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
 
// if($dbhandle->connect_errno > 0){
//     die('Unable to connect to database [' . $dbhandle->connect_error . ']');exit();
// }
//    $sql = 'SELECT * FROM Child limit 1';
 
//    $result = $dbhandle->query($sql);
   
//    if(! $result ) {
//       die('Could not get data: ' . mysql_error());
//    }
//    $output=array();
//    while($row = mysqli_fetch_assoc($result)) {
//      $output[]=$row;
//    }
   
//    echo json_encode($output);
   
// connect to mongodb
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//$manager = new MongoDB\Driver\Manager("mongodb://lokate_root:lokate@2019@18.220.184.191/lokate_db");

// mongo -u lokate_root -p lokate123 18.220.184.191/lokate_db
// $connection_string="mongodb://lokate_root:lokate123@18.220.184.191:27017/lokate_db";
$manager = new MongoDB\Driver\Manager($connection_string);
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['x' => 1]);
$bulk->insert(['x' => 2]);
$bulk->insert(['x' => 3]);
$manager->executeBulkWrite('db.lokate_db', $bulk);

$filter = ['x' => ['$gt' => 1]];
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['x' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('db.lokate_db', $query);

foreach ($cursor as $document) {
    var_dump($document);
}
?>

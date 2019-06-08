<?php
include ("database.php");
$test = new Database();
$field ="id,firstName";
//$field=array("id","firstName");
$table="user";
$condition =("firstName =  'le thi'");
$data=array('firstName'=>'le thi', 'lastName'=>'anh van thich em', 'email'=>'lehue@gmail.com', 'password'=>'123456', 'activeCode'=>'123456', 'statusId'=>1, 'roll'=>1);

    // * select($field,$table,$condition="1")
    // * insert($table,$data,$viewInsert=0)
    // * update($table,$data,$condition,$viewUpdate=0)
    // * tableNameId($table)
    // * checkExists($table,$condition,$viewResult=0)
echo "<br>";
var_dump($test->select($field,$table,$condition));
echo "<br>";
var_dump($test->insert($table,$data,1));
echo "<br>";
var_dump($test->insert($table,$data));
echo "<br>";
var_dump($test->update($table,$data,$condition,1));
echo "<br>";
var_dump($test->update($table,$data,$condition));
echo "<br>";
var_dump($test->tableNameId($table));
echo "<br>";
//var_dump($data);

//INSERT INTO 'user' ('id', 'firstName', 'lastName', 'email', 'password', 'activeCode', 'statusId', 'roll', 'Create_tb', 'Update_tb') VALUES (NULL, 'le', 'hue', 'lehue@gmail.com', '123456', '123', '1', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
?>
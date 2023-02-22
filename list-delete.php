<?php
session_start();
require_once './core/connection.php';
require_once './core/function.php';

if ($_SERVER["REQUEST_METHOD"]==='POST'){
     $id=$_POST["id"];
     $sql="DELETE FROM oks_pr WHERE id=$id";
     if(mysqli_query($conn,$sql)){
          $_SESSION['status']=[
               'message'=>"list_deleted"
          ];
          header('LOCATION:list-index.php');
     }
}
<?php 
if(isset($_GET["id"]))
{
    

    $id=$_GET["id"];
            $deleteAccount = "delete from accounts where user_id =$id";
            $deleteUser = "delete from users where id =$id";

            include('connexion-bd.php');
            $connexion->exec($deleteAccount);
            $connexion->exec($deleteUser);

            header('Location:list_of_users.php');



}










?>
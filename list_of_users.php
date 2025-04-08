<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of users</title>
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
<?php
            include('connexion-bd.php');
            $userReq = "select * from users";
            $lancer = $connexion->query($userReq);
            $users = $lancer->fetchAll();
           
            ?>
    

    <?php include("header.php"); ?>
<div class="list-of-users">
    <h1>Utilisateurs</h1>
    <div><a href="register.php" id="btn-btn">Ajouter</a></div><br>
    <hr>
    <table>
    <tr>
        <th>#</th> 
        <th>Nom</th> 
        <th>Prenom</th>
        <th>Email</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
        <?php 
            foreach ($users as $user) {
                $id = $user ["id"];
                echo  
                "<tr>
                    <td>"
                        .$user ["id"].
                    "</td>
                    <td>"
                        .$user ["nom"].
                    "</td>
                    <td>"
                        .$user ["prenom"].
                    "</td>
                    <td>"
                        .$user ["email"].
                    "</td>
                    <td>
                        <a href=\"f-modification.php?id=$id\">
                            <i class=\"fa fa-edit edit\"></i>
                        </a>
                    </td>
                    <td>
                        <a href=\"suprimer.php?id=$id\">
                            <i class=\"fa fa-trash delete\"></i>
                        </a>
                    </td>
                </tr>";
            }  
        ?>
        
    
    
    </table> 
</div>
</body>
</html>
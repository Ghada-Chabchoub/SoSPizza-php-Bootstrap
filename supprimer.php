<?php
session_start();

if (isset($_GET['id'])) {
    include "db_conn.php";

    $id = $_GET['id'];

    #supprimer les données de la base de données 
    $sql = "DELETE FROM tb_order WHERE id=$id";
    $conn->exec($sql);

    #rediriger l'utilisateur vers la page panier.php après avoir supprimé la commande
    header("Location: panier.php");
} else {
    echo "ID non fourni";
}
?>

<?php
include "db_conn.php";
include "form_validation.php";

if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['num']) && isset($_POST['ord']) && isset($_POST['add'])) {

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $num = $_POST['num'];
    $ord = $_POST['ord'];
    $add = $_POST['add'];

    # validation du formulaire
    $text = 'name';
    $location = "modifier.php?id=".$id;
    $ms = "erreur";
    is_empty($nom, $text, $location, $ms, "");

    $text = 'Number';
    $location = "modifier.php?id=".$id;
    $ms = "erreur";
    is_empty($num, $text, $location, $ms, "");

    $text = 'Order';
    $location = "modifier.php?id=".$id;
    $ms = "erreur";
    is_empty($ord, $text, $location, $ms, "");

    $text = 'Address';
    $location = "modifier.php?id=".$id;
    $ms = "erreur";
    is_empty($add, $text, $location, $ms, "");

    # mise à jour des données dans la base de données
    $sql = "UPDATE tb_order SET name='$nom', `ordre`='$ord', number='$num', address='$add' WHERE id=$id";
    $conn->exec($sql);

    #rediriger l'utilisateur vers la page panier.php après avoir soumis le formulaire
    header("Location: panier.php");
}




else {
    # récupérer l'ID du client à modifier depuis la page panier.php
    $id = $_GET['id'];

    # récupérer les informations du client à modifier
    $sql = "SELECT * FROM tb_order WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        $row = $result->fetch();
        $nom = $row['name'];
        $num = $row['number'];
        $ord = $row['ordre'];
        $add = $row['address'];
    }
  

   
    
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification</title>
    <link rel="stylesheet" href="styleForm.css">
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?php echo $nom;?>"><br><br>
    <label for="num">Numéro:</label>
    <input type="text" id="num" name="num" value="<?php echo $num;?>"><br><br>
    <label for="ord">Commande:</label>
    <input type="text" id="ord" name="ord" value="<?php echo $ord;?>"><br><br>
    <label for="add">Adresse:</label>
    <input type="text" id="add" name="add" value="<?php echo $add;?>"><br><br>
    <input type="submit" value="Modifier"  >
</form>

</body>
</html>
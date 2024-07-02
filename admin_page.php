<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <!-- font awesome cdn link pour les icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="StyleProj.css">

</head>
 <header>
    <a href="#" class="logo">Resto.</a>

    <nav class="navbar">
     <a  class="active" >Gestion des commandes</a>  
     
    </nav>

    <div class="icons">
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
    </div>

 </header>
 <section class="home" id="home">
    <div class=" home-slider">
        <div class="wrapper">
            <div class="slide">
                <div class="content">
                   <h3>Les commandes de vos clients  </h3>
                   
                   
                </div>
            </div> 
        </div> 
    </div>   
</section>
  
 <?php 
session_start();

if(isset($_POST['nom']) && isset($_POST['num']) && isset($_POST['ord']) && isset($_POST['add'])) {
    include "db_conn.php";
    include "form_validation.php";

    $nom = $_POST['nom'];
    $num = $_POST['num'];
    $ord = $_POST['ord'];
    $add = $_POST['add'];
    
    #validation du formulaire 
    $text = 'Name';
    $location = "home.php";
    $ms = "erreur";
    is_empty($nom, $text, $location, $ms,"");

    $text = 'Number';
    $location = "home.php";
    $ms = "erreur";
    is_empty($num, $text, $location, $ms,"");

    $text = 'Order';
    $location = "home.php";
    $ms = "erreur";
    is_empty($ord, $text, $location, $ms,"");

    $text = 'Adress';
    $location = "home.php";
    $ms = "erreur";
    is_empty($add, $text, $location, $ms,"");

    #insérer les données dans la base de données 
    if(isset($conn)) {
        $sql = "INSERT INTO tb_order (`name`, `ordre`, `address`, `number`) VALUES ('$nom', '$ord', '$add', '$num')";
        $conn->query($sql);
    }
}

include "db_conn.php";

$nom = isset($nom) ? $nom : "";
$num = isset($num) ? $num : "";

# sélectionner les données de la base de données 
if(isset($conn)) {
    $sql = "SELECT * FROM tb_order";
    $result = $conn->query($sql);

    # afficher les résultats 
    if ($result->rowCount() > 0) {
        echo "<table>
            <tr>
            <th>Nom</th>
            <th>Numéro</th>
            <th>Commande</th>
            <th>Adresse</th>
            
            
            
            </tr>";
        while($row = $result->fetch()) {
            echo "<tr>
                <td>".$row["name"]."</td>
                <td>".$row["number"]."</td>
                <td>".$row["ordre"]."</td>
                <td>".$row["address"]."</td>
                <td>
                <td>
                    <button class='preparation-btn' data-id='".$row["id"]."' data-status='preparation' style='background-color: orange;'>En cours de préparation</button>
                </td>
            </tr>";
                
        }
        echo "</table>";
    }
   

} else {
    echo "Aucune commande trouvée pour ce moments";
}

?>

<script>
    const preparationBtns = document.querySelectorAll('.preparation-btn');
    preparationBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            const currentStatus = btn.dataset.status;
            if (currentStatus === 'preparation') {
                btn.innerText = 'Commande livrée';
                btn.style.backgroundColor = 'green';
                btn.dataset.status = 'livraison';
            } else if (currentStatus === 'livraison') {
                
                btn.parentElement.parentElement.remove();
            }
        });
    });
</script>




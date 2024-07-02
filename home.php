<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food booking</title>
    <!-- font awesome cdn link pour les icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="StyleProj.css">

</head>
 <header>
    <a href="#" class="logo">Resto.</a>

    <nav class="navbar">
     <a  class="active" href="#home">Home</a>  
     <a href="panier.php">Panier</a>
     <a href="#menu">Menu</a>
     <a href="#order">Order</a>
        
    </nav>

    <div class="icons">
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
    </div>

 </header>

 <!---------------home section------------------>

<section class="home" id="home">
    <div class=" home-slider">
        <div class="wrapper">
            <div class="slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3> hot pizza</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#order" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="pizza.jpg" alt="pizza">
                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3> lasagne</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#order" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="lasa.jpg" alt="lasagne">
                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3> sandwich</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#order" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="sandwich.jpg" alt="sandwich">
                </div>
            </div>
        </div>
    </div>

</section>

<!--order section -->
<section class="order" id="order">
     <h3>order now</h3>
    <h1>fast and free</h1>
    <form action="panier.php" method="POST">
    
    <div class="inputBox">
        <div class="input">
            <span>your name</span>
            
            <input type="text" name="nom" id="nom">
        </div>
        <div class="input">
            <span>your order</span>
            
            <input type="text" name="ord" id="ord">
        </div>

        <div class="input">
            <span>your number</span>
            
            <input type="text" name="num" id="num">
        </div>

        

        <div class="input">
            <span>your address</span>
            
            <input type="text" name="add" id="add">
        </div>

    </div>
    
    <input type="submit"value="Submit" class="btn" formaction="panier.php">
     <?php if (isset($_GET['erreur'])) { ?>
    <div class="alert alert-danger" role="alert">
    <p style="color: red; font-size: 16px;"><?=htmlspecialchars($_GET['erreur']); ?></p>
    </div>
     <?php } ?>
    
</form>


</section>
</body>












    






  





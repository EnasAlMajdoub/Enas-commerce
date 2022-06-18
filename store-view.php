<?php
include 'functions/userfunctions.php';
include 'includes/header.php';
include 'config/dbcon.php';

 if (isset($_GET['store'])) {
      $name= $_GET['store'];
      $store_data= getByName("stores","$name");
      $store= mysqli_fetch_array($store_data);
      

      if ($store) {
          ?>
          <!DOCTYPE html>
          <html>
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>store view</title>
            <!--Ajax for rating store -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          </head>
          <body>
            <div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
            Home/
            </a>
            <a class="text-white" href="categories.php">
                Collections/
            </a>
            <?= $store['name']; ?></h6>
    </div>
          </div>
          <div class="bg-light py-4">
              <div class="container mt-3">
              <div class="row">
                  <div class="col-md-4">
                    <div class="shadow">
                        <img src="uploads/<?= $store['image']; ?>" class="w-100">
                    </div>
                      
                  </div>
                  <div class="col-md-8">
                      <h4 class="fw-bold"><?= $store['name']; ?> </h4>
                      <hr>
                     Address: <p><?= $store['address']; ?> </p>
                      Mobile:<p><?= $store['mobile']; ?> </p>  
                  </div>
              </div>
          </div>
          </div>
          
          <?php
      }else{
        echo "store not found";
    }


    }else{
        echo "Error";
    }

    include 'includes/footer.php';
?>
          </body>
          </html>

          
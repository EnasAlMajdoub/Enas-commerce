<?php
include 'functions/userfunctions.php';
include 'includes/header.php';

include 'config/dbcon.php';
 if (isset($_GET['category'])) {
	
$category_name=$_GET['category'];
$category_data= getByName("categories","$category_name");
$category= mysqli_fetch_array($category_data);
if ($category) {
	$cid= $category['id'];
	?>

     <div class="py-3 bg-primary">
	<div class="container">
		<h6 class="text-white">
			<a class="text-white" href="index.php">
			Home/
			</a>
			<a class="text-white" href="categories.php">
				Collections/
			</a>
			<?= $category['name']; ?></h6>
	</div>
          </div>
       <div class="py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
	            <h2><?= $category['name']; ?></h1>
	            <hr>
	            <div class="row">
              	<?php
              	$stores= getStoreByCategory($cid);
              	if (mysqli_num_rows($stores)>0) {
              		foreach ($stores as $item) {
              			
              		?>
              		<div class="col-md-3 mb-2">
              			<a href="store-view.php?store=<?= $item['name']; ?>">
              			<div class="card shadow">
              				<div class="card-body">
              					<img src="uploads/<?= $item['image']; ?>" class="w-100">
              					<h4 class="text-center"><?= $item['name']; ?></h4>
              				</div>
              			</div>
              			</a>
              		</div>
              		
              		
              		<?php
              	}
              		
              	}else{
              		
              		echo "no data avilable";
              	}

              
              	?>
              	</div>
			</div>
			
		</div>
	</div>
        </div>     
	<?php 
     }else{
     	echo "Error";
     }

	}else{
		echo "Error";
	}

	include 'includes/footer.php';
?>
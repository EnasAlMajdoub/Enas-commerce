<?php
include 'includes/header.php';
include '../Middleware/adminMiddleware.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <?php
      if (isset($_GET['id'])) {
        $id=$_GET['id'];
       $category= getByID("categories",$id);
       if (mysqli_num_rows($category)>0) {
         $data= mysqli_fetch_array($category);
       
      


      ?>
    <div class="card">
      <div class="card-header">
        <h4>Edit Category</h4>
      </div>
      <div class="card-body">
        <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <label>Name</label>
            <input type="text" name="name" value="<?= $data['name']; ?>" placeholder="Enter Category name" class="form-control">  
          </div>
          <div class="col-md-8">
            <label>Image</label>
        <input type="file" name="image" class="form-control">
        <label>Current Image</label>
        <img src="../uploads/<?= $data['image']; ?>">
        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
          </div>
          
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
          </div>
        </div>
        </form>
        
        
      </div>
    </div>
    <?php
  }else{
    echo "category not found";
  }
  }else{
    echo "Id missing";
  }


    ?>  
    </div>
	</div>
</div>

<?php
include 'includes/footer.php';
?>
<?php
include 'includes/header.php';
include '../Middleware/adminMiddleware.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Add Category</h4>
      </div>
      <div class="card-body">
        <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter Category name" class="form-control">  
          </div>
          <div class="col-md-8">
            <label>Image</label>
        <input type="file" name="image" class="form-control">
          </div>
          
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary" name="add_category_btn">ADD</button>
          </div>
        </div>
        </form>
        
        
      </div>
    </div>  
    </div>
	</div>
</div>

<?php
include 'includes/footer.php';
?>
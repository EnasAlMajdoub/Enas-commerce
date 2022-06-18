<?php
include 'includes/header.php';
include '../Middleware/adminMiddleware.php';
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Add store</h4>
      </div>
      <div class="card-body">
        <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-8">
            <label>select category</label>
            <select name="category_id" class="form-select">
              <option selected>select category</option>
              <?php
             $categories= getAll("categories");
             if (mysqli_num_rows($categories)>0) {
               foreach ($categories as $item) {
              ?>
              <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
              <?php
             }
             }else{
              echo "no category found";
             }
             
              ?>
                      </select>
          </div>

          <div class="col-md-8">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter Name" class="form-control">  
          </div>
          <div class="col-md-8">
            <label>Address</label>
            <input type="text" name="address" placeholder="Enter Address" class="form-control">  
          </div>
          <div class="col-md-8">
            <label>Mobile</label>
            <input type="number" name="mobile" placeholder="Enter Mobile" class="form-control">  
          </div>
          <div class="col-md-8">
            <label>Image</label>
        <input type="file" name="image" class="form-control">
          </div>
          
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary" name="add_store_btn">ADD</button>
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
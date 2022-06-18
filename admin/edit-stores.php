<?php
include 'includes/header.php';
include '../Middleware/adminMiddleware.php';


?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
      $stores=getByID("stores",$id);
      if (mysqli_num_rows($stores)>0) {
        $data=mysqli_fetch_array($stores);
        ?>
    <div class="card">
      <div class="card-header">
        <h4>Edit store
          <a href="stores.php" class="btn btn-primary float-end">Back to Stores</a>


        </h4>
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
              <option value="<?= $item['id']; ?>" <?= $data['category_id']== $item['id']?'selected':'' ?> ><?= $item['name']; ?></option>
              <?php
             }
             }else{
              echo "no category found";
             }
             
              ?>
                      </select>
          </div>
          <input type="hidden" name="store_id" value="<?= $data['id']; ?>">

          <div class="col-md-8">
            <label>Name</label>
            <input type="text" name="name" value="<?= $data['name']; ?>" placeholder="Enter Name" class="form-control">  
          </div>
          <div class="col-md-8">
            <label>Address</label>
            <input type="text" name="address"value="<?= $data['address']; ?>"  placeholder="Enter Address" class="form-control">  
          </div>
          <div class="col-md-8">
            <label>Mobile</label>
            <input type="number" name="mobile"value="<?= $data['mobile']; ?>"  placeholder="Enter Mobile" class="form-control">  
          </div>
          <div class="col-md-8">
            <label>Image</label>
        <input type="file" name="image" class="form-control">
        <label>Current Image</label>
        <img src="../uploads/<?= $data['image']; ?>">
        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
          </div>
          
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary" name="update_store_btn">Update</button>
          </div>
        </div>
        </form>
        
        
      </div>
    </div> 
    <?php
      }else{
      echo "no stores found";
    }
      
      
     
    }else{
      echo "id missing";
    }
    ?> 
    </div>
  </div>
</div>

<?php
include 'includes/footer.php';
?>
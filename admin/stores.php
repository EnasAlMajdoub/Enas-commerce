<?php
include 'includes/header.php';
include '../Middleware/adminMiddleware.php';


?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>ALL STORES</h4>
        </div>
        <div class="card-body" id="store_table">
          <table class="table table-bordered table-stripe">
            <thead>
              <tr>
                <th>Id</th>
                <th>Category id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              $stores= getAll("stores");
              if (mysqli_num_rows($stores)>0) {
                foreach ($stores as $item) {
                  ?>
                  <tr>
                <td><?= $item['id']; ?></td>
                <td><?= $item['category_id']; ?></td>
                <td><?= $item['name']; ?></td>
                <td><?= $item['address']; ?></td>
                <td><?= $item['mobile']; ?></td>
                <td>
                  <img src="../uploads/<?= $item['image']; ?>" higeht="50px" width="50px" alt="<?= $item['name']; ?>">
                </td>
                <td>
                  <a href="edit-stores.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                  
                </td>
                <td>
                  
                <button type="button" class="btn btn-sm btn-danger delete_store_btn" value="<?= $item['id']; ?>">DELETE</button>
                  
                </td>
                
              </tr>
                  <?php
                }
                
              }else{
                echo "no records found";
              }



              ?>
              
            </tbody>
            
          </table>
        </div>
      </div>
		</div>
	</div>
</div>

<?php
include 'includes/footer.php';
?>
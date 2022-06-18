<?php
include 'includes/header.php';
include '../Middleware/adminMiddleware.php';

?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>ALL CATEGORIES</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-stripe">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              $category= getAll('categories');
              if (mysqli_num_rows($category)>0) {
                foreach ($category as $item) {
                  ?>
                  <tr>
                <td><?= $item['id']; ?></td>
                <td><?= $item['name']; ?></td>
                <td>
                  <img src="../uploads/<?= $item['image']; ?>" higeht="50px" width="50px" alt="<?= $item['name']; ?>">
                </td>
                <td>
                  <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                  
                </td>
                <td>
                  
                <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['id']; ?>">DELETE</button>
                  
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

<script type="text/javascript">
  $('#delete-btn').click(function (event) {
    event.preventDefault();

    var result = confirm("Are you sure?");

    if (result == true) {
      $(this).parent('form').submit();
    }
  });
</script>















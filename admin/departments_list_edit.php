<?php
  include('security.php');
  include('includes/header.php');
  include('includes/navbar.php');
  include('includes/topbar.php');
  include('includes/database/dbconfig.php');
?>

<div class='container-fluid'>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Faculty Edit</h6>
        </div>
    </div>
    <div class="card-body">

    	<?php
    		if(isset($_POST['dept_list_edit_btn']))
    		{
    			$id 	   = $_POST['edit_id'];
				$query 	   = "SELECT * FROM dept_category_list WHERE id = '$id' ";
				$query_run = mysqli_query($connection,$query);

				foreach ($query_run as $rowediting)
				{
    	?>

        <form action="code.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="update_id" value="<?php echo $rowediting['id'];?>">

			<?php
				$department = "SELECT * FROM dept_category";
				$dept_run   = mysqli_query($connection,$department);

				if(mysqli_num_rows($dept_run) > 0)
				{
			?>
			
			<div class="form-group">
				<label> Dept Cate ID/Name </label>
				<select name="dept_category_id" class="form-control" required>
					<option value="">Choose Your Department Category</option>

					<?php
						foreach ($dept_run as $row)
						{
					?>

					<option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option>

					<?php
						}
					?>

				</select>
			</div>

			<?php
				}
				else
				{
					echo "No Data Available";
				}
			?>

			<div class="form-group">
				<label> Dept List Name </label>
				<input type="text" name="name" class="form-control" value="<?php echo $rowediting['name'];?>" required>
			</div>
			<div class="form-group">
				<label> Depscription </label>
				<input type="text" name="description" class="form-control" value="<?php echo $rowediting['description'];?>" required>
			</div>
			<div class="form-group">
				<label> Section </label>
				<input type="text" name="section" class="form-control" value="<?php echo $rowediting['section'];?>" required>
			</div>
			<a href="departments-list.php" class="btn btn-danger"> CANCEL </a>
			<button type="submit" name="dept_list_update_btn" class="btn btn-primary"> UPDATE </button>
        </form>

        <?php
				}
			}
		?>

    </div>
</div>

<?php 
  include('includes/scripts.php');
  include('includes/footer.php');
?>
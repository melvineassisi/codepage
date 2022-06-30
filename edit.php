<?php include_once("database.php"); include('header.php');  ?>
<h3>Contact Form</h3>
<div class="container">
<a  href="listing.php" >View the List</a>
</div>
<div class="container">
<?php 
    $id=$_GET['id'];
   $data =DataBase::SelectData("Select * from contact_tbl where id=$id");
   while($row = $data->fetch_assoc()) {
  ?> 
  <form action="update.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo  $row["id"]; ?>" />
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="con_fname" value="<?php echo  $row["con_fname"]; ?>" placeholder="Your name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="con_lname" value="<?php echo  $row["con_lname"]; ?>"  placeholder="Your last name.." required>

    <label for="lname">Email</label>
    <input type="text" id="lname" name="con_email" value="<?php echo  $row["con_email"]; ?>"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" required>

    <label for="lname">Phone number</label>
    <input type="text" id="con_phone" name="con_phone" value="<?php echo  $row["con_phone"]; ?>"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{4}" placeholder="Phone Number" required>

    <label for="lname">Image</label>
    <input type="file" id="fileToUpload" name="fileToUpload" placeholder="Upload Image" accept="image/*" required>

    
    <input type="submit" value="Submit">
    <?php } ?>
  </form>
</div>

<?php include('footer.php'); ?>
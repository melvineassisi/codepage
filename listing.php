<?php include('header.php');
include_once("database.php");
?>
<div class="container">
<a  href="index.php" >Add New Contact</a>
</div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:30%;">Name</th>
    <th style="width:20%;">Last Name</th>
    <th style="width:10%;">Image</th>
    <th style="width:10%;">Edit</th>
    <th style="width:10%;">Delete</th>
  </tr>
  <?php 
   $data =DataBase::SelectData("Select * from contact_tbl");
   while($row = $data->fetch_assoc()) {
  ?> 
  <tr>
    <td><?php echo  $row["con_fname"]; ?></td>
    <td><?php echo  $row["con_lname"]; ?></td>
    <td><img src="uploadImg/<?php echo  $row["id"].'.jpg'; ?>" alt="Girl in a jacket" width="100" height="100"></td>
    <td><a href="edit.php?id=<?php echo  $row["id"]; ?>" >Edit</a></td>
    <td><a href="delete.php?id=<?php echo  $row["id"]; ?>" >Delete</a></td>
  </tr>
  <?php } ?>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<?php include('footer.php'); ?>
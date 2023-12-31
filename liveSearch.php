<?php

	require 'authentication.php';
		
require 'dbconn.php';
try {
  $pdo = new PDO($dsn,$db_username,$db_password,$opt);
  
   if($_SESSION['username'] == "admin"){
	     $query = "SELECT * FROM task WHERE 
            name LIKE CONCAT('%',?,'%') OR
            details LIKE CONCAT('%',?,'%') OR
            due LIKE CONCAT('%',?,'%')";   
   } else {
	   	     $query = "SELECT * FROM utaskview WHERE 
            name LIKE CONCAT('%',?,'%') OR
            details LIKE CONCAT('%',?,'%') OR
            due LIKE CONCAT('%',?,'%')";
   }

			
  $stmt = $pdo->prepare($query);
  $stmt->execute(array($_GET['keyword'], $_GET['keyword'], $_GET['keyword']));
  
  if($stmt->rowCount() === 0){
	echo "Data not found";
  } else {
  ?>
  
  
  <table>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Details</th>
      <th>Due</th>
      <th>Action</th>
    </tr>
    <tbody>
    
     <?php 
		$num=0;
		foreach ($stmt as $row): 
	 ?>
	  <tr>
		<td><?php $num++; echo $num; ?></td>
		<td><?= $row["name"]; ?></td>
		<td><?= $row["details"]; ?></td>
		<td><?= $row["due"]; ?></td>
		<td>
		  <?php if($_SESSION['username'] == "admin"){ ?>
			  <a href="edit.php?id=<?= $row['id'] ?>"><img width="30em" height="30em" src="icon/edit.png"></a>
			  <a href="delete.php?id=<?= $row['id'] ?>"><img width="30em" height="30em" src="icon/remove.png"></a>
		  <?php } else { ?>
			  <a class="btn-grn" href='delete.php?id=<?= $row['id'] ?>'>Mark As Done</a>
		  <?php } ?>
		</td>
	  </tr>
	<?php endforeach; ?>
	  </tbody>
	</table>
<?php
  };
  
  $pdo = NULL;
}
catch (PDOException $e) {   
exit("PDO Error: ".$e->getMessage()."<br>");
}?>



<?php
include("auth.php");
?>
<html <html lang=''>

<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="" type="text/javascript"></script>
   <script src="script.js"></script>
   <title></title>
</head>

<body>

   <div id='cssmenu'>
      <ul>
         <li class=''><a href='index.php'><span>Add Contacts</span></a></li>

         <li><a href='search_form.php'><span>search</span></a></li>
         <li><a href='index.php'><span>Insert Contacts</span></a></li>
         <li class='last'><a href='#'><span></span></a></li>
      </ul>
   </div>
   <h2> CONTACTS IN THE DATABASE </h2>

   <table width="400" border="2" cellpadding="2" cellspacing='1'>

      <tr bgcolor="#2ECCFA">
         <th>First Name</th>
         <th>Last Name</th>
         <th>phone number 1</th>
         <th>phone number 2</th>
         <th>phone number 3</th>
         <th>E- mail</th>
         <th>Whatsapp</th>
         <th>update</th>
         <th>delete</th>
      </tr>
      <?php

      $con = new mysqli('localhost', 'root', '', 'phone_book');
      if ($con->connect_error) {
         echo "couldn't connect";
         die();
      }

      $sql = "select * from new_record";
      $result = $con->query($sql);
      ?>

      <?php foreach ($result as $r) : ?>
         <tr>
            <td><?= $r['fname'] ?></td>
            <td><?= $r['lname'] ?></td>
            <td><?= $r['phone1'] ?></td>
            <td><?= $r['phone2'] ?></td>
            <td><?= $r['phone3'] ?></td>
            <td><?= $r['email'] ?></td>
            <td><?= $r['whatsapp'] ?></td>
            <td><a href="./update_form.php?id=<?= $r['id'] ?>">Update</a></td>
            <td><a href="./delete.php?id=<?= $r['id'] ?>">Delete</a></td>
         </tr>
      <?php endforeach; ?>
   </table>

</body>

</html>
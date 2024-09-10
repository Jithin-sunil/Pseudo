<?php
include('../Asset/connection/connection.php');
include('SessionValidator.php');
include('Header.php');

if (isset($_GET['act'])) {
    $up = "UPDATE tbl_client SET client_status='1' where client_id='" . $_GET['act'] . "'";
    if ($con->query($up)) {
?>

        <script>
            alert('Accepted');
        </script>

    <?php
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Client list</title>

<link rel="stylesheet" href="../Asset/Templates/Admin/assets/css/bootstrap.min.css">

<style>
    body {
      background-color: #f8f9fa; /* Light gray background */
    }
    .container {
      max-width: 800px; /* Limit the width of the container */
    }
    table {
      width: 100%;
      margin-bottom: 1rem;
      background-color: #fff;
    }
    th, td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
    th {
      background-color: #343a40; /* Dark gray header */
      color: #fff;
      text-align: center;
    }
    tbody tr:nth-child(even) {
      background-color: #f2f2f2; /* Alternate row color */
    }

    .profile-photo {
      width: 50px;
      height: 50px;
      
      object-fit: cover;
      border: 2px ;
    }

  </style>

</head>

<body>
  <div class="container mt-4">
  <h2> Client List</h2>
    <form id="frm_clientlist" name="frm_clientlist" method="post" action="">
      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th>SL No</th>
            <th>Client Name</th>
            <th>Photo</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $selqry = "SELECT * FROM tbl_client WHERE client_status='2'";
            $client = $con->query($selqry);
            $i = 0;
            while ($data = $client->fetch_assoc()) {
              $i++;
          ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data['client_name'] ?></td>
            <td><img src="../Asset/Files/Client/Photo/<?php echo $data['client_photo'] ?>" class="profile-photo" alt="Profile Photo"/></td>
            <td><?php echo $data['client_dob'] ?></td>
            <td><?php echo $data['client_email'] ?></td>
            <td><?php echo $data['client_contact'] ?></td>
            <td> <a href="Clientverify.php?act=<?php echo $data['client_id'] ?>" class="btn btn-success btn-sm">Accept</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </form>
  </div>
</body>

<?php

include('Footer.php');

?>

</html>
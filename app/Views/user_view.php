<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="refresh" content="5" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 CRUD App Example - positronx.io</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- Bootstrap-Vue CSS -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-vue@2.21.2/dist/bootstrap-vue.min.css">

<!-- Vue.js -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- Bootstrap-Vue JS -->
<script src="https://unpkg.com/bootstrap-vue@2.21.2/dist/bootstrap-vue.min.js"></script>

</head>
<body>
   <?php include(APPPATH . 'views/components/navbar.php'); ?>

  <!-- <div id="app">
    <breadcrumb-component></breadcrumb-component>
  </div> -->
<div class="container mt-4">
    <div class="d-flex justify-content-end">
      <a href="user-form" class="btn btn-success mb-2">Add User</a>
    </div>
    <?php
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
    }
    ?>
    <div class="mt-3">
      <table class="table table-bordered" id="users-list">
        <thead>
          <tr>
            <th>User Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td>
              <a href="<?php echo ('edit-view/'.$user['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo ('delete/'.$user['id']);?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#users-list').DataTable();
    });
  </script>
</div>
  
</body>
</html>

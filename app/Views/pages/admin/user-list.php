 <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <script src="js/index.js"></script>
 <script src="js/navbar.js"></script>

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

<div style=" width: 70%; background-color: white;">


<!-- edit here for profile page -->
<div>
    <div class="table-container-user-list">
      <table class="table-dashboard " id="users-list">
        <thead class="table-header-dashboard">
          <tr class="karla-regular-blod-small-text">
            <th class="header-data">Username</th>
            <th class="header-data">Nickname</th>
            <th class="header-data">Email</th>
            <th class="header-data">Gender</th>
            <th class="header-data">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr class="table-row-data karla-regular-small-text">
            <td class="table-data"><?php echo $user['username']; ?></td>
            <td class="table-data"><?php echo $user['nickname']; ?></td>
            <td class="table-data"><?php echo $user['email']; ?></td>
            <td class="table-data"><?php echo $user['gender']; ?></td>
            <td class="table-data">
              <a href="<?php echo ('edit-view/'.$user['username']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo ('delete/'.$user['username']);?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#users-list').DataTable();
    });
  </script>
  
</div>

<!-- Dont delete this below div -->
</div>
</div>
</div>
 <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <script src="js/index.js"></script>
 <script src="js/navbar.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>


<div style="height: 100%; width: 70%; background-color: #ededfb">
        <!-- edit here for profile page -->
        <div class="dashboard-content">
          <div class="card-list">
            <div class="card-container">
              <div class="top-card-container">
                <div class="icon-container">
                  <i class="fa-solid fa-users fa-lg" style="color: #7b7bfd"></i>
                </div>
                <a href="<?php echo base_url("admin/user-list")?>" class="view-all small-double-extrabold-text">View all</a>
              </div>
            <div class="text-top-container">
              <div class="large-medium-text"><?php echo $totalUser ?></div><div class="button-text">Users</div>
            </div>
              <div class="karla-regular-small-text">Total Users</div>
            </div>
            <div class="card-container">
              <div class="top-card-container">
                <div class="icon-container">
                  <i
                    class="fa-solid fa-credit-card fa-lg"
                    style="color: #7b7bfd"
                  ></i>
                </div>
                <a class="view-all small-double-extrabold-text"></a>
              </div>
              <div class="text-top-container">
                <div class="large-medium-text"><?php echo $totalSub ?></div><div class="button-text">Subscribes</div>
              </div>
              <div class="karla-regular-small-text">Total Subscribes</div>
            </div>
            <div class="card-container">
              <div class="top-card-container">
                <div class="icon-container">
                  <i class="fa-solid fa-music fa-lg" style="color: #7b7bfd"></i>
                </div>
                <a href="<?php echo base_url("admin/albums-list")?>" class="view-all small-double-extrabold-text">View all</a>
              </div>

              <div class="text-top-container">
                <div class="large-medium-text"><?php echo $totalAlbumsBuy ?></div><div class="button-text">Albums</div>
              </div>
              
              <div class="karla-regular-small-text">Total Albums Buy</div>
            </div>
            <div class="card-container">
              <div class="top-card-container">
                <div class="icon-container">
                  <i class="fa-solid fa-tag fa-xl" style="color: #7b7bfd"></i>
                </div>
                <a class="view-all small-double-extrabold-text"></a>
              </div>

              <div class="large-medium-text">RM <?php echo round($totalSale, 2); ?></div>
              <div class="karla-regular-small-text">Total Sales</div>
            </div>
          </div>
          <div class="table-layer">
            <div class="table-top-header">
              <div class="table-header large-medium-text">Top Albums</div>
              <a href="<?php echo base_url("admin/albums-list")?>" class="view-all-table">View all</a>
            </div>
            <div class="table-container">
              <table class="table-dashboard">
                <thead class="table-header-dashboard">
                  <tr class="karla-regular-blod-small-text">
                    <td class="header-data">Album Cover </td>
                    <td class="header-data">Album Title</td>
                    <td class="header-data">Artist</td>
                    <!-- <td class="header-data">Genre</td> -->
                    <td class="header-data">Release Date</td>
                    <td class="header-data">Price</td>
                    <td class="header-data">Total Buyed</td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($TopAlbumListBuyed as $album){
                    $formattedDate = date("d M Y", strtotime($album[0]['release_date']));?>
                  <tr class="table-row-data karla-regular-small-text">
                    <td class="table-data"><img style="height: 5rem; width: 5rem;" src="<?php echo $album[0]['album_cover']?>" /></td>
                    <td class="table-data"><?php echo $album[0]['album_title']?></td>
                    <td class="table-data"><?php echo $album[0]['artist']?></td>
                    <!-- <td class="table-data"><?php echo $album[0]['genre']?></td> -->
                    <td class="table-data"><?php echo $formattedDate?></td>
                    <td class="table-data">RM <?php echo $album[0]['price']?></td>
                    <td class="table-data"><?php echo $album[0]['occurrence']?> albums</td>
                  </tr>
                  <?php }?>
                 
                </tbody>
              </table>
            </div>
          </div>
          <div class="chart-content" style="">
              <?php 
              $chartData = [];
              foreach ($charts as $row) {
                 
                $chartData = [
                    [
                        'date' => $row['date_purchased'],
                        'users' => (int) $row['total_users']
                    ]
                ];
              }
              ?>
              <div class="large-medium-text" style="padding: 2rem 2rem 0;">User Album Purchases Line Chart</div>
              <div id="userAlbumsChart" style="width: 100%; height: 400px; "></div>
          </div>
        </div>
        <div style="padding: 3rem;"></div>
</div>

<!-- Dont delete this below div -->
</div>
</div>
</div>


<script>
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Date Purchased', 'Total Users'],
      <?php foreach ($charts as $row): ?>
        <?php $formattedDate = date("d M Y", strtotime($row['date_purchased'])); ?>
      ['<?php echo $formattedDate; ?>', <?php echo $row['total_users']; ?>],
      <?php endforeach; ?>
    ]);

    var options = {
      curveType: 'function',
      legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('userAlbumsChart'));
    chart.draw(data, options);
  }

  google.charts.load('current', { packages: ['corechart'] });
  google.charts.setOnLoadCallback(drawChart);
</script>

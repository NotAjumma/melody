 <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <script src="js/index.js"></script>
 <script src="js/navbar.js"></script>

<div style="height: 100%; width: 70%; background-color: #ededfb">
        <!-- edit here for profile page -->
        <div class="dashboard-content">
          <div class="card-list">
            <div class="card-container">
              <div class="top-card-container">
                <div class="icon-container">
                  <i class="fa-solid fa-users fa-lg" style="color: #7b7bfd"></i>
                </div>
                <a class="view-all small-double-extrabold-text">View all</a>
              </div>

              <div class="large-medium-text"><?php echo $totalUser ?></div>
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
                <a class="view-all small-double-extrabold-text">View all</a>
              </div>

              <div class="large-medium-text"><?php echo $totalSub ?></div>
              <div class="karla-regular-small-text">Total Subscribes</div>
            </div>
            <div class="card-container">
              <div class="top-card-container">
                <div class="icon-container">
                  <i class="fa-solid fa-music fa-lg" style="color: #7b7bfd"></i>
                </div>
                <a class="view-all small-double-extrabold-text">View all</a>
              </div>

              <div class="large-medium-text"><?php echo $totalAlbums ?></div>
              <div class="karla-regular-small-text">Total Albums Buy</div>
            </div>
            <div class="card-container">
              <div class="top-card-container">
                <div class="icon-container">
                  <i class="fa-solid fa-tag fa-xl" style="color: #7b7bfd"></i>
                </div>
                <a class="view-all small-double-extrabold-text">View all</a>
              </div>

              <div class="large-medium-text">RM <?php echo round($totalSale, 2); ?></div>
              <div class="karla-regular-small-text">Total Sales</div>
            </div>
          </div>
          <div class="table-layer">
            <div class="table-top-header">
              <div class="table-header large-medium-text">Top Albums</div>
              <a class="view-all-table">View all</a>
            </div>
            <div class="table-container">
              <table class="table-dashboard">
                <thead class="table-header-dashboard">
                  <tr class="karla-regular-blod-small-text">
                    <td class="header-data">Album Tittle</td>
                    <td class="header-data">Artist/Band Name</td>
                    <td class="header-data">Genre</td>
                    <td class="header-data">Release Date</td>
                    <td class="header-data">Pricing</td>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-row-data karla-regular-small-text">
                    <td class="table-data">Akmal</td>
                    <td class="table-data">lalala</td>
                    <td class="table-data">Akmal</td>
                    <td class="table-data">Akmal</td>
                    <td class="table-data">Akmal</td>
                  </tr>
                  <tr class="table-row-data">
                    <td class="table-data">Akmal</td>
                    <td class="table-data">lalala</td>
                    <td class="table-data">Akmal</td>
                    <td class="table-data">Akmal</td>
                    <td class="table-data">Akmal</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>

<!-- Dont delete this below div -->
</div>
</div>
</div>
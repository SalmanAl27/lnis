<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
  <div class="offcanvas-body p-0">
    <nav class="navbar-dark">
      <ul class="navbar-nav">
        <li>
          <div class="text-muted small fs-5 fw-bold text-uppercase px-3 mb-3">
            Halaman Admin
          </div>
        </li>
        <li>
          <a href="#" class="nav-link px-3 active">
            <span class="me-2">
              <?php
              $username = $_SESSION['username'];
              $datagambar = take_data("SELECT gambar FROM user WHERE username='$username'");
              ?>
              <img src="images/<?= $datagambar['gambar'] ?>" class="img-circle user-image" width="50" height="50"
                alt="User Image">
            </span>
            <span><strong><?= $_SESSION['name'] ?></strong></span>
          </a>
        </li>
        <li class="my-4">
          <hr class="dropdown-divider bg-light" />
        </li>
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
            Data
          </div>
        </li>
        <li>
          <a href="index.php" class="nav-link px-3">
            <span class="me-2">
              <i class="bi bi-house"></i>
            </span>
            <span>Home Page</span>
          </a>
        </li>
        <li>
          <a href="pengguna.php" class="nav-link px-3">
            <span class="me-2">
              <i class="bi bi-person"></i>
            </span>
            <span>Pengguna</span>
          </a>
        </li>
        <li>
        <li>
          <a href="berita.php" class="nav-link px-3">
            <span class="me-2">
              <i class="bi bi-newspaper"></i>
            </span>
            <span>Berita</span>
          </a>
        </li>
        <li>
          <a href="notifikasi.php" class="nav-link px-3">
            <span class="me-2">
              <i class="bi bi-bell"></i>
            </span>
            <span>Notifikasi Push</span>
          </a>
        </li>
        <li>
          <a href="laporan.php" class="nav-link px-3">
            <span class="me-2">
              <i class="bi bi-file-earmark-spreadsheet"></i>
            </span>
            <span>Laporan Bulanan</span>
          </a>
        </li>
        <li>
          <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
            <span class="me-2">
              <i class="bi bi-person"></i>
            </span>
            <span>Account</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="bi bi-chevron-down"></i>
              </span>
            </span>
          </a>
          <div class="collapse" id="layouts">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="user_edit.php" class="nav-link px-3">
                  <span class="me-2">
                    <i class="bi bi-gear"></i>
                  </span>
                  <span>Account Setting</span>
                </a>
              </li>
              <li>
                <a href="../user/logout.php" class="nav-link px-3">
                  <span class="me-2">
                    <i class="bi bi-box-arrow-right"></i>
                  </span>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- ini untuk menambah garis -->
        <!-- <li class="my-4"><hr class="dropdown-divider bg-light" /></li> -->
      </ul>
    </nav>
  </div>
</div>
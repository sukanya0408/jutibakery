<nav class="navbar navbar-expand-lg navbar-pink bg-warning">
  <div class="container">
    <a class="navbar-brand" href="home.php">Juti bakery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="profile.php">โปรไฟล์</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><?php echo $_SESSION['ctm_user']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ตะกร้าของฉัน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
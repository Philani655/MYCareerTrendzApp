<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Homepage</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    .hero-image {
      background-color: #005384 ;/* Replace with your image URL */
      background-size: cover;
      background-position: center;
      height: 500px;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SchoolName</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Admissions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="hero-image text-center d-flex align-items-center justify-content-center">
    <div class="container">
      <h1>MyCareerTrendz</h1>
      <p>Click below to view the progress of you child.</p>
      <a href="login.php" class="btn btn-primary">Learn More</a>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>About Our School</h2>
          <p>SchoolName is a place where students thrive in an environment focused on academic excellence and character development. We offer a wide range of extracurricular activities, and our teachers are committed to helping students achieve their best potential.</p>
        </div>
        <div class="col-md-6">
            <img src="images/mycareertrendz-high-resolution-logo-black-transparent.png" class="img-fluid" alt="School Image">
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="bg-light text-center py-3">
    <p>&copy; 2025 SchoolName. All Rights Reserved.</p>
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>

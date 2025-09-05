<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BESZORG • About Us</title>
  <meta name="description" content="Learn more about BESZORG’s mission, vision, and team." />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root{
      --brand: #1a936f;
      --brand-2: #116466;
      --bg: #f7faf9;
      --text: #1f2937;
    }
    body{background: var(--bg); color: var(--text);}
    a{color: var(--brand)} a:hover{color:#0c7a59}
    .glass-navbar{backdrop-filter: saturate(120%) blur(12px); background: linear-gradient(145deg, rgba(255,255,255,.72), rgba(255,255,255,.45)); border-bottom: 1px solid rgba(255,255,255,.35); box-shadow: 0 10px 30px rgba(0,0,0,.08); z-index: 1040;}
    .brand{display:flex; align-items:center; gap:.6rem;}
    .brand-logo img {width: 50px; height: 50px; object-fit: cover; border-radius: 50%;}
    .brand-title{font-weight:800; color:#0f5132;}
    .navbar-nav .nav-link{border-radius:14px; padding:.65rem .85rem; display:flex; align-items:center; gap:.5rem; color:#0b3b2d; transition:all .2s ease;}
    .navbar-nav .nav-link:hover{background:rgba(26,147,111,.1)}
    .navbar-nav .nav-link.active{background:rgba(26,147,111,.18); color:var(--brand-2); font-weight:600}
    main{padding-top:90px;}
    .section{padding:80px 0}
    .hero{background: radial-gradient(120% 140% at 10% 10%, #e9f8f3, #ffffff 40%, #f2fbf8); border-bottom:1px solid #eef2f1;}
    .hero h1{font-weight:800}
    .card{border:1px solid #eef2f1; border-radius:18px}
    .team-photo{width:100px; height:100px; object-fit:cover; border-radius:50%; margin-bottom:15px;}
    footer{border-top:1px solid #e6efed}
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="glass-navbar navbar navbar-expand-lg fixed-top py-2">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
      <div class="brand-logo"><img src="img/logo.jpg" alt="beszorg"></div>
      <span class="brand-title">BESZORG</span>
    </a>
    <button class="navbar-toggler btn btn-sm btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <i class="bi bi-list"></i>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto d-flex align-items-lg-center gap-lg-2">
        <li class="nav-item"><a href="index.php" class="nav-link"><i class="bi bi-house-door"></i> Home</a></li>
        <li class="nav-item"><a href="services.php" class="nav-link"><i class="bi bi-clipboard2-pulse"></i> Services</a></li>
        <li class="nav-item"><a href="products.php" class="nav-link"><i class="bi bi-bag"></i> Products</a></li>
        <li class="nav-item"><a href="blog.php" class="nav-link"><i class="bi bi-journal-text"></i> Blog</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link active"><i class="bi bi-people"></i> About</a></li>
        <li class="nav-item"><a href="faq.php" class="nav-link"><i class="bi bi-question-circle"></i> FAQ</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link"><i class="bi bi-envelope"></i> Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main -->
<main>
  <!-- Hero -->
  <section class="hero section text-center">
    <div class="container">
      <h1 class="display-5 fw-bold">About BESZORG</h1>
      <p class="lead text-secondary">Empowering people to live healthier, more balanced lives.</p>
    </div>
  </section>

  <!-- Mission & Vision -->
  <section class="section">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-md-6">
          <h2 class="fw-bold">Our Mission</h2>
          <p>At BESZORG, our mission is simple: to make health knowledge clear, practical, and accessible to everyone. We believe in empowering individuals to take charge of their well-being through education, coaching, and supportive resources.</p>
          <h2 class="fw-bold mt-4">Our Vision</h2>
          <p>We envision a community where people make healthier choices with confidence—free from confusion, misinformation, or barriers. By bridging the gap between science and everyday life, BESZORG strives to be your trusted health companion.</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="img/logo.jpg" class="img-fluid rounded-4 shadow-sm" alt="About Beszorg">
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="section bg-white">
    <div class="container text-center">
      <h2 class="fw-bold mb-5">Meet Our Team</h2>
      <div class="row g-4 justify-content-center">
        <div class="col-md-4 col-lg-3">
          <div class="card p-4 h-100 text-center">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team member" class="team-photo mx-auto">
            <h5 class="fw-bold">Dr. John Doe</h5>
            <p class="small text-muted">Health Coach</p>
            <p class="small">Guides clients through practical lifestyle changes for better nutrition and fitness.</p>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="card p-4 h-100 text-center">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team member" class="team-photo mx-auto">
            <h5 class="fw-bold">Sarah Lee</h5>
            <p class="small text-muted">Wellness Writer</p>
            <p class="small">Creates clear, engaging health articles and educational content for the BESZORG blog.</p>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="card p-4 h-100 text-center">
            <img src="https://randomuser.me/api/portraits/men/52.jpg" alt="Team member" class="team-photo mx-auto">
            <h5 class="fw-bold">Michael Smith</h5>
            <p class="small text-muted">Workshop Facilitator</p>
            <p class="small">Leads interactive group sessions focused on wellness skills and healthy living practices.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<footer class="py-4 bg-white">
  <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">
    <div class="small">© <span id="y"></span> BESZORG. Educational content only.</div>
    <div class="small d-flex gap-3">
      <a href="faq.php" class="text-decoration-none">FAQ</a>
      <a href="about.php" class="text-decoration-none">About</a>
      <a href="contact.php" class="text-decoration-none">Contact</a>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('y').textContent = new Date().getFullYear();
</script>
</body>
</html>

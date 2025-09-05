<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BESZORG • Services</title>
  <meta name="description" content="Explore BESZORG's professional health services including coaching, workshops, and content writing." />
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
    .card-img-top{border-top-left-radius:18px; border-top-right-radius:18px}
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
        <li class="nav-item"><a href="services.php" class="nav-link active"><i class="bi bi-clipboard2-pulse"></i> Services</a></li>
        <li class="nav-item"><a href="products.php" class="nav-link"><i class="bi bi-bag"></i> Products</a></li>
        <li class="nav-item"><a href="blog.php" class="nav-link"><i class="bi bi-journal-text"></i> Blog</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link"><i class="bi bi-people"></i> About</a></li>
        <li class="nav-item"><a href="faq.php" class="nav-link"><i class="bi bi-question-circle"></i> FAQ</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link"><i class="bi bi-envelope"></i> Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main -->
<main>
  <!-- Hero -->
  <section class="hero section">
    <div class="container text-center">
      <h1 class="display-5 fw-bold">Our Services</h1>
      <p class="lead text-secondary">At BESZORG, we provide practical health support through coaching, workshops, and clear educational content.</p>
    </div>
  </section>

  <!-- Services List -->
  <section class="section">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Health Coaching">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Health Coaching</h5>
              <p class="card-text">Personalized sessions that guide you in nutrition, fitness, stress, and sleep—helping you create lasting habits.</p>
              <a href="contact.php" class="btn btn-outline-success mt-auto">Book a Session</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1516841273335-e39b37888115?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Workshops">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Wellness Workshops</h5>
              <p class="card-text">Engaging group workshops on healthy cooking, reading food labels, and building routines for long-term health.</p>
              <a href="contact.php" class="btn btn-outline-success mt-auto">Request Info</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Writing">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Health Content Writing</h5>
              <p class="card-text">We create clear, easy-to-read articles for websites, newsletters, and patient education—always evidence-based.</p>
              <a href="contact.php" class="btn btn-outline-success mt-auto">Get a Quote</a>
            </div>
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

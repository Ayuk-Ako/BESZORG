<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BESZORG • Contact</title>
  <meta name="description" content="Get in touch with BESZORG for questions, consultations, or wellness services." />
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
    .brand-logo img {width: 50px; height: 50px; object-fit: cover; border-radius: 50%;}
    .brand-title{font-weight:800; color:#0f5132;}
    .navbar-nav .nav-link{border-radius:14px; padding:.65rem .85rem; display:flex; align-items:center; gap:.5rem; color:#0b3b2d; transition:all .2s ease;}
    .navbar-nav .nav-link:hover{background:rgba(26,147,111,.1)}
    .navbar-nav .nav-link.active{background:rgba(26,147,111,.18); color:var(--brand-2); font-weight:600}
    main{padding-top:90px;}
    .section{padding:80px 0}
    .hero{background: radial-gradient(120% 140% at 10% 10%, #e9f8f3, #ffffff 40%, #f2fbf8); border-bottom:1px solid #eef2f1;}
    .hero h1{font-weight:800}
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
        <li class="nav-item"><a href="about.php" class="nav-link"><i class="bi bi-people"></i> About</a></li>
        <li class="nav-item"><a href="faq.php" class="nav-link"><i class="bi bi-question-circle"></i> FAQ</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link active"><i class="bi bi-envelope"></i> Contact</a></li>
        <li class="nav-item d-none d-lg-inline-flex">
          <button class="btn btn-outline-success position-relative" data-bs-toggle="offcanvas" data-bs-target="#cartCanvas" aria-controls="cartCanvas">
            <i class="bi bi-cart3 me-1"></i> Cart
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-success" id="cartCountLg">0</span>
          </button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main -->
<main>
  <!-- Hero -->
  <section class="hero section text-center">
    <div class="container">
      <h1 class="display-5 fw-bold">Contact BESZORG</h1>
      <p class="lead text-secondary">Questions, consultations, or partnership inquiries? Reach out to us.</p>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="section">
    <div class="container">
      <div class="row g-4">
        <!-- Form -->
        <div class="col-lg-6">
          <h2 class="fw-bold mb-3">Send us a Message</h2>
          <p class="text-secondary">We’ll respond within 24–48 hours.</p>
          <form class="card p-3" onsubmit="event.preventDefault(); alert('Message sent! (Demo)')">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="col-12">
                <label class="form-label">Message</label>
                <textarea class="form-control" rows="4" required></textarea>
              </div>
              <div class="col-12 d-flex gap-2">
                <button class="btn btn-success" type="submit"><i class="bi bi-send me-1"></i> Send</button>
                <a href="products.php" class="btn btn-outline-success"><i class="bi bi-bag me-1"></i> Go to Shop</a>
              </div>
            </div>
          </form>
        </div>

        <!-- Business Details -->
        <div class="col-lg-6">
          <div class="p-4 rounded-4 border h-100">
            <h5 class="fw-bold">Business Details</h5>
            <p class="mb-1"><i class="bi bi-geo-alt me-1"></i> Netherlands</p>
            <p class="mb-1"><i class="bi bi-envelope me-1"></i> Beszorgg@gmail.com</p>
            <p class="mb-3"><i class="bi bi-telephone me-1"></i> +31 6 85412948</p>
            <h5 class="fw-bold">Working Hours</h5>
            <p class="mb-1">Mon-Fri: 9am - 6pm</p>
            <p class="mb-1">Sat: 10am - 4pm</p>
            <p class="mb-0">Sun: Closed</p>
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

<!-- Offcanvas Cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartCanvas" aria-labelledby="cartLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="cartLabel"><i class="bi bi-cart3 me-1"></i> Your Cart</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column">
    <div id="cartItems" class="vstack gap-2 mb-3">
      <div class="text-secondary">Your cart is empty.</div>
    </div>
    <div class="mt-auto border-top pt-3">
      <div class="d-flex justify-content-between align-items-center">
        <strong>Total</strong>
        <strong id="cartTotal">$0.00</strong>
      </div>
      <div class="d-grid gap-2 mt-3">
        <button class="btn btn-success" id="paypalBtn"><i class="bi bi-paypal me-1"></i> Checkout with PayPal</button>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#bankModal"><i class="bi bi-bank me-1"></i> Pay by Bank Transfer</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('y').textContent = new Date().getFullYear();
  document.getElementById('paypalBtn').addEventListener('click', ()=>alert('This is a frontend demo. Replace with real PayPal SDK.'));
</script>
</body>
</html>

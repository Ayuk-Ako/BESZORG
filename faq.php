<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BESZORG • FAQ</title>
  <meta name="description" content="Frequently Asked Questions about BESZORG’s services and mission." />
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
    .accordion-button:not(.collapsed){background:rgba(26,147,111,.08); color:var(--brand-2);}
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
        <li class="nav-item"><a href="faq.php" class="nav-link active"><i class="bi bi-question-circle"></i> FAQ</a></li>
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
      <h1 class="display-5 fw-bold">Frequently Asked Questions</h1>
      <p class="lead text-secondary">Find answers to common questions about BESZORG.</p>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="section">
    <div class="container">
      <div class="accordion" id="faqAccordion">
        
        <!-- Q1 -->
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="faqOne">
            <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
              What is BESZORG?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              BESZORG is a platform dedicated to health education, wellness services, and lifestyle coaching, helping individuals make informed choices about their well-being.
            </div>
          </div>
        </div>

        <!-- Q2 -->
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="faqTwo">
            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
              Do you provide medical advice?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              No. BESZORG provides educational content and wellness coaching. We do not replace professional medical advice. Always consult a licensed healthcare provider for medical concerns.
            </div>
          </div>
        </div>

        <!-- Q3 -->
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="faqThree">
            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
              How can I book a consultation or service?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              You can visit our <a href="services.php">Services page</a> to explore our offerings and use the contact form to request a personalized consultation.
            </div>
          </div>
        </div>

        <!-- Q4 -->
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="faqFour">
            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
              Is the information on your blog reliable?
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes. All our blog articles are reviewed by wellness experts to ensure accuracy and clarity. However, they are meant for educational purposes only.
            </div>
          </div>
        </div>

        <!-- Q5 -->
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="faqFive">
            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
              How can I contact BESZORG?
            </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              You can reach us through the <a href="contact.php">Contact page</a>. We’ll get back to you within 24–48 hours.
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

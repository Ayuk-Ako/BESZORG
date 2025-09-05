<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BESZORG • Your Trusted Health Resource</title>
  <meta name="description" content="Content-driven health website with a light shop for wellness products." />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root{
      --brand: #1a936f;
      --brand-2: #116466;
      --bg: #f7faf9;
      --text: #1f2937;
    }

    /* Base */
    html{scroll-behavior:smooth}
    body{background: var(--bg); color: var(--text);}
    a{color: var(--brand)}
    a:hover{color:#0c7a59}

    /* Glass Navbar */
    .glass-navbar{
      backdrop-filter: saturate(120%) blur(12px);
      background: linear-gradient(145deg, rgba(255,255,255,.72), rgba(255,255,255,.45));
      border-bottom: 1px solid rgba(255,255,255,.35);
      box-shadow: 0 10px 30px rgba(0,0,0,.08);
      z-index: 1040;
    }

    .brand{
      display:flex; align-items:center; gap:.6rem;
    }
    .brand-logo img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
      border: none;
      box-shadow: none;
    }
    .brand-title{font-weight:800; letter-spacing:.2px; color:#0f5132;}

    .navbar-nav .nav-link{
      border-radius:14px; padding:.65rem .85rem; display:flex; align-items:center; gap:.5rem;
      color:#0b3b2d; text-decoration:none; transition:all .2s ease;
    }
    .navbar-nav .nav-link:hover{background:rgba(26,147,111,.1)}
    .navbar-nav .nav-link.active{background:rgba(26,147,111,.18); color:var(--brand-2); font-weight:600}

    /* Main layout */
    main{padding-top:90px;}
    .section{padding: 80px 0}

    /* Hero */
    .hero{
      background: radial-gradient(120% 140% at 10% 10%, #e9f8f3, #ffffff 40%, #f2fbf8);
      border-bottom: 1px solid #eef2f1;
    }
    .hero-badge{background: #e9fbf5; color:#0f5132; border:1px solid #baf0dc}

    /* Cards */
    .card{border:1px solid #eef2f1; border-radius:18px}
    .card-img-top{border-top-left-radius:18px; border-top-right-radius:18px}

    /* Product price chip */
    .price{font-weight:800; color:var(--brand-2)}

    /* Footer */
    footer{border-top:1px solid #e6efed}
  </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="100" tabindex="0">

  <!-- Navbar (Glassmorphism) -->
  <nav class="glass-navbar navbar navbar-expand-lg fixed-top py-2">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="navbar-brand d-flex align-items-center gap-2" href="#home">
        <div class="brand-logo"><img src="img/logo.jpg" alt="beszorg"></div>
        <span class="brand-title">BESZORG</span>
      </a>

      <!-- Toggler -->
      <button class="navbar-toggler btn btn-sm btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto d-flex align-items-lg-center gap-lg-2">
          <li class="nav-item"><a href="index.php" class="nav-link active"><i class="bi bi-house-door"></i> Home</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link"><i class="bi bi-clipboard2-pulse"></i> Services</a></li>
          <li class="nav-item"><a href="products.php" class="nav-link"><i class="bi bi-bag"></i> Products <span class="ms-1 badge bg-success-subtle text-success border">New</span></a></li>
          <li class="nav-item"><a href="blog.php" class="nav-link"><i class="bi bi-journal-text"></i> Blog</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link"><i class="bi bi-people"></i> About</a></li>
          <li class="nav-item"><a href="faq.php" class="nav-link"><i class="bi bi-question-circle"></i> FAQ</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link"><i class="bi bi-envelope"></i> Contact</a></li>
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
    <!-- Hero / Home -->
    <section id="home" class="section hero">
      <div class="container">
        <div class="row align-items-center g-4">
          <div class="col-lg-6">
            <span class="badge hero-badge rounded-pill mb-3"><i class="bi bi-heart-pulse me-1"></i> Trusted health articles & gentle commerce</span>
            <h1 class="display-5 fw-bold">Reliable Health Guidance, Plus a Minimal Shop</h1>
            <p class="lead text-secondary">We publish easy-to-read, evidence-based articles your family can trust. Explore our concise selection of wellness products.</p>
            <div class="d-flex gap-2">
              <a href="#services" class="btn btn-success"><i class="bi bi-clipboard2-pulse me-1"></i> View Services</a>
              <a href="#products" class="btn btn-outline-success"><i class="bi bi-bag me-1"></i> Shop Products</a>
            </div>
          </div>
          <div class="col-lg-6">
            <img src="img/logo.jpg" alt="beszorg logo" class="img-fluid rounded-square">
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section id="services" class="section">
      <div class="container">
        <div class="d-flex align-items-end justify-content-between mb-4">
          <div>
            <h2 class="fw-bold mb-1">Services</h2>
            <p class="text-secondary mb-0">Simple, practical help for healthier living.</p>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-md-6 col-xl-4">
            <div class="card h-100">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1200&auto=format&fit=crop" alt="Health Coaching">
              <div class="card-body">
                <h5 class="card-title">Health Coaching</h5>
                <p class="card-text">One‑on‑one guidance for nutrition, sleep, and stress—tailored to your routine.</p>
                <a href="#contact" class="btn btn-outline-success">Book a Session</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="card h-100">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1516841273335-e39b37888115?q=80&w=1200&auto=format&fit=crop" alt="Wellness Workshops">
              <div class="card-body">
                <h5 class="card-title">Wellness Workshops</h5>
                <p class="card-text">Group sessions on meal planning, healthy habits, and reading labels effectively.</p>
                <a href="#contact" class="btn btn-outline-success">Request Info</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="card h-100">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=1200&auto=format&fit=crop" alt="Content Writing">
              <div class="card-body">
                <h5 class="card-title">Health Content Writing</h5>
                <p class="card-text">Clear, reader‑friendly articles for blogs, newsletters, and patient education.</p>
                <a href="#contact" class="btn btn-outline-success">Get a Quote</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Products -->
    <section id="products" class="section">
      <div class="container">
        <div class="d-flex align-items-end justify-content-between mb-4">
          <div>
            <h2 class="fw-bold mb-1">Products</h2>
            <p class="text-secondary mb-0">Curated wellness items.</p>
          </div>
          <div>
            <button class="btn btn-outline-success position-relative d-none d-lg-inline-flex" data-bs-toggle="offcanvas" data-bs-target="#cartCanvas" aria-controls="cartCanvas">
              <i class="bi bi-cart3 me-1"></i> Cart
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-success" id="cartCountLg">0</span>
            </button>
          </div>
        </div>
        <div class="row g-4" id="productGrid">
          <!-- Product cards injected by JS -->
        </div>
      </div>
    </section>

    <!-- Blog -->
    <section id="blog" class="section">
      <div class="container">
        <div class="mb-4">
          <h2 class="fw-bold mb-1">Latest Articles</h2>
          <p class="text-secondary mb-0">Evidence‑based, easy to read, updated regularly.</p>
        </div>
        <div class="row g-4">
          <div class="col-md-6 col-xl-4">
            <article class="card h-100">
              <img src="https://images.unsplash.com/photo-1549576490-b0b4831ef60a?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Hydration myths">
              <div class="card-body">
                <h5 class="card-title">Hydration: Myths vs Facts</h5>
                <p class="card-text">How much water do you actually need? A practical way to tell.</p>
                <a href="#" class="btn btn-outline-success">Read More</a>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-4">
            <article class="card h-100">
              <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Label reading">
              <div class="card-body">
                <h5 class="card-title">Reading Food Labels Without Headache</h5>
                <p class="card-text">Quick clues that help you choose better in any supermarket aisle.</p>
                <a href="#" class="btn btn-outline-success">Read More</a>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-4">
            <article class="card h-100">
              <img src="https://images.unsplash.com/photo-1467453678174-768ec283a940?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Sleep routine">
              <div class="card-body">
                <h5 class="card-title">Sleep Routines That Actually Stick</h5>
                <p class="card-text">Tiny habit changes for deeper rest in busy households.</p>
                <a href="#" class="btn btn-outline-success">Read More</a>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" class="section">
      <div class="container">
        <div class="row g-4 align-items-center">
          <div class="col-lg-6">
            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=1200&auto=format&fit=crop" class="img-fluid rounded-4 border" alt="About us" />
          </div>
          <div class="col-lg-6">
            <h2 class="fw-bold mb-3">About BESZORG</h2>
            <p>We’re a small, community‑focused team creating approachable health content and offering a few high‑quality wellness products. Our goal is clarity and practicality, not overwhelm.</p>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Evidence‑based, jargon‑free writing</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Carefully selected product catalog</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Simple checkout with PayPal or bank transfer</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="section">
      <div class="container">
        <div class="mb-4">
          <h2 class="fw-bold mb-1">FAQ</h2>
          <p class="text-secondary mb-0">Common questions about our content and products.</p>
        </div>
        <div class="accordion" id="faqAcc">
          <div class="accordion-item">
            <h2 class="accordion-header" id="q1h"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#q1">Are the articles medical advice?</button></h2>
            <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAcc">
              <div class="accordion-body">No. Our articles are for education only. For diagnosis or treatment, please consult a qualified healthcare professional.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="q2h"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q2">What payment methods do you accept?</button></h2>
            <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
              <div class="accordion-body">PayPal and bank transfer. During checkout, choose your preferred option. Bank transfers are reviewed manually and orders are confirmed by email.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="q3h"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q3">Do you ship internationally?</button></h2>
            <div id="q3" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
              <div class="accordion-body">Yes for most items. Shipping costs and times are shown at checkout when available. Digital products are delivered immediately via email.</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="section">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-6">
            <h2 class="fw-bold mb-3">Contact Us</h2>
            <p class="text-secondary">Have a question about an article or product? Send us a note.</p>
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
                  <a href="#products" class="btn btn-outline-success"><i class="bi bi-bag me-1"></i> Go to Shop</a>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6">
            <div class="p-4 rounded-4 border h-100">
              <h5 class="fw-bold">Business Details</h5>
              <p class="mb-1"><i class="bi bi-geo-alt me-1"></i> Neatherland</p>
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

    <!-- Footer -->
    <footer class="py-4 bg-white">
      <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">
        <div class="small">© <span id="y"></span> BESZORG. Educational content only.</div>
        <div class="small d-flex gap-3">
          <a href="#faq" class="text-decoration-none">FAQ</a>
          <a href="#about" class="text-decoration-none">About</a>
          <a href="#contact" class="text-decoration-none">Contact</a>
        </div>
      </div>
    </footer>
  </main>

  <!-- Offcanvas Cart -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="cartCanvas" aria-labelledby="cartLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="cartLabel"><i class="bi bi-cart3 me-1"></i> Your Cart</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
      <div id="cartItems" class="vstack gap-2 mb-3">
        <!-- Items go here -->
      </div>
      <div class="mt-auto border-top pt-3">
        <div class="d-flex justify-content-between align-items-center">
          <strong>Total</strong>
          <strong id="cartTotal">$0.00</strong>
        </div>
        <div class="d-grid gap-2 mt-3">
          <!-- PayPal placeholder (replace with real button later) -->
          <button class="btn btn-success" id="paypalBtn"><i class="bi bi-paypal me-1"></i> Checkout with PayPal</button>
          <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#bankModal"><i class="bi bi-bank me-1"></i> Pay by Bank Transfer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bank Transfer Modal -->
  <!-- <div class="modal fade" id="bankModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-bank me-1"></i> Bank Transfer Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="mb-2">Please transfer the total amount to:</p>
          <ul class="mb-3">
            <li><strong>Bank:</strong> Example Bank</li>
            <li><strong>Account Name:</strong> BESZORG</li>
            <li><strong>IBAN:</strong> CM12 3456 7890 1234 5678 90</li>
            <li><strong>Reference:</strong> Order #<span id="orderRef">1001</span></li>
          </ul>
          <p class="small text-secondary">After payment, send proof to <u>payments@BESZORG.example</u>. We'll confirm your order by email.</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" data-bs-dismiss="modal">Done</button>
        </div>
      </div>
    </div>
  </div> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Year in footer
    document.getElementById('y').textContent = new Date().getFullYear();

    // Sidebar toggling (mobile)
    const sidebar = document.getElementById('sidebar');
    document.getElementById('openSidebar')?.addEventListener('click', () => sidebar.classList.add('show'))
    document.getElementById('closeSidebar')?.addEventListener('click', () => sidebar.classList.remove('show'))

    // Active link highlighting on scroll
    const sections = [...document.querySelectorAll('section[id]')];
    const links = [...document.querySelectorAll('#sideNav a')];
    const setActive = () => {
      const y = window.scrollY + 120;
      let current = sections[0].id;
      for (const s of sections){ if (y >= s.offsetTop) current = s.id; }
      links.forEach(a => a.classList.toggle('active', a.getAttribute('href') === '#' + current));
    };
    window.addEventListener('scroll', setActive);
    window.addEventListener('load', setActive);

    // Demo product data (replace with DB later)
    const PRODUCTS = [
      {id:1, name:'Omega‑3 Softgels', price:19.99, img:'https://images.unsplash.com/photo-1599050751795-5f2cdbd6b316?q=80&w=1200&auto=format&fit=crop'},
      {id:2, name:'Vitamin D3 Drops', price:14.50, img:'https://images.unsplash.com/photo-1600172454284-934feca24d5f?q=80&w=1200&auto=format&fit=crop'},
      {id:3, name:'Herbal Tea Blend', price:9.90, img:'https://images.unsplash.com/photo-1515825838458-f2a94b20105a?q=80&w=1200&auto=format&fit=crop'},
      {id:4, name:'Reusable Water Bottle', price:12.00, img:'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?q=80&w=1200&auto=format&fit=crop'},
      {id:5, name:'Sleep Mask', price:7.50, img:'https://images.unsplash.com/photo-1556228578-8a3a0a5f2b8b?q=80&w=1200&auto=format&fit=crop'},
      {id:6, name:'Resistance Bands Set', price:16.75, img:'https://images.unsplash.com/photo-1594737625785-c6683fc44462?q=80&w=1200&auto=format&fit=crop'}
    ];

    // Render product cards
    const grid = document.getElementById('productGrid');
    grid.innerHTML = PRODUCTS.map(p => `
      <div class="col-sm-6 col-xl-4">
        <div class="card h-100">
          <img src="${p.img}" class="card-img-top" alt="${p.name}">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">${p.name}</h5>
            <div class="mt-auto d-flex justify-content-between align-items-center">
              <span class="price">$${p.price.toFixed(2)}</span>
              <button class="btn btn-success btn-sm" data-add="${p.id}"><i class="bi bi-plus-lg me-1"></i>Add</button>
            </div>
          </div>
        </div>
      </div>
    `).join('');

    // Simple Cart (frontend demo)
    const cart = new Map();
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    const countBadges = [document.getElementById('cartCount'), document.getElementById('cartCountLg')];

    const format = v => `$${v.toFixed(2)}`;

    function updateCartUI(){
      let total = 0;
      const rows = [];
      cart.forEach((qty, id) => {
        const p = PRODUCTS.find(x=>x.id===id);
        const line = p.price * qty; total += line;
        rows.push(`
          <div class="border rounded-3 p-2 d-flex align-items-center gap-2">
            <img src="${p.img}" alt="${p.name}" width="56" height="56" class="rounded" style="object-fit:cover">
            <div class="me-auto">
              <div class="fw-semibold">${p.name}</div>
              <div class="small text-secondary">${qty} × ${format(p.price)} = <strong>${format(line)}</strong></div>
            </div>
            <div class="btn-group btn-group-sm" role="group" aria-label="Quantity controls">
              <button class="btn btn-outline-secondary" data-dec="${id}" aria-label="Decrease">−</button>
              <button class="btn btn-outline-secondary disabled">${qty}</button>
              <button class="btn btn-outline-secondary" data-inc="${id}" aria-label="Increase">+</button>
            </div>
            <button class="btn btn-outline-danger btn-sm ms-2" data-del="${id}" aria-label="Remove"><i class="bi bi-trash"></i></button>
          </div>`)
      });
      cartItems.innerHTML = rows.join('') || '<div class="text-secondary">Your cart is empty.</div>';
      cartTotal.textContent = format(total);
      const count = [...cart.values()].reduce((a,b)=>a+b,0);
      countBadges.forEach(b=>{ if(b){ b.textContent = count; b.style.display = count? 'inline-block':'none'; } });
      document.getElementById('orderRef').textContent = Math.floor(1000 + Math.random()*9000);
    }

    // Event delegation for products
    grid.addEventListener('click', e =>{
      const id = +e.target.closest('[data-add]')?.dataset.add;
      if(!id) return;
      cart.set(id, (cart.get(id)||0)+1);
      updateCartUI();
      const offcanvas = bootstrap.Offcanvas.getOrCreateInstance('#cartCanvas');
      offcanvas.show();
    });

    // Event delegation for cart controls
    cartItems.addEventListener('click', e =>{
      const dec = e.target.closest('[data-dec]');
      const inc = e.target.closest('[data-inc]');
      const del = e.target.closest('[data-del]');
      if(dec){ const id = +dec.dataset.dec; const q = (cart.get(id)||0)-1; if(q>0) cart.set(id,q); else cart.delete(id); updateCartUI(); }
      if(inc){ const id = +inc.dataset.inc; cart.set(id,(cart.get(id)||0)+1); updateCartUI(); }
      if(del){ const id = +del.dataset.del; cart.delete(id); updateCartUI(); }
    });

    // PayPal placeholder
    document.getElementById('paypalBtn').addEventListener('click', ()=>{
      alert('This is a frontend demo. Replace this button with the real PayPal SDK checkout.');
    });

    // Initialize
    updateCartUI();
  </script>
</body>
</html>

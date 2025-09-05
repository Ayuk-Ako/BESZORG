<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>BESZORG • Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root{ --sidebar-w:280px; --brand:#1a936f; --brand-2:#116466; --bg:#f7faf9; --text:#1f2937 }
    html{scroll-behavior:smooth}
    body{background:var(--bg); color:var(--text);}
    a{color:var(--brand)}

    /* Glassmorphism Sidebar (fixed) */
    .glass-sidebar{
      position:fixed; inset:0 auto 0 0; width:var(--sidebar-w); z-index:1040;
      backdrop-filter:saturate(120%) blur(12px);
      background:linear-gradient(145deg, rgba(255,255,255,.72), rgba(255,255,255,.45));
      border-right:1px solid rgba(255,255,255,.35); box-shadow:0 10px 30px rgba(0,0,0,.06);
    }
    .glass-sidebar .brand{display:flex;align-items:center;gap:.6rem;padding:1.2rem 1.25rem 1rem}
    .brand-logo{width:42px;height:42px;border-radius:12px;display:grid;place-items:center;background:radial-gradient(120% 120% at 10% 10%, #49dcb1,#1a936f);color:#fff;font-weight:700}
    .brand-title{font-weight:800;letter-spacing:.2px;color:#0f5132}
    .nav-sep{height:1px;background:linear-gradient(90deg,transparent,rgba(0,0,0,.06),transparent);margin:.5rem 1.25rem}
    .side-nav a{border-radius:12px;padding:.6rem .9rem;display:flex;align-items:center;gap:.65rem;color:#0b3b2d;text-decoration:none}
    .side-nav a:hover{background:rgba(26,147,111,.08)}
    .side-nav a.active{background:rgba(26,147,111,.14);color:var(--brand-2);font-weight:600}

    /* Responsive */
    .sidebar-toggle{display:none}
    @media (max-width:991.98px){
      .glass-sidebar{transform:translateX(-100%);transition:transform .25s ease}
      .glass-sidebar.show{transform:translateX(0)}
      main{margin-left:0!important}
      .sidebar-toggle{display:inline-flex}
    }

    /* Main layout */
    main{margin-left:var(--sidebar-w);min-height:100vh}
    .card{border:1px solid #eef2f1;border-radius:14px}
    .small-muted{color:#6b7280}
  </style>
</head>
<body>
  <!-- Sidebar -->
  <aside class="glass-sidebar" id="sidebar">
    <div class="brand">
      <div class="brand-logo">HL</div>
      <div>
        <div class="brand-title h6 mb-0">BESZORG Admin</div>
        <small class="text-muted">Dashboard • Manage content</small>
      </div>
      <button class="btn btn-sm btn-outline-success ms-auto d-lg-none" id="closeSidebar" aria-label="Close sidebar"><i class="bi bi-x"></i></button>
    </div>
    <div class="px-3">
      <div class="nav-sep"></div>
      <nav class="side-nav d-grid gap-1" id="sideNav">
        <a href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="products.php" class="active"><i class="bi bi-bag"></i> Products</a>
        <a href="blogs.php"><i class="bi bi-journal-text"></i> Blogs</a>
        <a href="orders.php"><i class="bi bi-receipt"></i> Orders</a>
        <!-- <a href="#users"><i class="bi bi-people"></i> Users</a> -->
        <a href="settings.php"><i class="bi bi-gear"></i> Settings</a>
        <a href="logs.php"><i class="bi bi-file-earmark-text"></i> Activity Logs</a>
      </nav>
      <div class="nav-sep mt-2"></div>
      <!-- <div class="p-3 small text-muted"><i class="bi bi-shield-check me-1"></i> Demo admin — frontend only.</div> -->
    </div>
  </aside>

  <main>
  <!-- Topbar (mobile) -->
  <div class="sticky-top d-lg-none">
    <div class="d-flex align-items-center p-2 bg-white border-bottom">
      <button class="btn btn-success sidebar-toggle" id="openSidebar"><i class="bi bi-list"></i> Menu</button>
      <div class="ms-auto d-flex align-items-center gap-2">
        <div class="small text-muted">Admin</div>
        <button class="btn btn-outline-secondary btn-sm">Sign out</button>
      </div>
    </div>
  </div>

  <div class="container py-4">
    <!-- Stats -->
    <div class="row mb-4">
      <div class="col-md-3">
        <div class="card p-3 text-center">
          <div class="fw-bold">Total Products</div>
          <div class="h3 mt-2" id="statProducts">0</div>
        </div>
      </div>
    </div>

    <!-- Product Upload Form -->
    <div class="card p-3 mb-4">
  <h5 class="mb-3">Add / Edit Product</h5>
  <form id="productForm">
    <input type="hidden" id="prodId">
    <div class="row g-3">
      <div class="col-md-4">
        <input type="text" id="prodName" class="form-control" placeholder="Product Name" required>
      </div>

      <div class="col-md-2">
        <input type="number" id="prodPrice" class="form-control" placeholder="Price $" step="0.01" required>
      </div>

      <div class="col-md-4">
        <input type="file" id="prodImgFile" class="form-control" accept="image/*">
      </div>

      <div class="col-md-8">
        <input type="text" id="prodDesc" class="form-control" placeholder="Description">
      </div>

      <div class="col-md-12 d-flex gap-2">
        <button type="submit" class="btn btn-success">Save Product</button>
        <button type="button" class="btn btn-secondary" id="resetForm">Reset</button>
      </div>
    </div>
  </form>
</div>



    <!-- Products Table -->
    <div class="card p-3">
      <h5 class="mb-3">Products List</h5>
      <div class="table-responsive">
        <table class="table table-hover align-middle" id="productsTable">
          <thead class="table-light">
            <tr>
              <th>Image</th>
              <th>Name & Description</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Products populated dynamically via JS -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Mobile sidebar
    const sidebar = document.getElementById('sidebar');
    document.getElementById('openSidebar')?.addEventListener('click', ()=>sidebar.classList.add('show'))
    document.getElementById('closeSidebar')?.addEventListener('click', ()=>sidebar.classList.remove('show'))

  // Override existing form submit to handle file uploads
  const prodForm = document.getElementById('productForm');
  prodForm.addEventListener('submit', e => {
    e.preventDefault();

    const id = Number(document.getElementById('prodId').value) || Date.now();
    const name = document.getElementById('prodName').value.trim();
    const price = Number(document.getElementById('prodPrice').value) || 0;
    const desc = document.getElementById('prodDesc').value.trim();
    const fileInput = document.getElementById('prodImgFile');
    const file = fileInput.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        const img = event.target.result; // Base64 image
        saveProduct(id, name, price, img, desc);
      }
      reader.readAsDataURL(file);
    } else {
      const existingProduct = state.products.find(p => p.id === id);
      const img = existingProduct ? existingProduct.img : '';
      saveProduct(id, name, price, img, desc);
    }

    prodForm.reset();
    document.getElementById('prodId').value = '';
  });

  function saveProduct(id, name, price, img, desc) {
    const existing = state.products.find(p => p.id === id);
    if (existing) {
      Object.assign(existing, { name, price, img, desc });
      log('Updated product: ' + name);
    } else {
      state.products.unshift({ id, name, price, img, desc });
      log('Added product: ' + name);
    }
    save();
  }
</script>

</body>
</html>

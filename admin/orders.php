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
        <a href="products.php"><i class="bi bi-bag"></i> Products</a>
        <a href="blogs.php"><i class="bi bi-journal-text"></i> Blogs</a>
        <a href="orders.php" class="active"><i class="bi bi-receipt"></i> Orders</a>
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

  <!-- Content -->
  <div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h4 class="mb-0">Orders Management</h4>
      <small class="text-muted">Track and manage all customer orders</small>
    </div>

    <!-- Stats -->
    <div class="row mb-4">
      <div class="col-md-3">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <div class="h5 mb-1">Total Orders</div>
            <div id="statOrders" class="fs-3 fw-bold text-success">0</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Order Lookup Form -->
    <div class="card mb-4">
      <div class="card-header bg-white fw-semibold">
        Find Order
      </div>
      <div class="card-body">
        <form id="orderSearchForm" class="row g-3">
          <div class="col-md-6">
            <label for="orderRef" class="form-label">Order Reference</label>
            <input type="text" id="orderRef" class="form-control" placeholder="e.g. ORD1234" required>
          </div>
          <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-success w-100">View Order</button>
          </div>
        </form>
        <div id="orderDetails" class="mt-3"></div>
      </div>
    </div>

    <!-- Orders Table -->
    <div class="card">
      <div class="card-header bg-white fw-semibold">
        All Orders
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>Reference</th>
                <th>Buyer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="ordersTable">
              <!-- JS will fill orders here -->
            </tbody>
          </table>
        </div>
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

</script>
</body>
</html>

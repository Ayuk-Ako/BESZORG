<?php
session_start();

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Include database connection
include 'db_connect.php';

// Fetch initial data from database (example for products)
$products = [];
$orders = [];
$blogs = [];

$stmt = $conn->prepare("SELECT id, name, price, img_url AS img, description AS `desc` FROM products");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
$stmt->close();

$stmt = $conn->prepare("SELECT ref, guest_name AS buyer, total, status FROM orders LIMIT 5"); // Example limit
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}
$stmt->close();

$stmt = $conn->prepare("SELECT id, title, body, img_url AS img FROM blog_posts LIMIT 5"); // Example limit
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $blogs[] = $row;
}
$stmt->close();

$conn->close();
?>

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
        <a href="dashboard.php" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="products.php"><i class="bi bi-bag"></i> Products</a>
        <a href="blogs.php"><i class="bi bi-journal-text"></i> Blogs</a>
        <a href="orders.php"><i class="bi bi-receipt"></i> Orders</a>
        <a href="settings.php"><i class="bi bi-gear"></i> Settings</a>
        <a href="logs.php"><i class="bi bi-file-earmark-text"></i> Activity Logs</a>
      </nav>
      <div class="nav-sep mt-2"></div>
    </div>
  </aside>

  <main>
    <!-- Topbar (mobile) -->
    <div class="sticky-top d-lg-none">
      <div class="d-flex align-items-center p-2 bg-white border-bottom">
        <button class="btn btn-success sidebar-toggle" id="openSidebar"><i class="bi bi-list"></i> Menu</button>
        <div class="ms-auto d-flex align-items-center gap-2">
          <div class="small text-muted">Admin</div>
          <a href="../logout.php" class="btn btn-outline-secondary btn-sm">Sign out</a>
        </div>
      </div>
    </div>

    <div class="container py-4">
      <section id="dash" class="mb-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div>
            <h3 class="mb-0">Overview</h3>
            <small class="small-muted">Quick stats and recent activity</small>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-success" id="exportBtn"><i class="bi bi-download"></i> Export</button>
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="col-sm-6 col-xl-3">
            <div class="card p-3">
              <div class="d-flex align-items-center">
                <div class="me-3 display-6 text-success"><i class="bi bi-bag"></i></div>
                <div>
                  <div class="small-muted">Products</div>
                  <div class="h5 mb-0" id="statProducts"><?php echo count($products); ?></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card p-3">
              <div class="d-flex align-items-center">
                <div class="me-3 display-6 text-success"><i class="bi bi-receipt"></i></div>
                <div>
                  <div class="small-muted">Orders</div>
                  <div class="h5 mb-0" id="statOrders"><?php echo count($orders); ?></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card p-3">
              <div class="d-flex align-items-center">
                <div class="me-3 display-6 text-success"><i class="bi bi-cash-stack"></i></div>
                <div>
                  <div class="small-muted">Revenue</div>
                  <div class="h5 mb-0" id="statRevenue"><?php echo '$' . number_format(array_sum(array_column($orders, 'total')), 2); ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="mb-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div>
            <h4 class="mb-0 fw-bold">Products</h4>
            <small class="text-muted">Add, edit, or remove products.</small>
          </div>
          <div>
            <input class="form-control form-control-sm rounded-pill px-3 shadow-sm" id="searchProduct" placeholder="Search products" style="width:230px">
          </div>
        </div>

        <div class="row g-4">
          <div class="col-lg-5">
            <div class="card border-0 shadow-sm p-3">
              <h6 class="mb-3 fw-semibold text-success">Add / Edit Product</h6>
              <form id="productForm" class="needs-validation" novalidate>
                <input type="hidden" id="prodId">
                <div class="mb-3">
                  <label class="form-label small fw-semibold">Product Name</label>
                  <input type="text" class="form-control rounded-3 shadow-sm" id="prodName" placeholder="Enter product name" required>
                </div>
                <div class="mb-3">
                  <label class="form-label small fw-semibold">Price (USD)</label>
                  <input type="number" step="0.01" class="form-control rounded-3 shadow-sm" id="prodPrice" placeholder="0.00" required>
                </div>
                <div class="mb-3">
                  <label class="form-label small fw-semibold">Upload Image</label>
                  <input type="file" accept="image/*" class="form-control rounded-3 shadow-sm" id="prodImg">
                  <div class="mt-2">
                    <img id="imgPreview" src="" alt="Preview" class="img-thumbnail d-none" style="max-height:120px;">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label small fw-semibold">Short Description</label>
                  <textarea class="form-control rounded-3 shadow-sm" id="prodDesc" rows="3" placeholder="Enter product details..."></textarea>
                </div>
                <div class="d-flex gap-2">
                  <button class="btn btn-success px-3 rounded-pill" id="saveProduct">
                    <i class="bi bi-check-circle"></i> Save
                  </button>
                  <button type="button" class="btn btn-outline-secondary px-3 rounded-pill" id="resetForm">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                  </button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="card border-0 shadow-sm p-3">
              <h6 class="mb-3 fw-semibold text-success">Product Catalog</h6>
              <div class="table-responsive">
                <table class="table table-hover align-middle">
                  <thead class="table-light">
                    <tr>
                      <th style="width:80px">Image</th>
                      <th>Name</th>
                      <th style="width:120px">Price</th>
                      <th style="width:170px">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="productsTable">
                    <?php foreach ($products as $product): ?>
                      <tr>
                        <td><img src="<?php echo htmlspecialchars($product['img'] ?? 'https://via.placeholder.com/64'); ?>" alt="" style="width:64px;height:48px;object-fit:cover;border-radius:8px"></td>
                        <td><strong><?php echo htmlspecialchars($product['name']); ?></strong><div class="small text-muted"><?php echo htmlspecialchars($product['desc'] ?? ''); ?></div></td>
                        <td>$<?php echo number_format($product['price'], 2); ?></td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-sm btn-outline-secondary" data-edit="<?php echo $product['id']; ?>"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger" data-delete="<?php echo $product['id']; ?>"><i class="bi bi-trash"></i></button>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="mb-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div>
            <h4 class="mb-0 fw-bold">Blog Manager</h4>
            <small class="text-muted">Add, edit, or remove blog posts with images.</small>
          </div>
          <div>
            <button class="btn btn-outline-success rounded-pill px-3" id="addBlockBtn">
              <i class="bi bi-plus-lg"></i> Add Blog
            </button>
          </div>
        </div>

        <div class="row g-4">
          <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-3" id="blocksList">
              <?php if (empty($blogs)): ?>
                <div class="text-muted">No blog posts created yet.</div>
              <?php else: ?>
                <?php foreach ($blogs as $blog): ?>
                  <div class="d-flex align-items-start gap-2 mb-2">
                    <div class="me-2" style="width:64px"><img src="<?php echo htmlspecialchars($blog['img'] ?? 'https://via.placeholder.com/64'); ?>" style="width:64px;height:48px;object-fit:cover;border-radius:8px"></div>
                    <div class="me-auto">
                      <div class="fw-semibold"><?php echo htmlspecialchars($blog['title']); ?></div>
                      <div class="small text-muted"><?php echo htmlspecialchars(substr($blog['body'], 0, 80) . (strlen($blog['body']) > 80 ? '...' : '')); ?></div>
                    </div>
                    <div>
                      <button class="btn btn-sm btn-outline-secondary" data-edit-block="<?php echo $blog['id']; ?>"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-sm btn-outline-danger" data-del-block="<?php echo $blog['id']; ?>"><i class="bi bi-trash"></i></button>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-3">
              <h6 class="mb-3 fw-semibold text-success">Blog Editor</h6>
              <form id="blockForm" class="needs-validation" novalidate>
                <input type="hidden" id="blockId">
                <div class="mb-3">
                  <label class="form-label small fw-semibold">Title</label>
                  <input type="text" class="form-control rounded-3 shadow-sm" id="blockTitle" placeholder="Enter blog title" required>
                </div>
                <div class="mb-3">
                  <label class="form-label small fw-semibold">Body</label>
                  <textarea class="form-control rounded-3 shadow-sm" id="blockBody" rows="5" placeholder="Write your blog content..."></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label small fw-semibold">Upload Image (optional)</label>
                  <input type="file" accept="image/*" class="form-control rounded-3 shadow-sm" id="blockImg">
                  <div class="mt-2">
                    <img id="blogImgPreview" src="" alt="Preview" class="img-thumbnail d-none" style="max-height:140px;">
                  </div>
                </div>
                <div class="d-flex gap-2">
                  <button class="btn btn-success rounded-pill px-3" id="saveBlock">
                    <i class="bi bi-check-circle"></i> Save
                  </button>
                  <button type="button" class="btn btn-outline-secondary rounded-pill px-3" id="resetBlock">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <section class="mb-4">
        <div class="row g-3">
          <div class="col-lg-6">
            <div id="orders" class="card p-3">
              <h6 class="mb-2">Orders</h6>
              <div class="table-responsive">
                <table class="table table-sm">
                  <thead><tr><th>Ref</th><th>Buyer</th><th>Total</th><th>Status</th><th></th></tr></thead>
                  <tbody id="ordersTable">
                    <?php foreach ($orders as $order): ?>
                      <tr>
                        <td><?php echo htmlspecialchars($order['ref']); ?></td>
                        <td><?php echo htmlspecialchars($order['buyer'] ?? '—'); ?></td>
                        <td>$<?php echo number_format($order['total'], 2); ?></td>
                        <td><?php echo htmlspecialchars($order['status'] ?? 'pending'); ?></td>
                        <td><button class="btn btn-sm btn-outline-success" data-view-order="<?php echo $order['ref']; ?>">View</button></td>
                      </tr>
                    <?php endforeach; ?>
                    <?php if (empty($orders)): ?>
                      <tr><td colspan="5" class="text-muted">No orders yet.</td></tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Mobile sidebar
    const sidebar = document.getElementById('sidebar');
    document.getElementById('openSidebar')?.addEventListener('click', () => sidebar.classList.add('show'));
    document.getElementById('closeSidebar')?.addEventListener('click', () => sidebar.classList.remove('show'));

    // Preview uploaded product image
    document.getElementById("prodImg").addEventListener("change", function(e) {
      const file = e.target.files[0];
      const preview = document.getElementById("imgPreview");
      if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
          preview.src = event.target.result;
          preview.classList.remove("d-none");
        };
        reader.readAsDataURL(file);
      } else {
        preview.src = "";
        preview.classList.add("d-none");
      }
    });

    // Preview uploaded blog image
    document.getElementById("blockImg").addEventListener("change", function(e) {
      const file = e.target.files[0];
      const preview = document.getElementById("blogImgPreview");
      if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
          preview.src = event.target.result;
          preview.classList.remove("d-none");
        };
        reader.readAsDataURL(file);
      } else {
        preview.src = "";
        preview.classList.add("d-none");
      }
    });

    // Product form handlers (to be updated with AJAX/PHP)
    const prodForm = document.getElementById('productForm');
    prodForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const id = Number(document.getElementById('prodId').value) || Date.now();
      const name = document.getElementById('prodName').value.trim();
      const price = Number(document.getElementById('prodPrice').value) || 0;
      const img = document.getElementById('prodImg').value.trim(); // File handling needs server-side upload
      const desc = document.getElementById('prodDesc').value.trim();

      // AJAX to save to server (placeholder)
      fetch('save_product.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${id}&name=${encodeURIComponent(name)}&price=${price}&img=${encodeURIComponent(img)}&desc=${encodeURIComponent(desc)}`
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Product saved!');
          prodForm.reset();
          document.getElementById('prodId').value = '';
          location.reload(); // Refresh to update table
        } else {
          alert('Error saving product.');
        }
      })
      .catch(error => console.error('Error:', error));
    });

    document.getElementById('resetForm').addEventListener('click', () => {
      prodForm.reset();
      document.getElementById('prodId').value = '';
    });

    // Table actions (to be updated with AJAX/PHP)
    document.getElementById('productsTable').addEventListener('click', function(e) {
      const edit = e.target.closest('[data-edit]');
      const del = e.target.closest('[data-delete]');
      if (edit) {
        const id = Number(edit.dataset.edit);
        // Fetch product details via AJAX (placeholder)
        fetch(`get_product.php?id=${id}`)
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              document.getElementById('prodId').value = data.id;
              document.getElementById('prodName').value = data.name;
              document.getElementById('prodPrice').value = data.price;
              document.getElementById('prodImg').value = data.img; // Update with file upload logic
              document.getElementById('prodDesc').value = data.desc;
              window.scrollTo({ top: 0, behavior: 'smooth' });
            }
          });
      }
      if (del) {
        const id = Number(del.dataset.delete);
        if (confirm('Delete product?')) {
          fetch(`delete_product.php?id=${id}`, { method: 'POST' })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                alert('Product deleted!');
                location.reload();
              }
            });
        }
      }
    });

    // Search
    document.getElementById('searchProduct').addEventListener('input', function(e) {
      // This would need server-side filtering; for now, keep client-side
      renderProductsTable(e.target.value);
    });

    function renderProductsTable(filter = '') {
      const tbody = document.getElementById('productsTable');
      tbody.innerHTML = '';
      <?php foreach ($products as $product): ?>
        <?php if (stripos($product['name'] . ($product['desc'] ?? ''), $filter) !== false): ?>
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <td><img src="<?php echo htmlspecialchars($product['img'] ?? 'https://via.placeholder.com/64'); ?>" alt="" style="width:64px;height:48px;object-fit:cover;border-radius:8px"></td>
            <td><strong><?php echo htmlspecialchars($product['name']); ?></strong><div class="small text-muted"><?php echo htmlspecialchars($product['desc'] ?? ''); ?></div></td>
            <td>$<?php echo number_format($product['price'], 2); ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-outline-secondary" data-edit="<?php echo $product['id']; ?>"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-outline-danger" data-delete="<?php echo $product['id']; ?>"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          `;
          tbody.appendChild(tr);
        <?php endif; ?>
      <?php endforeach; ?>
    }

    // Blog form handlers (to be updated with AJAX/PHP)
    document.getElementById('saveBlock').addEventListener('click', function(e) {
      e.preventDefault();
      const id = Number(document.getElementById('blockId').value) || Date.now();
      const title = document.getElementById('blockTitle').value.trim();
      const body = document.getElementById('blockBody').value.trim();
      const img = document.getElementById('blockImg').value.trim(); // File handling needs server-side

      if (!title && !body) {
        alert('Add title or body');
        return;
      }

      fetch('save_blog.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${id}&title=${encodeURIComponent(title)}&body=${encodeURIComponent(body)}&img=${encodeURIComponent(img)}`
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Blog saved!');
          document.getElementById('blockForm').reset();
          location.reload();
        } else {
          alert('Error saving blog.');
        }
      });
    });

    document.getElementById('blocksList').addEventListener('click', function(e) {
      const edit = e.target.closest('[data-edit-block]');
      const del = e.target.closest('[data-del-block]');
      if (edit) {
        const id = edit.dataset.editBlock;
        fetch(`get_blog.php?id=${id}`)
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              document.getElementById('blockId').value = data.id;
              document.getElementById('blockTitle').value = data.title;
              document.getElementById('blockBody').value = data.body;
              document.getElementById('blockImg').value = data.img;
              window.scrollTo({ top: 0, behavior: 'smooth' });
            }
          });
      }
      if (del) {
        if (confirm('Delete block?')) {
          fetch(`delete_blog.php?id=${del.dataset.delBlock}`, { method: 'POST' })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                alert('Blog deleted!');
                location.reload();
              }
            });
        }
      }
    });

    // Orders demo (to be updated with real data)
    document.getElementById('ordersTable').addEventListener('click', function(e) {
      const v = e.target.closest('[data-view-order]');
      if (v) {
        alert('Order view (demo): ' + v.dataset.viewOrder);
      }
    });

    // Initial render (partial, as data is now from PHP)
    document.getElementById('statProducts').textContent = '<?php echo count($products); ?>';
    document.getElementById('statOrders').textContent = '<?php echo count($orders); ?>';
    document.getElementById('statRevenue').textContent = '<?php echo '$' . number_format(array_sum(array_column($orders, 'total')), 2); ?>';
  </script>
</body>
</html>
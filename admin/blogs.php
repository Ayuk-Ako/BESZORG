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
        <a href="blogs.php" class="active"><i class="bi bi-journal-text"></i> Blogs</a>
        <a href="orders.php"><i class="bi bi-receipt"></i> Orders</a>
        <!-- <a href="#users"><i class="bi bi-people"></i> Users</a> -->
        <a href="settings.php"><i class="bi bi-gear"></i> Settings</a>
        <a href="logs.php"><i class="bi bi-file-earmark-text"></i> Activity Logs</a>
      </nav>
      <div class="nav-sep mt-2"></div>
      <!-- <div class="p-3 small text-muted"><i class="bi bi-shield-check me-1"></i> Demo admin — frontend only.</div> -->
    </div>
  </aside>

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

  <main class="p-4">
  <!-- Blog Upload Form -->
  <div class="card p-3 mb-4">
    <h5 class="mb-3">Add / Edit Blog</h5>
    <form id="blogForm">
      <input type="hidden" id="blogId">
      <div class="row g-3">
        <div class="col-md-6">
          <input type="text" id="blogTitle" class="form-control" placeholder="Blog Title" required>
        </div>
        <div class="col-md-6">
          <input type="file" id="blogImgFile" class="form-control" accept="image/*">
        </div>
        <div class="col-md-12">
          <textarea id="blogContent" class="form-control" rows="4" placeholder="Blog Content"></textarea>
        </div>
        <div class="col-md-12 d-flex gap-2">
          <button type="submit" class="btn btn-success">Save Blog</button>
          <button type="button" class="btn btn-secondary" id="resetBlogForm">Reset</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Blog Stats -->
  <div class="mb-3">
    <strong>Total Blogs Uploaded:</strong> <span id="statBlogs">0</span>
  </div>

  <!-- Blogs Table -->
  <div class="card p-3">
    <h5 class="mb-3">All Blogs</h5>
    <div class="table-responsive">
      <table class="table table-striped table-hover align-middle">
        <thead>
          <tr>
            <th>Image</th>
            <th>Title & Content</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="blogsTable">
          <tr><td colspan="3" class="text-muted">No blogs uploaded yet.</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</main>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Mobile sidebar
    const sidebar = document.getElementById('sidebar');
    document.getElementById('openSidebar')?.addEventListener('click', ()=>sidebar.classList.add('show'))
    document.getElementById('closeSidebar')?.addEventListener('click', ()=>sidebar.classList.remove('show'))

  const blogForm = document.getElementById('blogForm');

  // Initialize state for blogs
  state.blogs = state.blogs || [];

  function renderBlogs() {
    const tbody = document.getElementById('blogsTable');
    tbody.innerHTML = '';
    document.getElementById('statBlogs').textContent = state.blogs.length;

    if (!state.blogs.length) {
      tbody.innerHTML = '<tr><td colspan="3" class="text-muted">No blogs uploaded yet.</td></tr>';
      return;
    }

    state.blogs.forEach(blog => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><img src="${blog.img||'https://via.placeholder.com/64'}" style="width:64px;height:48px;object-fit:cover;border-radius:8px"></td>
        <td>
          <strong>${blog.title}</strong>
          <div class="small text-muted">${blog.content.slice(0, 100)}${blog.content.length>100?'...':''}</div>
        </td>
        <td>
          <div class="btn-group">
            <button class="btn btn-sm btn-outline-secondary" data-edit-blog="${blog.id}"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-sm btn-outline-danger" data-delete-blog="${blog.id}"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      `;
      tbody.appendChild(tr);
    });
  }

  // Blog form submit
  blogForm.addEventListener('submit', e => {
    e.preventDefault();
    const id = Number(document.getElementById('blogId').value) || Date.now();
    const title = document.getElementById('blogTitle').value.trim();
    const content = document.getElementById('blogContent').value.trim();
    const fileInput = document.getElementById('blogImgFile');
    const file = fileInput.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        const img = event.target.result; // Base64 image
        saveBlog(id, title, content, img);
      }
      reader.readAsDataURL(file);
    } else {
      const existing = state.blogs.find(b => b.id === id);
      const img = existing ? existing.img : '';
      saveBlog(id, title, content, img);
    }

    blogForm.reset();
    document.getElementById('blogId').value = '';
  });

  function saveBlog(id, title, content, img) {
    const existing = state.blogs.find(b => b.id === id);
    if (existing) {
      Object.assign(existing, { title, content, img });
      log('Updated blog: ' + title);
    } else {
      state.blogs.unshift({ id, title, content, img });
      log('Added blog: ' + title);
    }
    save();
  }

  // Reset form
  document.getElementById('resetBlogForm').addEventListener('click', () => {
    blogForm.reset();
    document.getElementById('blogId').value = '';
  });

  // Table actions (edit/delete)
  document.getElementById('blogsTable').addEventListener('click', e => {
    const editBtn = e.target.closest('[data-edit-blog]');
    const delBtn = e.target.closest('[data-delete-blog]');

    if (editBtn) {
      const id = Number(editBtn.dataset.editBlog);
      const blog = state.blogs.find(b => b.id === id);
      if (blog) {
        document.getElementById('blogId').value = blog.id;
        document.getElementById('blogTitle').value = blog.title;
        document.getElementById('blogContent').value = blog.content;
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    }

    if (delBtn) {
      const id = Number(delBtn.dataset.deleteBlog);
      if (confirm('Delete this blog?')) {
        state.blogs = state.blogs.filter(b => b.id !== id);
        log('Deleted blog id ' + id);
        save();
      }
    }
  });

  renderBlogs(); // Initial render
</script>
</body>
</html>

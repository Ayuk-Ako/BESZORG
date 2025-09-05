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
        <a href="orders.php"><i class="bi bi-receipt"></i> Orders</a>
        <!-- <a href="#users"><i class="bi bi-people"></i> Users</a> -->
        <a href="settings.php"  class="active"><i class="bi bi-gear"></i> Settings</a>
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

    <div class="container-fluid py-4">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h4 class="mb-0">Settings</h4>
    <small class="text-muted">Configure site preferences</small>
  </div>

  <div class="card shadow-sm">
    <div class="card-header bg-white fw-semibold">
      General Settings
    </div>
    <div class="card-body">
      <form id="settingsForm" class="row g-3">
        <div class="col-md-6">
          <label for="siteTitle" class="form-label">Site Title</label>
          <input type="text" id="siteTitle" class="form-control" placeholder="Enter site title">
        </div>

        <div class="col-md-6">
          <label for="siteEmail" class="form-label">Contact Email</label>
          <input type="email" id="siteEmail" class="form-control" placeholder="hello@example.com">
        </div>

        <div class="col-md-6">
          <label for="brandColor" class="form-label">Brand Color</label>
          <input type="color" id="brandColor" class="form-control form-control-color" value="#1a936f">
        </div>

        <div class="col-md-6">
          <label for="siteLogo" class="form-label">Logo Upload</label>
          <input type="file" id="siteLogo" class="form-control" accept="image/*">
          <div class="mt-2">
            <img id="logoPreview" src="" alt="Logo Preview" style="max-height:60px;display:none;border-radius:8px;">
          </div>
        </div>

        <div class="col-12">
          <label for="siteDesc" class="form-label">About / Description</label>
          <textarea id="siteDesc" class="form-control" rows="3" placeholder="Short description about your site"></textarea>
        </div>

        <div class="col-12 d-flex gap-2">
          <button type="button" class="btn btn-success" id="saveSettings">Save Settings</button>
          <button type="button" class="btn btn-secondary" id="resetSettings">Reset</button>
        </div>
      </form>
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

    // Simple demo data & persistence
    const SAMPLE_PRODUCTS = [
      {id:1,name:'Omega‑3 Softgels',price:19.99,img:'https://images.unsplash.com/photo-1599050751795-5f2cdbd6b316?q=80&w=1200&auto=format&fit=crop',desc:'High-quality fish oil.'},
      {id:2,name:'Vitamin D3 Drops',price:14.5,img:'https://images.unsplash.com/photo-1600172454284-934feca24d5f?q=80&w=1200&auto=format&fit=crop',desc:'Easy-to-use drops.'}
    ];

    const LS_KEY = 'hl_admin_v1';
    const state = JSON.parse(localStorage.getItem(LS_KEY) || 'null') || {products:SAMPLE_PRODUCTS.slice(),blocks:[],orders:[],users:[{id:1,name:'Demo User',email:'demo@example.com'}],settings:{title:'BESZORG',email:'hello@BESZORG.example'}};

    // Utilities
    const byId = id => document.getElementById(id);
    const save = ()=>{ localStorage.setItem(LS_KEY, JSON.stringify(state)); log('Saved state to localStorage'); renderAll(); }
    const log = txt => { const ul = byId('activityLog'); const li = document.createElement('li'); li.className='list-group-item small'; li.textContent = new Date().toLocaleString() + ' — ' + txt; ul.prepend(li); }

    // Renderers
    function renderAll(){
      byId('statProducts').textContent = state.products.length;
      byId('statOrders').textContent = state.orders.length;
      byId('statUsers').textContent = state.users.length;
      byId('statRevenue').textContent = '$' + (state.orders.reduce((s,o)=>s+(o.total||0),0)).toFixed(2);
      renderProductsTable(); renderBlocks(); renderOrders(); renderUsers();
    }

    function renderProductsTable(filter=''){
      const tbody = byId('productsTable'); tbody.innerHTML='';
      const data = state.products.filter(p=> (p.name+ (p.desc||'')).toLowerCase().includes(filter.toLowerCase()));
      data.forEach(p=>{
        const tr = document.createElement('tr');
        tr.innerHTML = `\n          <td><img src="${p.img||'https://via.placeholder.com/64'}" alt="" style="width:64px;height:48px;object-fit:cover;border-radius:8px"></td>\n          <td><strong>${p.name}</strong><div class="small text-muted">${p.desc||''}</div></td>\n          <td>$${Number(p.price).toFixed(2)}</td>\n          <td>\n            <div class="btn-group">\n              <button class="btn btn-sm btn-outline-secondary" data-edit="${p.id}"><i class="bi bi-pencil"></i></button>\n              <button class="btn btn-sm btn-outline-danger" data-delete="${p.id}"><i class="bi bi-trash"></i></button>\n            </div>\n          </td>\n        `;
        tbody.appendChild(tr);
      });
    }

    function renderBlocks(){ const el = byId('blocksList'); el.innerHTML=''; if(!state.blocks.length) el.innerHTML='<div class="text-muted">No blocks created yet.</div>';
      state.blocks.forEach(b=>{
        const d = document.createElement('div'); d.className='d-flex align-items-start gap-2 mb-2';
        d.innerHTML = `\n          <div class="me-2" style="width:64px"><img src="${b.img||'https://via.placeholder.com/64'}" style="width:64px;height:48px;object-fit:cover;border-radius:8px"></div>\n          <div class="me-auto">\n            <div class="fw-semibold">${b.title}</div>\n            <div class="small text-muted">${b.body.slice(0,80)}${b.body.length>80?'...':''}</div>\n          </div>\n          <div>\n            <button class="btn btn-sm btn-outline-secondary" data-edit-block="${b.id}"><i class="bi bi-pencil"></i></button>\n            <button class="btn btn-sm btn-outline-danger" data-del-block="${b.id}"><i class="bi bi-trash"></i></button>\n          </div>\n        `; el.appendChild(d);
      }) }

    function renderOrders(){ const t=byId('ordersTable'); t.innerHTML=''; state.orders.forEach(o=>{ const tr=document.createElement('tr'); tr.innerHTML=`<td>${o.ref}</td><td>${o.buyer||'—'}</td><td>$${(o.total||0).toFixed(2)}</td><td>${o.status||'pending'}</td><td><button class="btn btn-sm btn-outline-success" data-view-order="${o.ref}">View</button></td>`; t.appendChild(tr);} ); if(!state.orders.length) t.innerHTML='<tr><td colspan="5" class="text-muted">No orders yet.</td></tr>' }

    function renderUsers(){ const ul=byId('usersList'); ul.innerHTML=''; state.users.forEach(u=>{ const li=document.createElement('li'); li.className='list-group-item d-flex align-items-center justify-content-between'; li.innerHTML=`<div><strong>${u.name}</strong><div class="small text-muted">${u.email}</div></div><div><button class="btn btn-sm btn-outline-danger" data-del-user="${u.id}">Remove</button></div>`; ul.appendChild(li);} ); }

    // Product form handlers
    const prodForm = byId('productForm'); prodForm.addEventListener('submit', e=>{ e.preventDefault(); const id = Number(byId('prodId').value) || Date.now(); const name=byId('prodName').value.trim(); const price=Number(byId('prodPrice').value)||0; const img=byId('prodImg').value.trim(); const desc=byId('prodDesc').value.trim(); const existing = state.products.find(p=>p.id===id);
      if(existing){ Object.assign(existing,{name,price,img,desc}); log('Updated product: '+name); }
      else { state.products.unshift({id,name,price,img,desc}); log('Added product: '+name); }
      save(); prodForm.reset(); byId('prodId').value='';
    });

    byId('resetForm').addEventListener('click', ()=>{ prodForm.reset(); byId('prodId').value=''; });

    // Table actions
    byId('productsTable').addEventListener('click', e=>{
      const edit = e.target.closest('[data-edit]'); const del = e.target.closest('[data-delete]'); if(edit){ const id=Number(edit.dataset.edit); const p = state.products.find(x=>x.id===id); if(p){ byId('prodId').value=p.id; byId('prodName').value=p.name; byId('prodPrice').value=p.price; byId('prodImg').value=p.img; byId('prodDesc').value=p.desc; window.scrollTo({top:0,behavior:'smooth'}); } }
      if(del){ const id=Number(del.dataset.delete); if(confirm('Delete product?')){ state.products = state.products.filter(x=>x.id!==id); log('Deleted product id '+id); save(); } }
    });

    // Search
    byId('searchProduct').addEventListener('input', e=>renderProductsTable(e.target.value));

    // Bulk
    byId('applyBulk').addEventListener('click', ()=>{
      try{ const arr = JSON.parse(byId('bulkJson').value||'[]'); if(!Array.isArray(arr)) throw 0; arr.forEach(item=>{ if(!item.id) item.id = Date.now() + Math.floor(Math.random()*999); const idx = state.products.findIndex(p=>p.id===item.id); if(idx>=0) state.products[idx] = Object.assign(state.products[idx], item); else state.products.unshift(item); }); log('Applied bulk JSON'); save(); byId('bulkJson').value=''; }
      catch(err){ alert('Invalid JSON'); }
    });

    byId('clearProducts').addEventListener('click', ()=>{ if(confirm('Remove all products?')){ state.products = []; log('Cleared products'); save(); } });

    // Blocks
    byId('saveBlock').addEventListener('click', e=>{ e.preventDefault(); const id=Number(byId('blockId').value) || Date.now(); const t=byId('blockTitle').value.trim(); const b=byId('blockBody').value.trim(); const img=byId('blockImg').value.trim(); if(!t && !b){ alert('Add title or body'); return; } const existing = state.blocks.find(x=>x.id===id); if(existing){ Object.assign(existing,{title:t,body:b,img}); log('Updated block: '+t); } else { state.blocks.unshift({id,title:t,body:b,img}); log('Added block: '+t); } save(); byId('blockForm').reset(); });

    byId('blocksList').addEventListener('click', e=>{ const edit = e.target.closest('[data-edit-block]'); const del = e.target.closest('[data-del-block]'); if(edit){ const b = state.blocks.find(x=>x.id==edit.dataset.editBlock); if(b){ byId('blockId').value=b.id; byId('blockTitle').value=b.title; byId('blockBody').value=b.body; byId('blockImg').value=b.img; window.scrollTo({top:0,behavior:'smooth'}); } }
      if(del){ if(confirm('Delete block?')){ state.blocks = state.blocks.filter(x=>x.id!=del.dataset.delBlock); log('Deleted block'); save(); } }
    });

    // Orders demo: create fake order
    document.getElementById('newProductBtn').addEventListener('click', ()=>{ document.getElementById('prodName').focus(); });
    document.getElementById('exportBtn').addEventListener('click', ()=>{ const blob = new Blob([JSON.stringify(state, null, 2)],{type:'application/json'}); const url = URL.createObjectURL(blob); const a = document.createElement('a'); a.href=url; a.download='hl_admin_export.json'; a.click(); URL.revokeObjectURL(url); log('Exported data'); });

    // Orders & users management (simple demo actions)
    byId('ordersTable').addEventListener('click', e=>{ const v = e.target.closest('[data-view-order]'); if(v){ alert('Order view (demo): '+v.dataset.viewOrder); } });
    byId('usersList').addEventListener('click', e=>{ const del = e.target.closest('[data-del-user]'); if(del){ if(confirm('Remove user?')){ state.users = state.users.filter(u=>u.id!=del.dataset.delUser); log('Removed user id '+del.dataset.delUser); save(); } } });

    // Settings
    byId('saveSettings').addEventListener('click', ()=>{ state.settings.title = byId('siteTitle').value || state.settings.title; state.settings.email = byId('siteEmail').value || state.settings.email; save(); log('Saved settings'); });
    byId('resetSettings').addEventListener('click', ()=>{ byId('siteTitle').value = state.settings.title; byId('siteEmail').value = state.settings.email; });

    // Init sample orders & render
    if(!state.orders.length){ state.orders.push({ref:'ORD'+Math.floor(1000+Math.random()*9000),buyer:'Alice',total:29.9,status:'paid'}); }
    // initial fill settings
    byId('siteTitle').value = state.settings.title; byId('siteEmail').value = state.settings.email;

    // Initial render
    renderAll();

    // Small helper to handle clicks delegated to dynamic elements (blocks table handlers)
    document.body.addEventListener('click', e=>{
      // data-edit-block / data-del-block delegated already via blocksList listener
    });
  </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sari-Sari Store Admin</title>
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .sidebar { width: 260px; height: 100vh; background: #1e293b; color: white; position: fixed; transition: 0.3s; }
        .main-content { margin-left: 260px; padding: 30px; }
        .nav-link { color: #94a3b8; padding: 12px 20px; border-radius: 8px; margin: 5px 15px; display: flex; align-items: center; text-decoration: none; }
        .nav-link:hover, .nav-link.active { background: #334155; color: white; }
        .nav-link i { width: 25px; font-size: 1.1rem; }
        .stat-card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); transition: 0.3s; }
        .stat-card:hover { transform: translateY(-5px); }
        .top-nav { background: white; padding: 15px 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; border-radius: 10px; }
        .logout-btn { background: #fee2e2; color: #ef4444; border: none; padding: 8px 15px; border-radius: 8px; font-weight: 600; }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="p-4 text-center">
        <h4 class="fw-bold m-0"><i class="fas fa-store text-info me-2"></i>SariStore</h4>
        <small class="text-muted">Admin Dashboard</small>
    </div>
    <hr class="mx-3 opacity-25">
    <nav class="mt-3">
        <a href="#" class="nav-link active"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="#" class="nav-link"><i class="fas fa-boxes"></i> Inventory</a>
        <a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i> Sales Tracking</a>
        <a href="#" class="nav-link"><i class="fas fa-users"></i> Customers</a>
        <a href="#" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
    </nav>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="top-nav">
        <h5 class="m-0 fw-semibold text-secondary">Welcome back, <?= session()->get('name') ?>!</h5>
        <a href="<?= base_url('logout') ?>" class="logout-btn text-decoration-none">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                        <i class="fas fa-coins text-primary fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Today's Profit</p>
                        <h4 class="fw-bold mb-0">₱ 1,250</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                        <i class="fas fa-receipt text-success fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Total Sales</p>
                        <h4 class="fw-bold mb-0">48</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                        <i class="fas fa-exclamation-triangle text-warning fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Low Stock Items</p>
                        <h4 class="fw-bold mb-0 text-danger">7</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3">
                        <i class="fas fa-box-open text-info fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Products</p>
                        <h4 class="fw-bold mb-0">124</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="card border-none shadow-sm mt-4 p-4 rounded-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold m-0">Recent Transactions</h5>
            <button class="btn btn-sm btn-outline-primary px-3">View All</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Transaction ID</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#TXN-9021</td>
                        <td>Nescafe 3-in-1 (Pack)</td>
                        <td>Coffee</td>
                        <td>₱ 120.00</td>
                        <td><span class="badge bg-success-subtle text-success px-3">Paid</span></td>
                    </tr>
                    <tr>
                        <td>#TXN-9022</td>
                        <td>Lucky Me Pancit Canton</td>
                        <td>Noodles</td>
                        <td>₱ 15.00</td>
                        <td><span class="badge bg-success-subtle text-success px-3">Paid</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
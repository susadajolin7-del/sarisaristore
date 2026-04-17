<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f7f6; height: 100vh; display: flex; align-items: center; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .btn-primary { background: #6c5ce7; border: none; padding: 12px; border-radius: 10px; }
        .btn-primary:hover { background: #a29bfe; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">Sari-Sari Store</h3>
                    <p class="text-muted">Login to manage your store</p>
                </div>
                <?php if(session()->getFlashdata('msg')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>
                <form action="<?= base_url('login/auth') ?>" method="post">
                    <div class="mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 shadow-sm">Login</button>
                    <p class="mt-3 text-center small">Don't have an account? <a href="<?= base_url('register') ?>">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Sari-Sari Store</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f4f7f6; 
            height: 100vh; 
            display: flex; 
            align-items: center; 
        }
        .card { 
            border: none; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
        }
        .btn-primary { 
            background: #6c5ce7; 
            border: none; 
            padding: 12px; 
            border-radius: 10px; 
        }
        .btn-primary:hover { 
            background: #a29bfe; 
        }
        .alert ul {
            margin-bottom: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">Create Account</h3>
                    <p class="text-muted">Join our Sari-Sari Store system</p>
                </div>

                <!-- --- 1. ERROR MESSAGE SECTION --- -->
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger py-2 small">
                        <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(session()->getFlashdata('msg_error')): ?>
                    <div class="alert alert-danger py-2 small text-center">
                        <?= session()->getFlashdata('msg_error') ?>
                    </div>
                <?php endif; ?>
                <!-- ------------------------------- -->
                
                <form action="<?= base_url('register/store') ?>" method="post">
                    <!-- Security Token for CodeIgniter 4 -->
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <!-- Added old('name') so the user doesn't have to re-type on error -->
                        <input type="text" name="name" class="form-control" placeholder="Juan Dela Cruz" value="<?= old('name') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <!-- Added old('email') -->
                        <input type="email" name="email" class="form-control" placeholder="juan@email.com" value="<?= old('email') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 shadow-sm">Register Now</button>
                    
                    <p class="mt-3 text-center small">
                        Already have an account? <a href="<?= base_url('/') ?>" class="text-decoration-none" style="color: #6c5ce7;">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional but recommended) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
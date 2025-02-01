<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <style>
    /* Memastikan container mengambil tinggi layar penuh */
    .full-height {
      min-height: 100vh;
    }
  </style>
</head>
<body>
  <div class="container-fluid full-height d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <!-- Kolom kiri untuk gambar (hanya tampil pada layar medium ke atas) -->
      <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
        <img src="{{ asset('bg-login2.png') }}" alt="Register Image" class="img-fluid" />
      </div>
      <!-- Kolom kanan untuk form registrasi -->
      <div class="col-md-6">
        <div class="card p-4 shadow-sm">
          <h2 class="text-center mb-4">Register</h2>
          <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="name" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" name="password_confirmation" required />
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-success">Register</button>
            </div>
          </form>
          <p class="mt-3 text-center">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

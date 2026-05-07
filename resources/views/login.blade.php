<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Al-Fazza Bakery</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body class="login-page">

    <div class="login-card">
        <div class="login-header">
            <i class="fa-solid fa-shop icon-shop"></i>
            <h2>Selamat Datang</h2>
            <p>Silakan masuk ke sistem Al-Fazza</p>
        </div>

        @if ($errors->any())
            <div class="error-message">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label><i class="fa-solid fa-envelope"></i> Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email" required>
            </div>
            
            <div class="form-group">
                <label><i class="fa-solid fa-lock"></i> Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
            
            <button type="submit" class="btn-login">
                <i class="fa-solid fa-right-to-bracket" style="margin-right: 5px;"></i> Masuk
            </button>
        </form>
    </div>

</body>
</html>
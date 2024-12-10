<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
</head>

<body>
  <div class="container">
    <h2>Login to Your Account</h2>
    <form method="POST" action="{{ route('login.post') }}">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="email" id="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" id="password" placeholder="Enter your password" required>
      </div>
      <button name='submit' type="submit" class="btn">Login</button>
      <p>Don't have an account? <a href="register">Register here</a>
      </p>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
  @if (count($errors) > 0)
  <input type="hidden" id="error" value="{{ $errors->all()[0] }}">
  <script>
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: document.getElementById('error').value,
    });
  </script>
  @endif
</body>

</html>
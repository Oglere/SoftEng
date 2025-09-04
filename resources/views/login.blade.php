<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Modern Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="{{ url('/login') }}" id="loginForm">
        @csrf
        <div class="input-group">
          <label for="usn">Username (USN)</label>
          <input type="text" id="usn" name="usn" value="{{ old('usn') }}" required>
        </div>

        <div class="input-group">
          <label for="password">Password (Last Name)</label>
          <input type="password" id="password" name="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>

        <div class="options">
          <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
          <label for="remember">Remember me</label>
        </div>

        <button type="submit">Login</button>
      </form>
  </div>

  <script>
    const usernameInput = document.getElementById("usn");
    const passwordInput = document.getElementById("password");
    const rememberMe = document.getElementById("remember");
    const togglePassword = document.getElementById("togglePassword");
    const loginForm = document.getElementById("loginForm");

    // Load saved username if exists
    window.onload = () => {
      const savedUsername = localStorage.getItem("username");
      if (savedUsername) {
        usernameInput.value = savedUsername;
        rememberMe.checked = true;
      }
    };

    // Toggle password visibility
    togglePassword.addEventListener("click", () => {
      const type = passwordInput.type === "password" ? "text" : "password";
      passwordInput.type = type;
      togglePassword.classList.toggle("fa-eye");
      togglePassword.classList.toggle("fa-eye-slash");
    });

    // Demo login check
    loginForm.addEventListener("submit", function(e) {
      e.preventDefault(); // Prevent actual submission (demo only)

      const usn = usernameInput.value.trim();
      const password = passwordInput.value.trim();

      // Example: only accept usn = "admin", password = "admin123"
      if (usn === "admin" && password === "admin123") {
        if (rememberMe.checked) {
          localStorage.setItem("username", usn);
        } else {
          localStorage.removeItem("username");
        }
        alert("✅ Login successful!");
      } else {
        alert("❌ Incorrect USN or Password!");
      }
    });
  </script>
</body>
</html>

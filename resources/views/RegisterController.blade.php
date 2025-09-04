<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #4e54c8, #8f94fb);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
    }
    .register-container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 420px;
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
    .input-group {
      margin-bottom: 18px;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      color: #444;
    }
    input, select {
      width: 100%;
      padding: 12px;
      font-size: 1rem;
      border-radius: 10px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    button {
      width: 100%;
      padding: 14px;
      border: none;
      background: #4e54c8;
      color: white;
      border-radius: 10px;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background: #3b40a4;
    }
    .error {
      text-align: center;
      color: red;
      margin-bottom: 15px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Register</h2>

    @if ($errors->any())
      <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
      @csrf
      <div class="input-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" required>
      </div>

      <div class="input-group">
        <label for="last_name">Last Name (Password)</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}" required>
      </div>

      <div class="input-group">
        <label for="usn">Username (USN)</label>
        <input type="text" name="usn" value="{{ old('usn') }}" required>
      </div>

      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
      </div>

      <div class="input-group">
        <label for="phone_number">Phone</label>
        <input type="text" name="phone_number" value="{{ old('phone_number') }}">
      </div>

      <div class="input-group">
        <label for="role">Role</label>
        <select name="role" required>
          <option value="user" {{ old('role')=='user' ? 'selected' : '' }}>User</option>
          <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
        </select>
      </div>

      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>

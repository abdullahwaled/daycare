<!DOCTYPE html>
<html>
<head>
  <title>Create a New Dad</title>
  <style>
    .card {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      width: 400px;
    }

    .card-header {
      background-color: #007bff;
      color: #fff;
      font-size: 24px;
      font-weight: bold;
      padding: 20px;
      text-align: center;
    }

    .card-body {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      border-radius: 4px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      display: block;
      font-size: 16px;
      padding: 10px;
      width: 100%;
    }

    button[type="submit"] {
      background-color: #007bff;
      border: none;
      border-radius: 4px;
      color: #fff;
      cursor: pointer;
      font-size: 18px;
      font-weight: bold;
      padding: 10px 20px;
      transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
      background-color: #0069d9;
    }
  </style>
</head>
<body>
  <header>
    <div class="card">
      <div class="card-header">
        Create a New Dad
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('auth.dads.store') }}" enctype="multipart/form-data">
          @csrf
          <input type="text" name="name" id="name" placeholder="Dad Name" required>
          <input type="email" name="email" id="email" placeholder="Dad Email" required>
          <input type="password" name="password" id="password" placeholder="Password" required>
          <input type="file" name="image" id="image" accept="image/*">
          <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number">
          <input type="text" name="daycare_id" id="daycare_id" placeholder="Daycare ID" required>
          <button type="submit">Create Dad</button>
        </form>
      </div>
    </div>
  </header>
</body>
</html>

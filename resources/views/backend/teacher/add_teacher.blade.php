
<!DOCTYPE html>
<html>
<head>
  <title>Teacher Dashboard</title>
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
        Create a New Teacher
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('auth.storeTeacher') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" id="name" placeholder="Teacher Name" required>
            <input type="email" name="email" id="email" placeholder="Teacher Email" required>
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <input type="file" name="image" id="image" accept="image/*">
            <input type="text" name="daycare_id" id="daycare_id" placeholder="Daycare ID" required>
            <input type="text" name="facebook" id="facebook" placeholder="Facebook">
            <input type="text" name="twitter" id="twitter" placeholder="Twitter">
            <input type="text" name="instagram" id="instagram" placeholder="Instagram">
            <button type="submit">Create Teacher</button>
        </form>


    </div>
</div>
</body>
</html>





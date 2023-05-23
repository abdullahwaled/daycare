
<!DOCTYPE html>
<html>
<head>
  <title>dad Dashboard</title>
  <style>
    /* Style the header */
    header {
      background-color: #333;
      color: white;
      padding: 10px;
      text-align: center;
    }

    /* Style the navigation menu */
    nav {
      background-color: #f2f2f2;
      overflow: hidden;
    }

    nav a {
      float: left;
      display: block;
      color: #333;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    /* Change the color of links on hover */
    nav a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Style the main content */
    main {
      padding: 20px;
      margin-top: 20px;
      background-color: #f2f2f2;
    }

    /* Style the logout button */
    .logout-button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      float: right;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        text-decoration: none;
        border-radius: 4px;
        margin-top: 20px;
      }
      .button:hover {
        background-color: #0069d9;
        cursor: pointer;
      }
  </style>
</head>
<body>
  <header>
    <h1>dad Dashboard</h1>
  </header>
  <nav>
    <a href="#">Home</a>
    <a href="#">Students</a>
    <a href="#">Assignments</a>
    <a href="#">Grades</a>
    <form action="{{ route('dad.logout') }}" method="POST">
        @csrf
        <button   type="submit" class="logout-button">Logout</button>
	</form>
  </nav>
  <main>
    <p>Welcome to your teacher dashboard.</p>
    <!-- More content here -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


  </main>
</body>
</html>

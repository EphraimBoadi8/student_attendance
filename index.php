<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STUDENTS ATTENDANCE</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="">
    <h3>STUDENTS ATTENDANCE SYSTEM</h3>
    <div class="dropdown">
      <label for="dropdown">Select User</label>
      <select id="dropdown">
        <option value="admin">admin</option>
        <option value="student">student</option>
        <option value="lecturer">lecturer</option>
      </select>
    </div>
    <div class="container">
      <div class="details">
        <label for="">Username</label>
        <input type="text" name="username" id="username">
      </div>
      <div class="details">
        <label for="">Email</label>
        <input type="email" name="email" id="email">
      </div>
      <div class="details">
        <label for="">Password</label>
        <input type="password" name="password" id="password">
      </div>
      <div>
        <button class="btn" onclick="navigate(event)">Submit</button>
      </div>
    </div>
  </form>

  <script>
    function navigate(event) {
      event.preventDefault();

      const userType = document.getElementById("dropdown").value;

      if (userType === "admin") {
        window.location.href = "admin.php";
      } else if (userType === "student") {
        window.location.href = "student.php";
      } else if (userType === "lecturer") {
        window.location.href = "lecturer.php";
      } else {
        alert("Please select a user type");
      }
    }
  </script>
</body>
</html>

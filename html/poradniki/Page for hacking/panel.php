<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: formularz.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Panel</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      background-color: #333;
      color: white;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logout-btn {
      background: none;
      border: none;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    .logout-btn:hover {
      text-decoration: underline;
    }

    .content {
      padding: 20px;
    }
  </style>
</head>
<body>

  <div class="navbar">
    <div>Panel użytkownika</div>
    <a href="logout.php">
      <button class="logout-btn" onclick="logoutBtn()">Wyloguj (<span><?php echo $_SESSION['user']; ?></span>)</button>
    </a>
  </div>

  <div class="content">
    <h1>Witaj na panelu!</h1>
    <p>Tu będą Twoje treści...</p>
  </div>
</body>
</html>

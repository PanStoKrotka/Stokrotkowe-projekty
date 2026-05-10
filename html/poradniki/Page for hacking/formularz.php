<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Logowanie</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 300px;
    }

    h2 {
      text-align: center;
      margin-bottom: 1rem;
    }

    form {
      display: none;
      flex-direction: column;
    }

    form.active {
      display: flex;
    }

    input {
      margin: 0.5rem 0;
      padding: 0.5rem;
      font-size: 1rem;
    }

    button {
      margin-top: 1rem;
      padding: 0.5rem;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .toggle {
      margin-top: 1rem;
      text-align: center;
      color: #007BFF;
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="container">
  <h2 id="form-title">Logowanie</h2>
  <form action="" method="post"></form>
  <!-- Formularz logowania -->
  <form id="login-form" method="GET" class="active" action="formularz.php">
    <input type="text" name="login" placeholder="Login"/>
    <input type="password" name="password" id="password" placeholder="Hasło"/>
    <label style="display: block; margin: 3px 0;">
    <input type="checkbox" id="pokazHaslo"/>
    Pokaż hasło
    </label>
    <button type="submit">Zaloguj się</button>
    <p id="komunikat" style="color: red;"></p>
    <?php 
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "formularz");
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['login'])) {
      // mysqli_report(MYSQLI_REPORT_OFF);
      $login = $_GET['login'];
      $haslo = $_GET['password'];
      $zap = "SELECT id_u FROM users WHERE login = '$login' AND password = '$haslo'";
      $result = mysqli_query($conn, $zap);
      
      if (mysqli_num_rows($result) > 0) {
        echo "Zalogowano pomyślnie!";
        $_SESSION['user'] = $login;
        header("Location: panel.php");
        exit();
      } 
      else {
        echo "Błędny login lub hasło.";
      }
    }
    ?>
  </form>
</div>
<script>
  document.getElementById("pokazHaslo").addEventListener("change", function () {
    const hasloInput = document.getElementById("password");
    hasloInput.type = this.checked ? "text" : "password";
  });
</script>
</body>
</html>

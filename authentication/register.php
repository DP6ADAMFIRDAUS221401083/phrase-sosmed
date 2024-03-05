<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-xB08ZmphTlDm2Wm4zP8yWP+UjsJyC8wYp5aPw1XxIAYfc1iJZI1Fpf9l2pwjdu" crossorigin="anonymous">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #ffc884;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
  }

  .signup-container {
    max-width: 480px;
    background-color: #ffffff;
    border-radius: 30px;
    margin: 20px;
    padding: 40px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .signup-title {
    margin: 0;
  }

  .signup-link {
    margin-top: 5px;
    text-align: center;
  }

  .signup-link a {
    color: #007bff;
    text-decoration: none;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
    font-size: small;
    display: block;
    margin-bottom: 6px;
  }

  .input-group {
    position: relative;
  }

  .input-group-addon {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    padding: 10px 15px;
    background-color: #ffffff;
    border: 1px solid #ced4da;
    border-left: none;
    border-radius: 0 4px 4px 0;
  }

  button {
    border-radius: 4px;
    font-weight: bold;
  }

  button:hover {
    opacity: 0.8;
  }

  .submit-button {
    background-color: #fe9840;
    color: white;
    border: none;
    padding: 10px 0;
    font-weight: bold;
    cursor: pointer;
    width: 100%;
  }

  .submit-button:hover {
    background-color: #fe9840;
    color: #1c172d;
  }
</style>
</head>
<body>
<div class="container signup-container">
  <div class="row mb-5">
    <div class="col-md-12 text-center mb-5">
      <img src="../img/logo.png" alt="Twitter Logo" style="max-width: 60px;">
    </div>
    <div class="col-6">
      <p>Let's make your account,</p>
      <h1 class="signup-title">Sign Up</h1>
    </div>
    <div class="col-6">
      <div class="signup-link">
        <a href="../index.php">Have an account? Sign in</a>
      </div>
    </div>
  </div>
  <form method="post" action="../function/func_register.php">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
            <?php
              session_start();
              if (isset($_SESSION['errorMessage'])) {
                  echo '<p id="usernameError" style="color: red;">' . $_SESSION['errorMessage'] . '</p>';
                  unset($_SESSION['errorMessage']); // untuk menghapus pesan kesalahan setelah ditampilkan
              }
            ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="email">Enter Your Email Address</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="password">Enter Your Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group input-group">
          <button class="submit-button" type="submit">Sign up</button>
        </div>
      </div>
    </div>
  </form>
</div>
</body>
</html>

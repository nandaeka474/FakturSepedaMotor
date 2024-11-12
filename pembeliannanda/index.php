<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link href="https://fonts.cdnfonts.com/css/porter-sans-block" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    @import url("https://fonts.cdnfonts.com/css/porter-sans-block");

    body {
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f1f3fc;
    }

    .container {
      display: flex;
      height: 100px;
      background-color: #ffffff;
      align-items: center;
    }

    nav a {
      padding: 20px 20px;
      margin-left: 100;
      font-size: 28px;
      text-decoration: none;
      color: #0d0c41;
      font-family: "Porter Sans Block", sans-serif;
    }

    nav {
      width: 100%;
      height: 145;
      text-align: left;
    }

    nav h1 {
      margin-top: 10px;
      margin-left: 30px;
    }

    main {
      display: flex;
      justify-content: center;
    }

    .login-section {
      text-align: center;
      height: 100px;
    }

    .login-section h1 {
      font-family: "Poppins", sans-serif;
      font-weight: 700;
      font-style: normal;
      font-size: 26px;
      color: #DA0037;
      margin-bottom: 2px;
      margin-top: 20px;
    }

    .login-section p {
      margin-top: 4px;
      margin-bottom: 20px;
    }

    .login-section h1,
    .login-section p {
      display: block;
    }

    .border-container {
      background-color: #ffffff;
      padding: 30px;
      height: 300px;
      width: 350px;
      border-radius: 24px;
      text-align: left;
    }

    .border-container form input {
      width: calc(100% - 10px);
      border-radius: 50px;
      height: 40px;
      margin-bottom: 15px;
      border: 1px solid #d8d8e4;
      padding-left: 10px;
      font-size: 14px;
    }

    .border-container form label {
      font-family: "Poppins", sans-serif;
      font-weight: 600;
      font-style: normal;
      font-size: 14px;
      color: #0d0c41;
      display: inline-block;
      margin-bottom: 10px;
    }

    .login-button {
      width: calc(100% - 10px);
      border-radius: 50px;
      height: 40px;
      font-family: "Poppins", sans-serif;
      border: none;
      background-color: #DA0037;
      font-size: 14px;
      font-weight: 500;
      color: #ffffff;
      margin-top: 0px;
      margin-bottom: 20px;
      box-shadow: 0px 2px 4px #0d0c41;
      cursor: pointer;
    }

    .cancel-button {
      display: inline-block;
      line-height: 40px;
      text-align: center;
      text-decoration: none;
      font-family: "Poppins", sans-serif;
      width: calc(100% - 10px);
      border-radius: 50px;
      height: 40px;
      border: none;
      color: #ffffff;
      font-size: 14px;
      border: 1px solid #d8d8e4;
      color: black;
      background-color: #ffffff;
      cursor: pointer;
    }

    html {
      scroll-behavior: smooth;
    }

    .logo{
        margin-left: 100px;
    }
  </style>

<body>
  <div class="container">
    <nav>
        <img src="images/logo.png" class="logo" alt="logo yamaha" style="width: 150px;" srcset="">
    </nav>
  </div>
  <main>
    <div class="login-section">
      <h1>Login Account</h1>
      <p>Masukkan email dan password Anda untuk login</p>
      <div class="border-container">
        <form action="home.php" method="get">
          <label for="email">Email Address</label><br />
          <input type="email" id="email" name="email" /><br />
          <label for="password">Password</label><br />
          <input type="password" id="password" name="password" />
          <br /><br />
          <button type="submit" class="login-button">Login</button>
          <a href="#" class="cancel-button">Cancel</a>
        </form>
      </div>
    </div>
  </main>
</body>

</html>
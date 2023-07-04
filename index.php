

<!DOCTYPE html>
<html>
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div>
  <form class="form" id="form">
    <input type="button" onClick="myFunctionR()" value="Regisztráció" class="button" /><br>
    <input type="button" onClick="myFunctionB()" value="Bejelentkezés" class="button" />
    
  </form>
  
  
    
  </div>
  <script>
      function myFunctionR() {
        window.location.href = "registration_page.php";
      }
      function myFunctionB() {
        window.location.href = "login_page.php";
      }
    
  </script>
  

          
  
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div>
  <p id="fejlec">Regisztráció</p><br>
    <form class="form" id="form" action="registration_backend.php" method="POST">
    <label calss="label" for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label calss="label" for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label calss="label" for="password">Password:</label><br>
    <input type="password" id="password" name="password" onInput="calculateLength()"><br>


    <label calss="label" for="password2">Password again:</label><br>
    <input type="password" id="password2" name="password2"><br>


    <input type="submit" value="Submit" id="submitgomb" class="button">
      <p id="output"></p><br>
      <div class="circle" id="circle">
      </div>
    </form>
    
  </div>
<?php
  
    
?>

  <script>
    function calculateLength() {  
      var input = document.getElementById("password").value;
      var length = input.length;
      document.getElementById("output").innerHTML = length;
      var circle = document.getElementById("circle").innerHTML;
      var deg = (length/8)*360;
      document.querySelector('.circle').style.setProperty('--a',`${deg}deg`);
    }
    document.getElementById("form").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevents the default form submission

      // Play your animation here
      document.querySelector('.circle').style.width = "2000px";
      document.querySelector('.circle').style.height = "2000px";
      document.getElementById("fejlec").style.top = "-100px";
      //document.querySelector('.circle').style.position = "fixed";
      document.getElementById("form").style.opacity = "0";

      //window.location.href = "process_form.php";
      
      // Wait for the animation to finish (adjust the delay as needed)
      setTimeout(function() {
        // Proceed to the next page
        //window.location.href = "test.php";
        document.getElementById("form").submit();
      }, 1000); // Delay of 1 seconds (adjust as needed)
    });
  </script>
  
</body>
</html>

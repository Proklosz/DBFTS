




<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div>
  <p id="fejlec">Bejelentkezés</p><br>
    <form class="form" id="form" action="login_backend.php" method="POST">
      <img src="public/logo.webp" id="logo" width="300px" height="300px">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" onInput="calculateLength()"  ><br>
      <input type="submit" value="Submit" id="submitgomb" class="button">
      <p id="output"></p><br>
      <div class="circle" id="circle">
      </div>
    </form>
    
  </div>
  
  

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
      document.querySelector('.circle').style.width = "120000px";
      document.querySelector('.circle').style.height = "120000px";
      document.getElementById("fejlec").style.top = "-100px";
      //document.querySelector('.circle').style.position = "fixed";
      document.getElementById("form").style.opacity = "0";


      // Wait for the animation to finish (adjust the delay as needed)
      setTimeout(function() {
        // Proceed to the next page
        document.getElementById("form").submit();
        //window.location.href = "login_backend.php";
      }, 1000); // Delay of 1 seconds (adjust as needed)
    });
  </script>
          
  
</body>
</html>

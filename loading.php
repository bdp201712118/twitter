<!DOCTYPE html>
<html>
<head>
<title>Login</title>
        <link rel="icon" type="image/png" href="images/twitter.png"/>
        <link rel="stylesheet" href="css/myStyle.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
}
</style>
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<!-- <div style="display:none;" id="myDiv" >
  <h2>Tada!</h2>
  <p>Some text in my newly loaded page..</p>
</div> -->

<div id="myDiv" class="row">
            <div class="box">
                <form action="./controller.php" method='post'>
                    <div class="form-group">
                        <h3>Twitter-Timeline Challenge</h3>
                        <button type="submit" name="login" class="loginButton width25">
                        <i class="fab fa-twitter"></i> Connect with Twitter
                         </button>
                    </div>
                </form>        
            </div>
   </div> 

<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

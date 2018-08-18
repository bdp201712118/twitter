<!DOCTYPE html>
<html>
<head>
<title>Twitter Timeline challenge</title>
<link rel="icon" type="image/png" href="images/twitter.png"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./slick/slick.css">
<link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.js"></script>
<script src="js/myScript.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" href="css/myView.css">

<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home"><i class="fab fa-twitter"></i></a>
  <a href="#" id="download" class="download">Download Tweet&nbsp<i class="fas fa-file-download"></i></a>
  <a href="controller.php?logout=true" class="logout">LogOut &nbsp<i class="fas fa-sign-out-alt"></i></a>
  <div class="search-container" style="float:left;">
    <form method="post" action="controller.php">
      <input type="text" class="search_follower search-box" placeholder="Download Follower" name="key" id="search-box" style="display: inline-block;" />
      <button type="submit" id="downloadFollower" name="search_public_user" class="download" style="display: inline-block;"><i class="fas fa-file-download"></i></button> 
      <!-- <div id="search1"></div> -->
    </form>
  </div>
           
</div>

<div class="row">
    <div class="width20">
      <div class="user_detail">
        <div class="user_image">
          <img id="user_pic" src="" style="border-radius: 45%" />
        </div>
        <div class="user_name">
          <h4 id="name_user"></h4>
        </div>
      </div>
      <div></div>
      <div class="width100">
				<form>
					<input type="text" class="search_follower" placeholder="Search your follower" id="searchbox" name="followers_search" autocomplete="off" />
          <div></div>
      	</form>
				</div>
				<div class="width100" id="search"></div>
					<div class="width100">
						<div id="hr_line"></div>
						<br />
					</div>
				<div id="followers"></div>
    </div>

   <div class="width75">
	    <center>
        <section class="vertical-center-2 slider tweetSlide">
          <div>
       
          </div>
        </section>
			</center>
        </div> 

</div>



<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>Choose your format</h3><hr>
    <div class="dropdown">
      <button class="dropbtn">Select format</button>
      <div class="dropdown-content">
        <a role="menuitem" tabindex="-1" class="download"  href="./controller.php?download=true&format=google-spread-sheet">Google SpreadSheet</a>
        <a role="menuitem" tabindex="-1" class="download"  href="./controller.php?download=true&format=json">Json</a>
        <a role="menuitem" tabindex="-1" class="download"  href="./controller.php?download=true&format=csv">CSV</a>
        <!-- <a role="menuitem" tabindex="-1" class="download"  href="./controller.php?download=true&format=xls">XLS</a> -->
      </div>
    </div>
  </div>
</div>

<!-- <div id="myModalFollower" class="modal"> -->
  <!-- Modal content -->
  <!-- <div class="modal-content">
    <span class="close">&times;</span>
    <h3>Download Followers</h3><hr>
    <div class="dropdown">
      <button class="dropbtn">Select format</button>
      <div class="dropdown-content">
        <a role="menuitem" tabindex="-1" class="download" data-value='google-spreadhseet' href="./controller.php?download=true&type=google-spread-sheet">Google SpreadSheet</a>
        <a role="menuitem" tabindex="-1" class="download" data-value='xml'  href="./controller.php?download=true&type=xml">XML</a>
        <a role="menuitem" tabindex="-1" class="download" data-value='json'  href="./controller.php?download=true&type=json">Json</a>
        <a role="menuitem" tabindex="-1" class="download" data-value='xls'  href="./controller.php?download=true&type=xls">XLS</a>
        <a role="menuitem" tabindex="-1" class="download" data-value='csv'  href="./controller.php?download=true&type=csv">CSV</a>
      </div>
    </div>
  </div>
</div> -->

  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
 

<script>
    // open the download tweet modal 
    document.getElementById("download").onclick = function() {
        document.getElementById("myModal").style.display = "block";
    }
    // close the download tweet modal
    document.getElementsByClassName("close")[0].onclick = function() {
        document.getElementById("myModal").style.display = "none";
    }
    // open the download  modal 
    //  document.getElementById("downloadFollower").onclick = function() {
    //     document.getElementById("myModalFollower").style.display = "block";
    // }
    // // close the download tweet modal
    // document.getElementsByClassName("closeFollower")[0].onclick = function() {
    //     document.getElementById("myModalFollower").style.display = "none";
    // }
    // to anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal")) {
            document.getElementById("myModal").style.display = "none";
        }
    }
</script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script src="js/auto.js"></script>
</html>

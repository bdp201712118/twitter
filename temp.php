<!DOCTYPE html>
<html>
<head>
<title>Twitter Timeline challenge</title>
<link rel="icon" type="image/png" href="images/twitter.png"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./slick/slick.css">
<link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.js"></script>
<script src="js/test.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<!-- <script src="js/jquery.bxslider.js"></script> -->
<style>
    * {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

 .topnav .logout{
      float: right;
      display: block;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
  }

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {

}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

.row{
    display: block;
    width: 100%;
    height: 70%;
}

.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    padding-top: 100px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 25%;
}

.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

@media screen and (max-width: 600px) {

  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: center;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
  .download {
    float: left;
  }
  .row .width75 {
  width: 100%;
}
  .row .width20 {
  width: 100%;
}
  .user_image {
  width: 100%;
  display: inline;
  float: left;
  padding-left: 27px;
  }
  .user_name {
    width: 100%; 
  float: left;
  padding-left: 27px;
}
.user_detail {
  width: 100%;
}
.test {
  width: 100%;
}

}

.slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }

    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }

.dropbtn {
    background-color: #2196F3;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #2196F3;
}

.header {
  display: inline-block;
  float: right ;
}

.user_detail {
  width: 100%;
}

.user_image {
  width: 40%;
  display: inline;
  float: left;
  padding-left: 27px;
}

.user_name {
  width: 60%; 
  float: left;
  padding-left: 27px;
}

.followers {
  padding-top: 10px;
  width: 25%;
}

.test {
    width: 25%;
}

#name_user {
  width: 100%;
}

.width100 {
    width: 100%;
}

.width75 {
    width: 75%;
    float: right;
}

.width20 {
    width: 20%;
    float: left;
    padding-left: 23px;
    padding-top: 5px;
}

.search_follower {
    height: 35px;
    padding: 6px 12px;
    font-size: 14px;
    border: 1px solid #ccc;
    display: block;
    border-radius: 4px;
}

</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home"><i class="fab fa-twitter"></i></a>
  <!-- <a href="#" id="download" class="download">Download Tweet&nbsp<i class="fas fa-file-download"></i></a> -->
  <a href="#" id="download" class="download">Download Tweet&nbsp<i class="fas fa-file-download"></i></a>
  <a href="#" id="downloadFollower" class="download">Download Follower&nbsp<i class="fas fa-file-download"></i></a>
  <a href="controller.php?logout=true" class="logout">LogOut &nbsp<i class="fas fa-sign-out-alt"></i></a>
  <div class="search-container" style="float:left;">
    <form>
      <!-- <input type="text" placeholder="Search.." name="search"> -->
      <input type="text" class="search_follower" placeholder="Download Follower" id="searchbox1" autocomplete="off" />
      <div id="search1"></div>
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
            Loading
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
        <a role="menuitem" tabindex="-1" class="download" data-value='google-spreadhseet' href="./controller.php?download=true&type=google-spread-sheet">Google SpreadSheet</a>
        <a role="menuitem" tabindex="-1" class="download" data-value='xml'  href="./controller.php?download=true&type=xml">XML</a>
        <a role="menuitem" tabindex="-1" class="download" data-value='json'  href="./controller.php?download=true&type=json">Json</a>
        <a role="menuitem" tabindex="-1" class="download" data-value='xls'  href="./controller.php?download=true&type=xls">XLS</a>
        <a role="menuitem" tabindex="-1" class="download" data-value='csv'  href="./controller.php?download=true&type=csv">CSV</a>
      </div>
    </div>
  </div>
</div>

<div id="myModalFollower" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
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
</div>

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
     document.getElementById("downloadFollower").onclick = function() {
        document.getElementById("myModalFollower").style.display = "block";
    }
    // close the download tweet modal
    document.getElementsByClassName("closeFollower")[0].onclick = function() {
        document.getElementById("myModalFollower").style.display = "none";
    }
    // to anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal")) {
            document.getElementById("myModal").style.display = "none";
        }
    }
</script>
</html>

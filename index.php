<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
        <link rel="icon" type="image/png" href="images/twitter.png"/>
        <link rel="stylesheet" href="css/style.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <style>
             body {
                 background-color: lightyellow;
             }

     h3{
    font-family: inherit;
    font-weight: 500;
    font-size: 24px;
    margin-top: 20px;
    margin-bottom: 10px;
    line-height: 1.1;
    color: inherit;
}

            .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
}

     div.form-group{
        margin-left: 15%;
        margin-top: 100px;
    }

    @media only screen and (min-width: 600px) {

    .box{
            margin-left: 150px;
        }
       
        .row {
    margin-right: -15px;
    margin-left: -15px;
    margin-top: 100px;
    display: block;
    width: 100%;
    height: 70%;
} 

h3{
    font-family: inherit;
    font-weight: 500;
    font-size: 24px;
    margin-top: 20px;
    margin-bottom: 10px;
    line-height: 1.1;
    color: inherit;
}

            .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
}

}

        </style>
    </head>
    <body>
        <div class="row" id="row">
            <div class="box">
                <form action="./controller.php" method='post'>
                    <div class="form-group">
                        <h3>Twitter-Timeline Challenge</h3>
                        <button class="btn col-md-3" style="background-color: #2795e9;    color: #FFFFFF;" type="submit" name="login" class="btn btn-primary">
                        <i class="fab fa-twitter"></i> Connect with Twitter
                         </button>
                    </div>
                </form>        
            </div>
        </div>
    </body>    
</html>
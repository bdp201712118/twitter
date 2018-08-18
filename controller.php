<?php
    session_start();
    require './model.php';
    $model = new Model();
    
    // login
    if( isset($_POST['login']) ) {
        $model->connection();
    }

    // redirect user back to index page
    if ( isset($_REQUEST['oauth_verifier'], $_REQUEST['oauth_token']) ) {
        $model->callback();
    }

    // get follower detail
    if(isset($_GET['followers']) ) {
        $id = $_GET['usr_id'];
        $model->getFollowerDetail($id);
    }

    // get detail of user
    if( isset($_GET['fetchFollowers']) ) {
        $screen_name = $_GET['fetchFollowers'];
        $model->getFollowers($screen_name);
    }

    // get detail of logged in user
    if( isset($_GET['userdata']) && $_GET['userdata']==true ) {
        $model->getLoggedInUserDetail();
    }

    // download tweet
    if( isset($_GET['download']) && $_GET['download']==true ) {
        $type=$_GET['type'];
        switch ($type) {
            case "csv":
                $model->downloadCSV();
                break;
            case "xls":
                $model->downloadXLS();
                break;
            case "json":
                $model->downloadJSON();
                break;
            case "google-spread-sheet":
                $_SESSION['user-tweets'] = $model->uploadGoogleDrive();
                header('location:lib\google-drive-api\index.php');
                break;
        }
    }
       
    if( isset($_POST['search_public_user']) ) {
        $key = $_POST['key'];
        $model->downloadPublicUserFollowers($key);
        header('location: view.php');
    }  

    if( isset($_GET['autosearch']) && $_GET['autosearch']==true ) {
        $model->searchfun();
    }

    // logout
    if( isset($_GET['logout']) && $_GET['logout']==true ) {
        $model->logout();
    }
?>
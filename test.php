<?php
    require "./lib/twitteroauth/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;
    include('config.php');
    
    class Model {
        
        // connect using twitter
        public function connection() {
            if (!isset($_SESSION['access_token'])) {
                $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
                $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
                $_SESSION['oauth_token'] = $request_token['oauth_token'];
                $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
                $url = $connection->url('oauth/authorize', array('oauth_token' => $_SESSION['oauth_token']));
                header('location:' . $url);
            } 
            else {
                header('Location: ./view.php');
            }
        }
    
        // redirect user back to index page
        public function callback(){
            $request_token = [];
            $request_token['oauth_token'] = $_REQUEST['oauth_token'];
            $request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
            $access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
            $_SESSION['access_token'] = $access_token;
            header('Location: ./view.php');
        }

        // To get connection from access_token
        public function getConnection() {
            $access_token = $_SESSION['access_token'];
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
            return $connection;
        }

        // get current logged in user
        public function getUser($connection) {
            $user = $connection->get("account/verify_credentials");
            return $user;
        }

        // get 10 tweet of user
        public function getUserTweets($screen_name) {
            $connection = $this->getConnection();
            $tweets = $connection->get("statuses/user_timeline",["count" => 10, "exclude_replies" => true,"screen_name" => $screen_name]);
            foreach( $tweets as $val ) {
                $t[] = array(
                    'text' => $val->text
                );
            }
            if( count($tweets) == 0 )
                $t[] = array(
                    'text' => 'No Tweets Found'
                );
            return $t;
        }

        // get tweet of logged in user
        public function getUserAllTweets($screen_name) {
            $connection = $this->getConnection();
            $tweets = $connection->get("statuses/user_timeline",["count" => 200, "exclude_replies" => true,"include_rts"=>true,"screen_name" => $screen_name]);
            if( count($tweets) == 1 ) {
                $user_tweets[] = 'Soory, No Tweets Found';
                return $user_tweets;
            }
            $totalTweets[] = $tweets;
            $page = 0;
            for ($count = 200; $count <= 3200; $count += 200) { 
                $max = count($totalTweets[$page]) - 1;
                $tweets = $connection->get('statuses/user_timeline', ["count" => 200, "exclude_replies" => true,"include_rts"=>true,"screen_name" => $screen_name, 'max_id' => $totalTweets[$page][$max]->id_str]);
                if( count($tweets) == 1 ) {
                    break;
                }
                $totalTweets[] = $tweets;
                $page += 1;
            }
            $start = 1;
            $index = 0;
            foreach ($totalTweets as $page) {
                foreach ($page as $key) {
                    $user_tweets[$index++] = $key->text;
                    $start++;
                }
            }
            return $user_tweets;
        }

        // get follower of logged in user
        public function getFollowers($screen_name) {
            $connection = $this->getConnection();
            $next = -1;
            $max = 0;
            while( $next != 0 ) {
                $friends = $connection->get("followers/list", ["screen_name"=>$screen_name,"next_cursor"=>$next]);
                $followers[] = $friends;
                $next = $friends->next_cursor;
                if($max==0)
                    break;
                $max++;
            }
            foreach( $followers as $val ) {
                foreach( $val->users as $usr ) {
                    $f[] = array(
                        'name' => $usr->name,
                        'screen_name' => $usr->screen_name,
                        'propic' => $usr->profile_image_url_https
                    );
                }
            }
            $json = array(
                'followers' => $f
            );
            echo json_encode($json);
        }

        // get detail of user
        public function getFollowerDetail($id) {
            $connection = $this->getConnection();
            $user = $connection->get("users/show",['screen_name'=>$id]);
            $name = $user->name;
            $propic = $user->profile_image_url_https;
            $screen_name = $user->screen_name;
            $tweets = $this->getUserTweets($screen_name);
            $res = array(
                'name' => $name,
                'propic' => $propic,
                'tweets' => $tweets
            );
            $json = json_encode($res);
            echo $json;
        }

        // get detail of logged in user
        public function getLoggedInUserDetail() {
            $connection = $this->getConnection();
            $user = $this->getUser($connection);
            $tweets = $this->getUserTweets($user->screen_name);
            $screen_name = $user->screen_name;
            $res = array(
                'id' => $user->id,
                'name' => $user->name,
                'screen_name' => $user->screen_name,
                'propic' => $user->profile_image_url_https,
                'tweets' => $tweets,
            );
            $json = json_encode($res);
            echo $json;
        }
        
		// download tweet in csv format
        public function downloadCSV() {
            $connection = $this->getConnection();
            $user = $this->getUser($connection);
            $tweets[] = $this->getUserAllTweets($user->screen_name);
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename=tweets.csv");
            header("Pragma: no-cache");
            header("Expires: 0");
            $count = count($tweets);
            for($i=0;$i<$count;$i++) {
                $c = count($tweets[$i]);
                for($j=0;$j<$c;$j++) {
                    echo $tweets[$i][$j].' , ' ;
                }
            }
        }
				        
        // download tweet in xls format
        public function downloadXLS() {
            session_start();
            $menu = $_SESSION['my'];
            $data = array();
            foreach ($menu as $key => $value) {
                $data[$key]['number'] = $key + 1;
                $result = preg_replace("/[^a-zA-Z0-9 # @ $ ( ) &  ? _: . \/ ]+/", " ", html_entity_decode($value[1], ENT_QUOTES));
                $data[$key]['tweet'] = str_replace(',', ' ', $result);
        }
        
        // download tweet in json format
        public function downloadJSON() {
            $connection = $this->getConnection();
            $user = $this->getUser($connection);
            $tweets[] = $this->getUserAllTweets($user->screen_name);
            header('Content-disposition: attachment; filename=tweets.json');
            header('Content-type: application/json');
            header("Pragma: no-cache");
            header("Expires: 0");
            $arr = array(
                'tweets' => $tweets[0]
            );
            $arr = json_encode($arr);
            print_r($arr);
        }
       
        // upload spreedsheet to google drive
        public function uploadGoogleDrive() {
            $connection = $this->getConnection();
            $user = $this->getUser($connection);
            $tweets = $this->getUserAllTweets($user->screen_name);
            return $tweets;
        }
       
        // logout
        public function logout() {
            session_unset();
            session_destroy();
            header("location:http://twitter.alampatawebsolution.a2hosted.com");
            exit();
        }
    }
?>
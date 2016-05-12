<?php 
$CONSUMER_KEY = '';
$CONSUMER_SECRET = '';
$ACCESS_TOKEN = '';
$ACCESS_TOKEN_SECRET = '';

require_once ('codebird.php');
require_once ('muter_class.php');
\Codebird\Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
$cb = \Codebird\Codebird::getInstance();
$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET); 
     
/**
* Settings
*/
    if ($_GET['next_cursor']) $params['cursor'] = $_GET['next_cursor'];
    if ($_GET['page']) $page = $_GET['page'] + 1;
    else $page = 1; 
    
    $api = 'followers/list';
    $params['count'] = 50;
    $params['skip_status'] = 1;
    $followers = (array )$cb->$api($params); 

/**
* ForEach User 
*/

    foreach ($followers['users'] as $user) {   
        $muter = new Muter($user);   
        $muter->lang()->background()->showBad()->showGood(); 
            if ($muter->muteMe == true){
                $follow_api = 'mutes_users/create';
                $follow_params['user_id'] = $user->id;
                $follow_data = (array )$cb->$follow_api($follow_params);
            } else {                             
                $follow_api = 'mutes_users/destroy';
                $follow_params['user_id'] = $user->id;
                $follow_data = (array )$cb->$follow_api($follow_params);  
            } 
        $output .= $muter->returnString;
        $i++;
    }
     

/**
* Redirect
*/
    if ($followers['next_cursor']) {  
        header("refresh:50;url=muter.php?page=".$page."&next_cursor=" . $followers['next_cursor'] . "&page=".$page); 
        echo '<hr><h4> Remaining '.$followers['rate']->remaining.'</h4><hr>'.$output.'<pre>';    
    } else {
        echo 'No more next';
    }
    
 
?> 

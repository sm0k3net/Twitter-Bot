<?php

require_once '/var/www/html/ward/includes/TwitterAPIExchange.php';
require_once '/var/www/html/ward/includes/conn.php';
ini_set('display_errors', 1);

$settings = array(
    'oauth_access_token' => "YOUR_ACCESS_TOKEN",
    'oauth_access_token_secret' => "YOUR_SECRET_KEY",
    'consumer_key' => "YOUR_CONSUMER_KEY",
    'consumer_secret' => "YOUR_CONSUMER_SECRET"
);




$get_config = mysql_query("SELECT * FROM config");
while($row_config = mysql_fetch_array($get_config)) {
    $query = $row_config['query']; $count = $row_config['count']; $type = $row_config['type'];
}

$var = $_POST['data'];
$query = str_replace(' ', '+', $query);

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q='.$query.'&result_type='.$type.'&count='.$count;
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$data = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();

$response = json_decode($data);

$raw_data = $response->statuses;

$pattern_1 = "/(?:^|\s)(\#\w+)/";  //parse only hashtags
$pattern_2 = "/(\s+sciencesoft\s+|\s+ScienceSoft\s+|\s+scnsoft\s+|\s+ScnSoft\s+|\s+Sciencesoft\s+|\s+@ScienceSoft\s+|@ScienceSoft|#ScienceSoft|#sciencesoft|#scnsoft|scnsoft)/";  //parse by specific words

$email_config = mysql_query("SELECT * FROM config");
$get_email_conf = mysql_fetch_row($email_config);
$email_status = $get_email_conf[5];


foreach($raw_data as $i) {
    $a = $i->text;

    preg_match_all($pattern_2, $a, $matches);


   foreach($matches[1] as $hash) {


        $hash = trim($hash);
        $txt = mysql_real_escape_string($i->text);

        $check_duplicates = mysql_query("SELECT * FROM scnsoft WHERE user = '{$i->user->screen_name}' AND message = '{$txt}' AND keywords = '{$hash}'");
        while($row_duplicates = mysql_fetch_array($check_duplicates)) {
            $d_user = $row_duplicates['user']; $d_message = $row_duplicates['message']; $d_keywords = $row_duplicates['keywords'];
        }
  

        if($hash && $d_user != $i->user->screen_name && $d_message != $i->text && $d_keywords != $hash) {
                    echo "<li><b>Criteria:</b> {$hash} | <b>User:</b> <a href='https://twitter.com/{$i->user->screen_name}' target=_blank>{$i->user->screen_name}</a>: <b>Tweet:</b> {$i->text} <b>Date:</b> {$i->created_at} | {$i->id} | {$i->user->entities->url->urls[0]->expanded_url}</li>";
            
        $store_data = mysql_query("INSERT INTO scnsoft (user, message, status_id, urls, keywords, twitter_date) VALUES ('{$i->user->screen_name}', '{$txt}', '{$i->id}', '{$i->user->entities->url->urls[0]->expanded_url}', '{$hash}', '{$i->created_at}')");

        if($email_status == 1) {
            $find_sender = $get_email_conf[6];
            $send_mail = shell_exec('echo "['.$i->created_at.'] NEW ALERT: '.$i->user->screen_name.' tweeted \"'.$txt.'\" - https://twitter.com/'.$i->user->screen_name.'/status/'.$i->id.' about '.$hash.', check status at http://10.10.8.150/ward/" | sendmail -f sentryward@yourdomain.com '.$find_sender);
        }


    }

    }
}


?>
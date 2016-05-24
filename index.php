<br />

<form action="" method="post">
    <input type="text" name="data" value="" placeholder="@user OR #tag OR from:username" />
    <input type="submit" value="Get Data!" />  | <i>Here need to input username, hashtags for search or user's name tweets need to feed</i>
</form>

<br /><hr />

<?php
ini_set('display_errors', 0);
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => " ",
    'oauth_access_token_secret' => " ",
    'consumer_key' => " ",
    'consumer_secret' => " "
);


$var = $_POST['data'];
$var = str_replace(' ', '+', $var);

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q='.$var.'&result_type=mixed&count=100';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$data = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();

$response = json_decode($data);

$raw_data = $response->statuses;

$pattern_1 = "/(?:^|\s)(\#\w+)/";  //parse only hashtags
$pattern_2 = "/(\s+your\s+|\s+words\s+|\s+#here\s+|@canbe)/";  //parse by specific words

foreach($raw_data as $i) {
    $a = $i->text;

    preg_match_all($pattern_2, $a, $matches);

    foreach($matches[1] as $hash) {
        echo "<li><b>Criteria:</b> {$hash} | <b>User:</b> <a href='https://twitter.com/{$i->user->screen_name}' target=_blank>{$i->user->screen_name}</a>: <b>Tweet:</b> {$i->text} <b>Date:</b> {$i->created_at}</li>";

    }
}


echo "<ol>";

foreach($raw_data as $item => $tweet) {

    echo "<pre><li><b><a href='https://twitter.com/{$tweet->user->screen_name}' target=_blank>{$tweet->user->screen_name}</a>:</b> {$tweet->text} - [<i>{$tweet->created_at}</i>] | <a href='{$tweet->user->entities->url->urls[0]->expanded_url}' target=_blank>{$tweet->user->entities->url->urls[0]->expanded_url}</a> | <a href='{$tweet->user->entities->url->urls[0]->url}' target=_blank>{$tweet->user->entities->url->urls[0]->url}</a> | {$tweet->entities->hashtags[0]->text}</li></pre>";

}



echo "</ol>";
?>

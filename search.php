<?php
require_once 'includes/header.php';
require_once 'includes/conn.php';
?>

<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">

<h3 style="color: #3399f3;">SentryWard <small> система мониторинга упоминания названия компании в социальной сети Twitter.</small></h3>
<hr />
</div>
<div class="col-lg-8 col-lg-offset-1">
  <h2>Поиск по базе данных</h2>
  <p><b>Доступные ключевые слова:</b> <?php 
$find_keywords = mysql_query("SELECT DISTINCT(keywords) FROM scnsoft");
while($row_keywords = mysql_fetch_array($find_keywords)) {
  $keywords = $row_keywords['keywords'];
  echo $keywords." | ";
}
   ?></p>
  <form action="search.php" method="post" role="form">
    <input name="search-query" type="text" class="form-control" value="" placeholder="прим.: #ScienceSoft или sciencesoft или @ScienceSoft" />
    <input type="submit" value="Найти" class="form-control" />
  </form>
<hr />
<?php

$keyword = $_POST['search-query'];
if(isset($keyword)) {

  echo "<table class='table table-bordered'>";
  echo "<thead><tr><th>Пользователь</th><th>Сообщение</th><th>Ссылки</th><th>Ключевые слова</th><th>Дата твитта</th><th>Дата добавления</th></tr></thead>";
  echo "<tbody>";

$search_query = mysql_query("SELECT * FROM scnsoft WHERE keywords = '$keyword' ORDER BY id desc");
while($row_query = mysql_fetch_array($search_query)) {
  $list_user = $row_query['user']; $list_message = $row_query['message']; $list_status_id = $row_query['status_id']; $list_urls = $row_query['urls'];
  $list_keywords = $row_query['keywords']; $list_tweet_date = $row_query['twitter_date']; $list_date = $row_query['date'];

  echo "<tr><td><a href='https://twitter.com/".$list_user."' target=_blank rel='noreferrer'>".$list_user."</a></td><td><a href='https://twitter.com/".$list_status_id."' target=_blank rel='noreferrer'>".$list_message."</a></td><td>".$list_urls."</td><td>".$list_keywords."</td><td>".$list_tweet_date."</td><td>".$list_date."</td></tr>";

  }

  echo "</tbody>";
  echo "</table>";

}

?>

</div>
</div>


<div class="container-fluid">
  <div class="footer">
    <div class="col-md-6 col-md-offset-4">
            <div class="inner">
              &copy; <a href="№" title="#">Murashka Uladzislau</a>, 2016&nbsp;
            </div>
    </div>
  </div>
</div>
  </body>
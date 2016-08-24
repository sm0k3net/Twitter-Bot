<?php 
ini_set('display_errors', 0);
require_once 'includes/conn.php';
require_once 'includes/header.php';

//STATS , CONFIGS & UPDATES
$stats = mysql_query("SELECT COUNT(id) FROM scnsoft");
$total_results = mysql_fetch_row($stats);
$unique_keywords = mysql_query("SELECT COUNT(DISTINCT(keywords)) FROM scnsoft");
$total_keywords = mysql_fetch_row($unique_keywords);

$get_config = mysql_query("SELECT * FROM config");
$config_query = mysql_fetch_row($get_config);

//OLD variable
//$get_updates = mysql_query("SELECT * FROM scnsoft ORDER BY id desc LIMIT 5");
//NEW variable
$get_listing = $config_query[4];
$get_updates = mysql_query("SELECT * FROM scnsoft ORDER BY id desc LIMIT $get_listing");

?>


<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">

<h3 style="color: #3399f3;">SentryWard <small> система мониторинга упоминания названия компании в социальной сети Twitter.</small></h3>
<hr />
</div>
<div class="col-lg-4 col-lg-offset-1">
  <h2>Статистика данных</h2>
  <p><?php echo "<b>Всего записей в базе:</b> " . $total_results[0]; ?></p>
  <p><?php echo "<b>Уникальных ключевых слов найдено:</b> " . $total_keywords[0]; ?></p>

</div>
<div class="col-lg-4">
  <h2>Текущая конфигурация</h2>
  <p><?php echo "<b>Поисковый запрос:</b> " . $config_query[1]; ?></p>
  <p><?php echo "<b>Тип сбора данных:</b> " . $config_query[2]; ?></p>
  <p><?php echo "<b>Количество записей:</b> " . $config_query[3]; ?></p>
</div>
<div class="col-lg-8 col-lg-offset-1">
  <h2>Последние обновления <small>[ <?php echo $get_listing; ?> ]</small></h2>
  <table class="table table-bordered">
    <thead><tr><th>Пользователь</th><th>Сообщение</th><th>Ключевое слово</th><th>Дата добавления</th></tr></thead>
    <tbody><?php
  while($row_updates = mysql_fetch_array($get_updates)) {
    $show_user = $row_updates['user'];
    $show_message = $row_updates['message'];
    $show_id = $row_updates['status_id'];
    $show_keywords = $row_updates['keywords'];
    $show_date = $row_updates['date'];
    echo "<tr><td><a href='https://twitter.com/".$show_user."' target=_blank rel='noreferrer'>".$show_user."</a></td><td><a href='https://twitter.com/".$show_user."/status/".$show_id."' target=_blank rel='noreferrer'>".$show_message."</a></td><td>".$show_keywords."</td><td>".$show_date."</td></tr>";
}
    ?>
  </tbody></table>
</div>
</div>


<div class="container-fluid">
  <div class="footer">
    <div class="col-md-6 col-md-offset-4">
            <div class="inner">
              &copy; <a href="№" title="№">Murashka Uladzislau</a>, 2016&nbsp;
            </div>
    </div>
  </div>
</div>
  </body>
</html>


<?php
require_once 'includes/conn.php';
require_once 'includes/header.php';

//CONFIG DATA REQUEST
$get_config = mysql_query("SELECT * FROM config");

$show_config = mysql_fetch_row($get_config);


$redirect_back = $_SERVER["PHP_SELF"];

//FORM SUBMIT
if(!empty(trim($_POST['submitQuery']))) {
  $update_data = $_POST['query'];
  $update_query = mysql_query("UPDATE config SET query = '$update_data'");
  header('Location: '.$redirect_back);
}
elseif(!empty(trim($_POST['submitOption']))) {
  $update_data = $_POST['type'];
  $update_query = mysql_query("UPDATE config SET type = '$update_data'");
  header('Location: '.$redirect_back);
}
elseif(!empty(trim($_POST['submitCount']))) {
  $update_data = $_POST['count'];
  $update_query = mysql_query("UPDATE config SET count = '$update_data'");
  header('Location: '.$redirect_back);
}
elseif(!empty(trim($_POST['submitListing']))) {
  $update_data = $_POST['listing'];
  $update_query = mysql_query("UPDATE config SET listing = '$update_data'");
  header('Location: '.$redirect_back);
}
elseif(!empty(trim($_POST['submitEmail']))) {
  $update_data = intval($_POST['email']);
  $update_query = mysql_query("UPDATE config SET email = '$update_data'");
  header('Location: '.$redirect_back);
}
elseif(!empty(trim($_POST['submitEmailAddress']))) {
  $update_data = $_POST['emailAddress'];
  $update_query = mysql_query("UPDATE config SET email_addresses = '$update_data'");
  header('Location: '.$redirect_back);
}

if($show_config[5] == 1) { $emailStatus = 'Включено'; }
else { $emailStatus = 'Выключено'; }


?>


<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">

<h3 style="color: #3399f3;">SentryWard <small> система мониторинга упоминания названия компании в социальной сети Twitter.</small></h3>
<hr />
</div>
<div class="col-lg-8 col-lg-offset-1">
  <h2>Настройки</h2>
  <table class="table table-bordered">
    <thead><tr><th class="col-lg-8">Параметр</th><th>Редактировать</th></tr></thead>
    <tbody>
      <?php
      echo "<tr><td><form name='configs' role='form' action='conf.php' method='POST'><textarea placeholder='".$show_config[1]."' class='form-control' name='query'></textarea></td><td><input class='btn btn-default form-control' type='submit' name='submitQuery' value='Обновить запрос' /></td></tr>";
      echo "<tr><td><form role='form' action='conf.php' method='POST'><select class='form-control' name='type'>
      <option disabled selected value='".$show_config[2]."'>".$show_config[2]." (включено)</option>
      <option value='mixed'>mixed</option>
      <option value='recent'>recent</option>
    <option value='popular'>popular</option>
    </select>
      </td><td><input  class='btn btn-default form-control' type='submit' name='submitOption' value='Обновить тип выдачи' /></td></tr>";
      echo "<tr><td><form role='form' action='conf.php' method='POST'><input class='form-control' placeholder='1 ... 100' type='text' value='".$show_config[3]."' name='count' /></td><td><input class='btn btn-default form-control' type='submit' name='submitCount' value='Обновить выборку' /></td></tr>";
      echo "<tr><td><form role='form' action='conf.php' method='POST'><input class='form-control' placeholder='1 ... 100' type='text' value='".$show_config[4]."' name='listing' /></td><td><input class='btn btn-default form-control' type='submit' name='submitListing' value='Обновить выдачу на главной' /></td></tr>";
      echo "<tr><td><form role='form' action='conf.php' method='POST'><select class='form-control' name='email'>
      <option disabled selected value='".$emailStatus."'>".$emailStatus."</option>
      <option value='1'>Включить</option>
      <option value='0'>Выключить</option>
      </select>
      </td><td><input class='btn btn-default form-control' type='submit' name='submitEmail' value='Обновить email оповещение' /></td></tr>";
      echo "<tr><td><form name='configs' role='form' action='conf.php' method='POST'><textarea placeholder='".$show_config[6]."' class='form-control' name='emailAddress'></textarea></td><td><input class='btn btn-default form-control' type='submit' name='submitEmailAddress' value='Изменить получателей' /></td></tr>";
      ?>
    </tbody>
</table>
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

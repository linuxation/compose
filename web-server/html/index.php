<?php
  $server = "api-server";
  require_once 'functions.php';
?><!DOCTYPE html>
<html>
  <head>
    <title>Веб-сервер Apache/PHP</title>
    <style>
      body { font-family: Arial, Helvetica, sans-serif; text-align: center; }
      .text-danger { color: #dc3545!important; }
      .text-success { color: #28a745!important; }
    </style>
  </head>
  <body>
    <h1>Веб-сервер Apache/PHP</h1>
    <p>Вітаємо. Ви бачете перед собою один із контейнерів, створених за допомогою Docker Compose</p>
    <img src="img.png">
    <p><?php
        if( !test_connection($server) ) {
            echo '<span class="text-danger">Немає підключення до API-серверу. Переконтайтесь що його контейнер працює</span>';
        } else {
            echo '<span class="text-success">Підключення з API-сервером працює.</span> ';
            $students = load_students($server);
            echo 'Зареєстровані на API-сервері студенти: ' . implode(', ', $students);
        }
    ?>
  </body>
</html>

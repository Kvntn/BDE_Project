<?php
  require_once 'pdo_loc.php';
  require_once 'pdo_nat.php';

  db_national::setConfig('mysql:host=localhost;dbname=bde_national;', 'root', '');
  db_local::setConfig('mysql:host=localhost;dbname=bde_local;', 'root', '');

?>

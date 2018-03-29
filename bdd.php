<?php
$debug = "true";

if ($debug == "true") {
  $bdd = new PDO('mysql:host=localhost;dbname=workshopb1s2', 'root', '', array(\PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8') );
} else {
  $bdd = new PDO('mysql:host=localhost;dbname=workshopb1s2', '****', '****', array(\PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8') );
}

?>

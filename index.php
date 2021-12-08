<?php
include 'includes/dbconfig.php';

$reference = $database->getReference('Test')->getValue();
echo $reference;

?>
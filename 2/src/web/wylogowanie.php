<?php

session_start();

require_once 'functions.php';
session_unset();

header('Location:index.php');

?>
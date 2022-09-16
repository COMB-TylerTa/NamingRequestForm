<?php

/**
 * City of Myrtle Beach
 * City Facility Naming Request Form
 * Developers: Blakley Parekr / Tyler Ta
 * Date: 9/16/22
 */

 session_start();

 error_reporting(E_ALL);
 ini_set('display_errors', '1');


 $currentFile = basename($_SERVER['SCRIPT_FILENAME']);
 $rightNow = time();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta name="description" content="City Facility Naming Request Form" charset="UTF-8">
      <title>City Facility Naming Request Form</title>
      <link rel="stylesheet" href="styles/citystyles.css">
  </head>

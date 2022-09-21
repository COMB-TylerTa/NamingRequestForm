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


 $showform = 1; //flag to show form - initially, show form.
 $errmsg = 0; //flag to track errors - initially, no errors.

 $states = array(
     'AL'=>'Alabama',
     'AK'=>'Alaska',
     'AZ'=>'Arizona',
     'AR'=>'Arkansas',
     'CA'=>'California',
     'CO'=>'Colorado',
     'CT'=>'Connecticut',
     'DE'=>'Delaware',
     'DC'=>'District of Columbia',
     'FL'=>'Florida',
     'GA'=>'Georgia',
     'HI'=>'Hawaii',
     'ID'=>'Idaho',
     'IL'=>'Illinois',
     'IN'=>'Indiana',
     'IA'=>'Iowa',
     'KS'=>'Kansas',
     'KY'=>'Kentucky',
     'LA'=>'Louisiana',
     'ME'=>'Maine',
     'MD'=>'Maryland',
     'MA'=>'Massachusetts',
     'MI'=>'Michigan',
     'MN'=>'Minnesota',
     'MS'=>'Mississippi',
     'MO'=>'Missouri',
     'MT'=>'Montana',
     'NE'=>'Nebraska',
     'NV'=>'Nevada',
     'NH'=>'New Hampshire',
     'NJ'=>'New Jersey',
     'NM'=>'New Mexico',
     'NY'=>'New York',
     'NC'=>'North Carolina',
     'ND'=>'North Dakota',
     'OH'=>'Ohio',
     'OK'=>'Oklahoma',
     'OR'=>'Oregon',
     'PA'=>'Pennsylvania',
     'RI'=>'Rhode Island',
     'SC'=>'South Carolina',
     'SD'=>'South Dakota',
     'TN'=>'Tennessee',
     'TX'=>'Texas',
     'UT'=>'Utah',
     'VT'=>'Vermont',
     'VA'=>'Virginia',
     'WA'=>'Washington',
     'WV'=>'West Virginia',
     'WI'=>'Wisconsin',
     'WY'=>'Wyoming',
 );
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="City Facility Naming Request Form" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="styles/styles.css" rel="stylesheet">

      <title>City Facility Naming Request Form</title>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

      <!-- Bootstrap CDN -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

      <!-- JQuery CDN -->
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

      <!-- Bootstrap Date Picker (Javascript) -->
      <script src="./js/bootstrap-datepicker.min.js"></script>

  </head>

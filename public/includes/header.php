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

      <title>City Facility Naming Request Form</title>


  </head>

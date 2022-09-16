<?php

/**
 * City of Myrtle Beach
 * City Facility Naming Request Form
 * Developers: Blakley Parekr / Tyler Ta
 * Date: 9/16/22
 */


require_once "includes/header.php";


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

if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $name = trim($_POST['name']);
        $streetaddress = trim($_POST['streetaddress']);
        $city = trim($_POST['city']);
        $state = trim($_POST['state']);
        $zip = trim($_POST['zip']);
        $email = trim($_POST['email']);



        //EMAIL the user upon registration success
        $subject = "Test, It Worked!";
        $txt = "Test";
        mail($email,$subject,$txt);

        $showform = 0;
  }

?>

<body>

    <?php
    //after user clicks submit, hide form and display message
    if($showform == 0){
    ?>

    <p>Thank you! The City has recieved your request and will review your request shortly.</p>

    <?php
      }
    ?>


    <?php
    //Display the form
    if($showform == 1){
    ?>
    <div class="formHeader">
      <h1>CITY FACILITY NAMING REQUEST FORM</h1>
      <h2>Memorial Placements and Naming/Renaming Facilities</h2>

      <a href="https://cms6.revize.com/revize/myrtlebeachsc/FacilitiesNamingPolicy.pdf">Before submitting a request, click here to review the city’s Facility Naming Policy.</a>

      <p>
        The City of Myrtle Beach offers the opportunity for a member of the public to request to name, or rename, a city-owned asset. City assets include, but are not limited to, the following: buildings, structures, recreational facilities, parks, benches, trees and other sites.
        Requestors submit the form below to ask the City of Myrtle Beach to: name an asset in honor, memory or recognition of an individual, family, association, group or significant event; or, erect a monument at a city-owned asset in honor, memory or recognition of an individual person, family, group, association, or significant event.
        NOTE: The City of Myrtle Beach's Facility Naming Policy and its contents shall not supersede any procedure, requirements or statute set forth in City Code at the time the request is being reviewed.
      </p>

    </div>

    <div class="requestForm">

        <div class="contactInfo">

          <form  name="request" id="request" method="post" action = "<?php echo $currentFile;?>">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>

            <label for="contactpref">Contact Preference:</label><br>

            <select name="contactpref" id="contactpref">
              <option value="email">Email</option>
              <option value="mail">Mail</option>
              <option value="phone">Phone</option>
            </select><br>

            <label for="streetaddress">Street Address:</label><br>
            <input type="text" id="streetaddress" name="streetaddress"><br>

            <label for="streetaddress2">Address Line 2:</label><br>
            <input type="text" id="streetaddress2" name="streetaddress2"><br>

            <label for="city">City:</label><br>
            <input type="text" id="city" name="city"><br>

            <label for="state">State:</label><br>
            <select name="state" id="state">

            <?php foreach ($states as $key => $value) { ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php } ?>

          </select><br>

            <label for="zip">Zip Code:</label><br>
            <input type="number" id="zip" name="zip"><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>

            <label for="phone">Phone:</label><br>
            <input type="tel" id="phone" name="phone"><br>


        </div>

        <div class="requestDetail">

          <p>Type of Request:</p>
            <input type="radio" id="bench-tree-plaque" name="requestType" value="Memorial Bench or Tree w/ Plaque (5 in x 7 in Bronze Plaques)">
            <label for="bench-tree-plaque">Memorial Bench or Tree w/ Plaque</label><br>
            <input type="radio" id="naming-renaming" name="requestType" value="Naming/Renaming">
            <label for="naming-renaming">Naming/Renaming</label><br>
            <input type="radio" id="other-memorial" name="requestType" value="Other Memorial">
            <label for="other-memorial">Other Memorial</label><br>


          <label for="requestfor">This request is in honor, recognition, or meomrial of (Select One):</label><br>
            <select name="requestfor" id="requestfor">
              <option value="individual">An Individual</option>
              <option value="family">A Family</option>
              <option value="group">A Group</option>
              <option value="association">An Association</option>
              <option value="sigEvent">A Significant Event</option>
            </select><br>


        </div>

        <div class="requestType">

            <div class="individualFamily">

            </div>

            <div class="groupAssociation">

            </div>

            <div class="significantEvent">

            </div>

        </div>

        <div class="otherDetails">

        </div>

        <div class="uploadFile">

        </div>

        <div class="submit">
           <br><input type="submit" name="submit" id="submit" value="Submit Form"/>
        </div>
      </form>
        <?php
        }//showform
        ?>

    </div>
</body>
</html>

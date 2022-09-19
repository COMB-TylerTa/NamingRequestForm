<?php

    /**
     * City of Myrtle Beach
     * City Facility Naming Request Form
     * Developers: Blakley Parekr / Tyler Ta
     * Date: 9/19/22
     */

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

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link href="styles/styles.css" rel="stylesheet">
        <title>City Facility Naming Request Form</title>

    </head>

    <body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

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

            <a href="https://cms6.revize.com/revize/myrtlebeachsc/FacilitiesNamingPolicy.pdf">Before submitting a request, click here to review the city’s Facility Naming Policy.</a>

            <p>
                The City of Myrtle Beach offers the opportunity for a member of the public to request to name, or rename, a city-owned asset. City assets include, but are not limited to, the following: buildings, structures, recreational facilities, parks, benches, trees and other sites.
                Requestors submit the form below to ask the City of Myrtle Beach to: name an asset in honor, memory or recognition of an individual, family, association, group or significant event; or, erect a monument at a city-owned asset in honor, memory or recognition of an individual person, family, group, association, or significant event.
                NOTE: The City of Myrtle Beach's Facility Naming Policy and its contents shall not supersede any procedure, requirements or statute set forth in City Code at the time the request is being reviewed. 
            </p>

        </div>

        <div class="requestForm">

            <form name="request" id="request" method="post" action = "<?php echo $currentFile;?>">

                <div class="contactInfo">
                    <h2>Section: 1 Contact Information</h2>

                    <div class="form-group required">
                        <label class="control-label">Name</label>
                        <input class="form-control form-control-sm" type="text" id="contactName" name="contactName">
                    </div>

                    <div class="form-group required">
                        <label class="control-label">Street Address</label>
                        <input class="form-control form-control-sm" type="text" id="contactAddress01" name="contactAddress01">
                    </div>

                    <div class="form-group required">
                        <label class="control-label">Street Address Line 2</label>
                        <input class="form-control form-control-sm" type="text" id="contactAddress02" name="contactAddress02">
                    </div>

                    <div class="form-group required">
                        <label class="control-label">City</label>
                        <input class="form-control form-control-sm" type="text" id="contactCity" name="contactCity">
                    </div>

                    <div class="form-group required">
                        <label class="control-label">State</label>
                        <select name="state" id="state">
                            <?php foreach ($states as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group required">
                        <label class="control-label">Zip Code</label>
                        <input class="form-control form-control-sm" type="text" id="contactZipCode" name="contactZipCode">
                    </div>

                    <div class="form-group required">
                        <label class="control-label">Email</label>
                        <input class="form-control form-control-sm" type="email" id="contactEmail" name="contactEmail">
                    </div>

                    <div class="form-group required">
                        <label class="control-label">Phone Number</label>
                        <input class="form-control form-control-sm" type="tel" id="contactPhoneNumber" name="contactPhoneNumber">
                    </div>

                    <div class="form-group required">
                        <label class="control-label">Contact Perference</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contactPreferEmail" id="contactPreferenceEmail" value="email">
                            <label class="form-check-label" for="contactPreferenceEmail">Email</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contactPreferMail" id="contactPreferenceMail" value="mail">
                            <label class="form-check-label" for="contactPreferenceMail">Mail</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contactPreferPhone" id="contactPreferencePhone" value="phone">
                            <label class="form-check-label" for="contactPreferencePhone">Phone</label>
                        </div>

                    </div>

                </div> <!-- End Contact Info -->

                <div class="requestDetail">
                    
                </div>

            </form>

        </div>

    </body>

</html>


<?php

/**
 * City of Myrtle Beach
 * City Facility Naming Request Form
 * Developers: Blakley Parekr / Tyler Ta
 * Date: 9/16/22
 */


require_once "includes/header.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $name = trim($_POST['contactName']);
        $streetaddress = trim($_POST['contactAddress01']);
        $streetaddress2 = trim($_POST['contactAddress02']);
        $city = trim($_POST['contactCity']);
        $state = trim($_POST['state']);
        $zip = trim($_POST['contactZipCode']);
        $email = trim($_POST['contactEmail']);
        $phone = trim($_POST['contactPhoneNumber']);
        $contactpref = ($_POST['perferContact']);

        $requestType = ($_POST['requestType']);
        $requestGroup = ($_POST['requestGroup']);



        require_once "includes/email-template.php";

        $emailTemplate = wordwrap($emailTemplate, 70, "\r\n");

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        //EMAIL the user upon registration success
        $subject = "City Facility Naming Request";
        mail($email,$subject,$emailTemplate,implode("\r\n", $headers));

        $showform = 0;
  }

?>

<body>

    <?php
    //after user clicks submit, hide form and display message
    if($showform == 0){
    ?>

    <div class='center-screen'>
      <div class="container">
        <div class='successbox'>
          <div class='img-box'>
          <p></p>
          </div>
          <div class='successtext'>
          	<p>Thank you! The City has recieved your request and will review it shortly.</p>
          </div>
        </div>
      </div>
    </div>
    <?php
      }
    ?>


    <?php
    //Display the form
    if($showform == 1){
    ?>

    <div class="container">

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
                            <input class="form-check-input" type="radio" name="perferContact" id="contactPreferenceEmail" value="email" required>
                            <label class="form-check-label" for="contactPreferenceEmail">Email</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="perferContact" id="contactPreferenceMail" value="mail">
                            <label class="form-check-label" for="contactPreferenceMail">Mail</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="perferContact" id="contactPreferencePhone" value="phone">
                            <label class="form-check-label" for="contactPreferencePhone">Phone</label>
                        </div>

                    </div>

                </div> <!-- End Contact Info -->

                <div class="requestDetail">

                    <h2>Section 2: Request Details</h2>

                    <div class="form-group required">
                        <label class="control-label">Type of Request (Select One)</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="requestType" id="requestPlaque" value="plaque" required>
                            <label class="form-check-label" for="requestPlaque">Memorial Bench or Tree with Plaque (5x7 inch bronze plaque)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="requestType" id="requestNaming" value="naming">
                            <label class="form-check-label" for="requestNaming">Naming/Renaming</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="requestType" id="requestOther" value="other">
                            <label class="form-check-label" for="requestOther">Other Memorial</label>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="control-label">This request is in honor, recognition or memory of one of the following:</label>
                        <br>
                        <div class="accordion" id="accordionRequestType">
                            <div class="accordion-item card">
                                <div class="card-header accordion-header">
                                    <div class="custom-control custom-radio">
                                        <div class="form-check form-check-inline">
                                            <input data-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#collapseIndividualFamily" aria-expanded="false" aria-controls="collapseIndividualFamily" type="radio" id="individualFamily" name="requestGroup" class="form-check-input custom-control-input" value="individualFamily" required>
                                            <label class="form-check-label" for="individualFamily">Individual/Family</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input data-bs-toggle="collapse" data-bs-target="#collapseGroupAssociation" aria-expanded="false" aria-controls="collapseGroupAssociation" class="form-check-input custom-control-input" type="radio" name="requestGroup" id="groupAssociation" value="groupAssociation">
                                            <label class="form-check-label" for="groupAssociation">Naming/Renaming</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input data-bs-toggle="collapse" data-bs-target="#collapseOther" aria-expanded="false" aria-controls="collapseOther" class="form-check-input custom-control-input" type="radio" name="requestGroup" id="otherMemorial" value="otherMemorial">
                                            <label class="form-check-label" for="otherMemorial">Other Memorial</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="collapseIndividualFamily" class="accordion-collapse collapse" data-bs-parent="#accordionRequestType">
                                    <div class="card-body accordion-body">
                                    // Individual/Family Content Goes Here
                                    </div>
                                </div>

                                <div id="collapseGroupAssociation" class="accordion-collapse collapse" data-bs-parent="#accordionRequestType">
                                    <div class="card-body accordion-body">
                                        // Group/Association Content Goes Here
                                    </div>
                                </div>

                                <div id="collapseOther" class="accordion-collapse collapse" data-bs-parent="#accordionRequestType">
                                    <div class="card-body accordion-body">
                                        // Other Memorial Content Goes Here
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>


                </div> <!-- End Request Details -->

                <div class="submit">
                   <br><input type="submit" name="submit" id="submit" value="Submit Form"/>
                </div>

            </form>

        </div>

    </div> <!-- End Container -->

    <?php
    }//showform
    ?>

</body>
</html>

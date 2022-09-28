<?php

    /**
     * City of Myrtle Beach
     * City Facility Naming Request Form
     * Developers: Blakley Parekr / Tyler Ta
     * Date: 9/19/22
     */

    require_once "includes/header.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'includes/PHPMailer/src/Exception.php';
    require 'includes/PHPMailer/src/PHPMailer.php';
    require 'includes/PHPMailer/src/SMTP.php';

    $error = '';

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

      $otherDetailsTextBox = ($_POST['otherDetailsTextBox']);

      if ($requestType == 'Plaque') {
        $plaqueTexts = trim($_POST['plaqueTexts']);
      } else {
        $plaqueTexts = '';
      }


      if ($requestGroup == 'Individual/Family') {

        $individualFamilyName = trim($_POST['individualFamilyName']);
        $individualFamilyDOD = trim($_POST['individualFamilyDOD']);
        // $individualFamilyAddress01 = trim($_POST['individualFamilyAddress01']);
        // $individualFamilyAddress02 = trim($_POST['individualFamilyAddress02']);
        // $individualFamilyCity = trim($_POST['individualFamilyCity']);
        // $individualFamilyState = trim($_POST['individualFamilyState']);
        // $individualFamilyZip = trim($_POST['individualFamilyZip']);
        // $individualFamilyEmail = trim($_POST['individualFamilyEmail']);
        // $individualFamilyPhone = trim($_POST['individualFamilyPhone']);
        $individualFamilyContributions = trim($_POST['individualFamilyContributions']);


        if (empty($cityReceived)) {
          //$cityReceived = 'Not selected';
          $error .= '<p style="color:red;">City Recieved radio button is not selected</p>';
        } else {
          $cityReceived = trim($_POST['cityReceived']);
        }

        if (empty($individualFamilyDeceased)){
          //$individualFamilyDeceased = 'Not selected';
          $error .= '<p style="color:red;">Deceased? drop down is not selected</p>';
        } else {
          $individualFamilyDeceased = trim($_POST['ifDeceasedSelection']);

        }

        $associationGroupName = '';
        $associationGroupAddress01 = '';
        $associationGroupAddress02 = '';
        $associationGroupCity = '';
        $associationGroupState = '';
        $associationGroupZip = '';
        $associationGroupEmail = '';
        $associationGroupPhone = '';
        $associationGroupContributions = '';
        $cityReceivedGroup = '';

        $significantEventName = '';
        $significantEventDate = '';
        $eventImpact = '';

      }

      if ($requestGroup == 'Group/Association') {

        $associationGroupName = trim($_POST['associationGroupName']);
        $associationGroupAddress01 = trim($_POST['associationGroupAddress01']);
        $associationGroupAddress02 = trim($_POST['associationGroupAddress02']);
        $associationGroupCity = trim($_POST['associationGroupCity']);
        $associationGroupState = trim($_POST['associationGroupState']);
        $associationGroupZip = trim($_POST['associationGroupZip']);
        $associationGroupEmail = trim($_POST['associationGroupEmail']);
        $associationGroupPhone = trim($_POST['associationGroupPhone']);
        $associationGroupContributions = trim($_POST['associationGroupContributions']);


        if (empty($cityReceivedGroup)) {
          //$cityReceivedGroup = 'Not selected';
          $error .= '<p style="color:red;">Deceased? drop down is not selected</p>';
        } else {
          $cityReceivedGroup = trim($_POST['cityReceivedGroup']);
        }


        $individualFamilyName = '';
        $individualFamilyDeceased = '';
        $individualFamilyDOD = '';
        // $individualFamilyAddress01 = '';
        // $individualFamilyAddress02 = '';
        // $individualFamilyCity = '';
        // $individualFamilyState = '';
        // $individualFamilyZip = '';
        // $individualFamilyEmail = '';
        // $individualFamilyPhone = '';
        $individualFamilyContributions = '';
        $cityReceived = '';

        $significantEventName = '';
        $significantEventDate = '';
        $eventImpact = '';

      }

      if ($requestGroup == 'Significant Event') {

      $significantEventName = trim($_POST['significantEventName']);
      $significantEventDate = trim($_POST['significantEventDate']);


      if (empty($eventImpact)) {
        //$eventImpact = 'Not selected';
        $error .= '<p style="color:red;">Impact of Significant Event is not selected</p>';

      } else {
        $eventImpact = trim($_POST['eventImpact']);
      }

      $individualFamilyName = '';
      $individualFamilyDeceased = '';
      $individualFamilyDOD = '';
      // $individualFamilyAddress01 = '';
      // $individualFamilyAddress02 = '';
      // $individualFamilyCity = '';
      // $individualFamilyState = '';
      // $individualFamilyZip = '';
      // $individualFamilyEmail = '';
      // $individualFamilyPhone = '';
      $individualFamilyContributions = '';
      $cityReceived = '';

      $associationGroupName = '';
      $associationGroupAddress01 = '';
      $associationGroupAddress02 = '';
      $associationGroupCity = '';
      $associationGroupState = '';
      $associationGroupZip = '';
      $associationGroupEmail = '';
      $associationGroupPhone = '';
      $associationGroupContributions = '';
      $cityReceivedGroup = '';

    }

    //If form was submitted without errors, send email and display thank you message
    if ($error == '') {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    require_once "includes/email-template.php";

    $emailTemplate = wordwrap($emailTemplate, 70, "\r\n");

    $file_tmp  = $_FILES['attachment']['tmp_name'];
    $file_name = $_FILES['attachment']['name'];

    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                            //Enable verbose debug output
      $mail->isSMTP();                                                  //Send using SMTP
      $mail->Host       = 'a2plcpnl0078.prod.iad2.secureserver.net';    //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                         //Enable SMTP authentication
      $mail->Username   = 'noreply@apps.myrtlebeacheventmaps.com';      //SMTP username
      $mail->Password   = 'l9DaBB}AMuEc';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                  //Enable implicit TLS encryption
      $mail->Port       = 465;                                          //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      $mail->setFrom('noreply@apps.myrtlebeacheventmaps.com', 'City Facility Naming Request');
      //Recipients
      $mail->addAddress('bparker@cityofmyrtlebeach.com');               //Name is optional

      // if ($requestType == 'Plaque') {
      //   $mail->addAddress('Dustin.Jordan@cityofmyrtlebeach.com');
      //   $mail->addAddress('jblackhurst@cityofmyrtlebeach.com');
      // } else {
      //   $mail->addAddress('jadkins@cityofmyrtlebeach.com');
      // }

      //if user uploads file, append it to email.
      if ($_FILES['attachment']['name'] != '') {
        $mail->addAttachment($file_tmp, $file_name);    //Optional name
      }

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'City Facility Naming Request';
      $mail->Body    = $emailTemplate;
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      //echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

      $showform = 0;
    } else {
      echo $error;
    }
  }



?>
    <!-- Main Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Bootstrap Datepicker Style Sheet -->
    <link href="css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Custom Style Sheet -->
    <link href="styles/styles.css" rel="stylesheet">

    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Bootstrap Date Picker (Javascript) -->
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>

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
        //close showform conditional
        }
        ?>

        <?php
            //Display the form
            if($showform == 1){
        ?>


        <div class="container">

          <div class="blankSpace">
          </div>

          <div class="form-request-box">
            <div class="header-img-and-text">

            <img src="/images/COMB-logo-small.png" alt="..." class="img-thumbnail float-left" style='background-color: transparent; border-color: transparent;'>
              <div class="container text-center">
                  <div class="jumbotron my-auto">
                    <br>
                    <h1>CITY FACILITY NAMING REQUEST FORM</h1>
                    <h3>Memorial Placements and Naming/Renaming Facilities</h3>
                  </div>
              </div>
              </div>
              <br>
            <div class="note small bg-light p-3 rounded">
              <center><a href="https://cms6.revize.com/revize/myrtlebeachsc/FacilitiesNamingPolicy.pdf">Before submitting a request, click here to review the city’s Facility Naming Policy.</a> </center>
              <br>
              The City of Myrtle Beach offers the opportunity for a member of the public to request to name, or rename, a city-owned asset. City assets include, but are not limited to, the following: buildings, structures, recreational facilities, parks, benches, trees and other sites.
              Requestors submit the form below to ask the City of Myrtle Beach to: name an asset in honor, memory or recognition of an individual, family, association, group or significant event; or, erect a monument at a city-owned asset in honor, memory or recognition of an individual person, family, group, association, or significant event.
              NOTE: The City of Myrtle Beach's Facility Naming Policy and its contents shall not supersede any procedure, requirements or statute set forth in City Code at the time the request is being reviewed. &nbsp;
            </div>

            <br>
            <div class="requestForm">

                <form enctype="multipart/form-data" name="request" id="request" method="post" action ="<?php echo $currentFile;?>">

                  <div class="form-request-mini-box">
                    <div class="contactInfo">
                        <h2>Contact Information</h2>
                        <br>
                        <div class="form-group required">
                            <label class="control-label">Name:</label>
                            <input class="form-control form-control-sm" type="text" id="contactName" name="contactName" required>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Street Address:</label>
                            <input class="form-control form-control-sm" type="text" id="contactAddress01" name="contactAddress01" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Street Address Line 2:</label>
                            <input class="form-control form-control-sm" type="text" id="contactAddress02" name="contactAddress02">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">City:</label>
                            <input class="form-control form-control-sm" type="text" id="contactCity" name="contactCity" required>
                        </div>
                        <br>
                        <div class="form-group required">
                            <label class="control-label">State:</label>
                            <select name="state" id="state">
                                <?php foreach ($states as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group required">
                            <label class="control-label">Zip Code:</label>
                            <input class="form-control form-control-sm" type="text" id="contactZipCode" name="contactZipCode" required>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Email:</label>
                            <input class="form-control form-control-sm" type="email" id="contactEmail" name="contactEmail" required>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Phone Number:</label>
                            <input class="form-control form-control-sm inputPhone" type="tel" id="contactPhoneNumber" name="contactPhoneNumber" required>
                        </div>
                        <br>
                        <div class="form-group required">
                            <label class="control-label">Contact Preference:</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="perferContact" id="contactPreferenceEmail" value="Email" required>
                                <label class="form-check-label" for="contactPreferenceEmail">Email</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="perferContact" id="contactPreferenceMail" value="Mail">
                                <label class="form-check-label" for="contactPreferenceMail">Mail</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="perferContact" id="contactPreferencePhone" value="Phone">
                                <label class="form-check-label" for="contactPreferencePhone">Phone</label>
                            </div>

                        </div>

                    </div> <!-- End Contact Info -->
                  </div> <!-- End contact info mini box -->

                    <br>

                  <div class="form-request-mini-box">
                    <div class="requestDetail">

                        <h2>Request Details</h2>
                        <br>

                        <div class="accordion" id="accordionMemorialType">
                            <div class="accordion-item card">
                                <div class="card-header accordion-header">
                                    <div class="custom-control custom-radio">
                                        <div class="form-check form-check-inline">
                                            <input data-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#collapseMemorialPlaque" aria-expanded="false" aria-controls="collapseMemorialPlaque" class="form-check-input custom-control-input" type="radio" name="requestType" id="requestPlaque" value="Plaque" required>
                                            <label class="form-check-label" for="requestPlaque">Memorial Bench or Tree with Plaque (5x7 inch bronze plaque)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="requestType" id="requestNaming" value="Naming/Renaming">
                                            <label class="form-check-label" for="requestNaming">Naming/Renaming</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="requestType" id="requestOther" value="Other">
                                            <label class="form-check-label" for="requestOther">Other Memorial</label>
                                        </div>
                                    </div>
                                </div> <!-- End Memorial Type - Card Header -->

                                <div id="collapseMemorialPlaque" class="accordion-collapse collapse" data-bs-parent="#accordionMemorialType">
                                    <div class="card-body accordion-body container">
                                        <div class="form-group">
                                            <label>For a plaque, what would you like it to say?</label>
                                            <textarea class="form-control" id="plaqueTexts" row="3" name="plaqueTexts"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div> <!-- End request details mini box -->

                        <br>

                      <div class="form-request-mini-box">
                        <div class="form-group required">
                            <label class="control-label">This request is in honor, recognition or memory of one of the following:</label>
                            <br><br>
                            <div class="accordion" id="accordionRequestType">
                                <div class="accordion-item card">
                                    <div class="card-header accordion-header">
                                        <div class="custom-control custom-radio">
                                            <div class="form-check form-check-inline">
                                                <input data-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#collapseIndividualFamily" aria-expanded="false" aria-controls="collapseIndividualFamily" type="radio" id="individualFamily" name="requestGroup" class="form-check-input custom-control-input" value="Individual/Family" required>
                                                <label class="form-check-label" for="individualFamily">Individual/Family</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input data-bs-toggle="collapse" data-bs-target="#collapseGroupAssociation" aria-expanded="false" aria-controls="collapseGroupAssociation" class="form-check-input custom-control-input" type="radio" name="requestGroup" id="groupAssociation" value="Group/Association">
                                                <label class="form-check-label" for="groupAssociation">Group/Association</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input data-bs-toggle="collapse" data-bs-target="#collapseSignificantEvent" aria-expanded="false" aria-controls="collapseSignificantEvent" class="form-check-input custom-control-input" type="radio" name="requestGroup" id="significantEvent" value="Significant Event">
                                                <label class="form-check-label" for="significantEvent">Significant Event</label>
                                            </div>
                                        </div>
                                    </div> <!-- End Accordion Request Type -->

                                    <div id="collapseIndividualFamily" class="accordion-collapse collapse" data-bs-parent="#accordionRequestType">
                                      <div class="card-body accordion-body container">
                                          <h2>Request related to Individual or Family</h2>

                                          <label>Name:</label>
                                          <input class="form-control form-control-sm" type="text" id="individualFamilyName" name="individualFamilyName">

                                          <label>Deceased?:</label>
                                          <select class="form-select form-select-sm" aria-label="Deceased dropdown selection" name="ifDeceasedSelection" id="ifDeceasedSelection">
                                              <option value="" selected disabled>Please select</option>
                                              <option value="Yes" data-bs-toggle="collapse" href="#notDeceasedForm">Yes</option>
                                              <option value="No" data-bs-toggle="collapse" data-parent="#collapseIndividualFamily" href="#notDeceasedForm">No</option>
                                          </select>

                                          <label>Date of Death:</label>
                                          <div class="input-group date" id="datepicker">
                                              <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="date-input-container" name="individualFamilyDOD">
                                              <span class="input-group-append input-group-text" id="">
                                                  <span>
                                                      <i class="bi bi-calendar"></i>
                                                  </span>
                                              </span>
                                          </div>

                                        <!--  <div id="notDeceasedForm" class="accordion-collapse collapse"> -->

                                          <!--    <div class="accordion-body"> -->

                                          <!-- <div class="form-group">
                                              <label>Street Address:</label>
                                              <input class="form-control form-control-sm" type="text" id="individualFamilyAddress01" name="individualFamilyAddress01">
                                          </div>

                                          <div class="form-group">
                                              <label>Street Address 2:</label>
                                              <input class="form-control form-control-sm" type="text" id="individualFamilyAddress02" name="individualFamilyAddress02">
                                          </div>

                                          <div class="form-group">
                                              <label>City:</label>
                                              <input class="form-control form-control-sm" type="text" id="individualFamilyCity" name="individualFamilyCity">
                                          </div>

                                          <div class="form-group">
                                              <label>State:</label>
                                              <input class="form-control form-control-sm" type="text" id="individualFamilyState" name="individualFamilyState">
                                          </div>

                                          <div class="form-group">
                                              <label>Zip Code:</label>
                                              <input class="form-control form-control-sm" type="text" id="individualFamilyZip" name="individualFamilyZip">
                                          </div>

                                          <div class="form-group">
                                              <label>Email Address:</label>
                                              <input class="form-control form-control-sm" type="email" id="individualFamilyEmail" name="individualFamilyEmail">
                                          </div>

                                          <div class="form-group">
                                              <label>Phone Number:</label>
                                              <input class="form-control form-control-sm" type="tel" id="individualFamilyPhone" name="individualFamilyPhone">
                                          </div> -->
                                          <br>
                                          <div class="form-group">
                                              <label for="individualFamilyContributions">As applicable, please not any financal contributions made by the individual or family pertaining to this request, including the total dollar amount and purpose, below...</label>
                                              <textarea class="form-control" id="individualFamilyContributions" name="individualFamilyContributions" rows="3"></textarea>
                                          </div>
                                          <br>
                                          <div class="form-group">
                                              <label>Are in-kind services/financial/contributions being recieved by the City of Myrtle Beach?</label>
                                              <br>
                                              <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="cityReceived" id="cityReceivedYes" value="Yes">
                                                  <label class="form-check-label" for="cityReceivedYes">Yes</label>
                                              </div>

                                              <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="cityReceived" id="cityReceivedNo" value="No">
                                                  <label class="form-check-label" for="cityReceivedNo">No</label>
                                              </div>
                                          </div>

                                          <!--  </div> End Panel Body -->
                                          <!-- </div> -->

                                      </div>
                                  </div> <!-- End Individual/Family Subsection -->

                                    <div id="collapseGroupAssociation" class="accordion-collapse collapse" data-bs-parent="#accordionRequestType">
                                        <div class="card-body accordion-body">
                                            <h2>Request related to a Group or Association</h2>

                                            <label>Association/Group Name:</label>
                                            <input class="form-control form-control-sm" type="text" id="associationGroupName" name="associationGroupName">

                                            <div class="form-group">
                                                <label>Street Address:</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupAddress01" name="associationGroupAddress01">
                                            </div>

                                            <div class="form-group">
                                                <label>Street Address Line 2:</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupAddress02" name="associationGroupAddress02">
                                            </div>

                                            <div class="form-group">
                                                <label>City:</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupCity" name="associationGroupCity">
                                            </div>

                                            <div class="form-group">
                                                <label>State:</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupState" name="associationGroupState">
                                            </div>

                                            <div class="form-group">
                                                <label>Zip Code:</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupZip" name="associationGroupZip">
                                            </div>

                                            <div class="form-group">
                                                <label>Email Address:</label>
                                                <input class="form-control form-control-sm" type="email" id="associationGroupEmail" name="associationGroupEmail">
                                            </div>

                                            <div class="form-group">
                                                <label>Phone Number:</label>
                                                <input class="form-control form-control-sm inputPhone" type="tel" id="associationGroupPhone" name="associationGroupPhone">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="associationGroupContributions">As applicable, please not any financal contributions made by the association or group pertaining to this request, including the total dollar amount and purpose, below...</label>
                                                <textarea class="form-control" id="associationGroupContributions" name="associationGroupContributions" rows="3"></textarea>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Are in-kind services/financial/contributions being receved by the City of Myrtle Beach?</label>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cityReceivedGroup" id="cityReceivedGroupYes" value="Yes">
                                                    <label class="form-check-label" for="cityReceivedGroupYes">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cityReceivedGroup" id="cityReceivedGroupNo" value="No">
                                                    <label class="form-check-label" for="cityReceivedGroupNo">No</label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div id="collapseSignificantEvent" class="accordion-collapse collapse" data-bs-parent="#accordionRequestType">
                                        <div class="card-body accordion-body">
                                            <h2>Request related to Significant Event</h2>

                                            <div class="form-group">
                                                <label>Name of Significant Event:</label>
                                                <input class="form-control form-control-sm" type="text" id="significantEventName" name="significantEventName">
                                            </div>

                                            <label>Date of Significant Event:</label>
                                            <div class="input-group date" id="eventDatepicker">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="date-input-container" name="significantEventDate">
                                                <span class="input-group-append input-group-text" id="">
                                                    <span>
                                                        <i class="bi bi-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label">Impact of Significant Event (Select One)</label>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eventImpact" id="localImpact" value="Local">
                                                    <label class="form-check-label" for="localImpact">Local</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eventImpact" id="stateImpact" value="State">
                                                    <label class="form-check-label" for="stateImpace">State</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eventImpact" id="federalImpact" value="Federal">
                                                    <label class="form-check-label" for="federalImpact">Federal</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eventImpact" id="globalImpact" value="Global">
                                                    <label class="form-check-label" for="globalImpact">Global</label>
                                                </div>
                                            </div>

                                        </div>


                                    </div>


                                </div>
                            </div>

                        </div>


                    </div> <!-- End This request is in honor, etc. section -->


                    <br>

                    <div class="form-request-mini-box">
                      <div class="otherDetails">
                          <h2>Other Details</h2>

                          <div class="form-group">
                              <label>Please provide any other pertinent details for your request below or attached. As a reference to the factors that will be considered with your request, please review the City's policy for these requests <a href="https://cms6.revize.com/revize/myrtlebeachsc/FacilitiesNamingPolicy.pdf">here.</a></label>
                              <textarea class="form-control" id="otherDetailsTextBox" name="otherDetailsTextBox" rows="3"></textarea>
                          </div>
                      </div> <!-- End Other Details -->
                      <br>
                      <div class="uploadFile mb-3">
                          <label for="formFileMultiple">Upload File(s)</label>
                          <input class="form-control" type="file" id="formFileMultiple" name="attachment" multiple>
                    </div> <!-- End Upload File -->


                    <p>For submission by mail, please send to the City Clerk's Office, 937 Broadway St, Myrtle Beach, SC 29577</p>

                    <center>
                    <div class="btn btn-submit btn-lg">
                       <br><input type="submit" name="submit" id="submit" value="Submit Request"/>
                    </div>
                    </center>
                  </div> <!--end Other details mini box -->


                </form>
            </div>

          </div> <!-- form request box -->

          <br><br>

        </div> <!-- End Container -->

        <script>

            $(function(){
                $('#datepicker').datepicker({
                    format: 'mm/dd/yyyy',
                    autoclose: true,
                    clearBtn: true,
                    showOnFocus: false
                });
            });

            $(function(){
                $('#eventDatepicker').datepicker({
                    format: 'mm/dd/yyyy',
                    autoclose: true,
                    clearBtn: true,
                    showOnFocus: false
                });
            });

        </script>

        <?php
            //Display the form
          }
        ?>
    </body>

</html>

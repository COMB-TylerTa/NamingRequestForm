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

    require_once('/controllers/memorialRequestTypeAccordion.js');
    require_once('/controllers/phoneNumberInputFormatter.js');

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <!-- Custom Style Sheet -->
        <link href="styles/styles.css" rel="stylesheet">

        <!-- Bootstrap Datepicker Style Sheet -->
        <link href="css/bootstrap-datepicker.min.css" rel="stylesheet">

        <!-- Bootstrap Icon CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <title>City Facility Naming Request Form</title>

        

    </head>

    <body>

        <!-- Bootstrap CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

        <!-- JQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <!-- Bootstrap Date Picker (Javascript) -->
        <script src="./js/bootstrap-datepicker.min.js"></script>

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
                        <h2>Contact Information</h2>

                        <div class="form-group required">
                            <label class="control-label">Name</label>
                            <input class="form-control form-control-sm" type="text" id="contactName" name="contactName" required>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Street Address</label>
                            <input class="form-control form-control-sm" type="text" id="contactAddress01" name="contactAddress01" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Street Address Line 2</label>
                            <input class="form-control form-control-sm" type="text" id="contactAddress02" name="contactAddress02">
                        </div>

                        <div class="form-group required">
                            <label class="control-label">City</label>
                            <input class="form-control form-control-sm" type="text" id="contactCity" name="contactCity" required>
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
                            <input class="form-control form-control-sm" type="text" id="contactZipCode" name="contactZipCode" required>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Email</label>
                            <input class="form-control form-control-sm" type="email" id="contactEmail" name="contactEmail" required>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control form-control-sm inputPhone" type="tel" id="contactPhoneNumber" name="contactPhoneNumber" required>
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

                        <h2>Request Details</h2>

                        <div class="form-group required">
                            <label class="control-label">Type of Request (Select One)</label>
                            <br>
                            <div class="accordion" id="accordionMemorialType">
                                <div class="accordion-item card">
                                    <div class="card-header accordion-header">
                                        <div class="custom-control custom-radio">
                                            <div class="form-check form-check-inline">
                                                <input data-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#collapseMemorialPlaque" aria-expanded="false" aria-controls="collapseMemorialPlaque" class="form-check-input custom-control-input" type="radio" name="requestType" id="requestPlaque" value="plaque" required>
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
                                    </div> <!-- End Memorial Type - Card Header -->

                                    <div id="collapseMemorialPlaque" class="accordion-collapse collapse" data-bs-parent="#accordionMemorialType">
                                        <div class="card-body accordion-body container">
                                            <div class="form-group">
                                                <label>For a plaque, what would you like it to say?</label>
                                                <textarea class="form-control" id="plaqueTexts" row="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                <label class="form-check-label" for="groupAssociation">Group/Association</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input data-bs-toggle="collapse" data-bs-target="#collapseSignificantEvent" aria-expanded="false" aria-controls="collapseSignificantEvent" class="form-check-input custom-control-input" type="radio" name="requestGroup" id="significantEvent" value="significantEvent">
                                                <label class="form-check-label" for="significantEvent">Significant Event</label>
                                            </div>
                                        </div>   
                                    </div> <!-- End Accordion Request Type -->

                                    <div id="collapseIndividualFamily" class="accordion-collapse collapse" data-bs-parent="#accordionRequestType">
                                        <div class="card-body accordion-body container">
                                            <h3>Request Related to Individual or Family</h3>

                                            <label>Name</label>
                                            <input class="form-control form-control-sm" type="text" id="individualFamilyName" name="individualFamilyName">

                                            <label>Deceased?</label>
                                            <select class="form-select form-select-sm" aria-label="Deceased dropdown selection" required>
                                                <option value="" selected disabled>Please select</option>
                                                <option value="yesDeceased">Yes</option>
                                                <option value="notDeceased">No</option>
                                            </select>

                                            <label>Date of Death</label>
                                            <div class="input-group date" id="datepicker"> 
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="date-input-container">
                                                <span class="input-group-append input-group-text" id=""> 
                                                    <span class="bg-white"> 
                                                        <i class="bi bi-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <p>NOTE: If deceased, proceed to "Section: Other Details"</p>

                                            <div class="form-group">
                                                <label>Street Address</label>
                                                <input class="form-control form-control-sm" type="text" id="individualFamilyAddress01" name="individualFamilyAddress01">
                                            </div>

                                            <div class="form-group">
                                                <label>Street Address 2</label>
                                                <input class="form-control form-control-sm" type="text" id="individualFamilyAddress02" name="individualFamilyAddress02">
                                            </div>

                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control form-control-sm" type="text" id="individualFamilyCity" name="individualFamilyCity">
                                            </div>

                                            <div class="form-group">
                                                <label>State</label>
                                                <input class="form-control form-control-sm" type="text" id="individualFamilyState" name="individualFamilyState">
                                            </div>

                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input class="form-control form-control-sm" type="text" id="individualFamilyZip" name="individualFamilyZip">
                                            </div>

                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input class="form-control form-control-sm" type="text" id="individualFamilyEmail" name="individualFamilyEmail">
                                            </div>

                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control form-control-sm" type="text" id="individualFamilyPhone" name="individualFamilyPhone">
                                            </div>

                                            <div class="form-group">
                                                <label for="individualFamilyContributions">As applicable, please not any financal contributions made by the individual or family pertaining to this request, including the total dollar amount and purpose, below...</label>
                                                <textarea class="form-control" id="individualFamilyContributions" rows="3"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Are in-kind services/financial/contributions being receved by the City of Myrtle Beach?</label>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cityReceived" id="cityReceivedYes" value="yes">
                                                    <label class="form-check-label" for="cityReceivedYes">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cityReceived" id="cityReceivedNo" value="no">
                                                    <label class="form-check-label" for="cityReceivedNo">No</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- End Individual/Family Subsection -->

                                    <div id="collapseGroupAssociation" class="accordion-collapse collapse" data-bs-parent="#accordionRequestType">
                                        <div class="card-body accordion-body">
                                            <h3>Request Related to Group or Association</h3>

                                            <label>Association/Group Name</label>
                                            <input class="form-control form-control-sm" type="text" id="associationGroupName" name="associationGroupName">

                                            <div class="form-group">
                                                <label>Street Address</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupAddress01" name="associationGroupAddress01">
                                            </div>

                                            <div class="form-group">
                                                <label>Street Address Line 2</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupAddress02" name="associationGroupAddress02">
                                            </div>

                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupCity" name="associationGroupCity">
                                            </div>

                                            <div class="form-group">
                                                <label>State</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupState" name="associationGroupState">
                                            </div>

                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input class="form-control form-control-sm" type="text" id="associationGroupZip" name="associationGroupZip">
                                            </div>

                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input class="form-control form-control-sm" type="email" id="associationGroupEmail" name="associationGroupEmail">
                                            </div>

                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control form-control-sm inputPhone" type="tel" id="associationGroupPhone" name="associationGroupPhone">
                                            </div>

                                            <div class="form-group">
                                                <label for="associationGroupContributions">As applicable, please not any financal contributions made by the association or group pertaining to this request, including the total dollar amount and purpose, below...</label>
                                                <textarea class="form-control" id="associationGroupContributions" rows="3"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Are in-kind services/financial/contributions being receved by the City of Myrtle Beach?</label>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cityReceivedGroup" id="cityReceivedGroupYes" value="yes">
                                                    <label class="form-check-label" for="cityReceivedGroupYes">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cityReceivedGroup" id="cityReceivedGroupNo" value="no">
                                                    <label class="form-check-label" for="cityReceivedGroupNo">No</label>
                                                </div>
                                            </div>


                                        </div>
                                    </div> <!-- End Group/Association Subsection -->

                                    <div id="collapseSignificantEvent" class="accordion-collapse collapse" data-bs-parent="#accordionRequestType">
                                        <div class="card-body accordion-body">
                                            <h3>Request Related to Significant Event</h3>

                                            <div class="form-group">
                                                <label>Name of Significant Event</label>
                                                <input class="form-control form-control-sm" type="text" id="significantEventName" name="significantEventName">
                                            </div>

                                            <label>Date of Significant Event</label>
                                            <div class="input-group date" id="eventDatepicker"> 
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="date-input-container">
                                                <span class="input-group-append input-group-text" id=""> 
                                                    <span class="bg-white"> 
                                                        <i class="bi bi-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>

                                            <div class="form-group">
                                                <label class="">Impact of Significant Event (Select One)</label>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eventImpact" id="localImpact" value="local">
                                                    <label class="form-check-label" for="localImpact">Local</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eventImpact" id="stateImpact" value="state">
                                                    <label class="form-check-label" for="stateImpace">State</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eventImpact" id="federalImpact" value="federal">
                                                    <label class="form-check-label" for="federalImpact">Federal</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="eventImpact" id="globalImpact" value="global">
                                                    <label class="form-check-label" for="globalImpact">Global</label>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        
                                    </div> <!-- End Significant Event Subsection -->


                                </div>
                            </div>

                        </div> <!-- End Form -->


                    </div> <!-- End Request Details -->

                    <div class="otherDetails"> 
                        <h2>Other Details</h2>

                        <div class="form-group"> 
                            <label>Please provide any relebant details for the request in the text box below, or attach PDFs with the "Upload File(s)" option.</label>
                            <textarea class="form-control" id="otherDetailsTextBox" rows="3"></textarea>
                        </div>
                    </div> <!-- End Other Details -->

                    <div class="uploadFile mb-3">
                        <label for="formFileMultiple">Upload File(s)</label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                    </div> <!-- End Upload File -->

                    <div class="submit">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>
            
        </div> <!-- End Container -->

        <script>
            /**
            $('#date').datepicker({
                autoclose:true,
                clearBtn: true,
                container: '.datepicker'
            });
            **/

            /**
            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
                autoclose:true,
                clearBtn: true,
                container: '.datepicker'
            });
            **/

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
    </body>

</html>


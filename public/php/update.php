<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Portal | OrthoSC, Myrtle Beach, SC</title>
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.orthosc.org/sites/orthosc.org/themes/practice/favicon/favicon-16x16.png">
  </head>
  <body>
    <?php
        $output = "";
        $errormsg = "";
        $showform = 0;
        require_once "connect.php";

        if( isset($_POST['theedit']) ) {
            $showform = 1;
            $formfield['mycustid'] = $_POST['custid'];
            $sqlselect = 'SELECT * from theinfo where infoKey = :thecustid';
            $result = $db->prepare($sqlselect);
            $result->bindValue(':thecustid', $formfield['mycustid']);
            $result->execute();
            $row = $result->fetch(); 
        }

        if( isset($_POST['thesubmit']) ) {
            $showform = 2;
			$formfield['mycustid'] = $_POST['custid'];
            $output .= '<p>The form was submitted.</p>';
            
            $formfield['infoFirstName'] = trim($_POST['firstname']);
            $formfield['infoLastName'] = trim($_POST['lastname']);
            $formfield['infoEmail'] = trim($_POST['email']);
			$formfield['infoPhoneNumber'] = trim($_POST['phone']);
			$formfield['infoBirthDate'] = trim($_POST['birth']);
            $formfield['infoAddress'] = trim($_POST['address']);
            $formfield['infoCity'] = trim($_POST['city']);
            $formfield['infoState'] = trim($_POST['state']);
            $formfield['infoZip'] = trim($_POST['zip']);
            $formfield['infoInsurance'] = trim($_POST['insured']);
            $formfield['infoMedicationsAllergies'] = trim($_POST['mediAller']);
            $formfield['infoSymptoms'] = trim($_POST['symptoms']);
            $formfield['infoNewsletter'] = trim($_POST['news']);

            if (empty($formfield['infoLastName'])){$errormsg .= "<p>Your last name field is empty.</p>";}
			if (empty($formfield['infoPhoneNumber'])){$errormsg .= "<p>Your phone number field is empty.</p>";}
			if (empty($formfield['infoBirthDate'])){$errormsg .= "<p>Your birth day field is empty.</p>";}
            if (empty($formfield['infoAddress'])){$errormsg .= "<p>Your address field is empty.</p>";}
            if (empty($formfield['infoCity'])){$errormsg .= "<p>Your city field is empty.</p>";}
            if (empty($formfield['infoState'])){$errormsg .= "<p>Your state field is empty.</p>";}
            if (empty($formfield['infoZip'])){$errormsg .= "<p>Your zip field is empty.</p>";}
            if (empty($formfield['infoInsurance'])){$errormsg .= "<p>Your insurance field is empty.</p>";}
            if (empty($formfield['infoNewsletter'])){$errormsg .= "<p>Your news field is empty.</p>";}

            if($errormsg != "") {
				$output .= $errormsg;
			} else {
                try {
                    $sqlinsert = 'update theinfo set infoFirstName = :theFirstName,
                                  infoLastName = :theLastName,
                                  infoEmail = :theEmail,
                                  infoPhoneNumber = :thePhoneNumber,
                                  infoBirthDate = :theBirthDate,
                                  infoAddress = :theAddress,
                                  infoCity = :theCity,
                                  infoState = :theState,
                                  infoZip = :theZip,
                                  infoInsurance = :theInsurance,
                                  infoMedicationsAllergies = :theMedicationsAllergies,
                                  infoSymptoms = :theSymptoms,
                                  infoNewsletter = :theNewsletter
                                  where infoKey = :theinfoKey';
                    $stmtinsert = $db->prepare($sqlinsert);
                    $stmtinsert->bindvalue(':theFirstName', $formfield['infoFirstName']);
                    $stmtinsert->bindvalue(':theLastName', $formfield['infoLastName']);
                    $stmtinsert->bindvalue(':theEmail', $formfield['infoEmail']);
                    $stmtinsert->bindvalue(':thePhoneNumber', $formfield['infoPhoneNumber']);
                    $stmtinsert->bindvalue(':theBirthDate', $formfield['infoBirthDate']);
                    $stmtinsert->bindvalue(':theAddress', $formfield['infoAddress']);
                    $stmtinsert->bindvalue(':theCity', $formfield['infoCity']);
                    $stmtinsert->bindvalue(':theState', $formfield['infoState']);
                    $stmtinsert->bindvalue(':theZip', $formfield['infoZip']);
                    $stmtinsert->bindvalue(':theInsurance', $formfield['infoInsurance']);
                    $stmtinsert->bindvalue(':theNewsletter', $formfield['infoNewsletter']);
                    $stmtinsert->bindvalue(':theMedicationsAllergies', $formfield['infoMedicationsAllergies']);
                    $stmtinsert->bindvalue(':theSymptoms', $formfield['infoSymptoms']);
                    $stmtinsert->bindvalue(':theinfoKey', $formfield['mycustid']);
                    $stmtinsert->execute();
					$output .= "There are no errors.  Thank you.";
                } catch(PDOException $e) {
                    echo 'ERROR!!!' .$e->getMessage();
					exit();
                }
            }
        }
    ?>
    <link rel="stylesheet" type="text/css" href="../css/base.css"/>
	<link rel="stylesheet" type="text/css" href="../css/portal.css"/>
    <div>
      <a href="../html/index.html"><img id="logo" src="../img/logo.svg" alt="logo" style="height: 118px !important; width: 266px !important;"></a>
      <nav>
        <ul>
          <li><a href="../html/index.html">Home</a></li>
          <li><a href="../html/form.html">Form</a></li>
          <li><a href="../admin/adminPortal.php">Admin Portal</a></li>
        </ul>
      </nav>
    </div>
    <div>
        <?php
            if ($showform == 1) {
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="theform">
            <fieldset>
                <table>
                    <tr>
                        <th>* Required</th>
                    </tr>
                    <tr>
                        <td><label>First Name:</label></td>
                        <td><input type="text" name="firstname" id="firstname"
                            value = '<?php echo $row['infoFirstName']; ?>'	></td>
                    </tr>
                    <tr>
                        <td><label>Last Name*:</label></td>
                        <td><input type="text" name="lastname" id="lastname"
                            value = '<?php echo $row['infoLastName']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Email Address:</label></td>
                        <td><input type="text" name="email" id="email"
                            value = '<?php echo $row['infoEmail']; ?>'	></td>
                    </tr>
                    <tr>
                        <td><label>Phone Number*:</label></td>
                        <td><input type="text" name="phone" id="phone"
                            value = '<?php echo $row['infoPhoneNumber']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Date of Birth*:</label></td>
                        <td><input type="text" name="birth" id="birth"
                            value = '<?php echo $row['infoBirthDate']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Address*:</label></td>
                        <td><input type="text" name="address" id="address"
                            value = '<?php echo $row['infoAddress']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>City*:</label></td>
                        <td><input type="text" name="city" id="city"
                            value = '<?php echo $row['infoCity']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>State*:</label></td>
                        <td><input type="text" name="state" id="state"
                            value = '<?php echo $row['infoState']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Zip*:</label></td>
                        <td><input type="text" name="zip" id="zip"
                            value = '<?php echo $row['infoZip']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Insured*:</label></td>
                        <td><input type="text" name="insured" id="insured"
                            value = '<?php echo $row['infoInsurance']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Current Medications/Allergies:</label></td>
                        <td><textarea name="mediAller" id="mediAller"><?php echo $row['infoMedicationsAllergies']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Symptoms:</label></td>
                        <td><textarea name="symptoms" id="symptoms"><?php echo $row['infoSymptoms']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Subscribe to Newsletter*:</label></td>
                        <td><input type="text" name="news" id="news"
                            value = '<?php echo $row['infoNewsletter']; ?>'	require></td>
                    </tr>
                </table>
                <input type="hidden" name = "custid" value='<?php echo $formfield['mycustid'] ?>'>
                <input type="submit" name = "thesubmit" value="Enter">
            </fieldset>
        </form>
        <?php
            } else if ($showform == 2) {
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="theform">
            <fieldset>
                <table>
                    <tr>
                        <th>* Required</th>
                    </tr>
                    <tr>
                        <td><label>First Name:</label></td>
                        <td><input type="text" name="firstname" id="firstname"
                            value = '<?php echo $formfield['infoFirstName']; ?>'	></td>
                    </tr>
                    <tr>
                        <td><label>Last Name*:</label></td>
                        <td><input type="text" name="lastname" id="lastname"
                            value = '<?php echo $formfield['infoLastName']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Email Address:</label></td>
                        <td><input type="text" name="email" id="email"
                            value = '<?php echo $formfield['infoEmail']; ?>'	></td>
                    </tr>
                    <tr>
                        <td><label>Phone Number*:</label></td>
                        <td><input type="text" name="phone" id="phone"
                            value = '<?php echo $formfield['infoPhoneNumber']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Date of Birth*:</label></td>
                        <td><input type="text" name="birth" id="birth"
                            value = '<?php echo $formfield['infoBirthDate']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Address*:</label></td>
                        <td><input type="text" name="address" id="address"
                            value = '<?php echo $formfield['infoAddress']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>City*:</label></td>
                        <td><input type="text" name="city" id="city"
                            value = '<?php echo $formfield['infoCity']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>State*:</label></td>
                        <td><input type="text" name="state" id="state"
                            value = '<?php echo $formfield['infoState']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Zip*:</label></td>
                        <td><input type="text" name="zip" id="zip"
                            value = '<?php echo $formfield['infoZip']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Insured*:</label></td>
                        <td><input type="text" name="insured" id="insured"
                            value = '<?php echo $formfield['infoInsurance']; ?>'	require></td>
                    </tr>
                    <tr>
                        <td><label>Current Medications/Allergies:</label></td>
                        <td><textarea name="mediAller" id="mediAller"><?php echo $formfield['infoMedicationsAllergies']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Symptoms:</label></td>
                        <td><textarea name="symptoms" id="symptoms"><?php echo $formfield['infoSymptoms']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Subscribe to Newsletter*:</label></td>
                        <td><input type="text" name="news" id="news"
                            value = '<?php echo $formfield['infoNewsletter']; ?>'	require></td>
                    </tr>
                </table>
                <input type="hidden" name = "custid" value='<?php echo $formfield['mycustid'] ?>'>
                <input type="submit" name = "thesubmit" value="Enter">
            </fieldset>
        </form>
        <?php
            } else {
            echo "You do not have permission to update";
            }
        ?>
        <div>
        <?php echo $output ?>
        </div>
    </div>
    <footer>
      &copy; 2019 OrthoSC.org
    </footer>
    </body>
</html>
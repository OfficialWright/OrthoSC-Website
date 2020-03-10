<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Portal | OrthoSC, Myrtle Beach, SC</title>
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.orthosc.org/sites/orthosc.org/themes/practice/favicon/favicon-16x16.png">
  </head>
  <body>
    <?php
      require_once "../php/connect.php";

      if(isset($_POST['thesubmit'])) {
        $formfield['fffullname'] = trim($_POST['fullname']);
        $formfield['ffphone'] = trim($_POST['phone']);
        $formfield['ffemail'] = trim($_POST['email']);
        $formfield['ffaddress'] = trim($_POST['address']);
        
        $sqlselect = "SELECT * from theinfo where (infoLastName like CONCAT('%', :bvname, '%') OR infoFirstName like CONCAT('%', :bvname, '%'))
                        AND infoEmail like CONCAT('%', :bvemail, '%')
                        AND infoPhoneNumber like CONCAT('%', :bvphone, '%')
                        AND (infoAddress like CONCAT('%', :bvaddress, '%') OR infoCity like CONCAT('%', :bvaddress, '%')
                        OR infoState like CONCAT('%', :bvaddress, '%') OR infoZip like CONCAT('%', :bvaddress, '%'))";
        $result = $db->prepare($sqlselect);
        $result->bindValue(':bvname', $formfield['fffullname']);
        $result->bindValue(':bvphone', $formfield['ffphone']);
        $result->bindValue(':bvemail', $formfield['ffemail']);
        $result->bindValue(':bvaddress', $formfield['ffaddress']);
        $result->execute();
      }
      else {
        $sqlselect = "SELECT * from theinfo";
        $result = $db-> query($sqlselect);
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
          <li><a href="adminPortal.php">Admin Portal</a></li>
        </ul>
      </nav>
    </div>
    <div>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="theform">
        <fieldset>
          <table>
            <tr>
              <td><label>Name:</label></td>
              <td><input type="text" name="fullname" id="fullname"
              value = '<?php echo $formfield['fffullname']; ?>'	></td>
              </td>
            </tr>
            <tr>
              <td><label>Email Address:</label></td>
              <td><input type="text" name="email" id="email"
              value = '<?php echo $formfield['ffemail']; ?>'></td>
            </tr>
            <tr>
              <td><label>Phone Number:</label></td>
              <td><input type="text" name="phone" id="phone"
              value = '<?php echo $formfield['ffphone']; ?>'></td>
            </tr>
            <tr>
              <td><label>Address:</label></td>
              <td><input type="text" name="address" id="address"
              value = '<?php echo $formfield['ffaddress']; ?>'></td>
            </tr>
            <tr>
              <td></td>
              <td style="float: right;"><input type="submit" name = "thesubmit" value="Enter"></td>
            </tr>
            <input style="float: right;" type="button" value="New Potential Patent" onclick="location.href='../php/insert.php';" >
          </table>
        </fieldset>
      </form>
		
		<table id="patientTable">
      <thead>
        <tr>
          <th>Name</th>
          <th>E-Mail</th>
          <th>Phone</th>
          <th>Date of Birth</th>
          <th>Address</th>
          <th>Insured</th>
          <th>News letter</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody id="patientBody">
        <?php 
          while ( $row = $result-> fetch() ) {
            echo '<tr><td>' . $row['infoFirstName'] . ' ' . $row['infoLastName'] . '</td><td>' . $row['infoEmail'] . 
            '</td><td>' . $row['infoPhoneNumber'] . '</td><td>' . $row['infoBirthDate'] . '</td><td>' . $row['infoAddress'] . ', ' . $row['infoCity'] . 
            ', ' . $row['infoState'] . ', ' . $row['infoZip'] . '</td><td>' . $row['infoInsurance'] . '</td><td>' . $row['infoNewsletter'] . '</td><td>' .
            
            '<form action = "../php/update.php" method = "post">
              <input type = "hidden" name = "custid" value = "'
              . $row['infoKey'] . 
              '"><input type="submit" name = "theedit" value="Edit">
				    </form>'
            
            . '</td></tr>';
          }
		    ?>
      </tbody>
      </table>
    </div>
    <footer>
      &copy; 2019 OrthoSC.org
    </footer>
    </body>
</html>

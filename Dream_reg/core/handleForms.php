<?php 

require_once 'dbConfig.php'; 
require_once 'model.php';

if (isset($_POST['insert_btn'])) {
	$FirstName = trim($_POST['FirstName']);
	$LastName = trim($_POST['LastName']);
	$Specialization = trim($_POST['Specialization']);
	$Licensenum = trim($_POST['License_number']);
	$Address = trim($_POST['Address']);
	$Contact = trim($_POST['ContactNum']);
    $Email = trim($_POST['Email']);


    $Date = date('Y-m-d H:i:s');

	if (!empty($FirstName) && !empty($LastName) && !empty($Specialization) && !empty($Licensenum) && !empty($Address) && !empty($Contact) && !empty($Email) && !empty($Date)) {
    $query = insertIntoDocReg($pdo, $FirstName, $LastName, $Specialization, $Licensenum, $Address, $Contact, $Email, $Date);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['edit_btn'])) {
    $Doctor_id = isset($_POST['Doctor_id']) ? $_POST['Doctor_id'] : '';
	$FirstName = trim($_POST['FirstName']);
	$LastName = trim($_POST['LastName']);
	$Specialization = trim($_POST['Specialization']);
	$License_number = trim($_POST['License_number']);
	$Address = trim($_POST['Address']);
	$ContactNum = trim($_POST['ContactNum']);
	$Email = trim($_POST['Email']);

    var_dump($_POST);

	if (!empty($Doctor_id) && !empty($FirstName) && !empty($LastName) && !empty($Specialization) && !empty($License_number) && !empty($Address) && !empty($ContactNum) && !empty($Email)) {

		$query = updateDoctors($pdo, $Doctor_id, $FirstName, $LastName, $Specialization, $License_number, $Address, $ContactNum, $Email);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}
	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['delete_btn'])) {

	$query = deleteDoctors($pdo, $_GET['Doctor_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}

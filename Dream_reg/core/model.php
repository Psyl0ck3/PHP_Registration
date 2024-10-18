<!-- Functions for interacting with the database -->

<?php 

require_once 'dbConfig.php';

function insertIntoDocReg($pdo, $FirstName, $LastName, $Specialization, $License_number, $Address, $ContactNum, $Email, $date_added) {
    $sql = "INSERT INTO doc_reg (FirstName, LastName, Specialization, License_number, Address, ContactNum, Email, date_added) 
            VALUES (:FirstName, :LastName, :Specialization, :License_number, :Address, :ContactNum, :Email, :date_added)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':FirstName', $FirstName);
    $stmt->bindParam(':LastName', $LastName);
    $stmt->bindParam(':Specialization', $Specialization);
    $stmt->bindParam(':License_number', $License_number);
    $stmt->bindParam(':Address', $Address);
    $stmt->bindParam(':ContactNum', $ContactNum);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':date_added', $date_added);

    return $stmt->execute();
}

function seeAllDocReg($pdo) {
	$sql = "SELECT * FROM doc_reg";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getDoctorsID($pdo, $Doctor_id) {
	$sql = "SELECT * FROM doc_reg WHERE Doctor_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$Doctor_id])) {
		return $stmt->fetch();
	}
}

function updateDoctors($pdo, $Doctor_id, $FirstName, $LastName, $Specialization, $License_number, $address, $ContactNum, $Email) {

	$sql = "UPDATE doc_reg 
				SET FirstName = ?, 
					LastName = ?, 
					Specialization = ?, 
					License_number = ?, 
					address = ?, 
					ContactNum = ?, 
					Email = ? 
			WHERE Doctor_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$FirstName, $LastName, $Specialization, $License_number, $address, $ContactNum, $Email, $Doctor_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteDoctors($pdo, $Doctor_id) {

	$sql = "DELETE FROM doc_reg WHERE Doctor_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$Doctor_id]);

	if ($executeQuery) {
		return true;
	}

}




?>
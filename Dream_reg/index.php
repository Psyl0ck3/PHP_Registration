<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/model.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mystic Falls Doctor Registration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			font-family: "Arial";
			
		}
		input {
			font-size: 1em;
			height: 4.5vh;
			width: 15vw;
			border-radius: 8px;
			color: white;
		}

		button {
			color: white;
			padding: 0.7em 1.7em;
			font-size: 18px;
			border-radius: 0.5em;
			cursor: pointer;
			border: 1px solid #e8e8e8;
			transition: all 0.3s; 
			background-color: red;
			margin-left: 13vw;
			margin-top: 3vh;
		}
		
		button:active {
		color: #666;
		box-shadow: inset 4px 4px 12px #c5c5c5, inset -4px -4px 12px #ffffff;
		}

		table, th, td {
		  border: 2px solid #241571;
		  color: black; 
		}

		.container-form {
			padding: 20px;
			border-radius: 22px;
			background: linear-gradient(145deg, #e6e6e6, #ffffff);
			box-shadow:  24px 24px 48px #d9d9d9,
             -24px -24px 48px #ffffff;
		}

		.navbar{
			background-color: RGB (106, 179, 210);
		}

		.col-12 {
			padding-top: 3%;
		}

		.navbar-text {
			font-weight: 1000;
		}

		.delete {
			padding: 2px;
			color: white;
			background-color: red;
			border-radius: 5px;
		}

		.edit {
			padding: 2px;
			color: white;
			background-color: #0275d8;
			border-radius: 5px;
		}

		
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="mysticlogo.png" alt="Logo" width="85px" height="85px" class="d-inline-block align-text-top">
            </a>

            <span class="navbar-text">
                Mystic Falls Hospital Doctor Records
            </span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	<div class="container">
		<div class="col-12">
		<div class="container-form">
    <form action="core/handleForms.php" method="POST">
        <div class="row">
            <!-- Left Column -->
					<div class="col-md-6">
						<input type="hidden" name="Doctor_id" value="<?php echo isset($getDoctorsID['Doctor_id']) ? $getDoctorsID['Doctor_id'] : ''; ?>">
						<div class="mb-3">
							<label for="FirstName" class="form-label">First Name</label>
							<input type="text" class="form-control" name="FirstName">
						</div>
						<div class="mb-3">
							<label for="LastName" class="form-label">Last Name</label>
							<input type="text" class="form-control" name="LastName">
						</div>
						<div class="mb-3">
							<label for="Specialization" class="form-label">Specialization</label>
							<input type="text" class="form-control" name="Specialization">
						</div>
						<div class="mb-3">
							<label for="License_number" class="form-label">License Number</label>
							<input type="text" class="form-control" name="License_number">
						</div>
					</div>

					<!-- Right Column -->
					<div class="col-md-6">
						<div class="mb-3">
							<label for="Address" class="form-label">Address</label>
							<input type="text" class="form-control" name="Address">
						</div>
						<div class="mb-3">
							<label for="ContactNum" class="form-label">Contact number</label>
							<input type="text" class="form-control" name="ContactNum">
						</div>
						<div class="mb-3">
							<label for="Email" class="form-label">Email</label>
							<input type="email" class="form-control" name="Email">
						</div>
						<div class="mb-3">
							<button type="submit" name="insert_btn">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>

			
		</div>
		<div class="col-12">
			<table style="width:68vw; margin-top: 50px; text-align: center;">
				<tr>
					<th>Doctor ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Specialization</th>
					<th>License number</th>
					<th>Address</th>
					<th>Contact_num</th>
					<th>Email</th>
					<th>Date</th>
				</tr>

				<?php $seeAllDocReg = seeAllDocReg($pdo); ?>
				<?php foreach ($seeAllDocReg as $row) { ?>
				<tr>
					<td><?php echo $row['Doctor_id']; ?></td>
					<td><?php echo $row['FirstName']; ?></td>
					<td><?php echo $row['LastName']; ?></td>
					<td><?php echo $row['Specialization']; ?></td>
					<td><?php echo $row['License_number']; ?></td>
					<td><?php echo $row['Address']; ?></td>
					<td><?php echo $row['ContactNum']; ?></td>
					<td><?php echo $row['Email']; ?></td>
					<td><?php echo $row['date_added']; ?></td>
					<td>
						<a href="Edit.php?Doctor_id=<?php echo $row['Doctor_id'];?>" class="edit">Edit</a>
						<a href="Delete.php?Doctor_id=<?php echo $row['Doctor_id'];?>" class="delete">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</body>
</html>
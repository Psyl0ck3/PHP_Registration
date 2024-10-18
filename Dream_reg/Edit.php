<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/model.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit record</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			font-family: "Arial";
		}
		.container {
			margin-top: 30px;
		}
		button {
			color: white;
			padding: 0.7em 1.7em;
			font-size: 18px;
			border-radius: 0.5em;
			cursor: pointer;
			border: 1px solid #e8e8e8;
			transition: all 0.3s;
			margin-left: 13vw;
			margin-top: 3vh;
		}
		button:active {
			color: #666;
			box-shadow: inset 4px 4px 12px #c5c5c5, inset -4px -4px 12px #ffffff;
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

	<?php $getDoctorsID = getDoctorsID($pdo, $_GET['Doctor_id']); ?>
	
	<div class="container">
		<form action="core/handleForms.php" method="POST">
			<div class="row">
				<!-- Left Column -->
				<div class="col-md-6">
					<input type="hidden" name="Doctor_id" value="<?php echo $getDoctorsID['Doctor_id']; ?>">

					<div class="mb-3">
						<label for="FirstName" class="form-label">First Name</label>
						<input type="text" class="form-control" name="FirstName" value="<?php echo $getDoctorsID['FirstName']; ?>">
					</div>

					<div class="mb-3">
						<label for="LastName" class="form-label">Last Name</label>
						<input type="text" class="form-control" name="LastName" value="<?php echo $getDoctorsID['LastName']; ?>">
					</div>

					<div class="mb-3">
						<label for="Specialization" class="form-label">Specialization</label>
						<input type="text" class="form-control" name="Specialization" value="<?php echo $getDoctorsID['Specialization']; ?>">
					</div>

					<div class="mb-3">
						<label for="License_number" class="form-label">License number</label>
						<input type="text" class="form-control" name="License_number" value="<?php echo $getDoctorsID['License_number']; ?>">
					</div>
				</div>

				<!-- Right Column -->
				<div class="col-md-6">
					<div class="mb-3">
						<label for="Address" class="form-label">Address</label>
						<input type="text" class="form-control" name="Address" value="<?php echo $getDoctorsID['Address']; ?>">
					</div>

					<div class="mb-3">
						<label for="ContactNum" class="form-label">Contact Number</label>
						<input type="text" class="form-control" name="ContactNum" value="<?php echo $getDoctorsID['ContactNum']; ?>">
					</div>

					<div class="mb-3">
						<label for="Email" class="form-label">Email</label>
						<input type="text" class="form-control" name="Email" value="<?php echo $getDoctorsID['Email']; ?>">
					</div>

					<div class="mb-3">
						<button type="submit" class="btn btn-primary" name="edit_btn">Submit Edit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

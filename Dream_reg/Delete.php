<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/model.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Record</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}

		.text-center {
			margin-top: 10vh;
			border-radius: 38px;
			background: #f0f0f0;
			box-shadow:  32px 32px 64px #cccccc,
						-32px -32px 64px #ffffff;
			padding: 25px;
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
	<div class="container vh-50 d-flex justify-content-center">
        <div class="text-center">
            <h3>Are you sure you want to delete this user?</h3>
            <?php $getDoctorsID = getDoctorsID($pdo, $_GET['Doctor_id']); ?>
            <form action="core/handleForms.php?Doctor_id=<?php echo $_GET['Doctor_id']; ?>" method="POST">
                <div class="container-docs">
                    <p>First Name: <?php echo $getDoctorsID['FirstName']; ?></p>
                    <p>Last Name: <?php echo $getDoctorsID['LastName']; ?></p>
                    <p>Specialization: <?php echo $getDoctorsID['Specialization']; ?></p>
                    <p>License number: <?php echo $getDoctorsID['License_number']; ?></p>
                    <p>Address: <?php echo $getDoctorsID['Address']; ?></p>
                    <p>Contact number: <?php echo $getDoctorsID['ContactNum']; ?></p>
                    <p>Email: <?php echo $getDoctorsID['Email']; ?></p>
                    <input type="submit" name="delete_btn" value="Delete" class="btn btn-danger"> <!-- Add Bootstrap button style -->
                </div>
            </form>
        </div>
    </div>
</body>
</html>
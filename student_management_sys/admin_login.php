<?php
session_start();
include('connect.php');

$error_message = '';

if (isset($_POST['login'])) {
    $adminname = trim($_POST['adminname']);
    $adminpassword = trim($_POST['adminpass']);


    if (empty($adminname) || empty($adminpassword)) {
        $error_message = 'Both fields are required.';
    } else {
        $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_name = ?");
        $stmt->bind_param("s", $adminname);
        $stmt->execute();
        $result = $stmt->get_result();
        $fetch = $result->fetch_assoc();

        if ($fetch) {
            if ($adminname == $fetch['admin_name'] && $adminpassword == $fetch['admin_password']) {
                $_SESSION['admin_name'] = $adminname;
                header('Location: home.php');
                exit();
            } else {
                $error_message = 'Incorrect Password. Try again.';
            }
        } else {
            $error_message = 'Unknown User.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <title>LOGIN HERE AS ADMIN</title>
</head>
<body class="bg-light">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 30rem;">
            <fieldset>
                <legend class="text-center mb-4"><b>LOGIN HERE AS ADMIN</b></legend>
                <?php if ($error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="adminname" class="form-label">Admin Name:</label>
                        <input type="text" id="adminname" name="adminname" placeholder="Enter your name" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="adminpass" class="form-label">Admin Password:</label>
                        <input type="password" id="adminpass" name="adminpass" placeholder="Enter your password" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="submit" name="login" value="LOGIN" class="btn btn-success">
                        <a href="index.php" class="btn btn-dark">BACK</a>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</body>
</html>

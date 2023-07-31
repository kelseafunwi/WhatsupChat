<?php
    session_start();

    if (isset($_SESSION['whatsupchat_session_id'])) {
        header("Location: ./chatpage.php");
        exit;
    }

    // setting field default values
    $fullname = isset($_GET['fullname']) ? $_GET['fullname'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $error = isset($_GET['error']) ? $_GET['error'] : '';
    $message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="../vendor/aos/aos.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="favicon" href="../assets/images/Screenshot 2023-07-16 at 21-06-13 Whatsup Chat.png">
    <title>Whatsup Chat</title>
</head>
<body class="d-flex vh-100 justify-content-center align-items-center bg-secondary">
   <section class="credentials">
        <div class="container-fluid">
            <form action="../Actions/register.php" method="POST">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-8 col-sm-12">
                        <div class="row d-flex align-items-center justify-content-around">
                            <div class="chatbox shadow">

                                <div class="my-2 mb-3 text-center">
                                    <img src="../assets/images/Screenshot 2023-07-16 at 21-06-13 Whatsup Chat.png" alt="">
                                </div>

                                <?php if ($error) { ?>
                                    <div>
                                        <div id="alert" class="alert alert-warning">
                                            <?= $error ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="input-group mb-3">
                                    <input type="text" name="fullname" id="fullname" placeholder="Full Name" class="form-control" autocomplete="off" value="<?= $fullname ?>">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <input name="email" id="email" type="email" placeholder="Email" class="form-control" autocomplete="off" value="<?= $email ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="password" placeholder="Password" name="password" class="form-control" >
                                    <span id="tooglePassvisibility"><i class="bi bi-eye"></i></span>
                                </div>

                                <div class="input-group mb-3">
                                    <input name="passwordconfirm" type="password" placeholder="Confirm Password" class="form-control" >
                                    <span id="tooglePassvisibility"><i class="bi bi-eye"></i></span>
                                </div>

                                <div class="already">
                                    Already have an account ?<a class="link" href="./login.php">Login</a>
                                </div>

                                <div class="text-center mt-2">
                                    <button class="btn btn-primary btn-lg shadow" type="submit">Create Account</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
   </section> 

   <script src="../vendor/fontawesome/js/all.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../vendor/aos/aos.js"></script>
    <script>
        $(document).ready(function () {
            
        });
    </script>
    <script src="../assets/js/index.js"></script>
</body>
</html>
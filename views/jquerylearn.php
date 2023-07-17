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
    <title>Whatsup Chat</title>
</head>
<body>
   <section class="container-fluid">
        <ul class="menu">
            <li class="selected">Home</li>
            <li>Blog</li>
            <li>About</li>
        </ul>
   </section> 

    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../vendor/aos/aos.js"></script>
    <script>
        $(document).ready(function () {
           $('#messageForm').submit(function (event) {
                event.preventDefault();
                var form = $(this); //cached for reuse
                $.ajax({
                    method: 'POST',
                    url: form.attr('action'),
                    $data: form.serialize(),
                    success: function (data) {
                        alert("it was successful and the server responded "+ data);
                    },
                    error: function (error) {
                        alert("An error with status code "+ error + " occured");
                    }
                });
           });

           $.ajax({
                url: 'url.php',
                data: {something: "something"}
           }).success(function(data) {
                alert("success");
           }).fail(function (jqXHR, textStatus) {
                alert("i failed");
           });
        });
    </script>
    <script src="../assets/js/index.js"></script>
</body>
</html>
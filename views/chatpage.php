<?php
    session_start();

    if (!isset($_SESSION['whatsupchat_session_id'])) {
        header("Location: login.php");
        exit;
    }

    // including the database configuration file
    include '../config/dbConnection.php';

    // include the user helper file that will provide methods to get and process information about the user
    include '../helpers/users.php';

    // Converts the online time into a string the user can understand
    include '../helpers/timeAgo.php';

    // Mark all the messages here as opened once we get in here
    include '../helpers/opened.php';


    // the conversation helper file will help us retrieve information that we will use to fill the configuration
    include '../helpers/conversation.php';

    if (isset($_GET['user'])) {
        $chatWith = getUserFromid($_GET['user'], $conn);
    } else {
        header("Location: chatpage.php?user=".$_SESSION['whatsupchat_session_id']);
        exit;
    }
    $allUsers = getAllUsers($conn);

    include '../helpers/chats.php';

    $chats = getChats($chatWith['user_id'], $_SESSION['whatsupchat_session_id'], $conn);

    $allConversation = getConversation($_SESSION['whatsupchat_session_id'], $conn);

    opened($chatWith['user_id'], $chats, $conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../vendor/remixicon/remixicon.css">
    <link rel="stylesheet" href="../vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="../vendor/aos/aos.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title> (2) Whatsup Chat</title>
</head>
<body class="vh-100 chatbody overflow-hidden">
<section id="chatpage" class="chatpage h-100 container-fluid">
        <div class="h-100 d-flex">
            <div class="users h-100 flex-column d-none d-md-flex">
                <header class="w-100 d-flex">
                    <div class="profile">
                        <a href="./settings.php"><i class="bg-secondary text-light bi bi-person-fill"></i></a>
                    </div>
                    <div class="ms-auto righticons d-flex align-middle align-items-center">
                        <a href="#" title="New Chat"><i class="bi bi-chat-left-text"></i></a>
                        <a href="#" title="Menu"><i class="bi bi-three-dots-vertical"></i></a>
                    </div>
                </header>
                <div class="search-div mb-2 text-center d-flex align-items-center justify-content-center">
                    <input id="searchField" class="form-control mt-2" type="text" placeholder="Search or start a new chat" name="searchField">
                </div>

                <div class="people-list">

                    <?php foreach($allUsers as $user) {?>

                        <div class="userbox">
                            <a class="d-flex" href="chatpage.php?user=<?= $user['user_id'] ?>">
                                <div class="profile">
                                    <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                                </div>

                                <span class="mt-2 ps-3"><span class="name"><?= $user['fullname'] ?> </span> <br /> <span class="message"><?= getUserLastMessage($_SESSION['whatsupchat_session_id'], $user['user_id'], $conn);?></span></span> 
                            </a>
                        </div>

                        <hr />

                    <?php } ?>
                </div>
            </div>
            <div class="content h-100 d-flex flex-column">
                <header class="w-100 d-flex">
                    <button class="btnPerson" type="submit">
                        <div class="profile d-flex">
                            <a href="./settings.php">
                                <i class="bg-secondary text-light bi bi-person-fill"></i>
                            </a>
                            <span class="my-auto ps-2" class="name"><?=  $chatWith['fullname'] ?></span>
                        </div>
                    </button>
                    <div class="ms-auto righticons d-flex align-middle align-items-center">
                        <a href="#" title="Search..."><i class="bi bi-search"></i></a>
                        <a href="#" title="Menu"><i class="bi bi-three-dots-vertical"></i></a>
                    </div>
                </header>
                <section id="messages" class="messages">
                    <div id="chatcontainer" class="chat-container mx-auto">
                        <?php if (!empty($chats)) { ?>
                            <?php foreach ($chats as $chat) { 
                                if ($chat['from_id'] == $_SESSION['whatsupchat_session_id'])     {
                                    
                            ?>
                                <div class="message sender">
                                    <p><?= $chat['message']  ?></p>
                                    <span><?= $user['created_at'] ?></span>  
                                </div>
                            <?php } else {  ?>
                                <div class="message receiver">
                                <p><?= $chat['message']  ?></p>
                                <span><?= $user['created_at'] ?></span>  
                                </div>
                            <?php } } ?>
                        <?php } ?>
                    </div>
                </section>
                    <section class="userinput">
                        <div class="w-100 h-100 d-flex align-items-center align-middle">
                            <div class="leftbuttons text-nowrap">
                                <button><i class="ri ri-emotion-line"></i></button>
                                <button><i class="ri ri-attachment-2"></i></button>
                            </div>

                            <div class="inputbox">
                                <textarea id="message" type="text" name="message" placeholder="Type a message" class="form-control"></textarea>
                            </div>

                            <div class="rightbuttons">
                                <button id="sendBtn"><i class="ri-send-plane-2-fill"></i></button>
                            </div>
                        </div>
                    </section>
                </div>
            </div> 
        </div>
   </section> 

    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../vendor/aos/aos.js"></script>
    <script>
        var scrollDown = function () {
            $chatbody = document.getElementById('messages');
            $chatbody.scrollTop =$chatbody.scrollHeight;
        }
        scrollDown();
        
        // transfering the data to the chat ajax when the user clicks send
        $('#sendBtn').on('click', function () {
            let message = $('#message').val();
            console.log(message);
            if (message == ' ' || message == '') return;
            $.post('../ajax/insert.php', 
                {
                    to_id: <?= $chatWith['user_id'] ?>,
                    message:message 
                },
                function (data, status) {
                    $("#message").val("");
                    $('#chatcontainer').append(data);
                    scrollDown();
                }
            );
        });

        let lastSeenUpdate = function () {
            $.get('../ajax/update_last_seen.php');
        }

        lastSeenUpdate();

        setInterval(lastSeenUpdate, 5000);

        let fetchData = function () {
            $.post('../ajax/getMessage.php', 
            {
                to_id: <?= $chatWith['user_id'] ?>,
            },
            function (data, status) {
                $("#chatcontainer").append(data);
                if (data != " ") scrollDown();
            })
        }

        fetchData();

        setInterval(fetchData, 200);
    </script>
    <script src="../assets/js/index.js"></script>
</body>
</html>
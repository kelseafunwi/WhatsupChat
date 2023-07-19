<?php
    session_start();

    if (!isset($_SESSION['session_user_id'])) {
        header("Location: login.php");
        exit;
    }
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
                        <a href="#"><i class="bg-secondary text-light bi bi-person-fill"></i></a>
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
                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />

                    <div class="userbox unread">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />

                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />

                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />

                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />

                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />

                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />

                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />

                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>

                    </div>

                    <hr />

                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />

                    <div class="userbox">
                        <a class="d-flex" href="#">
                            <div class="profile">
                                <i class="bg-secondary  align-middle text-light bi bi-person-fill"></i>
                            </div>

                            <span class="mt-2 ps-3"><span class="name">Funwi Kelsea</span> <br /> <span class="message">Hello how are you doing</span>n</span> 
                        </a>
                    </div>

                    <hr />
                </div>
            </div>
            <div class="content h-100 d-flex flex-column">
                <header class="w-100 d-flex">
                    <button class="btnPerson" type="submit">
                        <div class="profile d-flex">
                            <a href="#">
                                <i class="bg-secondary text-light bi bi-person-fill"></i>
                            </a>
                            <span class="my-auto ps-2" class="name">Funwi Princewill</span>
                        </div>
                    </button>
                    <div class="ms-auto righticons d-flex align-middle align-items-center">
                        <a href="#" title="Search..."><i class="bi bi-search"></i></a>
                        <a href="#" title="Menu"><i class="bi bi-three-dots-vertical"></i></a>
                    </div>
                </header>
                <section class="messages">
                    <div class="chat-container mx-auto">
                        <div class="message receiver">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message sender">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message receiver">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message sender">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message receiver">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message sender">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message receiver">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message sender">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message receiver">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message sender">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message receiver">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message sender">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message receiver">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message sender">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message receiver">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message sender">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message receiver">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>

                        <div class="message sender">
                            <p>Good Morning Sir, How are you doing today ?</p>
                            <span>11:30 am</span>  
                        </div>
                    </section>
                    <section class="userinput">
                        <div class="w-100 h-100 d-flex align-items-center align-middle">
                            <div class="leftbuttons text-nowrap">
                                <button><i class="ri ri-emotion-line"></i></button>
                                <button><i class="ri ri-attachment-2"></i></button>
                            </div>

                            <div class="inputbox">
                                <textarea type="text" name="message" placeholder="Type a message" class="form-control"></textarea>
                            </div>

                            <div class="rightbuttons">
                                <button><i class="ri-send-plane-2-fill"></i></button>
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
        $(document).ready(function () {
            
        });
    </script>
    <script src="../assets/js/index.js"></script>
</body>
</html>
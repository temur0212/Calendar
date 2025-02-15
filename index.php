<?php   session_start(); $ism=$_SESSION['user_name']   ?>
<!DOCTYPE html>
<html>
<head>
<title>Onlayn Calendar</title>

<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
    type="text/javascript"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js"></script>
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"  />
<link rel="stylesheet"
    href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="assets/css/style.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
<script src="assets/js/event.js"></script>
<style>
        body {
    font-family: -apple-system, BlinkMacSystemFont, Roboto, Segoe UI,
        Helvetica Neue, Helvetica, Arial, sans-serif;
    margin: 0 auto;
    -webkit-font-smoothing: antialiased;
    box-sizing: border-box;
    color: #000;
    line-height: 1.5;
    
             }

        nav {
            padding: 10px;
            background-color:#FAF1D1 ;
        }

        .ss {
            margin: 0 10px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 25px;
            color: #000000;
            background-color: #fff;
            border-color: #fff;
            
        }
        .ff {
    background-color: white;
    float: left;
    border-radius: 50%;
        }

        .ss {
            padding: 8px 20px;
            margin: 5px 10px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 25px;
            color: #000000;
            background-color: #fff;
            border-color: #fff;
            
            
        }

        .para{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #000;
            align-items: center;
            text-align: center;
        }
        .avatar {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        }

        .mt-3{
            font-size: 20px;
            font-weight: 600;
        }
        
    </style>
</head>

<body>
          
    <nav>
       <div class="d-flex justify-content-between align-items-center">
       <div class="d-flex justify-content-center align-items-center">
       <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
       <p class="mt-3 mx-2"><?php echo $ism ?></p>
       </div>
        <div>
        <a href="login/index.php"><button class="ss">Login</button></a>
        <a href="login/signup.php"><button class="ss">Sign up</button></a> 
        </div>
       </div>
        
    </nav>
    
    <div class="phppot-container">
        
        <div class="response"></div>
        <div class="row">
            <div id='calendar'></div>
        </div>
    </div>
</body>
</html>
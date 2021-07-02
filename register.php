<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="css/register.css" type="text/css">
    <!-- for icon -->
    <link href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" rel="stylesheet">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    
</head>
<body> 
    <!-- <div class="hero">
        <div class="form-box">
            <div class="button-box"> 
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Sign In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" class="input-group" name="submission">
                <input type="text" class="input-field" id="username" placeholder="Username" required>
                <input type="password" class="input-field" id="password" placeholder="Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="button" class="submit-btn" onclick="getInfo()">Sign in</button>
                
            </form>
            <h6><a href="index.html">back to home</a></h6>
            <form id="register" class="input-group">
                <input type="text" class="input-field" placeholder="Username" required>
                <input type="email" class="input-field" placeholder="Email" required>
                <input type="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span>I agree to the T&C</span>
                <button type="submit" class="submit-btn">Register</button>
            </form>
            
        </div>
        
    </div> -->
    <!-- Modal -->
    <!-- id is linked to data-bs-target value of the button-->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="register">Login/Register</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
        <div class="hero">
        <div class="form-box">
            <div class="button-box"> 
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Sign In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" class="input-group" name="submission">
                <input type="text" class="input-field" id="username" placeholder="Username" required>
                <input type="password" class="input-field" id="password" placeholder="Password" required>
                <input type="checkbox" class="check-box"><span class="span">Remember Password</span>
                <button type="button" class="submit-btn" onclick="getInfo()">Sign in</button>
                
            </form>
            <h6><a href="index.html">back to home</a></h6>
            <form id="register" class="input-group">
                <input type="text" class="input-field" placeholder="Username" required>
                <input type="email" class="input-field" placeholder="Email" required>
                <input type="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span class="span">I agree to the T&C</span>
                <button type="submit" class="submit-btn">Register</button>
            </form>
            
        </div>
        
    </div>


            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="noodlecart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div> -->
    <script src="register.js"></script>

</body>
</html>
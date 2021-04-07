<?php
    session_start();
    require '../Connection/insertt.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title> Login Page </title>

    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300&display=swap" rel="stylesheet">
    
    <link href="CSS/login.css" type="text/css" rel="stylesheet">

</head>
<body>
<nav>
    <div class="logo">
    <i class="fas fa-book-open"></i>
    LIBRARY MANAGEMENT SYSTEM
    </div>
    <div class="admin">
        <a href="../Admin/admin_login.php">Admin</a>
    </div>
    <div class="abus">
        <a href="#">About Us</a>
    </div>
</nav>
<!-- login form -->
    <div id="main">
    <form class="myform" method="POST" autocomplete="off">
        <h1><i class="fas fa-user-circle"></i></h1>
        
        <br>
        <div class="inputval">
        <i class="fas fa-user"></i>
        <input name="mail" class="inputvalue" type="email" placeholder="Email">
        </div>
        <br>
        <div class="inputval">
        <i class="fas fa-lock"></i>
        <i class="far fa-eye" id="togglePassword"></i>
        <input name="password" id="password" class="inputvalue" type="password" placeholder="Password">
        </div>
        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
    
            togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
            });
        </script>
        

        <div clas="loginBtn">
            <input name="login" class="loginval" type="submit" value="LOGIN">
        </div>

        <div class="resetpas">
            <a id="Btn"> RESET PASSWORD?</a>
        </div>
        
        

        <div class="signup">
            <p>If not have an account? Select status and </p>
            <input type="submit" class="signupBtn" name="signup_btn" value="Sign In">

            <div class="radio">
                <input type="radio" name="st" value="Student">Student
                <input type="radio" name="st" value="Teacher">Teacher
            </div>
        </div>
    </form>
    </div>  

    <!-- reset password modal -->
    <div class="mymodal" id="modal">
        <div class="modalcontent">
        <span class="close"><i class="fa fa-times" aria-hidden="true"></i></span>
            <form name="myform" method="POST">
                <h1>Change Password</h1>

                <div class="inputvall">
                <input type="text" class="input" name="username" placeholder="Email" required>
                </div>
                
                <div class="inputvall">
                <i class="far fa-eye" id="rtogglePassword"></i>
                <input type="password" id="resetpas" class="input" name="resetpas" placeholder="Password" required>
                </div>
                <script>
                    const rtogglePassword = document.querySelector('#rtogglePassword');
                    const rpassword = document.querySelector('#resetpas');
    
                    rtogglePassword.addEventListener('click', function (e) {
                        // toggle the type attribute
                    const type = rpassword.getAttribute('type') === 'password' ? 'text' : 'password';
                    rpassword.setAttribute('type', type);
                    // toggle the eye slash icon
                    this.classList.toggle('fa-eye-slash');
                    });
                </script>
                
                <div class="inputvall">
                <i class="far fa-eye" id="ctogglePassword"></i>
                <input type="password" id="cresetpas" class="input" name="cresetpas" placeholder="Confirm password" required>
                </div>

                <script>
                    const ctogglePassword = document.querySelector('#ctogglePassword');
                    const cpassword = document.querySelector('#cresetpas');
    
                    ctogglePassword.addEventListener('click', function (e) {
                        // toggle the type attribute
                    const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
                    cpassword.setAttribute('type', type);
                    // toggle the eye slash icon
                    this.classList.toggle('fa-eye-slash');
                    });
                </script>

                <div class="update">
                <input type="submit" class="updateBtn" name="update" value="UPDATE">
                </div>
            </form>
        </div>
    </div>

    <script>
        var modal=document.getElementById("modal");
        var Btn=document.getElementById("Btn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        Btn.onclick=function()
        {
            modal.style.display="block";
        }

        span.onclick = function()
        {
            modal.style.display = "none";
        }

        window.onclick=function(event)
        {
            if(event.target==modal)
            {
                modal.style.display="none";
            }
        }
    </script>
</body>
</html>


<?php
    if(isset($_POST['signup_btn']))
    {
        $status=isset($_POST['st']) ? $_POST['st'] : '';

        if($status == "Student")
        {
            //header('location:../Registration_page/student_signup.php');
            ?>
                <script type="text/javascript"> window.location.href='../Registration_page/student_signup.php'; </script>
            <?php
        }
        else if($status == "Teacher")
        {
            //header('location:../Registration_page/teacher_signup.php');
            ?>
                <script type="text/javascript"> window.location.href='../Registration_page/teacher_signup.php'; </script>
            <?php
        }
        else
        {
            echo '<script type="text/javascript"> alert("Please select your status!") </script>';
        }
    }

//main form
    if(isset($_POST['login']))
    {
        $mail=$_POST['mail'];
        $password=$_POST['password'];

        $query_student = "SELECT * FROM userinfo WHERE email='$mail' AND password='$password'";
        $result1 = pg_query($db_connection,$query_student);

        $query_teacher = "SELECT * FROM teacher WHERE email='$mail' AND password='$password'";
        $result2 = pg_query($db_connection,$query_teacher);

        if(pg_num_rows($result1)>0)
        {
            //valid
            $_SESSION['mailid']=$mail;
            ?>
            <script type="text/javascript"> window.location.href='../Homepage/homepage.php'; </script>
            <?php
        }
        else if(pg_num_rows($result2)>0)
        {
            ?>
            <script type="text/javascript"> window.location.href='../Homepage/homepage.php'; </script>
            <?php
        }
        else
        {
            //invalid
            echo '<script type="text/javascript"> alert("Invalid Username or password") </script>';
        }
    }

?>
<!-- change password modal -->
<?php
    if(isset($_POST['update']))
    {
        $username=$_POST['username'];
        $resetpas=$_POST['resetpas'];
        $cresetpas=$_POST['cresetpas'];

        if($resetpas == $cresetpas)
        {
            $query_student = "SELECT * FROM userinfo WHERE email='$username'";
            $result1 = pg_query($db_connection,$query_student);

            if(pg_num_rows($result1)>0)
            {
                pg_query($db_connection,"UPDATE userinfo SET password='$cresetpas' WHERE email='$username'");
                echo '<script type="text/javascript"> alert("password updated succesfully!") </script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("User Not Found!!") </script>';
            }
        }
        else
        {
            echo '<script type="text/javascript"> alert("password and confirm password does not match!") </script>';
        }      
    }
?>

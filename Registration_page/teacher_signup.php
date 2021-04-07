<?php
    require '../Connection/insertt.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title> Registration </title>

    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
    <link href="CSS/signup.css" type="text/css" rel="stylesheet">
</head>
<body>
    
    <div class="main">
        <h1><a href="teacher_signup.php"><i class="fas fa-user-plus" aria-hidden="true"></i></a></h1>
    <form class="myform" action="teacher_signup.php" method="POST" autocomplete="off">
        
        <div class="inputval">
        <i class="fas fa-user"></i>
        <input name="username" class="inputvalue" type="text" placeholder="Name" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" required>
        </div>

        <div class="inputval">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <input name="email" class="inputvalue" type="email" placeholder="Email-Id" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
        </div>

        <div class="department">
        <i class="fa fa-building" aria-hidden="true"></i>
        <select name="Department" class="dept" required>
            <option disabled selected value="">Department</option>
            <option class="b" value="Computer Science">Computer Science</option>
            <option class="b" value="Microbiology">Microbiology</option>
            <option class="b" value="Animation">Animation</option>
            <option class="b" value="Psychology">Psychology</option>
            <option class="b" value="Mathematics">Mathematics</option>
        </select>
        </div>

        <div class="inputval">
        <i class="fa fa-phone-square" aria-hidden="true"></i>
        <input name="mobile" class="inputvalue" type="text" placeholder="Mobile Number" value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile']; ?>" required>
        </div>

        <div class="inputval">
        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
        <i class="far fa-eye" id="togglePassword"></i>
        <input name="password" id="password" class="inputvalue" type="password" placeholder="Password" required>
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

        <div class="inputval">
        <i class="fas fa-lock"></i>
        <i class="far fa-eye" id="ctogglePassword"></i>
        <input name="cpassword" id="cpassword" class="inputvalue" type="password" placeholder="Confirm Password" required>
        </div>
        <script>
            const ctogglePassword = document.querySelector('#ctogglePassword');
            const cpassword = document.querySelector('#cpassword');
    
            ctogglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            cpassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
            });
        </script>
        
        <input name="signup_btn" class="registerval" type="submit" value="SIGN UP">
        
    </form>
    </div>
    <div class="alusertext">
        <a href="#">Already have an account?</a>
    </div>

    <div class="aluser">    
        <a href="../Login_page/login.php">Sign in</a>
    </div>
</body>
</html>

<?php
    if(isset($_POST['signup_btn']))
    {
    $name=$_POST['username'];
    $email=$_POST['email'];
    $department=$_POST['Department'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $mob="/^\d{10}$/";
        if(!preg_match($mob,$mobile))
        {
            echo '<script> alert("ENTER YOUR 10 DIGIT MOBILE NUMBER!") </script>';
        }
        else if($password==$cpassword)
        {
            $query = "SELECT * FROM teacher WHERE email='$email'";
            $result = pg_query($db_connection,$query);

            if(pg_num_rows($result)>0)
            {
            echo '<script> alert("USER ALREADY EXIST!") </script>';
            }
            else
            {
                $query1 = "INSERT INTO teacher VALUES('$name','$email','$department','$mobile','$password')";
                $result = pg_query($db_connection,$query1);

                if($result)
                {
                    header('location:../Login_page/login.php');
                }
                else
                {
                    echo '<script> alert("ERROR!") </script>';
                }
            }
        }
        else
        {
            echo '<script> alert("PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH!") </script>';
        }
    }
?>

<?php
require '../Connection/insertt.php';
error_reporting(0);


//Students list
    //sort by year
    if(isset($_POST['year']))
    {
        $year = $_POST['year'];
    }
    //sort by department
    if(isset($_POST['department']))
    {
        $dept = $_POST['department'];
    }

    if($dept == "Computer Science" && $year == "FY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Computer Science' AND class='FY'";
    }
    else if($dept == "Microbiology" && $year == "FY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Microbiology' AND class='FY'";
    }
    else if($dept == "Animation" && $year == "FY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Animation' AND class='FY'";
    }
    else if($dept == "Psychology" && $year == "FY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Psychology' AND class='FY'";
    }
    else if($dept == "Mathematics" && $year == "FY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Mathematics' AND class='FY'";
    }
    else if($dept == "Computer Science" && $year == "SY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Computer Science' AND class='SY'";
    }
    else if($dept == "Microbiology" && $year == "SY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Microbiology' AND class='SY'";
    }
    else if($dept == "Animation" && $year == "SY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Animation' AND class='SY'";
    }
    else if($dept == "Psychology" && $year == "SY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Psychology' AND class='SY'";
    }
    else if($dept == "Mathematics" && $year == "SY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Mathematics' AND class='SY'";
    }
    else if($dept == "Computer Science" && $year == "TY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Computer Science' AND class='TY'";
    }
    else if($dept == "Microbiology" && $year == "TY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Microbiology' AND class='TY'";
    }
    else if($dept == "Animation" && $year == "TY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Animation' AND class='TY'";
    }
    else if($dept == "Psychology" && $year == "TY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Psychology' AND class='TY'";
    }
    else if($dept == "Mathematics" && $year == "TY")
    {
        $query = "SELECT * FROM userinfo WHERE department='Mathematics' AND class='TY'";
    }
    else if($year == "FY")
    {
        $query = "SELECT * FROM userinfo WHERE class='FY'";
    }
    else if($year == "SY")
    {
        $query = "SELECT * FROM userinfo WHERE class='SY'";
    }
    else if($year == "TY")
    {
        $query = "SELECT * FROM userinfo WHERE class='TY'";
    }
    else if($dept == "Computer Science")
    {
        $query = "SELECT * FROM userinfo WHERE department='Computer Science'";
    }
    else if($dept == "Microbiology")
    {
        $query = "SELECT * FROM userinfo WHERE department='Microbiology'";
    }
    else if($dept == "Animation")
    {
        $query = "SELECT * FROM userinfo WHERE department='Animation'";
    }
    else if($dept == "Psychology")
    {
        $query = "SELECT * FROM userinfo WHERE department='Psychology'";
    }
    else if($dept == "Mathematics")
    {
        $query = "SELECT * FROM userinfo WHERE department='Mathematics'";
    }
    else
    {
        $query = "SELECT * FROM userinfo";
    }
    $result = pg_query($db_connection,$query);


    if(isset($_POST['student']))
    {
        echo '<table border="3px">';
        echo '<tr>';
        echo '<th>'; echo 'Name'; echo '</th>';
        echo '<th>'; echo 'Email'; echo '</th>';
        echo '<th>'; echo 'Class'; echo '</th>';
        echo '<th>'; echo 'Roll No'; echo '</th>';
        echo '<th>'; echo 'Department'; echo '</th>';
        echo '<th>'; echo 'Mobile No'; echo '</th>';
        echo '</tr>';

        while($data = pg_fetch_assoc($result))
        {
            echo '<tr>';
            echo '<td>'; echo $data['name']; echo '</td>';
            echo '<td>'; echo $data['email']; echo '</td>';
            echo '<td>'; echo $data['class']; echo '</td>';
            echo '<td>'; echo $data['rollno']; echo '</td>';
            echo '<td>'; echo $data['department']; echo '</td>';
            echo '<td>'; echo $data['phone']; echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

//Teachers List
    $query1 = "SELECT * FROM teacher";
    $result1 = pg_query($db_connection,$query1);
    if(isset($_POST['teacher']))
    {
        echo '<table border="3px">';
        echo '<tr>';
        echo '<th>'; echo 'Name'; echo '</th>';
        echo '<th>'; echo 'Email'; echo '</th>';
        echo '<th>'; echo 'Department'; echo '</th>';
        echo '<th>'; echo 'Mobile No'; echo '</th>';
        echo '</tr>';

        while($data = pg_fetch_assoc($result1))
        {
            echo '<tr>';
            echo '<td>'; echo $data['name']; echo '</td>';
            echo '<td>'; echo $data['email']; echo '</td>';
            echo '<td>'; echo $data['department']; echo '</td>';
            echo '<td>'; echo $data['phone']; echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

//books
    $query2 = "SELECT * FROM books";
    $sort = "SELECT * FROM books ORDER BY id";
    $result2 = pg_query($db_connection,$sort);

    if(isset($_POST['books']))
    {
        echo '<table border="3px">';
        echo '<tr>';
        echo '<th>'; echo 'Book_Id'; echo '</th>';
        echo '<th>'; echo 'Book_name'; echo '</th>';
        echo '<th>'; echo 'Author'; echo '</th>';
        echo '<th>'; echo 'Price'; echo '</th>';
        echo '<th>'; echo 'Quantity'; echo '</th>';
        echo '</tr>';

        while($data = pg_fetch_assoc($result2))
        {
            echo '<tr>';
            echo '<td>'; echo $data['id']; echo '</td>';
            echo '<td>'; echo $data['name']; echo '</td>';
            echo '<td>'; echo $data['author']; echo '</td>';
            echo '<td>'; echo $data['price']; echo '</td>';
            echo '<td>'; echo $data['quantity']; echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
?>

//sjdbishdijsbd

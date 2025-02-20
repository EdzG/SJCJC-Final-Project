<?php 
 
    $page = 'home';
    require_once 'includes/header.php';


 
require_once 'includes/dbh-action.php';



//$_SESSION['userId'] = 'SISE-13325';
// $_SESSION['admin'] = "1082019180";


if (isset($_SESSION["userId"])) {

    $userId = $_SESSION['userId'];
    echo '<div class="userInfo">';

  
    echo " <div class='driverLic'>";
    echo "<h1>User Information </h1> ";
    echo "<h2 id='DL'>Driver's License </h2>";
    echo "<div class='sidenav'>
    <a href='#DL'>Driver's License</a>
    <a href='#CL'>Car License(s) Info</a>
    <a href='#Ticket'>Tickets</a>
    <a href='#TR'>TicketsReceipt</a>
    </div>";


    $sql = "SELECT LIC, FName, LName, DOB, IssueDate, ExpireDate, Class, BloodType, Sex, EyeColor, Height, Weight, Address, Region, Image, Signature, TrafficManager  FROM driverlicense WHERE LIC = '$userId'";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        // output data of each row
        
       
        while($rows = $results->fetch_assoc()) {
            ?>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['Image']); ?>" class="userImg"/> <br> <?php
            echo 'License Number: ';
            echo $rows['LIC'];
            echo "<br>";
            echo 'First Name: ';
            echo $rows['FName'];
            echo "<br>";
            echo 'Last Name: ';
            echo $rows['LName'];
            echo "<br>";
            echo 'DOB: ';
            echo $rows['DOB'];
            echo "<br>";
            echo 'Issue Date: ';
            echo $rows['IssueDate'];
            echo "<br>";
            echo 'Expire Date: ';
            echo $rows['ExpireDate'];
            echo "<br>";
            echo 'Class: ';
            echo $rows['Class'];
            echo "<br>";
            echo 'Blood Type: ';
            echo $rows['BloodType'];
            echo "<br>";
            echo 'Sex: ';
            echo $rows['Sex'];
            echo "<br>";
            echo 'Eye Color: ';
            echo $rows['EyeColor'];
            echo "<br>";
            echo 'Height: ';
            echo $rows['Height'];
            echo "<br>";
            echo 'Weight: ';
            echo $rows['Weight'];
            echo "<br>";
            echo 'Address: ';
            echo $rows['Address'];
            echo "<br>";
            echo 'Region: ';
            echo $rows['Region'];
            ?>
            <br> <p>Signature: </p> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['Signature']); ?>" class="userImg"/> <br> 

            <br> <p>Traffic Manager Signature: </p> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['TrafficManager']); ?>" class="userImg"/> <br> <?php

            echo "<br> <br>";
            
        }

    }else {
        echo "Error getting Driver's license Information";
    }
    echo '</div>';


    echo '<div class="carLic"><h2 id="CL">Car License(s) Info</h2>';
    $sql = "SELECT LicPlate, LIC, ExpireDate, VIN, Region, Brand, Model  FROM carlicense WHERE LIC = '$userId'";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        // output data of each row
       
        while($rows = $results->fetch_assoc()) {
            echo 'License Plate Number: ';
            echo $rows['LicPlate'];
            echo "<br>";
            echo 'Expire Date: ';
            echo $rows['ExpireDate'];
            echo "<br>";
            echo 'VIN: ';
            echo $rows['VIN'];
            echo "<br>";
            echo 'Place Registered: ';
            echo $rows['Region'];
            echo "<br>";
            echo 'Vehicle Brand: ';
            echo $rows['Brand'];
            echo "<br>";
            echo 'Vehicle Model: ';
            echo $rows['Model'];
            echo '<br> <br>';
            
        }
         
    } else {
        echo "Could not get your car information!";
    }
    echo '</div>';

    echo '<div class="tkt"><h2 id="Ticket"> Tickets </h2>';

    $sql = "SELECT TicketNo, LIC, PID, Date, Time, Day, Location, Deadline, Violation, Fine, Comment, State  FROM ticket WHERE LIC = '$userId' ORDER BY State, Deadline  ASC";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        // output data of each row
       
        while($rows = $results->fetch_assoc()) {
            echo 'Ticket Number: ';
            echo $rows['TicketNo'];
            echo "<br>";
            echo 'License Number: ';
            echo $rows['LIC'];
            echo "<br>";
            echo 'Id Number of Police who issued the ticket: ';
            echo $rows['PID'];
            echo "<br>";
           
            echo 'Date Issued: ';
            echo $rows['Date'];
            echo "<br>";
            echo 'Time Issued: ';
            echo $rows['Time'];
            echo "<br>";
            echo 'Day Issued: ';
            echo $rows['Day'];
            echo "<br>";
            echo 'Location: ';
            echo $rows['Location'];
            echo "<br>";
            echo 'Deadline: ';
            if ($rows['State'] == 0) {
                echo "<span class='status'>".$rows['Deadline']."</span>";
            echo "<br>";
            }
            else if ($rows['State'] == 1) {
                echo $rows['Deadline'];
                echo "<br>";
            }
            
            echo 'Violation: ';
            echo $rows['Violation'];
            echo "<br>";
            echo 'Fine: ';
            echo $rows['Fine'];
            echo "<br>";
            echo 'Comments: ';
            echo $rows['Comment']; echo "<br>";
            echo 'Status: ';
            if ($rows['State'] == 0) {
                echo '<span class="status">Unpaid</span>';
                echo '<a class="dropdown-item unpaid" href="pay_ticket.php">Pay Ticket</a>';
            }
            else if ($rows['State'] == 1) {
                echo 'Paid';
            }
            echo '<br> <br>';
        
        }

    } else {
        echo "No Tickets!";
    }
    echo '</div>';


    echo '<div class="tktReceipt"><h2 id="TR"> TicketsReceipt </h2>';

    $sql = "SELECT ReceiptNo, TicketNo, Date,  LIC, Amount FROM ticketreceipt WHERE LIC = '$userId'";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        // output data of each row
       
        while($rows = $results->fetch_assoc()) {
            echo 'Receipt Number: ';
            echo $rows['ReceiptNo'];
            echo "<br>";
            echo 'Ticket Number: ';
            echo $rows['TicketNo'];
            echo "<br>";
            echo 'Date Issued: ';
            echo $rows['Date'];
            echo "<br>";
            echo 'License Number: ';
            echo $rows['LIC'];
            echo "<br>";
            echo 'Amount: ';
            echo $rows['Amount'];
            echo "<br> <br>";
    
            
        }
    

    
    } else {
        echo "No Tickets Receipt!";
    }

    echo "</div>";


 echo '</div>';
} else if (isset($_SESSION['admin'])) {

    ?>
    <div class="admin">
    <div class="container">

    <form method="GET">
        <label for="LICsearch">Search User by Driver's License Number:</label>
        <input type="search" id="LICsearch" name="LICsearch">
        <input type="submit">
    </form>
    <br>
    <form method="GET">
        <label for="PIDsearch">Search Police by Police ID Number:</label>
        <input type="search" id="PIDsearch" name="PIDsearch">
        <input type="submit">
    </form>


    <?php
        if(!isset($_GET["LICsearch"])&& !isset($_GET["PIDsearch"])) {
            $sql="select LIC from user";
            $sql2="select PID from police";
            $result = ($conn->query($sql));
            $row=[];
            if ($result->num_rows > 0) 
            {
                // fetch all data from db into array 
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }
            $result2 = ($conn->query($sql2));
            $row2=[];
            if ($result2->num_rows > 0) 
            {
                // fetch all data from db into array 
                $row2 = $result2->fetch_all(MYSQLI_ASSOC);  
            } 
        }
        else if(isset($_GET["LICsearch"])) {
            $value=$_GET['LICsearch'];
            $sql="select LIC from user where LIC LIKE '%$value%'";
            $result = ($conn->query($sql));
            $row=[];
            if ($result->num_rows > 0) 
            {
                // fetch all data from db into array 
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }
        }
        else if(isset($_GET["PIDsearch"])) {
            $value=$_GET['PIDsearch'];
            $sql2="select PID from police where PID LIKE '%$value%'";
            $result2 = ($conn->query($sql2));
            $row2=[];
            if ($result2->num_rows > 0) 
            {
                // fetch all data from db into array 
                $row2 = $result2->fetch_all(MYSQLI_ASSOC);  
            }
        }
    ?>


    <div class="searchResult">
    <br>
    <?php
        if(!empty($row)){
        echo "User: <br>";
        foreach($row as $rows) 
            {
    ?>
    <a href="driverinfo.php?lic=<?php echo $rows["LIC"]?>">
    <?php echo $rows["LIC"]?></a>
    <?php if(isset($_GET["LICsearch"])) { ?>
         <form class="backButton">
         <input type="button" value="Go back!" onclick="history.back()">
     </form> <?php
    }
    ?>
    <br>
    <?php } }?>
    <br>
    <?php
        if(!empty($row2)) {
        echo "Police: <br>";
        foreach($row2 as $rows2) 
            {
    ?>
    <a href="policeinfo.php?pid=<?php echo $rows2["PID"]?>"><?php echo $rows2["PID"]?></a>
    <?php if(isset($_GET["PIDsearch"])) { ?>
         <form class="backButton">
         <input type="button" value="Go back!" onclick="history.back()">
     </form> <?php
    }
    ?>
    <br>
    <?php }} ?>
    </div>

</div>
</div>
 
    <?php
        } else if (isset($_SESSION['police'])) {
            ?>
            <div class="police">
         

            <div class="policeInfo">
            <h1>Police Info</h1>

            <?php
            $policeId = $_SESSION['police'];

            $sql = "SELECT PID, FName, LName, Department FROM police WHERE PID = '$policeId'";
            $results = $conn->query($sql);
        
            if ($results->num_rows > 0) {
                // output data of each row
                
               
                while($rows = $results->fetch_assoc()) {
                    
                            
                    echo 'Police Identification Number: ';
                    echo $rows['PID'];
                    echo "<br>";
                    echo 'First Name: ';
                    echo $rows['FName'];
                    echo "<br>";
                    echo 'Last Name: ';
                    echo $rows['LName'];
                    echo "<br>";
                    echo 'Department: ';
                    echo $rows['Department'];
                    
                }
            } else {
                echo "Error getting your information! Try reloading page";
            }
            echo '</div>';

            echo '<div class="tkt"><h2> Tickets Issued </h2>';

            $sql = "SELECT TicketNo, LIC, PID, Date, Time, Day, Location, Deadline, Violation, Fine, Comment  FROM ticket WHERE PID = '$policeId' ORDER BY Date DESC";
            $results = $conn->query($sql);
        
            if ($results->num_rows > 0) {
                // output data of each row
               
                while($rows = $results->fetch_assoc()) {
                    echo 'Ticket Number: ';
                    echo $rows['TicketNo'];
                    echo "<br>";
                    echo 'License Number: ';
                    echo $rows['LIC'];
                    echo "<br>";
                    echo 'Id Number of Police who issued the ticket: ';
                    echo $rows['PID'];
                    echo "<br>";
                   
                    echo 'Date Issued: ';
                    echo $rows['Date'];
                    echo "<br>";
                    echo 'Time Issued: ';
                    echo $rows['Time'];
                    echo "<br>";
                    echo 'Day Issued: ';
                    echo $rows['Day'];
                    echo "<br>";
                    echo 'Location: ';
                    echo $rows['Location'];
                    echo "<br>";
                    echo 'Deadline: ';
                    echo $rows['Deadline'];
                    echo "<br>";
                    echo 'Violation: ';
                    echo $rows['Violation'];
                    echo "<br>";
                    echo 'Fine: ';
                    echo $rows['Fine'];
                    echo "<br>";
                    echo 'Comments: ';
                    echo $rows['Comment']; echo "<br>";
                    echo '<br> <br>';
                }
            } else {
                echo "No tickets Issued";
            }
            echo '</div>';

            ?>

            </div>
       
        
        <?php
        
        } 
        else {
            header ('location: login.php?error=notloggedin');
        }


?>

<?php 

    require_once 'includes/footer.php';
?>
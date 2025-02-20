<?php 
    $page = 'bank';
    require_once 'includes/header.php';
?>

<div class="bank">
        <div class="container">
            <h1>Bank</h1>
    
            <form action="Bank.php" method="post">
            
            <select id="type" name="type" class="form-select" required>
                <option selected>Choose a License </option>
                <option value="Driver License Renew">Driver License Renew</option>
                <option value="Car License Renew">Car License Renew</option>
            </select>

            <div class="col-auto mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
                
               
            <div class="col-auto mb-3">
              <label for="lic" class="form-label">Car/Driver License Number</label>
              <input type="text" name="lic" id="lic" class="form-control" required>
            </div>

            <div class="col-auto mb-3">
              <label for="paid" class="form-label">Amount to be paid</label>
              <input type="number" name="paid" id="paid" class="form-control" required>
            </div>

            <div class="col-auto mb-3">
              <label for="licdate" class="form-label">License Date</label>
              <input type="date" id="licdate" name="licdate" min="2018-01-01" max="2030-12-31" class="form-control" required>
            </div>
           
                
                

                <div class="col-12">
                    <button type="submit" name="submit">Get Receipt Number</button>
                </div>
            
            </form>

<?php 

    require_once 'includes/dbh-action.php';

        if(isset($_POST['submit'])){
        $T=$_POST['type']; //entering the data into a variable
        $L=$_POST['lic'];
        $P=$_POST['paid'];
        $D=$_POST['licdate']; 



        $sql="INSERT INTO renewlicense(RenewObject,Date,LIC,Amount)  
            VALUES('$T','$D','$L','$P')"; //enters data into the database 
        if(mysqli_query($conn,$sql)){ 
        echo"";
        }
        else
        {
        echo"error".$sql."<br>".mysqli_error($conn);
        }

        
        $sql = "SELECT * FROM renewlicense ORDER BY ReceiptNo DESC LIMIT 1";
        $result= mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) >0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) { 
                echo "Your Receipt Number: " . $row["ReceiptNo"];
            }
        } else {
            echo "<h1>Enter Info</h1>";
        }

        if ($T == 'Driver License Renew')
        {
            $sql="UPDATE driverlicense SET ExpireDate = DATE_ADD(ExpireDate,INTERVAL 1 YEAR) WHERE LIC= '$L'"; 
            $conn->query($sql);
        }
        elseif ($T == 'Car License Renew')
        {
            $sql="UPDATE carlicense SET ExpireDate = DATE_ADD(ExpireDate,INTERVAL 1 YEAR) WHERE LIC='$L'";
            $conn->query($sql);
        }

        $conn->close();

    }

        ?>

        <form class="backButton">
            <input type="button" value="Go back!" onclick="history.back()">
        </form>
    </div>
</div>

<?php

require_once 'includes/footer.php';
?>


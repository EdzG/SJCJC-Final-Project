<?php 
    $page = 'pay_ticket';
    require_once 'includes/header.php';
?>

<div class="pay_ticket">
        <div class="container">
            <h1>Pay Ticket</h1><br>
    
            <form action="pay_ticket.php" method="post">

            <div class="col-auto mb-3">
              <label for="TicketNo" class="form-label">Enter Ticket Number</label>
              <input type="text" name="TicketNo" id="TicketNo" class="form-control" required>
            </div>

            <div class="col-auto mb-3">
              <label for="lic" class="form-label">Driver License Number</label>
              <input type="text" name="lic" id="lic" class="form-control" required>
            </div>

            <div class="col-auto mb-3">
              <label for="paid" class="form-label">Amount to be paid</label>
              <input type="number" name="paid" id="paid" class="form-control" required>
            </div>

            <!-- <div class="col-auto mb-3">
              <label for="licdate" class="form-label">Date payed</label>
              <input type="date" id="licdate" name="licdate" min="2018-01-01" max="2030-12-31" class="form-control" required>
            </div> -->
           
                
                

                <div class="col-12">
                    <button type="submit" name="submit">Pay</button>
                </div>
            
            </form>

<?php 

    require_once 'includes/dbh-action.php';

        if(isset($_POST['submit'])){
        //entering the data into a variable
        $T=$_POST['TicketNo']; 
        $L=$_POST['lic'];
        $P=$_POST['paid'];
        $D = date("Y/m/d");
        // $D=$_POST['licdate']; 


        $sql="INSERT INTO ticketreceipt(TicketNo,Date,LIC,Amount)  
            VALUES('$T','$D','$L','$P')"; //enters data into the database 
        if(mysqli_query($conn,$sql)){ 
        echo"";
        }
        else
        {
        echo"error".$sql."<br>".mysqli_error($conn);
        }

        
        $sql = "SELECT * FROM ticketreceipt ORDER BY ReceiptNo DESC LIMIT 1";
        $result= mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) >0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) { 
                echo "Your Receipt Number: " . $row["ReceiptNo"];
            }
        } else {
            echo "<h1>Enter Info</h1>";
        }

        $sql2 = "UPDATE `ticket` SET `State`='[value-1]' WHERE TicketNo = $T";
        $conn->query($sql2);

        $conn->close();

    }

        ?>

        <form class="backButton">
            <input type="button" value="Go back" onclick="history.back()">
        </form>
    </div>
</div>

<?php

require_once 'includes/footer.php';
?>


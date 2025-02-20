<?php 
  $page = 'renewCarLic';
  require_once 'includes/header.php';
?>
 <div class="renewCar">
   <div class="container">
        <h2 > Pay Car License</h2>
        <p><a href="Bank.php">-->Click To go to Bank online Services<---</a><br>
          <br>
          <br>
          <h1>Opening Hours</h1>
          <span style="font-weight: 700;">Tuesday – Friday: 8am – 7pm <br>Saturday – Sunday: 8am – 10pm<br>Closed Monday
          </span>
          <br>
          <br>
          <form method="post">
          <input type="number" name="receiptNo" placeholder="Enter receipt number" id="receiptNo" required>
        <br>
        <br>
        <input type="submit" value="Get receipt">
        <input type="hidden" name="submit" value="true" >
      </form>
        </p>
         
    
  <?php
  require_once 'includes/dbh-action.php';

  if(isset($_POST['submit'])){

      $search = $_POST['receiptNo'];


      $sql = "SELECT * FROM renewlicense WHERE ReceiptNo=$search";
      $result= mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) >0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) { 
            echo "<h1>Receipt Number: " . $row["ReceiptNo"]. "<br> Renew Object: " . $row["RenewObject"]. "<br> Date: " . $row["Date"]. "<br> LiC: " . $row["LIC"]."<br> Amount: " . $row["Amount"]."<br> Status:     Paid" . "<br></h1>";
        }
    } else {
        echo "<h1>0 results</h1>";
    }
    mysqli_close($conn);

  }
?>
</div>
</div>
<?php

  require_once 'includes/footer.php';
?>
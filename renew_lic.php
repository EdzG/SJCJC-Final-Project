<!DOCTYPE html>
 
        <h2 > Pay Driver License</h2>
        <p><a href="Bank.php">-->Click To go to Bank online Services<---</a><br>
          <br>
          <br>
          <h1>Opening Hours</h1>
          <span style="font-weight: 700;">Tuesday – Friday: 8am – 7pm <br>Saturday – Sunday: 8am – 10pm<br>Closed Monday
          </span>
          <br>
          <br>
          <form action="renew_car.php" method="post">
          <input type="number" name="receiptNo" placeholder="Enter receipt number" id="receiptNo" required>
        <br>
        <br>
        <input type="submit" value="Get receipt">
        <input type="hidden" name="submited" value="true" >
      </form>
        </p>
         
    

  <?php
  error_reporting(0);

 define('DB_SERVER', 'localhost');  //used to connect to the database 
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'elicense');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$search = $_POST['receiptNo'];


$sql = "SELECT * FROM renewlicense WHERE ReceiptNo=$search";
$result= mysqli_query($db,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { 
        echo "<h1>Receipt Number: " . $row["ReceiptNo"]. "<br> Renew Object: " . $row["RenewObject"]. "<br> Date: " . $row["Date"]. "<br> LiC: " . $row["LIC"]."<br> Amount: " . $row["Amount"]."<br> Status:     Paid" . "<br></h1>";
    }
} else {
    echo "<h1>0 results</h1>";
}
mysqli_close($db);
?>

  </body>
</html>
<?php
$page = 'qrCodeScan';

require_once 'includes/header.php';
require_once 'includes/dbh-action.php';

$userId = $_SESSION["userId"];



$sql = "SELECT QRCode FROM user WHERE LIC = '$userId'";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        // output data of each row
        
       
        while($rows = $results->fetch_assoc()) {
            ?>
            
                   <div class="qrCode"> 
                       <h1 class="scanMe">Scan Me!</h1>
                       <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['QRCode']); ?>" class="userImg"/> <br> 
                       
                    </div> <?php
            
            
        }
    }




require_once 'includes/footer.php';

<?php 
    
    $page='driverInfo';
    require_once 'includes/header.php';
    if(isset($_SESSION['admin']) || isset($_SESSION['police'])) {
    require_once 'includes/dbh-action.php';
?>



    <?php
        $sql="select LIC from user order by LIC ASC";
        $result = ($conn->query($sql));
        $row=[];
        if ($result->num_rows > 0) 
            {
                // fetch all data from db into array 
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }
    ?>  

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript">
	    // Parse the URL parameter
	    function getParameterByName(name, url) {
	        if (!url) url = window.location.href;
	        name = name.replace(/[\[\]]/g, "\\$&");
	        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	            results = regex.exec(url);
	        if (!results) return null;
	        if (!results[2]) return '';
	        return decodeURIComponent(results[2].replace(/\+/g, " "));
	    }
	    // Give the parameter a variable name
	    var dynamicContent = getParameterByName('lic');
 
	    $(document).ready(function() {
            var index =0;
            <?php
                if(!empty($row))
                foreach($row as $rows)
                { 
                ?>
            var compareValue = '<?=$rows["LIC"]?>';
		    // Check if the URL parameter is valid
		    if (dynamicContent == compareValue) {
                index = 1;
		    } 
            <?php } ?>
            if (index==0){
                window.location.href="error.php"
            }
	    });
    </script>

    <section class="driverinfo">
        <div class="container">

    <h3>Driver's License</h3>
    <hr>

        <?php
            $value=$_REQUEST['lic'];
            $sql="SELECT `LIC`, `FName`, `LName`, `DOB`, `IssueDate`, `ExpireDate`, `Class`, `BloodType`, 
            `Sex`, `EyeColor`, `Height`, `Weight`, `Address`, `Region`, `Image`, `Signature`, `TrafficManager` FROM `driverlicense` WHERE LIC = '$value'"; 
            $result = ($conn->query($sql));
            $row=[];
            if ($result->num_rows > 0) 
            {
                // fetch all data from db into array 
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }  
            if(!empty($row))
            foreach($row as $rows)
                {
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
                    echo 'Community: ';
                    echo $rows['Region'];
                
        ?>
        <br>
        <br>
        <p>Image: </P>  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['Image']); ?>" class="userImg"/>
        <br>
        <br>
        <p>Signature: </p> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['Signature']); ?>" class="userImg"/>
        <br>
        <br>
        <p>Traffic Manager Signature: </p> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['TrafficManager']); ?>" class="userImg"/>
        <br>
        <br>

        <?php } ?>

        <h3>Driver's License</h3>
        <hr>

        <?php
            $value=$_REQUEST['lic'];
            $sql="SELECT `LicPlate`, `LIC`, `ExpireDate`, `VIN`, `Region`, `Brand`, `Model` FROM `carlicense` WHERE LIC = '$value'"; 
            $result = ($conn->query($sql));
            $row=[];
            if ($result->num_rows > 0) 
            {
                // fetch all data from db into array 
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }  
            if(!empty($row))
            foreach($row as $rows)
                {
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
                } 
        ?>
        <form class="backButton">
         <input type="button" value="Go back" onclick="history.back()">
     </form>
        </div>
    </section>
  
<?php 

    require_once 'includes/footer.php';
} else {
    header("location: login.php");
}
?>
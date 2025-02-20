<?php
    $page = 'signup';
    include_once 'includes/header.php';
?>
<div class="sidenav">
  <a href="#UCreate">User Account Creation</a>
  <a href="#PCreate">Police Account Creation</a>
  <a href="#ACreate">Admin Account Creation</a>
  <a href="#CarAdd">Add Car License</a>
</div>

<div class="signup">
<div class="container">
    <h2>E-License Account Creation</h2>
    <section class="signup-form">
       <h2 id="UCreate">User Account Creation</h2>
    <form class="row g-3" method="POST" action="includes/signup-action.php" enctype="multipart/form-data">

            <div class="col-md-6">
                <label for="licNo" class="form-label">License Number</label>
                <input type="text" class="form-control" id="licNo" name="licNo" required>
            </div>


            <div class="col-md-6">
                <label for="fName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fName" name="fName" required>
            </div>

            <div class="col-md-6">
                <label for="lName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lName" name="lName" required>
            </div>

            <div class="col-md-6">
                <label for="dob" class="form-label">DOB</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>

            <div class="col-md-6">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" id="class" name="class" required>
            </div>

            <div class="col-md-6">
                <label for="bldType" class="form-label">Blood Type</label>
                <input type="text" class="form-control" id="bldType" name="bldType">
            </div>

            <div class="col-md-6">
                <label for="sex" class="form-label">Sex</label>
                <input type="text" class="form-control" id="sex" name="sex" max="1" required>
            </div>

            <div class="col-md-6">
                <label for="eyeCol" class="form-label">Eye Color</label>
                <input type="text" class="form-control" id="eyeCol" name="eyeCol">
            </div>

            <div class="col-md-6">
                <label for="issDate" class="form-label">Issue Date</label>
                <input type="date" class="form-control" id="issDate" name="issDate" required>
            </div>

            <div class="col-md-6">
                <label for="expDate" class="form-label">Expiration Date</label>
                <input type="date" class="form-control" id="expDate" name="expDate" required>
            </div>

            

            <div class="col-md-6">
                <label for="height" class="form-label">Height</label>
                <input type="number" step="any" class="form-control" id="height" name="height">
            </div>
            <div class="col-md-6">
                <label for="weight" class="form-label">Weight</label>
                <input type="number" step="any" class="form-control" id="weight" name="weight">
            </div>
            
            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="col-md-6">
                <label for="region" class="form-label">Region</label>
                <input type="text" class="form-control" id="region" name="region" required>
            </div>

            <div class="col-md-6">
                 <!-- <label for="pwd" class="form-label">Password</label> -->
                <input type="hidden" class = "form-control" id="pwd"name="password" value="password" required> 
            </div>

            <div class="col-md-6">
                <!-- <label for="pwdRepeat" class="form-label">Repeat Password</label> -->
                <input type="hidden" class = "form-control" id="pwdRepeat" name="pwdRepeat" value="password" required> 
            </div>

            <div class="col-12">
                <label for="userImg" class="form-label">Select the user Image</label>
                <input class="form-control" type="file" id="userImg" name="userImg" accept=".jpg, .jpeg, .png" required>
            </div>

            <div class="col-12">
                <label for="userSig" class="form-label">Select the user signature</label>
                <input class="form-control" type="file" id="userSig" name="userSig" accept=".jpg, .jpeg, .png" required>
            </div>

            <div class="col-12">
                <label for="manSig" class="form-label">Select the traffic manager signature</label>
                <input class="form-control" type="file" id="manSig" name="manSig" accept=".jpg, .jpeg, .png" required>
            </div>
            <div id ="qr-container"></div>

           

            <div class="col-12">
            <button type="button" onclick="generateQRCode()">
                Generate QR Code
            </button>
            </div>
            
            <div class="col-12" id="qrcode-container">
                <div id="qrcode" class="qrcode"></div>
            </div>
            
            <div class="col-12">
            <label for="qrCodeImg" class="form-label">Upload the QR Code</label>
                <input class="form-control" type="file" id="qrCodeImg" name="qrCode" accept=".jpg, .jpeg, .png" required>
            </div>

            <div class="col-12">
                <button type="submit" name="userAcc">Create User Account</button>
            </div>

        </form>

        <script type="text/javascript">
        function generateQRCode() {
            let user = document.getElementById("licNo").value;
            let begin = "localhost/driverinfo.php?lic=";
            let website = begin += user;
            if (website) {
                let qrcodeContainer = document.getElementById("qrcode");
                qrcodeContainer.innerHTML = "";
                new QRCode(qrcodeContainer, website);
            }
            let qrcodeElement = document.getElementById("qrcode");
            let download = document.createElement("button");
            qrcodeElement.appendChild(download);

            let downloadLink = document.createElement("a");
            downloadLink.setAttribute("download", "qr_code.png");
            downloadLink.innerHTML = `Download`;

            download.appendChild(downloadLink);
            let qrcodeImg = document.querySelector(".qrcode img");
            let qrcodeCanvas = document.querySelector("canvas");

            if (qrcodeImg.getAttribute("src") == null) {
                setTimeout(() => {
                    downloadLink.setAttribute("href", `${qrcodeCanvas.toDataURL()}`);
                }, 300);
            } else {
                setTimeout(() => {
                    downloadLink.setAttribute("href", `${qrcodeImg.getAttribute("src")}`);
                }, 300);
            }
        }
    </script>


        
        
        <br> <br>
        <h2 id="PCreate">Police Account Creation</h2>

        <form class="row g-3" method="POST" action="includes/signup-action.php">

            <div class="col-md-6">
                <label for="pid" class="form-label">Police Identification Number</label>
                <input type="text" class="form-control" id="pid" name="pid" required>
            </div>

            <div class="col-md-6">
                <label for="fName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fName" name="fName" required>
            </div>

            <div class="col-md-6">
                <label for="lName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lName" name="lName" required>
            </div>

            <div class="col-md-6">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>

            <div class="col-md-6">
                 <!-- <label for="pwd" class="form-label">Password</label> -->
                <input type="hidden" class = "form-control" id="pwd"name="password" value="password" required> 
            </div>

            <div class="col-md-6">
                <!-- <label for="pwdRepeat" class="form-label">Repeat Password</label> -->
                <input type="hidden" class = "form-control" id="pwdRepeat" name="pwdRepeat" value="password"  required> 
            </div>

            <div class="col-12">
                <button type="submit" name="policeAcc">Create Police Account</button>
            </div>

            
        </form>

        <br> <br>
        <h2 id="ACreate" >Admin Account Creation</h2>

        <form class="row g-3" method="POST" action="includes/signup-action.php">

            <div class="col-md-6">
                <label for="adminId" class="form-label">Admin Identification Number</label>
                <input type="number" class="form-control" id="adminId" name="adminId" required>
            </div>

            <div class="col-md-6">
                <label for="fName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fName" name="fName" required>
            </div>

            <div class="col-md-6">
                <label for="lName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lName" name="lName" required>
            </div>

            <div class="col-md-6">
                 <!-- <label for="pwd" class="form-label">Password</label> -->
                <input type="hidden" class = "form-control" id="pwd"name="password" value="password" required> 
            </div>

            <div class="col-md-6">
                <!-- <label for="pwdRepeat" class="form-label">Repeat Password</label> -->
                <input type="hidden" class = "form-control" id="pwdRepeat" name="pwdRepeat" value="password" required> 
            </div>

            <div class="col-12">
                <button type="submit" name="adminAcc">Create Admin Account</button>
            </div>

            
        </form>

        <br> <br>
        <h2 id="CarAdd">Add Car License</h2>

        <form class="row g-3" method="POST" action="includes/signup-action.php">

            <div class="col-md-6">
                <label for="LicPlate" class="form-label">License Plate</label>
                <input type="text" class="form-control" id="LicPlate" name="LicPlate" required>
            </div>

            <div class="col-md-6">
                <label for="licNo" class="form-label">Driver License Number</label>
                <input type="text" class="form-control" id="licNo" name="licNo" required>
            </div>

            <div class="col-md-6">
                <label for="expirationDate" class="form-label">Expiration Date</label>
                <input type="date" class="form-control" id="expirationDate" name="expirationDate" required>
            </div>

            <div class="col-md-6">
                 <label for="vin" class="form-label">VIN</label>
                <input type="text" class = "form-control" id="vin"name="vin" required> 
            </div>

            <div class="col-md-6">
                <label for="region" class="form-label">Region</label>
                <input type="text" class="form-control" id="region" name="region" required>
            </div>

            <div class="col-md-6">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class = "form-control" id="brand" name="brand" required> 
            </div>

            <div class="col-md-6">
                <label for="model" class="form-label">Model</label>
                <input type="text" class = "form-control" id="model" name="model" required> 
            </div>

            <div class="col-12">
                <button type="submit" name="carLicense">Add Car License</button>
            </div>

            
        </form>

        <?php
            if(isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields! </p>";
                } 
                else if($_GET["error"] == "accountexists") {
                    echo "<p>There is already an account with that email! </p>";
                } 
                else if($_GET["error"] == "mismatchpasswords") {
                    echo "<p>Passwords don't match up! </p>";
                } 
                else if($_GET["error"] == "invalidemail") {
                    echo "<p>That email is invalid! </p>";
                } 
                else if($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again! </p>";
                }else if($_GET["error"] == "uploaderror") {
                    echo "<p>Something went wrong, try again! </p>";
                }
                else if($_GET["acc"] == "admin"){
                        echo "<p>New Admin Account Created!</p>";
                } 
                else if ($_GET["acc"] == "police") {
                        echo "<p>New Police Account Created</p>";
                }
                else if ($_GET["acc"] == "user") {
                    echo "<p>User Account Created</p>";

                }
        }
        ?>



    </section>
</div>

</div>




<?php 
    include_once 'includes/footer.php';

?>
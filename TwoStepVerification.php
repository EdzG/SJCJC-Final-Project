<?php 

    $page= "twoStepVerification";
    require_once 'includes/header.php';
?>


<section class="background">  
    <div class="login">
            <div class="container">

                <h2>E-License!</h2>
                <form action="includes/login-action.php" method="POST" class="row g-3">
                    
                    <div class="col-md-6">
                        <input type="text" name="username" placeholder="Username" class="form-control" aria-describedby="usernameInstructions"> 
                    </div>
                    <div class="col-md-6">
                        <span id="usernameInstructions" class="form-text">
                            Use Admin Id, Driver License Number or Police Id
                        </span>
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" placeholder="Password" class="form-control"> 
                    </div>

                    <div class="col-md-6">
                        <span id="usernameInstructions" class="form-text">
                            Must be 8-20 characters long.
                        </span>
                    </div>

                    <select id="accType" name="accType" class="form-select" required>
                        <option selected>Choose an Account Type </option>
                        <option value="0">User</option>
                        <option value="1">Police</option>
                        <option value="2"> Administration</option>
                    </select>
                
                    <button type="submit" name="submit">Log In</button>
                
                </form>

                <?php
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p>Fill in all fields! </p>";
                    } 
                    else if($_GET["error"] == "wronglogin") {
                        echo "<p>Invalid Credentials! </p>";
                    } else if($_GET["error"] == "doesnotexist") {
                        echo "<p>Invalid Credentials! </p>";
                    } 
                    else if($_GET["error"] == "invalidemail") {
                        echo "<p>That email is invalid! </p>";
                    }
                    else if($_GET["error"] == "stmtfailed") {
                        echo "<p>Something Went Wrong! Please try again! </p>";
                    }
                    else if($_GET["error"] == "noacctype") {
                        echo "<p>Please Select the type of Account! </p>";
                    }
                
                }
            ?>
            </div> 
        
    </div>
</section>

<?php
    require_once 'includes/footer.php';
?>
<?php

    $page = 'updatePassword';
    require_once 'includes/header.php';
?>


<section class="background">  
    <div class="login">
            <div class="container">


                <?php
                if(isset($_GET["acc"])) {
                    if ($_GET["acc"] == "user") {
                        ?>

                <h2>Update Credentials!</h2>
                <form action="includes/updatePassword-action.php" method="POST" class="row g-3">
                    
                    <div class="col-md-6">
                        <input type="text" name="username" placeholder="Username" class="form-control"> 
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" placeholder="Password" class="form-control"> 
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="pwdRepeat" placeholder="Repeat Password" class="form-control"> 
                    </div>

                    <select id="secQues" name="secQues" class="form-select" required>
                        <option selected>Choose a Security Question </option>
                        <option value="What was your first phone number">What was your first phone number?</option>
                        <option value="What is the name of your favorite pet">What is the name of your favorite pet?</option>
                        <option value="What high school did you attend">What high school did you attend?</option>
                    </select>

                    <div class="col-md-6">
                        <input type="text" name="answer" placeholder="Answer To Selected Question" class="form-control"> 
                    </div>
                
                    <button type="submit" name="user">Save</button>
                
                    </form>

<?php
                    } 
                    else if($_GET["acc"] == "admin") {
                        ?>

                <h2>Update Credentials!</h2>
                <form action="includes/updatePassword-action.php" method="POST" class="row g-3">
                    
                    <div class="col-md-6">
                        <input type="text" name="username" placeholder="Username" class="form-control"> 
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" placeholder="Password" class="form-control"> 
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="pwdRepeat" placeholder="Repeat Password" class="form-control"> 
                    </div>
                
                    <button type="submit" name="admin">Save</button>
                
                    </form>

<?php
                    } else if($_GET["acc"] == "police") {
                        ?>

                <h2>Update Credentials!</h2>
                <form action="includes/updatePassword-action.php" method="POST" class="row g-3">
                    
                    <div class="col-md-6">
                        <input type="text" name="username" placeholder="Username" class="form-control"> 
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" placeholder="Password" class="form-control"> 
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="pwdRepeat" placeholder="Repeat Password" class="form-control"> 
                    </div>
                
                    <button type="submit" name="police">Save</button>
                    </form>
                    <?php }  }?>
            </div> 
        
    </div>
</section>

<?php
    require_once 'includes/footer.php';
?>
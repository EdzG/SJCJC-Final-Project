<?php 
      require_once 'dbh-action.php';

          if(isset($_POST['submit'])){
          date_default_timezone_set("America/Belize");
          //entering the datd into a variable
          // $TICKETNO=$_POST['TicketNo'];
          $LIC=$_POST['LIC'];
          $PID=$_POST['PID'];
          $DATE= date("Y/m/d");
          // $DATE=$_POST['Date'];
          $TIME= date("h:i:sa");
          // $TIME=$_POST['Time'];
          $paymentLimit = strtotime("+1 Month");
          $DAY=$_POST['Day'];
          $LOCATION=$_POST['Location'];
          // $DEADLINE=$_POST['Deadline'];
          $DEADLINE= date("Y/m/d", $paymentLimit);
          $VIOLATION=$_POST['Violation'];
          $FINE=$_POST['Fine'];
          $COMMENT=$_POST['Comment'];


            $sql = "INSERT INTO ticket (TicketNo, LIC, PID, Date, Time, Day, Location, Deadline, Violation, Fine, Comment) VALUES ('$TICKETNO','$LIC','$PID','$DATE', '$TIME', '$DAY','$LOCATION','$DEADLINE','$VIOLATION','$FINE','$COMMENT')"; //enters data into the database 
          $conn->query($sql);
          
          
            header("location: ../issue_ticket.php?error=none");
          

          }else {

          header("location: ../issue_ticket.php?error=uploadfailed");
          
          }
              
          $conn->close();
      ?>
<?php
  $page = 'issueTicket';
  require_once 'includes/header.php';
?>

  
  <section class="ticketIssue">
        <div class="container">
          <h2>Issue Ticket</h2>

          <form class="row g-3" action="includes/issueTicket-action.php" method="post">

            <!-- <div class="col-md-6">
              <label for="TicketNo"  class="form-label">Ticket Number</label>
              <input class="form-control" type="number" id="TicketNo" name="TicketNo">
            </div> -->

            <div class="col-md-6">
              <label for="LIC" class="form-label">License Number</label>
              <input class="form-control" type="text" id="LIC" name="LIC">
            </div>

            <div class="col-md-6">
              <label for="PID" class="form-label">Police ID</label>
              <input class="form-control" type="text" id="PID" name="PID">
            </div>

            <!-- <div class="col-md-6">
              <label for="Date" class="form-label">Date</label>
              <input class="form-control" type="date" id="Date" name="Date">
            </div> -->

            <!-- <div class="col-md-6">
              <label for="Time" class="form-label">Time</label>
              <input class="form-control" type="time" id="Time" name="Time">
            </div> -->

            <div class="col-md-6">
              <label for="Day" class="form-label">Day</label>
              <input class="form-control" type="text" id="Day" name="Day">
            </div>


            <div class="col-md-6">
              <label for="Location" class="form-label">Location</label>
              <input class="form-control" type="text" id="Location" name="Location">
            </div>


            <!-- <div class="col-md-6">
              <label for="Deadline" class="form-label">Deadline</label>
              <input class="form-control" type="date" id="Deadline" name="Deadline">
            </div> -->


            <div class="col-md-6">
              <label for="Violation" class="form-label">Violation</label>
              <input class="form-control"  type="text" id="Violation" name="Violation">
            </div>

            <div class="col-md-6">
              <label for="Fine" class="form-label">Fine</label>
              <input class="form-control"  type="number" step="any" id="Fine" name="Fine">
            </div>


            <div class="col-12">
              <label for="Comment" class="form-label">Comment</label>
              <textarea class="form-control" aria-label="With textarea" id="Comment" name="Comment"></textarea>
            </div>


             <div class="col-12">
                <button type="submit" name="submit">Issue Ticket</button>
            </div>

          </form>

          <?php
            if(isset($_GET["error"])) {
                if ($_GET["error"] == "none") {
                    echo "<p>Ticket has successfully been issued! </p>";
                } 
                else if($_GET["error"] == "uploadfailed") {
                    echo "<p>Upload Failed, please try again! </p>";
                } 
        }
        ?>

     <form class="backButton">
         <input type="button" value="Go back" onclick="history.back()">
     </form>
      </div>    
  </section>

<?php 
 require_once 'includes/footer.php';
?>

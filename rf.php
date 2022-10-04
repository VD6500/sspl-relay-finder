<html>
  <body style="font-size:15px; text-align:center">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <br>
    <div class="container" style="border: 4px solid;">
      <br>
      <div class="container" style="padding: 2px; border: 2px solid;margin: 2px;text-align: left;font-size: 12PX;">
          <div class="row" style="padding: 10px;margin:1px; font-size: 12PX; text-align: center;">
            <strong style="font-size: 18PX;">SUDHIR SWITCHGEARS PVT LTD</strong>
            <br>
            <br>
            <strong style="font-size: 16PX;">RELAY IDENTIFIER</strong>
          </div>  
          <div class="col" style="padding: 10px; border: 2px solid;margin:2px; font-size: 12PX; text-align: center;">
            <form action="ccd.php" method="get">
              <strong style="font-size:16px"> ENTER COMPANY NAME FOR DETAILS</strong><br><br>
              <strong> ENTER COMPANY FULL NAME :-</strong>
              <input type="text" name="r" method="post"><br><br>
              <strong> ENTER COMPANY FIRST WORD :-</strong>
              <input type="text" name="s" method="post"><br><br>
              <input type="submit">
            </form>
          </div>
          <div class="col" style="padding: 10px; border: 2px solid;margin:2px; font-size: 12PX; text-align: center;">
            
            <?php
              $conn = mysqli_connect("localhost", "root", "","company contact details");
              if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
              }
              $v=$_GET['r'];
              $q=$_GET['s'];
              $sql = "SELECT * FROM `ccd` where `COMPANY NAME`='".$v."'";
              $sql1 = "SELECT * FROM `ccd` where `company_sf`='".$q."'";
              $result = mysqli_query($conn, $sql);
              $r1=mysqli_query($conn, $sql1);

              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  echo "<html><hr><strong>FOLLOWING ARE THE DETAILS FOR ".$v."</strong>".$row['COMPANY NAME'] ."<br> ".$row['company_sf']."<br>".$row['CONTACT NUMBER'] ."<br> ".$row['LOCATION']."<br> ".$row['EMAIL']."<br>"."<hr></html>";
                }
              } 
              elseif (mysqli_num_rows($r1) > 0) {
                while($row = mysqli_fetch_assoc($r1)) {
                  echo "<html><hr><strong>FOLLOWING ARE THE DETAILS FOR ".$q."</strong><br>".$row['COMPANY NAME'] ."<br> ".$row['company_sf']."<br>".$row['CONTACT NUMBER'] ."<br> ".$row['LOCATION']."<br> ".$row['EMAIL']."<br><br>"."<hr></html>";
                }
              }
              else{
                echo "0 results";
              }
              mysqli_close($conn);
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
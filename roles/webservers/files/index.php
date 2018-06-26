<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
<?php

  // Replace with valid IPs and hostnames
  $instances = array(array('Web 4', '0.0.0.0', 'domain.com'),
                     array('Web 3', '0.0.0.0', 'domain.com'),
                     array('Web 2', '0.0.0.0', 'domain.com'),
                     array('Web 1', '0.0.0.0', 'domain.com'),
                    );

  asort($instances);

  function ping($uri) {
    if($fp = fsockopen($uri,80,$errCode,$errStr,2)){
      return "<span class=\"label label-success\">ONLINE</span>";
    } else {
      return "<span class=\"label label-danger\">OFFLINE</span>";
    }
    fclose($fp);
  }
?>
        <br />

        <div class="jumbotron">
          <h2><center>Hooray, Apache is running on <?php echo $_SERVER['HTTP_HOST']; ?></center></h2>
        </div>

        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>Alias</th>
                <th>IP Address</th>
                <th>Hostname</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
<?php
  foreach ($instances as $instance) {
    $status = ping($instance[2]);
?>
              <tr>
                <td><?php echo $instance[0]; ?></td>
                <td><?php echo $instance[1]; ?></td>
                <td><?php echo $instance[2]; ?></td>
                <td><?php echo $status; ?></td>
              </tr>
<?php
  }
?>
           </tbody>
         </table>
       </div>
     </div>
  </body>
</html>


<?php
  include('connection.php');
?>
<div class="row">
    <div class="column-md-12">
      <div class="page">
        <table class="table table-hover table-default">
          <thead>
          <tr>
            <th>Name</th>
            <th>Task Completed</th>
            <th>Task Pending</th>
            <th>Task Assigned</th>
          </tr>
          </thead>
          <tbody>

          <?php
            if(isset($_REQUEST['date']))
            {
              $date = $_REQUEST['date'];
            }
            else
            {
              $date = date('Y-m-d');
            }
            
            if(isset($_REQUEST['user'])){
              $user = $_REQUEST['user'];
              $sql = "SELECT * FROM dsr_data where t_date like '$date%' and email_id=(select user_emailid from user where username = '$user')";
            }
            else
            {
              $sql = "SELECT * FROM dsr_data where t_date like '$date%'";
            }
            $result = mysql_query($sql, $connection);

            while($res = mysql_fetch_array($result))
            {
              echo "<tr>
                        <td>".fetchName($res['email_id'])."</td>
                        <td>".nl2br($res['task_completed'])."</td>
                        <td>".nl2br($res['task_pending'])."</td>
                        <td>".nl2br($res['task_assigned'])."</td>
                    </tr>";
            }

            function fetchName($email)
            {
              global $connection;

               $sql = "SELECT username from user where user_emailid like '$email'";
               $result = mysql_query($sql, $connection);
                $res = mysql_fetch_array($result);
                return $res['username'];
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
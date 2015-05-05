<?php
  include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <style type="text/css">
#dsr_user
{
  background: #fff;
  margin-top: 25px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  border-width: 0 1px 4px 1px;
  border-top: 3px solid #222222;
}
   </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/flick/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dsr.js"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd',
      yearRange: "-30:+20",
    });
  });
  </script>
</head>
<body>

  <div class="navbar navbar-default navbar-static-top" style="background-color: #497093;border-color: #3e5f7d;color: white;"role="navigation">
  <div class="container" style="text-align:center;">
    <h1>Daily Status Report</h1>
    <!--
    <ul class="nav navbar-nav navbar-right" style="padding-top: 15px; padding-right: 80px;">
      
        <li class="dropdown profile">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white">
            <span style="margin-left: 33px">
            <?php //include('connection.php'); echo $email_id;?></span>
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
          <li>
          <a href="#"><i class="fa fa-power-off"></i> Log Out</a>
          </li>
        </ul>
        </li>
    </ul> 
    -->  
</div>
</div>




<div class="container">
  <div class="row">
      <div class="column-md-12" id="filter_li" style="width:100%; text-align:center;">
      <div id="user_dropdown" class="selectbox" style="text-align:center; display:inline; width:auto;">
            <select id="user_drp">
              <?php
                $sql = "SELECT DISTINCT username from user";
                $result = mysql_query($sql);
                while($res = mysql_fetch_array($result)){
                  echo "<option>".$res['username']."</option>";  
                }

              ?>
            </select>
        </div>
        <div class="selectbox" style="text-align:center; width:auto; display:inline;">
          Select Date <input type="text" id="datepicker" value=<?php echo date('Y-m-d');?>>
          <input type="button" value="Load" id="submit1">
        </div>
            
        
        </div>

        <div class="transparent-header" id="curr_date" style="display:block; text-align:center;">
      </div>

<div id="dsr_user">

</div>
</div>
<div id="view_data"></div>   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
</div>
  </body>
</html>

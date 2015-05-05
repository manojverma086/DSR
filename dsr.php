<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
  <div class="container">
    <center><h1 style="color:#337ab7;">Daily Status Report</h1>

<form class="form-horizontal" id="dsr" method="POST" action="">
  <div class="form-group" style="padding-top: 50px;">
  <label for="tc" style="color:#337ab7;">Task Completed</label><br>
  <div class="col-sm-5" style="width:100%;">
  <center><textarea class="form-control" id="tc" name = "task_completed"rows="3" style="width:50%;" required="required"></textarea></center>
    </div>
  </div>
  <div class="form-group">
  <label style="color:#337ab7;">Task Pending</label><br>
  <div class="col-sm-5" style="width:100%;">
    <textarea class="form-control" id="tp" name = "task_pending" rows="3" style="width:50%;" required="required"></textarea>
  </div>
  </div>
  <div class="form-group">
  <label style="color:#337ab7;">Task Assigned</label><br>
  <div class="col-sm-5" style="width:100%;">
   <textarea class="form-control" id="ta" name="task_assigned" rows="3" style="width:50%;" required="required"></textarea>
  </div>
  </div>

  <div class="form-group">
    <div class="col-xl-10">
      <button type="submit" name="submit_btn" id="submit_btn" class="btn btn-primary btn-lg">Save</button>
      
    </div>

  </div>
</form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
</div>
</center>
  </body>

  <script>
  $(document).ready(function(){
  $('#dsr').submit(function(event){
    event.preventDefault();

    var formData ={
      'task_completed': $('#tc').val(),
      'task_pending': $('#tp').val(),
      'task_assigned': $('#ta').val(),
    };
    $.ajax({
      type  : 'POST',
      url   : 'save.php',
      data  : formData,
      dataType: 'json',
      encode :true,
      // success: function(msg){
            // $('#message').html(msg);
    })
    .success(function(data) {
                // log data to the console so we can see
                console.log(data); 
                if(data['success']==true){
                  $('#submit_btn').html('Successfully submitted');
                  $('#submit_btn').attr('disabled','disabled');
                  $('#tc').attr('disabled','disabled');
                  $('#tp').attr('disabled','disabled');
                  $('#ta').attr('disabled','disabled');
                   return false;
                }

                else{
                  alert('Something Wrong');
                }
            })

  })
})
  </script>
</html>

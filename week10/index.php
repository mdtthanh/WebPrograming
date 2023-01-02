<!DOCTYPE html>
<html>
<head>
	<title>Php Ajax Form Validation Example</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
  <h1>Php Ajax Form Validation Example</h1>
  <form role="form" id="contactForm" class="contact-form" data-toggle="validator" class="shake">
    <div class="alert alert-danger display-error" style="display: none">
    </div>
    <div class="form-group">
      <div class="controls">
        <input type="text" id="name" class="form-control" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <div class="controls">
        <input type="email" class="email form-control" id="email" placeholder="Email" >
      </div>
    </div>
    <div class="form-group">
      <div class="controls">
        <input type="text" id="msg_subject" class="form-control" placeholder="Subject" >
      </div>
    </div>
    <div class="form-group">
      <div class="controls">
        <textarea id="message" rows="7" placeholder="Massage" class="form-control"></textarea>
      </div>  
    </div>
    <button type="submit" id="submit" class="btn btn-success"><i class="fa fa-check"></i> Send Message</button>
  </form>
</div>


</body>


<script type="text/javascript">
  $(document).ready(function() {


      $('#submit').click(function(e){
        e.preventDefault();


        var name = $("#name").val();
        var email = $("#email").val();
        var msg_subject = $("#msg_subject").val();
        var message = $("#message").val();


        $.ajax({
            type: "POST",
            url: "/formProcess.php",
            dataType: "json",
            data: {name:name, email:email, msg_subject:msg_subject, message:message},
            success : function(data){
                if (data.code == "200"){
                    alert("Success: " +data.msg);
                } else {
                    $(".display-error").html("<ul>"+data.msg+"</ul>");
                    $(".display-error").css("display","block");
                }
            }
        });


      });
  });
</script>
</html>
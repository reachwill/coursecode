<?php
    
    //set the page title here!!!!!!
    $title = 'Intro to PHP Register';

    //include the header
    include 'header.php';
?>

<!-- Content goes here -->
<form>
    <input type="text" name="firstname" placeholder="First Name"><br>
    <input type="text" name="lastname" placeholder="Last Name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <button type="button">Register</button>
</form>



<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
<script>

  $(document).ready(function(){
      
      $('button[type=button]').click(function(e){
          var userObj = {
              firstname: $('input[name=firstname]').val(),
              lastname: $('input[name=lastname]').val(),
              email: $('input[name=email]').val()
          };
          
          $.ajax({
              url:'insertUserAJAX.php',
              type:'post',
              dataType:'text',
              data: userObj,
              success:function(data){
                  console.log(data);
              },
              error:function(x,m,s){console.log(m)}
          });
          
          
      });

  });

</script>






<?php
    //include the footer
    include 'footer.php';
?>
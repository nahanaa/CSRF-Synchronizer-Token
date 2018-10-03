<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<form action="csrf.php" method="POST">
    <input type="hidden" id="token" name="token" value="token">

    <button type="submit" name="csrfSubmit">Submit</button>
</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script> 
        $(document).ready(function(){
            $.ajax({
                url:'csrf.php',
                type:'POST',
                async:false,
                data:{'csrf':'<?php echo $_COOKIE["csrf_session"] ?>'},
                success:function(data){
                    document.getElementById("token").value=data;
                },
                error:function(xhr,options,error){
                    console.log("Error");
                }
            });
        });
    </script>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styl.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <section>
        <div class="col-sm-12" style="padding: 0;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">QUIZ</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ADD users
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="./adduniversity.php">Add-university</a>
                                <a class="dropdown-item" href="./addclass.php">Add-Class</a>
                                <a class="dropdown-item" href="./addteacher.php">Add-Teacher</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Log-out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-sm-12">
            <div class="box">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="container-fluid main-headbox">
                        <form action="">
                            <div class="form-group">
                                <label for="name">university name:</label>
                                <input type="text" class="form-control" placeholder="Enter name" id="name">
                              </div>
                              <button type="submit" onclick="adduni();" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>

        </div>
    </section>
    <script type="text/javascript">
        function adduni() {
            var name = document.getElementById('name').value ;
    
            var token='<?php echo password_hash("university",PASSWORD_DEFAULT);?>';
            if(name!=""){
                $.ajax(
                    {
                        type:'post',
                        url:"ajax/adduni.php",
                        data:{name:name,token:token},
                        success:function(data)
                        {
                            if(data ==0){
                                alert('university added successfully');
                            }
                            else{
                                alert(data);
                            }
                        }
                    });
            }
            
        }
    </script>
</body>

</html>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
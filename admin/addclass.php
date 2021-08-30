<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/normalize.min.css">
    <link rel="stylesheet" href="./css/dash_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
    <section>
        <div class="col-sm-12 paddoff">
            <div class="col-sm-2 paddoff">
                <div class="main-box">
                    <div class="main-heading">
                        <p>welcome</p>
                    </div>
                    <div class="contain-list">
                    <ul>
                <li>
                  <a href="admindashboard.php" class="active">Dashboard</a>
                </li>
                <li><a href="adduni.php">Add University</a></li>
                <li><a href="addteacher.php">Add Teacher</a></li>
                <li><a href="addclass.php">Add Class</a></li>
                <li><a href="">Add students</a></li>
                <li><a href="">Log-out</a></li>
              </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="main">
                    <div class="main-heading">
                        <h2>Admin dashboard</h2>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="container-fluid">
                            <form action="">
                                <div class="form-group">
                                    <label for="name">Class:</label>
                                    <input type="text" class="form-control" placeholder="Enter class" id="cname">
                                  </div>
                                  <button type="submit" onclick="addclass();" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    function addclass() {
        var name = document.getElementById('cname').value ;

        var token='<?php echo password_hash("class",PASSWORD_DEFAULT);?>';
        if(name!=""){
            $.ajax(
				{
					type:'post',
					url:"ajax/addclass.php",
					data:{name:name,token:token},
					success:function(data)
					{
						if(data ==0){
                            alert('Class added successfully');
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
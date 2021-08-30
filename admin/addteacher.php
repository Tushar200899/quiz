<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/normalize.min.css" />
    <link rel="stylesheet" href="./css/dash_style.css" />
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
                <li><a href="addstudent.php">Add students</a></li>
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
                    <label for="teacher">Add Teacher:</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter name"
                      id="tname"
                    />
                  </div>
                  <div class="form-group">
                    <label for="class">University</label>
                    <div class="contain-input">
                      <div
                        class="list"
                        id="list"
                        style="width: 100%; float: left"
                      ></div>
                    </div>
                  </div>
                  <button
                    type="submit"
                    class="btn btn-primary"
                    style="margin-top: 10px"
                    onclick="addteacher();"
                  >
                    Submit
                  </button>
                </form>
              </div>
            </div>
            <div class="col-sm-2"></div>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      getuni();
      function getuni() {
        var token = '<?php echo password_hash("getuni",PASSWORD_DEFAULT);?>';

        $.ajax({
          type: "post",
          url: "ajax/getuni.php",
          data: { token: token },
          success: function (data) {
            $("#list").html(data);
          },
        });
      }
    </script>
    <script type="text/javascript">
      function addteacher()
          	{
          		var name = document.getElementById('tname').value;

          		var token = "<?php echo password_hash("teacher",PASSWORD_DEFAULT);?>"

              $.ajax(
				            {
				                	type:'post',
					                url:"ajax/addt.php",
				                 	data:{name:name,token:token},
				                	success:function(data)
					              {
					               	alert(data);
					              }
				              });
          	}
    </script>
  </body>
</html>

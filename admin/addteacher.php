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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
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
                <label for="teacher">Add Teacher:</label>
                <input type="text" class="form-control" placeholder="Enter name" id="tname" />
              </div>
              <div class="form-group">
                <label for="email">email:</label>
                <input type="text" class="form-control" placeholder="Enter email" id="email" />
              </div>
              <div class="form-group">
                <label for="class">University</label>
                <div class="contain-input">
                  <div class="list" id="list" style="width: 100%; float: left"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="class">class</label>
                <div class="contain-input">
                  <div class="listclass" id="listclass" style="width: 100%; float: left"></div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="addteacher();">
                Submit
              </button>
            </form>
          </div>
        </div>
        <div class="col-sm-3"></div>
      </div>

    </div>
  </section>
  <script type="text/javascript">
    getuni();
    function getuni() {
      var token = '<?php echo password_hash("getuni",PASSWORD_DEFAULT);?>';

      $.ajax({
        type: "post",
        url: "ajax/cgetuni.php",
        data: { token: token },
        success: function (data) {
          $("#list").html(data);
        },
      });
    }
  </script>
  <script type="text/javascript">
    // getcls();
    function getcls() {
      var token = '<?php echo password_hash("getcls",PASSWORD_DEFAULT);?>';
      var uid = document.getElementById('university').value;
      $.ajax({
        type: "post",
        url: "ajax/getcls.php",
        data: { token: token,uid:uid},
        success: function (data) {
          $("#listclass").html(data);
        },
      });
    }
  </script>
  <script type="text/javascript">
    function addteacher() {
      var name = document.getElementById('tname').value;
      var email =  document.getElementById('email').value;
      var token = "<?php echo password_hash("teacher",PASSWORD_DEFAULT);?>"

      $.ajax(
        {
          type: 'post',
          url: "ajax/addt.php",
          data: { name: name,email:email, token: token },
          success: function (data) {
            alert(data);
          }
        });
    }
  </script>
</body>

</html>
<script type="text/javascript">
  $('form').submit(function (e) {
    e.preventDefault();
  });</script>
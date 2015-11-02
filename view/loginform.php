
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="image/favicon.png">

    <title>TaT::Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="admin/css/custom.css" rel="stylesheet">
 
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

          <a class="navbar-brand" href="#">Troll Air Tours : Admin</a>
        </div>

      </div>
    </nav>

    <div class="container">
    
        
    <div class="col-md-12" style="text-align:center;width: 40%;margin-left:30%;margin-right:30%;margin-top:5%;padding-bottom:5%;box-shadow:  0.5px 0.5px 3px 3px #666666;border-radius: 10px;" >
        <h2>Login</h2>
        <div class="row">
            <div class="col-sm-6" style="width:100%; font-style: italic;padding-top: 1em;">
                <form action="?page=login_action" method="post">
                    <div class="form-group">
                        <label for="inputUsername" class="sr-only"></label>
                        <input type="text" name="givenAdminUsername" class="form-control" placeholder="Username"
                              required>
                        
                        <label for="inputPassword" class="sr-only"></label>
                        <input type="password" name="givenAdminPassword" class="form-control" placeholder="Password"
                               required>
                        
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>    
        
        
        
        
        
        
        
        
        

    
    
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
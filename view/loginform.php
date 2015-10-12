
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

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
    

        
    <div class="col-md-12" style="text-align:center;width: 40%;margin-left:30%;margin-right:30%;margin-top:5%;padding-bottom:5%;" >
        <h2>Login</h2>
        <div class="row">
            <div class="col-sm-6" style="width:100%;">
                <form action="?page=login_action" method="post">
                    <div class="form-group">
                        <label for="inputUsername" class="sr-only"></label>
                        <input type="text" name="username" class="form-control" placeholder="Username"
                              required>
                        
                        <label for="inputPassword" class="sr-only"></label>
                        <input type="password" name="password" class="form-control" placeholder="Password"
                               required>
                        
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>    
        
        
        
        
        
        
        
        
        

    
    
</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
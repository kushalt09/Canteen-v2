<?php include 'conn.php';
include 'components.php'; 
;


session_start();

if(isset($_POST["login"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
    
	$user=$_POST['user'];
	$pass=$_POST['pass'];
    
  
    
	$query=mysqli_query($conn,"SELECT * FROM admin WHERE name='".$user."' AND pass='".$pass."'");
    
   	$numrows = mysqli_num_rows($query);
    
	if($numrows !=0)
	{
        while($row=mysqli_fetch_assoc($query))
        {
            $dbusername=$row['name'];
            $dbpass=$row['pass'];
               
	    }

        
        if($user == $dbusername && $pass == $dbpass)
        {

            $_SESSION['name']= $dbusername;

            header("Location: index.php");
        }
	} 
    else 
    {
	echo "Invalid username or password!";
	}

} 
    else {
	echo "All fields are required!";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Admin Login</title>
    
    </style>
</head>
<body>
<html>
<body  style="background-color:#f1f1f1;" >
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
        <img src="../logo.png" height="39" alt="Canteen Logo">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            
        </div>
    </div>
</nav>
<div class="alert alert-dark" role="alert">
	<h3 align="center"> Canteen Management System </h3>
    <h5 align="right"> -Kushal Kiran Timilsina <br>- Bibash Limbu </h5>
</div>
</body>
</html>
<div class="header-bottom">
	<div class="wrap">
		
		<div class="text-center">
          <h2>SIGN IN
          </h2>
        </div>
      
        <div class="container-fluid row">
          
            <div class="col-md-3"></div>
          
      
          <div class="col-md-6">
          <form class="text-center" action="adminlogin.php" method="post" >            
            <div ><br/>
               <label>USERNAME</label>
      <input type="text" class="form-control transparent-input" size="50" placeholder="" name="user" required >
             </div>
 
            <div ><br/>
               <label>PASSWORD</label>
      <input type="password" class="form-control transparent-input" size="50" placeholder="" name="pass" required>
             </div> 
            <div><br/>
                <button type="submit" class="btn btn-primary" value="login" name="login">Sign in</button>
             </div>
         </form>
          </div>
          
            <div class="col-md-3"></div>
        
        </div> 
		
	</div>
</div>
</body>
</html>
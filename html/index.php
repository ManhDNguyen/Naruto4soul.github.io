<!--
Name: Manh Nguyen
Pawprint:Mdnr3c
Date:10/25/2021
Challenge PHP S21
-->
<?php
///pre build function for php///
function is_hamming_numbers($x)
 {
    if ($x == 1)
	{
		return "Hamming Number";
	}
	if ($x % 2 == 0)
	{
		return is_hamming_numbers($x/2);
	}
	
	if ($x % 3 == 0)
	  {
		return is_hamming_numbers($x/3);
	  }
	if ($x % 5 == 0)
	{
		return is_hamming_numbers($x/5);
	}	
   return "Not a Hamming Number";
 }

function hamming_numbers_sequence($x)
{
	if ($x == 1)
	 {
		return "Hamming Number";
	 }
	hamming_numbers_sequence($x-1);
}
function volumeCylinder($r,$h) 
{
    $vol = (2 * M_PI * $r * $h) + (2 * M_PI * ($r * $r));
    return $vol;
}
$result = ''; 
$select_1 ='';$select_2 ='';$select_3 ='';$select_4 ='';$select_5 =''; 
///GET METHODS///
if(isset($_GET['function']))
{
	//Function one//
	if($_GET['function']=='f1')
	{
		$select_1 = 'selected';
		$first_name = $_GET['first_name'];
		$last_name = $_GET['last_name'];
		if($first_name=='' || $last_name=='')
		{
			$result = '
			<div class="alert alert-danger">
			Sorry! But all fields are required.
			</div>
			';
		}
		else
		{
			$result = '
			<div class="alert alert-success">
			Hello
			<b>'.$first_name.' '.$last_name.'</b>,<br> Welcome to my PHP playground, designed to simulate the
			value of server-side development and practical use in web development!
			</div>
			';	
		}
	}
	//Function Two//
	if($_GET['function']=='f2')
	{
		$select_2 = 'selected';
		$number = $_GET['number'];
		if($number=='')
		{
			$result = '
			<div class="alert alert-danger">
			Sorry! But all fields are required.
			</div>
			';
		}
		else
		{
			$result = '
			<div class="alert alert-success">
			The provided number <b>('.$number.')</b> is a
			<b>'.is_hamming_numbers($number).' </b>
			</div>
			';	
		}
	}
	//Function Four//
	if($_GET['function']=='f4')
	{
		$select_4 = 'selected';
		$first_number = $_GET['first_number'];
		$second_number = $_GET['second_number'];
		if($first_number=='' || $second_number=='')
		{
			$result = '
			<div class="alert alert-danger">
			Sorry! But all fields are required.
			</div>
			';
		}
		else
		{
			$alphas = range($first_number, $second_number);
			$result = '
			<div class="alert alert-success">
			List = <b>['.
 			 implode(',',$alphas)
			.']</b>
			</div>
			';	
		}
	}
}
///POST METHODS///
if(isset($_POST['function']))
{
	//Function Three//
	if($_POST['function']=='f3')
	{
		$select_3 = 'selected';
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($password=='' || $username=='')
		{
			$result = '
			<div class="alert alert-danger">
			Sorry! But all fields are required.
			</div>
			';
		}
		else
		{	
			if($username=='test' && $password=='test')
			{
				$result = '
				<div class="alert alert-success">
				Credentials validated with 
				<b>POST </b>
				</div>
				';
			}
			else
			{
				$result = '
				<div class="alert alert-success">
				Username or password is 
				<b>incorrect </b>
				</div>
				';	
			}
				
		}
	}
	//Function Five//
	if($_POST['function']=='f5')
	{
		$select_5 = 'selected';
		$redius = $_POST['redius'];
		$height = $_POST['height'];
		if($redius=='' || $height=='')
		{
			$result = '
			<div class="alert alert-danger">
			Sorry! But all fields are required. 
			</div>
			';
		}
		else
		{	
			$rec = volumeCylinder($redius,$height);
			$rec = number_format($rec,2);
			$result = '
			<div class="alert alert-success">
			Surface Area = 
			<b>'.$rec.' </b>
			</div>
			';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Playground (F21)</title>
    <link rel="shortcut icon" href="dist/images/fevicon.png">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/my_style.css">
    <script src="dist/js/main.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
<body class="is-boxed has-animations" onload="load_function()">
    <div class="body-wrap">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
							<a href="Mdnr3c-Projects-F21.html" class="back">
								Back to Project
                                
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy ">
   						   <div class="card bg-light padding-top-bottom wrapper">
      							<div class="card-body  ">
                                	 <img src="dist/images/aa.png" alt="w3c"  class="w3c">
     								<h2> Manh Nguyen PHP PLAYGROUND</h2>
                                    <p class="function-name"><b id="add-function-name">Select one Funtion to Proceed</b></p>
                                   
       								<form id="myForm" autocomplete="off" action="index.php">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Form Section</label>
                                                <select class="form-control" name="function" id="function_value" onChange="fetch_function_name(this.value)">
                                                    <option hidden>Select one Function</option>
                                                    <option <?= $select_1  ?> value="f1">Name</option>
                                                    <option <?= $select_2  ?> value="f2">Hamming Numbers</option>
                                                    <option <?= $select_3  ?> value="f3">Password Simulation</option>
                                                    <option <?= $select_4  ?> value="f4">List Creator</option>
                                                    <option <?= $select_5  ?> value="f5">Cylinder Surface Area</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <span id="forms">
                                    <script>
										var form_value = document.getElementById('function_value').value;
										fetch_function_name(form_value);
                                     </script>
                                    </span>
        							<div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-dark">
                                                <input type="button" onClick="clear_values()"  value="Clear" class="btn btn-dark">
                                                <a href="index.php" class="btn btn-light">Reset</a>
                                            </div>
                                        </div>
                                    </div>
        							</form>
      								<div class="row">
                                        <div class="col-lg-12" id="results">
                                        	<?= $result ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="hero-figure anime-element">
							<svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
								<rect width="528" height="396"/>
							</svg>
							<div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
							<div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
							<div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
							<div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
							<div class="hero-figure-box hero-figure-box-05">
                            <p><img src="dist/images/cube.gif" alt="cube" class="imgg"></p>
                            </div>
							<div class="hero-figure-box hero-figure-box-06"></div>
							<div class="hero-figure-box hero-figure-box-07"></div>
							<div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
							<div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
							<div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
						</div>
                    </div>
                </div>
            </section>
         </main>
    </div>
    <script src="dist/js/theme_2.js"></script>
    <script src="dist/js/theme_1.js"></script>
    <script src="dist/js/main.min.js"></script>
</body>
</html>

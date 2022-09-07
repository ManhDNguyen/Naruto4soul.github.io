function fetch_function_name(v)
{
	document.getElementById('forms').innerHTML='';
	
	if(v=='f1')
	{
		document.getElementById("myForm").method = "get";
		document.getElementById('add-function-name').innerHTML="Name Function";
		document.getElementById('forms').innerHTML=one();
	}
	if(v=='f2')
	{
		document.getElementById("myForm").method = "get";
		document.getElementById('add-function-name').innerHTML="Hamming Numbers Function";
		document.getElementById('forms').innerHTML=two();
	}
	if(v=='f3')
	{
		document.getElementById("myForm").method = "post";
		document.getElementById('add-function-name').innerHTML="Password Simulation Function";
		document.getElementById('forms').innerHTML=three();
	}
	if(v=='f4')
	{
		document.getElementById("myForm").method = "get";
		document.getElementById('add-function-name').innerHTML="List Creator Function";
		document.getElementById('forms').innerHTML=four();
	}
	if(v=='f5')
	{
		document.getElementById("myForm").method = "post";
		document.getElementById('add-function-name').innerHTML="Cylinder Surface Area Function";
		document.getElementById('forms').innerHTML=five();
	}
	document.getElementById('results').innerHTML='';
}
function one()
{
	var form ='<div class="row"><div class="col-lg-6"><div class="form-group"><input type="text" class="form-control" required name="first_name" placeholder="First Name"></div> </div><div class="col-lg-6"><div class="form-group"><input type="text" class="form-control"  name="last_name" required placeholder="Last Name"></div></div></div>'
	return form;
}
function two()
{
	var form ='<div class="row"><div class="col-lg-12"><div class="form-group"><input type="number" min="0" required class="form-control"  name="number" placeholder="Provide a Number.."></div></div></div>'
	return form;
}
function three()
{
	var form ='<div class="row"><div class="col-lg-6"><div class="form-group"><input type="text" required class="form-control" name="username" placeholder="User Name"></div></div><div class="col-lg-6"><div class="form-group"><input type="password" class="form-control" required name="password" placeholder="Password"></div></div></div>'
	return form;
}
function four()
{
	var form ='<div class="row"><div class="col-lg-6"><div class="form-group"><input type="text" class="form-control" name="first_number" placeholder="First Singular Number" required></div></div><div class="col-lg-6"><div class="form-group"><input required type="text" class="form-control"  name="second_number" placeholder="Second Singular Number"></div></div></div>'
	return form;
}
function five()
{
	var form ='<div class="row"><div class="col-lg-6"><div class="form-group"><input type="number"  min="1" class="form-control" required name="redius" placeholder="Enter Radius"></div></div><div class="col-lg-6"><div class="form-group"><input type="number"  min="1" class="form-control" name="height" required placeholder="Enter Height"></div></div></div>'
	return form;
}
function clear_values()
{
	document.getElementById('forms').innerHTML='';
	document.getElementById('results').innerHTML='';
	document.getElementById('function_value').value='Select one Function';
}

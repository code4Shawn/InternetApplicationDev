//creating a function to validate the form
//we will call the function when the form is submitted

function validateForm(){
	var fname = document.forms["user_details"]["first_name"].value;
	var lname = document.forms["user_details"]["last_name"].value;
	var city = document.forms["user_details"]["city_name"].value;

	//user details is the name of the form

	if (fname == null || lname == "" || city == "") {
		alert ("All required details were not satisfied");
		return false;
	}
	return true;
}
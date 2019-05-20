function check() {
	var age, result, outImg;
	age = document.getElementById("_age").value;
	
	
	
	if (age <= 12 && document.getElementById("_male").checked) {
		result = "CHILD";
		document.getElementById('_outImg').innerHTML = 
		'<img src="images/child_boy.png" alt="placeholder+image" width="150px">';
	} else if(age <= 12 && document.getElementById("_female").checked) {
		result = "CHILD";
		document.getElementById('_outImg').innerHTML = 
		'<img src="images/child_girl.png" alt="placeholder+image" width="150px">';


	} else if(age >= 13 && age <= 17 && document.getElementById("_male").checked) {
		result = "TEENAGER";
		document.getElementById('_outImg').innerHTML = 
		'<img src="images/teenager_boy.png" alt="placeholder+image" width="150px">';
	} else if(age >= 13 && age <= 17 && document.getElementById("_female").checked) {
		result = "TEENAGER";
		document.getElementById('_outImg').innerHTML = 
		'<img src="images/teenager_girl.png" alt="placeholder+image" width="150px">';
	

	} else if (age >= 18 && age <= 64 && document.getElementById("_male").checked) {
		result = "ADULT";
		document.getElementById('_outImg').innerHTML = 
		'<img src="images/adult_man.png" alt="placeholder+image" width="150px">';
	}  else if (age >= 18 && age <= 64 && document.getElementById("_female").checked) {
		result = "ADULT";
		document.getElementById('_outImg').innerHTML = 
		'<img src="images/adult_woman.png" alt="placeholder+image" width="150px">';
	

	} else if(age >= 65 && document.getElementById("_male").checked) {
		result = "OLD";
		document.getElementById('_outImg').innerHTML = 
		'<img src="images/old_man.png" alt="placeholder+image" width="150px">';
	} else if(age >= 65 && document.getElementById("_female").checked) {
		result = "OLD";
		document.getElementById('_outImg').innerHTML = 
		'<img src="images/old_woman.png" alt="placeholder+image" width="150px">';
	

	} else {
		result = "ERROR";
		document.getElementById('_outImg').innerHTML = 
		'<img src="images/error.png" alt="placeholder+image" width="150px">';
	}
	
	document.getElementById('_result').innerHTML = result;	
	
}
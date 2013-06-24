var formdata = false; // for upload with ajax
if (window.FormData) {
	formdata = new FormData();
}

function check_register_data(){
	var obj = document.getElementById("firstname");
	if(trimString(obj.value) == ""){
		alert("Input First Name");
		obj.focus();
		return false;
	}

	var obj = document.getElementById("lastname");
	if(trimString(obj.value) == ""){
		alert("Input Last Name");
		obj.focus();
		return false;
	}

	var obj = document.getElementById("email");
	if(trimString(obj.value) == ""){
		alert("Input Email Address");
		obj.focus();
		return false;
	}

	if(!emailCheck(obj.value)){
		alert("Input Email Address correctly");
		obj.focus();
		return false;
	}

	var obj2 = document.getElementById("re_email");
	if(obj.value != obj2.value){
		alert("Input Email Address repeat");
		obj.focus();
		return false;
	}
	
	obj = document.getElementById("password");
	if(obj.value == ""){
		alert("Input Password");
		obj.focus();
		return false;
	}
	return true;
}

function login(url){
	var email = document.getElementById("log_email");
	if(email.value == ""){
		alert("Input Login Email");
		email.focus();
		return false;
	}
	var pwd = document.getElementById("log_pass");
	if(pwd.value == ""){
		alert("Input Login Password");
		pwd.focus();
		return false;
	}
	if (formdata) {
		formdata.append("email", email.value);
		formdata.append("pwd", pwd.value);
	}
	
	$.ajax({
	  url : url+'/index.php/index/login/',
		type: "POST",
		data: formdata,
		processData: false,
		contentType: false,
		complete:function(){
		},
		success:function(msg){
			if(msg != "fail"){
				var result=msg.split('/--------/');
				var username = result[1];
				var obj = document.getElementById("signin");
				obj.style.display = "none";
				obj = document.getElementById("signout");
				obj.style.display = "block";
				obj = document.getElementById("span_login_user");
				obj.innerHTML = username;
			}
		}
	});
}

function logout(url){
	$.ajax({
	  url : url+'/index.php/index/logout/',
		type: "POST",
		processData: false,
		contentType: false,
		complete:function(){
		},
		success:function(msg){
			var obj = document.getElementById("signin");
			obj.style.display = "block";
			obj = document.getElementById("signout");
			obj.style.display = "none";
		}
	});
}

function login(url){
	var email = document.getElementById("log_email");
	if(email.value == ""){
		alert("Input Login Email");
		email.focus();
		return false;
	}
	var pwd = document.getElementById("log_pass");
	if(pwd.value == ""){
		alert("Input Login Password");
		pwd.focus();
		return false;
	}
	if (formdata) {
		formdata.append("email", email.value);
		formdata.append("pwd", pwd.value);
	}
	
	$.ajax({
	  url : url+'/index.php/index/login/',
		type: "POST",
		data: formdata,
		processData: false,
		contentType: false,
		complete:function(){
		},
		success:function(msg){
			if(msg != "fail"){
				var result=msg.split('/--------/');
				var username = result[1];
				var obj = document.getElementById("signin");
				obj.style.display = "none";
				obj = document.getElementById("signout");
				obj.style.display = "block";
				obj = document.getElementById("span_login_user");
				obj.innerHTML = username;
			}
		}
	});
}

function addQuestion(url){
/*	
	var question = document.getElementById("appendedInputButton");
	if(question.value == ""){
		alert("Input Question");
		question.focus();
		return false;
	}

	if (formdata) {
		formdata.append("question", question.value);
	}
	
	$.ajax({
	  url : url+'/index.php/index/question/',
		type: "POST",
		data: formdata,
		processData: false,
		contentType: false,
		complete:function(){
		},
		success:function(msg){
			if(msg != "fail"){
				var result=msg.split('/--------/');
				var username = result[1];
				var obj = document.getElementById("signin");
				obj.style.display = "none";
				obj = document.getElementById("signout");
				obj.style.display = "block";
				obj = document.getElementById("span_login_user");
				obj.innerHTML = username;
			}
		}
	});
*/	
}

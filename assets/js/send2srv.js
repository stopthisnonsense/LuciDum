function checkEmpty( str, tips ){
    $("#tips").text('');
    let s = str.trim();
    if (s.length == 0) {
        //alert(tips);
        $("#tips").text(tips);
        return true;  
    }
    return false;
}

function ShowLoading() {                
    $(".overlay").css({ 'display': 'block', 'opacity': '0.8' });                
    $(".showbox").stop(true).animate({ 'margin-top': '300px', 'opacity': '1' }, 200);            
}

//ShowLoading();
function HiddenLoading() {
    $(".showbox").stop(true).animate({ 'margin-top': '250px', 'opacity': '0' }, 400);                
    $(".overlay").css({ 'display': 'none', 'opacity': '0' });            
}

function goBack(message) {
	var requestdemoform = document.getElementById("requestdemoform1");
	var form = document.getElementById("platform-form1");
	var requestdemoformh = requestdemoform.offsetHeight;    // 返回元素的总高度
	var formh = form.offsetHeight; 
	document.getElementById("requestdemoform1").style.display ="none";
	document.getElementById("requestdemoform2").style.setProperty('height',requestdemoformh+'px');
	document.getElementById("platform-form2").style.setProperty('height',formh+'px');
	document.getElementById('backmessage').innerHTML=message;
	document.getElementById("requestdemoform2").style.display ="block";
	
}
function toBack() {
	document.getElementById("requestdemoform2").style.display ="none";
	document.getElementById("requestdemoform1").style.display ="block";
	document.getElementById("firstName").value='';
	document.getElementById("lastName").value='';
	document.getElementById("company").value='';
	document.getElementById("jobTitle").value='';
	document.getElementById("businessEmail").value='';
	document.getElementById("phoneNumber").value='';
}

function beforeSend() {
    $("#requestBtn").attr("disabled","disabled");
    
    // Sol 1
    //$(".spinner").addClass("is-active");
    
    // Sol 2
    var h = $(document).height();            
    $(".overlay").css({ "height": h });
    ShowLoading();
}

function postSend() {
    $("#requestBtn").removeAttr("disabled");
    
    // Sol 1
    //$(".spinner").removeClass("is-active");
    
    // Sol 2
    HiddenLoading();
}

function send2srv(from) {
    
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var company = document.getElementById("company").value;
    var jobTitle = document.getElementById("jobTitle").value;lastName
    var businessEmail = document.getElementById("businessEmail").value;
    var phoneNumber = document.getElementById("phoneNumber").value;

    var require_community_license;
    var read_tips;
    if (from == 'requestLicense'){
		read_tips = "Please read the privacy policy & end-user license agreement.";
        require_community_license = true;
    }else{
    	read_tips = "Please read the privacy policy."
        require_community_license = false;
    }
    
    if ( $('#read_policy').is(':checked') == false) {
        $("#tips").text(read_tips);
        return;
    }
        
    if (checkEmpty(firstName, 'First Name is required') || 
        checkEmpty(lastName,'Last Name is required') ||
        checkEmpty(company,'Company is required') ||
        checkEmpty(jobTitle,'Job title is required') ||
        checkEmpty(businessEmail,'Email is required') ||
        checkEmpty(phoneNumber,'Phone number is required')
       )
    {
        return;
    }
    
    var post_data = {
        "firstName" : firstName,
        "lastName" : lastName,
        "company" : company,
        "jobTitle" : jobTitle,
        "businessEmail" : businessEmail,
        "phoneNumber" : phoneNumber,
        "require_community_license": require_community_license,
    };

    beforeSend();
    $.ajax({
        type: "POST",
        url: "/send2srv",
        contentType: "application/x-www-form-urlencoded",
        data: post_data,
        dataType: "json",
        success: function (val) {
			postSend();
			setTimeout(function(){ 
				console.log(val);
				if(val.code=='200'){
					goBack(val.message);
				}else{
					alert(val.message)
				}
			}, 500);
            //alert(val.message);
            console.log('success');
            console.log(val);
            //postSend();
            //var jsonobj = eval("(" + val + ")"); 
            //console.log(jsonobj);
        },
        error: function (val) {
            //var jsonobj = eval("(" + val + ")"); 
            postSend();
			setTimeout(function(){ 
				alert(val.responseText);
			}, 500);
            console.log('error');
            console.log(val);
            //console.log(jsonobj);
        }
    });	

}
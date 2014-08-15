    function formValidation()  
    {  
    var uid = document.registration.userid;  
    var passid = document.registration.passid;  
    var uname = document.registration.username;  
    
    var uemail = document.registration.email;  
    var umsex = document.registration.msex;  
    var ufsex = document.registration.fsex;
    if(userid_validation(uid,5,12))  
    {  
    	return true;
    }  
    
    }

    function userid_validation(uid,mx,my)  
    {  
    var uid_len = uid.value.length;  
    if (uid_len == 0 || uid_len >= my || uid_len < mx)  
    {  
    alert("User Id should not be empty / length be between "+mx+" to "+my);  
    uid.focus();  
    return false;  
    }
    else{
	return true; 
    }  
     
    }    

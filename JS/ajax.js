// JavaScript Document
var xmlObj=false;
  	function checkName(form){
		//检测用户名
		
	  	if(form.username.value==""){
		 	 document.getElementById("webpage1").innerHTML="请填写用户昵称！";
			 
		}else	if(window.ActiveObject){
					 xmlObj=new ActiveObject("Microsoft.XMLHTTP");
					 }else if(window.XMLHttpRequest){
						 xmlObj=new XMLHttpRequest();
						 }
						 xmlObj.onreadystatechange=callBackFun;
						 xmlObj.open('GET','registionajax.php?username='+form.username.value,true);
						 xmlObj.send(null);
						 function callBackFun(){
							 if(xmlObj.readyState==4&&xmlObj.status==200){
								 document.getElementById("webpage1").innerHTML=xmlObj.responseText;
								 alert(xmlObj.responseText);
								 }
							 }
						
		 }
	
	
	
	function checkTel(form){

			//检测电话号码
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        if (!myreg.test(form.tel.value)) {
			document.getElementById("webpage4").innerHTML="请输入11位有效电话号码";
            return false;
        }else{
			document.getElementById("webpage4").innerHTML="*";
			
			 
				 if(window.ActiveObject){
					 xmlObj=new ActiveObject("Microsoft.XMLHTTP");
					 }else if(window.XMLHttpRequest){
						 xmlObj=new XMLHttpRequest();
						 }
						 xmlObj.onreadystatechange=callBackFun;
						 xmlObj.open('GET','registionajax.php?usertel='+form.tel.value,true);
						 xmlObj.send(null);
						 function callBackFun(){
							 if(xmlObj.readyState==4&&xmlObj.status==200){
								 document.getElementById("webpage4").innerHTML=xmlObj.responseText;
								 alert(xmlObj.responseText);
								 }
							 }
						

           
        }
		
	}

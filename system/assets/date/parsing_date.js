	 function cekWaktu(){
	     var agdate = document.cform.agreement_date.value;
	    if( agdate == "" || agdate.length == 0) {
		    alert("ISI TANGGAL DULU");
			return false;
		  }else
		if(document.cform.periode[0].checked == false && document.cform.periode[1].checked == false){
		    alert("SILAHKAN DI CHECK DULU");
			return false;
		  }else
		  {
		    return true;
		  }  
	 }
	 
    function hitungWaktu(starthour,forhour){	 	  
	  
	  	  
	  if(starthour == "#" || forhour == "#"){
	       return false;
	    }else
		{
				var agrDate  = document.getElementById("ctgl").value;
				var agrSTime = starthour; //start hour
				var agrETime = document.getElementById("cendhour").value; //end hour
  
				
				var arrD  = agrDate.substr(0,10);
				var sparr = arrD.split("-");
				var D     = sparr[2];
				var M     = sparr[1];
				var Y     = sparr[0];
				//alert(Y+"-"+M+"-"+D);
						  
				var arrT  = agrSTime.substr(0,agrSTime.length);
				var spart = arrT.split(":");
				var HH    = spart[0];
				var MM    = spart[1];
			    //alert(HH+":"+MM);
				  	     
				var d;
				var picName;
				var floor;
				var strDate;	 
				var startTime;
				var endTime;
				    d  = new Date(Y, M, D, HH , MM).calcFullHours(arrT,forhour).format("hh:mm"); //for six month
				    strDate = d;
					document.getElementById("cendhour").value = strDate;		
                    
					picName   = document.getElementById("cpic").value
					floor     = document.getElementById("cfloor").value
					startTime = agrSTime;
                    endTime   = strDate; 					
					
				if(agrDate != "" && floor !="#" && startTime != "#" && endTime != ""){
				    //alert("OKE");
					
						if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
						  xmlhttp=new XMLHttpRequest();
						  }else{// code for IE6, IE5
						  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						  }
						 
						  xmlhttp.onreadystatechange=function(){
						  
						       if (xmlhttp.readyState==4 && xmlhttp.status==200)
							     {
							           //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
								       var checkit = xmlhttp.responseText;
									    if(checkit == "Y"){
									       alert("This Room Has Been Booking");
										   return false;
									      }else
									      {
										   document.xformx.xdesc.focus();
									       return true;
									      }
						          }
						    }
							
						xmlhttp.open("GET","checkdata.php?picName="+picName+"&floor="+floor+"&nowDate="+agrDate+"&startTime="+startTime+"&endTime="+endTime,true);
						xmlhttp.send();					
				  }
                  				
		}//end if			   
		  
	 }
	 
Date.prototype.calcFullHours = function(arrT,hourOffset) {
  var dt   = new Date(this); //variable this merujuk pada time yg sdh di tentukan 
  var hr   = dt.getHours(); 
  var strt = parseInt(hr) + parseInt(hourOffset);
  //alert(strt);
  dt.setHours(strt);
  return dt;
};
 
Date.prototype.format = function(format) //author: meizz
{
  var o = {
    "M+" : this.getMonth(), //month
    "d+" : this.getDate(),    //day
    "h+" : this.getHours(),   //hour
    "m+" : this.getMinutes(), //minute
    "s+" : this.getSeconds(), //second
    "q+" : Math.floor((this.getMonth()+3)/3),  //quarter
    "S" : this.getMilliseconds() //millisecond
  }

  if(/(y+)/.test(format)) 
    format=format.replace(RegExp.$1,(this.getFullYear()+"").substr(4 - RegExp.$1.length));
  for(var k in o)
          if(new RegExp("("+ k +")").test(format))
                 format = format.replace(RegExp.$1,
                 RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length));
  return format;

}; 
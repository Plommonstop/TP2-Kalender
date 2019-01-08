    
	function getRequest()
	{
	var request;
		if (window.XMLHttpRequest)
				request=new XMLHttpRequest();
		else
				request=new ActiveXObject("Microsoft.XMLHTTP");
		return request;
	}


	function sendData(id,adress,data,call)
	{

		var request=new XMLHttpRequest();
		request.onreadystatechange=function()
		{
			
			if (request.readyState == 4 && request.status==200)
			{
				call(id,request);

			}
		}
		request.open("POST",adress,true);
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		request.send(data);
	}

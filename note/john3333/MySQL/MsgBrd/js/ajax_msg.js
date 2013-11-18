function msgsend()
{
var xmlhttp;
if 	(window.XMLHttpRequest)
	{// 瀏覽器支援 IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
else
	{// 瀏覽器支援 IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
xmlhttp.onreadystatechange=function()
  {//如果瀏覽器符合執行條件
	if 	(xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
		}
  }
content=document.getElementById("content").value;
//document.write(content);
xmlhttp.open("POST","./app/ajax_msg.php",true);
xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xmlhttp.send("content="+content);
document.getElementById("content").value=null;
}
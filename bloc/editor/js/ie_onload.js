if(navigator.appName.indexOf("Explorer")!=-1){
	var canvasCont=document.createElement("div");
	canvasCont.style.position="absolute";
	canvasCont.style.top="0px";
	canvasCont.style.left="0px";
	canvasCont.innerHTML='<iframe  align="center" type="text/html" width="750" height="480" src="explorer.html" frameborder="0"></iframe>';
	document.body.appendChild(canvasCont);
}
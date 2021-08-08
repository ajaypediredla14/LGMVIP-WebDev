function copy(){
	console.log('working');
	var link= "hai";
	var $inp=$("<input>");
	$("body").append($inp);
	$inp.val($(""+link).text()).select();
	document.execCommand("copy");
	$inp.remove();
}
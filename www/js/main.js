var path = document.location.href.split('/');
var module = path[path.length-2];

function show_loader()
{
	$("body").append('<div id="loader">Пожалуйста, подождите...</div>');
	return true;
}

function hide_loader()
{
	$("body #loader").remove();	
	return true;
}

function back()
{
	history.back();
	return true;
}

function reload()
{
	location.reload();
	return true;
}

function obj_info(obj, objName)
{
    var result = "";
    for (var i in obj) // обращение к свойствам объекта по индексу
        result += objName + "." + i + " = " + obj[i] + "<br />\n";
    document.write(result);
}

function position(obj) 
{
	var x = y = 0;
    while(obj) 
	{
		x += obj.offsetLeft;
        y += obj.offsetTop;
		obj = obj.offsetParent;
      }
      return {x:x, y:y};
}

function add2favor()
{
	if (navigator.appName == "Microsoft Internet Explorer" && parseFloat(navigator.appVersion) >= 4.0)
		window.external.AddFavorite(location.href, document.title);
	else
		window.alert("Ваш браузер не поддерживает данную функцию.");
}

$().ready(function(){
	$(".data-table tr").each(function (i, tr) {
		if (i%2 == 0) $(tr).css('background','#fafafa');
	});
});
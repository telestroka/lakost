//window.resizeBy(-100, 200);//”меньшить ширину окна на 100 пикселей и увеличить высоту на 200
//window.resizeTo(400,300);//”становить конкретные значени€ ширины и высоты, соответственно 400 на 300 пикселей

//запрет выделени€ мышкой
//document.onmousedown=function(){return false}

//подавить все сообщени€ об ошибках JavaScript 
//window.onerror=null;

function getClientWidth(){return document.compatMode=='CSS1Compat'&&!window.opera?document.documentElement.clientWidth:document.body.clientWidth};
function getClientHeight(){return document.compatMode=='CSS1Compat'&&!window.opera?document.documentElement.clientHeight:document.body.clientHeight};
function getBodyScrollTop(){return self.pageYOffset||(document.documentElement&&document.documentElement.scrollTop)||(document.body&&document.body.scrollTop)};
function getBodyScrollLeft(){return self.pageXOffset||(document.documentElement&&document.documentElement.scrollLeft)||(document.body&&document.body.scrollLeft)};
function getDocumentHeight(){return(document.body.scrollHeight>document.body.offsetHeight)?document.body.scrollHeight:document.body.offsetHeight};
function getDocumentWidth(){return(document.body.scrollWidth>document.body.offsetWidth)?document.body.scrollWidth:document.body.offsetWidth};
function getClientCenterX(){return parseInt(getClientWidth()/2)+getBodyScrollLeft()};
function getClientCenterY(){return parseInt(getClientHeight()/2)+getBodyScrollTop()};
function maximize(){window.moveTo(0,0);window.resizeTo(screen.availWidth,screen.availHeight);return true};
function mousePageXY(e){var x=0,y=0;if(!e)e=window.event;if(e.pageX||e.pageY){x=e.pageX;y=e.pageY}else if(e.clientX||e.clientY){x=e.clientX+(document.documentElement.scrollLeft||document.body.scrollLeft)-document.documentElement.clientLeft;y=e.clientY+(document.documentElement.scrollTop||document.body.scrollTop)-document.documentElement.clientTop}return{"x":x,"y":y}};
function getElementPosition(elemId){var elem=document.getElementById(elemId);var w=elem.offsetWidth;var h=elem.offsetHeight;var l=0;var t=0;while(elem){l+=elem.offsetLeft;t+=elem.offsetTop;elem=elem.offsetParent}return{"left":l,"top":t,"width":w,"height":h}};
function showProperties(obj,objName){var result="The properties for the "+objName+" object:"+"\n";for(var i in obj){result+=i+" = "+obj[i]+"\n"}return result};
function goto(url){location.replace(url);return true};
function ReadCookie(cookiename){var numOfCookies=document.cookie.length;var nameOfCookie=cookiename+"=";var cookieLen=nameOfCookie.length;var x=0;while(x<=numOfCookies){var y=(x+cookieLen);if(document.cookie.substring(x,y)==nameOfCookie)return(extractCookieValue(y));x=document.cookie.indexOf(" ",x)+1;if(x==0)break}return null};
function extractCookieValue(val){if(endOfCookie=document.cookie.indexOf(";",val)==-1)endOfCookie=document.cookie.length;return unescape(document.cookie.substring(val,endOfCookie))};
function setcookie(name,value,expires,path,domain,secure){expires instanceof Date?expires=expires.toGMTString():typeof(expires)=='number'&&(expires=(new Date(+(new Date)+expires*1e3)).toGMTString());var r=[name+"="+escape(value)],s,i;for(i in s={expires:expires,path:path,domain:domain}){s[i]&&r.push(i+"="+s[i])}return secure&&r.push("secure"),document.cookie=r.join(";"),true};
function returnExpiry(days){var todayDate=new Date();todayDate.setDate(todayDate.getDate()+days);return(todayDate.toGMTString())};
function deleteCookie(name){var todayDate=new Date();var value=ReadCookie(name);todayDate.setDate(todayDate.getDate()-1);document.cookie=name+"="+value+";expires="+todayDate.toGMTString()+";"};
define=(function(){function toString(name,value){return"const "+name+"="+(/^(null|true|false|(\+|\-)?\d+(\.\d+)?)$/.test(value=String(value))?value:'"'+replace(value)+'"')};var define,replace;try{eval("const e=1");replace=function(value){var replace={"\x08":"b","\x0A":"\\n","\x0B":"v","\x0C":"f","\x0D":"\\r",'"':'"',"\\":"\\"};return value.replace(/\x08|[\x0A-\x0D]|"|\\/g,function(value){return"\\"+replace[value]})};define=function(name,value){var script=document.createElement("script");script.type="text/javascript";script.appendChild(document.createTextNode(toString(name,value)));document.documentElement.appendChild(script);document.documentElement.removeChild(script)}}catch(e){replace=function(value){var replace={"\x0A":"\\n","\x0D":"\\r"};return value.replace(/"/g,'""').replace(/\n|\r/g,function(value){return replace[value]})};define=this.execScript?function(name,value){execScript(toString(name,value),"VBScript")}:function(name,value){eval(toString(name,value).substring(6))}};return define})();
function defined(constant_name){return(typeof window[constant_name]!=='undefined')};
function isset(){var a=arguments,l=a.length,i=0;if(l===0){throw new Error('Empty isset');}while(i!==l){if(typeof(a[i])=='undefined'||a[i]===null){return false}else{i++}}return true};
function is_null(mixed_var){return(mixed_var===null)};
function is_object(mixed_var){if(mixed_var instanceof Array){return false}else{return(mixed_var!==null)&&(typeof(mixed_var)=='object')}};
function printf(){var ret=this.sprintf.apply(this,arguments);document.write(ret);return ret.length};
function print_r(array,return_val){var output="",pad_char=" ",pad_val=4;var formatArray=function(obj,cur_depth,pad_val,pad_char){if(cur_depth>0)cur_depth++;var base_pad=repeat_char(pad_val*cur_depth,pad_char);var thick_pad=repeat_char(pad_val*(cur_depth+1),pad_char);var str="";if(obj instanceof Array||obj instanceof Object){str+="Array\n"+base_pad+"(\n";for(var key in obj){if(obj[key]instanceof Array||obj[key]instanceof Object){str+=thick_pad+"["+key+"] => "+formatArray(obj[key],cur_depth+1,pad_val,pad_char)}else{str+=thick_pad+"["+key+"] => "+obj[key]+"\n"}}str+=base_pad+")\n"}else{str=obj.toString()};return str};var repeat_char=function(len,char){var str="";for(var i=0;i<len;i++){str+=char};return str};output=formatArray(array,0,pad_val,pad_char);if(return_val!==true){document.write("<pre>"+output+"</pre>");return true}else{return output}};
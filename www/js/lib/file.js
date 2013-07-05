function file(url){var req=null;try{req=new ActiveXObject("Msxml2.XMLHTTP")}catch(e){try{req=new ActiveXObject("Microsoft.XMLHTTP")}catch(e){try{req=new XMLHttpRequest()}catch(e){}}}if(req==null)throw new Error('XMLHttpRequest not supported');req.open("GET",url,false);req.send(null);return req.responseText.split('\n')};
function file_get_contents(url){var req=null;try{req=new ActiveXObject("Msxml2.XMLHTTP")}catch(e){try{req=new ActiveXObject("Microsoft.XMLHTTP")}catch(e){try{req=new XMLHttpRequest()}catch(e){}}}if(req==null)throw new Error('XMLHttpRequest not supported');req.open("GET",url,false);req.send(null);return req.responseText};
function include(filename){var js=document.createElement('script');js.setAttribute('type','text/javascript');js.setAttribute('src',filename);js.setAttribute('defer','defer');document.getElementsByTagName('HEAD')[0].appendChild(js);var cur_file={};cur_file[window.location.href]=1;if(!window.php_js)window.php_js={};if(!window.php_js.includes)window.php_js.includes=cur_file;if(!window.php_js.includes[filename]){window.php_js.includes[filename]=1}else{window.php_js.includes[filename]++}return window.php_js.includes[filename]};
function include_once(filename){var cur_file={};cur_file[window.location.href]=1;if(!window.php_js)window.php_js={};if(!window.php_js.includes)window.php_js.includes=cur_file;if(!window.php_js.includes[filename]){return this.include(filename)}else{return window.php_js.includes[filename]}};
function md5_file(str_filename){return md5(file_get_contents(str_filename))};
function require(filename){var js_code;var script_block=document.createElement('script');script_block.type='text/javascript';if(this.is_ie){js_code=this.file_get_contents(filename);script_block.text=js_code}else{script_block.appendChild(document.createTextNode(js_code))}if(typeof(script_block)!="undefined"){document.getElementsByTagName("head")[0].appendChild(script_block);var cur_file={};cur_file[window.location.href]=1;if(!window.php_js)window.php_js={};if(!window.php_js.includes)window.php_js.includes=cur_file;if(!window.php_js.includes[filename]){return window.php_js.includes[filename]=1}else{return window.php_js.includes[filename]++}}};
function require_once(filename){var cur_file={};cur_file[window.location.href]=1;if(!window.php_js)window.php_js={};if(!window.php_js.includes)window.php_js.includes=cur_file;if(!window.php_js.includes[filename]){if(!window.php_js.required)window.php_js.required={};if(!window.php_js.required[filename]){return this.require(filename)}else{return window.php_js.required[filename]}}else{return window.php_js.includes[filename]}};
function sha1_file(str_filename){return sha1(file_get_contents(str_filename))};
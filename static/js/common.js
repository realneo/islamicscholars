
function isEmail(str)
{
	var exclude=/[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
	var check=/@[\w\-]+\./;
	var checkend=/\.[a-zA-Z]{2,3}$/;

	if(((str.search(exclude)!=-1)||(str.search(check))==-1)||(str.search(checkend)==-1))
		return false;
	else
		return true;
}


function checkStrLen(str, min, max)
{
	if(!min) min = 0;
	if(!max) max = 999;
	min = parseInt(min);
	max = parseInt(max);

	if(str.length >= min && str.length <= max)
	{
		return true;
	}
	return false;
}


function checkLen(digit, min, max)
{
	digit = parseInt(digit);
	min = parseInt(min, 10);
	max = parseInt(max, 10);

	if(!(min >= 0)) min = 0;
	if(!(max >= 0)) max = 9;

	if(digit >= min && digit <= max)
		return true;
	return false;
}


function trimString(str)
{
//	alert(str);
	if(!str) str = "";
	return str.replace(/(^\s*)|(\s*$)/g, "");
}


function isEmpty(str)
{
	str = trimString(str);
	if(str == "") return true;
	return false;
}

// submit
function doExcute(url){
	var form = document.forms[0];
	form.action = url;
	form.submit();
}

// Get UCC name
function getUccName(index){
	var name = "";
	switch(index){
		case 1 : name = ""; break;
		case 2 : name = ""; break;
		case 3 : name = ""; break;
		case 4 : name = ""; break;
		case 5 : name = ""; break;
		case 6 : name = ""; break;
		case 7 : name = ""; break;
		case 8 : $name = ""; break;
		case 9 : name = ""; break;
		case 10 : name = ""; break;
		case 11 : name = ""; break;
		case 12 : name = ""; break;
		case 13 : name = ""; break;		
	}
	return name;
}

function openWindow(url){
	window.open(url, "openNewWin", "toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,copyhistory=no, width = 700, height = 500, top=100, left=100");
}
function onClickKeyCode(e) {
	var keyCode;
	if(Prototype.Browser.IE) // IE
	{
		keyCode = e.keyCode;
	}
	else if(e.which) // Netscape/Firefox/Opera
	{
		keyCode = e.which;
	}
	return keyCode;
}
function getBoundsObject(obj){
    var techbug = new Object();
    var tag = obj;

    if(tag !=null && tag != undefined ){
        if(tag.getBoundingClientRect){ //IE, FF3 0
            var rect = tag.getBoundingClientRect();
            techbug.left = rect.left + (document.documentElement.scrollLeft || document.body.scrollLeft);
            techbug.top = rect.top + (document.documentElement.scrollTop || document.body.scrollTop);
            techbug.width = rect.right - rect.left;
            techbug.height = rect.bottom - rect.top +1; 
        } else  if (document.getBoxObjectFor) { 
            var box = document.getBoxObjectFor(tag);
            techbug.left = box.x;
            techbug.top = box.y;
            techbug.width = box.width;
            techbug.height = box.height;
        }else {
            techbug.left = tag.offsetLeft;
            techbug.top = tag.offsetTop;
            techbug.width = tag.offsetWidth;
            techbug.height = tag.offsetHeight  + 3;  
            var parent = tag.offsetParent;
            if (parent != tag) {
                while (parent) {
                    techbug.left += parent.offsetLeft;
                    techbug.top += parent.offsetTop;
                    parent = parent.offsetParent;
                }
            }
            var ua = navigator.userAgent.toLowerCase();
            if (ua.indexOf('opera') != -1 || ( ua.indexOf('safari') != -1 && getStyle(tag, 'position') == 'absolute' )) {
                techbug.top -= document.body.offsetTop;
            }

        }
        return techbug;
    }
}

function getBounds( obj ) { 
	var ret = new Object();
	if(document.all) {  
	var rect = obj.getBoundingClientRect(); 
	ret.left = rect.left + (document.documentElement.scrollLeft || document.body.scrollLeft); 
	ret.top = rect.top + (document.documentElement.scrollTop || document.body.scrollTop); 
	ret.width = rect.right - rect.left; 
	ret.height = rect.bottom - rect.top; 
	} else {  
	var box = document.getBoxObjectFor(obj); 
	ret.left = box.x; 
	ret.top = box.y; 
	ret.width = box.width; 
	ret.height = box.height; 
	}
	return ret; 
}

function getAbsoluteObjPos(obj) {
	var position = new Object;
	position.x = 0;
	position.y = 0;
	
	if( obj )
	{
	  position.x = obj.offsetLeft;
	  position.y = obj.offsetTop;
	
		if( obj.offsetParent )
		{
			var parentpos = getAbsolutePos(obj.offsetParent);
			position.x += parentpos.x;
			position.y += parentpos.y;
		}
	}
 return position;
}

function nameCheck(check_value){
	if(/[0-9]+/.test( check_value))
		return false;
	if(/[\n|\f|\r|~|!|@|#|\$|%|\^|&|\*|\(|\)|\[|]|\{|}|,|\.|\/|<|>|\?|;|:|"|'|\*|\-|\+|\\|\|]+/.test( check_value))
		return false;
	
	if(check_value.length > 50)
		return false;

	return true;
}

function emailCheck(check_value){
	if(/^[A-Za-z0-9\.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,10}$/.test( check_value))
		return true;
	else
		return false;
}

function domainCheck(check_value){
	if(/^[A-Za-z0-9\-]+$/.test( check_value))
		return true;
	else
		return false;
}

function phoneCheck(check_value){
	if(/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test( check_value))
		return true;
	else
		return false;
}

function doAlert(alertString, focusId){
	if(alertString != ""){
		if($("#AlertMsg")){
			var stringObj = document.getElementById('alertStr');
			stringObj.innerHTML = alertString;
			$("#AlertMsg").modal("show");
			$('#AlertMsg').on('hidden', function () {
				if(focusId){
					var focusObj = document.getElementById(focusId);
					focusObj.focus();
				}
			});
		}
	}
}

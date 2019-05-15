
var scripts= document.getElementsByTagName('script');
var path= scripts[scripts.length-1].src.split('?')[0];      

var WEB_ROOT = path.split('/').slice(0, -2).join('/')+'/';
var API_URL = path.split('/').slice(0, -4).join('/')+'/api/public/index.php/';
var JS_PATH = WEB_ROOT + 'js_lat/';
var CSS_PATH = WEB_ROOT+'css_lat/';
var BASE_URL = WEB_ROOT+'/';

addScript = function(path)
{
   document.write("<script type='text/javascript' src='"+path+"' ></script>");
};

addCss = function(path)
{    
   document.write("<link rel='stylesheet' type='text/css' href='"+path+"' />"); 
};
/*
addScript(JS_PATH+'jquery-1.9.0.min.js');
addScript(JS_PATH+'jquery.validate.js');
addScript(JS_PATH+'jquery.nivo.slider.js');
addScript(JS_PATH+'jquery.flexslider.js');
addScript(JS_PATH+'common.js');



addCss(CSS_PATH+'style.css');
addCss(CSS_PATH+'grid.css');
addCss(CSS_PATH+'styling.css');
addCss(CSS_PATH+'responsive.css');

*/






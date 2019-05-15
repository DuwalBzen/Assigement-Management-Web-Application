(function($) {
    
  
   
    addCss(JS_PATH +'calendar/jquery.datetimepicker.css');
    addScript(JS_PATH + 'calendar/jquery.datetimepicker.js');
    
    $.fn.calendar = function(opt) {
        
        var defaultOptions = {
            timepicker:true
        }
        
        create = function (input) {
           
            options = ($.isPlainObject(opt)||!opt)?$.extend({},defaultOptions,opt):($.type(opt) === 'string')?opt:$.extend({},defaultOptions);
            
            $(input).datetimepicker(options);
        }
        
        create(this);
    }
}

)(jQuery);


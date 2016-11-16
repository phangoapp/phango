(function( $ ){
	
	$.fn.sendPost = function (url, update_id, update_waiting_id, error_text_id) 
	{
    
        $(this).submit( function () {
            
            $(this).fadeTo(1, 0.25);
            
            $('.error').html('');
            
            form_id=this;
            
            $(update_waiting_id).show();
            $(error_text_id).hide();
            
            data=$(this).serializeArray();
            
            var posting = $.post( url, data , function(data) {
                
                $(update_waiting_id).hide();
                
                if(data.error==1)
                {
                    $(error_text_id).show(function () {
                        
                        setTimeout(function () {
                            
                            $(error_text_id).fadeOut(2000);
                            
                        }, 3000);
                        
                    });
                    
                    $(form_id).fadeTo(1, 1);
                
                    for(form in data.form)
                    {
                        
                        $('#'+form+'_field_form').parent('p').children('.error').html(data.form[form]);
                        
                    }
                    
                }
                else
                {
                    
                    $(update_id).show(function () {
                        
                        setTimeout(function () {
                            
                            $(update_id).fadeOut(2000);
                            
                        }, 3000);
                        
                    });
                    
                    $(form_id).fadeTo(1, 1);
                    
                }
                
            }, 'json');
     
            
            posting.fail( function(data) {
                   
                alert(JSON.stringify(data));
                
                $(update_waiting_id).hide();
                
                $(form_id).fadeTo(1, 1);
                
            });
            
            return false;
            
        });
    
    }
	
})( jQuery );

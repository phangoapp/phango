(function( $ ){
	
	$.fn.sendPost = function (url, update_id, update_waiting_id, error_text_id, pre_callback, success_callback) 
	{
    
        $(this).submit( function () {
            
            if(pre_callback)
            {
                
                pre_callback();
                
            }
            
            $(this).fadeTo(1, 0.25);
            
            $('.error').html('');
            
            form_id=this;
            
            $(update_waiting_id).show();
            $(error_text_id).hide();
            
            if($(this).attr('enctype'))
            {
            
                data=new FormData($(this)[0]); //$(this).serializeArray();
                
                var posting = $.post({url: url, data: data , success: function(data) {
                
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
                        
                        if(success_callback)
                        {
                            
                            success_callback(data);
                            
                        }
                        
                        $(update_id).show(function () {
                            
                            setTimeout(function () {
                                
                                $(update_id).fadeOut(2000);
                                
                            }, 3000);
                            
                        });
                        
                        $(form_id).fadeTo(1, 1);
                        
                    }
                
                }, dataType: 'json', cache: false, contentType: false, processData: false});
     
            
                posting.fail( function(data) {
                       
                    alert(JSON.stringify(data));
                    
                    $(update_waiting_id).hide();
                    
                    $(form_id).fadeTo(1, 1);
                    
                });
            
            }
            else
            {
                
                data=$(this).serializeArray();
                
                $.ajax({
                  type: "POST",
                  url: url,
                  data: data,
                  success: function (data) {
                      
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
                        
                        if(success_callback)
                        {
                            
                            success_callback(data);
                            
                        }
                        
                        $(update_id).show(function () {
                            
                            setTimeout(function () {
                                
                                $(update_id).fadeOut(2000);
                                
                            }, 3000);
                            
                        });
                        
                        $(form_id).fadeTo(1, 1);
                        
                    }
                
                },
                  dataType: 'json'
                }).fail( function(data) {
                       
                    alert(JSON.stringify(data));
                    
                    $(update_waiting_id).hide();
                    
                    $(form_id).fadeTo(1, 1);
                    
                });
                
            }
            
            return false;
            
        });
    
    }
	
})( jQuery );

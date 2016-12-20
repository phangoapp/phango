<?php

use PhangoApp\PhaUtils\Utils;

function ModelFormView($arr_form, $fields=array())
{

    $arr_required[0]='';
    $arr_required[1]='*';

    if(count($fields)==0)
    {

        $fields=array_keys($arr_form);

    }

    ?>
    <div class="form">
    <?php
    
    foreach($fields as $field)
    {

        $form=$arr_form[$field];
    
        if($form->type!='hidden')
        {
    
            ?>
            <p><label><?php echo $form->label; ?><?php echo $arr_required[$form->required]; ?>: </label><?php echo $form->form(); ?> <span class="error"><?php echo $form->std_error; ?></span></p>
            <?php
            
        }
        else
        {
        
            ?>
                <?php echo $form->form(); ?>               
            <?php
            echo "\n";
        
        }

    }
    ?>
    <?php echo Utils::set_csrf_key(); ?>
    </div>
    <?php

}

?>

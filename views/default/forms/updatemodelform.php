<?php

use PhangoApp\PhaView\View;
use PhangoApp\PhaI18n\I18n;

function UpdateModelFormView($arr_form, $fields, $method, $action, $enctype)
{

    ?>
    <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" <?php echo $enctype; ?>>
    <?php

    echo View::load_view(array($arr_form, $fields), 'forms/modelform');
    
    ?>
    <p><input type="submit" value="<?php echo I18n::lang('common', 'submit', 'Submit'); ?>" /></p>
    </form>
    <?php

}

?>

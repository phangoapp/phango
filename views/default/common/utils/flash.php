<?php

use PhangoApp\PhaView\View;

function flashView($text)
{

    View::$js[]='jquery.min.js';

	?>
	
	<div class="flash">
		<?php echo $text; ?>
	</div>
	<script language="javascript">
	
	function drop_flash()
	{
        
        $('.flash').hide('slow');
	
	}
	
	setTimeout(drop_flash, 2000);
	
	</script>
	<?php

}

?>
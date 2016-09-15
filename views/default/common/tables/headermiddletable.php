<?php

function HeaderMiddleTableView($fields, $cell_sizes=array())
{

	?>
		<tr class="title_list">
		<?php
		foreach($fields as $key_cell => $field)
		{	
			settype($cell_sizes[$key_cell], 'string');
			?>
			<td<?php echo $cell_sizes[$key_cell]; ?>><?php echo $field; ?></td>
			<?php

		}
		?>
		</tr>
	
	<?php

}

?>

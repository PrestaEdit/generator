<?php
$hooks = array();
$hooks['displayHeader'] = 'displayFooter';
$hooks['displayFooter'] = 'displayHeader';

$xml = simplexml_load_file('sources/versions/1.5.6.0/hooks.xml');
$hooks = $xml->xpath('//entity_hook/entities/hook');
?>

<div id="step-3">
  
	<h4><i class="icon-double-angle-right"></i> <?php echo l('Hooks'); ?></h4>
	
	<form id="formStep3">
		<div class="droparea">
			<?php echo l('Available'); ?>
			<ul id="sortable1" class="droptrue">
				<?php 
					foreach($hooks as $h => $hook)
						echo '<li class="ui-state-default" id="'.$hook->name.'">'.$hook->title.'</li>';
				?>
			</ul>
		</div>

		<div class="droparea right">
			<?php echo l('Selected'); ?>
			<ul id="sortable2" class="droptrue">
			</ul>
		</div>

		<input type="hidden" name="selectedHooks" id="selectedHooks" />
	</form>
	
</div>
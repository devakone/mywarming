<div class="geolocations form">
<?php echo $this->Form->create('Geolocation');?>
	<fieldset>
 		<legend><?php __('Add Geolocation'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Geolocations', true), array('action' => 'index'));?></li>
	</ul>
</div>
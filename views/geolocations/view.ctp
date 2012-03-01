<div class="geolocations view">
<h2><?php  __('Geolocation');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Geolocation', true), array('action' => 'edit', $geolocation['Geolocation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Geolocation', true), array('action' => 'delete', $geolocation['Geolocation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $geolocation['Geolocation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Geolocations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geolocation', true), array('action' => 'add')); ?> </li>
	</ul>
</div>

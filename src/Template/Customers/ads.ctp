<?php 
$base = $this->request->getAttribute('webroot'); 

$dimensions = explode('x', $customer->advertisements[0]->dimensions);
?>
<div id="contentAds" width="<?=$dimensions[0]?>" height="<?=$dimensions[1]?>" >
	<div style="position: absolute;">
		<img src="<?=$base?>files/Advertisements/image/<?=$customer->advertisements[0]->image?>">
	</div>
	<div style="">
		<?= $this->Form->create($customer, ["id" => "callForm"]) ?>
			<?=$this->Form->control('country_code', ["id" => "country_code", "type" => "hidden", "value" => ""])?>
	      	<?=$this->Form->control('dial_code', ["id" => "dial_code", "type" => "hidden", "value" => ""])?>
	      	<?=$this->Form->control('phoneId', ["id" => "phoneId", "type" => "hidden", "value" => (isset($customer->phones[0]->id))? $customer->phones[0]->id : ""])?>
	      	<?=$this->Form->control('audioId', ["id" => "audioId", "type" => "hidden", "value" => (isset($customer->audios[0]->id))? $customer->audios[0]->id : ""]) ?>
	      	<?=$this->Form->control('customerId', ["id" => "customerId", "type" => "hidden", "value" => $customer->id])?>
			<input id="phone" type="tel" name="phone" class="form-control form-control-sm" style="background-color: rgba(255,255,255,.8); <?=($dimensions[0] == 200)? 'width:'.($dimensions[0] - 46).'px;':'';?>" >
			<button type="submit" class="btn btn-blue btn-sm waves-effect waves-light"><i class="fas fa-phone"></i></button>
		<?=$this->Form->end()?>
	</div>
</div>
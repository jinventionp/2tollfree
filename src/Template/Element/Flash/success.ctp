<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!--<div class="message success" onclick="this.classList.add('hidden')"><?= $message ?></div>-->
<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">'
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button><i class="mdi mdi-check-all mr-2"></i>Guardado con Éxito<br><?= $message ?>
</div>;

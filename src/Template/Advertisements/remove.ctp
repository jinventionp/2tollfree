<?php $base = $this->request->getAttribute('webroot'); ?>
<script src="<?=$base?>assets/js/pages/form-ajax-actions.init.js"></script>
<h5 id="textRemove"></h5>
<?= $this->Form->create(null, ["id" => "formActions", 'url' => ['action' => '']]) ?>
<?= $this->Form->hidden('id', ['id' => 'id', 'value' => $id]);?>
<div class="form-group mb-0 text-right">
	<button type="submit" class="btn btn-danger waves-effect waves-light">Eliminar</button>
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
</div>
<?= $this->Form->end() ?>
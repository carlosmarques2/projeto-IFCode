<?= $this->layout("_theme", $this->data); ?>
<div class="adminx-container d-flex justify-content-center align-items-center">
	<div class="page-error error">
		<h1>Erro <?= $error; ?>!</h1>

		<p class="text-muted mb-5">
			<?php
			if (verificaErro($error, array_keys($message))) :
				echo $message[$error];
			else :
				echo $message['default'];
			endif;
			?>
		</p>
		<a title="Voltar ao início" class="btn btn-secondary" href="<?= url('') ?>">Voltar</a>
	</div>
</div>

<?= $this->start('sidebar'); ?>

<?= $this->end(); ?>
<?php $this->layout('layout', ['title' => 'Accueil !']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's blog...</h2>
	<ul>
	<?php foreach ($posts as $post) { ?>
		<li>
			<a href="<?= $this->url('post', ['id' => $post['id']]) ?>">
				<?= $this->e($post['titre']) ?>
			</a>
		</li>
	<?php } ?>
	</ul>
<a href="<?= $this->url('create') ?>">Ecrire un post</a>
<?php $this->stop('main_content') ?>

<?php $this->layout('layout', ['title' => 'Accueil !']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's blog...<?= $user['username'] ?></h2>
	<ul>
	<?php foreach ($posts as $post) { ?>
		<li>
			<a href="<?= $this->url('post', ['id' => $post['id']]) ?>">
				<?= $this->e($post['titre']) ?>
			</a>
		</li>
	<?php } ?>
	</ul>
<?php $this->stop('main_content') ?>

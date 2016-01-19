<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
</head>
<body>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>
		<a href="<?= $this->url('create') ?>">Ecrire un post</a> | 
		<a href="<?= $this->url('register') ?>">Register</a> | 
		<a href="<?= $this->url('login') ?>">Login</a> | 
		<a href="<?= $this->url('logout') ?>">Logout</a>
		<footer>
		</footer>
	</div>
</body>
</html>
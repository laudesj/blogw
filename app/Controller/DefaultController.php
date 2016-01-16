<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\PostManager;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$manager = new PostManager();
		$posts = $manager->findAll();
		$this->show('default/home', ['posts' => $posts]);
	}

	public function post($id)
	{
		$manager = new PostManager();
		$post = $manager->find($id);
		$this->show('default/post', ['post' => $post]);
	}

	public function delete($id)
	{
		$manager = new PostManager();
		$post = $manager->delete($id);
		// redirige vers une page interne
		$this->redirectToRoute('home');
	}

	public function edit($id)
	{
		$manager = new PostManager();
		if(isset($_POST['edit'])) {
			$manager->update($_POST['myform'], $id);
			$this->redirectToRoute('home');
		}
		$post = $manager->find($id);
		$this->show('default/edit', ['post' => $post]);
	}

	public function create()
	{
		if(isset($_POST['create'])) {
			$manager = new PostManager();
			$manager->insert($_POST['myform']);
			$this->redirectToRoute('home');
		}
		$this->show('default/create');
	}

}
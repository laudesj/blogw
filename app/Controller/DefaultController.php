<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\PostManager;
use \W\Manager\UserManager;
use \W\Security\AuthentificationManager;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$user = $this->getUser();
		$manager = new PostManager();
		$posts = $manager->findAll();
		$this->show('default/home', ['posts' => $posts, 'user' => $user]);
	}

	public function post($id)
	{
		$manager = new PostManager();
		$post = $manager->find($id);
		$this->show('default/post', ['post' => $post]);
	}

	public function delete($id)
	{
		$this->allowTo('admin');
		$manager = new PostManager();
		$post = $manager->delete($id);
		// redirige vers une page interne
		$this->redirectToRoute('home');
	}

	public function edit($id)
	{
		$this->allowTo('admin');
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
		$this->allowTo('admin');
		if(isset($_POST['create'])) {
			$manager = new PostManager();
			$manager->insert($_POST['myform']);
			$this->redirectToRoute('home');
		}
		$this->show('default/create');
	}

	public function register() 
	{
		if(isset($_POST['create'])) {
			$_POST['myform']['role'] = 'user';
			$_POST['myform']['password'] = password_hash($_POST['myform']['password'], PASSWORD_DEFAULT);
			$manager = new UserManager();
			$manager->insert($_POST['myform']);
			$this->redirectToRoute('home');
		}
		$this->show('default/register');
	}

	public function login() 
	{
		if(isset($_POST['create'])) {
			$auth = new AuthentificationManager();
			$userManager = new UserManager();
			if($auth->isValidLoginInfo($_POST['myform']['username'], $_POST['myform']['password'])) {
				$user = $userManager->getUserByUsernameOrEmail($_POST['myform']['username']);
				$auth->logUserIn($user);
				$this->redirectToRoute('home');
			}
		}
		$this->show('default/login');
	}

	public function logout() {
		$auth = new AuthentificationManager();
		$auth->logUserOut();
		$this->redirectToRoute('home');
	}
}
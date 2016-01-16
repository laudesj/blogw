<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'], // liste des posts sur la home
		['GET|POST', '/post/create', 'Default#create', 'create'],
		['GET', '/post/[i:id]/delete', 'Default#delete', 'delete'],
		['GET|POST', '/post/[i:id]/edit', 'Default#edit', 'edit'],
		['GET', '/post/[i:id]', 'Default#post', 'post'],
		
	);
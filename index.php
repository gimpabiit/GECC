<?php
require_once('core/init.home.php');
$r = new Router(Input::get('url'));
$user = new User();
$GLOBALS['user'] = $user;
$r->checkRoute();


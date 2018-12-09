<?php

if (!isset($config['db'])) {
	die('DB connection can not be established');
}

function getConnection()
{
	global $config;

	$link = mysqli_connect(
		$config['db']['host'],
		$config['db']['user'],
		$config['db']['password'],
		$config['db']['name']);

	if (!$link) {
		$error = mysqli_connect_error();
		$code = mysqli_connect_errno();
		die("MySQL error: {$error} [{$code}]");
	}

	return $link;
}

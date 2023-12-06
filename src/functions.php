<?php

function redirect($path, array $data = []): void
{
	foreach ($data as $key => $value) {
		$_SESSION[$key] = $value;
	}
	header('Location: ' . $path);
	exit;
}
//Lấy dữ liệu từ trong $_SESSION[$name]
function session_get_once($name, $default = null)
	{
		$value = $default;
		if (isset($_SESSION[$name])) {
			$value = $_SESSION[$name];
			unset($_SESSION[$name]);
		}
		return $value;
	}
function PDO(): \PDO
{
	global $PDO;
	return $PDO;
}

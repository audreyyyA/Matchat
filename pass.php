<?php

$password = 'e';

$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash.PHP_EOL;
if (password_verify($password, $hash)) {
	echo 'OK';
} else {
	echo 'NOK';
}
echo PHP_EOL;

$hash = '$2y$10$gij0z/B8uys2Hpmz9Xd9vegAwtUyTfL5Rz8SJiCUr6zgAoNdp2YLK';
echo $hash.PHP_EOL;
if (password_verify($password, $hash)) {
	echo 'OK';
} else {
	echo 'NOK';
}
echo PHP_EOL;
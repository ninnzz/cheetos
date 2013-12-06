<?php

session_start();
$sessionfile = ini_get('session.save_path') . '/' . 'sess_'.session_id();

print_r($_SESSION);

echo is_writable(session_save_path());

echo 'session file: ', $sessionfile, ' ';
if ( file_exists($sessionfile) ) {
    echo 'size: ', filesize($sessionfile), "\n";
    echo '# ', file_get_contents($sessionfile), ' #';
}
else {
    echo ' does not exist';
}
var_dump($_SESSION);
?>

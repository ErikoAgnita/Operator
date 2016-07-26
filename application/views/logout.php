<?php
function logout() {
session_destroy();
redirect('login');
}
?>


<?php
session_start();
unset( $_SESSION['id'] );
unset( $_SESSION['auth'] );
unset( $_SESSION['name'] );
unset( $_SESSION['start_time'] );

echo "<script>alert('logout Success!')</script>";
echo "<script>location.href='/';</script>"
?>
<?php
//function start lagi
session_start();
//session terdaftar, saatnya logout
session_unset();
session_destroy();
//variabel session salah, user tidak seharusnya ada dihalaman ini. Kembalikan ke login
header("Location: ../auth/login.php");

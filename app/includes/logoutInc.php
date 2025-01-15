<?php
//to use session
session_start();
//to remove all data
session_unset();
//to end session
session_destroy();

header("Location: ../../index.php?error=none");
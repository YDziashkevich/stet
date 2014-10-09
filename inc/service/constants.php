<?php
define("APP_DEFAULT_DIR", str_replace("\\inc\\service", "", __DIR__));
define("APP_DEBUG", true);
define("APP_DEFAULT_CONTROLLER", "Main");
define("APP_DB_HOST", "localhost");
define("APP_DB_DATABASE", "st_test");
define("APP_DB_USER", "root");
define("APP_DB_PASSWORD", "");
define("APP_BASE_URL", str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
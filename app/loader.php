<?php

require_once("config.php");
require_once("utils.php");

spl_autoload_register(fn ($className) => require_once("classes/" . $className . ".php"));

new Core();

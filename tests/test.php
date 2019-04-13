<?php

require_once "../vendor/autoload.php";

use SiouxKernel\HTTP\Manager;


Manager::debug(\SiouxKernel\Tools\ArrayHelper::except(['a' => 'b', 'b' => 'c', 'c' => 'd'], ['a', 'c']));
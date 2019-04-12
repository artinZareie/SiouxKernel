<?php

require_once "../src/Kernel/ENV.php";

use SiouxKernel\Kernel\ENV;

ENV::set("MYNAME", "ARTISAN");
echo ENV::get('MYNAME');
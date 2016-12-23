<?php

require 'vendor/autoload.php';

$propeller = new \Hamato\PropellerAi\Propeller();

$image = './test_image.jpg';

$result = $propeller->recognize($image);

exit(print_r($result));

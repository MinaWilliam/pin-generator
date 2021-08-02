<?php

require 'PinGenerator.php';

$pinGenerator = new PinGenerator();


echo $pinGenerator->test_pin_should_be_unique() ? 'success' : 'failed';

?>
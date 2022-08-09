<?php

require 'PinGenerator.php';

$pinGenerator = new PinGenerator();


echo $pinGenerator->testPinShouldBeUnique() ? 'success' : 'failed';

?>

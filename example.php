<?php

use domainregistrar\PasswordGenerator\PasswordGen;

$password = PasswordGen::generate(24, true, true, 3, 3);

echo "Your new password is: " . $password;
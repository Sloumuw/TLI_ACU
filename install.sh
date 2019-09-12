#!/bin/sh
apt update

php composer.phar install
php composer.phar dump-autoload -o

chmod a+rwx -R templates_c
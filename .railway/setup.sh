#!/bin/bash
# Install PHP and required extensions
apt-get update && apt-get install -y php php-common php-cli php-fpm php-json php-common php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath

# Make the cache directory writable
chmod -R 777 var/

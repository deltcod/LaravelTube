 #!/bin/bash

cd /home/adam/Code/LaravelTube/build/sami

rm -rf /home/adam/Code/LaravelTube/build/sami/build
rm -rf /home/adam/Code/LaravelTube/build/sami/cache

# Run API Docs
git clone https://github.com/AlvaradoAdam15/LaravelTube.git /home/adam/Code/LaravelTube/build/sami/LaravelTube

php /home/adam/Code/LaravelTube/build/sami.phar update /home/adam/Code/LaravelTube/build/sami/sami.php

cp -r /home/adam/Code/LaravelTube/build/sami/build/* /home/adam/Code/LaravelTube/api

rm -rf /home/adam/Code/LaravelTube/sami/build
rm -rf /home/adam/Code/LaravelTube/build/sami/cache

# Cleanup
rm -rf /home/adam/Code/LaravelTube/build/sami/LaravelTube
#!/bin/bash

cd /home/lnevo/radb/src/public/radb

echo "Copying index-dev.php to index.php"
cp index.php index.php.bak
cat index-dev.php | sed 's/<html>/<html manifest=manifest.appcache>/g' > index.php

VER=`grep Version manifest.appcache | awk -F. '{print $NF}'`
OLDVER=$VER
(( VER += 1 ))

echo "Updating version from 0.0.$OLDVER to 0.0.$VER"
sed -i "s/0.0.$OLDVER/0.0.$VER/g" manifest.appcache

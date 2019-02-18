#!/bin/bash


#cd /www/radb 2>/dev/null && CMD="php --define display_errors=stderr all_data_json.php 2>/dev/null" || 

CMD="curl -s http://www.easte.net/radb/all_data_json.php"

for i in `$CMD | \
sed -e 's/,\"alk.*$/}/g' \
-e 's/,/ /g' \
-e 's/\"//g' \
-e 's/{//g' \
-e 's/}//g' \
-e 's/xml://g' \
-e 's/mem://g' \
-e 's/relays://g' \
-e 's/info://g' \
-e 's/:/=/g' -e 's/Pulse//g' \
`
do 
	echo $i
done 

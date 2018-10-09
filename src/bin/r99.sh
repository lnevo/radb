#!/bin/bash

CMD="php /www/radb/all_data_json.php 2>/dev/null"

if [ "$1" == "curl" ];then
	CMD="curl -s http://www.easte.net/radb/all_data_json.php"
fi

for i in `$CMD | \
sed 's/,/ /g' | \
sed 's/\"//g' | 
sed 's/{//g' | \
sed 's/}//g' | \
sed 's/xml://g' | \
sed 's/mem://g' | \
sed 's/relays://g' | \
sed 's/info://g' | \
sed 's/:/=/g'`
do 
	echo $i
done 

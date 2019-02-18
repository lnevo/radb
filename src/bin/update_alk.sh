#!/bin/bash

cd /www/radb

/root/bin/khg_status.sh | tee /tmp/update_alk$$.txt
STATUS="$?"
if [ "$STATUS" -ne 0 ];then rm /tmp/update_alk$$.txt; echo "$STATUS"; exit 1;fi

cat /tmp/update_alk$$.txt | sed -e 's/\(^[N0-9]\)/<BR>\1/g' -e 's/\(^KHG PH\)/<BR>\1/g' -e 's/^$/<P>/g' > /tmp/update_alk2$$.txt 

LINES=`wc -l /tmp/update_alk2$$.txt | awk '{print $1}'`
if [ "$LINES" -eq 0 ]
then
	rm /tmp/update_alk$$.txt /tmp/update_alk2$$.txt && exit 1
else
	mv /tmp/update_alk2$$.txt /www/radb/alk.html
	rm /tmp/update_alk$$.txt
fi

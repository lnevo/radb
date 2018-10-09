#!/bin/sh

RAURL="http://xena.easte.net:2000"
LABELURL="http://forum.reefangel.com/status/labels.aspx?id=lnevo"
WGET=/usr/bin/wget

cd /www/radb_data

sleep 5
$WGET -t3 -T3 -O r99.txt.new $RAURL/r99 && mv r99.txt.new r99.txt
#sleep 5
#$WGET  -t3 -T3 -O r99_2.txt.new $RAURL2/r99 && mv r99_2.txt.new r99_2.txt
sleep 5
$WGET  -t3 -T3 -O mr_full_mem.txt.new $RAURL/mr100,400 && mv mr_full_mem.txt.new mr_full_mem.txt

FULL_MEM=`cat mr_full_mem.txt`
RA_DATA=`cat r99.txt | sed 's/.....$//g'`

echo "${RA_DATA}${FULL_MEM}</RA>" > all_data.txt.new && mv all_data.txt.new all_data.txt
$WGET -O ra_labels.txt.new $LABELURL && mv ra_labels.txt.new ra_labels.txt

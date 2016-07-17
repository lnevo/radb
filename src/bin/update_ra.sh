#!/bin/sh

RAURL="http://xena.easte.net:2000"
RAURL2="http://xena.easte.net:2010"
LABELURL="http://forum.reefangel.com/status/labels.aspx?id=lnevo"
WGET=/usr/bin/wget

cd /www/radb/data

sleep 5
$WGET -t3 -T3 -O r99.txt.new $RAURL/r99 && mv r99.txt.new r99.txt
sleep 5
$WGET  -t3 -T3 -O r99_2.txt.new $RAURL2/r99 && mv r99_2.txt.new r99_2.txt
sleep 5
$WGET  -t3 -T3 -O mr_full_mem.txt.new $RAURL/mr100,400 && mv mr_full_mem.txt.new mr_full_mem.txt
#sleep 5
#$WGET -O mr.txt $RAURL/mr
#sleep 5
#$WGET -O mr_custom.txt $RAURL/mr100,200


LOGS="r99 mr_full_mem"
DATE=`date +%s`

#for log in $LOGS
#do
#	LOG=`cat $log.txt`
#	echo "<DATE>$DATE</DATE>$LOG" >> ${log}_full.log 
#done

FULL_MEM=`cat mr_full_mem.txt`
RA_DATA=`cat r99.txt | sed 's/.....$//g'`

echo "${RA_DATA}${FULL_MEM}</RA>" > all_data.txt.new && mv all_data.txt.new all_data.txt
$WGET -O ra_labels.txt.new $LABELURL && mv ra_labels.txt.new ra_labels.txt

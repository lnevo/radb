#!/bin/sh

RAURL="http://xena.easte.net:2000"
LABELURL="http://forum.reefangel.com/status/labels.aspx?id=lnevo"
WGET=/usr/bin/wget

cd /www/radb_data

$WGET -t3 -T3 -O r99.txt.new $RAURL/r99 && mv r99.txt.new r99.txt
$WGET -O ra_labels.txt.new $LABELURL && mv ra_labels.txt.new ra_labels.txt
$WGET  -t3 -T3 -O mr_full_mem.txt.new $RAURL/mr100,400 && mv mr_full_mem.txt.new mr_full_mem.txt

FULL_MEM=`cat mr_full_mem.txt`
RA_DATA=`cat r99.txt | sed 's/.....$//g'`

echo "${RA_DATA}${FULL_MEM}</RA>" > all_data.txt.new && mv all_data.txt.new all_data.txt

#eval $(/root/bin/r99.sh 2>/dev/null)
eval $(curl -s http://www.easte.net/radb/r99.php)

ALK=`echo "$PHE" | awk '{ val=$1*17.86 / 100;printf "%3.0f\n",val}'`
PH=`echo "$PH" | awk '{ val=$1 / 100;printf "%.2f\n",val}'`
TEMP=`echo "$T1" | awk '{ val=$1 / 10;printf "%.1f\n",val}'`
SAL=`echo "$SAL" | awk '{ val=$1 / 10;printf "%.1f\n",val}'`
WL=`echo "$WL"`
echo "$TEMP $PH $SAL $ALK $WL END" > status.txt

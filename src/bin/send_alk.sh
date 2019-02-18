#!/bin/bash

cd /www/radb
eval $(curl -s http://www.easte.net/radb/r99.php)

export TZ=EST5EDT

LINE=`grep READY alk.csv | tail -1`
ALK=`echo $LINE | awk -F\; '{print $3}'`
DATE=`echo $LINE | awk -F\; '{print $1}' | awk -F\/ '{printf "20%s-%s-%s",$3,$1,$2}'`
TIME=`echo $LINE | awk -F\; '{print $2}'`
RA_ALK=`echo $PHE | awk '{printf "%.2f\n",$1/100}'`

FILE=/tmp/aql_json$$.json

test `date +%Z` == "EST" && OFFSET=5 || OFFSET=4

if [ `uname -s` == "Linux" ]
then
	MTIME=`date -d"$DATE $TIME EST +$OFFSET hours" +"%Y-%m-%d %H:%M:%S"`
else
	MTIME=`date -v+${OFFSET}H -j -f "%Y-%m-%d %H:%M:%S" "$DATE $TIME" +"%Y-%m-%d %H:%M:%S"`
fi
CTIME=`date -u "+%Y-%m-%d %H:%M:%S"`

# Build JSON file
cat << EOF > $FILE
{
	"measurementTime":"$MTIME",
	"value":$ALK,
	"comment":"submitted via API. RA ALK:$RA_ALK",
	"createdTime":"$CTIME",
	"kind":"Alkalinity",
	"units":"dKH"
}
EOF

curl -u "lnevo:ncc-1701" -d "@$FILE" -H "Content-Type: application/json" -X POST https://www.aquaticlog.com/api/aquariums/2982/measurements

rm $FILE

#!/bin/bash

cd /www/radb

export TZ=EST5EDT
FILE=/tmp/aql_dosing$$.json

eval $(curl -s http://www.easte.net/radb/r99.php)

test `date +%Z` == "EST" && OFFSET=5 || OFFSET=4

CTIME=`date -u "+%Y-%m-%d %H:%M:%S"`

# Build JSON file
cat << EOF > $FILE
{
  "dose": {
    "units": "ml",
    "value": $C0
  },
  "dosingTime": "$CTIME",
  "comment": "submitted via api",
  "name": "Calcium"
}
EOF
curl -u "lnevo:ncc-1701" -d "@$FILE" -H "Content-Type: application/json" -X POST https://www.aquaticlog.com/api/aquariums/2982/dosing

cat << EOF > $FILE
{
  "dose": {
    "units": "ml",
    "value": $C1
  },
  "dosingTime": "$CTIME",
  "comment": "submitted via api",
  "name": "Alk"
}
EOF
curl -u "lnevo:ncc-1701" -d "@$FILE" -H "Content-Type: application/json" -X POST https://www.aquaticlog.com/api/aquariums/2982/dosing

rm $FILE

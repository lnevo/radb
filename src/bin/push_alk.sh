#!/bin/bash

cd /www/radb
#eval $(/root/bin/r99.sh)
eval $(curl -s http://www.easte.net/radb/r99.php)

LOG=alk_adjust.csv

LINE=`tail -1 alk.csv`
TARGET=$Mem_B_AlkTarget
OLDLINE=`tail -1 $LOG`

STATUS=`echo $LINE | awk -F\; '{print $6}'`
KH_ALK=`echo $LINE | awk -F\; '{val=$3*17.86;printf "%3.0f",val}'`

if [ "$STATUS" == "READY" ]
then
	if [ "$KH_ALK" -lt "$((TARGET-2))" ]
	then
		NEWLINE=`echo "$LINE;DOSE1"`
		if [ "$NEWLINE" != "$OLDLINE" ]
		then
			curl http://xena.easte.net:2000/cvar7,$((TARGET-1)) &&
			echo "$LINE;DOSE1" >> $LOG
			echo "Increasing dose. $((TARGET-1))"
		fi		
	elif [ "$KH_ALK" -gt "$((TARGET+1))" ]
	then
		NEWLINE=`echo "$LINE;SKIP1"`
		if [ "$NEWLINE" != "$OLDLINE" ]
		then
			curl http://xena.easte.net:2000/cvar7,$((TARGET+1)) &&
			echo "$LINE;SKIP1" >> $LOG
			echo "Reducing dose. $((TARGET+1))"
		fi
	else
		NEWLINE=`echo "$LINE;NULL"`
		if [ "$NEWLINE" != "$OLDLINE" ]
		then
			echo "$LINE;NULL" >> $LOG
		fi
	fi
fi

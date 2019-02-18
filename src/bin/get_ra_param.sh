#!/bin/bash

RADB=/www/radb
cd $RADB

#eval $(php r99.php)
#eval $(/root/bin/r99.sh 2>/dev/null)
eval $(curl -s http://www.easte.net/radb/r99.php)

UPTIME=0

case $1 in 
	temp)
		echo $T1
		echo $T2
		echo $UPTIME
		echo 0
		;;
	ph)
		echo $PH 
		echo $PHE
		echo $UPTIME
		echo 0
		;;
	alk)
		echo $PHE 
		echo $PHE | awk '{ val=$1*17.86/100;printf "%.0f\n",val}' 
		echo $UPTIME
		echo 0
		;;
	sal)
		echo $SAL
		echo $SAL
		echo $UPTIME
		echo 0
		;;
	rf)
		echo $C4
		echo $RFS
		echo $UPTIME
		echo 0
		;;
	pwm)
		echo $PWME0
		echo $PWME1
		echo $UPTIME
		echo 0
		;;
	pwmr)
		echo $PWME2
		echo $PWME3
		echo $UPTIME
		echo 0
		;;
	wl)
		echo $WL
		echo $C6
		echo $UPTIME
		echo 0
		;;
	sw)
		echo $WL1
		echo $WL2
		echo $UPTIME
		echo 0
		;;
	dosing)
		echo $C0
		echo $C1
		echo $UPTIME
		echo 0
		;;
	moon)
		echo $PWME5
		echo $PWME4
		#echo $PWMA
		#echo $PWMD
		echo $UPTIME
		echo 0
		;;
	relay*)
		RELAY=`echo $1 | sed 's/[a-z]//g'`
		eval "echo \$relay${RELAY}status"
		eval "echo \$relay${RELAY}status"
		echo $UPTIME
		echo 0
		;;
	*)
		echo "Please add a category"
		exit 1
		;;
esac


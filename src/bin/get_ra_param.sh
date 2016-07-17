#!/bin/bash

RADB=/www/radb
cd $RADB

eval $(php r99.php)
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
		echo $PH
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
		eval $(php r99_2.php)
		echo $WL1
		echo $WL2
		echo $UPTIME
		echo 0
		;;
	dosing)
		echo $C1
		echo $C2
		echo $UPTIME
		echo 0
		;;
	moon)
		echo $PWMA
		echo $PWMD
		echo $UPTIME
		echo 0
		;;
	relay*)
		RELAY=`echo $1 | sed 's/[a-z]//g'`
		eval "echo \$R$RELAY"
		eval "echo \$R$RELAY"
		echo $UPTIME
		echo 0
		;;
	*)
		echo "Please add a category"
		exit 1
		;;
esac


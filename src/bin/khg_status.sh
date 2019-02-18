#!/bin/bash

export TZ=EDT5EST


URL="http://xena.easte.net:9000"
EAPK="LeesReef"
LOGFILE=alk.csv
ADJFILE=alk_adjust.csv
LINES=${1:-24}

if [ `uname -s` == "Linux" ]
then
	cd /www/radb
else
	cd $HOME
fi

function printKHG() {
        CKI=$1; DKH=$2; ADKH=$3; NT=$4; LT=$5; DATE=$5; STATUS=$6; 

		if [ `uname -s` == "Linux" ]
		then
			LASTD=`date -d "$LT"`
       		TESTD=`date -d +${NT}minutes`
		else
	    	LASTD=`date -j -f "%m/%d %H:%M:%S" "$DATE"`
	        TESTD=`date -v+${NT}M` 
		fi
	    NUM=`echo $CKI $NT | awk '{ val=$1 - $2;printf "%.0f\n",val}'`
		#NT=`echo $NUM | awk '{val=120-$1;printf "%d",val}'`

        PPM=`printPPM $DKH | awk '{print $1}'`
        APPM=`printPPM $ADKH | awk '{print $1}'`
        ADJDKH=`test $APPM -ne 0 && echo "(adj ${ADKH}dKH)"`
        ADJPPM=`test $APPM -ne 0 && echo "(adj ${APPM}ppm)"`
	
        echo "KHG is currently: $STATUS"
        echo
        echo "Alkalinity is: ${DKH} dKH ${ADJDKH}/ ${PPM} ppm ${ADJPPM}"
        echo
		if [ "$NT" -lt "$CKI" ]
		then
            printf "Last update was %3s minutes ago: $LASTD\n" $NUM
	        printf "Next run will be in %3s minutes: $TESTD\n" $NT 
		else
            printf "Last update was at: $LASTD\n"
			printf "New test currently in progress.\n"
		fi

		LOG=`echo "$LT;$DKH;$PPM;$STATUS" | sed 's/ /\/19;/g' | awk -F\; '{printf "%s;%s;%.2f;%.1f;%d;%s\n",$1,$2,$3,$3,$4,$5}'`
		(cat $LOGFILE;echo $LOG) | grep -v OK | uniq > /tmp/alklog$$.txt && mv /tmp/alklog$$.txt $LOGFILE

		echo
		echo "Last $LINES results: "
		cat $LOGFILE | grep -v OK | tail -${LINES} | while read line
		do
			echo $line | awk -F\; '{printf "%s %s %.2f dKH / %d ppm",$1,$2,$3,$5}'

			ACTION=`grep "$line" $ADJFILE 2>/dev/null| awk -F\; '{print $7}' `
			case $ACTION in
				DOSE1) echo " +";;
				SKIP1) echo " -";;
				*) echo
			esac
		done
		echo
		cat $LOGFILE | grep -v OK | tail -24 | awk -F\; '{sum+=$3} END {print "",sum/NR}' |\
	        awk '{val=$1*17.86;printf "Average: %.2fdKH / %dppm\n",$1,val}'
}

function printPPM() {
        echo $1 | awk '{ val=$1*17.86;printf "%3.0f\n",val}'
}

curl --connect-timeout 5 -s -d EAPK=$EAPK -X POST $URL/EDAC >> /tmp/alk$$.txt #&

LINE=0
cat /tmp/alk$$.txt | sed '1,1d' | while read line
do
        let LINE+=1

        case $LINE in
				1) CKI=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				2) SWERR=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				3) KHERR=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				5) DKH=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				6) ADKH=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				7) AUTO=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				8) AUTOCORRECT=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				9) MLQ=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				10) VOL=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				11) SOUND=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				12) PORT=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				13) KTZ=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				15) NT=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | awk '{print $1}'`;;
				17) LT=`echo $line | cut -f2 -d'<' | cut -f1 -d'>'`;;
				18) STATUS=`echo $line | cut -f2 -d'<' | cut -f1 -d'>' | sed 's/^\.//g'`;;
                19) printKHG $CKI $DKH $ADKH $NT "$LT" $STATUS;;
        esac
done

rm /tmp/alk$$.txt 2>/dev/null

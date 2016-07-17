#!/bin/bash

R=$1

cat << EOF
Title[relay$R]: Relay $R
PageTop[relay$R]: <H1>Relay $R</H1><A HREF="/mrtg">Home</A>
Target[relay$R]: \`/Users/lnevo/bin/get_ra_param.sh relay$R\`
MaxBytes[relay$R]: 1
Options[relay$R]: gauge,nobanner,growright,integer,withzeroes,noi
Unscaled[relay$R]: ymdw
YLegend[relay$R]: On/Off
Legend1[relay$R]: R$R
Legend2[relay$R]: R$R
LegendI[relay$R]: R$R
LegendO[relay$R]: R$R
ShortLegend[relay$R]: On/Off
PageFoot[relay$R]: <A HREF="/mrtg">Home</A>
EOF

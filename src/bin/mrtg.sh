#!/bin/sh

TZ=EST5EDT
PATH=$PATH:/root/bin

export TZ PATH

/usr/bin/mrtg /www/mrtg/mrtg.cfg >/dev/null

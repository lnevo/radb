#!/bin/bash

MRTG=/www/mrtg
HOMEURL='<A HREF=index.html>Home</A>'
RELAYURL='<A HREF=relays.html>Relays</A>'

indexmaker --title="Lee's 65g Mixed Reef" --filter name!~relay --subtitle "$RELAYURL" --pageend "$RELAYURL" --output $MRTG/index.html $MRTG/mrtg.cfg 
indexmaker --title="Lee's 65g Mixed Reef" --filter name=~relay --subtitle "$HOMEURL" --pageend "$HOMEURL" --output $MRTG/relays.html $MRTG/mrtg.cfg 

HOMEURL='<A HREF=radb_index.html>Home</A>'
RELAYURL='<A HREF=radb_relays.html>Relays</A>'
indexmaker --title=" " --bodyopt 'text="#ffffff" bgcolor="#000000" link="#ffffff" vlink="#ffffff" alink="#ffffff"' --columns=2 --filter 'name!~relay' --subtitle "$RELAYURL" --pageend "$RELAYURL" --output $MRTG/radb_index.html $MRTG/mrtg.cfg 
indexmaker --title=" " --bodyopt 'text="#ffffff" bgcolor="#000000" link="#ffffff" vlink="#ffffff" alink="#ffffff"' --columns=2 --filter 'name=~relay' --subtitle "$HOMEURL" --pageend "$RELAYURL" --output $MRTG/radb_relays.html $MRTG/mrtg.cfg 

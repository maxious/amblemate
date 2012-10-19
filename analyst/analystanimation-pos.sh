#!/bin/bash
LAT0="-35.28"
LON0="149.133"
STEP="-0.0001"
TIME="08:00:00"
DATE="2012-11-10"

WIDTH=1280
HEIGHT=720

# regional
BBOX="148.86646270751953,-35.35321610123823,149.30591583251953,-35.1336676281011"

# alternate loop option:
# for i in $(seq 1 0.05 3); do

LON=$LON0
for c in {0..1000}; do
    LAT=`bc <<< $LAT0+$STEP*$c`
    URL="http://localhost:8080/opentripplanner-api-webapp/ws/wms?layers=traveltime&styles=color30&batch=true&mode=TRANSIT%2CWALK&maxWalkDistance=10000&date=${DATE}&time=${TIME}&fromPlace=${LAT},${LON}&toPlace=${LAT},${LON}&format=image/geotiff&srs=EPSG:3857&width=${WIDTH}&height=${HEIGHT}&bbox=${BBOX}&timestamp=true&maxTransfers=3"
    echo $URL
    wget $URL -O "$c.tif"
done

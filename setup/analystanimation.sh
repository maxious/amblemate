#!/bin/bash
# source: https://github.com/openplans/OpenTripPlanner/wiki/AnalystAnimations
# to make mp4 x264 "./%d.tif" --crf 25 --vf crop:129,100,120,103 -o test.mp4
# BOUNDING BOXES
# canberra
bbox="148.99,-35.48,149.19,-35.119"
#res=80

# ORIGIN LOCATIONS
#city bus station
origin="-35.28262170071516%2C149.1332244873047"
DATE="2012-11-10"

counter=0
for h in {0..4}; do
for m in {0..59}; do
for s in {0..59..20}; do
    TIME=`printf "%02d:%02d:%02d" ${h} ${m} ${s}`
    echo $TIME
    URL="http://localhost:8080/opentripplanner-api-webapp/ws/wms?layers=traveltime&styles=color30&batch=true&mode=TRANSIT%2CWALK&maxWalkDistance=4000&date=${DATE}&time=${TIME}&fromPlace=${origin}&toPlace=${origin}&format=image/geotiff&srs=EPSG:3857&width=1280&height=720&bbox=${bbox}&timestamp=true"
    echo $URL
    wget $URL -O "$counter.tif"
    counter=$((counter+1))
done; done; done

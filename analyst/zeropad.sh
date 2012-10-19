#!/bin/bash
#for i in *.png;do mv $i `./zeropad.sh $i`; done
num=`expr match "$1" '[^0-9]*\([0-9]\+\).*'`
paddednum=`printf "%05d" $num`
echo ${1/$num/$paddednum}

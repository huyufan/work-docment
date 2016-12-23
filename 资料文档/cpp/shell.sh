#!/bin/bash
PS="10.1.1.10 3001
10.1.1.10 3003
10.1.1.11 3001
10.1.1.11 3002
10.1.1.11 3004
10.1.1.11 3005
10.1.1.13 3002
10.1.1.13 3003
10.1.1.13 3004
10.1.1.14 3002"
echo "====你好==="
i=0;
echo $PS | while read line
do
#echo $(($i+1))
echo $line
done
echo "=====for test===="
n=0
echo $(($n+1))
for ip in $PS
do
 n=$(($n+1))
#echo $ip
#echo $n
done

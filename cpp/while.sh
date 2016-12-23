#!/bin/bash
COUNTER=0
while [ $COUNTER -lt 10 ]; do
echo THIS COUNTER is  $COUNTER
let COUNTER=COUNTER+1
done

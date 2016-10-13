#!/bin/sh
#host.access.log
log_path="/usr/local/nginx/logs/"
pid_path="/usr/local/nginx/logs/nginx.pid"
date_str=access_$(date -d "yesterday" +"%Y%m%d")
mv ${log_path}host.access.log ${log_path}${date_str}.log
kill -USR1 `cat ${pid_path}`
tar -zcf  ${logs_path}${date_str}.tar.gz ${logs_path}${date_str}.log 
#rm -f ${logs_path}${date_str}.log  


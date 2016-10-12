#!/bin/sh
#program nginx
resettem=$(tput sgr0)
logfile_path=/usr/local/nginx/logs/host.access.log
check_http_status(){
http_status_codes=(`cat $logfile_path | grep -ioE "http\/1\.[0|1]\"[[:blank:]][0-9]{3}"|awk -F " " '{
if($2==200){
{i++}
}else if($2==502){
{n++}
}
}END {print i?i:0,n?n:0,i+n}' `)
echo -e '\E[33m'"code status success:" ${resettem}${http_status_codes[0]}
echo -e '\E[33m'"code status failed:" ${resettem}${http_status_codes[1]}
}
http_code(){
http_code_s=(`cat $logfile_path | grep -ioE "http\/1\.[0|1]\"[[:blank:]][0-9]{3}"|awk -v total=0 -F "[ ]+" '{
{code[$2]++;total++}
}END{print code[200]?code[200]:0,code[502]?code[502]:0,total}'`)
echo -e '\E[33m'"code status 200:"${resettem}${http_code_s[0]}
echo -e '\E[33m'"code status 502:"${resettem}${http_code_s[1]}
}
check_http_status
http_code

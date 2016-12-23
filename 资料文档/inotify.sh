#!/bin/sh
#chkconfig:2345 34 55
#discription:inotify
srcdir=/www/path/
dstdir=yue
#excludedir=/usr/local/inotify/exclude.list
rsyncuser=yue
ip=192.168.1.9
rsyncpassdir=/root/rsyncd.pass
dstip="192.168.1.9"
/usr/local/inotify/bin/inotifywait -mrq --timefmt '%d/%m/%y %H:%M' --format '%T %w%f%e' -e close_write,modify,delete,create,attrib,move $srcdir |while read file
do
rsync -rvlHpogDtS  --port=873 --progress --delete    $srcdir $rsyncuser@$ip::$dstdir --password-file=$rsyncpassdir

echo "  ${file} was rsynced" >> /tmp/rsync.log 2>&1
done

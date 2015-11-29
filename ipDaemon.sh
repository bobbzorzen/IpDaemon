#!/bin/bash

function child()
{
while true; do
    filename='currentip.txt'
    oldIp=`cat $filename`
    currentIp=`curl http://bot.whatismyipaddress.com/`
    if [ $oldIp != $currentIp ]
    then
	    echo "$(date)\tIp address has changed, sending mail. (Old: $oldIp | New: $currentIp)" >> mailerlog.log
	    php sendMailTest.php $currentIp
        echo $currentIp > $filename
	fi
	sleep 12h
done
}


child&
kill $$ #Kill parent and leave child running
exit 0

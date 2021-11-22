# keba_dashboard
Simple yet efficient Dashboard to get insights in KEBA Wallbox Charging Sessions.

There are for sure better ways to do this, this is just a test use case. You can view and store your last charging sessions, see ongoing chargings, 
change current during and ongoing session or even stop it. As i am still waiting for my car to be delivered, the last two features are not tested.
Notice: data is just stored in some json files, without security etc.

I´d someday love to update this to use websockets to get a better update mechanism than polling. Interested? ;)

This is tested with my Keba P30c Wallbox.

![Keba Dashboard](https://github.com/Ph1975/keba_dashboard/blob/master/dashboard.png?raw=true)

## Configure
- Change the IP adress from your wallbox in ./pages/keba_trigger.php | ./pages/index.php | ./async/listener.php

## Install
- Put the contents into a webserver directory and point the root directory to the ./pages dir.
- start the UDP package listener (chmod 755 first) via the script ./async/start.sh start

access the Dashboard via your webserver ip / port (if set).

## Keba Documentation
Followed the Programmers UDP manual found here:
https://www.keba.com/file/downloads/e-mobility/KeContact_P20_P30_UDP_ProgrGuide_en.pdf

## Copyrights
I used the great and free Dashboard template of Creative Tim
https://www.creative-tim.com/product/material-dashboard

Enjoy! 

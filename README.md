# keba_dashboard
Simple yet efficient Dashboard to get insights in KEBA Wallbox Charging Sessions.

There are for sure better ways to do this, this is just a test use case. You can view and store your last charging sessions, see ongoing chargings, 
change current during and ongoing session or even stop it. As i am still waiting for my car to be delivere, the last to features are not testet.
It simply stores the data in some json files, without security etc.

I´d someday love to update this to use websockets to get a better update mechanism than polling. Interested? ;)

This is tested with my Keba P30c Wallbox.


## Configure
- Change the IP adress from your wallbox in ./pages/keba_trigger.php | ./pages/index.php | ./async/listener.php

## Install
- Put the contents into a webserver directory and point the root directory to the ./pages dir.
- start the UDP package listener (chmod 755 first) via the script ./async/start.sh start

access the Dashboard via your webserver ip / port (if set).

Enjoy! 

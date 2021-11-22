<?php
$ip = "192.168.50.185";
$port = 7090;

//Reduce errors
error_reporting(~E_WARNING);

if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
	$errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}

// Bind the source address
if( !socket_bind($sock, "0.0.0.0" , $port) )
{
	$errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Could not bind socket : [$errorcode] $errormsg \n");
}

echo "Start listening for UDP Packets from $ip:$port\n";

$map = array("Plug" => 
			array("0" => "abgesteckt",
				  "1" => "an der Box",
				  "3" => "an der Box & gesperrt",
				  "5" => "am Fahrzeug",
				  "7" => "am Fahrzeug & gesperrt"),
			"State" => 
			array("0" => "Laden startet",
				  "1" => "Standby",
				  "2" => "Bereit für Laden, warten auf Fahrzeug",
				  "3" => "Laden...",
				  "4" => "Fehler",
				  "5" => "Authentisierung zurückgewiesen")
			);
			


function writeFile($type, $data) {
	$keba_history = "../pages/keba_history.json";
	$keba_current = "../pages/keba_current.json";
	$keba_wallbox = "../pages/keba_wallbox.json";
	$keba_report = "../pages/keba_report_##.json";

	switch ($type) {
		case "wallbox": 
			file_put_contents($keba_wallbox, json_encode($data, JSON_PRETTY_PRINT));
			break;
		case "history":
			file_put_contents($keba_history, json_encode($data, JSON_PRETTY_PRINT));
			break;
		case "report":
			file_put_contents(str_replace("##", $data->ID, $keba_report), json_encode($data, JSON_PRETTY_PRINT));
			break;
		case "current":
			file_put_contents($keba_current, json_encode($data, JSON_PRETTY_PRINT));
			break;
	}
}



$w = null;
$c = null;
$h = null;
$writeC = $writeH = false;
while(1)
{
	$r = socket_recvfrom($sock, $buf, 32768, 0, $remote_ip, $remote_port);
	if (!empty($buf)) {
		
		$o = json_decode($buf);
		if (is_object($o)) {
			// Report 1
			if (isset($o->ID) && (int)$o->ID == 1) {
				$w->wallbox->product = $o->Product;
				$w->wallbox->serial = $o->Serial;
				$w->wallbox->firmware = $o->Firmware;
				$w->last_update = date("Y-m-d H:i:s");
				writeFile("wallbox", $w);
			}
			
			// Broadcast Objects
			if (isset($o->Plug)) {
				$c->current->plug = $map["Plug"][$o->Plug];
				$writeC = true;
			}
			if (isset($o->State)) {
				$c->current->state = $map["State"][$o->State];
				$writeC = true;
			}
			if (isset($o->Input)) {
				$c->current->input = $o->Input;
				$writeC = true;
			}
			if (isset($o->{'Enable sys'})) {
				$c->current->enable_sys = $o->{'Enable sys'};
				$writeC = true;
			}
			if (isset($o->{'Max curr'})) {
				$c->current->max_curr = $o->{'Max curr'};
				$writeC = true;
			}
			if (isset($o->{'E pres'})) {
				$c->current->e_pres = round($o->{'E pres'}/10000,2);
				$writeC = true;
			}
			
			// Report 2
			if (isset($o->ID) && (int)$o->ID == 2) {
				$c->current->state = $map["State"][$o->State];
				$c->current->error1 = $o->Error1;
				$c->current->error2 = $o->Error2;
				$c->current->plug = $map["Plug"][$o->Plug];
				$c->current->enable_sys = $o->{'Enable sys'};
				$c->current->input = $o->Input;
				$c->current->max_curr = $o->{'Max curr'};
				$c->current->energylimit = $o->Setenergy;
				$c->current->current_hw = $o->{'Curr HW'};
				$writeC = true;
			}
			
			// Report 3
			if (isset($o->ID) && (int)$o->ID == 3) {
				$c->current->charging->U1 = $o->U1;
				$c->current->charging->U2 = $o->U2;
				$c->current->charging->U3 = $o->U3;
				$c->current->charging->I1 = $o->I1;
				$c->current->charging->I2 = $o->I2;
				$c->current->charging->I3 = $o->I3;
				$c->current->charging->power = $o->P;
				$c->current->charging->power_factor = $o->PF;
				$c->current->charging->consumption_current = $o->{'E pres'};
				$c->current->charging->consumption_cumulated = $o->{'E total'};
				$writeC = true;
			}
			
			if ($writeC) {
				$c->last_update = date("Y-m-d H:i:s");
				writeFile("current", $c);
				$writeC = false;
			}
			
			
			
			if (isset($o->ID) && (int)$o->ID > 100) {
				writeFile("report", $o);
				if ((int)$o->{'Session ID'} > 0) {
					$h->history->{'report_' . $o->ID}->ID = $o->ID;
					$h->history->{'report_' . $o->ID}->session_id = $o->{'Session ID'};
					$h->history->{'report_' . $o->ID}->consumption_start = round($o->{'E start'}/10000,2);
					$h->history->{'report_' . $o->ID}->consumption_end = round(((int)$o->{'E pres'} + (int)$o->{'E start'})/10000,2);
					$h->history->{'report_' . $o->ID}->consumption_delta = round($o->{'E pres'}/10000,2);
					$h->history->{'report_' . $o->ID}->start_time = $o->{'started[s]'};
					$h->history->{'report_' . $o->ID}->date = gmdate("Y-m-d", $o->{'started[s]'});
					$h->history->{'report_' . $o->ID}->date_start = gmdate("Y-m-d", $o->{'started[s]'});
					$h->history->{'report_' . $o->ID}->date_end = gmdate("Y-m-d", $o->{'ended[s]'});
					$h->history->{'report_' . $o->ID}->duration = round(((int)$o->{'ended[s]'} - (int)$o->{'started[s]'})/60);
					$h->history->{'report_' . $o->ID}->end_time = $o->{'ended[s]'};
					$h->history->{'report_' . $o->ID}->reason = $o->reason;
				} else {
					$writeH = true;
				}
			}
			
			if ($writeH && isset($h->history)) {
				$writeH = false;
				
				// Calculate History Data
				$days = array();
				foreach($h->history as $x) {
					$day = $x->date;
					if (!array_key_exists($day, $days)) {
						$days[$day]["date"] = $day;
						$days[$day]["unixts"] = $x->start_time;
						$days[$day]["sessions"] = 1;
						$days[$day]["consumption_kwh"] = $x->consumption_delta;
						$days[$day]["duration"] = $x->end_time - $x->start_time;
						$days[$day]["duration_avg"] = $x->end_time - $x->start_time;
					} else {
						$days[$day]["sessions"]++;
						$days[$day]["consumption_kwh"] += $x->consumption_delta;
						$days[$day]["duration"] += $x->end_time - $x->start_time;
						$days[$day]["duration_avg"] = $days[$day]["duration"] / $days[$day]["sessions"];
					}
				}
				
				// Axis
				$minDay = null;
				$maxDay = null;
				
				// Calc Spread from History
				/**
				foreach($days as $day) {
					if ($day["unixts"] < $minDay || $minDay == null) {
						$minDay = $day["unixts"];
					}
					if ($day["unixts"] > $maxDay || $maxDay == null) {
						$maxDay = $day["unixts"];
					}
				}
				**/
				$minDay = time() - (14*24*60*60);
				$maxDay = time();
				
				$begin = new DateTime( gmdate("Y-m-d", $minDay) );
				$end   = new DateTime( gmdate("Y-m-d", $maxDay) );
				
				$dateArray = array();
				$consumption_kwh = array();
				$sessions = array();
				$duration_avg = array();
				
				for($i = $begin; $i <= $end; $i->modify('+1 day')) {
					$ds = $i->format("Y-m-d");
					if (!in_array($ds, $dateArray)) {
						array_push($dateArray, $i->format("d.m.Y"));
						if (isset($days[$ds])) {
							array_push($sessions, $days[$ds]["sessions"]);
							array_push($consumption_kwh, $days[$ds]["consumption_kwh"]);
							array_push($duration_avg, $days[$ds]["duration_avg"]/60);
						} else {
							array_push($sessions, 0);
							array_push($consumption_kwh, 0);
							array_push($duration_avg, 0);
						}
					}
				}
				
				// Set Chart Arrays in order
				$h->charts->consumption_kwh->y = $consumption_kwh;
				$h->charts->sessions->y = $sessions;
				$h->charts->duration_avg->y = $duration_avg;
				$h->charts->consumption_kwh->x= $dateArray;
				$h->charts->sessions->x = $dateArray;
				$h->charts->duration_avg->x = $dateArray;
				$h->last_update = date("Y-m-d H:i:s");

				writeFile("history", $h);
				
			}
		}
	}
	usleep(50);
}

socket_close($sock);

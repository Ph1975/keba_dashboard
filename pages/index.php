<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Keba Wallbox Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Wallbox Übersicht</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="./">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#"  data-bs-toggle="modal" data-bs-target="#wallboxinfo">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Wallbox Daten</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0 pt-3">Dashboard - <span id="tstampUpdate">17.11.2021</span></h6>
        </nav>
		<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <button type="button" class="btn btn-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#wallboxchargeStop">Stop Beladen</button>
              </a>
            </li>
            <li class="nav-item d-flex px-3 align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#wallboxcharge">Beladung ändern</button>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
			  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">monitor_heart</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Allgemeiner Status</p>
                <h4 class="mb-0 pt-3" id="allgemeiner_status">######</h4>
				<p class="text-sm mb-0">&nbsp;</p>
              </div>
            </div>
            <div class="card-footer p-1"></div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
			  <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">battery_charging_full</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Aktuelle/Letzte Ladesitzung</p>
                <h4 class="mb-0 pt-3" id="aktuelle_ladesitzung">#####</h4>
				<p class="text-sm mb-0"><span class="text-bold">Volt:</span>
					<span class="pl-2" id="volt_u1"></span> |
					<span class="pl-2" id="volt_u2"></span> |
					<span class="pl-2" id="volt_u3"></span>    
					<span class="text-bold">Milliampere:</span>
					<span class="pl-2" id="amp_u1"></span> |
					<span class="pl-2" id="amp_u2"></span> |
					<span class="pl-2" id="amp_u3"></span>
				</p>
              </div>
            </div>
            <div class="card-footer p-1"></div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
			  <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              
                <i class="material-icons opacity-10">electrical_services</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Ladekabel</p>
                <h4 class="mb-0 pt-3" id="ladekabel">###</h4>
				<p class="text-sm mb-0">&nbsp;</p>
              </div>
            </div>
            <div class="card-footer p-1"></div>
          </div>
        </div>
      </div>
	  <div class="row mt-4">
		<div class="col-lg-12 col-md-6 mb-md-0 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="250"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body pb-2">
              <h6 class="mb-0">Lademenge (kWh)</h6>
              <p class="text-sm">Letzten 30 Tage</p>              
            </div>
          </div>
        </div>
	  </div>
	  <div class="row mt-4">
		<div class="col-lg-12 col-md-6 mb-md-0 mt-4 mb-4">
		  <div class="card z-index-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="250"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body pb-2">
              <h6 class="mb-0">Anzahl Ladevorgänge</h6>
              <p class="text-sm">Letzten 30 Tage</p>              
            </div>
          </div>
		</div>
	  </div>
	  <div class="row mt-4">
		<div class="col-lg-12 col-md-6 mb-md-0 mt-4 mb-4">
		  <div class="card z-index-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="250"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body pb-2">
              <h6 class="mb-0">Ladedauer (Durchschnitt)</h6>
              <p class="text-sm">Letzten 30 Tage</p>              
            </div>
          </div>
		</div>
	  </div>
      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mt-4 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Ladevorgänge Details</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-history text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">die letzten 50</span> Einträge absteigend
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0" id="keba_history">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ende</th>
					  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dauer</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Beendet</th>
					  <th class="text-secondary text-xxs font-weight-bolder opacity-7">kWh geladen</th>
					  <th class="text-secondary text-xxs font-weight-bolder opacity-7">kWh kumuliert</th>
                    </tr>
                  </thead>
                  <tbody>
					<tr class="keba_row">
                      <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 2 </span>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 11.11.2021 19:57 </span>
                        </div>
                      </td>
					  <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 11.11.2021 21:22 </span>
                        </div>
                      </td>
					  <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 1:57 h </span>
                        </div>
                      </td>
					  <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> abgesteckt </span>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 52,5 kWh </span>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 259,7 kWh </span>
                        </div>
                      </td>
                    </tr>
                    <tr class="keba_row">
                      <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 1 </span>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 11.11.2021 19:57 </span>
                        </div>
                      </td>
					  <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 11.11.2021 21:22 </span>
                        </div>
                      </td>
					  <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 1:57 h </span>
                        </div>
                      </td>
					  <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> abgesteckt </span>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 52,5 kWh </span>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-1">
                         <span class="text-xs font-weight-bold"> 259,7 kWh </span>
                        </div>
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
      <footer class="footer py-4">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                Philipp</a> for a better Keba experience.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  
  
  
<div class="modal fade" tabindex="-1" role="dialog" id="wallboxinfo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Wallbox Informationen</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
			<table class="table align-items-center mb-0">
			  <tbody>
				<tr>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold">Wallbox</span>
					</div>
				  </td>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold" id="wallbox_product"></span>
					</div>
				  </td>
				</tr>
				<tr>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold">Firmware</span>
					</div>
				  </td>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold" id="wallbox_firmware"></span>
					</div>
				  </td>
				</tr>
				<tr>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold">Serial</span>
					</div>
				  </td>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold" id="wallbox_serial"></span>
					</div>
				  </td>
				</tr>
			  </tbody>
			</table>
		  </div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="wallboxchargeStop">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ladevorgang beenden</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
			<table class="table align-items-center mb-0">
			  <tbody>
				<tr>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold">Verzögerung in Sekunden</span>
					</div>
				  </td>
				  <td>
					<div class="d-flex px-3 py-1">
					 <div class="input-group input-group-outline">
						<span class="text-xs font-weight-bold"><input type="text" id="delayStop" class="form-control" placeholder="0"></span>
					 </div>
					</div>
				  </td>
				</tr>
			  </tbody>
			</table>
		  </div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="stopCharge" data-bs-dismiss="modal">Ladevorgang beenden</button>
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="wallboxcharge">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">WLadevorgang starten</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
			<table class="table align-items-center mb-0">
			  <tbody>
				<tr>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold">Stromstärke Max:</span>
					</div>
				  </td>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold" id="wallbox_current_hw"></span>
					</div>
				  </td>
				</tr>
				<tr>
				  <td>
					<div class="d-flex px-3 py-1">
					 <span class="text-xs font-weight-bold">Verzögerung in Sekunden</span>
					</div>
				  </td>
				  <td>
					<div class="d-flex px-3 py-1">
					 <div class="input-group input-group-outline">
						<span class="text-xs font-weight-bold"><input type="text" id="delayStart" class="form-control" placeholder="0"></span>
					 </div>
					</div>
				  </td>
				</tr>
			  </tbody>
			</table>
		  </div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="startCharge" data-bs-dismiss="modal">Ladevorgang starten</button>
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
      </div>
    </div>
  </div>
</div>

  <!--   Core JS Files   -->
  
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
	var current = 0;
	
	
	function loadDataCurrent() {
		$.ajax({
			url: "http://192.168.50.15:8085/keba_trigger.php?a=current"
		}).done(function() { 
			$.getJSON("http://192.168.50.15:8085/keba_current.json",
				function(d) {
					data = d;
					var curDt = new Date();
					$('#tstampUpdate').text(curDt.toLocaleDateString("de-DE") + ' ' + curDt.toLocaleTimeString("de-DE"));
					
					$('#allgemeiner_status').text(data.current.state);
					$('#aktuelle_ladesitzung').text(data.current.e_pres + " kWh");
					$('#ladekabel').text(data.current.plug);
					$('#volt_u1').text(data.current.charging.U1);
					$('#volt_u2').text(data.current.charging.U2);
					$('#volt_u3').text(data.current.charging.U3);
					$('#amp_u1').text(data.current.charging.I1 );
					$('#amp_u2').text(data.current.charging.I2 );
					$('#amp_u3').text(data.current.charging.I3 );
					$('#wallbox_current_hw').text(data.current.current_hw/1000 + ' kWh');
					current = data.current.current_hw;
				}
			);
			
			
			
			setTimeout(loadDataCurrent,2000);
		})
	}
	
	
	function loadDataHistory() {
		$.ajax({
			url: "http://192.168.50.15:8085/keba_trigger.php?a=history"
		}).done(function() {
			$.getJSON("http://192.168.50.15:8085/keba_history.json",
				function(d) {
					data = d;
					c1.data.labels = data.charts.consumption_kwh.x;
					c2.data.labels = data.charts.sessions.x;
					c3.data.labels = data.charts.duration_avg.x;
					c1.data.datasets[0].data = data.charts.consumption_kwh.y;
					c2.data.datasets[0].data = data.charts.sessions.y;
					c3.data.datasets[0].data = data.charts.duration_avg.y;
					c1.update();
					c2.update();
					c3.update();
					// update table
					$('.keba_row').remove();
					$.each(data.history, function(index, value) {
						var startTime = new Date(value.start_time * 1000);
						var endTime = new Date(value.end_time * 1000);
						var c = `<tr class="keba_row">
				                      <td>
				                        <div class="d-flex px-3 py-1">
				                         <span class="text-xs font-weight-bold"> ` + value.ID + ` </span>
				                        </div>
				                      </td>
				                      <td>
				                        <div class="d-flex px-3 py-1">
				                         <span class="text-xs font-weight-bold"> ` + startTime.toLocaleDateString("de-DE") + ` - ` + startTime.toLocaleTimeString("de-DE") + ` </span>
				                        </div>
				                      </td>
									  <td>
				                        <div class="d-flex px-3 py-1">
				                         <span class="text-xs font-weight-bold"> ` + endTime.toLocaleDateString("de-DE") + ` - ` + endTime.toLocaleTimeString("de-DE") + `</span>
				                        </div>
				                      </td>
									  <td>
				                        <div class="d-flex px-3 py-1">
				                         <span class="text-xs font-weight-bold"> ` + value.duration + ` Min.</span>
				                        </div>
				                      </td>
									  <td>
				                        <div class="d-flex px-3 py-1">
				                         <span class="text-xs font-weight-bold"> ` + value.reason + ` </span>
				                        </div>
				                      </td>
				                      <td>
				                        <div class="d-flex px-3 py-1">
				                         <span class="text-xs font-weight-bold"> ` + new Intl.NumberFormat('de-DE', { maximumSignificantDigits: 5 }).format(value.consumption_delta) + ` </span>
				                        </div>
				                      </td>
				                      <td>
				                        <div class="d-flex px-3 py-1">
				                         <span class="text-xs font-weight-bold"> ` + new Intl.NumberFormat('de-DE').format(value.consumption_end) + ` </span>
				                        </div>
				                      </td>
				                    </tr>`;
						$('#keba_history tbody').append(c);
					}); // each
				}); // getJSON
				
				$.getJSON("http://192.168.50.15:8085/keba_wallbox.json",
					function(d) {
						data = d;
						
						$('#wallbox_product').text(data.wallbox.product);
						$('#wallbox_serial').text(data.wallbox.serial);
						$('#wallbox_firmware').text(data.wallbox.firmware);
					}
				);
				setTimeout(loadDataHistory,60000);
		});
	}
	
	
	
	$( document ).ready(function() {
		loadDataCurrent();
		loadDataHistory();
		$('#stopCharge').click(function() {
			delay = $('#delayStop').value;
			$.ajax({
				url: "http://192.168.50.15:8085/keba_trigger.php?a=currtime&delay=" + delay + "&current=0"
			}).done(function() { 
				$('#wallboxchargeStop').fadeOut();
			});
		});
		
		$('#startCharge').click(function() {
			if (current == 0) {
				alert("Keine maximale Stromstärke der Wallbox vorhanden! Ladevorgang kann nicht geändert werden");
				return;
			} else {
				delay = $('#delayStart').value;
				$.ajax({
					url: "http://192.168.50.15:8085/keba_trigger.php?a=currtime&delay=" + delay + "&current=" + current
				}).done(function() { 
					$('#wallboxcharge').fadeOut();
				});
			}
		});
	});
	
	
	
    var ctx = document.getElementById("chart-bars").getContext("2d");

    var c1 = new Chart(ctx, {
      type: "bar",
      data: {
        labels: [],
        datasets: [{
          label: "kWh geladen",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
			  stepSize: 1,
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var c2 = new Chart(ctx2, {
      type: "bar",
      data: {
        labels: [],
        datasets: [{
          label: "Ladevorgänge",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
			  stepSize: 1,
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
			  stepSize: 1,
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    var c3 = new Chart(ctx3, {
      type: "bar",
      data: {
        labels: [],
        datasets: [{
          label: "Durschschn. Ladedauer (Min)",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [],
          maxBarThickness: 6
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
			  stepSize: 1,
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>

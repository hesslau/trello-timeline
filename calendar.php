<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base href="<?php echo $_SERVER['SCRIPT_NAME']; ?>" /> 
		<link rel="stylesheet" href="style.css">
		<link rel='stylesheet' type='text/css' href='/lib/fullcalendar/fullcalendar.css' />
		<link rel='stylesheet' type='text/css' href='/lib/ui/themes/ui-lightness/theme.css' />
		<script src="/lib/date.js"></script>
		<script src="/lib/jquery.js"></script>
		<script type='text/javascript' src='/lib/fullcalendar/fullcalendar.min.js'></script>
		<script src="https://api.trello.com/1/client.js?key=fa0ab8a3ae624ee955efb77be24b1cb5"></script>
		<script src="trello.js"></script>
	</head>
	<body>
		
		<div id="loggedin">
			<div id="output"><a href="#" id="connectLink">Bei Trello einloggen</a></div>
		</div>    
		<div id="functions" style="display:none">  
			<a href="timeline.php">Zur Timeline-Ansicht wechseln</a>
		</div>
		<div id='calendar'></div>

	
	</body>
	<script>
	$('#calendar').fullCalendar({
			editable: false,
			theme: true
		});
	function calendar(event) {
		console.log(event);
		$('#calendar').fullCalendar( 'renderEvent', event, true );
			
		}
	$eventfunction = calendar;
		

</script>
<style>
.fc-event-skin {
	background-color: hsl(221, 100%, 40%) !important;
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(221, 100%, 60%)), to(hsl(221, 100%, 40%)));
	background-image: -moz-linear-gradient(top, hsl(221, 100%, 60%), hsl(221, 100%, 40%));
	background-image: -ms-linear-gradient(top, hsl(221, 100%, 60%), hsl(221, 100%, 40%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(221, 100%, 60%)), color-stop(100%, hsl(221, 100%, 40%)));
	background-image: -webkit-linear-gradient(top, hsl(221, 100%, 60%), hsl(221, 100%, 40%));
	background-image: -o-linear-gradient(top, hsl(221, 100%, 60%), hsl(221, 100%, 40%));
	background-image: linear-gradient(hsl(221, 100%, 60%), hsl(221, 100%, 40%));
	border-color: hsl(221, 100%, 40%) hsl(221, 100%, 40%) hsl(221, 100%, 35%);
	color: #eee !important;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.33);
	-webkit-font-smoothing: antialiased;
	-webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.75);
	-moz-box-shadow: 0 1px 5px rgba(0,0,0,0.75);
	box-shadow: 0 1px 5px rgba(0,0,0,0.75);
}

</style>
</html>


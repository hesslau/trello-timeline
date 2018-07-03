<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
	<link rel="stylesheet" href="/lib/reset.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet/less" type="text/css" href="style.less">
	<script src="/lib/less.js"></script>
	<script src="/lib/date.js"></script>
	<script src="/lib/time.js"></script>
	<script src="/lib/jquery.js"></script>
	<script src="/lib/mousewheel.js"></script>
	<script src="https://api.trello.com/1/client.js?key=fa0ab8a3ae624ee955efb77be24b1cb5"></script>
    <script src="trello.js"></script>
    <script src="dragPane.js"></script>
</head>

<body>
	<div id="functions" style="display:none">  
			<a href="calendar.php">zurück zur Kalendaransicht</a>
		</div>
    <div id="timeline">
		<div class="intervals">
        </div> <!-- end .intervals -->
        <ul class="backgrounds">
        </ul>
        <ul class="events">

        </ul> <!-- end .events -->

        
    </div> <!-- end .timeline -->
<script>
var timeline = $('#timeline');
var Monat = new Array("Januar", "Februar", "März", "April", "Mai", "Juni",
				  "Juli", "August", "September", "Oktober", "November", "Dezember");
var size = {};
size.day = 10;
size.marginLeft = 90;

// calculate difference between today and next month
var month = new TimeSpan(Date.today().add(1).month().moveToFirstDayOfMonth()-Date.today().add(1).day());
// move this month's pane
$('<div>').text(Monat[Date.today().getMonth()]).css({"width":month.days*size.day+"px", left: size.marginLeft+"px"}).appendTo('.intervals');
// move the background for this months pane
$('<li>').css({"width":month.days*size.day+"px", left: size.marginLeft+"px"}).appendTo('.backgrounds');

// create a variable that cycles through the following months
var now = Date.today().moveToFirstDayOfMonth();
// days of current month remaining
var span = month.days;
// number of months displayed
for(var i=0; i <= 9; i++) {
	now = now.add(1).month();		// move to next month
	// set size of pane depending on days in month
	$('<div>').text(Monat[now.getMonth()]).css({"width":now.getDaysInMonth()*size.day+"px", "left": span*size.day+size.marginLeft+"px"}).appendTo('.intervals'); 
	// set size an position of background for current cycled month
	$('<li>').css({"width":now.getDaysInMonth()*size.day+"px", "left": span*size.day+size.marginLeft+"px"}).appendTo('.backgrounds');
	
	// add days of month
	span += now.getDaysInMonth();
}	

function addEvent(event) {
	var span = new TimeSpan(event.end-event.start);
	var pre = new TimeSpan(event.start-Date.today());
	$('<li>').html("<a href='"+event.url+"'>"+event.title+"</a>").css( {"left":pre.days*size.day+size.marginLeft+"px", "width": span.days*size.day+"px"}).appendTo('.events');
}
$eventfunction = addEvent;

</script>
</body>
</html>

var syntax = /start: (.*)/;
var $auth;

$(function() {

var onAuthorize = function() {
	try {
		$auth.empty();
	} catch(e) {}
	updateLoggedIn();
		$("#output").empty();
		$("#functions").show();
			Trello.members.get("me", function(member){
			$("#fullName").text(member.fullName);
			
			var $cards = $("<div>")
				.text("Lade...")
					.appendTo("#output");
			
			Trello.get("members/my/cards", function(cards) {
					$cards.empty();
					Roadmap(cards,$eventfunction);
			});
		});

};

var updateLoggedIn = function() {
var isLoggedIn = Trello.authorized();
	$("#loggedout").toggle(!isLoggedIn);
	$("#loggedin").toggle(isLoggedIn);        
};
		
var logout = function() {
	Trello.deauthorize();
	updateLoggedIn();
};
								  
Trello.authorize({
	interactive:false,
	success: onAuthorize
});


$("#connectLink")
	.click(function(){
		$auth = $("<div>")
				.text("Authorisieren...")
					.appendTo("#output");
		Trello.authorize({
			type: "popup",
			success: onAuthorize
		})
	});
			
$("#disconnect").click(logout);
});

	
function Roadmap(cards, callback) {
	$.each(cards, function(ix, card) {

		if(card.due) {
			card.end = new Date(card.due);
			
			var ds = syntax.exec(card.desc);
			if(ds) {					
				card.start = Date.parse(ds[1]);
			} else {									
				card.start = card.end;					
			}
			
			callback({
							title: card.name,
							start: card.start,
							end: card.end,
							url: card.url+" "
						});
		}
	});
}


var h_Header, h_H1;
var fontSize_H1, lineHeight_H1;
var new_fontSize_H1, new_lineHeight_H1;


$(document).ready(function() { // Ждём загрузки страницы

  	fontSize_H1 = $("h1.project-header__title").css("fontSize").replace("px", "");
	lineHeight_H1 = $("h1.project-header__title").css("lineHeight").replace("px", "");
		
	Zoom();
	
	$(window).resize(function(){
		Zoom();
	});
	
});

function Zoom (argument) {
	
	h_Header = $("header.project-header").height();
	h_H1 = $("h1.project-header__title").height();

	if (h_Header == undefined) {return;}
    if (h_H1 == undefined) {return;}
		
	while (($("h1.project-header__title").css("fontSize").replace("px", "") < fontSize_H1)
		&& ($("h1.project-header__title").height() <= ($("header.project-header").height() - $("h1.project-header__title").css("padding-top").replace("px", ""))))
	{
		new_fontSize_H1 = $("h1.project-header__title").css("fontSize").replace("px", "") * 1.05;
		new_lineHeight_H1 = $("h1.project-header__title").css("lineHeight").replace("px", "") * 1.05;
		
		if (new_fontSize_H1 > fontSize_H1) {new_fontSize_H1 = fontSize_H1;};
		if (new_lineHeight_H1 > lineHeight_H1) {new_lineHeight_H1 = lineHeight_H1;};
		
		$("h1.project-header__title").css({"fontSize": new_fontSize_H1 + "px"});
		$("h1.project-header__title").css({"lineHeight": new_lineHeight_H1 + "px"});
	}
	
	while ($("h1.project-header__title").height() > ($("header.project-header").height() - $("h1.project-header__title").css("padding-top").replace("px", ""))) {
		$("h1.project-header__title").css({"fontSize": ($("h1.project-header__title").css("fontSize").replace("px", "") * 0.95) + "px"});
		$("h1.project-header__title").css({"lineHeight": ($("h1.project-header__title").css("lineHeight").replace("px", "") * 0.95) + "px"});
	}
}
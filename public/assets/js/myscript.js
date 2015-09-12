function initTime() {
	/*var timeDiv = document.createElement("div");
	timeDiv.id = "timeDiv";
	var timeText = document.createTextNode("");
	timeDiv.appendChild(timeText);
	document.getElementById("navigation").parentNode.insertBefore(timeDiv,document.getElementById("navigation").nextSibling);
	window.onload=updateTime;*/
	
	var $timeDiv = $("<div>");
	$timeDiv.attr('id', "timeDiv");
	$('.navbar').after($timeDiv);
	window.onload=updateTime;
}

function updateTime(){
	function checkTime(i) {
		if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
		return i;
	}
	var days = ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"];
	var months = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"];
	var date = new Date();
	var day = days[date.getDay()];
	var chislo = date.getDate();
	var month = months[date.getMonth()];
	var year = date.getFullYear();
	var h = checkTime(date.getHours());
	var m = checkTime(date.getMinutes());
	var s = checkTime(date.getSeconds());
	$("#timeDiv").html(day + ", " + chislo + " " + month + " " + year + " г, " + h + ":" + m + ":" + s);
	setTimeout("updateTime()", 1000);
};

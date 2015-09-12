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
}

function validate_test()
{
	q1 = document.forms["form"]["question_1"].value;
	q2 = document.forms["form"]["question_2"].value;
	q3 = document.forms["form"]["question_3"].value;
	
	if (q1 == 0)
	{
		alert("ответьте на первый вопрос");
		document.getElementById("q1").focus();
		return false;
	}
	
	if (q2.length == 0)
	{
		alert("ответьте на второй вопрос");
		document.getElementById("q2").focus();
		return false;
	}
	else
	{
		if(/\D+ \D+ \D+/.test(q2))
		{
			
		}
		else
		{
			alert("введите правильный ответ на второй вопрос");
			document.getElementById("q2").focus();
			return false;
		}
	}
	
	if (q3.length == 0)
	{
		alert("ответьте на третий вопрос");
		return false;
	}
}

function init_all() {
	$(document).ready(function(){
		initTime();

		//сохраняем в sessionStorage
		var page_name = location.pathname.substring(location.pathname.lastIndexOf("/") + 1)
		if (!page_name) {
			page_name = 'index';
		}

		if(sessionStorage.getItem(page_name)) {
			sessionStorage.setItem(page_name, Number(sessionStorage.getItem(page_name))+1);
		} else {
			sessionStorage.setItem(page_name, 1);
		}
		
		//сохраняем куки
		if(getCookie(page_name)) {
			new Date(new Date().setYear(new Date().getFullYear() + 1))
			setCookie(page_name, Number(getCookie(page_name))+1);
		} else {
			setCookie(page_name, 1);
		}
	});
}

//cookie кукисы cookie.js
// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
	if (!name) {
		name = 'index';
	}

	//console.log(name);

  var matches = document.cookie.match(new RegExp(
	"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

// устанавливает cookie c именем name и значением value
// options - объект с свойствами cookie (expires, path, domain, secure)
function setCookie(name, value, options) {
	if (!name) {
		name = 'index';
	}

  options = options || {};

  var expires = options.expires;

 //  if (typeof expires == "number" && expires) {
	// var d = new Date();
	// d.setTime(d.getTime() + expires * 1000);
	// expires = options.expires = d;
 //  }
 //  if (expires && expires.toUTCString) {
	// options.expires = expires.toUTCString();
 //  }
 var date = new Date(new Date().setYear(new Date().getFullYear() + 1));
 options.expires=date.toUTCString();

  //console.log(options);

  value = encodeURIComponent(value);

  var updatedCookie = name + "=" + value;

  for (var propName in options) {
	updatedCookie += "; " + propName;
	var propValue = options[propName];
	if (propValue !== true) {
	  updatedCookie += "=" + propValue;
	}
  }

  document.cookie = updatedCookie;
}

// удаляет cookie с именем name
function deleteCookie(name) {
  setCookie(name, "", {
	expires: -1
  })
}

function history_update(pages) {
	//console.log('history_update started');
	for (var i = 0; i < pages.length; ++i) {
		//console.log(pages[i]);
		console.log('.page_'+pages[i]);
		$('#page_'+pages[i]).children('.session').text(sessionStorage.getItem(pages[i]) || 0);
		$('#page_'+pages[i]).children('.all').text(getCookie(pages[i]) || 0);
	}
}
function get_count() {
	var result;
$.ajax({                         
	url: "/api/count",                        
	method: 'GET',
	async: false,
	}).done(function(data) {
		if (!!data) {
			result=data;
		} else {
			result=false;
		}
	});
	console.log(result);
	return result;
}

function get_count_timeout() {
	var count=get_count();
	$('#count-all').text(count.all);
	$('#count-desktop').text(count.desktop);
	$('#count-phone').text(count.phone);
	$('#count-tablet').text(count.tablet);
	$('#count-robot').text(count.robot);
	setTimeout("get_count_timeout()", 5000);
}



function clockTimer()
{
  var date = new Date();
  
  var time = [date.getHours(),date.getMinutes(),date.getSeconds()]; // |[0] = Hours| |[1] = Minutes| |[2] = Seconds|
  var dayOfWeek = ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"]
  var days = date.getDay();
  
  if(time[0] < 10){time[0] = "0"+ time[0];}
  if(time[1] < 10){time[1] = "0"+ time[1];}
  if(time[2] < 10){time[2] = "0"+ time[2];}
  
  var current_time = [time[0],time[1],time[2]].join(':');
  var clock = document.getElementById("clock");
  var day = document.getElementById("dayOfWeek");
  
  clock.innerHTML = current_time;
  day.innerHTML = dayOfWeek[days];
  
  
  
  setTimeout("clockTimer()", 1000);
}

function basket_count()
{
	//делаем запрос к БД
	$.ajax({                         
	url: "/api/basket/count",                        
	method: 'GET',
	async: false,
	}).done(function(data) {
		if (!!data) {
			$('#basket-count').text(data);
		} else {
			$('#basket-count').text('not found');
		}
	});
	setTimeout("basket_count()", 5000);
}

function onloadd()
{
	clockTimer();
	get_count_timeout();
	basket_count();
}


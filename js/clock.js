
function clock() {
  var d = new Date();
  utc = d.getTime() + (d.getTimezoneOffset() * 60000) + 60*60*1000;
  d = new Date(utc);

  var day = d.getDate();
  var hours = d.getHours();
  var minutes = d.getMinutes();
  var seconds = d.getSeconds();

  month = new Array("Jun", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Okt", "Nov", "Dec");

  var N_D = new Date();
  var weekday = new Array(7);
  weekday[0] = "Sunday";
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";

  if (day <= 9) day = "0" + day;
  if (hours <= 9) hours = "0" + hours;
  if (minutes <= 9) minutes = "0" + minutes;
  if (seconds <= 9) seconds = "0" + seconds;

  time = "<span>" + hours + ":" + minutes + ":" + seconds + "</span>";
  date = "<span>" + day + " " + month[d.getMonth()]+ " " + d.getFullYear() + "</span>";

  if (document.layers) {
    document.layers.doc_time.document.close();
  }
  else {
    document.getElementById("time").innerHTML = time;
    document.getElementById("date").innerHTML = date;
  }

  setTimeout("clock()", 1000);
}

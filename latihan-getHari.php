<input id="date_picker" type="date">
<input type="text" id="day">

<script type="text/javascript">
	document.getElementById("date_picker").addEventListener("input", myFunction);

	function myFunction() {
		var f = document.getElementById("date_picker");
		var d = document.getElementById("day");

		var date = new Date(f.value);

		var weekday = new Array(7);
		weekday[0] =  "Minggu";
		weekday[1] = "Senin";
		weekday[2] = "Selasa";
		weekday[3] = "Rabu";
		weekday[4] = "Kamis";
		weekday[5] = "Jumat";
		weekday[6] = "Sabtu";

		var n = weekday[date.getDay()];
		day.value = n;
	}
</script>
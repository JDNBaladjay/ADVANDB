<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DataWarehouse</title>
	<script src="http://code.jquery.com/jquery-3.3.1.js"
  			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  			crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>
	<div class="menu">
		<span class="toggle">
			<i></i>
			<i></i>
			<i></i>
		</span>
		<div class="menucontent">
			<ul>
				<li><button class="OLAP" onclick="openTab(this.innerHTML, event, 'drilldown')">Drill down</button></li>
				<li><button class="OLAP" onclick="openTab(this.innerHTML, event, 'rollup')">Roll up</button></li>
				<li><button class="OLAP" onclick="openTab(this.innerHTML, event, 'slice')">Slice</button></li>
				<li><button class="OLAP" onclick="openTab(this.innerHTML, event, 'dice')">Dice</button></li>
			</ul>
		</div>
	</div>
	<div class="textContainer">
		<h1>Data warehousing explanation</h1>
		<h4>instructions here!!</h4>
	</div>
	<div class="editContainer">
		<h1>WTH</h1>
		<h4>this should change and stuff</h4>
	</div>
	
	<div id="drilldown" class="operation">
			<form action="query/HDIperCountries.php" target="queryResult" method="get">
			<p>I want to see the HDI (Human Development Index) of countries in year </p>
			<input type="text" name="year"> (from 1985 to 2016 only).
			<button class="submitQuery" type="submit">Submit Query</button>
			</form>
	</div>
	<div id="rollup" class="operation">
			<form action="query/genMostSuicideCount.php" target="queryResult" method="get">
			<p>I want to see the generation with the highest suicide count.</p>
			<button class="submitQuery" type="submit">Submit Query</button>
			</form>
	</div>
	<div id="slice" class="operation">
			<form action="query/suicideCountYear.php" target="queryResult" method="get">
			<p>I want to see the total suicides in year __.</p>
			<input type="text" name="year"> (from 1985 to 2016 only).
			<button class="submitQuery" type="submit">Submit Query</button>
			</form>
	</div>
	<div id="dice" class="operation">
			<form action="query/suicideCountCountry.php" target="queryResult" method="get">
			<p>I want to see the total suicides in the countries of</p>
			<input type="text" name="country1">
			and
			<input type="text" name="country2">
			</form>
	</div>
	<div class="tableContainer">
                peanut butter
				<iframe name="queryResult" src=""></iframe>
	</div>
	<script>
		$('.toggle').on('click', function(){

			$('.menu').toggleClass('active');
		});
	</script>
	<script src="../js/myScript.js"></script>
</body>
</html>
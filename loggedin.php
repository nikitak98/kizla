<!DOCTYPE html>
<html>
<head>
	<link href="index.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<div class="logo"><i class="fa fa-line-chart"></i></div>
		<div class="header">CSGO Stocks</div>
			<?php include ('steamauth/userInfo.php');
				echo "<div class='steam-login2'>";
				echo  "<img id='yourpic' src='".$steamprofile['avatarmedium']."'><br>";
				echo "</div><div id='yourpicname'>".$steamprofile['personaname']."<br><a href='steamauth/logout.php'>Log out</a></div>";
			?>
	</div>
</nav>
	<div class='container' id='main'>
		<p>Welcome to CSGO Stocks <?php echo $steamprofile['personaname']?>! Now go buy some stock you shmuck</p>
	</div>
	<div class="container" id="prices">
		<?php
			$arr = array('AAPL,GOOG,TWTR,FB,LNKD');
			$url= "http://finance.yahoo.com/d/quotes.csv?s=".implode("+", $arr)."&f="."nabd1t1";
			echo "<table>
					<tr>
						<th id='stock-name'>Stock</th>
						<th id='other'>Buy Price</th>
						<th id='other'>Sell Price</th>
						<th id='other'>Date</th>
						<th id='other'>Time</th>
		
			";
			$handle = fopen($url, "r");
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				echo "<tr>";
				foreach($data as $d)
				echo "<td>$d</td>";
				echo "</tr>";
			}
			fclose($handle);
			echo "</table>";
/* 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock prices";
*/
		?>
	</div>
	<div class="container" id="footer">
		<div class="text-center"><i>This page is powered by <a href="http://steampowered.com">Steam</a></i>
		</div>
	</div>
</body>
</html>
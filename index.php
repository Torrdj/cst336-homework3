<?php
	include "functions.php";
?>
<html>
	<head>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
	</head>
	<header>
		<h1>Caesar cipher (Rot-n encryption)</h1>
		<hr/>
	</header>
	<body>
		<div id='form'>
			<form method='post'>
				<label for='e'>Encrypt</label>
					<input type='radio' name='method' id='e' value='e'
						<?php
							echo $_POST ? ($_POST['method'] == 'e' ? "checked" : ""): "checked";
						?>>
				<label for='d'>Decrypt</label>
					<input type='radio' name='method' id='d' value='d'
						<?php
							echo $_POST ? ($_POST['method'] == 'd' ? "checked" : ""): "";
						?>>
				<br/>

				<label for='n'>Select rotation:</label>
				<select name='n' id='n'>
					<?php
						for($i = 0; $i < 26; $i++)
						{
							echo "<option value=$i ";
							if ($i == ($_POST ? $_POST['n'] : 13))
								echo "selected";
							echo ">$i</option>";
						}
						echo "<option value='bf' ";
						if ($_POST && $_POST['n'] == 'bf')
							echo "selected";
						echo ">Bruteforce</option>";
					?>
				</select>
				<br/>

				<textarea name='text' rows='3' cols='42'><?php
				if ($_POST)
					echo $_POST['text'];
				?></textarea><br/>
				<input type='submit' value="Submit">
			</form>
		</div>
		<div id='result'>
			<?php
				if ($_POST)
				{
					?>
					<h2>Result<?php echo $_POST['n'] == 'bf' ? "s" : "";?></h2>
					<table>
						<tr id='table-header'>
							<td>n</td>
							<td>Rot-n</td>
						</tr>
					<?php
					if ($_POST['n'] == 'bf')
					{
						for ($i = 0; $i < 26; $i++)
						{
							echo "<tr class='table-row'><td>$i</td><td>";
							echo rotn(($_POST['method'] == 'e' ? $i : -$i), $_POST['text']);
							echo "</td></tr>";
						}
					}
					else
					{
						echo "<tr class='table-row'><td>".$_POST['n']."</td><td>";
						echo rotn(($_POST['method'] == 'e' ? $_POST['n'] : -$_POST['n']), $_POST['text']);
						echo "</td></tr>";
					}
					echo "</table>";
				}
			?>
		</div>
	</body>
	<footer>
			<hr/>
            CST 336 - Internet Programming. 2018&copy; TORDJMAN
	</footer>
</html>
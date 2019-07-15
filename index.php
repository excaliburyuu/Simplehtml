<html>
	<head>
		<title>Dicoding Submission 1</title>
		<style>
			body {
				max-width:649px;
				border:1px solid #000;
				margin:0px auto;
			}
			form {
				width:100%;
			}
			table.center {
				margin: 0 auto;
				z-index:1;
				width:50%;
			}
			input[type="text"], input[type="mail"] {
				padding:4px;
				color:#000;
				border:1px solid blue;
				margin:3px;
				border-radius:3px;
			}
			input[type="submit"] {
				background-color: blue;
				padding:5px;
				color:#fff;
				border:1px solid blue;
				border-radius: 3px;
			}
			input[type="submit"]:hover {
				background-color: orange;
				padding:5px;
				color:#fff;
				border:1px solid orange;
				border-radius: 3px;
			}
		</style>
	</head>
	<body>
		<h1 style="background-color:orange; color: #fff">Form Registrasi</h1>
		<center><font color="gray">Registrasi dengan mengisi form yang tersedia</font></center>
		<br/>
		<form action="#" method="post">
			<table class="center">
				<tr valign="middle">
					<td width="5%">Nama</td><td>:</td><td><input type="text" placeholder="Masukkan Nama Anda.." name="nama"/></td>
				</tr>
				<tr valign="middle">
					<td width="5%">E-mail</td><td>:</td><td><input type="mail" placeholder="Masukkan E-mail Anda.." name="email"/></td>
				</tr>
				<tr valign="middle">
					<td width="5%">Pekerjaan</td><td>:</td><td><input type="text" placeholder="Masukkan Pekerjaan Anda.." name="pekerjaan"/></td>
				</tr>
			</table>
			<center><input type="submit" name="kirim" value="Submit" /> <input type="submit" name="load" value="Load Data"/></center>
		</form>
		<?php
		    $host = "cobaazuredicoding.database.windows.net";
		    $user = "josesadriel";
		    $pass = "Makanberger1";
		    $db = "cobaazuredb";
			try {
				$conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
				$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch(Exception $e) {
				echo "Failed: " . $e;
			}
			
			if (isset($_POST['kirim'])) {
				try {
					$nama = $_POST['nama'];
					$email = $_POST['email'];
					$job = $_POST['pekerjaan'];
					$waktu = date("Y-m-d");
					// Insert data
					$sql_insert = "INSERT INTO registrasi (nama, email, pekerjaan, tanggal) 
								VALUES (?,?,?,?)";
					$stmt = $conn->prepare($sql_insert);
					$stmt->bindValue(1, $nama);
					$stmt->bindValue(2, $email);
					$stmt->bindValue(3, $job);
					$stmt->bindValue(4, $waktu);
					$stmt->execute();
				} catch(Exception $e) {
					echo "Failed: " . $e;
				}
			}
			else if (isset($_POST['load'])) {
				try {
            $sql_select = "SELECT * FROM registrasi";
            $stmt = $conn->query($sql_select);
            $registrants = $stmt->fetchAll(); 
            if(count($registrants) > 0) {
                echo "<table width='100%' border='1'>";
                echo "<tr><th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Job</th>";
                echo "<th>Date</th></tr>";
                foreach($registrants as $registrant) {
                    echo "<tr><td>".$registrant['nama']."</td>";
                    echo "<td>".$registrant['email']."</td>";
                    echo "<td>".$registrant['pekerjaan']."</td>";
                    echo "<td>".$registrant['tanggal']."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<h3>No one is currently registered.</h3>";
            }
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
			}
		?>
	</body>
</html>

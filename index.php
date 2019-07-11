<html>
	<head>
		<title>Dicoding Submission 1</title>
	</head>
	<body>
		<h1>Form Registrasi</h1>
		<font color="#ccc">Registrasi dengan mengisi form yang tersedia</font>
		<br/>
		<form action="#" method="post">
			Nama: <input type="text" placeholder="Masukkan Nama Anda.." name="nama"/><br/>
			E-mail: <input type="mail" placeholder="Masukkan E-mail Anda.." name="email"/><br/>
			Pekerjaan: <input type="text" placeholder="Masukkan Pekerjaan Anda.." name="pekerjaan"/><br/>
			<input type="submit" name="kirim" value="Submit" /> | <input type="submit" name="load" value="Load Data"/>
		</form>
		
		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>E-Mail</th>
					<th>Pekerjaan</th>
					<th>Tanggal</th>
				</tr>
			</thead>
			<tbody>
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
			
			if (isset($_POST['load'])) {
				$sql = "SELECT * FROM registrasi;";
				$query = mysqli_query($conn, $sql);
				
				while($data = mysqli_fetch_array($query)) {
					echo "<tr>";

					echo "<td>".$data['id']."</td>";
					echo "<td>".$data['nama']."</td>";
					echo "<td>".$data['email']."</td>";
					echo "<td>".$data['pekerjaan']."</td>";
					echo "<td>".$data['tanggal']."</td>";
				}
			}
		?>
			</tbody>
		</table>
	</body>
</html>

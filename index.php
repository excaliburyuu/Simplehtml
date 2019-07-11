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
			Tanggal: <input type="text" placeholder="Masukkan nama Anda.." name="nama"/><br/>
			<input type="submit" name="kirim" value="Submit" />
		</form>
		
		<?php
			try {
    				$conn = new PDO("sqlsrv:server = tcp:cobaazuredicoding.database.windows.net,1433; Database = cobaazuredb", "josesadriel", "Makanberger1");
    				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $e) {
    				print("Error connecting to SQL Server.");
    				die(print_r($e));
			}
		?>

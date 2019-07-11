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
		?>

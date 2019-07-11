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
			<input type="submit" name="kirim" value="Submit" />
		</form>
		
		<?php
		    $host = "cobaazuredicoding.database.windows.net";
		    $user = "josesadriel";
		    $pass = "Makanberger1";
		    $db = "cobaazuredb";
		    try {
        		$conn = mysqli_connect($host, $user, $pass, $db);
    		    } catch(Exception $e) {
        		echo "Koneksi Gagal!";
    		    }
		    
			if (isset($_POST['kirim']) {
				try {
					$nama = $_POST['nama'];
					$email = $_POST['email'];
					$job = $_POST['pekerjaan'];
				
					$sql = "INSERT INTO registrasi (nama, email, pekerjaan, tanggal) VALUES ('$nama', '$email', '$job', NOW())";
					$query = mysqli_query($conn, $sql);
				} catch(Exception $e) {
					echo "Gagal Submit!";
				}
			}
		?>
	</body>
</html>

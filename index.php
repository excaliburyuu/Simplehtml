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
                echo "<h2>People who are registered:</h2>";
                echo "<table>";
                echo "<tr><th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Job</th>";
                echo "<th>Date</th></tr>";
                foreach($registrants as $registrant) {
                    echo "<tr><td>".$registrant['name']."</td>";
                    echo "<td>".$registrant['email']."</td>";
                    echo "<td>".$registrant['job']."</td>";
                    echo "<td>".$registrant['date']."</td></tr>";
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

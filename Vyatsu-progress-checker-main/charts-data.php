<?php
	session_start();
	function debug_to_console($data) {
	    $output = $data;
	    if (is_array($output))
	        $output = implode(',', $output);

	    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}

	$host = "localhost";
	$username = "root";
	$password = "mysql";
	$database = "users";

		$conn = new mysqli($host, $username, $password, $database);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$student_id = $_SESSION['id'];

	$student_id = mysqli_real_escape_string($conn, $student_id);
	$sql = "SELECT * FROM datas WHERE id = '$student_id'";
	$result = $conn->query($sql);

	$pointsProg = 0;
	$pointsMath = 0;
	$pointsInfo = 0;
	$pointsEng = 0;
	$pointsPhys = 0;
	$totalProg = 0;
	$totalMath = 0;
	$totalInfo = 0;
	$totalEng = 0;
	$totalPhys = 0;
	$total = $_SESSION['total'];

	if($result = $conn->query($sql)){
			
		if($result->num_rows > 0){
			foreach($result as $row){
				$pointsProg = $row["pointsProg"];
				$pointsMath = $row["pointsMath"];
				$pointsInfo = $row["pointsInfo"];
				$pointsEng = $row["pointsEng"];
				$pointsPhys = $row["pointsPhys"];
				$totalProg = $row["totalProg"];
				$totalMath = $row["totalMath"];
				$totalInfo = $row["totalInfo"];
				$totalEng = $row["totalEng"];
				$totalPhys = $row["totalPhys"];
				$labsProg = $row["labsProg"];
				$labsInf= $row["labsInf"];
				$labsPhys = $row["labsPhys"];
			}
		}
		else{
			echo "<div>Пользователь не найден</div>";
		}
		} else{
		echo "Ошибка: " . $conn->error;
		}

	$conn->close();

	echo "<script>
		var data1 = [
			{
				y: $totalProg !== 0 ? $pointsProg / $totalProg * 100 : 0,
				name: 'Программирование'
			},
			{
				y: $totalMath !== 0 ? $pointsMath / $totalMath * 100 : 0,
				name: 'Математика'
			},
			{
				y: $totalInfo !== 0 ? $pointsInfo / $totalInfo * 100 : 0,
				name: 'Информатика'
			},
			{
				y: $totalEng !== 0 ? $pointsEng / $totalEng * 100 : 0,
				name: 'Английский язык'
			},
			{
				y: $totalPhys !== 0 ? $pointsPhys / $totalPhys * 100 : 0,
				name: 'Физика'
			}
		]; // для первой диаграммы

		var data2 = [{
					y: 100,
					name: 'Максимальное'
				}, {
					y: $total, // значение вставлять сюда
					name: 'Текущее'
			}] // для второй диаграммы
		var data3 = [
			{
				y: $labsProg,
				name: 'Программирование'
			},
			{
				y: $labsInf,
				name: 'Информатика'
			},
			{
				y: $labsPhys,
				name: 'Физика'
			}
		]; // для третьей диаграммы
	</script>"
?>
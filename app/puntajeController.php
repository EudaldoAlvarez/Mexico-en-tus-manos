<?php


include_once "app.php";
include_once "connectionController.php";

class PuntajeController
{

	public function getPorUsuario()
	{
		$conn = connect();
		if ($conn->connect_error == false) {

			$query = "select * from puntaje where nickname = (?)";
			$prepared_query = $conn->prepare($query);
			$prepared_query->bind_param('s', $_SESSION['nickname']);
			if ($prepared_query->execute()) {
				$results = $prepared_query->get_result();
				$puntajes = $results->fetch_all(MYSQLI_ASSOC);
				if (count($puntajes) > 0) {
					return $puntajes;
				} else {
					$_SESSION['error'] = 'Datos erroneos';
					return array();
				}
			} else {
				$_SESSION['error'] = 'Datos erroneos';
			}
		} else
			return array();
	}

	public function getAll()
	{
		$conn = connect();
		if ($conn->connect_error == false) {

			$query = "select nickname,puntaje FROM puntaje ORDER BY puntaje + 0 DESC";
			$prepared_query = $conn->prepare($query);
			if ($prepared_query->execute()) {
				$results = $prepared_query->get_result();
				$puntajes = $results->fetch_all(MYSQLI_ASSOC);
				if (count($puntajes) > 0) {
					return $puntajes;
				} else {
					$_SESSION['error'] = 'Datos erroneos';
					return array();
				}
			} else {
				$_SESSION['error'] = 'Datos erroneos';
			}
		} else
			return array();
	}
}

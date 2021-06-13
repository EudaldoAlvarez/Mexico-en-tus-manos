<?php


include_once "app.php";
include_once "connectionController.php";
if (isset($_POST['action'])) {

	if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {

		$authController = new AuthController();

		switch ($_POST['action']) {
			case 'registro':

				$nombres = strip_tags($_POST['nombres']);
				$apellidos = strip_tags($_POST['apellidos']);
				$nickname = strip_tags($_POST['user']);
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);

				$authController->register($nombres, $apellidos, $nickname, $email, $password);

				break;
			case 'login':

				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);

				$authController->access($email, $password);

				break;
			case 'estadisticas':
				$nickname = strip_tags($_POST['nickname']);
				$puntuacion = strip_tags($_POST['puntuacion']);
				$dificultad = strip_tags($_POST['dificultad']);
				$tipo = strip_tags($_POST['tipo']);
				$aciertos = strip_tags($_POST['aciertos']);
				$minutos = strip_tags($_POST['minutos']);
				$segundos = strip_tags($_POST['segundos']);

				$authController->puntuacion($nickname, $puntuacion, $dificultad, $tipo, $aciertos, $minutos, $segundos);
				break;
			case 'guardar':
				$nickname = strip_tags($_POST['nickname']);
				$puntuacion = strip_tags($_POST['puntuacion']);
				$dificultad = strip_tags($_POST['dificultad']);
				$tipo = strip_tags($_POST['tipo']);
				$aciertos = strip_tags($_POST['aciertos']);
				$minutos = strip_tags($_POST['minutos']);
				$segundos = strip_tags($_POST['segundos']);

				$authController->guardar($nickname, $puntuacion, $dificultad, $tipo, $tipo, $aciertos, $minutos, $segundos);
				break;
		}
	} else {

		$_SESSION['error'] = 'de seguridad';
		header("Location:" . $_SERVER['HTTP_REFERER']);
	}
} else {
	$_SESSION['error'] = 'no existe el post action';
	//header("Location:". $_SERVER['HTTP_REFERER'] );
}

class AuthController
{
	public function get()
	{
		$conn = connect();
		if ($conn->connect_error == false) {

			$query = "select * from puntaje where nickname = (?)";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$categories = $results->fetch_all(MYSQLI_ASSOC);

			if (count($categories) > 0) {
				return $categories;
			} else
				return array();
		} else
			return array();
	}
	public function puntuacion($nickname, $puntuacion, $dificultad, $tipo, $aciertos, $minutos, $segundos)
	{
		$zero = 0;
		$conn = connect();
		$query = "insert into puntaje values (?, ?, ?, ?,?,?,?,?)";
		$prepared_query = $conn->prepare($query);
		$prepared_query->bind_param('issssiii', $zero, $nickname, $puntuacion, $dificultad, $tipo, $aciertos, $minutos, $segundos);
		if ($prepared_query->execute()) {
			header("Location:" . BASE_PATH . "/dashboard");
		} else {

			$_SESSION['error'] = 'Datos erroneos';

			// header("Location:" . $_SERVER['HTTP_REFERER']);
		}
	}
	public function guardar($nickname, $puntuacion, $dificultad, $aciertos, $minutos, $segundos)
	{
		$zero = 0;
		$conn = connect();
		$query = "insert into puntaje values (?, ?, ?, ?,?,?,?,?)";
		$prepared_query = $conn->prepare($query);
		$prepared_query->bind_param('issssiii', $zero, $nickname, $puntuacion, $dificultad, $tipo, $aciertos, $minutos, $segundos);
		if ($prepared_query->execute()) {
			header("Location:" . $_SERVER['HTTP_REFERER']);
		} else {

			$_SESSION['error'] = 'Datos erroneos';

			// header("Location:" . $_SERVER['HTTP_REFERER']);
		}
	}
	public function register($nombres, $apellidos, $nickname, $email, $password)
	{
		$conn = connect();
		if (!$conn->connect_error) {

			if ($nombres != "" && $apellidos != "" && $nickname != "" && $email != "" && $password != "") {

				$originalPassword = $password;
				$password = sha1($password . 'wakwak_eee_123');
				$query = "insert into usuarios(nombres,apellidos,nickname,email,password) values (?,?,?,?,?)";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('sssss', $nombres, $apellidos, $nickname, $email, $password);

				if ($prepared_query->execute()) {

					$this->access($email, $originalPassword);
				} else {

					$_SESSION['error'] = 'Usuario o email ya esta en uso';

					header("Location:" . $_SERVER['HTTP_REFERER']);
				}
			} else {
				$_SESSION['error'] = 'verifique la información del formulario';

				header("Location:" . $_SERVER['HTTP_REFERER']);
			}
		} else {
			$_SESSION['error'] = 'verifique la conexión a la base de datos';

			header("Location:" . $_SERVER['HTTP_REFERER']);
		}
	}

	public function access($email, $password)
	{
		$conn = connect();
		if (!$conn->connect_error) {
			if ($email != "" && $password != "") {
				$password = sha1($password . 'wakwak_eee_123');

				$query = "select * from usuarios where email = ? and password = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('ss', $email, $password);

				if ($prepared_query->execute()) {

					$results = $prepared_query->get_result();

					$user = $results->fetch_all(MYSQLI_ASSOC);

					if (count($user) > 0) {

						$user = array_pop($user);

						$_SESSION['id'] = $user['id'];
						$_SESSION['name'] = $user['nombres'];
						$_SESSION['email'] = $user['email'];
						$_SESSION['nickname'] = $user['nickname'];
						if ($user['rol'] == "Administrador") {
							header("Location:" . BASE_PATH . "/admin/categories");
						} else {
							header("Location:" . BASE_PATH . "/menu/");
						}
					} else {
						$_SESSION['error'] = 'no se encontro el usuario o contraseña incorrecta';
						header("Location:" . $_SERVER['HTTP_REFERER']);
					}
				} else {
					$_SESSION['error'] = 'verifique los datos envíados';

					header("Location:" . $_SERVER['HTTP_REFERER']);
				}
			} else {
				$_SESSION['error'] = 'verifique la información del formulario';

				header("Location:" . $_SERVER['HTTP_REFERER']);
			}
		} else {
			$_SESSION['error'] = 'verifique la conexión a la base de datos';

			header("Location:" . $_SERVER['HTTP_REFERER']);
		}
	}
}

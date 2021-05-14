<?php

include "../app/app.php";

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<!-- <link rel="stylesheet" type="text/css" href="../assets/style/registro.css? v=7"> -->
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body style="margin: 0;">
	<!--==================
			login-start
		===================-->
	<div class="grid grid-cols-2 bg-yellow-200 w-full">
		<div class="min-h-screen flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
			<div class="bg-white max-w-md w-full space-y-8 border border-lg rounded-md shadow-2xl">
				<div class="mt-6">
					<img class="mx-auto h-12 w-20" src="../assets/img/logo.png" alt="Workflow">
					<h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
						Registra tu cuenta
					</h2>
					<p class="mt-2 text-center text-sm text-gray-600">
						¡Aprende jugando!
					</p>
				</div>
				<?php include "../layouts/alerts.template.php"; ?>
				<form class="mt-8 px-3 space-y-6" method="POST" action="../auth">



					<div class="rounded-md shadow-sm -space-y-px">
						<div>
							<label for="nombres" class="sr-only">Nombre(s)</label>
							<input id="nombres" name="nombres" type="text" autocomplete="nombres" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nombre(s)">
						</div>
						<div>
							<label for="Apellidos" class="sr-only">Apellido(s)</label>
							<input id="Apellidos" name="apellidos" type="text" autocomplete="apellidos" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Apellidos(s)">
						</div>
						<div>
							<label for="user" class="sr-only">Nickname</label>
							<input id="user" name="user" type="text" autocomplete="user" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nickname">
						</div>
						<div>
							<label for="email-address" class="sr-only">Email address</label>
							<input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Correo Electronico">
						</div>
						<div>
							<label for="password" class="sr-only">Password</label>
							<input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Contraseña">
						</div>
					</div>

					<div class="flex items-center justify-between">
						<div class="flex items-center">
							<input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
							<a href="#" for="remember_me" class="ml-2 block text-sm text-indigo-400 hover:text-indigo-600">
								Terminos y condiciones
							</a>
						</div>

						<div class="text-sm">
							<a href="../login/" class="font-medium text-indigo-400 hover:text-indigo-600">
								¿Ya tienes una cuenta?
							</a>
						</div>
					</div>
					<div class="pb-6">
						<button type="submit" class="delay-75 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							<span class="absolute left-0 inset-y-0 flex items-center pl-3">
								<svg class="h-5 w-5 text-green-500 group-hover:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
								</svg>
							</span>
							Entrar
						</button>
						<input type="hidden" name="action" value="registro">
						<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
						<input type="hidden" name="remember" value="true">
					</div>
				</form>
			</div>
		</div>
		<div class="min-h-screen inline-block items-center justify-center  py-12  ">
			<img class="mx-auto w-3/4" src="../assets/img/logo3.png" alt="globo-mexico">

		</div>
	</div>



	<!-- <div id="login">
			<div class="container">
				<fieldset>
					<legend>
						<label>
							Registro
						</label>
					</legend>
					<img src="../assets/img/header/user.png">
					<?php include "../layouts/alerts.template.php"; ?>
					<form method="POST" action="../app/authController.php">
						<label>
							Nombre(s)
						</label>
						<input type="text" name="nombres" placeholder="Filomeno" required="">
						<label>
							Apellidos
						</label>
						<input type="text" name="apellidos" placeholder="Ancrascio" required="">
						<label>
							Usuario
						</label>
						<input type="text" name="user" placeholder="Nickname" required="">
						<label>
							email
						</label>
						<input type="email" name="email" placeholder="email@correo.com" required="">
						<label>
							Contraseña
						</label>
						<input type="password" name="password" placeholder="*****" required="">
						<div class="condiciones">
							<label>
								Aceptar <a href="">terminos y condiciones</a>
							</label>
							<input type="checkbox" name="terminos" required="">
						</div>
						<input type="hidden" name="action" value="registro">
						<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
						<button type="submit">
							Registrar
						</button>
					</form>
					<label>
						¿Ya tienes una cuenta? Pulsa <a href="../login/">aqui</a>
					</label>
				</fieldset>
			</div>
		</div> -->
	<!--==================
			login-end
		===================-->
</body>

</html>
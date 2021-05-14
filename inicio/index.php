<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Inicio</title>
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
 
	<!-- This example requires Tailwind CSS v2.0+ -->
<div>
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="assets/img/logo3.png" alt="Workflow">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium ">México en tus manos</a>
              <a href="reference.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">¿Quienes somos?</a>
            </div>
          </div>
        </div>
        <!-- Profile dropdown -->
        <div class="ml-4 relative">
            <div>
              <a href="login/index.php"><img class="h-8 w-8 rounded-md" src="assets/img/sesion.png" alt=""></a>
            </div> 
        </div>
      </div>
    </div>
   
  </nav>

</div>
</body>

</html>
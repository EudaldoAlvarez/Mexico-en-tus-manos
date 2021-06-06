<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Inicio</title>
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <style type="text/css">
    .carousel-open:checked + .carousel-item {
  position: static;
  opacity: 100;
}
.carousel-item {
  -webkit-transition: opacity 0.6s ease-out;
  transition: opacity 0.6s ease-out;
}
#carousel-1:checked ~ .control-1,
#carousel-2:checked ~ .control-2,
#carousel-3:checked ~ .control-3 {
  display: block;
}
.carousel-indicators {
  list-style: none;
  margin: 0;
  padding: 0;
  position: absolute;
  bottom: 2%;
  left: 0;
  right: 0;
  text-align: center;
  z-index: 10;
}
#carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
#carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
#carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet
{ 
  color: #2b6cb0;
}
/*tailwind.config.js*/
module.exports = {
  theme: {
    colors: {
      transparent: 'transparent',
      blue: '#039A1',
      pink: '#9D174D',
      teal: '#134E4A',
      green: '#4D7C0F',
      yellow: '#EAB308',
    }
  }
}
  </style>
</head>

<body>
 
	<!-- This example requires Tailwind CSS v2.0+ -->
<div>
  <nav class="bg-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-14">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-10 w-10" src="assets/img/NUEVO LOGO.png" alt="Workflow">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="index.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">
              	México en tus manos
              </a>

              <a href="reference.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
              	¿Quienes somos?
              </a>

            </div>
          </div>
        </div>
            <!-- Profile dropdown -->
            <div class="ml-4 relative">
              <div>
                  <a href="login/index.php">  
                  	<img class="h-10 w-10 rounded-md" src="assets/img/sesion_.png" alt=""> 
                  </a>
              
              </div>
             
            </div>
          </div>
        </div>
        
      </div>
    </div>

       
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
        ¿Qué es México en tus manos?
      </h1>
    </div>
  </header>
  <main>
    <div class="max-w-7xl mx-auto py-3 sm:px-6 lg:px-8">
      <!-- Replace with your content -->
      <div class="px-4  sm:px-0">
        <div class="border-4 border-dashed border-yellow-200 rounded-lg h-2600">
          <div class="carousel relative shadow-2xl bg-black">
    <div class="carousel-inner relative overflow-hidden w-full">
      <!--Slide 1-->
        <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
        <div class="carousel-item absolute opacity-0" style="height:82vh;">
            <div class="block h-full w-full bg-indigo-500 text-white text-5xl text-center">
             <img src="assets/img/slide1.jpg"> </img> 
            </div>
        </div>
        <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
        
        <!--Slide 2-->
        <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item absolute opacity-0" style="height:82vh;">
            <div class="block h-full w-full bg-orange-500 text-white text-5xl text-center">
              <img src="assets/img/slide2.jpg"> </img> 
            </div>
        </div>
        <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label> 
        
        <!--Slide 3-->
        <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item absolute opacity-0" style="height:82vh;">
            <div class="block h-full w-full bg-green-500 text-white text-5xl text-center">
                <img src="assets/img/slide3.jpg"> </img> 
            </div>
        </div>
        <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!-- Add additional indicators for each slide-->
        <ol class="carousel-indicators">
            <li class="inline-block mr-3">
                <label for="carousel-1" class="carousel-bullet cursor-pointer block text-5xl text-white hover:text-blue-700">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-2" class="carousel-bullet cursor-pointer block text-5xl text-white hover:text-blue-700">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-3" class="carousel-bullet cursor-pointer block text-5xl text-white hover:text-blue-700">•</label>
            </li>
        </ol>
        
    </div>
</div>
     
        </div>
      </div>

      <!-- /End replace -->
    </div>
  </main>
</div>

</body>

</html>
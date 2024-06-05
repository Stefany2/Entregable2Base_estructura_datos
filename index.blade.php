<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estudiantes</title>
  <style>
    /* Estilos CSS */
    body {
      background: url('https://i.pinimg.com/originals/e5/ca/f0/e5caf0bf71998c692248003f7eed5fb1.gif') no-repeat center center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 30px;
      border-radius: 10px;
    }

    h1 {
      text-align: center;
      color: #FF335E ;
      margin-bottom: 40px;
    }

    .estudiantes-lista {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      grid-gap: 20px;
    }

    .estudiante {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease-in-out;
    }

    .estudiante:hover {
      transform: translateY(-5px);
    }

    .estudiante h2 {
      color: #DD33FF ;
      font-size: 24px;
      margin-bottom: 10px;
    }

    .estudiante p {
      color: #5233FF ;
      font-size: 18px;
      margin-bottom: 20px;
    }

    .agregar-estudiante {
      text-align: center;
      margin-top: 30px;
    }

    .agregar-estudiante a {
      color: #fff;
      background-color: #FF335E ;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease-in-out;
    }

    .agregar-estudiante a:hover {
      background-color: #DD33FF ;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>ESTUDIANTES</h1>
  <div class="estudiantes-lista" id="estudiantes-lista">
    <!-- Datos de los estudiantes se cargarán aquí -->
  </div>
  <div class="agregar-estudiante">
    <a href="http://localhost/estudiantes/agregar_estudiantes.php">Añadir Estudiante</a>
  </div>


  <div class="agregar-estudiante">
    <a href="http://localhost/estudiantes/Actualizar_estudiantes.php">Actualizar Estudiante</a>
  </div>

<div class="agregar-estudiante">
    <a href="http://localhost/estudiantes/eliminar_estudiantes.php">Eliminar Estudiante</a>
  </div>
<script>
  // Realizar una solicitud HTTP GET a la API de estudiantes
  fetch('http://127.0.0.1:8000/api/estudiantes')
    .then(response => response.json()) // Convertir la respuesta a JSON
    .then(data => {
      const estudiantesLista = document.getElementById('estudiantes-lista');

      // Iterar sobre los estudiantes y generar el HTML dinámicamente
      data.estudiantes.forEach(estudiante => {
        const estudianteHTML = `
          <div class="estudiante">
            <h2>${estudiante.nombre} ${estudiante.apellido}</h2>
            <p>Edad: ${estudiante.edad}</p>
            <p>Grado: ${estudiante.grado}</p>
            <p>Sección: ${estudiante.seccion}</p>
          </div>
        `;
        estudiantesLista.innerHTML += estudianteHTML; // Agregar el HTML del estudiante a la lista
      });
    })
    .catch(error => console.error('Error al obtener los estudiantes:', error));
</script>

</body>
</html>

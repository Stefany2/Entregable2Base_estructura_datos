<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Estudiante</title>
  <!-- Incluir CSS de Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* Estilos CSS adicionales */
    body {
      background: url('https://i.pinimg.com/originals/bf/b9/4e/bfb94e54c45afd24384db5ad32d71d15.gif') no-repeat center center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
    }

    .container {
      margin-top: 50px;
      max-width: 600px;
      background-color: rgba(0, 0, 0, 0.5);  /* Transparencia para ver la imagen de fondo */
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px pink;
      color: white;
    }

    .btn-custom {
      background-color: #E333FF;
      color: white;
      border: none;
    }

    .btn-custom:hover {
      background-color: #0056b3;
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-salir {
      background-color: #E333FF;
      color: white;
      border: none;
      margin-left: 10px;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease-in-out;
    }

    .btn-salir:hover {
      background-color: #DD33FF;
    }
  </style>
</head>
<body>

<div class="container">
  <h1 class="text-center text-primary">Agregar Nuevo Estudiante</h1>
  <form id="formulario-estudiante">
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
      <label for="apellido">Apellido:</label>
      <input type="text" class="form-control" id="apellido" name="apellido" required>
    </div>
    <div class="form-group">
      <label for="edad">Edad:</label>
      <input type="number" class="form-control" id="edad" name="edad" required>
    </div>
    <div class="form-group">
      <label for="grado">Grado:</label>
      <input type="text" class="form-control" id="grado" name="grado" required>
    </div>
    <div class="form-group">
      <label for="seccion">Sección:</label>
      <input type="text" class="form-control" id="seccion" name="seccion" required>
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <button type="submit" class="btn btn-custom">Agregar Estudiante</button>
      <a href="http://localhost/estudiantes/index.blade.php" class="btn-salir"><i class="fas fa-sign-out-alt"></i></a>
    </div>
  </form>
</div>

<!-- Incluir JavaScript de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // Manejar el envío del formulario
  document.getElementById('formulario-estudiante').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que se recargue la página
    
    // Obtener los datos del formulario
    const formData = new FormData(this);
    
    // Enviar la solicitud POST a la API
    fetch('http://127.0.0.1:8000/api/estudiantes', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      alert('Estudiante agregado exitosamente');
      // Limpiar el formulario después de agregar el estudiante
      document.getElementById('formulario-estudiante').reset();
    })
    .catch(error => {
      console.error('Error al agregar el estudiante:', error);
      alert('Hubo un error al agregar el estudiante. Por favor, inténtalo de nuevo.');
    });
  });
</script>

</body>
</html>

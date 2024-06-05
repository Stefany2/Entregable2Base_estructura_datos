<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Estudiante</title>
  <!-- Incluir CSS de Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilos CSS adicionales */
    body {
      background: url('https://articles-img.sftcdn.net/t_articles/auto-mapping-folder/sites/2/2023/04/tierra-horizonte-planeta.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
    }

    .container {
      margin-top: 50px;
      max-width: 600px;
      background-color: rgba(255, 255, 255, 0.8); /* Transparencia para ver la imagen de fondo */
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .btn-custom {
      background-color: #E333FF ;
      color: white;
      border: none;
    }

    .btn-custom:hover {
      background-color: #0056b3;
    }

    .form-group label {
      font-weight: bold;
    }

    h1 {
      color: #E333FF ;
    }

    .btn-exit {
      background-color: #ff4d4d;
      color: white;
      border: none;
    }

    .btn-exit:hover {
      background-color: #cc0000;
    }
  </style>
</head>
<body>

<div class="container">
  <h1 class="text-center">Actualizar Estudiante</h1>

  <form id="formulario-buscar-estudiante" class="mb-4">
    <div class="form-group">
      <label for="id">ID del Estudiante:</label>
      <input type="text" class="form-control" id="id" name="id" required>
    </div>
    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-custom">Buscar Estudiante</button>
      <button type="button" class="btn btn-exit" onclick="window.location.href='http://localhost/estudiantes/index.blade.php'">Salir</button>
    </div>
  </form>

  <form id="formulario-actualizar-estudiante" style="display: none;">
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
    <button type="submit" class="btn btn-custom btn-block">Actualizar Estudiante</button>
  </form>
</div>

<!-- Incluir JavaScript de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  document.getElementById('formulario-buscar-estudiante').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const id = document.getElementById('id').value;

    // Realizar una solicitud GET para obtener los detalles del estudiante
    fetch(`http://127.0.0.1:8000/api/estudiantes/${id}`)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        // Verificar si se obtuvieron los datos correctamente
        if (data.estudiante) {
          // Obtener los datos del estudiante
          const estudiante = data.estudiante;

          // Llenar los campos del formulario con los datos del estudiante
          document.getElementById('formulario-actualizar-estudiante').style.display = 'block';
          document.getElementById('nombre').value = estudiante.nombre;
          document.getElementById('apellido').value = estudiante.apellido;
          document.getElementById('edad').value = estudiante.edad;
          document.getElementById('grado').value = estudiante.grado;
          document.getElementById('seccion').value = estudiante.seccion;
        } else {
          console.error('Error al obtener los datos del estudiante:', data.message);
          alert('Hubo un error al cargar los datos del estudiante. Por favor, inténtalo de nuevo.');
        }
      })
      .catch(error => {
        console.error('Error al obtener los datos del estudiante:', error);
        alert('Hubo un error al cargar los datos del estudiante. Por favor, inténtalo de nuevo.');
      });
  });

  document.getElementById('formulario-actualizar-estudiante').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const id = document.getElementById('id').value;
    const formData = new FormData(this);

    const estudianteData = {
      nombre: formData.get('nombre'),
      apellido: formData.get('apellido'),
      edad: formData.get('edad'),
      grado: formData.get('grado'),
      seccion: formData.get('seccion')
    };

    // Enviar la solicitud PUT a la API para actualizar los datos del estudiante
    fetch(`http://127.0.0.1:8000/api/estudiantes/${id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(estudianteData)
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 200) {
        alert('Estudiante actualizado exitosamente');
        // Limpiar el formulario después de actualizar el estudiante
        document.getElementById('formulario-actualizar-estudiante').reset();
        document.getElementById('formulario-actualizar-estudiante').style.display = 'none';
      } else {
        console.error('Error al actualizar el estudiante:', data.message);
        alert('Hubo un error al actualizar el estudiante. Por favor, inténtalo de nuevo.');
      }
    })
    .catch(error => {
      console.error('Error al actualizar el estudiante:', error);
      alert('Hubo un error al actualizar el estudiante. Por favor, inténtalo de nuevo.');
    });
  });
</script>

</body>
</html>

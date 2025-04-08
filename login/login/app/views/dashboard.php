<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user me-1"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cog me-1"></i> Configuración</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=logout">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 d-none d-md-block">
                <div class="card">
                    <div class="card-header bg-light">
                        Menú
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active">
                            <i class="fas fa-chart-line me-2"></i>Resumen
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-users me-2"></i>Usuarios
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-file-alt me-2"></i>Reportes
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-envelope me-2"></i>Mensajes
                        </a>
                    </div>
                </div>
            </div>

            <!-- Área de contenido -->
            <div class="col-lg-10 col-md-9">
                <div class="card">
                    <div class="card-header bg-white">
                        <h2 class="h4 mb-0"><i class="fas fa-home me-2"></i>Bienvenido al Dashboard</h2>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>Has iniciado sesión correctamente.
                        </div>

                        <!-- Estadísticas rápidas -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-users me-2"></i>Usuarios</h5>
                                        <p class="h2">1,254</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-white bg-success">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-shopping-cart me-2"></i>Ventas</h5>
                                        <p class="h2">$12,540</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-white bg-warning">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-tasks me-2"></i>Tareas</h5>
                                        <p class="h2">24</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-bell me-2"></i>Alertas</h5>
                                        <p class="h2">5</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gráfico placeholder -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Actividad reciente</h5>
                            </div>
                            <div class="card-body">
                                <img src="https://via.placeholder.com/800x300?text=Gráfico+de+actividad"
                                    alt="Gráfico de actividad" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light mt-4 py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2023 Mi Aplicación. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-decoration-none me-3">Términos de servicio</a>
                    <a href="#" class="text-decoration-none">Política de privacidad</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
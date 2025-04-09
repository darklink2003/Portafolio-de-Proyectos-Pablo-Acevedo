<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Contactos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestor de Contactos</h1>

        <!-- Formulario de Búsqueda -->
        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o número...">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Botón para Agregar Contacto -->
        <a href="add_contact.php" class="btn btn-success w-100 mb-4">Agregar Contacto</a>
        <!-- Lista de Contactos -->
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM contacts";
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $search = $_GET['search'];
                    $query .= " WHERE name LIKE '%$search%' OR phone LIKE '%$search%'";
                }
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($contacts as $contact) {
                    echo "<tr>";
                    echo "<td>{$contact['id']}</td>";
                    echo "<td>{$contact['name']}</td>";
                    echo "<td>{$contact['phone']}</td>";
                    echo "<td>{$contact['email']}</td>";
                    echo "<td>
                            <a href='edit_contact.php?id={$contact['id']}' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='delete_contact.php?id={$contact['id']}' class='btn btn-danger btn-sm delete-btn'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/script.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MXZ Papers - Papelería</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .hero-section {
            background: url('https://img.freepik.com/fotos-premium/lapices-boligrafos-coloridos_23-2147650791.jpg?size=626&ext=jpg') no-repeat center center;
            background-size: cover;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .hero-section::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .hero-section .content {
            position: relative;
            z-index: 2;
        }
        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 1.25rem;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .features {
            padding: 60px 0;
            text-align: center;
        }
        .features h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        .feature-item {
            margin: 20px;
        }
        .feature-item img {
            max-width: 100px;
            margin-bottom: 15px;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .footer p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <!-- Sección Hero -->
    <section class="hero-section">
        <div class="content">
            <h1 style="font-family: 'Times New Roman', Times, serif;" class="display-4">Bienvenido a MXZ Papers</h1>
            <p class="lead">Tu destino para todo tipo de suministros de papelería y oficina. ¡Encuentra lo que necesitas aquí!</p>
            <a href="{{ route('login') }}" class="btn btn-custom btn-lg">INGRESAR</a>
        </div>
    </section>

    <!-- Sección de Características -->
    <section class="features">
        <div class="container">
            <h2>Sobre nosotros</h2>
            <p style="font-family: 'Playfair Display', serif; font-size: 1.2rem; line-height: 1.5; color: #343a40;">
                En MXZ Papers, estamos comprometidos en brindarte los mejores productos de papelería y oficina. Nuestro objetivo es que encuentres lo que necesitas en un solo lugar, y que puedas disfrutar de la mejor experiencia de compra.
            </p>
            <p style="font-family: 'Playfair Display', serif; font-size: 1.2rem; line-height: 1.5; color: #343a40;">
                Nos enfocamos en innovar y mejorar constantemente, para brindarte la mejor experiencia posible.
            </p>
        </div>
    </section>

    <!-- Pie de Página -->
    <footer class="footer">
        <p>&copy; 2024 MXZ Papers. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

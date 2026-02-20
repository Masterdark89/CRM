<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Diseño Gráfico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --pink: #ff6fa6;
            --pink-dark: #e85692;
            --pink-light: #ffe6f2;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--pink-light) 0%, #fff 50%, #f0f8ff 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 2rem;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--pink-dark);
        }
        
        .hero {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
        }
        
        .hero-content {
            text-align: center;
            max-width: 800px;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--pink-dark) 0%, var(--pink) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .cta-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 60px;
        }
        
        .btn-pink {
            background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%);
            border: none;
            color: white;
            padding: 12px 40px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 111, 166, 0.3);
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(255, 111, 166, 0.5);
            color: white;
            text-decoration: none;
        }
        
        .btn-outline {
            background: white;
            border: 2px solid var(--pink);
            color: var(--pink);
            padding: 10px 38px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-outline:hover {
            background: var(--pink-light);
            color: var(--pink-dark);
            text-decoration: none;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 60px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(255, 111, 166, 0.2);
            cursor: pointer;
        }
        
        .feature-card {
            text-decoration: none !important;
            color: inherit !important;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--pink);
            margin-bottom: 15px;
        }
        
        .feature-card h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        
        .feature-card p {
            font-size: 0.9rem;
            color: #666;
        }
        
        .stats {
            background: white;
            padding: 40px;
            border-radius: 15px;
            margin-top: 40px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 30px;
            text-align: center;
        }
        
        .stat-item h4 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--pink-dark) 0%, var(--pink) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stat-item p {
            color: #666;
            font-size: 0.95rem;
            margin-top: 5px;
        }
        
        footer {
            background: var(--pink-light);
            padding: 30px 20px;
            text-align: center;
            color: #666;
            margin-top: auto;
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-buttons a {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-palette"></i> CRM Diseño Gráfico
            </a>
            <div class="d-flex gap-2 ms-auto">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-pink">Panel</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-pink">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Gestiona tu CRM de Diseño Gráfico</h1>
            <p>Controla clientes, productos, facturas, empleados y más. Todo en un solo lugar, con estilo y eficiencia.</p>
            
            <div class="cta-buttons">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-pink">
                            <i class="fas fa-arrow-right"></i> Ir al panel
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-pink">
                            <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline">
                            <i class="fas fa-user-plus"></i> Crear cuenta
                        </a>
                    @endauth
                @endif
            </div>
            
            <!-- Stats -->
            <div class="stats">
                <div class="stat-item">
                    <h4>6</h4>
                    <p>Módulos</p>
                </div>
                <div class="stat-item">
                    <h4>100%</h4>
                    <p>Funcional</p>
                </div>
                <div class="stat-item">
                    <h4>∞</h4>
                    <p>Posibilidades</p>
                </div>
                <div class="stat-item">
                    <h4>🚀</h4>
                    <p>Rápido</p>
                </div>
            </div>
            
            <!-- Features -->
            <div class="features">
                @auth
                    <a href="{{ route('clientes.index') }}" class="feature-card text-decoration-none" style="color: inherit;">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Clientes</h3>
                        <p>Gestiona todos tus clientes en un lugar</p>
                    </a>
                    
                    <a href="{{ route('productos.index') }}" class="feature-card text-decoration-none" style="color: inherit;">
                        <div class="feature-icon">
                            <i class="fas fa-image"></i>
                        </div>
                        <h3>Productos</h3>
                        <p>Controla tus servicios de diseño</p>
                    </a>
                    
                    <a href="{{ route('proveedores.index') }}" class="feature-card text-decoration-none" style="color: inherit;">
                        <div class="feature-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Proveedores</h3>
                        <p>Administra recursos y proveedores</p>
                    </a>
                    
                    <a href="{{ route('empleados.index') }}" class="feature-card text-decoration-none" style="color: inherit;">
                        <div class="feature-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Empleados</h3>
                        <p>Gestiona tu equipo de trabajo</p>
                    </a>
                    
                    <a href="{{ route('facturas.index') }}" class="feature-card text-decoration-none" style="color: inherit;">
                        <div class="feature-icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <h3>Facturas</h3>
                        <p>Control de ingresos y pagos</p>
                    </a>
                    
                    <a href="{{ route('incidencias.index') }}" class="feature-card text-decoration-none" style="color: inherit;">
                        <div class="feature-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <h3>Incidencias</h3>
                        <p>Seguimiento de problemas y tickets</p>
                    </a>
                @else
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3>Acceso restringido</h3>
                        <p>Inicia sesión para acceder a todos los módulos</p>
                    </div>
                @endauth
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 CRM Diseño Gráfico. Todos los derechos reservados. | Hecho con <i class="fas fa-heart" style="color: var(--pink);"></i></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Start session for authentication
session_start();

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Initialize Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../var/cache',
    'debug' => true,
    'auto_reload' => true,
]);

// Add global variables
$twig->addGlobal('app_name', 'TicketMaster');

// Simple router
$request = $_SERVER['REQUEST_URI'];
$basePath = '/ticket-app/twig-app/public';
$request = str_replace($basePath, '', $request);
$request = parse_url($request, PHP_URL_PATH);

// Authentication check middleware
$isAuthenticated = isset($_SESSION['user']);
$publicRoutes = ['/login', '/signup', '/'];

// If not authenticated and not on a public route, redirect to login
if (!$isAuthenticated && !in_array($request, $publicRoutes)) {
    header('Location: /ticket-app/twig-app/public/login');
    exit();
}

// Route handling
switch ($request) {
    case '/':
        echo $twig->render('home/index.html.twig');
        break;
    case '/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle login logic
            $_SESSION['user'] = [
                'id' => 1,
                'email' => $_POST['email'],
                'name' => 'Test User'
            ];
            header('Location: /ticket-app/twig-app/public/dashboard');
            exit();
        }
        echo $twig->render('auth/login.html.twig');
        break;
    case '/signup':
        echo $twig->render('auth/signup.html.twig');
        break;
    case '/dashboard':
        echo $twig->render('dashboard/index.html.twig', [
            'user' => $_SESSION['user'] ?? null,
            'stats' => [
                'total' => 10,
                'open' => 5,
                'in_progress' => 3,
                'closed' => 2
            ]
        ]);
        break;
    case '/tickets':
        // This would come from a database in a real app
        $tickets = [
            ['id' => 1, 'title' => 'Fix login page', 'status' => 'open', 'description' => 'The login button is not working'],
            ['id' => 2, 'title' => 'Update dashboard', 'status' => 'in_progress', 'description' => 'Add new statistics to the dashboard'],
            ['id' => 3, 'title' => 'Mobile responsiveness', 'status' => 'closed', 'description' => 'Fix layout issues on mobile devices']
        ];
        
        echo $twig->render('tickets/index.html.twig', [
            'tickets' => $tickets,
            'user' => $_SESSION['user'] ?? null
        ]);
        break;
    case '/logout':
        session_destroy();
        header('Location: /ticket-app/twig-app/public/login');
        exit();
    default:
        http_response_code(404);
        echo $twig->render('errors/404.html.twig');
        break;
}

<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Mock data
$tickets = [
    [
        'id' => 1,
        'title' => 'Fix login page',
        'description' => 'The login button is not working on mobile devices',
        'status' => 'open',
        'priority' => 'high',
        'created_at' => '2025-10-26 10:00:00',
        'assigned_to' => null,
        'created_by' => 1
    ],
    [
        'id' => 2,
        'title' => 'Update dashboard layout',
        'description' => 'Improve the dashboard layout for better user experience',
        'status' => 'in_progress',
        'priority' => 'medium',
        'created_at' => '2025-10-25 14:30:00',
        'assigned_to' => 1,
        'created_by' => 2
    ],
    [
        'id' => 3,
        'title' => 'Add dark mode',
        'description' => 'Implement dark mode theme option',
        'status' => 'open',
        'priority' => 'low',
        'created_at' => '2025-10-24 09:15:00',
        'assigned_to' => 2,
        'created_by' => 1
    ]
];

// Get request method and ID
$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$status = $_GET['status'] ?? null;

// Helper function to find ticket by ID
function findTicketById($tickets, $id) {
    foreach ($tickets as $ticket) {
        if ($ticket['id'] === $id) {
            return $ticket;
        }
    }
    return null;
}

// Route the request
switch ($method) {
    case 'GET':
        if ($id) {
            // Get single ticket
            $ticket = findTicketById($tickets, $id);
            if ($ticket) {
                echo json_encode($ticket);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Ticket not found']);
            }
        } else if ($status) {
            // Filter tickets by status
            $filtered = array_filter($tickets, fn($t) => $t['status'] === $status);
            echo json_encode(array_values($filtered));
        } else {
            // Get all tickets
            echo json_encode($tickets);
        }
        break;
        
    case 'POST':
        // Create new ticket
        $data = json_decode(file_get_contents('php://input'), true);
        $newTicket = [
            'id' => count($tickets) + 1,
            'title' => $data['title'] ?? '',
            'description' => $data['description'] ?? '',
            'status' => $data['status'] ?? 'open',
            'priority' => $data['priority'] ?? 'medium',
            'created_at' => date('Y-m-d H:i:s'),
            'assigned_to' => $data['assigned_to'] ?? null,
            'created_by' => 1 // Mock user ID
        ];
        
        // In a real app, you would save this to a database
        $tickets[] = $newTicket;
        
        http_response_code(201);
        echo json_encode($newTicket);
        break;
        
    case 'PUT':
        // Update existing ticket
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Ticket ID is required']);
            break;
        }
        
        $data = json_decode(file_get_contents('php://input'), true);
        $ticket = findTicketById($tickets, $id);
        
        if (!$ticket) {
            http_response_code(404);
            echo json_encode(['error' => 'Ticket not found']);
            break;
        }
        
        // Update ticket fields
        $updatedTicket = array_merge($ticket, $data);
        
        // In a real app, you would update this in the database
        foreach ($tickets as &$t) {
            if ($t['id'] === $id) {
                $t = $updatedTicket;
                break;
            }
        }
        
        echo json_encode($updatedTicket);
        break;
        
    case 'DELETE':
        // Delete ticket
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Ticket ID is required']);
            break;
        }
        
        $ticket = findTicketById($tickets, $id);
        
        if (!$ticket) {
            http_response_code(404);
            echo json_encode(['error' => 'Ticket not found']);
            break;
        }
        
        // In a real app, you would delete from the database
        $tickets = array_filter($tickets, fn($t) => $t['id'] !== $id);
        
        http_response_code(204); // No content
        break;
        
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
}

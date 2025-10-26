document.addEventListener('DOMContentLoaded', () => {
    // Initialize UI components
    initToast();
    initForms();
    initTickets();
    initDashboard();
});

// Toast notifications
function initToast() {
    window.showToast = function(message, type = 'success') {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toast-message');
        
        if (!toast || !toastMessage) return;
        
        // Set message and type
        toastMessage.textContent = message;
        toast.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg ${
            type === 'error' ? 'bg-red-600' : 'bg-green-600'
        } text-white transition-opacity duration-300`;
        
        // Show toast
        toast.classList.remove('hidden');
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            toast.classList.add('opacity-0');
            setTimeout(() => toast.classList.add('hidden'), 300);
        }, 5000);
    };
}

// Form handling
function initForms() {
    // Handle login form
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(loginForm);
            
            try {
                // In a real app, this would be an API call
                // For now, we'll just show a success message
                showToast('Login successful!');
                
                // Redirect to dashboard after a short delay
                setTimeout(() => {
                    window.location.href = '/ticket-app/twig-app/public/dashboard';
                }, 1000);
            } catch (error) {
                showToast(error.message || 'Login failed', 'error');
            }
        });
    }
    
    // Handle ticket form
    const ticketForm = document.getElementById('ticket-form');
    if (ticketForm) {
        ticketForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(ticketForm);
            const ticketData = {
                title: formData.get('title'),
                description: formData.get('description'),
                status: formData.get('status'),
                priority: formData.get('priority')
            };
            
            try {
                // Check if we're updating or creating
                const isEdit = ticketForm.dataset.ticketId;
                
                if (isEdit) {
                    await TicketAPI.updateTicket(isEdit, ticketData);
                    showToast('Ticket updated successfully!');
                } else {
                    await TicketAPI.createTicket(ticketData);
                    showToast('Ticket created successfully!');
                    ticketForm.reset();
                }
                
                // Refresh tickets list
                if (window.loadTickets) {
                    window.loadTickets();
                } else {
                    // Redirect to tickets list if not already there
                    window.location.href = '/ticket-app/twig-app/public/tickets';
                }
            } catch (error) {
                showToast(error.message || 'Failed to save ticket', 'error');
            }
        });
    }
}

// Ticket list functionality
function initTickets() {
    // Only run on tickets page
    if (!document.getElementById('tickets-container')) return;
    
    // Load tickets when page loads
    window.loadTickets = async (status = null) => {
        try {
            const tickets = status 
                ? await TicketAPI.getTickets(status)
                : await TicketAPI.getTickets();
                
            renderTickets(tickets);
            updateActiveFilter(status);
        } catch (error) {
            showToast('Failed to load tickets', 'error');
            console.error(error);
        }
    };
    
    // Initial load
    window.loadTickets();
    
    // Handle filter clicks
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const status = button.dataset.filter === 'all' ? null : button.dataset.filter;
            window.loadTickets(status);
        });
    });
    
    // Handle delete button clicks
    document.addEventListener('click', async (e) => {
        if (e.target.classList.contains('delete-ticket')) {
            e.preventDefault();
            const ticketId = e.target.dataset.id;
            
            if (confirm('Are you sure you want to delete this ticket?')) {
                try {
                    await TicketAPI.deleteTicket(ticketId);
                    showToast('Ticket deleted successfully');
                    window.loadTickets();
                } catch (error) {
                    showToast('Failed to delete ticket', 'error');
                }
            }
        }
    });
}

// Dashboard functionality
function initDashboard() {
    // Only run on dashboard
    if (!document.getElementById('dashboard-stats')) return;
    
    const loadDashboardStats = async () => {
        try {
            const stats = await TicketAPI.getDashboardStats();
            
            // Update stats cards
            document.getElementById('total-tickets').textContent = stats.total;
            document.getElementById('open-tickets').textContent = stats.open;
            document.getElementById('in-progress-tickets').textContent = stats.in_progress;
            document.getElementById('closed-tickets').textContent = stats.closed;
            
            // Update progress bars (if any)
            const total = stats.total || 1; // Avoid division by zero
            document.documentElement.style.setProperty('--open-percent', `${(stats.open / total) * 100}%`);
            document.documentElement.style.setProperty('--in-progress-percent', `${(stats.in_progress / total) * 100}%`);
            document.documentElement.style.setProperty('--closed-percent', `${(stats.closed / total) * 100}%`);
            
        } catch (error) {
            console.error('Failed to load dashboard stats:', error);
        }
    };
    
    // Initial load
    loadDashboardStats();
}

// Helper functions
function renderTickets(tickets) {
    const container = document.getElementById('tickets-container');
    if (!container) return;
    
    if (tickets.length === 0) {
        container.innerHTML = `
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-600">No tickets found.</p>
            </div>
        `;
        return;
    }
    
    container.innerHTML = tickets.map(ticket => `
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-4 border-b border-gray-200">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">${escapeHtml(ticket.title)}</h3>
                        <p class="mt-1 text-sm text-gray-500">#${ticket.id} • ${formatDate(ticket.created_at)}</p>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${
                        getStatusBadgeClass(ticket.status)
                    }">
                        ${formatStatus(ticket.status)}
                    </span>
                </div>
                <p class="mt-2 text-sm text-gray-600">${truncate(escapeHtml(ticket.description), 100)}</p>
            </div>
            <div class="bg-gray-50 px-4 py-3 flex justify-end space-x-3">
                <a href="/ticket-app/twig-app/public/tickets/edit/${ticket.id}" 
                   class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit
                </a>
                <button type="button" 
                        class="delete-ticket inline-flex items-center px-3 py-1.5 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                        data-id="${ticket.id}">
                    Delete
                </button>
            </div>
        </div>
    `).join('');
}

function updateActiveFilter(activeFilter) {
    document.querySelectorAll('[data-filter]').forEach(button => {
        const filter = button.dataset.filter === 'all' ? null : button.dataset.filter;
        if (filter === activeFilter || (!filter && !activeFilter)) {
            button.classList.add('bg-indigo-100', 'text-indigo-700');
            button.classList.remove('text-gray-600', 'hover:bg-gray-100');
        } else {
            button.classList.remove('bg-indigo-100', 'text-indigo-700');
            button.classList.add('text-gray-600', 'hover:bg-gray-100');
        }
    });
}

function getStatusBadgeClass(status) {
    const classes = {
        'open': 'bg-green-100 text-green-800',
        'in_progress': 'bg-amber-100 text-amber-800',
        'closed': 'bg-gray-100 text-gray-800'
    };
    return classes[status] || 'bg-gray-100 text-gray-800';
}

function formatStatus(status) {
    return status
        .split('_')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join(' ');
}

function formatDate(dateString) {
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

function truncate(str, length) {
    return str.length > length ? str.substring(0, length) + '...' : str;
}

function escapeHtml(unsafe) {
    if (!unsafe) return '';
    return unsafe
        .toString()
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

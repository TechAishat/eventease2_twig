class TicketAPI {
    constructor(baseUrl = '') {
        this.baseUrl = baseUrl || `${window.location.origin}/ticket-app/twig-app/public/api`;
    }

    async request(endpoint, options = {}) {
        const url = `${this.baseUrl}${endpoint}`;
        const response = await fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            ...options
        });

        if (!response.ok) {
            const error = await response.json().catch(() => ({}));
            throw new Error(error.message || 'Something went wrong');
        }

        return response.json();
    }

    // Ticket operations
    async getTickets(status = null) {
        const endpoint = status ? `/tickets.php?status=${status}` : '/tickets.php';
        return this.request(endpoint);
    }

    async getTicket(id) {
        return this.request(`/tickets.php?id=${id}`);
    }

    async createTicket(ticketData) {
        return this.request('/tickets.php', {
            method: 'POST',
            body: JSON.stringify(ticketData)
        });
    }

    async updateTicket(id, ticketData) {
        return this.request(`/tickets.php?id=${id}`, {
            method: 'PUT',
            body: JSON.stringify(ticketData)
        });
    }

    async deleteTicket(id) {
        return this.request(`/tickets.php?id=${id}`, {
            method: 'DELETE'
        });
    }

    // Dashboard stats
    async getDashboardStats() {
        const [allTickets, openTickets, inProgressTickets, closedTickets] = await Promise.all([
            this.getTickets(),
            this.getTickets('open'),
            this.getTickets('in_progress'),
            this.getTickets('closed')
        ]);

        return {
            total: allTickets.length,
            open: openTickets.length,
            in_progress: inProgressTickets.length,
            closed: closedTickets.length
        };
    }
}

// Create a singleton instance
const api = new TicketAPI();

// Export for use in other files
if (typeof module !== 'undefined' && module.exports) {
    module.exports = api;
} else {
    window.TicketAPI = api;
}

# Modern Portfolio Website

A modern, containerized portfolio website built with Laravel (Backend) and Vue.js (Frontend) featuring Material Design elements.

## Technology Stack

- **Backend**: Laravel 10 (PHP 8.2)
- **Frontend**: Vue.js 3 with Material Design
- **Database**: MySQL 8.0
- **Server**: Nginx
- **Containerization**: Docker & Docker Compose

## Features

- Modern Material Design UI
- Responsive layout
- Portfolio projects showcase
- Skills and experience section
- Contact form
- Blog section
- Docker containerization for easy deployment
- CI/CD ready

## Prerequisites

- Docker
- Docker Compose
- Git

## Installation

1. Clone the repository:
\`\`\`bash
git clone [your-repo-url]
cd portfolio
\`\`\`

2. Copy the environment files:
\`\`\`bash
cp backend/.env.example backend/.env
cp frontend/.env.example frontend/.env
\`\`\`

3. Build and start the containers:
\`\`\`bash
docker-compose up -d --build
\`\`\`

4. Install backend dependencies:
\`\`\`bash
docker-compose exec backend composer install
docker-compose exec backend php artisan key:generate
docker-compose exec backend php artisan migrate
\`\`\`

5. Install frontend dependencies:
\`\`\`bash
docker-compose exec frontend npm install
\`\`\`

## Development

The application will be available at:
- Frontend: http://localhost:8080
- Backend API: http://localhost:80/api

## Project Structure

\`\`\`
portfolio/
├── backend/                # Laravel backend
├── frontend/              # Vue.js frontend
├── docker/                # Docker configuration files
│   └── nginx/            # Nginx configuration
├── docker-compose.yml    # Docker compose configuration
└── README.md            # Project documentation
\`\`\`

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

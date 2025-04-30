# Livewire Practice Blog

A simple blogging application built with the **TALL stack**:
- **T**ailwind CSS
- **A**lpine.js
- **L**aravel
- **L**ivewire

This project is containerized using **Docker** and runs via **Laravel Sail** for a streamlined local development experience.

## Features

- User authentication (login/logout)
- Create, edit, and delete articles
- Real-time validation with Livewire
- Responsive UI with Tailwind CSS
- Alpine.js for interactive components
- Docker-based development with Laravel Sail

## Tech Stack

- **Laravel** 11+
- **Livewire** 3.x
- **Tailwind CSS** 3.x
- **Alpine.js** 3.x
- **Docker** + **Laravel Sail**
- **MySQL** (via Docker)

## Installation

### Prerequisites

- Docker installed and running
- Composer (for setting up Laravel Sail)

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/mgiambro-dev/livewire-practice.git
cd livewire-practice
# 2. Install PHP dependencies
composer install

# 3. Copy the environment file and configure it
cp .env.example .env

# 4. Install Laravel Sail (if not already installed)
php artisan sail:install

# 5. Start the Sail containers
./vendor/bin/sail up -d

# 6. Run database migrations
./vendor/bin/sail artisan migrate

# 7. (Optional) Compile front-end assets
./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev

# Gamafia - Game Server Hosting Platform

Gamafia is a modern game server hosting platform built with Laravel 11. It provides a seamless experience for gamers to rent and manage high-performance game servers.

![Gamafia Dashboard](https://drive.google.com/uc?export=view&id=1Dj3T0e1aRjUcJEOoppiRi85ZT7qo9Ffq)

## 🚀 Features

-   **Modern UI/UX**: Built with Tailwind CSS and Alpine.js, featuring a dark mode, glassmorphism design, and responsive layout.
-   **User Dashboard**: Manage subscriptions, view invoices, and monitor server status.
-   **Admin Panel**: Powered by Filament, allowing easy management of games, packages, and users.
-   **Activity Logging**: Track all user and admin actions (Create, Update, Delete) for better security and auditing.
-   **Security**:
    -   **UUIDs**: User IDs are randomized UUIDs for enhanced security.
    -   **Session Isolation**: Admin and Client sessions are separated to prevent access conflicts.
    -   **Soft Deletes**: Games and Packages are safely archived instead of permanently deleted.
-   **Google Authentication**: Secure and quick login/registration via Google OAuth.
-   **Dynamic Pricing**: Flexible pricing models with premium location add-ons.
-   **Stock Management**: Real-time stock tracking for server packages.
-   **Payment Gateway Integration**: Supports QRIS, Virtual Accounts, and E-Wallets (simulated).
-   **Print-Friendly Invoices**: Professional, ink-friendly invoice printing.

## 🛠️ Tech Stack

-   **Framework**: [Laravel 12](https://laravel.com)
-   **Admin Panel**: [FilamentPHP](https://filamentphp.com)
-   **Frontend**: Blade, [Tailwind CSS](https://tailwindcss.com), [Alpine.js](https://alpinejs.dev)
-   **Database**: MySQL 8.0
-   **Cache/Queue**: Redis
-   **Logging**: Spatie Activitylog
-   **Containerization**: Docker & Docker Compose

## 📦 Installation

### Prerequisites

-   Docker & Docker Compose
-   Git

### Steps

1.  **Clone the Repository**

    ```bash
    git clone https://github.com/yourusername/gamafia.git
    cd gamafia
    ```

2.  **Setup Environment**
    Copy the example environment file and configure your credentials.

    ```bash
    cp .env.example .env
    ```

    _Note: Update `DB_PASSWORD`, `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET`, etc., in `.env`._

3.  **Start Docker Containers**

    ```bash
    docker compose up -d
    ```

4.  **Install Dependencies**
    Enter the PHP container to run composer commands:

    ```bash
    docker compose exec php-apache bash
    composer install
    npm install && npm run build
    ```

5.  **Generate Key & Migrate**
    Inside the container:

    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```

6.  **Access the Application**
    -   **Frontend**: [http://localhost:8085](http://localhost:8085)
    -   **Admin Panel**: [http://localhost:8085/admin](http://localhost:8085/admin)

## 🔑 Default Accounts

| Role      | Email               | Password   |
| :-------- | :------------------ | :--------- |
| **Admin** | `admin@gamafia.com` | `password` |
| **User**  | `user@example.com`  | `password` |

## 📝 Usage Guide

### For Users

1.  **Register/Login**: Use email or Google Sign-In.
2.  **Browse Games**: Visit the "Games" page to see supported titles.
3.  **Order Server**: Select a package, choose a payment method, and checkout.
4.  **Manage Server**: Go to the Dashboard to view active services and invoices.

### For Admins

1.  **Login**: Access `/admin` with admin credentials.
2.  **Manage Games**: Add new games, upload images, and set descriptions.
3.  **Manage Packages**: Create hosting packages, set prices, stock, and specifications.
4.  **Monitor Orders**: View and manage user subscriptions and payments.

## 🤝 Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

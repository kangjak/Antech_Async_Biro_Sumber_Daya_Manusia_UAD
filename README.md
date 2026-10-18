<div align="center">

# ANTECH ASYNC

### Human Resource Management System
**Biro Sumber Daya Manusia — Universitas Ahmad Dahlan**

*Smarter Administration. Better Organization. Connected Workforce.*

<br>

![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-8-646CFF?style=for-the-badge&logo=vite&logoColor=white)

<br>

**ANTECH** — Advance Network & Technology  
**ASYNC** — Asynchronous System & Network Computing

[Overview](#-overview) •
[Modules](#-core-modules) •
[Tech Stack](#-technology-stack) •
[Installation](#-installation) •
[Development](#-development-workflow)

</div>

---

## 📌 Overview

**Antech Async** is a web-based Human Resource Management System (HRMS) project designed to support human resource administration within the **Biro Sumber Daya Manusia, Universitas Ahmad Dahlan (UAD)**.

The project aims to organize employee-related information and administrative processes through a centralized information system. By structuring HR data into interconnected modules, Antech Async provides a foundation for more organized, consistent, and maintainable human resource management.

Developed with Laravel and a relational database, the project emphasizes structured application development, data relationships, and collaborative software engineering.

### 🎯 Project Objectives

- **Centralized HR Data** — Organize employee information and related administrative records.
- **Administrative Efficiency** — Establish a structured foundation for managing HR workflows.
- **Data Consistency** — Maintain relationships between employees, organizational units, requests, and other HR records.
- **Maintainable Architecture** — Organize application logic, database migrations, models, and seeders using Laravel conventions.
- **Collaborative Development** — Support team development through Git and GitHub workflows.

---

## 🧩 Core Modules

The project database and application structure cover several human resource management domains.

| Module | Description |
|---|---|
| 🏢 Organizational Units | Organize bureaus, directorates, centers, and other organizational units. |
| 👥 Employee Management | Structure employee records and organizational relationships. |
| 🔐 User Management | Manage application users and their associated accounts. |
| 📢 Recruitment | Organize job vacancy and application records. |
| 📝 Employee Requests | Structure employee requests and request categories. |
| 🌴 Leave Management | Organize leave balances and employee leave requests. |
| 🗓️ Work Schedules | Manage employee work schedule records. |
| 📈 Performance Evaluation | Structure employee performance assessments. |
| 🏅 Rank & Career Development | Organize employee rank history and development records. |
| 🩺 Employee Benefits | Maintain employee BPJS-related records. |
| 📋 Activity Logging | Provide a data structure for recording application activities. |

> **Development note:** The modules above describe the HR domains represented in the project's data structures. Their implementation status and available user-facing functionality may differ as development progresses.

---

## 🛠️ Technology Stack

Antech Async uses the following technologies and development tools.

| Technology | Purpose |
|---|---|
| [Laravel 13](https://laravel.com/) | Backend application framework |
| [PHP 8.3+](https://www.php.net/) | Server-side programming language |
| [MySQL](https://www.mysql.com/) | Relational database management |
| [Vite](https://vite.dev/) | Frontend asset development and bundling |
| [Tailwind CSS 4](https://tailwindcss.com/) | Utility-first CSS framework |
| [Composer](https://getcomposer.org/) | PHP dependency management |
| [Node.js & npm](https://nodejs.org/) | JavaScript tooling and frontend dependencies |
| [Git](https://git-scm.com/) | Version control |
| [GitHub](https://github.com/) | Repository hosting and team collaboration |
| [DBML](https://dbml.dbdiagram.io/) | Database schema documentation |

### Development Architecture

The repository follows Laravel's application structure, separating important components into dedicated directories.

```text
Antech_Async_Biro_Sumber_Daya_Manusia_UAD/
├── app/
│   └── Models/              # Eloquent models and relationships
├── bootstrap/               # Application bootstrap
├── config/                  # Application configuration
├── database/
│   ├── factories/           # Model factories for test data
│   ├── migrations/          # Database schema migrations
│   ├── seeders/             # Database seeding
│   └── antech.dbml          # Database schema documentation
├── docs/                    # Project documentation
├── public/                  # Public assets and entry point
├── resources/               # Application views and frontend resources
├── routes/                  # Application route definitions
├── tests/                   # Automated tests
├── composer.json            # PHP dependencies and scripts
├── package.json             # Frontend dependencies and scripts
└── README.md                # Project documentation
```

---

## ⚙️ Installation

Follow these steps to set up Antech Async in a local development environment.

### Prerequisites

Make sure the following tools are installed:

- PHP **8.3 or later**, with the required PHP extensions.
- Composer.
- MySQL.
- Node.js and npm.
- Git.

### 1. Clone the Repository

```bash
git clone https://github.com/kangjak/Antech_Async_Biro_Sumber_Daya_Manusia_UAD.git

cd Antech_Async_Biro_Sumber_Daya_Manusia_UAD
```

### 2. Install Dependencies

Install the PHP dependencies:

```bash
composer install
```

Install the frontend dependencies:

```bash
npm install
```

### 3. Configure the Environment

Create a local environment configuration file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

### 4. Configure the Database

Create a MySQL database for the project, then update the database configuration in `.env`.

Example:

```env
APP_NAME="Antech Async"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Antech_Async
DB_USERNAME=root
DB_PASSWORD=
```

Adjust the database credentials to match your local MySQL configuration.

**Important:** Never commit your `.env` file or expose database credentials in the repository.

### 5. Run Database Migrations

After configuring the database, execute:

```bash
php artisan migrate
```

This creates the database tables defined by the project's migrations.

### 6. Build Frontend Assets

For development:

```bash
npm run dev
```

Alternatively, build the frontend assets:

```bash
npm run build
```

### 7. Start the Application

Open a new terminal and run:

```bash
php artisan serve
```

Visit the following address in your browser:

**http://127.0.0.1:8000**

> **Note:** These instructions cover the basic local setup. Database seeders, authentication flows, and other application-specific requirements may need additional configuration depending on the current implementation.

---

## 🗄️ Database Development

Database structure is an important part of Antech Async.

The project includes a DBML schema file:

```text
database/antech.dbml
```

This file documents the database design and can be used as a reference when developing or reviewing database relationships.

### Database Migrations

Migrations define the database schema and allow changes to be tracked through version control.

```bash
php artisan migrate
```

### Model Factories & Seeders

The project also includes model factories and seeders for generating development data.

These components can support:

- Testing model relationships.
- Populating development databases.
- Preparing sample data for application development.
- Evaluating application behavior with larger datasets.

**Recommendation:** Review the configured seeders before running `php artisan db:seed`, particularly when working with large datasets or an existing database.

---

## 🔄 Development Workflow

Antech Async is developed collaboratively using Git and GitHub.

To keep the development process organized, contributors should work on dedicated branches and submit changes through Pull Requests.

### 1. Check the Current Branch

```bash
git status
git branch
```

### 2. Create a Feature Branch

Start from an updated base branch:

```bash
git switch main
git pull origin main
git switch -c feature/your-feature-name
```

Replace `your-feature-name` with a short description of your changes.

> If the team uses another designated development branch, follow the team's branching policy instead of `main`.

### 3. Commit Your Changes

```bash
git add .
git commit -m "feat: describe your changes"
```

Use a descriptive commit message that reflects the changes.

Examples:

```text
feat: add employee management model
fix: correct employee unit relationship
docs: update project README
refactor: improve database factories
```

### 4. Push Your Branch

```bash
git push -u origin feature/your-feature-name
```

### 5. Open a Pull Request

Create a Pull Request on GitHub to propose merging your branch into the designated base branch.

Before submitting, make sure your changes are relevant, properly tested, and do not unintentionally overwrite another contributor's work.

---

## 🧪 Testing

Laravel provides an integrated testing environment.

Run the project's automated tests with:

```bash
php artisan test
```

Tests should be run against an appropriately configured testing environment.

When developing new features, contributors are encouraged to add tests for important business logic, data validation, and model relationships.

---

## 🚧 Project Status

**Status: In Development**

Antech Async is an ongoing software development project.

Its application modules, database structure, and supporting documentation may evolve as the team implements and refines the system.

Contributions and improvements should follow the repository's development workflow.

---

## 🤝 Contributing

Contributions from project team members are essential to improving Antech Async.

To contribute:

1. Review the existing code and database structure.
2. Create a dedicated feature or fix branch.
3. Make focused, maintainable changes.
4. Test your changes where applicable.
5. Submit a Pull Request for review.

Please avoid committing environment secrets, unnecessary generated files, or unrelated changes.

---

## 🎓 Project Context

Antech Async is developed in the context of the **Biro Sumber Daya Manusia, Universitas Ahmad Dahlan**.

The project brings together database design, web application development, and collaborative software engineering practices to establish a structured foundation for human resource information management.

---

<div align="center">

### ANTECH ASYNC

**Advance Network & Technology**  
**Asynchronous System & Network Computing**

*Building a more organized approach to human resource information management.*

</div>

# Project Setup Instructions

Follow these steps to set up and use the project. All steps are presented in a straightforward way for easy understanding.

---

## Prerequisites

<p>
<strong>Docker:</strong> Make sure Docker is installed on your system.<br>
<strong>Composer:</strong> Install Composer for PHP dependency management.
</p>

---

## Steps for Setting Up

### 1. Clone the Project

<p>
Clone the repository to your local machine:
</p>

```bash
git clone &lt;your_project_repo_url&gt;
```

### 2. Navigate to the Project Directory

<p>
Change to the cloned project directory:
</p>

```bash
cd &lt;project_directory_name&gt;
```

### 3. Install Dependencies

<p>
Use Composer to install all PHP dependencies:
</p>

```bash
composer install
```

### 4. Build and Start Docker Containers

<p>
Build and run the containers using Docker Compose:
</p>

```bash
docker compose up --build
```

### 5. Database Migration and Seeding

<p>
Run migrations and seed the database with initial data:
</p>

```bash
docker exec -it translationstask-app-1 php artisan migrate:fresh --seed
```

### 6. Import API Collection

<p>
Open <strong>Postman</strong> or <strong>Swagger UI</strong> and import the API collection from the <code>openapi.json</code> file provided in the project.
</p>

### 7. Authenticate and Use API

<p>
Go to the login endpoint in your API client (Postman/Swagger).<br>
Enter valid user credentials to obtain an authentication token.<br>
Use this token as a <strong>Bearer Token</strong> for all other API endpoints, as it is required for authorization.
</p>

---

<p>
<strong>Note:</strong><br>
All instructions are kept simple and direct for quick setup and usage.<br>
Refer to the comments in <code>setup_instructions.php</code> for a code-based summary of these instructions.
</p>

<?php
/*
============================== Project Setup Instructions ==============================
This file provides a step-by-step guide for setting up the project. All instructions are
included here in comments under clear headings, without breaking the file structure.

---------------------------------------------------------------------------------------
Prerequisites:
---------------------------------------------------------------------------------------
- Docker (must be installed)
- Composer (must be installed)

---------------------------------------------------------------------------------------
Cloning the Project:
---------------------------------------------------------------------------------------
1. Clone the project repository to your local machine.
   Example:
   git clone <your_project_repo_url>

2. Move into the project directory:
   cd <project_directory_name>

---------------------------------------------------------------------------------------
Installing Dependencies:
---------------------------------------------------------------------------------------
3. Run the following command to install all PHP dependencies:
   composer install

---------------------------------------------------------------------------------------
Building and Running Containers:
---------------------------------------------------------------------------------------
4. Build and start the Docker containers:
   docker compose up --build

---------------------------------------------------------------------------------------
Migrating and Seeding the Database:
---------------------------------------------------------------------------------------
5. Run the migration and seeding command:
   docker exec -it translationstask-app-1 php artisan migrate:fresh --seed

---------------------------------------------------------------------------------------
Testing API Endpoints:
---------------------------------------------------------------------------------------
6. Open Postman or Swagger UI.

7. Import the API collection using the openapi.json file provided in the project.

8. Authenticate:
   - Use the login endpoint to get a token.
   - Use valid user credentials to login.

9. Use the token obtained as a Bearer Token for all other API endpoints.
   - The token is required for accessing other APIs.

=======================================================================================
*/
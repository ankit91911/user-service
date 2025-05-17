# User Service

This service provides API endpoints for managing users.

## Technology Stack

* **Backend Framework:** Laravel
* **Database:** MySQL

## Database Configuration

* **Database Name:** `user_service_db`
* Ensure that your MySQL server is running and you have configured the database connection details in your Laravel `.env` file.

## API Endpoints

### 1. Register User

* **Endpoint:** `POST /api/users`
* **Description:** Registers a new user.
* **Request Body (JSON):**
    ```json
    {
        "name": "User Name",
        "email": "user@example.com",
        "password": "securepassword",
        "role": "student"
    }
    ```
    * `name`: (string, required) The name of the user.
    * `email`: (string, required, unique) The email address of the user. Must be a valid email format.
    * `password`: (string, required, min:8) The password for the user. Minimum 8 characters.
    * `role`: (string, required) The role of the user. Allowed values: `student`, `teacher`.

* **Response (JSON - Success):**
    ```json
    {
        "id": 3,
        "name": "User Name",
        "email": "user@example.com",
        "role": "student",
        "created_at": "2025-05-18T06:30:00.000000Z",
        "updated_at": "2025-05-18T06:30:00.000000Z"
    }
    ```

    {
        "message": "The email field must be a valid email address.",
        "errors": {
            "name": [
                "The name field is required."
            ],
            "email": [
                "The email field is required.",
                "The email field must be a valid email address.",
                "The email has already been taken."
            ],
            "password": [
                "The password field is required.",
                "The password must be at least 8 characters."
            ],
            "role": [
                "The role field is required.",
                "The selected role is invalid."
            ]
        }
    }
    ```

### 2. List Users

* **Endpoint:** `GET /api/users`
* **Description:** Retrieves a list of all users.
* **Request Parameters:** None
* **Response (JSON - Success):**
    ```json
    [
        {
            "id": 1,
            "name": "John Doe",
            "email": "john.doe@example.com",
            "role": "teacher",
            "created_at": "2025-05-18T06:25:00.000000Z",
            "updated_at": "2025-05-18T06:25:00.000000Z"
        },
        {
            "id": 2,
            "name": "Jane Smith",
            "email": "jane.smith@example.com",
            "role": "student",
            "created_at": "2025-05-18T06:26:00.000000Z",
            "updated_at": "2025-05-18T06:26:00.000000Z"
        }
        // ... more users
    ]
    ```

## Setup Instructions

1.  **Clone the repository:**
    ```bash
    git clone <repository-url>
    cd <repository-name>
    ```

2.  **Install Composer dependencies:**
    ```bash
    composer install
    ```

3.  **Copy the `.env.example` file to `.env` and configure your database connection details:**
    ```bash
    cp .env.example .env
    ```
    Edit the `.env` file with your MySQL database credentials:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=user_service_db
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

4.  **Generate the application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Run database migrations:**
    ```bash
    php artisan migrate
    ```

6.  **Start the Laravel development server:**
    ```bash
    php artisan serve --port=8001
    ```
    The API will be accessible at `http://127.0.0.1:8001/api`.

## Usage

You can use tools like Postman, Insomnia, or `curl` to interact with the API endpoints.

**Example using `curl`:**

* **Register a new user:**
    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"name": "Alice Johnson", "email": "alice.j@example.com", "password": "password123", "role": "student"}' [http://127.0.0.1:8001/api/users](http://127.0.0.1:8001/api/users)
    ```

* **List all users:**
    ```bash
    curl [http://127.0.0.1:8001/api/users](http://127.0.0.1:8001/api/users)
    ```

## Further Development

This is a basic implementation of the User Service. Potential future enhancements could include:

* **Retrieving a specific user by ID:** Implementing a `GET /api/users/{id}` endpoint.
* **Updating user information:** Implementing a `PUT /api/users/{id}` endpoint.
* **Deleting users:** Implementing a `DELETE /api/users/{id}` endpoint.
* **Password hashing:** Ensuring secure storage of user passwords (Laravel's default authentication handles this).
* **Authentication and Authorization:** Implementing login functionality and protecting endpoints based on user roles.
* **Password reset functionality:** Allowing users to reset their passwords.
* **Email verification:** Verifying user email addresses upon registration.
* **Pagination for listing users:** Handling a large number of users efficiently.
* **Filtering and searching users:** Allowing administrators to query users based on criteria.
* **Unit and integration tests:** Ensuring the reliability of the service.
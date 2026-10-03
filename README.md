# Zruyc – Forum & Discussion Website

**Course:** Web Programming  
**Major:** Informatics and Applied Mathematics  
**Lecturer:** L. Tsaturyan  

## Colaborators
This project is developed collaboratively by a team of two students:
*   **Ani Tamrazyan** – **Client-Side (Frontend):** Responsible for UI/UX, responsive design, and DOM manipulation using **HTML, CSS, and JavaScript**.
*   **Vazgen Gasparyan** – **Server-Side (Backend):** Responsible for server logic, authentication, and database management using **Pure PHP and MySQL**.

## Technology Stack
*   **Frontend:** HTML5, CSS3, Vanilla JavaScript
*   **Backend:** Pure PHP (No frameworks)
*   **Database:** MySQL
*   **Server Environment:** LAMP / XAMPP / WAMP stack

## Project Features
Based on the assignment requirements, the system implements the following access controls:
*   **Guest Users (Unauthenticated):** Can view all discussion topics and read comments.
*   **Registered Users (Authenticated):** Can register, log in, create new discussion topics, and post comments on existing topics.

---

## Step-by-Step Installation Instructions

Follow these steps to run the project locally on your machine.

### Step 1: Prerequisites
You need a local server environment to run PHP and MySQL. 
1. Download and install **XAMPP**, **LAMP**, or an equivalent web server stack.
2. Ensure your **Apache** web server and **MySQL** database service are active.

### Step 2: Project Setup
1. Clone this repository or move the project folder into your local web server's root directory:
   * For Linux (LAMP / Apache): `/var/www/html/zruyc`
   * For XAMPP: `C:/xampp/htdocs/zruyc`
   * For WAMP: `C:/wamp/www/zruyc`

### Step 3: Database Configuration
1. Open your browser and navigate to `http://localhost/phpmyadmin`.
2. Click on **New** to create a new database named `zruyc_db`.
3. Import the database tables:
   * Select `zruyc_db` and go to the **Import** tab in phpMyAdmin.
   * Choose the `database.sql` file located in the project root folder.
   * Click **Import** to create the necessary tables (`users`, `topics`, `comments`).
4. Alternatively, execute the following SQL script directly:

```sql
CREATE DATABASE IF NOT EXISTS zruyc_db;
USE zruyc_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE topics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topic_id INT NOT NULL,
    user_id INT NOT NULL,
    comment_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (topic_id) REFERENCES topics(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
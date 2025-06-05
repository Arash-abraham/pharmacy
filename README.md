# 📝 AnimeHub

Welcome to **AnimeHub Blog**! This project is a robust and engaging web application built for anime enthusiasts to explore, share, and discuss everything related to the world of anime. Whether you want to read insightful reviews, discover new series, or share your own thoughts, AnimeHub Blog provides a dedicated platform for the anime community.

---

## ✨ Features

* **User Authentication:** Secure user registration, login, and logout.
* **Comments:** Engage with content by leaving comments on blog posts.
* **Search Functionality:** Quickly find specific anime blogs or topics.
* **Responsive Design:** Enjoy a seamless Browse experience on any device.
* **Admin Panel (Optional):** Manage users, posts, and comments (if implemented).

---

## 🛠️ Technologies Used

* **Backend:** PHP (Laravel Framework)
* **Database:** MySQL
* **Frontend:** HTML , CSS , JavaScript , Tailwind CSS
* **Package Management:** Composer (for PHP), npm/Yarn (for JavaScript)
* **Version Control:** Git

---

## 🚀 Getting Started

Follow these steps to get your local copy of AnimeHub Blog up and running.

### Prerequisites

Before you begin, ensure you have the following installed on your system:

* **PHP** (>= 8.1 recommended)
* **Composer**
* **Node.js** & **npm** (or Yarn)
* **MySQL Server**
* **Git**

### Installation Steps

1.  **Clone the Repository:**
    ```bash
    git clone [https://github.com/arash-abraham/AnimeHub.git](https://github.com/arash-abraham/AnimeHub.git)
    cd AnimeHub
    ```

2.  **Install PHP Dependencies:**
    ```bash
    composer install
    ```

3.  **Set Up Environment Variables:**
    * Duplicate the `.env.example` file and rename it to `.env`:
        ```bash
        cp .env.example .env
        ```
    * Generate an application key:
        ```bash
        php artisan key:generate
        ```
    * Open the `.env` file and configure your **database connection**:
        ```dotenv
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=animehub_blog # Choose your database name
        DB_USERNAME=root          # Your MySQL username
        DB_PASSWORD=              # Your MySQL password
        ```

4.  **Run Database Migrations:**
    This will create the necessary tables in your database.
    ```bash
    php artisan migrate
    ```
    (Optional: If there are seeders for initial data, run `php artisan db:seed`)

5.  **Install Node.js Dependencies:**
    ```bash
    npm install
    # OR
    yarn install
    ```

6.  **Compile Frontend Assets:**
    ```bash
    npm run dev
    # OR for production build
    # npm run build
    ```

7.  **Start the Local Development Server:**
    ```bash
    php artisan serve
    ```

8.  **Access the Application:**
    Open your web browser and visit the URL displayed in your terminal (e.g., `http://127.0.0.1:8000`).

---

## ☎️ Contact

Created by Arash Abraham - feel free to reach out!


---

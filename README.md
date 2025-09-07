# Dev Journal
This project is an enhanced blogging platform called **DevJournal**, built with authentication and role-based access control. It allows administrators, content creators, and readers to interact with the platform in different ways. The system provides secure authentication, middleware-based access restrictions, post and category management, and a feature-rich admin dashboard.

---

## Features 

### Authentication & Role Management
- **Guards for different user types:**
  - **Admin** – Full access to all features, including user management.
  - **Creator** – Can manage posts and categories.
  - **Reader/User** – Can browse and read posts.
- **Middleware restrictions** ensure only authorized roles can access specific areas.

### Content Management
- Post Management (create, edit, delete, publish)  
- Category Management (create, edit, delete)  

### Admin Dashboard
- **Statistics overview:**
  - Total posts, categories, users, and comments  
- **Quick action buttons** for common tasks (e.g., add new post/category)  
- **User management interface** for administrators  

---

## Technologies Used
- Laravel  
- PHP  
- MySQL  
- Blade  
- Tailwind CSS  
- Laravel Guards & Middleware  

---

##  How to Run the Project

1. Clone the repository:  
   git clone https://github.com/manchuriqbal/DevJournal  
   cd blog-template  

2. Install dependencies:  
   composer install  
   npm install && npm run dev  

3. Set up environment file:  
   cp .env.example .env  
   php artisan key:generate  

4. Run migrations and seed demo data:  
   php artisan migrate --seed  

5. Start the development server:  
   php artisan serve  

6. Visit the project in your browser:  
   http://127.0.0.1:8000  

---

##  Usage

- Visit http://localhost:8000
- Log in as:
  - Admin – Manage everything including users.
  - Author – Can post and manage posts and categories by himself.
  - Reader – Browse published posts.

---

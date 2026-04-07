# How to Run This Website on Another Computer

## 1. Dependencies to Install

You need **two main dependencies** on the other computer:

### A. PHP (version 7.4 or higher)
- **Windows:** Download from https://windows.php.net/download/
- **Mac:** `brew install php` or use MAMP
- **Linux:** `sudo apt install php php-mysqli php-mbstring php-xml` (Ubuntu/Debian)

### B. MySQL or MariaDB (database server)
- **Windows:** Install XAMPP (includes PHP + MySQL) from https://www.apachefriends.org/
- **Mac:** Use MAMP or `brew install mysql`
- **Linux:** `sudo apt install mysql-server` (Ubuntu/Debian)

---

## 2. Optional: Composer (for PDF export)
If you need PDF export features, install Composer and run:
```
composer install
```

---

## 3. Steps to Run on the Other Computer

### Step 1: Copy the project folder
Copy the entire `recruitmentnewdesign-master` folder to the other computer.

### Step 2: Create the database
1. Open MySQL (via phpMyAdmin, MySQL Workbench, or command line)
2. Create a database named `recruitment`:
   ```sql
   CREATE DATABASE recruitment CHARACTER SET utf8 COLLATE utf8_general_ci;
   ```
3. Import your database tables (if you have a `.sql` backup file)

### Step 3: Configure the database
Edit `application/config/database.php` and set:
- `hostname` – usually `localhost`
- `username` – your MySQL username (e.g. `root`)
- `password` – your MySQL password
- `database` – `recruitment`

### Step 4: Set the base URL
Edit `application/config/config.php` and set `base_url`:
- **PHP built-in server:** `http://localhost:8080/`
- **XAMPP in htdocs:** `http://localhost/recruitmentnewdesign-master/`

### Step 5: Run the website

**Option A – PHP built-in server (simplest):**
```bash
cd recruitmentnewdesign-master
php -S localhost:8080 -t . router.php
```
Then open: **http://localhost:8080**

**Option B – XAMPP:**
1. Copy the project folder to `C:\xampp\htdocs\`
2. Start Apache and MySQL in XAMPP Control Panel
3. Set `base_url` in config to `http://localhost/recruitmentnewdesign-master/`
4. Open: **http://localhost/recruitmentnewdesign-master**

---

## 4. Quick Checklist

| Item | Required |
|------|----------|
| PHP 7.4+ | Yes |
| MySQL/MariaDB | Yes |
| PHP mysqli extension | Yes |
| Composer + dompdf | Optional (for PDF) |

---

## 5. Troubleshooting

- **"Database Error"** → Check database credentials in `application/config/database.php`
- **404 on pages** → Ensure you use `router.php` when running PHP built-in server
- **Blank page** → Check `application/logs/` for error messages

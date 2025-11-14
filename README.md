# 🏭 Warehouse Management System (WMS)

A modern and secure **warehouse management system** built with **Laravel**. The system provides a complete solution for warehouse operations including category management, user authorization, product tracking, detailed reporting, and more.

---

## 🚀 Features

### 🔐 Built with Laravel
This project is developed using the Laravel framework, offering:
- **High security** (CSRF, XSS, SQL injection protection)
- **Clean and structured MVC architecture**
- **Eloquent ORM for secure and fast database operations**
- **Powerful authorization & access control through middleware**
- **Blade template engine for efficient frontend development**
- **Laravel Scheduler for automated task scheduling**
- **Queue system for high‑performance background jobs**
- **Integrated logging and error handling**
- **Modular and easily extendable structure**

---

## 🗂️ Category & Subcategory Management
- Unlimited category creation
- Ability to add subcategories to each category
- Update and delete categories/subcategories
- Automatic category hierarchy handling
- Product filtering by category/subcategory

---

## 📦 Product Management
- Add / edit / delete products
- Upload multiple product images
- Product description, barcode, stock code, SKU, and more
- Stock in/out tracking
- Product variants (color, size, etc.)
- Product history (who added/edited and when)
- Assign products to categories/subcategories
- Product detail page includes:
  - Image gallery
  - Technical specifications
  - Stock movement history
  - Log records

---

## 👥 User Management
- Add / edit / delete users
- Role‑based authorization system
- User activity logging
- Custom permissions (e.g., can view products but cannot edit categories)
- Control panel access restrictions

---

## 🛡️ Super Admin Features
- Full access across the entire system
- Create / edit / delete roles
- Manage permission matrix
- Configure system settings
- Trigger backup operations
- View user logs

---

## 🖼️ Advanced Image Management
- Unlimited images per product
- Automatic image resizing
- Auto‑generated thumbnails
- Drag‑and‑drop image sorting
- Add description to each image
- Watermark (optional)
- Store both original and optimized versions

---

## 📊 Reports & Analytics
- Stock level report
- Most active products
- Out‑of‑stock items
- Stock distribution by category
- Daily / weekly / monthly stock movement reports
- Export reports as PDF or Excel

---

## 🔄 Stock Movements
- Stock in/out operations
- Add notes to stock operations
- Filter by warehouse operator
- Automatic logging of all actions
- Critical stock alerts

---

## 💾 Backup & System Administration
- Manual or automated database backups
- Store backups locally or on cloud storage
- View system error logs
- Enable/disable maintenance mode

---

## 🔧 Additional Technical Features
- RESTful API (optional)
- API security with JWT / Sanctum
- Docker‑ready architecture
- Easy configuration via `.env`
- Multi‑language support (English/Turkish)
- Fully responsive admin panel

---

## 🛠️ Installation

```bash
git clone https://github.com/osmanvarisli/warehouse_v1.git
cd warehouse_v1
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

---

## 📣 Contributing
You are welcome to submit pull requests, open issues, or share improvement ideas.

---

## 📜 License
This project is licensed under the MIT License.

---


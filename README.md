# YipMart - E-commerce Case Study

**Submission for PHP Full Stack Developer Position at YipOnline**

A clean, modern, and fully functional e-commerce platform built with Laravel 13, designed to closely match the YIP Framework's modular structure and requirements.

![YipMart Banner](https://via.placeholder.com/800x300/FF6600/FFFFFF?text=YipMart+-+African+Marketplace)

## ✨ Project Overview

YipMart is a complete e-commerce solution developed as the official case study for the YipOnline PHP Full Stack Developer role. It demonstrates strong Laravel skills, clean architecture, and attention to the company's African business focus.

### Key Features Implemented
- ✅ Responsive Product Listing & Detail Pages (African-themed products)
- ✅ Full Shopping Cart (add, update quantity, remove, calculate total)
- ✅ Complete Checkout Flow with shipping details
- ✅ User Registration & Login (Laravel Breeze)
- ✅ Order Creation & Storage
- ✅ **Admin Dashboard** – View all orders, see details, and update order status
- ✅ Mobile-responsive design using Tailwind CSS + DaisyUI
- ✅ Paystack payment simulation (Nigerian/African touch)
- ✅ Modular structure using `nwidart/laravel-modules`

## 🛠 Tech Stack

- **Laravel 13** (Latest as of April 2026)
- **PHP 8.3+**
- **Tailwind CSS 4 + DaisyUI**
- **MySQL / SQLite**
- **Laravel Modules** – Mimics the modular YIP Framework
- **Session-based Cart**
- **Blade Templating** (ready for Smarty conversion)

## 🚀 Quick Setup

```bash
# Clone the repository
git clone https://github.com/barc30881/yipmart-ecommerce-yiponline-case-study.git
cd yipmart-ecommerce-yiponline-case-study

# Install dependencies
composer install
npm install && npm run build

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run module migrations and seed data
php artisan module:migrate-refresh YipEcommerce
php artisan module:seed YipEcommerce

# Start the server
php artisan serve
🔑 Login Credentials
Admin Dashboard:
Email: admin@yiponline.com
Password: password123
URL: /admin/orders
Regular User: Register normally at /register

🔗 Live Demo & Links
Live Demo: [Add your Render URL here after deployment]
GitHub Repository: [Current repo]
Video Walkthrough: [Add your Loom video link here]
🎯 Alignment with YIP Framework
Built using Laravel structure as requested in the JD
Uses modular architecture (Modules/YipEcommerce/) — very close to the custom YIP Framework
Clean separation of concerns (Controllers, Models, Services)
Easy to adapt Blade views to Smarty templating
Follows modern PHP best practices (validation, security, performance)
📋 Case Study PDF
Full detailed case study with screenshots and explanations is available in the repository as YipMart_Case_Study_[YourName].pdf

Built with passion for African businesses scaling at speed.

Thank you for reviewing my submission. I’m excited about the opportunity to contribute to YipOnline and bring clean, maintainable, production-ready code to the team.

Made for YipOnline – April 2026
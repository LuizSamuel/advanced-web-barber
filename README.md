# Advanced Web Barber

[![GitHub stars](https://img.shields.io/github/stars/LuizSamuel/advanced-web-barber?style=for-the-badge)](https://github.com/LuizSamuel/advanced-web-barber/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/LuizSamuel/advanced-web-barber?style=for-the-badge)](https://github.com/LuizSamuel/advanced-web-barber/network/members)
[![GitHub issues](https://img.shields.io/github/issues/LuizSamuel/advanced-web-barber?style=for-the-badge)](https://github.com/LuizSamuel/advanced-web-barber/issues)
[![GitHub pull requests](https://img.shields.io/github/issues-pr/LuizSamuel/advanced-web-barber?style=for-the-badge)](https://github.com/LuizSamuel/advanced-web-barber/pulls)
[![License](https://img.shields.io/github/license/LuizSamuel/advanced-web-barber?style=for-the-badge)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=for-the-badge&logo=php)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap)](https://getbootstrap.com)
[![Status](https://img.shields.io/badge/Status-Production%20Ready-00C853?style=for-the-badge)]()

<br>

<p align="center">
  <strong>A complete PHP & MySQL web platform for barber shop, grooming services, and appointment management.</strong>
</p>

<p align="center">
  <a href="#features">Features</a> •
  <a href="#tech-stack">Tech Stack</a> •
  <a href="#project-structure">Structure</a> •
  <a href="#installation">Installation</a> •
  <a href="#screenshots">Screenshots</a> •
  <a href="#license">License</a>
</p>

<br>

## Overview

Advanced Web Barber is a full-featured barber shop management web application built for service-based businesses. It combines a public-facing storefront with a secure admin backend, providing a seamless experience for customers and complete control for administrators.

The system supports:

- Barber shop and grooming services
- Appointment booking and management
- Product catalog and online shopping
- User authentication and session management
- Shopping cart and checkout flow
- Admin content management

<br>

## Features

### Customer Features

| Module | Description |
|--------|-------------|
| Home Page | Brand introduction, featured services and products |
| About Us | Business story, team, and contact information |
| Services Pages | Dedicated pages for barber and grooming services |
| Online Shop | Product listings with dynamic database integration |
| Shopping Cart | Add/remove items, update quantities, view totals |
| Checkout | Customer details, order summary, payment flow |
| User Authentication | Secure registration and login with password validation |
| Appointment Booking | Schedule barber appointments online |

### Admin Features

| Module | Description |
|--------|-------------|
| Admin Login | Separate secure authentication for administrators |
| Admin Dashboard | Overview of appointments, orders, users, and metrics |
| Appointment Management | View, confirm, cancel, or reschedule bookings |
| Product Management | Add, edit, or remove products from the catalog |
| Content Management | Update service descriptions and business information |
| Database Management | Direct integration with MySQL backend |

<br>

## Tech Stack

| Layer | Technology |
|-------|------------|
| Backend | PHP 7.4+ |
| Database | MySQL 8.0+ |
| Frontend | HTML5, CSS3, JavaScript |
| UI Framework | Bootstrap 5.3 |
| Server | Apache / XAMPP / WAMP |

<br>

## Project Structure

```text
advanced-web-barber/
│
├── index.php                 # Home page
├── aboutus.php               # About the business
├── services.php              # Barber services page
├── appointment.php           # Appointment booking
├── shop.php                  # Online shop catalog
├── cart.php                  # Shopping cart
├── checkout.php              # Checkout process
├── login.php                 # Customer login
├── register.php              # Customer registration
│
├── admin/                    # Admin panel
│   ├── index.php             # Admin dashboard
│   ├── appointments.php      # Manage appointments
│   ├── products.php          # Manage products
│   ├── phpincludes/          # Admin backend logic
│   └── databases/            # Database connection files
│
├── partials/                 # Reusable components (header, footer, nav)
├── images/                   # Product and service images
├── css/                      # Custom stylesheets
├── js/                       # Client-side JavaScript
│
└── admin/databases/barber_db.sql  # Database schema

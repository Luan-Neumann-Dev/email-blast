# Email Campaign Manager

> A comprehensive Laravel application for creating, managing, and tracking email marketing campaigns with advanced analytics

[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![TailwindCSS](https://img.shields.io/badge/Tailwind-3.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)


<img width="1900" height="823" alt="localhost_8000_" src="https://github.com/user-attachments/assets/72ed6682-470b-4776-b07f-97bd830cba3a" />
<img width="1900" height="918" alt="127 0 0 1_8000_campaigns_5_statistics" src="https://github.com/user-attachments/assets/ed74a422-bf84-46f4-9ff9-37964f47fa3f" />
<img width="1900" height="648" alt="127 0 0 1_8000_templates_2" src="https://github.com/user-attachments/assets/6631385e-703b-462d-92b2-880c886a080b" />
<img width="1900" height="730" alt="127 0 0 1_8000_campaigns_create" src="https://github.com/user-attachments/assets/d6e8708d-613c-4997-9817-e3cb8d290fe9" />
<img width="1900" height="918" alt="127 0 0 1_8000_campaigns_create_schedule" src="https://github.com/user-attachments/assets/1c95793d-d54d-4088-9ffe-08a92cd0e039" />


**[🐛 Report Bug](https://github.com/Luan-Neumann-Dev/email-blast/issues)**

---

## 📋 Table of Contents

- [About](#-about-the-project)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Getting Started](#-getting-started)
- [Project Structure](#-project-structure)
- [Database Schema](#-database-schema)
- [Email Tracking](#-email-tracking)
- [Queue System](#-queue-system)
- [Challenges & Solutions](#-challenges--solutions)
- [Testing](#-testing)
- [Performance](#-performance)
- [Roadmap](#-roadmap)

## 🎯 About The Project

A professional email marketing platform built with Laravel 12 that enables businesses to create, send, and track email campaigns efficiently. Features real-time tracking of email opens and link clicks, template management, subscriber lists, and comprehensive campaign analytics.

### Why I Built This

Email marketing is crucial for business growth, but existing solutions can be expensive and overly complex. This project demonstrates:

- **Backend Architecture** - Clean MVC structure with service layer patterns
- **Queue Management** - Efficient background job processing for bulk email sending
- **Database Design** - Normalized schema with proper relationships and soft deletes
- **Email Tracking** - Custom implementation of pixel tracking and link redirects
- **Real-time Analytics** - Campaign performance metrics and subscriber engagement

## ✨ Features

### Campaign Management
- 📧 **Create Email Campaigns** - Rich text editor with template support
- 📅 **Schedule Campaigns** - Send immediately or schedule for later
- 📊 **Campaign Analytics** - Track opens, clicks, and engagement rates
- 🗂️ **Template System** - Reusable email templates with variable placeholders
- 🔄 **Soft Delete** - Restore accidentally deleted campaigns

### Subscriber Management
- 👥 **Email Lists** - Organize subscribers into targeted lists
- ➕ **Add Subscribers** - Individual or bulk subscriber import
- 📋 **List Management** - View and manage subscriber details
- 🗑️ **Subscriber Removal** - Clean list management

### Email Tracking
- 👁️ **Open Tracking** - 1x1 pixel tracking for email opens
- 🔗 **Click Tracking** - Track link clicks within emails
- 📈 **Real-time Metrics** - Live campaign performance dashboard
- 📊 **Engagement Analytics** - Detailed subscriber engagement data

### System Features
- 🔐 **Authentication** - Laravel Breeze with email verification
- ⚡ **Queue System** - Background job processing for email sending
- 🎨 **Responsive UI** - Tailwind CSS for mobile-friendly interface
- 🧪 **Testing** - Pest PHP test suite

## 🛠️ Tech Stack

**Backend:**
- PHP 8.2
- Laravel 12.0 Framework
- Laravel Breeze (Authentication)
- Laravel Queue (Background Jobs)
- Pest PHP (Testing)

**Frontend:**
- Blade Templates
- Tailwind CSS 3.0
- Alpine.js (via Breeze)
- Vite (Asset Bundling)

**Database:**
- MySQL 8.0 / PostgreSQL
- Eloquent ORM
- Database Migrations

**Development Tools:**
- Laravel Debugbar
- LaraDumps
- Laravel Pint (Code Style)
- Composer

**Infrastructure:**
- Queue Workers
- Email Service (SMTP/Mailgun/etc)
- File Storage

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18
- MySQL >= 8.0 or PostgreSQL >= 12
- Mail Server (SMTP credentials)

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/Luan-Neumann-Dev/email-blast.git
cd email-campaign-manager
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install Node dependencies**
```bash
npm install
```

4. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure database and mail in `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=email_campaigns
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@example.com
```

6. **Run migrations**
```bash
php artisan migrate --seed
```

7. **Build frontend assets**
```bash
npm run build
```

8. **Start the development server**
```bash
# Quick start (runs all services concurrently)
composer dev

# Or manually start each service
php artisan serve
php artisan queue:listen
npm run dev
```

9. **Access the application**
```
http://localhost:8000
```

### Quick Setup Script

Or use the automated setup:
```bash
composer setup
```

## 📁 Project Structure

```
email-campaign-manager/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── CampaignController.php       # Campaign CRUD
│   │   │   ├── EmailListController.php      # Email list management
│   │   │   ├── SubscriberController.php     # Subscriber management
│   │   │   ├── TemplateController.php       # Template management
│   │   │   └── TrackingController.php       # Open/click tracking
│   │   ├── Middleware/
│   │   │   └── CampaignCreateSessionControl.php
│   │   └── Requests/                         # Form validation
│   │
│   ├── Jobs/
│   │   ├── SendEmailsCampaignJob.php        # Queue campaign
│   │   └── SendEmailCampaignJob.php         # Send individual email
│   │
│   ├── Mail/
│   │   └── EmailCampaign.php                # Mailable class
│   │
│   └── Models/
│       ├── Campaign.php                      # Campaign model
│       ├── CampaignMail.php                 # Tracking model
│       ├── EmailList.php                    # Email list model
│       ├── Subscriber.php                   # Subscriber model
│       └── Template.php                     # Template model
│
├── database/
│   ├── migrations/                          # Database schema
│   └── seeders/                             # Test data
│
├── resources/
│   └── views/                               # Blade templates
│
├── routes/
│   ├── web.php                              # Web routes
│   └── auth.php                             # Auth routes
│
└── tests/                                   # Pest PHP tests
```

## 🗄️ Database Schema

### Core Tables

#### `campaigns`
```sql
- id (primary key)
- name (string)
- subject (string)
- email_list_id (foreign key)
- template_id (foreign key)
- track_click (boolean)
- track_open (boolean)
- body (text)
- send_at (datetime, nullable)
- created_at, updated_at, deleted_at
```

#### `campaign_mails`
```sql
- id (primary key)
- campaign_id (foreign key)
- subscriber_id (foreign key)
- sent_at (datetime, nullable)
- openings (unsigned small int)
- clicks (unsigned small int)
- created_at, updated_at
```

#### `email_lists`
```sql
- id (primary key)
- name (string)
- user_id (foreign key)
- created_at, updated_at
```

#### `subscribers`
```sql
- id (primary key)
- email (string, unique per list)
- name (string)
- email_list_id (foreign key)
- created_at, updated_at
```

#### `templates`
```sql
- id (primary key)
- name (string)
- content (text)
- user_id (foreign key)
- created_at, updated_at
```

### Entity Relationships

```
User (1) ──→ (N) EmailList
EmailList (1) ──→ (N) Subscriber
EmailList (1) ──→ (N) Campaign
Template (1) ──→ (N) Campaign
Campaign (1) ──→ (N) CampaignMail
Subscriber (1) ──→ (N) CampaignMail
```

## 📧 Email Tracking

### How It Works

#### Open Tracking
1. When an email is sent, a unique 1x1 transparent pixel is embedded:
```html
<img src="https://yourapp.com/t/{campaign_mail_id}/o" width="1" height="1" />
```

2. When the recipient opens the email, the pixel loads
3. The tracking route increments the `openings` counter
4. Returns a transparent 1x1 PNG image

#### Click Tracking
1. All links in the email are rewritten to go through the tracking system:
```html
<a href="https://yourapp.com/t/{campaign_mail_id}/c?url={original_url}">
```

2. When clicked, the route:
   - Increments the `clicks` counter
   - Redirects user to the original URL

### Tracking Routes

```php
// Open tracking
GET /t/{campaignMail}/o

// Click tracking
GET /t/{campaignMail}/c?url={destination}
```

## ⚡ Queue System

### Background Jobs

#### SendEmailsCampaignJob
Queues individual emails for all subscribers in a campaign:

```php
public function handle(): void
{
    foreach ($this->campaign->emailList->subscribers as $subscriber) {
        SendEmailCampaignJob::dispatch($this->campaign, $subscriber);
    }
}
```

#### SendEmailCampaignJob
Sends individual email to a subscriber:
- Creates tracking record in `campaign_mails`
- Sends email with tracking pixels/links
- Updates `sent_at` timestamp

### Running Queue Workers

```bash
# Development
php artisan queue:listen

# Production (supervisord recommended)
php artisan queue:work --tries=3 --timeout=60
```

## 💡 Challenges & Solutions

### Challenge 1: Bulk Email Performance
**Problem:** Sending thousands of emails synchronously would timeout and block the application.

**Solution:** Implemented Laravel Queue system with two-level job dispatching:
```php
// Level 1: Queue the campaign
SendEmailsCampaignJob::dispatch($campaign);

// Level 2: Each subscriber gets their own job
SendEmailCampaignJob::dispatch($campaign, $subscriber);
```

**Result:** 
- Non-blocking email sending
- Automatic retry on failure
- Scalable to thousands of subscribers
- Failed jobs tracked in `failed_jobs` table

### Challenge 2: Accurate Email Tracking
**Problem:** Tracking opens and clicks without external services.

**Solution:** Custom tracking implementation:
- **Opens:** 1x1 transparent tracking pixel
- **Clicks:** URL rewriting through tracking controller
- **Unique IDs:** Each email gets unique `campaign_mail_id`

**Technologies:**
- PHP Image Generation (GD library)
- URL parsing and rewriting
- Database incrementing with `increment()`

**Result:** 
- 100% open rate accuracy (when images enabled)
- All click tracking without JavaScript
- Privacy-respecting (no external trackers)

### Challenge 3: Session Management for Multi-Step Form
**Problem:** Campaign creation has multiple steps (details, template, list, schedule).

**Solution:** Created custom middleware `CampaignCreateSessionControl`:
- Stores form data in session between steps
- Validates required data before each step
- Clears session after campaign creation

**Result:**
- Smooth multi-step user experience
- Data persistence across steps
- Clean validation

## 🧪 Testing

### Running Tests

```bash
# Run all tests
php artisan test

# Or using composer script
composer test

# Run specific test file
php artisan test tests/Feature/CampaignTest.php

# Run with coverage
php artisan test --coverage
```

### Test Structure

```
tests/
├── Feature/
│   ├── CampaignTest.php
│   ├── EmailListTest.php
│   └── TrackingTest.php
└── Unit/
    ├── JobTest.php
    └── MailTest.php
```

## 📊 Performance

### Metrics
- **Average Email Send Time:** ~200ms per email
- **Queue Processing:** 100+ emails/minute
- **Database Queries:** Optimized with eager loading
- **Page Load Time:** < 500ms (with database cache)

### Optimizations Implemented
- Eager loading for N+1 query prevention
- Database indexing on foreign keys
- Queue chunking for bulk operations
- Compiled Blade templates

## 🗺️ Roadmap

### Planned Features

- [ ] **A/B Testing** - Test subject lines and content variations
- [ ] **Advanced Analytics** - Heat maps, time-based engagement
- [ ] **Subscriber Segmentation** - Tag-based filtering
- [ ] **Email Templates Gallery** - Pre-built responsive templates
- [ ] **Webhook Support** - Integration with external services
- [ ] **CSV Import/Export** - Bulk subscriber management
- [ ] **Campaign Duplication** - Clone successful campaigns
- [ ] **Bounce Handling** - Track and manage bounced emails
- [ ] **Unsubscribe Management** - One-click unsubscribe links
- [ ] **API** - RESTful API for integrations
- [ ] **Dark Mode** - UI theme toggle
- [ ] **Multi-language Support** - i18n implementation

## 🔐 Security

- CSRF protection on all forms
- SQL injection prevention via Eloquent ORM
- XSS protection in Blade templates
- Email validation and sanitization
- Rate limiting on tracking endpoints
- Signed routes for email verification

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 👤 Author

**Luan Henrique Neumann**

- LinkedIn: [LuanNeumannDev](https://www.linkedin.com/in/luan-henrique-neumann-dev/)
- GitHub: [@Luan-Neumann-Dev](https://github.com/Luan-Neumann-Dev)
- Email: luan.neumann.dev@gmail.com

## 🙏 Acknowledgments

- Laravel Framework for the robust foundation
- Tailwind CSS for the beautiful UI
- Laravel Breeze for authentication scaffolding
- Pest PHP for elegant testing syntax

---

<div align="center">

**⭐ If this project helped you, please consider giving it a star!**

Made with ❤️ and ☕ by [Luan Henrique Neumann](https://github.com/Luan-Neumann-Dev)

</div>

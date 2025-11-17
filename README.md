# Tech Domain - Corporate Website with CMS

A professional, data-driven corporate website built with Laravel, featuring an integrated CMS for content management and lead generation. The site showcases a modern dark-themed UI with 3D effects and is fully responsive across all devices.

## 🚀 Features

### Public-Facing Website
- **Modern Dark Theme** with cyan accent colors and 3D hover effects
- **Dynamic Home Page** with featured projects, partner logos, and mission overview
- **Project Portfolio** with advanced search and filtering capabilities
- **Multi-Step Quotation Form** with email notifications
- **About Us** page with team showcase grouped by department
- **Services** pages with detailed service descriptions
- **Contact Page** with integrated form
- **SEO-Optimized** with meta tags, XML sitemap, and structured data
- **Fully Responsive** design for mobile, tablet, and desktop

### CMS/Admin Panel
- **Role-Based Access Control** (Admin & Editor roles)
- **Projects Management** with WYSIWYG editors, media uploads, and SEO fields
- **Partners Management** with logo uploads and reordering
- **Team Members Management** with photo uploads and department grouping
- **Pages CMS** for managing static content
- **Quotations/Leads Dashboard** with status management and CSV export
- **Statistics Dashboard** with quick metrics and recent activity

## 🛠️ Technical Stack

### Backend
- **Laravel 12** (latest stable version)
- **MySQL** database
- **Eloquent ORM** for database operations
- **Laravel Breeze** for authentication
- **Laravel Livewire** for dynamic UI components (NO Vue/React)

### Frontend
- **Blade Templates** for server-side rendering
- **Tailwind CSS** for styling (Bootstrap excluded)
- **HTML5 & CSS3** with custom 3D effects
- **Vanilla JavaScript** (minimal usage)
- **Inter Font** from Google Fonts

### Additional Packages
- **Livewire** - Dynamic components without heavy JavaScript
- **Intervention Image** - Image upload and optimization
- **Spatie Laravel Sitemap** - XML sitemap generation

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL >= 8.0
- Web server (Apache/Nginx)

## 🔧 Installation & Setup

### 1. Clone the Repository
```bash
git clone <repository-url>
cd tdomain
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node Dependencies
```bash
npm install
```

### 4. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Database
Edit `.env` file with your MySQL credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tdomain
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 6. Configure Email Settings
Update `.env` with your SMTP settings:
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email@domain.com
MAIL_PASSWORD=your-password
MAIL_FROM_ADDRESS=noreply@techdomain.com
MAIL_FROM_NAME="${APP_NAME}"

SALES_EMAIL=sales@techdomain.com
BIZDEV_EMAIL=bizdev@techdomain.com
```

### 7. Run Database Migrations
```bash
php artisan migrate
```

### 8. Seed Database (Optional)
```bash
php artisan db:seed
```

This creates:
- 2 users (admin@techdomain.com, editor@techdomain.com)
- Sample projects with featured flag
- Partner logos
- Team members across departments
- Static pages with placeholder content

Default password for seeded users: `password`

### 9. Build Frontend Assets
```bash
npm run build
```

For development with hot reload:
```bash
npm run dev
```

### 10. Storage Link
```bash
php artisan storage:link
```

### 11. Generate Sitemap
```bash
php artisan sitemap:generate
```

## 🚀 Running the Application

### Development Server
```bash
php artisan serve
```

Visit: `http://localhost:8000`

### Admin Panel
- URL: `/admin/login`
- Admin credentials (after seeding):
  - Email: `admin@techdomain.com`
  - Password: `password`

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          # Admin panel controllers
│   │   └── Web/            # Public-facing controllers
│   ├── Livewire/
│   │   ├── Admin/          # CMS Livewire components
│   │   └── Public/         # Public-facing Livewire components
│   └── Middleware/
│       └── RoleMiddleware.php  # Role-based access control
├── Models/
│   ├── Project.php
│   ├── ProjectMedia.php
│   ├── Partner.php
│   ├── TeamMember.php
│   ├── Quotation.php
│   ├── Page.php
│   └── User.php
├── Mail/
│   ├── QuotationReceived.php     # Client confirmation email
│   └── NewQuotationAlert.php     # Sales team notification
└── Services/                      # Business logic services

resources/
├── views/
│   ├── layouts/
│   │   ├── app.blade.php         # Public layout
│   │   └── admin.blade.php       # Admin layout
│   ├── pages/                    # Public pages
│   ├── admin/                    # Admin views
│   ├── livewire/                 # Livewire component views
│   ├── components/               # Blade components
│   └── mail/                     # Email templates
└── css/
    └── app.css                    # Tailwind + custom 3D styles

database/
├── migrations/                    # Database schema
└── seeders/                       # Sample data seeders

routes/
├── web.php                        # Public routes
└── admin.php                      # Admin routes (separate file)
```

## 🎨 Design System

### Color Palette
```css
primary-bg: #1A202C      /* Main page background */
secondary-bg: #2D3748    /* Cards, sidebars */
accent: #00FFFF          /* CTAs, active states, icons */
text-main: #E2E8F0       /* Body text */
highlight: #66FF99       /* Success, glow effects */
```

### Typography
- **Font Family**: Inter (Google Fonts)
- **Headings**: Bold with accent color highlights
- **Body**: Regular weight with text-main color

### Custom CSS Classes
- `.card-3d` - 3D hover effect on cards
- `.btn-primary` - Primary accent button with glow
- `.btn-secondary` - Transparent button with accent border
- `.project-card` - Project cards with image zoom on hover
- `.partner-card` - Partner logo containers
- `.team-card` - Team member cards with rounded photos
- `.service-card` - Service cards with icon animations
- `.glow-border` - Pulsing glow border effect
- `.animated-underline` - Animated underline on hover

## 📊 Database Schema

### Tables
- **projects** - Project portfolio entries
- **project_media** - Images and videos for projects
- **partners** - Partner/client logos
- **team_members** - Company team members
- **quotations** - Lead generation form submissions
- **pages** - CMS-managed static pages
- **users** - Admin and editor accounts

See migration files in `database/migrations/` for complete schema.

## 🔐 Security Features

- CSRF Protection (Laravel default)
- XSS Prevention with Blade `{{ }}` escaping
- SQL Injection prevention via Eloquent ORM
- Input validation and sanitization
- File upload security (type/size validation, unique filenames)
- Rate limiting on forms
- Role-based access control for admin panel
- Password hashing with bcrypt

## 🎯 Key Features Implementation

### Multi-Step Quotation Form
- 3-step wizard (Basic Info → Project Details → Description)
- Real-time validation with Livewire
- Dual email notifications (client + sales team)
- Auto-status tracking in admin panel

### Project Portfolio Search & Filter
- Real-time search by title, client, description
- Filter by industry, technology, service type
- Pagination (12 projects per page)
- Powered by Livewire for seamless UX

### Image Optimization
- Multiple sizes generated (thumbnail, medium, large)
- WebP format support
- Lazy loading
- Intervention Image package

### SEO Implementation
- Dynamic meta titles and descriptions
- Clean slug-based URLs
- XML sitemap at `/sitemap.xml`
- Structured JSON-LD data
- Semantic HTML structure
- Alt tags on all images

## 📱 Responsive Breakpoints

- **Mobile**: 375px - 640px (sm)
- **Tablet**: 768px (md)
- **Desktop**: 1024px (lg), 1280px (xl), 1536px (2xl)
- Hamburger menu on mobile
- Touch-friendly UI (minimum 44px tap targets)

## 🚀 Deployment

### Production Checklist

1. **Environment Configuration**
   ```bash
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://techdomain.com
   ```

2. **Database Setup**
   - Create production MySQL database
   - Run migrations: `php artisan migrate --force`
   - Seed initial data if needed

3. **Optimize for Production**
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   npm run build
   ```

4. **SSL Certificate**
   - Install Let's Encrypt SSL
   - Force HTTPS in production

5. **File Permissions**
   ```bash
   chmod -R 775 storage bootstrap/cache
   chown -R www-data:www-data storage bootstrap/cache
   ```

6. **Queue Worker** (for background email processing)
   ```bash
   php artisan queue:work --daemon
   ```

7. **Scheduled Tasks** (for sitemap generation)
   Add to crontab:
   ```
   * * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
   ```

8. **Configure Caching**
   - Redis recommended for session/cache storage
   - Update `.env` with Redis credentials

### Staging Environment
- URL: `staging.techdomain.com`
- Separate database for testing
- Same configuration as production
- Use for testing before deployment

## 🔄 Development Workflow

### Creating New Livewire Components
```bash
php artisan make:livewire ComponentName
```

### Creating New Models with Migration
```bash
php artisan make:model ModelName -m
```

### Running Tests
```bash
php artisan test
```

### Code Style (Laravel Pint)
```bash
./vendor/bin/pint
```

## 📧 Email Templates

Email templates are located in `resources/views/mail/`:
- `quotation-received.blade.php` - Client confirmation
- `new-quotation-alert.blade.php` - Sales team notification

Using Markdown mailables for easy customization.

## 🐛 Troubleshooting

### Issue: Assets not loading
```bash
npm run build
php artisan view:clear
```

### Issue: Route not found
```bash
php artisan route:clear
php artisan optimize:clear
```

### Issue: Permission denied on storage
```bash
chmod -R 775 storage bootstrap/cache
```

### Issue: Database connection failed
- Check MySQL service is running
- Verify credentials in `.env`
- Ensure database exists

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Livewire Documentation](https://livewire.laravel.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Intervention Image Documentation](https://image.intervention.io/v3)

## 👥 Default User Roles

### Admin
- Full access to all CMS features
- Can manage users, projects, partners, team, pages
- Can view and export quotations
- Can update all settings

### Editor
- CRUD access to content (projects, partners, team, pages)
- View-only access to quotations
- Cannot manage users or system settings

## 🔄 Updates & Maintenance

### Updating Dependencies
```bash
composer update
npm update
```

### Database Backup
```bash
php artisan backup:run
```

### Clearing All Caches
```bash
php artisan optimize:clear
```

## 📝 License

This project is proprietary software developed for Tech Domain.

## 👨‍💻 Development Team

Created for Tech Domain Corporate Website

---

**Note**: This application is configured for MySQL as specified in requirements. Ensure your production environment has MySQL 8.0+ installed and properly configured.

For support or questions, contact the development team.

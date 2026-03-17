# Broker Platform - Complete Setup Guide

**Website:** civigrantinterest.online

## Overview

This is a comprehensive PHP + MySQL financial trading platform featuring:
- User dashboard and trading interface
- Admin control panel
- Signal packages and mining features
- Live trading functionality
- KYC verification
- Deposit/Withdrawal management

---

## 🚀 Quick Start (Recommended for Development)

### Option 1: Docker (Easiest)

**Prerequisites:**
- Docker installed
- Docker Compose installed
- 4GB+ RAM available

**Steps:**
```bash
cd /workspaces/broker

# Make setup script executable
chmod +x setup.sh

# Run setup
./setup.sh
```

**Access:**
- Website: http://localhost
- Admin: http://localhost/admin/login.php
- User Dashboard: http://localhost/user/dashboard.php
- Health Check: http://localhost/health-check.php

**Default Credentials** (after importing database):
- Check your database users table for admin/user credentials

---

## 📋 Deployment to civigrantinterest.online

### Prerequisites
- Web hosting with PHP 8.1+
- MySQL 5.7+ or MariaDB 10.3+
- SSH/FTP access
- Domain configured (civigrantinterest.online)

### Step-by-Step Setup

#### 1. **Transfer Files**

Via FTP:
```bash
# Use FileZilla, Cyberduck, or your hosting provider's file manager
# Upload all files to: /public_html
# Excluding: .git, Dockerfile, docker-compose.yml, setup.sh
```

Via Git (if available on hosting):
```bash
ssh user@civigrantinterest.online
cd public_html
git clone https://github.com/marcomanpop/broker.git .
```

#### 2. **Create Database**

Using cPanel/Plesk:
1. Go to MySQL Databases
2. Create new database: `bitpromarketprim_database`
3. Create user: `bitpromarketprim_user`
4. Set password: `bitpromarketprim_user` (change this!)
5. Add user to database with ALL privileges

Or via command line:
```bash
mysql -u root -p
CREATE DATABASE bitpromarketprim_database;
CREATE USER 'bitpromarketprim_user'@'localhost' IDENTIFIED BY 'bitpromarketprim_user';
GRANT ALL PRIVILEGES ON bitpromarketprim_database.* TO 'bitpromarketprim_user'@'localhost';
FLUSH PRIVILEGES;
```

#### 3. **Import Database Schema**

Using phpMyAdmin:
1. Select `bitpromarketprim_database`
2. Click "Import"
3. Choose `bitpromarketprime.sql`
4. Click Import

Or via command line:
```bash
mysql -u bitpromarketprim_user -p bitpromarketprim_database < bitpromarketprime.sql
```

#### 4. **Update Database Credentials**

Edit these files with your actual credentials:
- `assets123/php/connection.php`
- `user/assets/php/connection.php`
- `admin/assets/php/config/connection.php`

Replace:
```php
$servername = "localhost:3306";
$username = "bitpromarketprim_user";
$password = "bitpromarketprim_user";
$dbname = "bitpromarketprim_database";
```

#### 5. **Set File Permissions**

```bash
# Via SSH
chmod 755 public_html
chmod -R 755 public_html/*
chmod -R 777 public_html/admin/assets/uploads/
chmod -R 777 public_html/user/assets/uploads/
```

#### 6. **Enable mod_rewrite**

Check `.htaccess` is present (it is), then:
1. Via cPanel: Select your domain → Apache Handlers → Ensure mod_rewrite is enabled
2. Or ask your hosting provider to enable it

#### 7. **Set Up SSL (HTTPS)**

1. **Auto SSL via cPanel:**
   - AutoSSL is usually automatic
   - If not, go to AutoSSL → Run AutoSSL

2. **Manual:**
   - Use Let's Encrypt (free)
   - Upload certificate files to hosting

3. **Force HTTPS:**
   Add to `.htaccess`:
   ```apache
   RewriteCond %{HTTPS} off
   RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
   ```

#### 8. **Configure Email Settings**

Edit connection files to add email configuration. Update SMTP if needed in:
- `assets123/php/` - Look for mail-related files

#### 9. **Verify Installation**

Test the following URLs:
```
https://civigrantinterest.online/
https://civigrantinterest.online/health-check.php
https://civigrantinterest.online/admin/login.php
https://civigrantinterest.online/user/dashboard.php
```

---

## 🔧 Configuration Files

### Key Configuration Files:

1. **Database Connection:**
   - `connection-manager.php` - Main connection handler (supports Docker & traditional)
   - `assets123/php/connection.php`
   - `user/assets/php/connection.php`
   - `admin/assets/php/config/connection.php`

2. **Environment:**
   - `.env.example` - Template for environment variables
   - `.htaccess` - Apache rewrite rules and security

3. **Application:**
   - `index.php` - Main entry point (now present)
   - `health-check.php` - System health monitoring

### Required PHP Extensions:
```
- mysqli
- pdo
- pdo_mysql
- curl
- json
- session
- date
```

---

## 📊 Directory Structure

```
/public_html/
├── index.php                 # Main entry point (NEW)
├── .htaccess                 # Apache rules (NEW)
├── health-check.php          # Health check endpoint (NEW)
├── connection-manager.php    # Connection handler (NEW)
├── admin/                    # Admin panel
│   ├── dashboard.php
│   ├── login.php
│   └── assets/
├── user/                     # User dashboard
│   ├── dashboard.php
│   ├── config.php
│   └── assets/
├── auth/                     # Authentication
│   ├── login.php
│   └── register.php
├── assets/                   # Frontend assets
│   ├── css/
│   ├── js/
│   └── img/
└── bitpromarketprime.sql     # Database dump
```

---

## 🐛 Troubleshooting

### HTTP 500 Error

**Check error logs:**
```bash
# Via SSH
tail -100 /home/username/public_html/error_log
```

**Common causes:**
1. Database connection failed
   - Test credentials: `mysql -u user -p -h host`
   - Verify database exists and has tables
   
2. Missing PHP extensions
   - Test: `php -m | grep -E "mysqli|pdo"`
   
3. File permissions
   - Set: `chmod 755 public_html`
   - Set: `chmod 777 admin/assets/uploads/`

4. PHP memory limit
   - Increase in `.htaccess`:
   ```apache
   php_value memory_limit 256M
   ```

### Database Connection Failed

```bash
# Test credentials
mysql -h localhost -u bitpromarketprim_user -p bitpromarketprim_database

# If using remote MySQL
mysql -h db-server.com -u bitpromarketprim_user -p bitpromarketprim_database
```

### Page Not Found (404)

1. Check `.htaccess` exists
2. Enable mod_rewrite: Contact hosting provider
3. Verify `index.php` is in root directory

### Session Issues

Ensure `/tmp` directory has write permissions:
```bash
chmod 777 /tmp
# Or configure session path in php.ini
```

---

## 🔐 Security Recommendations

1. **Change Default Passwords**
   - Database: Update MySQL password
   - Admin: Change admin account password
   - Users: Reset user passwords

2. **Enable HTTPS**
   - Install SSL certificate
   - Force HTTPS redirect in `.htaccess`

3. **Security Headers**
   - Already configured in `.htaccess`
   - Monitor Content Security Policy

4. **Backup Strategy**
   - Daily database backups
   - Weekly file backups
   - Store off-site

5. **Regular Updates**
   - Keep PHP updated
   - Update all dependencies
   - Monitor security advisories

---

## 📞 Support Contacts

- **Domain Registrar:** Check your registrar's support
- **Hosting Provider:** Contact for server issues
- **PHP Issues:** Check PHP error logs
- **Database Issues:** Use phpMyAdmin to inspect

---

## 🔄 Maintenance

### Regular Tasks

**Daily:**
- Monitor error logs
- Check website is accessible

**Weekly:**
- Database backup
- Review security logs
- Check file permissions

**Monthly:**
- Update security patches
- Review access logs
- Performance optimization

### Monitoring Commands

```bash
# Check PHP configuration
php -i | grep -E "memory|upload_max"

# View error logs
tail -f /home/user/public_html/error_log

# Check disk space
df -h

# Check database size
mysql -u user -p -e "SELECT table_name, ROUND(((data_length + index_length) / 1024 / 1024), 2) FROM information_schema.tables WHERE table_schema = 'bitpromarketprim_database';"
```

---

## ℹ️ Additional Resources

- **Docker Official:** https://docs.docker.com/
- **PHP Official:** https://www.php.net/manual/
- **MySQL Official:** https://dev.mysql.com/doc/
- **Let's Encrypt SSL:** https://letsencrypt.org/

---

## ✅ Deployment Checklist

- [ ] Files uploaded to public_html
- [ ] Database created and user configured
- [ ] Database schema imported from `.sql`
- [ ] Database credentials updated in all connection files
- [ ] File permissions set correctly (755/777)
- [ ] SSL certificate installed and HTTPS working
- [ ] Domain DNS configured to point to hosting
- [ ] `.htaccess` file present and mod_rewrite enabled
- [ ] Health check page loads successfully
- [ ] Admin panel accessible at /admin/login.php
- [ ] User dashboard accessible at /user/dashboard.php
- [ ] Database backups configured
- [ ] Email configured (if needed)
- [ ] Staging test complete before going live

---

Last Updated: March 17, 2026  
Version: 1.0

# Broker Platform - Deployment Guide

## Quick Start with Docker (Recommended)

### Prerequisites
- Docker and Docker Compose installed
- Git (to clone the repository)

### Steps

1. **Clone and navigate to the directory**
```bash
cd /workspaces/broker
```

2. **Start the services**
```bash
docker-compose up -d
```

This will:
- Create a MySQL/MariaDB container with your database
- Create an Apache/PHP container with your application
- Automatically import your database schema from `bitpromarketprime.sql`
- Make your site available at `http://localhost`

3. **Verify it's running**
```bash
docker-compose ps
```

4. **View logs**
```bash
docker-compose logs -f
```

5. **Stop the services**
```bash
docker-compose down
```

---

## Traditional Hosting Deployment

If you're deploying to traditional web hosting (cPanel, Plesk, etc.):

### Prerequisites
- PHP 8.1 or higher
- MySQL 5.7+ or MariaDB 10.3+
- cURL and mysqli extensions enabled

### Steps

1. **Upload files to public_html**
```bash
# Via FTP or file manager, upload all files to your hosting's public_html directory
```

2. **Create the database**
- Use cPanel/Plesk to create a new MySQL database
- Use the credentials from `.env.example` or create your own
- Note: Username must be `bitpromarketprim_user` (Update all connection files if different)

3. **Import the database schema**
```bash
# Via phpMyAdmin:
# 1. Select your database
# 2. Go to Import
# 3. Choose bitpromarketprime.sql
# 4. Click Import

# Or via command line:
mysql -u your_username -p your_database < bitpromarketprime.sql
```

4. **Update database credentials**
- Edit all connection files with your actual database credentials:
  - `assets123/php/connection.php`
  - `user/assets/php/connection.php`
  - `admin/assets/php/config/connection.php`

5. **Set file permissions**
```bash
chmod 755 /home/your_username/public_html
chmod -R 755 /home/your_username/public_html/*
chmod -R 777 /home/your_username/public_html/admin/assets/uploads
```

6. **Enable mod_rewrite (if needed)**
- The `.htaccess` file handles URL rewriting
- Ensure `mod_rewrite` is enabled in Apache

---

## Deployment to civigrantinterest.online

### If using the hosting provider's control panel:

1. **Connect via FTP/SFTP**
   - Use credentials provided by your hosting

2. **Upload via git (if available)**
```bash
git clone https://github.com/marcomanpop/broker.git
cd broker
# Follow Traditional Hosting steps above
```

3. **Configure domain**
   - Point `civigrantinterest.online` to your public_html directory
   - Wait for DNS propagation (usually 24 hours)

4. **Install SSL certificate**
   - Use AutoSSL (usually automatic) or manually install
   - Update mixed content if needed (HTTP/HTTPS)

---

## Troubleshooting

### 500 Internal Server Error
1. Check error logs: `tail -50 /home/user/public_html/error_log`
2. Verify database connection credentials
3. Ensure all required PHP extensions are installed
4. Check file permissions (should be 755 for files, 777 for uploads)

### Database Connection Failed
1. Verify MySQL is running
2. Test credentials manually:
```bash
mysql -h localhost -u bitpromarketprim_user -p bitpromarketprim_database
```
3. Check server firewall allows port 3306

### Page Not Found
1. Ensure `.htaccess` is present and mod_rewrite is enabled
2. Verify `index.php` exists in root directory
3. Check file uploadsexist in correct locations

---

## Environment Variables

For Docker, edit `docker-compose.yml` to change:
- `MYSQL_ROOT_PASSWORD` (root DB password)
- `MYSQL_PASSWORD` (app user password)
- Port mappings (80:80, 3306:3306)

For traditional hosting, create a `.env` file with credentials from `.env.example`.

---

## Next Steps After Deployment

1. **Change default passwords**
   - Update admin and user accounts
   - Change database root password

2. **Configure email settings**
   - Update SMTP configuration for notifications
   - Test email functionality

3. **Set up backups**
   - Regular database backups
   - Daily website file backups

4. **Security hardening**
   - Enable HTTPS
   - Set up WAF rules
   - Configure security headers

5. **Monitor and maintain**
   - Check error logs regularly
   - Monitor database performance
   - Keep software updated

---

For detailed support, contact your hosting provider or refer to the README.md in the repository.

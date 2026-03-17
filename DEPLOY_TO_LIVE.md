# Deployment Instructions for civigrantinterest.online

## 📌 Quick Summary

Your Broker Platform is ready for deployment to **civigrantinterest.online**. Multiple deployment options are available below.

---

## 🚀 Deploy to civigrantinterest.online

### Option A: Automatic SSH Deploy (Recommended)

If you have SSH access to your hosting:

```bash
cd /workspaces/broker
./deploy.sh civigrantinterest.online username
```

**What it does:**
- ✓ Backs up existing files on remote server
- ✓ Uploads all application files via rsync
- ✓ Sets correct file permissions
- ✓ Verifies the site is accessible

### Option B: Manual FTP Upload

1. Connect via FTP (use FileZilla, Cyberduck, etc.)
   - Host: civigrantinterest.online
   - Username: your hosting username
   - Password: your FTP password

2. Upload all files to `/public_html` directory

3. Exclude these files (don't upload):
   - `.git/`
   - `Dockerfile`
   - `docker-compose.yml`
   - `setup.sh`
   - `deploy.sh`

### Option C: Using Git (if available on hosting)

SSH into your server:
```bash
ssh user@civigrantinterest.online
cd public_html
git clone https://github.com/marcomanpop/broker.git .
```

---

## 🗄️ Database Setup

### 1. Create Database & User

**Via cPanel:**
- Go to MySQL Databases
- Create database: `bitpromarketprim_database`
- Create user: `bitpromarketprim_user`
- Password: Change from default!
- Add user to database (ALL privileges)

**Via Command Line:**
```bash
ssh user@civigrantinterest.online
mysql -u root -p
```

```sql
CREATE DATABASE bitpromarketprim_database;
CREATE USER 'bitpromarketprim_user'@'localhost' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON bitpromarketprim_database.* TO 'bitpromarketprim_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 2. Import Database Schema

**Via phpMyAdmin (easiest):**
1. Log into cpanel > phpMyAdmin
2. Select `bitpromarketprim_database`
3. Click "Import"
4. Upload `bitpromarketprime.sql`
5. Click Import

**Via Command Line:**
```bash
mysql -u bitpromarketprim_user -p bitpromarketprim_database < bitpromarketprime.sql
```

### 3. Update Credentials in Code

Edit these files with your actual database credentials:

**File 1:** `/admin/assets/php/config/connection.php`
```php
$servername = "localhost:3306";
$username = "bitpromarketprim_user";
$password = "your_actual_password";  // Changed!
$dbname = "bitpromarketprim_database";
```

**File 2:** `/user/assets/php/connection.php`  
**File 3:** `/assets123/php/connection.php`

Same changes for all three files.

---

## ⚙️ Configuration

### PHP Requirements Met?
- [x] PHP 8.1+
- [x] MySQLi extension
- [x] PDO MySQL extension
- [x] Mod Rewrite enabled

### SSL/HTTPS
Use cPanel AutoSSL to enable SSL automatically, OR use Let's Encrypt:
```bash
# Via SSH
certbot certonly --apache -d civigrantinterest.online
```

### File Permissions
```bash
ssh user@civigrantinterest.online
cd public_html
chmod 755 .
chmod -R 755 *
chmod -R 777 admin/assets/uploads
chmod -R 777 user/assets/uploads
```

---

## ✅ Verification Checklist

After deployment, verify everything works:

- [ ] https://civigrantinterest.online loads (homepage)
- [ ] https://civigrantinterest.online/health-check.php shows "ok"
- [ ] https://civigrantinterest.online/admin/login.php loads
- [ ] https://civigrantinterest.online/user/dashboard.php loads (redirects if not logged in)
- [ ] Database connection is working
- [ ] Email (if configured) is working

### Test Database Connection
```bash
ssh user@civigrantinterest.online
mysql -u bitpromarketprim_user -p bitpromarketprim_database
# If you get a MySQL prompt, connection works!
```

---

## 🔐 Security First Steps

1. **Change default passwords:**
   - Database user password
   - admin account password (in users table)
   - All user passwords

2. **Enable HTTPS:**
   - Use AutoSSL in cPanel or Let's Encrypt
   - The application supports HTTPS by default

3. **Set proper file permissions:**
   ```bash
   chmod 644 connection files  # Make non-writable by web
   chmod 777 upload directories
   ```

---

## 🐛 Troubleshooting

### 500 Error when accessing site

**Check error log:**
```bash
ssh user@civigrantinterest.online
tail -50 public_html/error_log
cat public_html/error_log | grep -i error
```

**Most common causes:**
1. Database connection failed
   - Verify credentials in connection files
   - Verify database user exists
   - Verify database is created

2. Missing PHP extensions
   - Contact hosting support
   - Request: mysqli, pdo_mysql

3. Wrong file permissions
   ```bash
   chmod 755 public_html
   chmod -R 755 public_html/*
   ```

### 404 Page Not Found
- Verify `.htaccess` file is uploaded
- Verify mod_rewrite is enabled
- Restart Apache (contact hosting support)

### Database Connection Failed
```bash
# SSH to server and test
mysql -h localhost -u bitpromarketprim_user -p
# Enter password
# If it connects, MySQL is OK
```

---

## 📊 File Structure (What Gets Uploaded)

```
/public_html/
├── index.php                 ← New main entry point
├── .htaccess                 ← Apache rewrite rules
├── health-check.php          ← System health check
├── README.md                 ← Full documentation
├── DEPLOYMENT.md             ← These instructions
├── admin/                    ← Admin panel
├── user/                     ← User dashboard
├── auth/                     ← Authentication
├── assets/                   ← Frontend assets
└── bitpromarketprime.sql     ← Database dump

Files NOT uploaded:
├── .git/                     (version control)
├── Dockerfile                (Docker only)
├── docker-compose.yml        (Docker only)
├── setup.sh                  (Dev setup only)
└── deploy.sh                 (Helper script)
```

---

## 📧 Email Configuration (Optional)

If you need email functionality (password resets, notifications):

Check and update these files:
- `assets123/php/` - Look for mail/email functionality
- Update SMTP credentials if needed

Test email:
```php
// Add test code temporarily to verify email works
mail('test@example.com', 'Test Subject', 'Test Body');
```

---

## 📞 Support Resources

- **Hosting Support:** Contact your hosting provider for server issues
- **PHP Errors:** Check `/public_html/error_log`
- **MySQL Issues:** Use phpMyAdmin to inspect database
- **DNS Issues:** Contact domain registrar

---

## 🔄 Keeping It Live

### Daily Maintenance
```bash
# Check for errors
ssh user@civigrantinterest.online
tail -50 public_html/error_log

# Check site is up
curl https://civigrantinterest.online/health-check.php
```

### Weekly Tasks
- Database backup
- Check error logs
- Monitor performance

### Monthly Tasks
- PHP security updates
- Database optimization
- Review access logs

---

## 🎉 You're Ready!

Your application is deployment-ready with:
- ✅ Docker setup for development/staging
- ✅ Automated SSH deployment script
- ✅ Comprehensive documentation
- ✅ Health check endpoint
- ✅ Security configurations
- ✅ Error handling
- ✅ Database management tools

**Next Steps:**
1. Choose your deployment method (A, B, or C above)
2. Set up your database
3. Deploy the files
4. Test the URLs in the verification checklist
5. Change all default passwords
6. Enable HTTPS

---

**Questions?** Refer to README.md for detailed documentation.  
**Need Docker for local testing?** Run `./setup.sh`

---

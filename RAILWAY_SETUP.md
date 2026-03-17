# Deploy to Railway.app

Railway.app automatically deploys from GitHub and includes MySQL database. This is the easiest way to get your site live!

## 🚀 Quick Setup (5 minutes)

### Step 1: Create Railway Account
1. Go to https://railway.app
2. Click "Start Project"
3. Sign in with GitHub

### Step 2: Create New Project
1. Click "New Project"
2. Select "Deploy from GitHub repo"
3. Choose your GitHub repository: `marcomanpop/broker`
4. Click "Deploy Now"

### Step 3: Add MySQL Database
1. In your Railway project, click "Add Service"
2. Select "MySQL"
3. Railway automatically creates and configures it

### Step 4: Configure Environment Variables
Railway automatically sets these for MySQL connection:
- `MYSQLDB_DATABASE` → Your database name
- `MYSQLDB_USER` → Your database user
- `MYSQLDB_PASSWORD` → Your password
- `MYSQLDB_HOST` → Your database host
- `MYSQLDB_PORT` → Usually 3306

The application's `connection-manager.php` will auto-detect these!

### Step 5: Import Database Schema
After the site deploys:

1. Get MySQL connection details from Railway dashboard
2. SSH into Railway container:
   ```bash
   railway shell
   ```

3. Import the database:
   ```bash
   mysql -h $MYSQLDB_HOST -u $MYSQLDB_USER -p$MYSQLDB_PASSWORD $MYSQLDB_DATABASE < /app/bitpromarketprime.sql
   ```

OR use a MySQL client like MySQL Workbench to connect and import.

### Step 6: Connect Custom Domain
1. In Railway dashboard, go to "Settings"
2. Under "Domains", click "Create Domain"
3. Enter: `civigrantinterest.online`
4. Railway shows DNS records to add
5. Add CNAME record to your domain registrar pointing to Railway

### Step 7: Enable HTTPS
Railway automatically provides HTTPS with Let's Encrypt!

---

## 📋 Full Deployment Flow

```
Your GitHub Repo
        ↓
    (push to main)
        ↓
  Railway detects
        ↓
  Builds & deploys
        ↓
  Auto HTTPS
        ↓
  Your site is live!
```

---

## ✅ After Deployment

Test these URLs:
- `https://civigrantinterest.online`
- `https://civigrantinterest.online/health-check.php`
- `https://civigrantinterest.online/admin/login.php`
- `https://civigrantinterest.online/user/dashboard.php`

---

## 🔐 Security

1. Change default database password in Railway settings
2. Update admin/user account passwords
3. HTTPS is automatic on Railway

---

## 📊 Pricing

- **Free tier** available for testing
- **Pay as you go** after free tier
- Database and web server use shared resources

---

## 🆘 Troubleshooting

### Site shows 500 Error
1. Check Railway logs: Dashboard → "Logs" tab
2. Verify MySQL connection variables are set
3. Make sure database schema was imported

### Can't connect to database
1. Verify `MYSQLDB_*` variables in Railway Settings
2. Make sure MySQL service is running
3. Test connection settings locally first

### Domain not connecting
1. Check DNS records were added correctly
2. Wait 24-48 hours for DNS propagation
3. Use `nslookup` to verify DNS:
   ```bash
   nslookup civigrantinterest.online
   ```

---

## 🔄 How to Update After Changes

Just push to GitHub:
```bash
git add .
git commit -m "Your changes"
git push origin main
```

Railway automatically redeploys!

---

## Useful Commands in Railway Shell

```bash
# Check database tables
mysql -h $MYSQLDB_HOST -u $MYSQLDB_USER -p$MYSQLDB_PASSWORD -e "USE $MYSQLDB_DATABASE; SHOW TABLES;"

# View app logs
tail -f /var/log/apache2/error.log

# Check file permissions
ls -la /var/www/html
```

---

Ready to deploy? Follow the 6 steps above!

**Questions?** See the troubleshooting section or check Railway docs at https://docs.railway.app

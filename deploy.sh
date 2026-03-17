#!/bin/bash

###############################################################################
# Broker Platform - Production Deployment Script
# 
# This script automates deployment to a traditional web hosting environment
# Usage: ./deploy.sh [host] [user]
# Example: ./deploy.sh civigrantinterest.online user
###############################################################################

set -e

# Configuration
REMOTE_HOST="${1:-civigrantinterest.online}"
REMOTE_USER="${2:-user}"
REMOTE_PATH="/home/$REMOTE_USER/public_html"
LOCAL_PATH="$(dirname "$0")"

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}=========================================${NC}"
echo -e "${BLUE}Broker Platform - Production Deployment${NC}"
echo -e "${BLUE}=========================================${NC}"
echo ""

# Validation
if [ -z "$REMOTE_HOST" ]; then
    echo -e "${RED}Error: Remote host not specified${NC}"
    echo "Usage: $0 [host] [user]"
    exit 1
fi

echo -e "${YELLOW}Target: $REMOTE_USER@$REMOTE_HOST:$REMOTE_PATH${NC}"
echo ""

# Check SSH connection
echo -e "${BLUE}Step 1: Verifying SSH connection...${NC}"
if ! ssh -o ConnectTimeout=5 "$REMOTE_USER@$REMOTE_HOST" "echo 'SSH OK'" >/dev/null 2>&1; then
    echo -e "${RED}Error: Cannot connect to $REMOTE_USER@$REMOTE_HOST${NC}"
    echo "Please verify:"
    echo "  1. SSH access is enabled"
    echo "  2. Correct username and host"
    echo "  3. SSH keys are configured"
    exit 1
fi
echo -e "${GREEN}✓ SSH connection successful${NC}"

# Create backup on remote
echo ""
echo -e "${BLUE}Step 2: Creating backup on remote server...${NC}"
BACKUP_DIR="backups/backup-$(date +%Y%m%d-%H%M%S)"
ssh "$REMOTE_USER@$REMOTE_HOST" "
    if [ -d \"$REMOTE_PATH\" ]; then
        mkdir -p \"$BACKUP_DIR\"
        cp -r \"$REMOTE_PATH\"/* \"$BACKUP_DIR/\" 2>/dev/null || true
        echo 'Backup created: $BACKUP_DIR'
    fi
"
echo -e "${GREEN}✓ Backup created${NC}"

# Rsync files
echo ""
echo -e "${BLUE}Step 3: Uploading files...${NC}"

# Files to exclude
EXCLUDES=(
    ".git/*"
    ".gitignore"
    ".DS_Store"
    "Dockerfile"
    "docker-compose.yml"
    "setup.sh"
    "deploy.sh"
    "*.swp"
    "*.swo"
    "*~"
    "node_modules/*"
    "vendor/*"
    ".env"
)

# Build exclude parameters
EXCLUDE_PARAMS=""
for exclude in "${EXCLUDES[@]}"; do
    EXCLUDE_PARAMS="$EXCLUDE_PARAMS --exclude '$exclude'"
done

# Perform rsync
rsync -avz $EXCLUDE_PARAMS \
    --delete-after \
    --progress \
    "$LOCAL_PATH/" \
    "$REMOTE_USER@$REMOTE_HOST:$REMOTE_PATH/"

echo -e "${GREEN}✓ Files uploaded${NC}"

# Set permissions
echo ""
echo -e "${BLUE}Step 4: Setting permissions...${NC}"
ssh "$REMOTE_USER@$REMOTE_HOST" "
    chmod 755 \"$REMOTE_PATH\"
    chmod -R 755 \"$REMOTE_PATH\"/*
    chmod -R 777 \"$REMOTE_PATH\"/admin/assets/uploads 2>/dev/null || true
    chmod -R 777 \"$REMOTE_PATH\"/user/assets/uploads 2>/dev/null || true
    echo 'Permissions updated'
"
echo -e "${GREEN}✓ Permissions set${NC}"

# Verify deployment
echo ""
echo -e "${BLUE}Step 5: Verifying deployment...${NC}"
if hash curl 2>/dev/null; then
    # Wait a moment for server to be ready
    sleep 3
    HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" "https://$REMOTE_HOST/health-check.php" 2>/dev/null || echo "000")
    
    if [ "$HTTP_CODE" = "200" ]; then
        echo -e "${GREEN}✓ Website is accessible${NC}"
    else
        echo -e "${YELLOW}⚠ Website returned HTTP $HTTP_CODE${NC}"
        echo "This may be normal if the site is still initializing"
    fi
fi

# Summary
echo ""
echo -e "${GREEN}=========================================${NC}"
echo -e "${GREEN}Deployment Complete!${NC}"
echo -e "${GREEN}=========================================${NC}"
echo ""
echo -e "${BLUE}Access your site:${NC}"
echo "  Main: https://$REMOTE_HOST"
echo "  Admin: https://$REMOTE_HOST/admin/login.php"
echo "  User Dashboard: https://$REMOTE_HOST/user/dashboard.php"
echo "  Health Check: https://$REMOTE_HOST/health-check.php"
echo ""
echo -e "${BLUE}Backup location:${NC}"
echo "  Remote: ~/$BACKUP_DIR"
echo ""
echo -e "${YELLOW}Next steps:${NC}"
echo "  1. Verify the site loads correctly"
echo "  2. Test admin login at /admin/login.php"
echo "  3. Test user dashboard at /user/dashboard.php"
echo "  4. Check error logs: ssh $REMOTE_USER@$REMOTE_HOST 'tail -50 ~/public_html/error_log'"
echo ""

#!/bin/bash

# Broker Platform Setup & Launch Script

set -e

echo "========================================="
echo "Broker Platform - Setup & Launch"
echo "========================================="

# Colors for output
GREEN='\033[0;32m'
BLUE='\033[0;34m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
    echo -e "${RED}Error: Docker is not installed${NC}"
    echo "Please install Docker from https://www.docker.com/products/docker-desktop"
    exit 1
fi

if ! command -v docker-compose &> /dev/null; then
    echo -e "${RED}Error: Docker Compose is not installed${NC}"
    echo "Please install Docker Compose"
    exit 1
fi

echo -e "${BLUE}Step 1: Building Docker images...${NC}"
docker-compose build

echo -e "${BLUE}Step 2: Starting services...${NC}"
docker-compose up -d

echo -e "${GREEN}Step 3: Waiting for services to be ready...${NC}"
sleep 10

# Check if services are running
echo -e "${BLUE}Checking service status...${NC}"
docker-compose ps

echo -e "${GREEN}✓ Services started successfully!${NC}"

# Display access information
echo ""
echo "========================================="
echo "Setup Complete!"
echo "========================================="
echo ""
echo -e "${GREEN}Your application is now running:${NC}"
echo "  Web:      http://localhost"
echo "  Database: localhost:3306"
echo ""
echo -e "${BLUE}Database Credentials:${NC}"
echo "  Username: bitpromarketprim_user"
echo "  Password: bitpromarketprim_user"
echo "  Database: bitpromarketprim_database"
echo ""
echo -e "${BLUE}Useful Commands:${NC}"
echo "  View logs:     docker-compose logs -f"
echo "  Stop services: docker-compose down"
echo "  Restart:       docker-compose restart"
echo ""
echo -e "${BLUE}Health Check:${NC}"
echo "  http://localhost/health-check.php"
echo ""
echo -e "${BLUE}Admin Panel:${NC}"
echo "  http://localhost/admin/login.php"
echo ""
echo -e "${BLUE}User Dashboard:${NC}"
echo "  http://localhost/user/dashboard.php"
echo ""

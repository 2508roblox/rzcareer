#!/bin/bash

# Cấu hình các biến
REPO_URL="https://github.com/2508roblox/laravel_ci_cd.git"
APP_DIR="/var/www/laravel_ci_cd"
BRANCH="main"
PHP_VERSION="8.2"
NGINX_SITE="/etc/nginx/sites-available/laravel_ci_cd"
NGINX_SITE_ENABLED="/etc/nginx/sites-enabled/laravel_ci_cd"



# Tải mã nguồn về
echo "Cloning repository..."
if [ -d "$APP_DIR" ]; then
    echo "Directory $APP_DIR already exists. Pulling latest changes..."
    cd $APP_DIR
    git pull origin $BRANCH
else
    git clone $REPO_URL $APP_DIR
    cd $APP_DIR
fi


# Cài đặt quyền truy cập cho các thư mục cần thiết
echo "Setting permissions..."
sudo chown -R www-data:www-data $APP_DIR/storage
sudo chown -R www-data:www-data $APP_DIR/bootstrap/cache

# Cập nhật cấu hình Nginx
echo "Updating Nginx configuration..."
if [ -f "$NGINX_SITE_ENABLED" ]; then
    sudo rm $NGINX_SITE_ENABLED
fi
sudo ln -s $NGINX_SITE $NGINX_SITE_ENABLED

# Kiểm tra và khởi động lại Nginx
echo "Testing Nginx configuration..."
sudo nginx -t
echo "Restarting Nginx..."
sudo systemctl restart nginx

# Khởi động lại PHP-FPM
echo "Restarting PHP-FPM..."
sudo systemctl restart php$PHP_VERSION-fpm

# Kết thúc
echo "Deployment completed successfully!"

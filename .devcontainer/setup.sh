#!/bin/bash

# Wait for MySQL to be ready
echo "🔄 Waiting for MySQL to be ready..."
while ! mysqladmin ping -h mysql -u root -padmin --silent; do
    sleep 1
done

echo "✅ MySQL is ready!"

# Install Composer dependencies
echo "📦 Installing Composer dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

# Install NPM dependencies
echo "📦 Installing NPM dependencies..."
npm install

# Copy environment file and configure for Docker
if [ ! -f .env ]; then
    echo "⚙️ Setting up environment configuration..."
    cp .env.example .env

    # Update database configuration for Docker
    sed -i 's/DB_HOST=127.0.0.1/DB_HOST=mysql/' .env
    sed -i 's/DB_PORT=3307/DB_PORT=3306/' .env
    sed -i 's/DB_USERNAME=root/DB_USERNAME=root/' .env
    sed -i 's/DB_PASSWORD=admin/DB_PASSWORD=admin/' .env
else
    echo "⚙️ Updating existing .env for Docker environment..."
    # Update existing .env file for Docker
    sed -i 's/DB_HOST=127.0.0.1/DB_HOST=mysql/' .env
    sed -i 's/DB_PORT=3307/DB_PORT=3306/' .env
fi

# Generate application key
echo "🔑 Generating application key..."
php artisan key:generate --force

# Run database migrations
echo "🗄️ Running database migrations..."
php artisan migrate --force

# Build assets
echo "🎨 Building assets..."
npm run build

# Set proper permissions
echo "🔐 Setting proper permissions..."
sudo chown -R vscode:vscode storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo "🚀 Setup complete!"
echo "📝 To start the application, run: php artisan serve --host=0.0.0.0 --port=8000"
echo "🌐 The app will be available at the forwarded port 8000"

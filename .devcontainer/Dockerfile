FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    default-mysql-client \
    sudo \
    vim \
    nano

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create user
RUN useradd -ms /bin/bash vscode && \
    usermod -aG sudo vscode && \
    echo 'vscode ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

# Set working directory
WORKDIR /workspace

# Change ownership of working directory
RUN chown -R vscode:vscode /workspace

USER vscode
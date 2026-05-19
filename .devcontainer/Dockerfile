FROM mcr.microsoft.com/devcontainers/php:0-8.2

# Fix Yarn GPG key issue
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /usr/share/keyrings/yarn-archive-keyring.gpg > /dev/null \
    && echo "deb [signed-by=/usr/share/keyrings/yarn-archive-keyring.gpg] https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    git \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js 20.x
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && npm install -g npm \
    && rm -rf /var/lib/apt/lists/*
    
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl git unzip sqlite3 libsqlite3-dev libonig-dev libxml2-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_sqlite bcmath ctype fileinfo mbstring xml

RUN chown -R vscode:vscode /workspace || true

USER vscode
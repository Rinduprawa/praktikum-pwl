# See https://aka.ms/vscode-remote/devcontainer.json for format details
FROM mcr.microsoft.com/devcontainers/php:0-8.2

# Install system dependencies and PHP extensions required by Laravel
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    git \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js 20.x for Laravel Vite and frontend tooling
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && npm install -g npm \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions for Laravel
# RUN docker-php-ext-install pdo pdo_sqlite bcmath ctype fileinfo json mbstring openssl tokenizer xml zip

# Ensure the vscode user owns the workspace folder
RUN chown -R vscode:vscode /workspace || true

# Switch back to the vscode user
USER vscode

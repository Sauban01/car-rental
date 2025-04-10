# Use the official PHP image from Docker Hub
FROM php:8.4-cli

# Set the working directory in the container
WORKDIR /app

# Copy all files from your project to the container
COPY . /app

# Install dependencies (if using Composer)
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Expose the port Render will use
EXPOSE 8080

# Command to run when the container starts
CMD ["php", "-S", "0.0.0.0:8080"]

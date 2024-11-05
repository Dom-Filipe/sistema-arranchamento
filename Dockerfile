# Use a imagem PHP com Apache
FROM php:8.0-apache

# Instale extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Habilite mod_rewrite para Apache
RUN a2enmod rewrite

# Copie os arquivos do projeto para o diretório raiz do Apache
COPY . /var/www/html

# Ajuste permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Defina o diretório de trabalho
WORKDIR /var/www/html

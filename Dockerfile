# 使用するベースイメージ
FROM php:8.2.6

# 必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Laravelアプリケーションのルートディレクトリを指定
COPY . /app
WORKDIR /app

# Laravelアプリケーションのファイルをコピー
COPY . .

# Composerの依存関係をインストール
RUN composer install

# アプリケーションキーを生成
RUN php artisan key:generate

# ポートをエクスポート
EXPOSE 8000

# サーバーを起動
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]

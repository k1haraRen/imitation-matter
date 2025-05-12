# imitation-matter

## 主な機能

- ユーザー登録、ログイン、ログアウト（Laravel Fortify）
- マイページ機能（ユーザーデータの更新）
- 商品一覧・詳細表示
- 商品検索（キーワード検索）
- 商品出品・購入（Stripe 決済）
- お気に入り登録／解除
- コメント投稿・表示機能

---

## 技術スタック

- OS：Linux（Docker）
- バックエンド：PHP 7.4 / Laravel 8
- フロントエンド：Blade, JavaScript（fetch API）
- データベース：MySQL 8.0
- メール送信：MailHog
- 決済システム：Stripe（カード・コンビニ払い）
- Webサーバー：nginx 1.21

---

## セットアップ手順（ローカル環境）

### 1. リポジトリのクローン

```bash
git clone https://github.com/k1haraRen/imitation-matter.git
cd imitation-matter
```

2. Docker 起動
```bash
docker-compose up -d --build
```

3. PHP コンテナに入る
```bash
docker-compose exec php bash
```

4. Composer インストール
```bash
composer install
```

5. .env 設定
```bash
cp .env.example .env
```
.env に以下の環境変数を記述：

```env
DB_HOST=mysql
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=example@example.com
MAIL_FROM_NAME="${APP_NAME}"
```
6. Laravel のセットアップ
```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```
Fortify セットアップ手順
```bash
composer require laravel/fortify
```
config/app.php に以下を追加：

```php
App\Providers\FortifyServiceProvider::class,
```
以下のコマンドを実行：

```bash
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
php artisan migrate
```

Stripe セットアップ手順
1. Stripe アカウントを作成し、テスト用公開キー・秘密キーを取得

2. .env に STRIPE_KEY と STRIPE_SECRET を記述

# laravel-setup-base
プロジェクト直下に.envを作成（既にファイルがあり以下の記述があれば不要）
touch .env

.envに以下を記述（UID/GIDはホストOSのユーザーIDに合わせて設定）
UID=1000
GID=1000

Docker ビルド 
docker-compose up -d --build

PHPコンテナに入る 
docker-compose exec php bash

Composer インストール 
composer install

.env 作成 
cp .env.example .env

アプリキー生成 php artisan key:generate

PHPコンテナから出る　Ctrl+D

体重管理画面：http://localhost/weight_logs
目標設定：http://localhost/wight_logs/goal_setting

新規登録画面：http://localhost/register/step1
初期体重登録画面：http://localhost/register/step2
ログイン画面：http://localhost/login

ER図
![alt text](er.png)
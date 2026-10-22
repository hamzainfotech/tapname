# TAP.NAME - Laravel Application

NFC business cards & Google Review stands (Hong Kong).

- Marketing site: tap.name/
- Public NFC profile pages: tap.name/{code}
- Account dashboard: account.tap.name

## Local setup

composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan serve

## Database

Schema file: tapnamedatabase.sql (import via phpMyAdmin).
Re-import whenever schema changes.

## Manual deployment (no shell/composer on hosting)

1. Run composer install locally and upload whole project (including vendor/) to server, e.g. ~/tapname/ (outside public_html).
2. Copy contents of tapname/public/ into public_html/.
3. Edit public_html/index.php paths to ../tapname/vendor/autoload.php and ../tapname/bootstrap/app.php.
4. Point both tap.name and account.tap.name document roots to public_html/.
5. Create MySQL database, import tapnamedatabase.sql via phpMyAdmin.
6. Create ~/tapname/.env with DB credentials and APP_KEY.
7. Link storage or configure disk.

## Tests

php artisan test

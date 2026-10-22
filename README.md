# TAP.NAME - Laravel Application

NFC business cards & Google Review stands (Hong Kong).

- Marketing site: tap.name/
- Public NFC profile pages: tap.name/{code}
- Account dashboard: account.tap.name
- Admin panel: admin.tap.name (separate admin guard)

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
4. Point tap.name, account.tap.name, and admin.tap.name document roots to public_html/.
5. Create MySQL database, import tapnamedatabase.sql via phpMyAdmin.
6. Create ~/tapname/.env with DB credentials and APP_KEY.
7. Link storage or configure disk.

## Admin access

Default admin (from seeder / SQL dump): admin@tap.name / password. Change immediately.

Promote or create an admin directly in MySQL:

```sql
INSERT INTO admins (name, email, password, created_at, updated_at)
VALUES ('Admin', 'admin@example.com', '<bcrypt hash>', NOW(), NOW());
```

Generate a bcrypt hash locally with `php -r "echo password_hash('your-password', PASSWORD_BCRYPT, ['cost'=>12]);"`.

## Dynamic homepage CMS

Homepage sections are stored as metadata (title, subtitle, body text, links) and rendered with markup kept in `marketing.blade.php`. Edit them from admin.tap.name → Frontend Website. Complex markup stays hardcoded in the blade when it does not map to a DB field.

## Tests

php artisan test

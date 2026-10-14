# AGENTS.md — mix-d (CodeIgniter 3.1.13)

Stock CodeIgniter 3 project. No custom app code yet (only `application/controllers/Welcome.php`), no tests, no CI, no git, no `vendor/`.

## Structure — do not guess wrong
- Entrypoint: `index.php` (front controller) → `system/core/CodeIgniter.php`. Routing: `application/config/routes.php` (`default_controller = 'welcome'`).
- App code lives ONLY in `application/` (`controllers/`, `models/`, `views/`, `libraries/`, `helpers/`, `core/`, `config/`, `hooks/`, `third_party/`). Never edit `system/` — framework core.
- CI3 MVC conventions: controller file `application/controllers/Foo.php` contains `class Foo extends CI_Controller`, filename/class are `Ucfirst`; URL is `example.com/class/method/id`. Models in `application/models/`, loaded via `$this->load->model()`. Views via `$this->load->view('name')`.
- Every app PHP file must start with `defined('BASEPATH') OR exit('No direct script access allowed');`
- Core extension prefix is `MY_` (`$config['subclass_prefix']`); e.g. `application/core/MY_Controller.php`. Autoload additions go in `application/config/autoload.php` (currently all empty).

## Config gotchas (verified)
- `application/config/config.php`: `base_url` is hardcoded to `http://localhost/BaseFullstackProject/` — update per environment; `index_page = ''` pairs with root `.htaccess` rewrite `^(.*)$ index.php/$1`. Keep them in sync or routing 404s.
- `ENVIRONMENT` comes from `$_SERVER['CI_ENV']`, defaults to `development` in `index.php`.
- `application/config/database.php` is unconfigured (`hostname localhost`, empty username/password/database, `mysqli` driver). No DB work will run until filled in.
- Sessions: `sess_driver = 'files'`, `sess_save_path = NULL` (uses PHP default / tmp). Must set absolute writable path for production.
- `$config['composer_autoload'] = FALSE`; enabling requires `application/vendor/autoload.php` or explicit path.
- Encryption key is set, CSRF/hooks/caching/log (`log_threshold = 0`) are off by default.

## Run / verify (no tooling in repo)
- Serve via Laragon Apache docroot at this folder (`.htaccess` requires mod_rewrite), or `php -S localhost:8000` for quick checks. No `composer install` has been run (`composer.json` requires only `php >=5.3.7`); `vendor/` absent.
- No phpunit config, no lint/typecheck/formatter scripts. Verify with `php -l <file>` and manual browser/CLI request. Note: framework is CI 3.1.13 (2022) running on PHP 8.3 — expect deprecation warnings; keep `ENVIRONMENT=development` while debugging.

## Mix-D Project Architecture & Conventions (Implemented)
- **Database**: MySQL `mix_d` via Laragon (`root` with empty password). Schema and initial seed data in root [database.sql](file:///c:/laragon/www/mix-d/database.sql).
  - Tables: `users`, `categories`, `products`, `store_settings`, `visitor_logs`, `login_attempts`.
- **Default Admin Account**:
  - Username: `admin` | Email: `admin@mixd.com` | Password: `admin123` (hashed with `PASSWORD_BCRYPT`).
- **Base Controllers (`application/core/MY_Controller.php`)**:
  - `MY_Controller`: Base for public customer controllers (`Home`, `Products`, `About`, `Cart`). Autoloads store settings, daily visitor logger, and cart item counter.
  - `Admin_Controller`: Base for protected admin controllers (`Dashboard`, `Products`, `Categories`, `Settings`). Enforces `admin_logged_in` session check.
- **Cart & WhatsApp Checkout (`application/libraries/Cart_service.php`)**:
  - Session-based cart with shoe sizing keys (`product_id_size`), quantity updates, and formatted text generator for WhatsApp ordering (`wa.me` destination configurable in Store Settings).
- **Security & Uploads**:
  - CSRF Protection enabled in `config.php` (`csrf_mixd_token`). All POST forms include CSRF token.
  - Product images stored in `uploads/products/`.
  - Rate limiting on admin login (`User_model::checkRateLimit`).
- **Frontend Stack**:
  - Tailwind CSS via CDN with customized slate-950 and amber leather theme.
  - Google Font: Plus Jakarta Sans.

## Style
- Tabs, LF, `utf-8`, final newline (`.editorconfig`). Match existing CI3 style (tabs, `array()` syntax in config).

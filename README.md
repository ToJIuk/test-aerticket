
## Test Aerticket

Run next commands:
- composer install (composer install --ignore-platform-reqs)
- ./vendor/bin/sail up
- ./vendor/bin/sail artisan migrate

Authorized user data:
- login - admin
- password - admin

The client page is available at http://localhost

API can be tested separately at http://localhost/api/flights/search

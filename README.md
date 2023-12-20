# DropDB
Database web app for archiving Linus dropping things.

This is a fun side project I decided to start as a break from all the "serious" SaaS type projects. This is built on the "Sweet Laravel" stack (Laravel, Splade, Vue and Tailwind CSS).

> All property belongs to Linus Media Group and associated parties. This project is only meant for fun + archiving. I am bad at legal stuff. Reach out to me if You feel like there is an issue.

## Deployment
To start, you will need the following:
- PHP 8+
- Composer 2
- Node.js (LTS recommended)

Once you have all the necessary items, run the following commands:
```bash
# Either clone it via Git or download the repository
git clone https://github.com/safeboot/dropdb.git

cd dropdb

# Install Composer packages
composer install

# Install and build Node.js
npm install
npm run build

# Copy the .env.example file and setup your variables
cp .env.example .env

# Prepare the sauce
php artisan key:generate
php artisan optimize:clear

# Migrate and seed your Database
php artisan migrate --seed
```

## TO-DO
- [x] Leaderboard (per host)
- [x] Drop Submission Form
- [ ] Dashboard
- [ ] Impact Rating
- [ ] Share Links per Drop

## License
This project is under the MIT license, for more information, view the [LICENSE.md](LICENSE.md) file.

### HOW TO RUN THIS PROJECT

1. Clone the project

    - git clone https://github.com/ekasaragih/produk-anisa
    - cd manazashi_3

2. Install dependencies

    - composer install
    - npm install

3. Create an .env File

    - cp .env.example .env
    - php artisan key:generate

4. Run DB Migration

    - php artisan migrate
    - php artisan db:seed

5. Compile Frontend Assets

    - npm run build -> to run vite

6. Start the Development Server
    - php artisan serve

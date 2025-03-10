# TrackMe

TrackMe is a web application built with Laravel and JavaScript.
It provides an admin panel for managing tracking scripts and offers integration with various services.

## Usage

- Access the admin panel at `/admin` (default credentials: `admin@admin.com:password`)
- Check the source code on [GitHub](https://github.com/bullder/trackMe)
- Watch the introductory video on [YouTube](https://youtu.be/-1cqXIUkXZ0)

## Features

- Admin panel for managing tracking scripts
- Integration with external services
- User authentication
- Responsive design

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/bullder/trackMe.git
    cd trackMe
    ```

2. Install dependencies:
    ```sh
    composer install
    npm install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```sh
    cp .env.example .env
    ```

4. Generate the application key:
    ```sh
    php artisan key:generate
    ```

5. Run the migrations:
    ```sh
    php artisan migrate
    ```

6. Start the development server:
    ```sh
    php artisan serve
    ```

## DB schema

The `visitors` table schema is designed to store information about visitors to your web application. Here is the schema for the `visitors` table:

- `id`: A unique identifier for each visitor (primary key).
- `uid`: A unique identifier for the user.
- `vid`: A unique identifier for the visitor session.
- `agent`: The user agent string of the visitor's browser.
- `language`: The language setting of the visitor's browser.
- `url`: The URL visited by the visitor.
- `site`: The site visited by the visitor.
- `ip`: The IP address of the visitor.
- `at`: The timestamp when the visitor accessed the site.

Here is the SQL code to create the `visitors` table:

```sql
create table visitors
(
    id       integer  not null primary key autoincrement,
    uid      varchar  not null,
    vid      varchar  not null,
    agent    text     not null,
    language varchar  not null,
    url      text     not null,
    site     text     not null,
    ip       varchar  not null,
    at       datetime not null
);
```


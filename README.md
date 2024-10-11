# HelloAsso

A crowdfunding project as donations to the people in need. The project is built with **Laravel** and uses **MySQL** as the database.

## Table of content

1. [Installation](#installation)
2. [Configuration](#configuration)
3. [Usage](#usage)
4. [Contributing](#contributing)
5. [Style guide](#style-guide)

## Installation

1. First, clone the repository into your local machine:

```bash
git clone https://github.com/AmazingTool777/gestion-association-laravel-mysql.git
```

2. Install the Laravel project's PHP dependencies using [Composer](https://getcomposer.org/):

```bash
composer install
```

If you do not have Composer installed, you can dowwnload it [here](https://getcomposer.org/download/).

3. Install the [NPM](https://www.npmjs.com/) dependencies of the project:

```bash
# Using NPM
npm install

# Or using PNPM
pnpm install

# Or using Bun
bun install
```

Make sure to have [Node.js](https://nodejs.org/en/download/package-manager/current) installed for **NPM** to work. Alternatively, you can install [PNPM](https://pnpm.io/) as an alternative to **NPM** or [Bun](https://bun.sh/) as alternative to **Node.js** if you prefer.

4. Install either [WAMP server](https://www.wampserver.com/) or [XAMPP](https://www.apachefriends.org/fr/download.html) in order to have an **Apache server** and a **MySQL database** database instance running. **XAMPP** is **the most recommended** option and you can download it [here](https://www.apachefriends.org/download.html).

## Configuration

1. Create a `.env` file in the root of the project, then copy the content of the `.env.example` file into the `.env` file.

2. Create an empty database instance in the MySQL server. Note value of the **name** of the database as well as the **username** and the **password** used to access the database, then update the database-related keys in the `.env` file as follows:

```txt
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<database_name>
DB_USERNAME=<database_username>
DB_PASSWORD=<database_password>
```

3. Run the database migrations:

```bash
php artisan migrate
```

4. Seed the database:

```bash
php artisan db:seed
```

5. Enable the **Intl** extension in the `php.ini` file by uncommenting the `extension=intl` line (remove the `;` at the start of the line):

```txt
;extension=intl
```

The [Intl](https://www.php.net/manual/fr/book.intl.php) is an modern API that allows us to write Date-Time in various locales.

6. Generate a **symlink** that links public storage files to the public folder by running the following command:

```bash
php artisan storage:link
```

## Usage

1. Run the [Vite](https://vitejs.dev/) development server for processing frontend assets:

```bash
# Using NPM
npm run dev

# Using PNPM
pnpm dev

# Using Bun
bun dev
```

2. Run the Laravel server:

```bash
php artisan serve
```

3. Open the browser and go to `http://127.0.0.1:8000`. Now you should see the application running. Happy Coding! 😋🎉

## Contributing

The project has **2 mandatory branches**:

-   `main`: The main branch.
-   `develop`: The active development branch.

### `main` branch:

This is the **main** branch.
We **do not directly push commits** onto this branch. Instead, the commits from the `develop` branch are to be merged onto this branch. This branch is designed to maintain a **clean** and **working** state of the application.

### `develop` branch:

This is the branch for the **active development**. This is the branch where all the commits during the active development go.

However, if multiple people are simultaneously working on the project, then each contributor should create a new branch from the `develop` branch and then merge their own respective branches into the `develop` branch once their work is finished. In that case, the name of the branch should start with a **prefix** depending on the assignment that they are working on. Those prefixes could be: `feature/`, `fix/` or `refactoring/`.

## Style guide

### English language codabase

The codebase should be in **english** as much as possible except for the pages' content which is in french. This means that the name of **files**, **variable**, **classes**, **methods** and **branches** should be written in english.

### Per-feature folder structure

A **feature** refers to the major entities (tables) in the database that the basis of the application. For example, we have _user_, _donation call_ as features. _Auth_ is also considered as a feature.

The **resources** (**views**, **css**, **scss**, **js**) that are **related to specific features** inside the `/resources` directory should be organized **by feature**.

For instance, the folder structrure of the resources used to show the page of a list of users should be as follows:

```
Project/
├── ... other files
├── resources/
│   ├── css/
│       ├── user/
│           ├── list.css
│           ├── ... other css files
│       ├── ... other css files or directories
│   ├── js/
│       ├── user/
│           ├── list.js
│           ├── ... other js files
│       ├── ... other js files or directories
│   ├── views/
│       ├── user/
│           ├── list.blade.php
│           ├── ... other blade templates
│       ├── ... other blade templates or directories
│   ├── ... other directories
├── ... other files and directories
```

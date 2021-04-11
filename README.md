### Require

1. [Git](https://git-scm.com/downloads)
2. PHP >= 7.4.0
3. [Node LTS](https://nodejs.org/)
4. [Composer](https://getcomposer.org/)
5. [Yarn](https://classic.yarnpkg.com/lang/en/) và [pnpm](https://pnpm.js.org/en/)

### Setup

#### Download

Clone source from gitlab, setup library

```bash
git clone source.git
cd source
composer install 
npm i 
```

#### Environment Files

- Copy file .env from env/.env.local

```bash
cp env/.env.local .env
```

#### Create Database

```bash
DB_DATABASE=DB_NAME
DB_USERNAME=root
DB_PASSWORD=
```

#### Artisan Commands
```bash
php artisan migrate
```

#### Storage:link

- to link folder public with storage.

```bash
php artisan storage:link
```

#### Code
- run php local server 

```bash
php artisan serve
```

#### Asset
- to build js and css:

```bash
yarn run build-all
```

```bash
yarn run dev | yarn run watch
```

```bash
yarn run development;
```

## library

1. [Ziggy](https://github.com/tightenco/ziggy)
1. [select2](https://github.com/select2/select2)

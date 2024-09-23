# mervyn.online

My website! Recently rebuilt in Laravel, with much work still to do.

## Building locally

I use Lando for development, to make things easy I have included Lando config files in this repository. If you want to set
up a raw Docker container or use another dev tool, feel free to adapt these steps to suit your needs.

1. Install and set up [Lando](https://lando.dev/) and its requirements.
2. Clone and enter this repository:
    ```shell
    $ git clone https://github.com/mervynfoxe/mervyn.online.git
    $ cd mervyn.online
    ```
4. Copy the environment definitions file, and modify the `APP_URL` to your Lando URL.
    ```shell
    cp .env.example .env
    ```
4. Start the container: 
    ```shell
    $ lando start
    ```
5. The container should automatically install dependencies. If it doesn't, do so:
    ```shell
    $ lando composer install
    $ lando npm install
    ```
6. Set up the blog database:
    ```shell
    $ lando php artisan key:generate
    $ lando php artisan migrate
    $ touch /app/prezet.sqlite
    $ lando php artisan prezet:index
    ```
7. Start the dev app:
    ```shell
    $ lando npm run dev
    ```

You should be all good to go by visiting your container URL!

## Deploying
I have included a shell script and two Lando commands to help deploy the site.
Create an override Landofile (e.g. `.lando.local.yml`) and use it to hook into the `deploy-dev` and `deploy-prod`
commands, setting the environment variables as noted in the main Landofile. Calling these
commands will build the site and deploy its production files to the specified server/directory.

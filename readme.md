# FinTS Account Information

This project is used to show bank account informations, like:

- The current account balance
- The last transactions (amount, type and date)

It's easy to configure and deploy it via. Docker

## Starting the project

1. Copy the `.env.example` to `.env` and modify it for your needs (see the chapter below)
2. Check the `docker-compose.yml` file, if neccesary change the port
3. Run `docker compose up -d --build` in the project directory
4. Access it via `http://localhost:8000` and watch your money flow!
    1. (Optional) Configure a reverse proxy to e.g. limit the access for specific users

## Environment Variables

Name                    | Description
APPLICATION_NAME        | Display name of the application. Default: `My FinTS Account`
APPLICATION_MODE        | Debbugging mode, allowed values: `dev` or `prod`. Default: `prod`
FINTS_URL               | The HCBI/FinTS URL from your bank
FINTS_PORT              | The Port for accessing the URL from your bank. Default: `443` (SSL)
FINTS_BANK              | The number of your bank (administrative)
FINTS_ACCOUNT           | The number of your bank account (administrative)
FINTS_PASSWORD          | The password/pin for accessing the FinTS Interface (not your card pin!)

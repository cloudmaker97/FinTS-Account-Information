# FinTS Account Information 

This project is used to show bank account informations, like:

- The current account balance
- The last transactions (amount, type and date)

It's easy to configure and deploy it via. Docker

## Starting the project

1. Creating and modify the files (in the code blocks below) to your needs
2. Type `docker compose up -d` in your console
3. Access the website on this url: `http://localhost:8000`

File: `docker-compose.yml`

```yaml
version: '3'
services:
  webfiles:
    image: ghcr.io/cloudmaker97/docker-bank-account:main
    env_file:
      - .env
    ports:
      - 8000:80
```

File: `.env` - Variables are described in the chapter below

```txt
APPLICATION_NAME=My FinTS Account
APPLICATION_MODE=prod
FINTS_URL="https://fints.example.com"
FINTS_PORT=443
FINTS_BANK="1234567"
FINTS_ACCOUNT="1234567"
FINTS_PASSWORD="changeme"
```

## Environment Variables

Name                    | Description
------------------------|----------------------------------------------------------------------------
APPLICATION_NAME        | Display name of the application. Default: `My FinTS Account`
APPLICATION_MODE        | Debbugging mode, allowed values: `dev` or `prod`. Default: `prod`
FINTS_URL               | The HCBI/FinTS URL from your bank
FINTS_PORT              | The Port for accessing the URL from your bank. Default: `443` (SSL)
FINTS_BANK              | The number of your bank (administrative)
FINTS_ACCOUNT           | The number of your bank account (administrative)
FINTS_PASSWORD          | The password/pin for accessing the FinTS Interface (not your card pin!)

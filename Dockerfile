# Set base image and copy files
FROM webdevops/php-apache:8.1
LABEL product="FinTS Account Info"
LABEL maintainer="dennis.heinrich@posteo.de"
WORKDIR /app
COPY ./sources/ /app
# Environment
ENV APPLICATION_NAME="My Account"
ENV APPLICATION_MODE="prod"
ENV WEB_DOCUMENT_ROOT="/app"
# Account credentials (required)
ENV FINTS_URL=""
ENV FINTS_PORT="443"
ENV FINTS_BANK=""
ENV FINTS_ACCOUNT=""
ENV FINTS_PASSWORD=""
# Avoid applying already existing files 
RUN rm -rf /app/vendor 
RUN composer update
# Expose the image on port 80
EXPOSE 80
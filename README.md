## About Jurnalib

Jurnalib is a web application featuring fast searching of journal rank information by [Scimago](https://www.scimagojr.com/).

## Usage

You can go to here and start searching, or deploy your own self-managed app.
Instruction for deployment can be seen [here](#deployment)

## Architecture


## Deployment

To deploy this application, you can use [Docker](https://www.docker.com/) or install directly on your system. 

### Docker

For deployment with docker, first install required dependencies:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Run container with Laravel Sail:
```
./vendor/bin/sail up
```

Build frontend assets:
```
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

### Configuration

For the server to work properly, you need to configure environment. 
- Copy `.env.example` to `.env`.
- Setup google service account and set the path to credential in this environment varible:
```
GOOGLE_SERVICE_ACCOUNT=
```
- Create new folder in Google Drive for storing journal excel files. Currently Jurnalib only support format exported from Scimago.
- Upload file exported from Scimago, to the folder.
- Add Folder ID to this environment variable:
```
GOOGLE_FOLDER_ID=
```
- Setup cron for periodic tasks:
```
./script/setup_cron.sh
``` 
- (optional) Set Polling schedule with cron expression:
```
SCHEDULE_DOWNLOAD_DRIVE=
```
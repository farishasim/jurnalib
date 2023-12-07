apt-get update
apt-get install cron

echo "* * * * * cd /var/www/html && php artisan schedule:run >> /dev/null 2>&1" > /tmp/cron

crontab /tmp/cron

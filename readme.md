cd /var/www/haton-cache-yd

sudo certbot --nginx -d cache.haton.ru


sudo ln -s /etc/nginx/sites-available/cache.haton.ru /etc/nginx/sites-enabled/


server {
    listen 80;
    server_name tradersfinds.com www.tradersfinds.com ;  # Replace with your actual domain
    index index.php index.html index.htm;

    location / {
        root /var/www/html/tf;  # Update the path to the "sumit" application's public directory
        try_files $uri $uri/ /index.php?$args;

        location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/var/run/php/php7.3-fpm.sock;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }
    }

#    location ^~  /administrator {
#        root /var/www/html/lead-vision/website;  # Update the path to the "admin" application's public directory
#        try_files $uri $uri/ /administrator/index.php?$args;

#        location ~ \.php$ {
#            include snippets/fastcgi-php.conf;
#            fastcgi_pass unix:/var/run/php/php7.3-fpm.sock;
#            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
#            include fastcgi_params;
#        }
#    }

    error_page 404 /404.html;
    error_page 500 502 503 504 /50x.html;
    location = /50x.html {
        root /usr/share/nginx/html;
    }
}

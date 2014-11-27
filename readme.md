Sample Project
========
Short Description of Project

Configure project
------------------------
Follow these steps to run sample project locally

upgrade and update system

      sudo apt-get upgrade
      sudo apt-get update

install vim
 
      sudo apt-get install vim

install nginx

      sudo apt-get install nginx
      sudo apt-get update

now restart nginx 

       sudo service nginx restart

and open browser and go to localhost. A welcome page should appear saying "Welcome to nginx"
edit nginx.conf:

        sudo vim /etc/nginx/nginx.conf
      
      comment the following line : (add # in starting. We are using .conf folder for configuration. we commented this because we are avoiding default configuration of nginx)

      #       include /etc/nginx/sites-enabled/*;
    
      add the following line inside the http block after 'tcp_nodelay on;'

	 client_max_body_size 10M;
         
create enjoyye configure file
     
      cd /etc/nginx/conf.d
      sudo vim sample-project.conf

add following settings in this file

        server {
         listen 80 default_server;
          listen [::]:80 default_server ipv6only=on;

          root /var/www/sampleproject/public;
          index index.php index.html index.htm;

          server_name server_domain_or_IP;

          location / {
              try_files $uri $uri/ /index.php?$query_string;
          }

          location ~ \.php$ {
              try_files $uri /index.php =404;
              fastcgi_split_path_info ^(.+\.php)(/.+)$;
              fastcgi_pass unix:/var/run/php5-fpm.sock;
              fastcgi_index index.php;
              fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
              include fastcgi_params;
          }
      }


now restart nginx 

       sudo service nginx restart


Install php and its extensions
     
       sudo apt-get install php5-mysql php5-curl php5-fpm php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcached memcached php5-xmlrpc php5-xsl php-apc
       
       sudo apt-get update
       sudo service php5-fpm restart

        
edit php.ini file

       sudo vim /etc/php5/fpm/php.ini

change these configurations :

       max_execution_time = 300
       max_input_time = 300 
       memory_limit = 512M
       post_max_size = 32M
       cgi.fix_pathinfo=0
       upload_max_filesize = 12M
       max_file_uploads = 30
       default_socket_timeout = 200

and at then in php.ini add this line at the end to load apc extension
       
        extension=apc.so

        sudo service nginx restart
        sudo service php-fpm restart


install mysql 

      sudo apt-get install mysql-server
      sudo mysql_install_db
      sudo mysql_secure_installation

You will need to enter the MySQL root password that you selected during installation.

Next, it will ask if you want to change that password. If you are happy with your MySQL root password, type "N" for no and hit "ENTER". Afterwards, you will be prompted to remove some test users and databases. You should just hit "ENTER" through these prompts to remove the unsafe default settings.


install phpmyadmin 
     
      sudo apt-get update
      sudo apt-get install phpmyadmin

A final item that we need to address is enabling the mcrypt PHP module, which phpMyAdmin relies on. This was installed with phpMyAdmin so we just need to toggle it on and restart our PHP processor:

      sudo php5enmod mcrypt
      sudo service php5-fpm restart

create phpmyadmin.conf file and add it /etc/nginx/conf.d/ location and write following settings:
     
     server {
        listen 81 default_server;
         root /usr/share/;
        location /phpmyadmin {
                  root /usr/share/;
                  index index.php index.html index.htm;
         }
         location ~ ^/phpmyadmin/(.+\.php)$ {
                 try_files $uri =404;
                 fastcgi_pass unix:/var/run/php5-fpm.sock;
                 fastcgi_index index.php;
                 include fastcgi_params;
                 fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
         }
        location ~* ^/phpmyadmin/(.+\.(jpg|jpeg|gif|css|png|js|ico|html|xml|txt))$ {
                 root /usr/share/;
        }
    }
   

restart fpm. 
   
    sudo service php5-fpm restart
    sudo service nginx restart
  
now go to localhost:81/phpmyadmin to check whether it is working or not.

install git        
    
      sudo apt-get install git

goto /var
   
      cd /var
  
create www directory    
      
      sudo mkdir www
      cd www/

configure git

      git config --global user.name "<your username>"
      git config --global user.email "<your email>"

clone repository
	
      fork sample project	
      sudo git clone https://github.com/nitesh-sourcefuse/sampleproject.git

restart services

      sudo service nginx restart
      sudo service php5-fpm restart      


now open your browser and go to localhost. it will work now.
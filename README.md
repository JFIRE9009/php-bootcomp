# Camagru
Introduction to Web

# Requirements
A MySQL instance, eg. Xampp or Mamp
PHP (pre-installed with Xampp or Mamp)
HTML
CSS
JavaScript

# Installation
A server is required to host the web app. Xampp or mamp can be used. A Xampp installation guide can be found at: https://www.youtube.com/watch?v=xdvVKywGlc0&t=607s.

During the installation process the following credentials should be set:

username: 'root'

password: 'mampass'

Once a localhost server is installed, navigate to the htdocs directory. Clone (or download & unzip) the camagru repo into htdocs

cd xampp/htdocs/
git clone https://github.com/jhoustonmc/camagru.git

Start both the Apache & MySql servers on the Xampp Control Panel. Search 'localhost' in your web browser to ensure everything has been installed correctly.
If so, this should take you to the Xampp landing page. 
Ensure your php.ini file is setup to send mail.

Navigate to 'localhost/camagru/config/setup.php'. If everything was done correctly up until this point, it will automatically route you to the login / signup page of the web application and you may begin your adventures in the wonderful land of Camagru!
   
   

#!/bin/bash

export DEBIAN_FRONTEND=noninteractive
apt-get update
apt-get upgrade -y
curl -fsSL https://get.docker.com -o get-docker.sh
sh get-docker.sh
usermod -a -G docker vagrant
apt install docker-compose -y
dpkg -r --force-depends golang-docker-credential-helpers

echo "APP_URL=\http://$ip\"" >> /etc/environment
echo "PROJECT_NAME=\"$PROJECT_NAME\"" >> /etc/environment
echo "APP_NAME=\"$APP_NAME\"" >> /etc/environment

# enable color in console
sed -i -r 's/#force_/force_/' /home/vagrant/.bashrc

# set dir after login
echo "cd /var/www/app" >> /home/vagrant/.bashrc

# set alias for console and composer
echo "alias console='/var/www/app/docker/dev.sh exec php /var/app/bin/console'" >> /home/vagrant/.bashrc
echo "alias composer='docker run --volume /var/www/app/code:/app composer:latest composer'" >> /home/vagrant/.bashrc

chown vagrant:vagrant /home/vagrant/.bashrc

service docker status
service docker start
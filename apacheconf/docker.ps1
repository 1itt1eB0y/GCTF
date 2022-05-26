docker volume create yiidb
docker network create --driver bridge --subnet=172.18.0.0/16 --gateway=172.18.0.1 yii
docker run -d --restart=always --network yii --ip 172.18.0.3 --name yii2db -v yii2db:/var/lib/mysql --env MYSQL_USER=yii2 --env MYSQL_PASSWORD=toor --env MYSQL_ROOT_PASSWORD=toor -p 53306:3306 mysql:8.0-debian

$dir=Convert-Path F:/User/Document/学校杂物/课设/advanced/
docker run -d --restart=always --network yii --ip 172.18.0.2 --name yii2php -v "${dir}:/app" -v /var/run/docker.sock:/var/run/docker.sock -p 80:80 -p 81:81 yiisoftware/yii2-php:7.4-apache

docker run -d -p 127.0.0.1:9443:9443 --name portainer --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v portainer_data:/data portainer/portainer-ee
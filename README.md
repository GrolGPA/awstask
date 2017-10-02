# awstask

Running container in docker-compose:
1.Adding network front:
   docker network create front 
2. Start Docker nginx-proxy:
   docker run -d -p 80:80 --name proxy -v /var/run/docker.sock:/tmp/docker.sock:ro --net host --restart always jwilder/nginx-proxy
3.  Add to /etc/hosts: domen name  aws.task, db.aws.task (phpMyAdmin)
4. Starting container:
   docker-compose up -d --build


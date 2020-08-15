FROM nginx:1.19-alpine

ADD ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /work/app/public

ADD ./public /work/app/public
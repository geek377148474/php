FROM nginx
ONBUILD RUN echo 'hello, onbuild success' > /usr/share/nginx/html/index.html
EXPOSE 80
# docker build -t basenginx basenginx/
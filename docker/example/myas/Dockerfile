FROM nginx as gateway
RUN echo 'gateway run' > /usr/share/nginx/html/index.html

FROM nginx as gateway2
RUN echo 'gateway2 image' > /usr/share/nginx/html/index.html
ENTRYPOINT ['cat', '/usr/share/nginx/html/index.html']

# docker build --target=gateway -t myas .

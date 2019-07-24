# 设定基础层
FROM alpine:latest
# 在基础层内部执行命令，构建存储层
RUN apk add --update curl
# CMD [ "curl", "-s", "https://ip.cn" ]
ENTRYPOINT [ "curl", "-s", "https://ip.cn" ]

# docker build -t myip .
# docker run myip
# docker run myip -i
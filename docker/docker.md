## docker实操系列



#### 操作镜像

---

###### 获取

- 查询镜像

  `docker search [imageName:version]`

- 获取镜像

  `docker pull [imageName:version]`

###### 列表

- 本地镜像列表

  `docker images ` 或`docker image ls`

- 本地镜像列表中搜索某个镜像

  `docker images [imageName:version]`或`docker image ls [imageName:version]`

- 本地镜像列表过滤搜索虚悬镜像

  `docker iamge ls -f dangling=true`

- 本地镜像列表搜索指定镜像之后建立的镜像

  `docker image ls -f since=imageName:imageVersion`

- 本地镜像列表包括顶层镜像、中间层镜像、虚悬镜像

  `docker images -a`或`docker image ls -a`

- 本地镜像列表ID

  `docker iamges -q`或`docker image ls -q`

- 本地镜像列表以GO模板语法格式化

  `docker image ls --format "{{.ID}}: {{.Repository}}"`

- 本地镜像列表以表格形式格式化

  `docker image ls --format "table {{.ID}}\t{{.Repository}}\t{{.Tag}}"`

- 本地镜像列表带镜像摘要

  `docker image ls --digests`

###### 删除

- 删除本地镜像(可用镜像短ID、长ID、名或摘要指代镜像)

  `docker image rm [选项] <镜像1> [<镜像2> ...]`

- 删除所有仓库名为imageName的镜像

  `docker image rm $(docker image ls -q imageName)`

- 删除在imageName:imageVersion之后建立的镜像

  `docker image rm $(docker image ls -q -f before=imageName:imageVersion) `
  
- 删除失效依赖

  `docker image prune`

###### 构建

- 保存容器为镜像

  `docker commit [选项] <容器ID或容器名> [<仓库名>[:<标签>]]`

- 构建后查询修改

  `docker diff <容器id或容器名>`

- 使用Dockerfile构建

  `docker built -t <镜像名> <Dockerfile所在目录>`

###### Dockerfile指令

- 设置一个镜像为基础层

  `FROM <镜像名>`

- 设置构建镜像时在内部执行命令

  `RUN <命令>`

- 设置容器启动时执行的完整命令

  `CMD ["curl", "-s", "https://ip.cn" ]`

- 设置容器启动时执行的命令并将CMD内容作为参数传入

  `ENTRYPOINT ["curl", "-s", "https://ip.cn" ]`

- 设置镜像中的文件，<源路径> 可以是多个，甚至可以是通配符，其通配符规则要满足 Go 的 [filepath.Match](https://golang.org/pkg/path/filepath/#Match) 规则

  `COPY [--chown=<user>:<group>] <源路径>... <目标路径>`

  `COPY [--chown=<user>:<group>] [<源路径1>,... <目标路径>]`

  `COPY hom* /mydir/`
  
  `COPY hom?.txt /mydir/`

- 设置环境变量

  `ENV <key> <value>`

  `ENV <key1>=<value1> <key2>=<value2>...`

- 设置随机映射下的自动映射端口

  `EXPOSE <端口1> [<端口2>...] `

- 设置工作目录

  `WORKDIR <工作目录路径>`

- 设置下次构建的构建程序

  `ONBUILD <其它指令>`

- 设置挂载目录

  `VOLUME ["<路径1>", "<路径2>"...]`

###### 






#### 操作容器

---

###### 查询

- 获取当前正在运行的容器列表

  `docker container ls`

- 获取所有包括正在运行、已经终止的容器列表

  `docker container ls -a`

- 获取容器的输出信息

  `docker container logs [container ID or NAMES]`

###### 启动

- 以镜像为基础启动容器

  `docker run <镜像名>`

- 分配一个伪终端(pseudo-tty)并绑定到容器的标准输入上

  `docker run -t alpine:latest`

- 让容器的标准输入保持交互式

  `docker run -i alpine:latest`

- 让容器启动一个sh终端，允许用户进行交互

  `docker run -it alpine:latest`

- 让容器以daemon守护形式启动

  `docker run -it -d alpine:latest`

- 给容器起一个名字后启动

  `docker run -it -d --name [containerName] alpine:latest`

- 让容器启动时用本地端口代理容器端口

  `docker run -it -d -p [localPort:containerPort]  alpine:latest`

- 让一个容器在终止后自动删除

  `docker run -it -d --rm alpine:latest`

- 启动一个已经终止的容器

  `docker container start ` + (容器id前四位|容器名字)
  
- 启动时挂载目录到容器中

  `docker run -it -d -v [SRC_PATH]:[DEST_PATH] --rm [imageName]`

###### 终止

- 终止一个正在运行的容器

  `docker container stop [container ID or NAMES] `

- 重启容器

  `docker container restart [container ID or NAMES]`

###### 进入

- 本机操作形式进入容器

  `docker attach [container ID]`

- 伪终端形式进入容器

  `docker exec -it [container ID] [/usr/bash or /usr/sh]`

###### 删除

- 删除已停止的容器

  `docker container rm ` + (容器id前四位|容器名字) 

- 删除正在运行的容器

  `docker container rm -f ` + (容器id前四位|容器名字)

- 删除所有处于终止状态的容器

  `docker container prune`

###### 改进

- 从SRC_PATH复制到DEST_PATH

  `docker cp [OPTIONS] CONTAINER:SRC_PATH DEST_PATH`

  `docker cp [OPTIONS] SRC_PATH CONTAINER:DEST_PATH`

  
































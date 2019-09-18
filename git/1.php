<?php
/*

@设置别名 - 自定义git

--global是针对当前用户起作用
    每个仓库的Git配置文件都放在.git/config文件中
不加，那只针对当前的仓库起作用
    当前用户的Git配置文件放在用户主目录下的一个隐藏文件.gitconfig中


git config --global alias.st status
git config --global alias.co checkout
git config --global alias.ci commit
git config --global alias.br branch

git reset HEAD file
git config --global alias.unstage 'reset HEAD'

git config --global alias.last 'log -1'
git config --global alias.lg "log --color --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset' --abbrev-commit"
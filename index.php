<?php
require 'common/function.php';

if (dirname($_SERVER['SCRIPT_FILENAME']) != 'DesignPatterns') {
    chdir('DesignPatterns');
}




#================================ 创建型模式 =================================#
##   实现该模式的类 为创建对象而生
# - [单例模式]
# - [工厂模式]
# - [抽象工厂模式]
# - [原型模式]
# - [建造者模式]


## - [单例模式]
// require 'Singleton.php';


## - [工厂模式]
/**
 * 工厂方法模式和抽象工厂模式的核心区别
 * 工厂方法模式利用继承,抽象工厂模式利用组合
 * 工厂方法模式产生一个对象,抽象工厂模式产生一族对象
 * 工厂方法模式利用子类创造对象,抽象工厂模式利用接口的实现创造对象
 * 工厂方法模式可以退化为简单工厂模式(非23中GOF)
 */
// require 'Factory.php';


## - [抽象工厂模式]
/* 
* 说说我理解的工厂模式和抽象工厂模式的区别：
* 工厂就是一个独立公司,负责生产对象；
* 抽象工厂就是集团,负责生产子公司（工厂）；
*/
// 适用于更大型设计,比如框架
// 模拟调用, 抽象工厂模式核心是面向接口编程
// require 'AbstractFactory.php';


## - [原型模式]
/**
 * php原型模式
 * 用于创建对象成本过高时
 */
// require 'Prototype.php';


## [建造者模式]
/**
 * php建造者模式
 * 简单对象构建复杂对象
 * 基本组件不变,但是组件之间的组合方式善变
 */
// require 'Builder.php';


#================================= 结构型模式实例 =================================# 
##   实现该模式的类针对结构方面做设计
# - [桥接模式]
# - [享元模式]
# - [门面模式]
# - [适配器模式]
# - [装饰器模式]
# - [组合模式]
# - [代理模式]
# - [过滤器模式]


## - [桥接模式]
/*
* php桥接模式
* 基础的结构型设计模式：将抽象和实现解耦,对抽象的实现是实体行为对接口的实现
* 例如：人 => 抽象为属性：性别 动作：吃 => 人吃的动作抽象为interface => 实现不同的吃法
*/
// require 'Bridge.php';


## - [享元模式]
/* 
* php享元（轻量级）模式
* 就是缓存了创建型模式创建的对象,不知道为什么会归在结构型模式中,个人觉得创建型模式更合适,哈哈～
* 其次,享元强调的缓存对象,外观模式强调的对外保持简单易用,是不是就大体构成了目前牛逼哄哄且满大
* 的街【依赖注入容器】
*/
// require 'FlyWeight.php';


## - [门面模式]
/*
* php外观模式
* 把系统中类的调用委托给一个单独的类,对外隐藏了内部的复杂性,很有依赖注入容器的感觉哦
*/
// require 'Facade.php';


## - [适配器模式]
/*
 * php适配器模式
 * 把实现了不同接口的对象通过适配器的方式组合起来放在一个新的环境
 */
// require 'Adapter.php';


## - [装饰器模式]
/*
 * 对现有的对象增加功能
 * 和适配器的区别：适配器是连接两个接口,装饰器是对现有的对象包装
 */
// require 'Decorator.php';


## - [组合模式]
/*
* php组合（部分整体）模式
* 定义：将对象以树形结构组织起来,以达成“部分－整体”的层次结构,使得客户端对单个对象和组合对象的使用具有一致性
* 我的理解：把对象构建成树形结构
*/
// require 'Composite.php';


## - [代理模式]
/*
 * @php代理器模式
 * 对对象加以【控制】
 * 真正需要的时候才会创建对象
 * 不会拥有现有对象
 * 
 * @
 * 和适配器的区别：适配器是连接两个接口（【改变】了接口）
 * 和装饰器的区别：装饰器是对现有的对象包装（【功能扩展】）
 * 
 * 优势：代理模式实现延迟加载的方法及其意义
 * 
 * @延迟加载的核心思想是：如果当前并没有使用这个组件，
 * 则不需要真正地初始化它，
 * 使用一个代理对象替代它的原有的位置，(虚拟代理)
 * 只要在真正需要的时候才对它进行加载。
 * 
 * @
 * - 动态代理：通过反射机制和__call方法 当真正需要的时候通过反射invoke
 * - 静态代理：通过参数传给方法判断 生成对象到属性调用
 * - 两者相比：静态代理每代理一个对象 都需要在代理类中添加代码 增添一系列操作.具有重复代码 灵活性不好的缺点.
 *            动态代理较耗性能 但可以减少代理类的数量 使用更灵活
 * 
 * @代理应用场合
 * - 远程代理 为一个对象在不同的地址空间提供局部代表 隐藏一个对象存在于不同地址空间的事实
 * - 虚拟代理 根据需要创建开销很大的对象 通过它来存放实例化需要很长时间的真实对象的虚拟对象
 * - 安全代理 控制真实对象访问时的权限 一般用于对象应该有不同的访问权限
 * - 指针引用 是指当调用真实的对象时 代理处理另外一些事 通过代理在访问一个对象时附加一些内务处理
 *            比如计算真实对象的引用次数 这样当该对象没有引用时 可以自动释放它
 *            或当第一次引用一个持久对象时 将它装入内存 或是在访问一个实际对象前
 *            检查是否已经释放它 以确保其他对象不能改变它
 * - 延迟加载 提高系统的性能 Hibernate中的延迟加载主要分为属性的延迟加载和关联表的延时加载两类
 *            实现原理是使用代理拦截原有的getter方法 在真正使用对象数据时才去数据库或者其他第三方组件加载实际的数据
 *            从而提升系统性能
 */
// require 'Proxy.php';


## - [过滤器模式]
/**
 * php过滤器模式
 * 过滤类使用不同的标准来过滤一组对象
 * 利用标准筛选合适的对象
 * 可以实现过滤器拦截
 * 
 * 可以结合到动态代理中
 * 筛选掉没有对应反射方法的对象中去
 * 
 * 也可以应用到单元测试用
 * 只要是筛选合适的目标时即可应用
 */
// require 'Filter.php';



#================================= 行为型模式 ===============================#
##   实现的类控制了其他类或自类的算法行为
# - [模板模式]
# - [策略模式]
# - [状态模式]
# - [观察者模式]
# - [责任链模式]
# - [访问者模式]
# - [解释器模式]
# - [备忘录模式]
# - [命令模式]
# - [迭代器模式]
# - [中介者器模式]
# - [空对象模式]


## - [模板模式]
/**
 * php模板模式
 * 理解：典型的控制反转 子类复写算法
 * 但是最终的调用都是抽象类中定义的方式 也就是说抽象类中
 * 定义了算法的执行顺序
 * 
 * 使用场景：例如短信系统 选择不同的短信商 但是发送短信的动作都是一样的
 * 未来要增加不同的厂商
 * 只需添加子类即可
 * 
 * 子类们拥有一致的算法
 */
// require 'template.php';


## - [策略模式]
/**
 * 环境角色随着环境的改变而有不一样的行为表现
 */
// require 'Strategy.php';


## - [状态模式]
/** 
* 理解：行为随着状态变化
* 区别：
* - 策略的改变由client完成，client持有context的引用；而状态的改变是由context或状态自己,
* 就是自身持有context
* 自身能改变状态（拥有环境）
* - 简单说就是策略是client持有context，而状态是本身持有context
* 使用场景：大量和对象状态相关的条件语句
*/
// require 'State.php';


## - [观察者模式]
/**
 * php观察者模式
 * 观察者观察被观察者，被观察者通知观察者
 */
// require 'Observer.php';


## - [责任链模式]
/**
 * php责任链模式
 * 理解：把一个对象传递到一个对象链上，直到有对象处理这个对象
 * 可以干什么：我们可以做一个filter,或者gateway
 */
// require 'ChainOfResponsibility.php';


## - [访问者模式]
/**
 * 说说我对的策略模式和访问者模式的区分：
 * 乍一看，其实两者都挺像的，都是实体类依赖了外部实体的算法，但是：
 * 对于策略模式：首先你是有一堆算法，然后在不同的逻辑中去使用；
 * 对于访问者模式：实体的【结构是稳定的】，但是结构中元素的算法却是多变的，比如就像人吃饭这个动作
 * 是稳定不变的，但是具体吃的行为却又是多变的；
 */
// require 'Visitor.php';


## - [解释器模式]
/**
 * php解析器模式
 * 理解：就是一个上下文的连接器
 * 使用场景：构建一个编译器，SQL解析器
 * 下面我们来实现一个简单增删改查的sql解析器
 */
// require 'Interpreter.php';


## - [备忘录模式]
/**
 * 理解：就是外部存储对象的状态，以提供后退/恢复/复原
 * 使用场景：编辑器后退操作/数据库事物/存档
 */
// require 'Memento.php';


## - [命令模式]
/*
 * 在依赖的类中间加一个命令类
 * 本来可以直接调用的类方法现在通过命令来调用
 * 已达到解耦的的目的
 * 其次可以实现undo、redo等操作
 * 因为你知道调了哪些命令
 *
 * 下面我们来用命令模式实现一个记事本，涉及的命令：
 * - 新建
 * - 写入
 * - 保存
 */
// require 'Command.php';


## - [迭代器模式]
/**
 * 理解：遍历对象内部的属性，无需对外暴露内部的构成
 * 下面我们来实现一个迭代器访问学校所有的老师
 */
// require 'Iterator.php';


## - [中介者器模式]
/**
 * 理解：就是不同的对象之间通信，互相之间不直接调用，而是通过一个中间对象（中介者）
 * 使用场景：对象之间大量的互相依赖
 * 下面实现一个房屋中介
 */
// require 'Mediator.php';


## - [空对象模式]
/**
 * 理解：当程序运行过程中出现操作空对象时，程序依然能够通过操作提供的空对象继续执行
 * 使用场景：谨慎使用吧
 */
require 'NullObject.php';
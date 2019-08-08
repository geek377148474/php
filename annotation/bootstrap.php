<?php

use Doctrine\Common\Annotations\DocLexer;
/**
 * @元数据
 *
 * 所谓元数据就是数据的数据，即元数据是描述数据的。
 * 就象数据表中的字段一样，每个字段描述了这个字段下的数据的含义。
 * 元数据可以用于创建文档，跟踪代码中的依赖性，甚至执行基本编译时检查。
 * 许多元数据工具，如XDoclet，将这些功能添加到核心Java语言中，暂时成为Java编程功能的一部分。
 * 一般来说，元数据的好处分为三类：文档编制、编译器检查和代码分析。
 * 代码级文档最常被引用。元数据提供了一种有用的方法来指明方法是否取决于其他方法，它们是否完整，特定类是否必须引用其他类，等等。
 *

 */

/**
 * @注解
 *
 * 元数据就是附加在数据/代码上的元数据（metadata）
 * 框架可以基于这些元信息为代码提供各种额外功能。
 * Java中的注解就是Java源代码的元数据，也就是说注解是用来描述Java源代码的。  基本语法就是：@后面跟注解的名称。
 */

/**
 * @如何读取注解
 *
 * 读取注解的内容，需要使用反射技术
 */

// require 'example.php';

require 'testOne.php';

// require 'testTwo.php';

// require 'parse.php';

// $data = file_get_contents(WORK_DIR . '/phptrace/log.txt');
// dump($data);

// $format = new \annotation\format();
// $formatData = $format->main($data);
// dump($formatData);

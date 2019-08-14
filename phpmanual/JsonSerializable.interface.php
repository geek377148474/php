<?php
/**
 * what is JsonSerializable
 * 
 * JsonSerializable是一个接口任何实现了这个接口的类@is
 * 需要定义一个jsonSerialize()方法@just
 * 这个方法会在对这个类的对象做Json化的时候被调用@follow just
 * 这个时候你就可以在这个方法内@so can
 * 随意调整最终的Json化的结果。
 * 
 * use function jsonSerialize to instead of json_encode
 * when json_encode the class which use this function and
 * implements JsonSerializable
 */

// JsonSerializable {
//     /* Methods */
//     abstract public jsonSerialize ( void ) : mixed
// }

class Man implements JsonSerializable {
    private $a, $b;
 
    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }
 
    public function jsonSerialize() {
        return $this->a + $this->b;
    }
}

echo json_encode(new Man (23, 42));// 输出65

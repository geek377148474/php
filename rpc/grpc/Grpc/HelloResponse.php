<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: game.proto

namespace Grpc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>grpc.HelloResponse</code>
 */
class HelloResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string reply = 1;</code>
     */
    private $reply = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $reply
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Game::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string reply = 1;</code>
     * @return string
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Generated from protobuf field <code>string reply = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setReply($var)
    {
        GPBUtil::checkString($var, True);
        $this->reply = $var;

        return $this;
    }

}


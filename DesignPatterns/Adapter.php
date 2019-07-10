<?php
/**
 * 适配器类
 */
class Adapter
{
    public $_type;
    public $_advancePlayerInstance;
    public function __construct($type)
    {
        $this->_type = $type;
        switch ($type) {
            case "mp4":
                return $this->_advancePlayerInstance = AdvanceMp4Player::class;
                break;
            case "wmp":
                return $this->_advancePlayerInstance = AdvanceWmpPlayer::class;
                break;
            default:
                throw new Exception("$type is not supported", 400);
                break;
        }
    }

    public function play($file)
    {
        switch ($this->_type) {
            case "mp4":
                $this->_advancePlayerInstance::playMp4($file);
                break;
            case "wmp":
                $this->_advancePlayerInstance::playWmp($file);
                break;
            default:
                throw new Exception("$this->type is not supported to play", 400);
                break;
        }
    }
}
/**
 * 播放器
 */
class AudioPlayer
{
    public function play($file = '', $type = '')
    {
        switch ($type) {
            case "mp3":
                echo "playing file：{$file}.mp3";
                break;
            case "mp4":
                $adapter = new Adapter($type);
                $adapter->play($file);
                break;
            case "wmp":
                $adapter = new Adapter($type);
                $adapter->play($file);
                break;
            default:
                throw new Exception("$type is not supported", 400);
                break;
        }
    }
}
/**
 * 高级媒体接口
 */
interface MediaAdvanceInterface
{
    public static function playMp4($file = '');
    public static function playWmp($file = '');
}
/**
 * mp4
 */
abstract class AdvanceMp4Player implements MediaAdvanceInterface
{
    public static function playMp4($file = '')
    {
        echo __CLASS__ . " driver playing file: {$file}.mp4 " . PHP_EOL;
    }
}
/**
 * wmp
 */
abstract class AdvanceWmpPlayer implements MediaAdvanceInterface
{
    public static function playWmp($file = '')
    {
        echo __CLASS__ . " driver playing file: {$file}.mp4 " . PHP_EOL;
    }
}

try {
    $player = new AudioPlayer();
    $player->play("Hello", "mp4");
    $player->play("World", "wmp");
} catch (\Exception $e) {
    echo $e->getMessage();
}

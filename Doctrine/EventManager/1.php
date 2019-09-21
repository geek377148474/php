<?php

declare(strict_types=1);

use Doctrine\Common\EventArgs;
use Doctrine\Common\EventManager;
use Doctrine\Common\EventSubscriber;
/*
    TestEvent 事件 Event
    EventManager 事件管理者、触发者 addEventListener addEventSubscriber
    TestEventSubscriber 事件描述者 事件的提供者 EventSubscriber
*/
/**
 * Class TestEvent
 */
final class TestEvent
{
    const preFoo = 'preFoo';
    const postFoo = 'postFoo';

    /** @var EventManager */
    private $eventManager;

    /** @var bool */
    public $preFooInvoked = false;

    /** @var bool */
    public $postFooInvoked = false;

    public function __construct(EventManager $eventManager)
    {
        $eventManager->addEventListener([self::preFoo, self::postFoo], $this);
    }

    public function preFoo(EventArgs $eventArgs)
    {
        $this->preFooInvoked = true;
    }

    public function postFoo(EventArgs $eventArgs)
    {
        $this->postFooInvoked = true;
    }
}

$eventManager = new EventManager();

// Create a new instance
$testEvent = new TestEvent($eventManager);

// Dispatching Events
$eventManager->dispatchEvent(TestEvent::preFoo);
if ($testEvent->preFooInvoked) {
    echo 'preFoo is ok.' . PHP_EOL;
}
$eventManager->dispatchEvent(TestEvent::postFoo);
if ($testEvent->postFooInvoked) {
    echo 'postFoo is ok.' . PHP_EOL;
}

// Remove Event Listener
$eventManager->removeEventListener([TestEvent::preFoo, TestEvent::postFoo], $testEvent);

// Event Subscribers
final class TestEventSubscriber implements EventSubscriber
{
    /** @var bool */
    public $preFooInvoked = false;

    public function preFoo()
    {
        $this->preFooInvoked = true;
    }

    public function getSubscribedEvents() : array
    {
        return [TestEvent::preFoo];
    }
}

$eventSubscriber = new TestEventSubscriber();
$eventManager->addEventSubscriber($eventSubscriber);
$eventManager->dispatchEvent(TestEvent::preFoo);

if ($eventSubscriber->preFooInvoked) {
    // the preFoo method was invoked
    echo 'TestEventSubscriber for TestEvent and preFoo is ok.' . PHP_EOL;
}
<?php
/**
 * Created by PhpStorm.
 * User: Ekko
 * Date: 2018/11/8
 * Time: 下午 04:05
 */

namespace App\Http\Websocket;

use Swoole\Websocket\Frame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use SwooleTW\Http\Websocket\HandlerContract;
use SwooleTW\Http\Websocket\SocketIO\Packet;

class WebsocketHandler implements HandlerContract
{
    /**
     * "onOpen" listener.
     *
     * @param int $fd
     * @param \Illuminate\Http\Request $request
     */
    public function onOpen($fd, Request $request)
    {
        App::make('swoole.server')->push($fd, '123456');
        return true;
    }

    /**
     * "onMessage" listener.
     *  only triggered when event handler not found
     *
     * @param \Swoole\Websocket\Frame $frame
     */
    public function onMessage(Frame $frame)
    {
        return;
    }

    /**
     * "onClose" listener.
     *
     * @param int $fd
     * @param int $reactorId
     */
    public function onClose($fd, $reactorId)
    {
        return;
    }
}

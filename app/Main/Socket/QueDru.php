<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/21/14
 * Time: 4:08 PM
 */

namespace Main\Socket;


use Main\CTL\CallCTL;
use Main\CTL\HideCTL;
use Main\CTL\HideManyCTL;
use Main\CTL\InitCTL;
use Main\CTL\RemarkCTL;
use Main\CTL\ShowCTL;
use Main\CTL\SkipCTL;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class QueDru implements MessageComponentInterface {
    /**
     * When a new connection is opened it will be passed to this method
     * @param  ConnectionInterface $conn The socket/connection that just connected to your application
     * @throws \Exception
     */
    protected $clients;

    public function __construct(){
        $this->clients = new \SplObjectStorage();
    }

    function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        echo "Connection {$conn->resourceId} has connected\n";
        flush();
    }

    /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param  ConnectionInterface $conn The socket/connection that is closing/closed
     * @throws \Exception
     */
    function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
        flush();
    }

    /**
     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
     * @param  ConnectionInterface $conn
     * @param  \Exception $e
     * @throws \Exception
     */
    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        flush();

        $conn->close();
    }

    /**
     * Triggered when a client sends data through the socket
     * @param  \Ratchet\ConnectionInterface $from The socket/connection that sent the message to your application
     * @param  string $msg The message received
     * @throws \Exception
     */
    function onMessage(ConnectionInterface $from, $msg)
    {
        $json = json_decode($msg, true);
        $param = isset($json['param'])? $json['param']: array();

        if($json['action'] == 'skip'){
            $this->skip($from, $param);
        }
        else if($json['action'] == 'remark'){
            $this->remark($from, $param);
        }
        else if($json['action'] == 'hide'){
            $this->hide($from, $param);
        }
        else if($json['action'] == 'add'){
            $this->add($from, $param);
        }
        else if($json['action'] == 'init'){
            $this->init($from, $param);
        }
        else if($json['action'] == 'call'){
            $this->call($from, $param);
        }
        else if($json['action'] == 'hideMany'){
            $this->hideMany($from, $param);
        }
        else if($json['action'] == 'show/init'){
            $this->showUpdate($from);
        }
        unset($json);
        unset($param);
    }

    public function showUpdate(ConnectionInterface $form = null){
        $ctl = new ShowCTL();
        $data = $ctl->show();
        if(is_null($form)){
            $this->sendAll('show/update', $data);
        }
        else {
            $json = json_encode(array('event'=> 'show/update', 'data'=> $data));
            $form->send($json);
            unset($data);
        }
    }

    // init action
    public function init(ConnectionInterface $from, $param){
        $ctl = new InitCTL();
        $items = $ctl->init($param);
        $json = json_encode(array('event'=> 'init', 'data'=> $items));
        $from->send($json);
        unset($json);
        unset($items);
        unset($ctl);
    }

    // call action
    public function call(ConnectionInterface $from, $param){
        $ctl = new CallCTL();

        $ctl->init($param);
        $item = $ctl->call();

        if(!is_null($item)){
            $data = $item->toArray();
            unset($item);
            $this->sendAll('call', $data);
            unset($data);
        }
        unset($ctl);
    }

    public function hideMany(ConnectionInterface $from, $param){
        $ctl = new HideManyCTL();
        $ctl->init($param);
        $items = $ctl->hideMany();
        $json = json_encode(array('event'=> 'hideMany', 'data'=> $items));
        $from->send($json);
        unset($json);
        unset($items);
        unset($ctl);

        $this->showUpdate();
    }

    // skip action
    public function skip(ConnectionInterface $from, $param){
        $ctl = new SkipCTL();

        $ctl->init($param);
        $item = $ctl->skip();

        if(!is_null($item)){
            $data = $item->toArray();
            unset($item);
            $this->sendAll('skip', $data);
            unset($data);
        }
        unset($ctl);

        $this->showUpdate();
    }

    // remark action
    public function remark(ConnectionInterface $from, $param){
        $ctl = new RemarkCTL();

        $ctl->init($param);
        $item = $ctl->remark();

        if(!is_null($item)){
            $data = $item->toArray();
            unset($item);
            $this->sendAll('remark', $data);
            unset($data);
        }
        unset($ctl);

        $this->showUpdate();
    }

    // hide action
    public function hide(ConnectionInterface $from, $param){
        $ctl = new HideCTL();

        $ctl->init($param);
        $item = $ctl->hide();

        if(!is_null($item)){
            $data = $item->toArray();
            unset($item);
            $this->sendAll('hide', $data);
            unset($data);
        }
        unset($ctl);

        $this->showUpdate();
    }

    public function add(ConnectionInterface $from, $param){
        $this->sendAll('add', $param);
        unset($param);

        $this->showUpdate();
    }

    // send to all client
    public function sendAll($event, $data){
        $msg = array('event'=> $event);
        $msg['data'] = $data;

        $this->clients->rewind();
        while($this->clients->valid()) {
            $client = $this->clients->current();
            $this->clients->next();

            $client->send(json_encode($msg));
        }
        unset($data);
        unset($msg);
    }
}
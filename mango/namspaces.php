<?php
//namespace namspaces;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of namspace
 *
 * @author huyf
 */
class namspaces {
    //put your code here
    
    public static function getkey(){
        echo "hyf";
    }
    public function test(){
        echo 2;
    }
}

App\Controller\Home\Index::Test();
Imooc\Object::test();
$stack=new SplStack();
$stack->push("stack1");
$stack->push("stack2");

echo $stack->pop();
echo $stack->pop();

$queue =new SPLQueue();
$queue->enqueue("queue1");
$queue->enqueue("queue2");

echo $queue->dequeue();
echo $queue->dequeue();

$heap=new SplMinHeap();
$heap->insert("heap1");
$heap->insert("heap2");

echo $heap->extract();
echo $heap->extract();

$array=new SplFixedArray(10);
$array[0]="fixed";
var_dump($array);

<?php

use App\Controller\Home;

if (!defined(BASEPATH)) {
    define("BASEPATH", __DIR__);
}
require_once BASEPATH . '/Imooc/Loader.php';
spl_autoload_register("\\Imooc\\Loader::autoload");
echo '<meta http-equiv="content-type" content="text/html;charset=utf-8">';

//\Imooc\Factory::getDatabase();
//\Imooc\Factory::createDatabase();
$con=new \Imooc\Config(__DIR__."/configs");
var_dump($con->config["controller"]);
var_dump($con["controller"]);
//$user=new \Imooc\AllUser();
//foreach($user as $key=>$val){
//    echo $val->name;
//}
//header("Content-Type:text/html; charset=utf-8");
//$canvas=new Imooc\Canvas();
//$canvas->init();
//$canvas->rect(3,6,3,7);
//$canvas->addDrawDecorator(new Imooc\colorDrawDecrator("green"));
//$canvas->addDrawDecorator(new Imooc\sizeDrawDecrator(30));
//$canvas->draw();
//class page extends Imooc\EventGenertor {
//
//    public function index() {
//        //$this->_action="sdsd";
//        $this->notify();
//    }
//
//}
//class ob1 implements Imooc\Observer{
//    public $id;
//    public $name;
//    public function __construct($id,$name) {
//        $this->id=$id;
//        $this->name=$name;
//    }
//    public function update($no_notify = null) {
//        echo $this->id.".".$this->name->_action;
//    }
//}
//class ob2 implements Imooc\Observer{
//    public $id;
//    public $name;
//    public function __construct($id,$name) {
//        $this->id=$id;
//        $this->name=$name;
//    }
//    public function update($no_notify=null){
//        echo $this->id.".".$this->name->_action;
//    }
//}
//$page = new page();
//$page->subject("警察来了");
//$page->addServer(new ob1("id1",$page));
//$page->addServer(new ob2("id2",$page));
//
//$page->index();
//class page {
//
//    public function index() {
//
//        $proname = \Imooc\Factory::createProname(1);
//        $proname->name = "huyufan";
//        var_dump($proname);
//     
//        $this->test();
//      
//    }
//
//    public function test(){
//    
//        $proname = \Imooc\Factory::createProname(1);
//        var_dump($proname);
//        $proname->time = date("Y-m-d H:i:s", time());
//        
//     
//    }
//}
//$page=new page();
//$page->index();

//PHP 链式操作的实现//注册模式 全局共享和交换对象
//Imooc\Register::set("db", Imooc\Factory::createDatabase());
//$db= Imooc\Register::get("db");
//$db->where("ds");
//$db=new Imooc\Database\PDO();
//$db->connect("127.0.0.1", "root", "111111", "test");
//$res=$db->query("show tables");
//var_dump($res);
//$db->close();
//$db=  Imooc\Factory::createDatabase();
//class page{
//    public $strate;
//    public function index(){
//       $this->strate->showAd();
//       $this->strate->showCategory();
//    }
//    public function setStrategy(Imooc\UserStrategy $userstrate){
//        $this->strate=$userstrate;
//    }
//}
//$index=new page();
//if(isset($_GET["f"])){
//    $index->setStrategy(new Imooc\FemateUserStrategy());
//}
//else{
//    $index->setStrategy(new Imooc\MailUserStrategy());
//}
//echo $index->index();
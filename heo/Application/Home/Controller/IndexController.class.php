<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
   /* public function index()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }*/
   
   // public function index(){

   //}

   //REGISTER
   public function register_boy(){
    if(IS_POST){
        $User = D('User');

        if(!$data = $User -> create()){
            header("Content-type: text/html ; charset = utf-8");
             
            exit($User -> getError());
        }

      
        if($id = $User -> add($Data)){

          
            
            $this -> success('注册成功', './login');
        }else{
            $this -> error('注册失败');
        }
    
    }else{
        $this -> display();
    }
    
   }

   public function register_girl(){
    if(IS_POST){
        $User = D('User');

        if(!$data = $User -> create()){
            header("Content-type: text/html ; charset = utf-8");
             
            exit($User -> getError());
        }

      
        if($id = $User -> add($Data)){

          
            
            $this -> success('注册成功' , './login');
        }else{
            $this -> error('注册失败');
        }
    
    }else{
        $this -> display();
    }
    
   }


   //login--------------------------------------------------------------------
  public function login(){
    
            if(!empty($_POST)){
               /* $verify = new \Think\Verify();
                if(!$verify -> check($_POST['captcha'])){
                    $verify = I('paran . verify' , '');
                    if(!check_verify($verify)){
                        $this -> error("亲，验证码错误" , $this -> site_url , 1);
    
                    } 
                }else{*/
                    $user = new \Home\Model\UserModel();//此处调用的model里的方法要单独以xxxModel的方式。非常重要我的青娘！！！！！！！！！！！！！！！！
                    $user = D('user');
                    $rst = $user -> checkNamePwd($_POST['name'] , $_POST["pw"]);
    
                    if($rst === false){
                        echo '用户名或密码错误';
                    }else{
                        session("name" , $rst['name']);
                        session("id" , $rst['id']);
                        $this -> redirect('Index/home_page',0);
                        //$this -> redirect('Index/shuo',0)
                    
                } 
            }else {$this -> display();}
            //$this -> display();
    }//---------------------------------------------------------------
  
    //show
    public function show(){ 
        session_start();
        //uname == $_SESSION['name']; 
        //upwd==_SESSION['pw'];
        $id = SESSION('id');
           $user=M('user');
           $select=$user->query("select * from think_user where name='$name' and tel");
        
           $this->assign('info',$select);
           $this->display();      
           
        }



    //user
    public function user_center(){

    }
        

}
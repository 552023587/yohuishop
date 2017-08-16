<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 简单视图类
 * @allen 552023587@qq.com http://framework.youth8090,com
 */
namespace Core;
class View {
    //put your code here
    private  $complate_file = 'View/tmp/';
    private  $static_file;
    private  $template_preg;
    private  $template_replace;
    private  $data;
    public function __construct($view,$data=array()) {
           $view = explode("/",$view);
           $this->static_file = __APP__."View"."/$view[0]/$view[1]/$view[2].php";
           $this->complate_file =  __APP__.$this->complate_file."com_".$view[0]."_".$view[1].'.php';  
           $this->data = $data;
           $this->TemplateTag();
    }
    public function Complate(){
         if(!is_file($this->static_file))
	 {
              throw  new \Exception('模板不存在');
         }
         if(count($this->data))
         {
            extract($this->data);  
         }    
         include $this->static_file;
    }
    private  function  TemplateTag(){
           $this->template_preg = array(
           "/{{if\((.*?)\)}}/",
           "/{{\/if}}/",
           "/{{else}}/",
           "/{{each\((.*?)\)}}/",
           "/{{\/each}}/",
           "/<php>(.*?)<\/php>/",    
           "/{{(.*?)}}/"
            );
           $this->template_replace = array(
           "<?php if($1){?>",
           "<?php }?>",
           "<?php }else{ ?>",
           "<?php foreach($1){?>",
           "<?php } ?>",
            "<?php $1?>",     
           "<?php echo $1;?>"
           );
    }
    private function compress_html($string) {
         return ltrim(rtrim(preg_replace(array("/> *([^ ]*) *</","/<!--[^!]*-->/","'/\*[^*]*\*/'","/\r\n/","/\n/","/\t/",'/>[ ]+</'),array(">\\1<",'','','','','','><'),$string)));
    }   
}

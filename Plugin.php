<?php
/**
 * 来自http://853.bronya.net的Sonic853做的WordPress博客琪亚娜小挂件
 * 
 * @package kiana
 * @author jrotty
 * @version 1.0
 * @link http://qqdie.com
 */

class kiana_Plugin implements Typecho_Plugin_Interface
{
	public static function activate()
	{
        Typecho_Plugin::factory('Widget_Archive')->header = array('kiana_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('kiana_Plugin', 'footer');
    }
	/* 禁用插件方法 */
	public static function deactivate(){}
	
	/* 插件配置方法 */

  public static function config(Typecho_Widget_Helper_Form $form){
		$jquery = new Typecho_Widget_Helper_Form_Element_Radio(
        'jquery', array('0'=> '不加载', '1'=> '自动加载'), 0, 'jQuery',
            '如果你已经加载过了jquery，选择不加载即可（简而言之，不加载不好使的话就选择自动加载！）');
        $form->addInput($jquery);

		
}
	/* 个人用户的配置方法 */
	public static function personalConfig(Typecho_Widget_Helper_Form $form){}
	
	/* 插件实现方法 */

public static function header(){
if(Typecho_Widget::widget('Widget_Options')->Plugin('kiana')->jquery=='1'){	
			echo '<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>'. "\n";
		}


}

public static function footer(){
$ppd = Helper::options()->pluginUrl ;
 echo '<script type="text/javascript" src="'.$ppd.'/kiana/bga.min.js"></script>' . "\n";



}

}
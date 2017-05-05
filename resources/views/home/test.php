<?php
/**
 * Created by PhpStorm.
 * User: xishuai
 * Date: 2017/5/5
 * Time: 18:25
 */
require 'SensitiveWordFilter.php';

/*
初始化传入词库文件路径，词库文件每个词一个换行符。
如：
敏感1
敏感2

目前只支持UTF-8编码
*/
$filter = new SensitiveWordFilter(__DIR__ . '/11.txt');

/*
第一个参数传入要过滤的字符串，第二个是匹配的字间距，
比如'枪支'是一个敏感词，想过滤'枪||||支'的时候，
就需要指定一个两个字的间距，可以根据情况设定，
超过指定间距就不会过滤。所有匹配的敏感词会被替换为'*'。
*/
echo $filter->filter('这是一个敏感词安门事', 10);
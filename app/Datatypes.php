<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datatypes extends Model
{
    public function guid(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtolower(md5(uniqid(rand(), true)));
//            $hyphen = chr(45);// "-"
//            $uuid = chr(123)// "{"
//                    .substr($charid, 0, 8).$hyphen
//                    .substr($charid, 8, 4).$hyphen
//                    .substr($charid,12, 4).$hyphen
//                    .substr($charid,16, 4).$hyphen
//                    .substr($charid,20,12)
//                    .chr(125);// "}"
            return $charid;
        }
    } 
    
    
    function GetRandStr($len) 
    { 
        $chars = array( 
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
            "w", "x", "y", "z", "0", "1", "2",  
            "3", "4", "5", "6", "7", "8", "9" 
        ); 
        $charsLen = count($chars) - 1; 
        shuffle($chars);   
        $output = ""; 
        for ($i=0; $i<$len; $i++) 
        { 
            $output .= $chars[mt_rand(0, $charsLen)]; 
        }  
        return $output;  
    }   

    public function formatdate($format, $date){
        return date($format, $date);
    } 
    
    /** 文件转base64输出 
    * @param  String $file 文件路径 
    * @return String base64 string 
    */  
    function fileToBase64($file){  
        $base64_file = '';  
        if(file_exists($file)){  
            $mime_type= mime_content_type($file);  
            $base64_data = base64_encode(file_get_contents($file));  
            $base64_file = 'data:'.$mime_type.';base64,'.$base64_data;  
        }  
        return $base64_file;  
    }  

    /** base64转文件输出 
    * @param  String $base64_data base64数据 
    * @param  String $file        要保存的文件路径 
    * @return boolean 
    */  
    function base64ToFile($base64_data, $file){  
        if(!$base64_data || !$file){  
            return false;  
        }  
        return file_put_contents($file, base64_decode($base64_data), true);  
    }      
}

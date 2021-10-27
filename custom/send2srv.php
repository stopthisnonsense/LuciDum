<?php

//var_dump($_POST);
// $_POST 用于接收 请求体 中提交的数据（一般是 POST 提交的数据）

//var_dump($_REQUEST);
//获取IP地址  
function get_client_ip($type = 0,$adv=true) {  
    $type = $type ? 1 : 0;  
    static $ip = NULL;  
    if ($ip!== NULL) return $ip[$type];  
    if($adv){  
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);  
            $pos = array_search('unknown',$arr);  
            if(false !== $pos) unset($arr[$pos]);  
            $ip = trim($arr[0]);  
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }elseif (isset($_SERVER['HTTP_X_REAL_IP'])) {  
            $ip = $_SERVER['HTTP_X_REAL_IP'];  
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    // IP地址合法验证  
    $long = sprintf("%u",ip2long($ip));  
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);  
    return $ip[$type];  
}  
  
//获取客户端浏览器  
function get_client_browser(){  
    $sys = $_SERVER['HTTP_USER_AGENT'];  //获取用户代理字符串  
    if (stripos($sys, "Firefox/") > 0) {  
        preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);  
        $exp[0] = "Firefox";  
        $exp[1] = $b[1];  //获取火狐浏览器的版本号  
    } elseif (stripos($sys, "Maxthon") > 0) {  
        preg_match("/Maxthon\/([\d\.]+)/", $sys, $aoyou);  
        $exp[0] = "Maxthon";  
        $exp[1] = $aoyou[1];  
    } elseif (stripos($sys, "MSIE") > 0) {  
        preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);  
        $exp[0] = "IE";  
        $exp[1] = $ie[1];  //获取IE的版本号  
    } elseif (stripos($sys, "OPR") > 0) {  
        preg_match("/OPR\/([\d\.]+)/", $sys, $opera);  
        $exp[0] = "Opera";  
        $exp[1] = $opera[1];    
    } elseif(stripos($sys, "Edge") > 0) {  
        //win10 Edge浏览器 添加了chrome内核标记 在判断Chrome之前匹配  
        preg_match("/Edge\/([\d\.]+)/", $sys, $Edge);  
        $exp[0] = "Edge";  
        $exp[1] = $Edge[1];  
    } elseif (stripos($sys, "Chrome") > 0) {  
        preg_match("/Chrome\/([\d\.]+)/", $sys, $google);  
        $exp[0] = "Chrome";  
        $exp[1] = $google[1];  //获取google chrome的版本号  
    } elseif(stripos($sys,'rv:')>0 && stripos($sys,'Gecko')>0){  
        preg_match("/rv:([\d\.]+)/", $sys, $IE);  
        $exp[0] = "IE";  
        $exp[1] = $IE[1];  
    }else {  
        $exp[0] = "unknown browser";  
        $exp[1] = "";   
    }  
    return $exp;  
}  
  
//获取客户端操作系统  
function get_client_os(){  
    $agent = $_SERVER['HTTP_USER_AGENT'];  
    $os = false;  
    if (preg_match('/win/i', $agent) && strpos($agent, '95')){  
        $os = 'Windows 95';  
    }else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90')){  
        $os = 'Windows ME';  
    }else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent)){  
        $os = 'Windows 98';  
    }else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent)){  
        $os = 'Windows Vista';  
    }else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent)){  
        $os = 'Windows 7';  
    }else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent)){  
        $os = 'Windows 8';  
    }else if(preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent)){  
        $os = 'Windows 10';#添加win10判断  
    }else if (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent)){  
        $os = 'Windows XP';  
    }else if (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent)){  
        $os = 'Windows 2000';  
    }else if (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent)){  
        $os = 'Windows NT';  
    }else if (preg_match('/win/i', $agent) && preg_match('/32/i', $agent)){  
        $os = 'Windows 32';  
    }else if (preg_match('/linux/i', $agent)){  
        $os = 'Linux';  
    }else if (preg_match('/unix/i', $agent)){  
        $os = 'Unix';  
    }else if (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent)){  
        $os = 'SunOS';  
    }else if (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent)){  
        $os = 'IBM OS/2';  
    }else if (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent)){  
        $os = 'Macintosh';  
    }else if (preg_match('/PowerPC/i', $agent)){  
        $os = 'PowerPC';  
    }else if (preg_match('/AIX/i', $agent)){  
        $os = 'AIX';  
    }else if (preg_match('/HPUX/i', $agent)){  
        $os = 'HPUX';  
    }else if (preg_match('/NetBSD/i', $agent)){  
        $os = 'NetBSD';  
    }else if (preg_match('/BSD/i', $agent)){  
        $os = 'BSD';  
    }else if (preg_match('/OSF1/i', $agent)){  
        $os = 'OSF1';  
    }else if (preg_match('/IRIX/i', $agent)){  
        $os = 'IRIX';  
    }else if (preg_match('/FreeBSD/i', $agent)){  
        $os = 'FreeBSD';  
    }else if (preg_match('/teleport/i', $agent)){  
        $os = 'teleport';  
    }else if (preg_match('/flashget/i', $agent)){  
        $os = 'flashget';  
    }else if (preg_match('/webzip/i', $agent)){  
        $os = 'webzip';  
    }else if (preg_match('/offline/i', $agent)){  
        $os = 'offline';  
    }else{  
        $os = 'unknown os';  
    }  
    return $os;   
} 

function get_user_personal_data() {
	$ip = get_client_ip();
	$browser = get_client_browser()[0];
	$browser_version = get_client_browser()[1];
	$os = get_client_os();
	return 	array(
				'customer_ip'     => $ip,
				'customer_browser' => $browser,
				'customer_browser_version' => $browser_version,
				'customer_os' => $os,
			);
		
	//return  {
   // "customer_ip" : "' . $ip . '",
   // "customer_browser" : "' . $browser . '",
	 //"customer_browser_version" : "' . $browser_version . '",
    //"customer_os" : "' . $os . '"
	//};
}

function send_post($url, $post_data) {
    set_error_handler(
        create_function(
            '$severity, $message, $file, $line',
            'throw new ErrorException($message, $severity, $severity, $file, $line);'
        )
    );
    $options = array(
        'http' => array(
          'method' => 'POST',
          'header' => 'content-type: application/json',
          'content' => $post_data,
          'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );

	$response = '';
	try{
		$response = wp_remote_request( $url,
			array(
				'method'     => 'POST',
				'httpversion' => '1.1',
				'headers' => array(
					'Content-Type' => 'application/json',
				),
				'body' => $post_data,
				'timeout' => 30,
				'sslverify' => false
			)
		);
    }catch(Exception $ex){
		 //Process the exception
		 $response=$ex->getMessage();
   }
	restore_error_handler();

	
	return $response;
	
  // $context = stream_context_create($options);

  //  $result = '';
  //  try{
  //      $result = file_get_contents($url, false, $context);
  //  }catch(Exception $ex){
  //      //Process the exception
  //      $result=$ex->getMessage();
  //  }
  //  restore_error_handler();
  //  return $result;
}

function request_by_curl($remote_server, $post_string) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_server);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "accept: application/json",
    "cache-control: no-cache",
    "content-type: application/json"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "lucidum Agent");
    curl_setopt($ch, CURLOPT_TIMEOUT,60);

    $data = curl_exec($ch);
	 $err = curl_error($ch);
	print_r('err=<br/>');
		print_r($err);
	curl_close($ch);
	return $data;
}

$customer_info = get_user_personal_data();
$common_info = array(
				'firstName' => $_POST['firstName'],
				'lastName' => $_POST['lastName'],
				'company' =>  $_POST['company'],
				'jobTitle' =>  $_POST['jobTitle'],
				'businessEmail' =>  $_POST['businessEmail'],
				'phoneNumber' =>  $_POST['phoneNumber'],
			);
$post_data = $common_info + $customer_info;


//print_r($post_data);

//if (isset($_POST['require_community_license'])){
//	print_r($post_data);
//}else{
//	print_r('getresult2<br/>');
//}
$require_community_license=$_POST['require_community_license'];
if (isset($require_community_license) && ($require_community_license == 'true')){
	$result = send_post('https://metrics.lucidum.io/integration/request-community-license?apiKey=1234567', json_encode($post_data));
}else{
	//54.215.174.16:443
	$result = send_post('https://metrics.lucidum.io/integration/request-demo?apiKey=1234567', json_encode($post_data));
}
	

	
if ( is_wp_error( $result ) ) {
   $error_message = $result->get_error_message();
   //echo "Something went wrong: $error_message";
	  print_r( $error_message );
} else {
   print_r( $result['body'] );
}

//$result = request_by_curl('http://hicheer.top:28080/integration/request-demo?apiKey=123457', $post_data);
//print_r('result222=<br/>');
?>
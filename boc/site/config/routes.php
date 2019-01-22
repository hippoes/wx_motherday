<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/******************* 获取店铺地理位置和当前网站对应的城市 start*************************/
$db_arr=array(
	'host' => DB_HOST,
	'user' => DB_USER,
	'pass' => DB_PASS,
	'dbname' => DB_NAME,
	'prefix' => DB_PREFIX
);

try {
    $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);

	$fields='field1,field2';
	$where='cid = 69 and id = 20';
    $sth=$dbh->query('SELECT '.$fields.' from '.DB_PREFIX.'page where '.$where);
    $main_city=$sth->fetch(PDO::FETCH_ASSOC);


    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

/******************* 获取店铺地理位置和当前网站对应的城市 end *************************/

/************ 获取当前城市 start ****************/
$ip=$_SERVER['REMOTE_ADDR'];
$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
$url = 'http://api.map.baidu.com/location/ip?ak=F454f8a5efe5e577997931cc01de3974&ip='.$ip.'&coor=bd09ll';
$address=json_decode(file_get_contents($url),TRUE);

if(isset($address['content']['address_detail']['city'])){
	$cur_city=$address['content']['address_detail']['city'];
}else{
	$cur_city=$main_city['field1'];
}
define('CUR_CITY',$cur_city);
/************ 获取当前城市 end ****************/

//if(strpos($cur_city, $main_city['field1'])===false){
//	$route['default_controller'] = "about";
//}else{
//	$route['default_controller'] = "welcome";
//}

$route['default_controller'] = "welcome";


// $route['default_controller'] = "welcome";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
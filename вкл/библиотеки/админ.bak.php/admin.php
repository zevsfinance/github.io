<?

@ini_set('magic_quotes_runtime', false);

@ignore_user_abort(true);


$arr = get_defined_vars();
while(list($kk,$vv)=each($arr)) {
  if (gettype(${$kk}) != 'array') {
    ${$kk} = '';
  }
}
$starttimemicro = microtime(true);

$settings = array();
$userinfo = array();

$frm['a'] = '';

if ($_SERVER['HTTP_HOST'] == 'free') {
  error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
  @ini_set('display_errors', 1);
} else {
  @ini_set("error_reporting", E_ALL & ~E_NOTICE);
  @ini_set('display_errors', 0);

}

session_start();
include 'inc/config.inc.php';


if ($frm['a'] == 'get_path_info') {

  print "DOCUMENT_ROOT: ".$_SERVER['DOCUMENT_ROOT']."<br>\n";
  print "SCRIPT_FILENAME: ".$_SERVER['SCRIPT_FILENAME']."<br>\n";
  print "SCRIPT_NAME: ".$_SERVER['SCRIPT_NAME']."<br>\n";

  print "REQUEST_URI: ".$_SERVER['REQUEST_URI']."<br>\n";
  print "PHP_SELF: ".$_SERVER['PHP_SELF']."<br>\n";

  print 'PATH: '.get_path_info()."<br>\n";
  exit;
}

#if ($frm_env['REMOTE_ADDR'] == '109.206.161.6') {
#  print_r($frm); exit;
#}

if ((file_exists('install.php'))and($frm_env['HTTP_HOST'] != 'free')and($frm_env['HTTP_HOST'] != 'bakster.free')) {
  print 'Delete install.php file for security reason please!';
  exit;
}

global $frm;

if (preg_match('/^https.*/i', $frm_env['SCRIPT_URI'])) {
  $frm_env['HTTPS'] = 1;
}

#preg_match('~https?:\/\/([^\/:]+)~', $frm_env['HTTP_REFERER'], $matches);
#$ref_host = $matches[1];
#list ($http_host, $http_port) = preg_split('/\:/', $frm_env['HTTP_HOST']);
#if ($http_host != $ref_host)
#{
#  print_r( $frm_env);
#  print "$http_host != $ref_host"; exit;
#  header("Location: ".$settings['site_url']);
#  exit;
#}

if ($settings['license'] == 'RTSMCWG6D38X8YRVP9H9') {
  $frm_env['HTTP_HOST'] = 'grownshare.net';
}

if ($frm_env['HTTP_HOST'] == 'bakster.free') {
  $settings['database'] = encode_str2('hyiplister_free', $settings['key'], 'hyip manager pro 2005 jul 27');
}

$userinfo = array();
$userinfo['logged'] = 0;
$dbconn = db_open2(1);
if(!$dbconn)
{
  include('inc/admin/change_admin_mysql.inc');
  exit;
};

if ($settings['license'] == 'CQVJQV83D9665P2VSKYM') {
  $q = "SET sql_mode='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'";
  mysql_query($q) or print mysql_error();
}

if (($settings['license'] == '7AF3D159C9249BDA97B9')or($settings['license'] == 'N2NYS27ERQ7QVFKTZW28')or($settings['license'] == '83824XQSKXRLQA9TGBXW')or($settings['license'] == '89978JYSZQ8GM5C52GAF')) {
  $q = "SET NAMES cp1251";
  mysql_query($q) or print mysql_error();
}

if ($settings['license'] == '8MG8JTEG7X2V7537KP3Q') $frm_env['HTTP_HOST'] = 'eurogoldbank.com';

//if ($frm_env['HTTP_HOST'] == 'free')
//{
//  $settings['license'] = 'KC3STYBTCATZNRVBYGDF';
//}
#$settings['license'] = '9GNQPDFE5FW354L2JP5B';

#debug_file(1);

#SectionIfStart=debug
$settings['license'] = 'KJNJ4BM84AQBTHZYCEED';
#$daily_referal_percent_enabled = 1;
#$settings['license'] = 'Z6UKRH7U937VE7LHFBKY';
$settings['license'] = '6A44ZYTCAFKXSEP64FDN';
#SectionIfEnd

require 'inc/libs/Smarty.class.php';

$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->template_dir = "./tmpl/";
$smarty->compile_dir = "./tmpl_c";
$smarty->assign('settings', $settings);

function my_get_template ($tpl_name, &$tpl_source, &$smarty_obj) {
  global $my_tmpl;
  if ($my_tmpl[$tpl_name] != '') {
    $tpl_source = $my_tmpl[$tpl_name];
    return true;
  } else {
    return false;
  }
}

function my_get_timestamp ($tpl_name, &$tpl_timestamp, &$smarty_obj) {
  global $my_tmpl;
  if ($my_tmpl[$tpl_name] != '') {
    $tpl_timestamp = time();
    return true;
  } else {
    return false;
  }
}

function my_get_secure ($tpl_name, &$smarty_obj) {
    return true;
}

function my_get_trusted ($tpl_name, &$smarty_obj)
{
}

// регистрируем ресурс под именем "db"
$smarty->register_resource("my", array("my_get_template",
                                       "my_get_timestamp",
                                       "my_get_secure",
                                       "my_get_trusted"));


    $my_tmpl['start_info_table'] = '{strip}
	  <table cellspacing=0 cellpadding=1 border=0 width={$size|default:"100%"} bgcolor=#FF8D00>
	  <tr><td bgcolor=#FF8D00>
	  <table cellspacing=0 cellpadding=0 border=0 width=100%>
	  <tr>
	  <td valign=top width=10 bgcolor=#FFFFF2><img src=images/sign.gif></td>
	  <td valign=top bgcolor=#FFFFF2 style="padding: 10px; color: #D20202; font-family: verdana; font-size: 11px;">
	  {/strip}';
    $my_tmpl['end_info_table'] = '{strip}</td></tr></table></td></tr></table>{/strip}';


$q = 'select * from hm2_processings';
$sth = mysql_query($q) or print mysql_error();
while ($row = mysql_fetch_array($sth))
{
  $sfx = strtolower($row['name']);

  $sfx = preg_replace('/([^\w])/', '_', $sfx);
  $exchange_systems[$row['id']] = array('name' => $row['name'], 'sfx' => $sfx, status => $row['status'], 'has_account' => 0);
}
mysql_free_result($sth);

define('THE_GC_SCRIPT_V2005_04_01', 'answer');

$c = array(my_get_template, my_get_timestamp, my_get_secure, my_get_trusted);
$acsent_settings = get_accsent();

if ($frm['a'] == 'showprogramstat') {
  $login = quote($frm['login']);
  $q = 'select * from hm2_users where id = 1 and username = \''.$login.'\' and stat_password <> ""';
  $row = get_mysql_line($q);
  $flag = 0;
  if ($row['stat_password'] == md5($frm['password'])) {
    $flag = 1;
  }
  if ($flag == 0) {
    print '<center>Wrong login or password</center>';
  } else {
    if ($frm['page'] == 'members') {
      include 'inc/admin/members_program.inc.php';
    } elseif ($frm['page'] == 'pendingwithdrawal') {
      include 'inc/admin/pending_program.inc.php';
    } elseif ($frm['page'] == 'whoonline') {
      include 'inc/admin/whoonline_program.inc.php';
    } elseif ($frm['page'] == 'TrayInfo') {
      include 'inc/admin/tray_info.php';
    } else {
      include 'inc/admin/main_program.inc.php';
    }
  }
  db_close($dbconn);
  exit;
}


#count_earning(3);

#debug_file(2);
$q = "select * from hm2_settings where name = 'sr'";
$sth = mysql_query($q) or print mysql_error();
$settings['use_ip_for_auto'] = 0;
while ($row = mysql_fetch_array($sth)) {
  $settings['use_ip_for_auto'] = $row['value'];
}
mysql_free_result($sth);


#    send_log_to_gc("test message");

// здесь мы апдейтаем скрипт если нужно 'update'
update_database_function();

if ($frm['a'] == 'update_database') {
  print "<!-- {$settings['use_ip_for_auto']} -->";
  send_string_to_gold_coders();
  print "<!-- {$settings['use_ip_for_auto']} -->";
  update_database_function();
  exit;
}


$q = "select * from hm2_settings where name = 'srt'";
$sth = mysql_query($q) or print mysql_error();
if ($row = mysql_fetch_array($sth)) {
} else {
  send_string_to_gold_coders();
}
mysql_free_result($sth);



#debug_file(3)
if ($frm['a'] == 'logout') {
  setcookie('password', '', time()-86400);

  header('Location: index.php');
  db_close($dbconn);
  exit;
}

if ($frm['a'] == 'test_validation_image') {

  $validation_number = (gen_confirm_code($frm['graph_max_chars'], $frm['use_number_validation_number'] ? 2 : 0));
  $_SESSION['validation_number'] = $validation_number;


  $settings['graph_bg_color'] = $frm['graph_bg_color'];
  $settings['graph_text_color'] = $frm['graph_text_color'];
  $settings['advanced_graph_validation'] = $frm['advanced_graph_validation']; 
  $settings['advanced_graph_validation_min_font_size'] = $frm['advanced_graph_validation_min_font_size'];
  $settings['advanced_graph_validation_max_font_size'] = $frm['advanced_graph_validation_max_font_size'];

  include('inc/show_validation_image.inc');
  exit;
}

$username = quote($frm_cookie['username']);
$password = $frm_cookie['password'];
$ip = quote($frm_env['REMOTE_ADDR']);
$add_login_check = ' and last_access_time + interval 30 minute > now() and last_access_ip = \''.$ip.'\'';
#SectionIfStart=demo
if ($settings['demomode'] == 1) {
  $add_login_check = '';
}
#SectionIfEnd
if (($settings['license'] == '2K2CFC2ZDDX8ZL78M42M')or($settings['license'] == 'Y2RV63ZZXT5XRF3E5WJG')) {
  $add_login_check = " and last_access_time + interval 30 minute > now() ";
}
if ($settings['license'] == '7NA4P9C7ZNBPY3BY7T58') $add_login_check = '';

list ($user_id, $chid) = preg_split('/-/', $password, 2);
$user_id = sprintf("%d", $user_id);
$chid = quote($chid);

#// здесь мы апдейтаем скрипт если нужно 'update'
#update_database_function();

$q = "select * from hm2_settings where name = 'sr'";
$sth = mysql_query($q) or print mysql_error();
$settings['use_ip_for_auto'] = 0;
while ($row = mysql_fetch_array($sth)) {
  $settings['use_ip_for_auto'] = $row['value'];
}
mysql_free_result($sth);


if ($settings['htaccess_authentication'] == 1) {
  $login = $frm_env['PHP_AUTH_USER'];
  $password = $frm_env['PHP_AUTH_PW'];
  $q = 'select * from hm2_users where id = 1';
  $row = get_mysql_line($q);
  if (($login == $row['username'])and(md5($password) == $row['password'])) {
    $userinfo = $row;
    $userinfo['logged'] = 1;
  }
  
  if ($userinfo['logged'] != 1) {
    header( 'WWW-Authenticate: Basic realm="Authorization Required!"'); 
    header( 'HTTP/1.0 401 Unauthorized' ); 
    echo 'Authorization Required!'; 
    exit;
  }
} elseif ($settings['htpasswd_authentication'] == 1) {
  if ((file_exists('./.htpasswd'))and(file_exists('./.htaccess'))) {
    $q = 'select * from hm2_users where id = 1';
    $row = get_mysql_line($q);
    if ($row['id'] == 1) {
      $userinfo = $row;
      $userinfo['logged'] = 1;
    }
  } else {
    exit;
  }
} else {
  $q = 'select *, l_e_t + interval 15 minute < now() as should_count from hm2_users where id = 1 '.$add_login_check;
  $sth = mysql_query($q) or print mysql_error();
  while ($row = mysql_fetch_array($sth)) {
    if ($settings['brute_force_handler'] == 1 && $row['activation_code'] != '') {
      header('Location: index.php?a=login&say=invalid_login&username='.$frm['username']);
      db_close($dbconn);
      exit;
    }
  
    $qhid = $row['hid'];
    $hid = substr($qhid, 5, 20);
    if ($chid == md5($hid)) {
      $userinfo = $row;
      $userinfo['logged'] = 1;
      $q = 'update hm2_users set last_access_time = now() where id = 1';
      mysql_query($q) or print mysql_error();
    } else {
      $q = "update hm2_users set bf_counter = bf_counter + 1 where id = {$row['id']}";
      mysql_query($q);
  
      if ($settings['brute_force_handler'] == 1 && $row['bf_counter'] == $settings['brute_force_max_tries']) {
        $activation_code = get_rand_md5(50);
        $q = 'update hm2_users set bf_counter = bf_counter + 1, activation_code = \''.$activation_code.'\' where id = '.$row['id'];
        mysql_query($q);
        $info = array();
        $info['activation_code'] = $activation_code;
        $info['username'] = $row['username'];
        $info['name'] = $row['name'];
        $info['ip'] = $frm_env['REMOTE_ADDR'];;
        $info['max_tries'] = $settings['brute_force_max_tries'];
        send_mail('brute_force_activation', $row['email'], $settings['system_email'], $info);
  
        header('Location: index.php?a=login&say=invalid_login&username='.$frm['username']);
        db_close($dbconn);
        exit;
      }
    }
  }
  mysql_free_result($sth);
}
#debug_file(4);
if ($userinfo['logged'] != 1)
{
  header('Location: index.php');
  db_close($dbconn);
  exit;
}

if (($acsent_settings['timestamp'] > time() - 15*60)and($acsent_settings['pin'] != '')) {
  if ($frm['a'] == 'enter_pin') {
    if ($frm['pin'] == $acsent_settings['pin']) {
      $acsent_settings['last_ip'] = $frm_env['REMOTE_ADDR'];
      $acsent_settings['last_browser'] = $frm_env['HTTP_USER_AGENT'];
      $acsent_settings['timestamp'] = 0;
      $acsent_settings['pin'] = '';
      set_accsent();
    }
    header('Location: admin.php');
    exit;
  }
  shop_pin_html();
  exit;
}

$NEWPIN = get_rand_md5(7);
$message = 'Hello,

Someone tried login admin area
ip: '.$frm_env['REMOTE_ADDR'].'
browser: '.$frm_env['HTTP_USER_AGENT'].'

Pin code for entering admin area is:
'.$NEWPIN.'

This code will be expired in 15 minutes.
';


if ($acsent_settings['detect_ip'] == 'disabled') {
// do nothing.
} elseif ($acsent_settings['detect_ip'] == 'medium') {
  $z1 = preg_replace('/\.(\d+)$/', '', $acsent_settings['last_ip']);
  $z2 = preg_replace('/\.(\d+)$/', '', $frm_env['REMOTE_ADDR']);

  if ($z1 != $z2) {
    $acsent_settings['pin'] = $NEWPIN;
    $acsent_settings['timestamp'] = time();
    simple_mail($acsent_settings['email'], $settings['system_email'], 'Pin code', $message);
    set_accsent();
    header('Location: admin.php');
    db_close($dbconn);
    exit;
  }

} elseif ($acsent_settings['detect_ip'] == 'high') {
  if ($acsent_settings['last_ip'] != $frm_env['REMOTE_ADDR']) {
    $acsent_settings['pin'] = $NEWPIN;
    $acsent_settings['timestamp'] = time();
    simple_mail($acsent_settings['email'], $settings['system_email'], 'Pin code', $message);
    set_accsent();
    header('Location: admin.php');
    db_close($dbconn);
    exit;
  }
} else {
  print 'Security settings are broken. Contact script developer please (<a href=http://www.goldcoders.com target=_blank>Goldcoders.com</a>)';
  exit;
// никого не пускать!!!!!!!!!!
}

if ($acsent_settings['detect_browser'] == 'disabled') {
// do nothing.
} elseif ($acsent_settings['detect_browser'] == 'enabled') {
  if ($acsent_settings['last_browser'] != $frm_env['HTTP_USER_AGENT']) {
    $acsent_settings['pin'] = $NEWPIN;
    $acsent_settings['timestamp'] = time();
    simple_mail($acsent_settings['email'], $settings['system_email'], 'Pin code', $message);
    set_accsent();
    header('Location: admin.php');
    db_close($dbconn);
    exit;
  }
} else {
  print 'Security settings are broken. Contact script developer please (<a href=http://www.goldcoders.com target=_blank>Goldcoders.com</a>)';
  exit;
// никого не пускать!!!!!!!!!!
}


if ($userinfo['should_count'] == 1) {
  $q = "update hm2_users set last_access_time = now() where username='$username'";
  mysql_query($q) or print mysql_error();
  count_earning(-1);
}




function get_news() {
  global $settings, $SCRIPT_VERSION;
  if (!function_exists('curl_init')) {
    return;
  }
  if ($settings['use_ip_for_auto'] != 0) {
    return;
  }
  $q = "select * from hm2_settings where name='LAST_NEWS_ID'";
  $row = get_mysql_line($q);
  $lnid = intval($row['value']);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'http://www.goldcoders.com/GCnews');
  curl_setopt($ch, CURLOPT_POST, 1);
  $str = "license={$settings['license']}&version={$SCRIPT_VERSION}&lnid={$lnid}&lid=".constant('LAST_UPDATE_ID')."&script=hmpro";
#  print $str;
  curl_setopt($ch, CURLOPT_POSTFIELDS, "$str");
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $l = curl_exec ($ch);
  curl_close ($ch); 
  $res = @unserialize($l);
  $lid = 0;
  for ($i = 0; $i<sizeof($res); $i++) {
    $qid = intval($res[$i]['id']);
    if ($lid < $qid) $lid = $qid;
    $qtitle = quote($res[$i]['title']);
    $qsmall_text = quote($res[$i]['small_text']);
    $qfull_text = quote($res[$i]['full_text']);
    $q = "insert into hm2_messages set
	title = '$qtitle',
	small_text = '{$qsmall_text}',
	full_text = '{$qfull_text}',
	received_date = now()";
    mysql_query($q) or print mysql_error();
  }
  if ($lid > 0) {
    $q = "delete from hm2_settings where name='LAST_NEWS_ID'";
    mysql_query($q) or print mysql_error();
    $q = "insert into hm2_settings set name='LAST_NEWS_ID', value=$lid";
    mysql_query($q) or print mysql_error();
  }
}
$q = "select * from hm2_settings where name='LAST_GET_NEWS'";
$row = get_mysql_line($q);
if ($row['value'] < time() - 4*60*60) { // 3 hours
  get_news();
  $q = "delete from hm2_settings where name='LAST_GET_NEWS'";
  mysql_query($q) or print mysql_error();
  $q = "insert into hm2_settings set value='".time()."', name='LAST_GET_NEWS'";
  mysql_query($q) or print mysql_error();
}

#get_news();



#Section=ADMIN_HIDDEN_ACTIONS


#SectionStart=ADMIN_HIDDEN_ACTIONS

function update_database_function() {
  $q = "select value from hm2_settings where name = 'update_id'";
  $row = get_mysql_line($q);

    $last_update_id = $last_update_id_save = intval($row['value']);

#    if ($last_update_id < 1) {
#      $q = "alter table hm2_types add column ordering int not null default 0";
#      mysql_query($q) or print mysql_error();
#      $last_update_id = 1;
#    }
#    if ($last_update_id < 2) {
#      $q = "alter table hm2_users add column sq text not null default '', add column sa text not null default ''";
#      mysql_query($q) or print mysql_error();
#      $last_update_id = 2;
#    }
    if ($last_update_id < 3) {
      $q = "alter table hm2_types change column  period period enum('d','w','b-w','m','y','end','2m', '3m', '6m', 'h') default NULL";
      mysql_query($q) or print mysql_error();
      $last_update_id = 3;
    }
    if ($last_update_id < 4) {
      $q = "alter table hm2_exchange_rates change column percent percent float(10,2) default 0";
      mysql_query($q) or print mysql_error();
      $last_update_id = 4;
    }
#    if ($last_update_id < 5) {
#      $q = "alter table hm2_types add column deposits_limit_num int default 0";
#      mysql_query($q) or print mysql_error();
#      $last_update_id = 5;
#    }

    if ($last_update_id < 7) {
      $q = "alter table hm2_history change column actual_amount actual_amount float(15,6) default 0";
      mysql_query($q) or print mysql_error();
      $last_update_id = 7;
    }

    if ($last_update_id < 8) {
      $q = "alter table hm2_users add column reg_fee float(15,2) not null default 0";
      mysql_query($q) or print mysql_error();
      $last_update_id = 8;
    }

    if ($last_update_id < 9) {
      $q = "insert into hm2_emails set id = 'acsent_user', name = 'Send pin to user', subject = 'Pin code', text = 'Hello #name#.\n\nSomeone tried login your account\nip: #ip#\nbrowser: #browser#\n\nPin code for entering your account is: #NEWPIN#\n\nThis code will be expired in 15 minutes.\n\n\n#site_name#\n#site_url#', status =1";
      mysql_query($q) or print mysql_error();
      $last_update_id = 9;
    }

    if ($last_update_id < 10) {
      $q = "insert into hm2_emails set id = 'transaction_code_recovery', name = 'Transaction code recovery', subject = 'Transaction code', text = 'Hello #name#.\n\nYour transaction code is : #transaction_code#\n\n\n#site_name#\n#site_url#', status =1";
      mysql_query($q) or print mysql_error();
      $last_update_id = 10;
    }

    if ($last_update_id < 11) {
      $q = "alter table hm2_users add column home_phone varchar(200) not null default '', add column cell_phone varchar(200) not null default '', add column work_phone varchar(200) not null default ''";
      mysql_query($q) or print mysql_error();
      $last_update_id = 11;
    }

    if ($last_update_id < 12) {
      $q = "create table hm2_tell_friend (user_id bigint not null default 0,	d datetime not null,	email varchar (250) not null default '');";
      mysql_query($q) or print mysql_error();
      $last_update_id = 12;
    }

    if ($last_update_id < 13) {
      $q = "alter table hm2_history add column confirm_delete varchar (20) not null default ''";
      mysql_query($q) or print mysql_error();
      $last_update_id = 13;
    }

    if ($last_update_id < 14) {
      $q = "alter table hm2_users add column verify int not null default 0";
      mysql_query($q) or print mysql_error();
      $q = "alter table hm2_history add index hi5 (date, deposit_id)";
      mysql_query($q) or print mysql_error();
      $last_update_id = 14;
    }

    if ($last_update_id < 15) {
      $q = "alter table hm2_history add index hi6 (date, type)";
      mysql_query($q) or print mysql_error();
      $q = "alter table hm2_history add index hi7 (date, type, deposit_id)";
      mysql_query($q) or print mysql_error();
      $last_update_id = 15;
    }

    if ($last_update_id < 16) {
      $q = "alter table hm2_pending_deposits add key hi1 (user_id, status, ec);";
      mysql_query($q) or print mysql_error();
      $last_update_id = 16;
    }

    if ($last_update_id < 17) {
      $q = "alter table hm2_types add column rpcp float(15, 2) not null default 0";
      mysql_query($q) or print mysql_error();
      $q = "alter table hm2_types add column ouma float(15, 2) not null default 0";
      mysql_query($q) or print mysql_error();
      $last_update_id = 17;
    }

    if ($last_update_id < 18) {
      $q = "insert into hm2_emails set id = 'tell_a_friend', name = 'Tell a friend', subject = 'Friend invited you', text = 'Hello #name_invited#.\n\nYour friend #username# invited you\n\n#referal_link#\n\n\n#site_name#\n#site_url#', status =1";
      mysql_query($q) or print mysql_error();
      $last_update_id = 18;
    }

#    if ($last_update_id < 19) {
#    }

    if ($last_update_id < 20) {
      $q = "alter table hm2_users add column pax_utype int not null default 0";
      mysql_query($q) or print mysql_error();
      $q = "alter table hm2_types add column pax_utype int not null default 0";
      mysql_query($q) or print mysql_error();
      $last_update_id = 20;
    }

    if ($last_update_id < 21) {
      $q = "alter table hm2_users add column gfst_phone varchar(20) not null default ''";
      mysql_query($q) or print mysql_error();
      $last_update_id = 21;
    }

    if ($last_update_id < 22) {
      $q = "insert into hm2_emails set id = 'deposit_account_admin_notification', name = 'Administrator Deposit Notification (from account balance)', subject = 'A deposit has been processed', text = 'User #username# deposit $#amount# #currency# from account balance to #plan#.\n\nAccount: #account#\nBatch: #batch#\nCompound: #compound#%.\nReferrers fee: $#ref_sum#', status =1";
      mysql_query($q) or print mysql_error();
      $last_update_id = 22;
    }

    if ($last_update_id < 23) {
      $q = "alter table hm2_users add column add_fields text";
      mysql_query($q) or print mysql_error();
      $last_update_id = 23;
    }

    if ($last_update_id < 24) {
      $q = "ALTER TABLE hm2_user_access_log ADD INDEX d_idx (date);";
      mysql_query($q) or print mysql_error();
      $q = "ALTER TABLE hm2_user_access_log ADD INDEX ip_idx (ip(15));";
      mysql_query($q) or print mysql_error();
      $last_update_id = 24;
    }


    if ($last_update_id < 25) {
      $q = "alter table hm2_types change column  period period enum('d','w','b-w','m','y','end','2m', '3m', '6m', 'h', 'df') default NULL";
      mysql_query($q) or print mysql_error();
      $last_update_id = 25;
    }
    if ($last_update_id < 26) { // это поле служит дл€ ингнорировани€ данного депозита в течение времени записанного в это поле дл€ float percents
      $q = "alter table hm2_deposits add column dde datetime default '1999-01-01'";
      mysql_query($q) or print mysql_error();
      $last_update_id = 26;
    }

    if ($last_update_id < 27) {
      $q = "create table hm2_history_descriptions (
  	type_id bigint not null,
  	date	datetime not null,
  	`description` varchar(255) not null)";
      mysql_query($q) or print mysql_error();
      $last_update_id = 27;
    }
    if ($last_update_id < 28) {
      $q = "alter table hm2_plans add column ext_id bigint not null";
      mysql_query($q) or print mysql_error();
      $last_update_id = 28;
    }
    if ($last_update_id < 29) {
      $q = "alter table hm2_users add column admin_desc text not null";
	///INSERT INTO `alangsta_hm`.`hm2_emails` (`id` ,`name` ,`subject` ,`text` ,`html` ,`use_html` ,`status` )VALUES ('WinLoseNotification', 'Win / Loss Notification', 'Win / Loss Notification', "Dear #username#\n\nYour Statement of today #today#\n\nWe add a new #win_loss# to your Account:\n\nWe made a #win_loss# of #win_loss_percent#% in the market #market#.\nTo your account ballance was added #win_loss_percent#% Investor, that are #amount# US$\nTo the SF was added #percent_sf#% SF\nThere was a total fee of #percent_fee# % Fee\n\nYour total active Investment is: $ #active_investment#\nYour current Account ballance is: $ #account_balance#", NULL , '0', '1');
      mysql_query($q) or print mysql_error();
      $last_update_id = 29;
    }
    if ($last_update_id < 30) {
      $q = "alter table hm2_users add column max_daily_withdraw float(15, 2) default 0";
      mysql_query($q) or print mysql_error();
      $last_update_id = 30;
    }
    
#SectionIfStart=stablearn.com
    if ($last_update_id < 31) {
//       * * * * * /usr/bin/wget  -O /dev/null 2>/dev/null http://site.com/index.php?a=runbot
//     * * * * * /usr/bin/wget  -O /dev/null 2>/dev/null http://site.com/index.php?a=run_crontab
      $q = "create table hm2_bots (id bigint not null auto_increment primary key, name varchar(200), status enum('new', 'dupe', 'processed'))";
      mysql_query($q) or print mysql_error();
      $last_update_id = 31;
    }
#SectionIfEnd
    if ($settings['license'] == 'TMTDHVSRKAZMHHH4XBPQ') {
    if ($last_update_id < 32) {
      $q = "insert into hm2_emails set id = 'support_client_email', name = 'Support e-mail to user', subject = '#site_name# Support request #subject#', text = 'Hello #name#.\n\nWe have received your message and answer asap. \n\nYour original message: \n#message#.\n\n\n#site_name#\n#site_url#', status =1";
      mysql_query($q) or print mysql_error();
      $last_update_id = 32;
    }
    }
#    if ($settings['license'] == '') {
    if ($last_update_id < 33) {
#     $q = "create table hm2_win_lose_log (
#		date datetime,
#		win_lose varchar(10),
#		percent float(15, 2),
#		market varchar(100))";
      

#      mysql_query($q) or print mysql_error();
      $last_update_id = 33;
    }
    if ($last_update_id < 34) {
    if (($settings['license'] == '6Q8TRKEGMBBRN9XR534G')or($settings['license'] == 'TAHRA3MTBU34THGNM6XY')or($settings['license'] == 'P7QT5W6T5SE45P8UVJTQ')) {

     $q = "alter table hm2_win_lose_log add column
	id bigint not null primary key auto_increment,
	add column start_date datetime not null,
	add column end_date datetime not null,
	add column processed bigint not null,
	add column total_q bigint not null,
	add column frm text,
	add column status enum('on', 'paused', 'processed');";
      mysql_query($q) or print mysql_error();
      $last_update_id = 34;
    }
    }

#    }
    if ($last_update_id < 35) {
      $q = "insert into hm2_emails set id = 'user_deposit_expired', name = 'Deposit expired to user', subject = '#site_name# . Deposit expired', text = 'Hello #name#.\n\nDeposit you made #deposit_date# has been expired.\nDeposit amount: $#deposit_amount#\nYour login: #username#.\n\n\n#site_name#\n#site_url#', status =0";
      mysql_query($q) or print mysql_error();
      $last_update_id = 35;
    }
      
    if ($last_update_id < 36) {
      $q = "create table hm2_messages (
 	id bigint not null auto_increment primary key,
	title text not null default '',
	small_text text not null default '',
	full_text text not null default '',
	status enum('new', 'read') default 'new',
	received_date datetime not null)";
      mysql_query($q) or print mysql_error();
      $last_update_id = 36;
    }  

    if ($last_update_id < 37) {
      $q = "create table hm2_savelog (
 	id bigint not null auto_increment primary key,
	log_text text not null default '',
	log_date datetime not null)";
      mysql_query($q) or print mysql_error();
      $last_update_id = 37;
    }  

    if ($last_update_id < 38) {
      $q = "alter table hm2_user_access_log add key idip (id, date, ip)";
      mysql_query($q) or print mysql_error();
      $last_update_id = 38;
    }  
    if ($last_update_id < 39) {
      $q = "alter table hm2_types add column dawifi int not null";
      mysql_query($q) or print mysql_error();
      $last_update_id = 39;
    }  

    if ($last_update_id < 40) {
      $q = "alter table hm2_types add column pae bigint not null";
      mysql_query($q) or print mysql_error();
      $last_update_id = 40;
    }  

    if ($last_update_id < 41) {
      $q = "create table hm2_groups (
 	id bigint not null auto_increment primary key,
	name text not null default '',
	fields text)";
      mysql_query($q) or print mysql_error();
      $q = "alter table hm2_users add column group_id bigint not null default 0";
      mysql_query($q) or print mysql_error();
      $last_update_id = 41;
    }  

    if ($last_update_id < 42) {
      $q = "create table hm2_fchk (id int not null auto_increment primary key, filename varchar(200) not null default '', `key` varchar(50) not null default '', tdate datetime not null, inform int not null default 0)";
      mysql_query($q) or print mysql_error();
      $last_update_id = 42;
    }

#    if ($last_update_id < 43) {
#      $q = "create table hm2_review (id int not null auto_increment primary key, uname varchar(200) not null default '', review text not null default '', tdate datetime not null, approved int not null default 0, uid int not null default 0)";
#      mysql_query($q) or print mysql_error();
#      $last_update_id = 43;
#    }
    if ($last_update_id < 44) {
      $q = "create table hm2_holidays (id int not null auto_increment primary key, hd date, hdescription text not null)";
      mysql_query($q) or print mysql_error();
      $last_update_id = 44;
    }

    if ($last_update_id < 45) {
      $q = "alter table hm2_types add column amount_mult float(10,2) not null default 1";
      mysql_query($q) or print mysql_error();
      $last_update_id = 45;
    }


    if ($last_update_id != $last_update_id_save) {
      $q = "delete from hm2_settings where name = 'update_id'";
      mysql_query($q);
      $q = "insert into hm2_settings set value = $last_update_id, name = 'update_id'";
      $sth = mysql_query($q);
    }
    if ($frm['a'] == 'update_database') {
       print 'ok'; exit;

    }
    
}

#SectionEnd=ADMIN_HIDDEN_ACTIONS


#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'encrypt_mysql')
{
  if ($settings['demomode'] != 1)
  {
    if ($userinfo['transaction_code'] != '' && $userinfo['transaction_code'] != $frm['alternative_passphrase'])
    {
      header('Location: ?a=security&say=invalid_passphrase');
      db_close($dbconn);
      exit;
    }

    if (! file_exists('./tmpl_c/.htdata'))
    {
      $fp = fopen('./tmpl_c/.htdata', 'w');
      fclose($fp);
      save_settings2('hyip manager pro 2005 jul 26');
    }
    header('Location: admin.php?a=security&say=done');
    db_close($dbconn);
    exit;
  }
  header('Location: admin.php?a=security');
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS


#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'change_login_security') and ($frm['act'] == 'change')) {
  if ($settings['demomode'] != 1) {
    $acsent_settings['detect_ip'] = $frm['ip'];
    $acsent_settings['detect_browser'] = $frm['browser'];
    $acsent_settings['last_browser'] = $frm_env['HTTP_USER_AGENT'];
    $acsent_settings['last_ip'] = $frm_env['REMOTE_ADDR'];
    $acsent_settings['email'] = $frm['email'];

    set_accsent();
  }

  header('Location: ?a=security');
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS


#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($startup_bonus_mode_enabled == 1 && $frm['a'] == 'startup_bonus' && $frm['act'] == 'set') {
  $settings['startup_bonus_percent'] = sprintf("%0.2f", $frm['startup_bonus_percent']);
  $settings['startup_bonus_settings_enabled_replace'] = intval($frm['add_startup_bonus']);

  save_settings2('hyip manager pro 2005 jul 26');
  header('Location: ?a=startup_bonus&say=yes');
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS


//count_earning(3);

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'exchange_rates' && $frm['action'] == 'save')
{
#SectionIfStart=demo
  if ($settings['demomode'])
  {
    header("Location: ?a=exchange_rates&say=demo");
    db_close($dbconn);
    exit;
  }
#SectionIfEnd
  $settings['enable_exchange'] = intval($frm['enable_exchange']);
  save_settings2('hyip manager pro 2005 jul 26');
  $exch = $frm['exch'];
  if (is_array($exch))
  {
    foreach ($exchange_systems as $id_from => $value)
    {
//      if (! $value['status']) continue;
      foreach ($exchange_systems as $id_to => $value)
      {
//        if (! $value['status']) continue;
        if ($id_to == $id_from) continue;
        $percent = sprintf("%.02f", $exch[$id_from][$id_to]);
        if ($settings['license'] == 'KYK88CT3NQQG4AYWWXT6') {
          if ($percent < -1000) $percent = -1000.00;
        } else {
          if ($percent < 0) $percent = 0.00;
        }
        if ($percent > 100) $percent = 100.00;
        $q = "select count(*) as cnt from hm2_exchange_rates where `sfrom` = $id_from and `sto` = $id_to";
        $row = get_mysql_line($q);
        if ($row['cnt'] > 0) {
          $q = "update hm2_exchange_rates set percent = $percent where `sfrom` = $id_from and `sto` = $id_to";
        } else {
          $q = "insert into hm2_exchange_rates set percent = $percent, `sfrom` = $id_from, `sto` = $id_to";
        }
        mysql_query($q);
      }
    }
  }

  header("Location: ?a=exchange_rates");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS



#SectionStart=ADMIN_HIDDEN_ACTIONS
if (
    ($frm['a'] == 'test_eeecurrency_settings')or
    ($frm['a'] == 'test_pecunix_settings')or
    ($frm['a'] == 'test_alertpay_settings')or
    ($frm['a'] == 'test_perfectmoney_settings')or
    ($frm['a'] == 'test_nixmoney_settings')or
    ($frm['a'] == 'test_evowallet_settings')or
    ($frm['a'] == 'test_liqpay_settings')or
    ($frm['a'] == 'test_gdp_settings')or
    ($frm['a'] == 'test_strictpay_settings')or
    ($frm['a'] == 'test_cosmicpay_settings')or
    ($frm['a'] == 'test_solidtrustpay_settings')or
    ($frm['a'] == 'test_egopay_settings')or
    ($frm['a'] == 'test_okpay_settings')or
    ($frm['a'] == 'test_capitalsure_settings')
  ) {
  include "inc/admin/auto_pay_settings_test2.php";
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'test_smtp') {
  include "inc/admin/test_smtp.inc.php";
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS


#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'affilates')and($frm['action'] == 'remove_ref')) {
  $u_id = sprintf("%d", $frm['u_id']);
  $ref = sprintf("%d", $frm['ref']);
  $q = "update hm2_users set ref = 0 where id = $ref";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=affilates&u_id=$u_id");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'affilates')and($frm['action'] == 'change_upline')) {
  $u_id = sprintf("%d", $frm['u_id']);
  $upline = quote($frm['upline']);
  $q = "select * from hm2_users where username='$upline'";
  $row = get_mysql_line($q);
  $id = intval($row['id']);

  $q = "update hm2_users set ref = $id where id = $u_id";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=affilates&u_id=$u_id");
  db_close($dbconn);
  exit;

}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'pending_deposit_details') and ($frm['action'] == 'movetoproblem')) {
  $id = sprintf("%d", $frm['id']);
  $q = "update hm2_pending_deposits set status='problem' where id = $id";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=pending_deposits");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'pending_deposit_details') and ($frm['action'] == 'movetonew')) {
  $id = sprintf("%d", $frm['id']);
  $q = "update hm2_pending_deposits set status='new' where id = $id";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=pending_deposits&type=problem");

  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'pending_deposit_details')and($frm['action'] == 'delete')) {
  $id = sprintf("%d", $frm['id']);
  $q = "delete from hm2_pending_deposits where id = $id";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=pending_deposits&type=".$frm['type']);
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'pending_deposit_details') and
         ( ($frm['action'] == 'movetodeposit') || ($frm['action'] == 'movetoaccount') ) and
         ($frm['confirm'] == 'yes')) 
  {
  $deposit_id = $id = sprintf("%d", $frm['id']);

  $q = "select
          hm2_pending_deposits.*,
          hm2_users.username
        from
          hm2_pending_deposits,
          hm2_users
        where
          hm2_pending_deposits.user_id = hm2_users.id and
          hm2_pending_deposits.id = $id and
          hm2_pending_deposits.status != 'processed'
       ";
  $sth = mysql_query($q) or print mysql_error();
  $amount = sprintf("%0.2f", $frm['amount']);
  while ($row = mysql_fetch_array($sth))
  {
    $ps = $row['ec'];

    if ($settings['license'] == 'KC3STYBTCATZNRVBYGDF')
    {
      $ps = 1007;
    }

    $username = $row['username'];
    $compound = sprintf("%d", $row['compound']);
    $fields = $row['fields'];
    $user_id = $row['user_id'];
    if (($compound > 100)or($compound < 0))
    {
      $compound = 0;
    }

    $q = "insert into hm2_history set
            user_id = ".$row['user_id'].",
            date = now(),
            amount = $amount,
            actual_amount = $amount,
            type='add_funds',
            description='".quote($exchange_systems[$row['ec']]['name'])." transfer received',
            ec = ".$row['ec'];
    mysql_query($q);

    if (($frm['action'] == 'movetodeposit') and ($row['type_id'] > 0))
    {
      $q = "select name, delay from hm2_types where id = ".$row['type_id'];
      $row1 = get_mysql_line($q);
      $delay = intval($row1['delay']);
      if ($delay > 0) $delay--;


      $q = "insert into hm2_deposits set
              user_id = ".$row['user_id'].",
              type_id = ".$row['type_id'].",
              deposit_date = now(),
              last_pay_date = now() + interval $delay day,
              status = 'on',
              q_pays = 0,
              amount = $amount,
              actual_amount = $amount,
              ec = $ps,
              compound = $compound";
      mysql_query($q);
      $deposit_id = mysql_insert_id();


      $q = "insert into hm2_history set
              user_id = ".$row['user_id'].",
              date = now(),
              amount = -$amount,
              actual_amount = -$amount,
              type='deposit',
              description='Deposit to ".quote($row1['name'])."',
              ec = $ps,
              deposit_id = $deposit_id
           ";
      mysql_query($q);

      $ref_sum = referral_commission($row['user_id'], $amount, $ps);
    }

    $info = array();
    $q = "select * from hm2_users where id = ".$user_id;
    $userinfo = get_mysql_line($q);

    $q = "select * from hm2_types where id = ".$row['type_id'];
    $type = get_mysql_line($q);

    $info['username'] = $userinfo['username'];
    $info['name'] = $userinfo['name'];
    $info['amount'] = number_format($row['amount'], 2);
    $info['currency'] = $exchange_systems[$ps]['name'];
    $info['compound'] = number_format($type['compound'], 2);
    $info['plan'] = ($row['type_id'] > 0) ? $type['name'] : 'Deposit to Account';

    $q = "select * from hm2_processings where id = ".$row['ec'];
    $processing = get_mysql_line($q);
    $pfields = unserialize($processing['infofields']);
    $infofields = unserialize($fields);
    $f = '';
    foreach ($pfields as $id => $name)
    {
      $f .= "$name: ".stripslashes($infofields[$id])."\n";
    } 
    $info['fields'] = $f;

    $q = "select date_format(date + interval ".$settings['time_dif']." hour, '%b-%e-%Y %r') as dd from hm2_pending_deposits where id = ".$row['id'];
    $row1 = get_mysql_line($q);
    $info['deposit_date'] = $row1['dd'];

    $q = "select email from hm2_users where id = 1";
    $admin_row = get_mysql_line($q);

    send_mail('deposit_approved_admin_notification', $admin_row['email'], $settings['opt_in_email'], $info);
    send_mail('deposit_approved_user_notification', $userinfo['email'], $settings['opt_in_email'], $info);
  }
  mysql_free_result($sth);

  $id = sprintf("%d", $frm['id']);
  $q = "update hm2_pending_deposits set status='processed' where id = $id";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=pending_deposits");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

/*
if (($frm['a'] == 'wiredetails')and(($frm['action'] == 'movetodeposit')or($frm['action'] == 'movetoaccount'))and($frm['confirm'] == 'yes'))
{
  $id = sprintf("%d", $frm['id']);
  $q = "update hm2_wires set status='processed' where id = $id";
  mysql_query($q) or print mysql_error();

  $q = "select *, date_format(wire_date + interval ".$settings['time_dif']." hour, '%b-%e-%Y %r') as wdate from hm2_wires where id = $id";
  $sth = mysql_query($q);
  $amount = sprintf("%0.2f", $frm['amount']);
  while ($row = mysql_fetch_array($sth)) {
    $compound = sprintf("%d", $row['compound']);
    if (($compound > 100) or ($compound < 0))
    {
      $compound = 0;
    }
    $q = "insert into hm2_history set
            user_id = ".$row['user_id'].",
            date = now(),
            amount = $amount,
            actual_amount = $amount,
            type = 'add_funds',
            description='Wire transfer received',
            ec = 999";
    mysql_query($q);

    $info = array();
    $q = "select * from hm2_users where id = ".$row['user_id'];
    $userinfo = get_mysql_line($q);

    $q = "select * from hm2_types where id = ".$row['type_id'];
    $type = get_mysql_line($q);

    $info['username'] = $userinfo['username'];
    $info['name'] = $userinfo['name'];
    $info['amount'] = $row['amount'];
    $info['currency'] = 'Bank Wire';
    $info['bank_name'] = $row['bname'];
    $info['bank_account'] = $row['baccount'];
    $info['plan'] = $type['name'];
    $info['wire_date'] = $row['wdate'];

    $q = "select date_format(now() + interval ".$settings['time_dif']." hour, '%b-%e-%Y %r') as date";
    $row1 = get_mysql_line($q);
    $info['date'] = $row1['date'];

    $q = "select email from hm2_users where id = 1";
    $admin_row = get_mysql_line($q);
    send_mail('wire_admin_approved_notification', $admin_row['email'], $settings['opt_in_email'], $info);
    send_mail('wire_user_approved_notification', $userinfo['email'], $settings['opt_in_email'], $info);

    if ($frm['action'] == 'movetodeposit')
    {
      $q = "select name from hm2_types where id = ".$row['type_id'];
      $row1 = get_mysql_line($q);
      $q = "insert into hm2_deposits set
              user_id = ".$row['user_id'].",
              type_id = ".$row['type_id'].",
              deposit_date = now(),
              last_pay_date = now(),
              status = 'on',
              q_pays = 0,
              amount = $amount,
              actual_amount = $amount,
              ec = 999,
              compound = $compound";
      mysql_query($q);
      $deposit_id = mysql_insert_id();
      $q = "insert into hm2_history set
              user_id = ".$row['user_id'].",
              date = now(),
              amount = -$amount,
              actual_amount = -$amount,
              type='deposit',
              description='Deposit to ".$row1['name']."',
              ec = 999,
              deposit_id = $deposit_id
              ";
      mysql_query($q);

      $user_id = $row['user_id'];
      $ref = 0;
      if ($settings['use_referal_program'] == 1)
      {
        $q = "select * from hm2_users where id = $user_id";
        $uinfo = get_mysql_line($q);

        $q = "select * from hm2_users where id = $user_id";
        $sth = mysql_query($q);
        while ($row = mysql_fetch_array($sth))
        {
          if ($row['ref'] > 0)
          {
            $ref = $row['ref'];
            if ($settings['use_active_referal'] == 1) {
              $q = "select count(distinct user_id) as col from hm2_users, hm2_deposits where ref = $ref and hm2_deposits.user_id = hm2_users.id";
            } else {
              $q = "select count(id) as col from hm2_users where ref = $ref";
            }
            $sth = mysql_query ($q);
            if ($row = mysql_fetch_array($sth))
            {
              $col = $row['col'];
              $q = "select percent from hm2_referal where from_value <= $col and (to_value >= $col or to_value = 0) order by from_value desc limit 1";
              $sthqq = mysql_query($q) or print mysql_error();
              if ($row = mysql_fetch_array($sthqq)) {
                $sum = $amount*$row['percent']/100;
                $q = "insert into hm2_history set
                        user_id = $ref,
                        amount = $sum,
                        actual_amount = $sum,
                        type = 'commissions',
                        description = 'Referral commission from ".quote($uinfo['username'])."',
                        ec = 999,
                        date = now()";
                mysql_query($q) or print mysql_error();

                $q = "select * from hm2_users where id = $ref";
                $refinfo = get_mysql_line($q);

                $refinfo['amount'] = number_format($sum, 2);
                $refinfo['ref_username'] = $uinfo['username'];
                $refinfo['ref_name'] = $uinfo['name'];
                $refinfo['currency'] = $exchange_systems[999]['name'];
                send_mail('referral_commision_notification', $admin_email, $settings['system_email'], $refinfo);
              }
              mysql_free_result($sthqq);
            }
          }
        }
        mysql_free_result($sth);
        for ($i = 2; $i<11; $i++) {
          if (($ref == 0)or($settings['ref'.$i.'_cms'] == 0)) {
            break;
          }
          $q = "select * from hm2_users where id = $ref";
          $sth_user = get_mysql_line($q);
          $ref = 0;
          if ($sth_user['id'] > 0) {
            $ref = $sth_user['ref'];
            if ($ref > 0) {
              $sum = $amount*$settings['ref'.$i.'_cms']/100;
              $q = "insert into hm2_history set
                      user_id = ".$sth_user['ref'].",
                      amount = $sum,
                      actual_amount = $sum,
                      type = 'commissions',
                      description = 'Referral commission from ".quote($uinfo['username'])." $i level referral',
                      ec = 999,
                      date = now()";
              mysql_query($q) or print mysql_error();
            }
          }
        }
      }
    }
  }
  mysql_free_result($sth);
  header("Location: ?a=wires");
  db_close($dbconn);
  exit;
  
}


if (($frm['a'] == 'wiredetails') and ($frm['action'] == 'movetoproblem')) {
  $id = sprintf("%d", $frm['id']);
  $q = "update hm2_wires set status='problem' where id = $id";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=wires");
  db_close($dbconn);
  exit;
}

if (($frm['a'] == 'wiredetails') and ($frm['action'] == 'movetonew')) {
  $id = sprintf("%d", $frm['id']);
  $q = "update hm2_wires set status='new' where id = $id";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=wires&type=problem");
  db_close($dbconn);
  exit;
}

if (($frm['a'] == 'wiredetails')and($frm['action'] == 'deletewire')) {
  $id = sprintf("%d", $frm['id']);
  $q = "delete from hm2_wires where id = $id";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=wires");
  db_close($dbconn);
  exit;
  
}

if (($frm['a'] == 'wire_settings')and($frm['action'] == 'wire_settings')) {
  $settings['enable_wire'] = sprintf("%d", $frm['enable_wire']);
  save_settings2('hyip manager pro 2005 jul 26');
  $txt = quote(nl2br($frm['details']));
  $q = "update hm2_settings set value='$txt' where name='wire_text'";
  mysql_query($q) or print mysql_error();

  header("Location: ?a=wire_settings");
  db_close($dbconn);
  exit;
}
*/

#print_r($frm);

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'referal_send_monthly_referral_bonus_fxipc') and ($frm['action'] == 'process')) {
  if ($settings['license'] != '357SEAD9DT2J7Q3G6CLY') exit;
  $min_pers_inv = sprintf("%0.2f", $settings['fxipc_ref1_persinv']);
  $q = "select u.id, sum(d.actual_amount) as sum1 from hm2_users as u, hm2_deposits as d 
  	where u.id = d.user_id and
  	d.status = 'on'
  	group by u.id 
  	having sum1 >= $min_pers_inv";
  $sth = mysql_query($q) or print mysql_error();
  while ($row = mysql_fetch_array($sth)) {
    $q = "select sum(d.actual_amount) as sum1 from hm2_deposits as d, hm2_users as u 
    	where u.ref = {$row['id']} and
    		d.status = 'on'and
    		d.user_id = u.id";
    $am = 0;
    $sth1 = mysql_query($q);
    while ($row1 = mysql_fetch_array($sth1)) {
      $am = sprintf("%0.2f", $row1['sum1']);
    }
    $q = "select sum(h.actual_amount) as sum1 from hm2_history as h, hm2_users as u
    	where 
    		h.user_id = u.id and
    		u.ref = {$row['id']} and 
    		h.type='earning' and 
    		month(now() - interval 1 month) = month(h.date) and
    		year(now() - interval 1 month) = year(h.date)";
    $sth2 = mysql_query($q) or print mysql_error();
    while ($row2 = mysql_fetch_array($sth2)) {
      $er = $row2['sum1'];
    }
#    print "{$row['id']} - {$row['sum1']} - {$am} - {$er}<br>";
    for ($i = 5; $i>=1; $i--) {
      if (($row['sum1'] >= $settings['fxipc_ref'.$i.'_persinv'])and($am >= $settings['fxipc_ref'.$i.'_grpinv'])) {
#        print "<b>$i</b><br>";
        $q = "select sum(h.actual_amount) as sum1, h.ec as ec1 from hm2_history as h, hm2_users as u
	    	where 
    		h.user_id = u.id and
    		u.ref = {$row['id']} and 
    		h.type='earning' and 
    		month(now() - interval 1 month) = month(h.date) and
    		year(now() - interval 1 month) = year(h.date) group by h.ec";
    	$sth2 = mysql_query($q) or print mysql_error();
    	while ($row2 = mysql_fetch_array($sth2)) {
    	  $er = $row2['sum1'];
    	  $ec = $row2['ec1'];
    	  $amount = $er*$settings['fxipc_ref'.$i.'_percent']/100;
          $q = "insert into hm2_history 
        	set 
        		user_id = {$row['id']},
        		`type` = 'commissions',
        		amount = $amount,
        		actual_amount = $amount,
        		date = now(),
        		ec = $ec,
        		`description` = 'Monthly referral commission'"; 
          mysql_query($q) or print mysql_error();
    	}
        break;
      }
    }
  }
  print "Done";
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($settings['license'] == '6Q8TRKEGMBBRN9XR534G')or($settings['license'] == 'TAHRA3MTBU34THGNM6XY')or($settings['license'] == 'P7QT5W6T5SE45P8UVJTQ')) {
if (($frm['a'] == 'send_win')&&($frm['act'] == 'send')) {
  @set_time_limit(9999999);
  $winlose = $frm['winlose'] == 'win' ? 'Win' : 'Loss';
  $percent = sprintf("%0.2f", $frm['percent']);
  $market = quote($frm['market']);

  $q = "select count(d.id) as total_q 
	from hm2_deposits as d, hm2_users as u 
	where d.status='on' and d.user_id = u.id ";
  $sth = mysql_query($q) or print mysql_error();
  $total_q = 0;
  while ($row = mysql_fetch_array($sth)) {
    $total_q = $row['total_q'];
  }
  $frm_q = quote(serialize($frm));
  $q = "insert into hm2_win_lose_log
		set date = now(),
		win_lose = '$winlose',
		percent = $percent,
		market = '$market',
		start_date = now(),
		processed = 0,
		total_q = $total_q,
		frm = '$frm_q',
		status = 'on'";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=send_win");
  exit;
}
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'mass') {
  if ($frm['action2'] == 'massremove') {
    $ids = $frm['pend'];
    reset($ids);
    while(list($kk,$vv)=each($ids)) {
      $kk = sprintf("%d", $kk);
      $q = "delete from hm2_history where id = $kk";
      mysql_query($q) or print mysql_error();
    }
    header("Location: ?a=thistory&ttype=withdraw_pending&say=massremove");
    db_close($dbconn);
    exit;
   
  }
  if ($frm['action2'] == 'masssetprocessed') {
    $ids = $frm['pend'];
    reset($ids);
    while(list($kk,$vv)=each($ids)) {
      $kk = sprintf("%d", $kk);
      $q = "select * from hm2_history where id = $kk";
      $sth = mysql_query($q);
      while ($row = mysql_fetch_array($sth)) {
        $q = "insert into hm2_history set
		user_id = ".$row['user_id'].",
		amount = -".abs($row['actual_amount']).",
		actual_amount = -".abs($row['actual_amount']).",
		type = 'withdrawal',
		date = now(),
		description = 'Withdrawal processed',
		ec = ".$row['ec'];
        mysql_query($q) or print mysql_error();
        $q = "delete from hm2_history where id = ".$row['id'];
        mysql_query($q) or print mysql_error();

        $userinfo = array();
        $q = "select * from hm2_users where id = ".$row['user_id'];
        $sth1 = mysql_query($q);
        $userinfo = mysql_fetch_array($sth1);

        $info = array();
        $info['username'] = $userinfo['username'];
        $info['name'] = $userinfo['name'];
        $info['amount'] = number_format(abs($row['amount']), 2);
        $info['currency'] = $exchange_systems[$row['ec']]['name'];
        $info['account'] = 'n/a';
        $info['batch'] = 'n/a';
        $info['paying_batch'] = 'n/a';
        $info['receiving_batch'] = 'n/a';
        send_mail('withdraw_user_notification', $userinfo['email'], $settings['opt_in_email'], $info);

        $q = "select email from hm2_users where id = 1";
        $sth = mysql_query($q);
        $admin_row = mysql_fetch_array($sth);
        send_mail('withdraw_admin_notification', $admin_row['email'], $settings['opt_in_email'], $info);
      }
    }
    header("Location: ?a=thistory&ttype=withdraw_pending&say=massprocessed");
    db_close($dbconn);
    exit;
   
  }
  if ($frm['action2'] == 'masscsv') {
    $ids = $frm['pend'];
    if (! $ids)
    {
      print "Nothing selected.";
      db_close($dbconn);
      exit;
    }
    reset($ids);
    header("Content-type: text/plain");
    $ec = -1;
    $s = '-1';
    while(list($kk,$vv)=each($ids)) {
      $kk = intval($kk);
      $s .= ",$kk";
    }
    $q = "select 
		h.*, u.accounts 
              from hm2_history as h, hm2_users as u where h.id in ($s) and u.id = h.user_id order by ec";
    $sth = mysql_query($q);
    while ($row = mysql_fetch_array($sth)) {
      if ($row['ec'] > 100) {
        continue;
      }
      if ($ec != $row['ec']) {
        print "#".$exchange_systems[$row['ec']]['name']." transactions (account, amount)\n";
        $ec = $row['ec'];
      }
      $accounts = unserialize($row['accounts']);
      $ac = $accounts[$row['ec']];

      $amount = abs($row['amount']);
      $fee = floor($amount * $settings['withdrawal_fee']) / 100;
      if ($fee < $settings['withdrawal_fee_min']) { $fee = $settings['withdrawal_fee_min']; }
      $to_withdraw = $amount - $fee;
      if ($to_withdraw < 0) $to_withdraw = 0;
      $to_withdraw = sprintf("%.02f", floor($to_withdraw * 100) / 100);

      print $ac.",".abs($to_withdraw)."\n";
    }
    db_close($dbconn);
    exit;
  }

  if (($frm['action2'] == 'masspay')and($frm['action3'] == 'masspay')) {
#SectionIfStart=demo
    if ($settings['demomode'] == 1) exit;
#SectionIfEnd
    $ids = $frm['pend'];

    if ($frm['e_acc'] == 1) {
      $egold_account = $frm['egold_account'];
      $egold_password = $frm['egold_password'];
      $settings['egold_from_account'] = $egold_account;
    } else {
      $q = "select v from hm2_pay_settings where n='egold_account_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $egold_account = $settings['egold_from_account'];
        $egold_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }
    if ($frm['evo_acc'] == 1) {
      $evocash_account = $frm['evocash_account'];
      $evocash_password = $frm['evocash_password'];
      $evocash_code = $frm['evocash_code'];
      $settings['evocash_username'] = $frm['evocash_name'];
      $settings['evocash_from_account'] = $evocash_account;
    } else {
      $q = "select v from hm2_pay_settings where n='evocash_account_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $evocash_account = $settings['evocash_from_account'];
        $evocash_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
      $q = "select v from hm2_pay_settings where n='evocash_transaction_code'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $evocash_code = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }
    if ($frm['intgold_acc'] == 1) {
      $intgold_account = $frm['intgold_account'];
      $intgold_password = $frm['intgold_password'];
      $intgold_code = $frm['intgold_code'];
      $settings['intgold_from_account'] = $intgold_account;
    } else {
      $q = "select v from hm2_pay_settings where n='intgold_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $intgold_account = $settings['intgold_from_account'];
        $intgold_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
      $q = "select v from hm2_pay_settings where n='intgold_transaction_code'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $intgold_code = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }
    if ($frm['eeecurrency_acc'] == 1) {
      $eeecurrency_account = $frm['eeecurrency_account'];
      $eeecurrency_password = $frm['eeecurrency_password'];
      $eeecurrency_code = $frm['eeecurrency_code'];
      $settings['eeecurrency_from_account'] = $eeecurrency_account;
    } else {
      $q = "select v from hm2_pay_settings where n='eeecurrency_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $eeecurrency_account = $settings['eeecurrency_from_account'];
        $eeecurrency_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
      $q = "select v from hm2_pay_settings where n='eeecurrency_transaction_code'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $eeecurrency_code = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }
    if ($frm['pecunix_acc'] == 1) {
      $pecunix_account = $frm['pecunix_account'];
      $pecunix_password = $frm['pecunix_password'];
      $settings['pecunix_from_account'] = $pecunix_account;
    } else {
      $q = "select v from hm2_pay_settings where n='pecunix_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $pecunix_account = $settings['pecunix_from_account'];
        $pecunix_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }
    if ($frm['alertpay_acc'] == 1) {
      $alertpay_account = $frm['alertpay_account'];
      $alertpay_password = $frm['alertpay_password'];
      $settings['alertpay_from_account'] = $alertpay_account;
    } else {
      $q = "select v from hm2_pay_settings where n='alertpay_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $alertpay_account = $settings['alertpay_from_account'];
        $alertpay_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

/*
    if ($frm['libertyreserve_acc'] == 1) {
      $libertyreserve_account = $frm['libertyreserve_account'];
      $libertyreserve_password = $frm['libertyreserve_password'];
      $libertyreserve_code = $frm['libertyreserve_code'];
      $settings['libertyreserve_from_account'] = $libertyreserve_account;
    } else {
      $q = "select v from hm2_pay_settings where n='libertyreserve_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $libertyreserve_account = $settings['libertyreserve_from_account'];
        $libertyreserve_code = $settings['libertyreserve_apiname'];
        $libertyreserve_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }
*/

/*
    if ($frm['vmoney_acc'] == 1) {
      $vmoney_account = $frm['vmoney_account'];
      $vmoney_password = $frm['vmoney_password'];
      $settings['vmoney_from_account'] = $vmoney_account;
    } else {
      $q = "select v from hm2_pay_settings where n='vmoney_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $vmoney_account = $settings['vmoney_from_account'];
        $vmoney_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }
*/
    if ($frm['strictpay_acc'] == 1) {
      $strictpay_account = $frm['strictpay_account'];
      $strictpay_email = $frm['strictpay_email'];
      $strictpay_password = $frm['strictpay_password'];
      $strictpay_code = $frm['strictpay_code'];
      $settings['strictpay_from_account'] = $strictpay_account;
      $settings['strictpay_email'] = $strictpay_email;
    } else {
      $strictpay_account = $settings['strictpay_from_account'];
      $strictpay_email = $settings['strictpay_email'];
      $q = "select v from hm2_pay_settings where n='strictpay_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $strictpay_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
      $q = "select v from hm2_pay_settings where n='strictpay_code'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $strictpay_code = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    if ($frm['solidtrustpay_acc'] == 1) {
      $settings['solidtrustpay_apiname'] = $frm['solidtrustpay_apiname'];
      $solidtrustpay_password = $frm['solidtrustpay_password'];
    } else {
      $q = "select v from hm2_pay_settings where n='solidtrustpay_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $solidtrustpay_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    if ($frm['altergold_acc'] == 1) {
      $altergold_account = $frm['altergold_account'];
      $altergold_password = $frm['altergold_password'];
      $settings['altergold_from_account'] = $altergold_account;
    } else {
      $q = "select v from hm2_pay_settings where n='altergold_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $altergold_account = $settings['altergold_from_account'];
        $altergold_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }
    if ($frm['perfectmoney_acc'] == 1) {
      $perfectmoney_account = $frm['perfectmoney_account'];
      $perfectmoney_password = $frm['perfectmoney_password'];
      $perfectmoney_payer_account = $frm['perfectmoney_code'];
      $settings['perfectmoney_from_account'] = $perfectmoney_account;
    } else {
      $q = "select v from hm2_pay_settings where n='perfectmoney_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $perfectmoney_account = $settings['perfectmoney_from_account'];
        $perfectmoney_payer_account = $settings['perfectmoney_payer_account'];
        $perfectmoney_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    if ($frm['evowallet_acc'] == 1) {
      $evowallet_account = $frm['evowallet_account'];
      $evowallet_password = $frm['evowallet_password'];
      $evowallet_code = $frm['evowallet_code'];
      $settings['evowallet_from_account'] = $evowallet_account;
    } else {
      $q = "select v from hm2_pay_settings where n='evowallet_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $evowallet_account = $settings['evowallet_from_account'];
        $evowallet_code = $settings['evowallet_apiname'];
        $evowallet_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    if ($frm['remitfund_acc'] == 1) {
      $remitfund_account = $frm['remitfund_account'];
      $remitfund_password = $frm['remitfund_password'];
      $remitfund_code = $frm['remitfund_code'];
      $settings['remitfund_from_account'] = $remitfund_account;
    } else {
      $q = "select v from hm2_pay_settings where n='remitfund_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $remitfund_account = $settings['remitfund_from_account'];
        $remitfund_code = $settings['remitfund_apiname'];
        $remitfund_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    if ($frm['liqpay_acc'] == 1) {
      $liqpay_account = $frm['liqpay_account'];
      $liqpay_password = $frm['liqpay_password'];
      $settings['liqpay_from_account'] = $liqpay_account;
    } else {
      $q = "select v from hm2_pay_settings where n='liqpay_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $liqpay_account = $settings['liqpay_from_account'];
        $liqpay_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    if ($frm['egopay_acc'] == 1) {
      $egopay_account = $frm['egopay_account'];
      $egopay_apiname = $frm['egopay_apiname'];
      $egopay_password = $frm['egopay_password'];
      $settings['egopay_from_account'] = $egopay_account;
    } else {
      $q = "select v from hm2_pay_settings where n='egopay_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $egopay_account = $settings['egopay_from_account'];
        $egopay_apiname = $settings['egopay_apiname'];
        $egopay_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    if ($frm['capitalsure_acc'] == 1) {
      $capitalsure_account = $frm['capitalsure_account'];
      $capitalsure_password = $frm['capitalsure_password'];
      $settings['capitalsure_from_account'] = $capitalsure_account;
    } else {
      $q = "select v from hm2_pay_settings where n='capitalsure_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $capitalsure_account = $settings['capitalsure_from_account'];
        $capitalsure_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    if ($frm['okpay_acc'] == 1) {
      $okpay_account = $frm['okpay_account'];
      $okpay_password = $frm['okpay_password'];
      $settings['okpay_from_account'] = $okpay_account;
    } else {
      $q = "select v from hm2_pay_settings where n='okpay_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $okpay_account = $settings['okpay_from_account'];
        $okpay_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    if ($frm['nixmoney_acc'] == 1) {
      $nixmoney_account = $frm['nixmoney_account'];
      $nixmoney_password = $frm['nixmoney_password'];
      $settings['nixmoney_from_account'] = $nixmoney_account;
    } else {
      $q = "select v from hm2_pay_settings where n='nixmoney_password'";
      $sth = mysql_query($q) or print mysql_error();
      while ($row = mysql_fetch_array($sth)) {
        $nixmoney_account = $settings['nixmoney_from_account'];
        $nixmoney_password = mydecode_sting($row['v'], 'hyip manager pro 2005 jul 27');
      }
    }

    @set_time_limit(9999999);

    $auto_systems = array();
    foreach($exchange_systems as $id => $data)
    {
      if ($data['auto'] == 1) array_push($auto_systems, $id);
    }
    $automated = join(',', $auto_systems);

    reset($ids);
    while(list($kk,$vv)=each($ids)) {
      $kk = intval($kk);
      $q = "select h.*, u.accounts, u.username, u.name, u.email from hm2_history as h, hm2_users as u where h.id = $kk and u.id = h.user_id and h.ec in ($automated)";
      $sth = mysql_query($q);
      while ($row = mysql_fetch_array($sth))
      {
        $amount = abs($row['actual_amount']);

        if ($settings['stop_withdraw_percent'] > 0)
        {
          $q = "select sum(actual_amount*(type = 'add_funds')) as td, sum(actual_amount*(type = 'withdrawal')) as tw from hm2_history where type in ('add_funds', 'withdrawal')";
          $sth = mysql_query($q) or print mysql_error();
          $row = mysql_fetch_array($sth);
          if ($row['td'] > 0)
          {
            if ((($row['tw']+$amount) * 100 / $row['td']) >= $settings['stop_withdraw_percent'])
            { 
              break;
            }
          }
        }

        $fee = floor($amount * $settings['withdrawal_fee']) / 100;
        if ($fee < $settings['withdrawal_fee_min']) { $fee = $settings['withdrawal_fee_min']; }
        $to_withdraw = $amount - $fee;
        if ($to_withdraw < 0) $to_withdraw = 0;

/*        if (($settings['program_version'] == 'ounce')and($settings['license'] == '8KHG8VY2A56HV28RV88N')) {
          $to_withdraw = sprintf("%.02f", floor($to_withdraw * 1000000) / 1000000);
        } else {
        } */
        $to_withdraw = sprintf("%.02f", floor($to_withdraw * 100) / 100);

        $accounts = unserialize($row['accounts']);

        if ($settings['egold_withdraw_string'] != '') {
          $success_txt = $settings['egold_withdraw_string'];
        } else {
          $success_txt = "Withdraw to ".$row['username']." from ".$settings['site_name'];
        }

        if ($settings['license'] == 'LYAV2NF74XCMSV4HFYQT') {
          $success_txt = "Paid for user {$row['username']}";
        }


        if ($settings['license'] == '85936KGNKQVXHPCCEGY4') {
          $success_txt = "Withdraw to {$row['username']} from SpottingCashGroup - Building Trust. Shaping the Future!";
        }

        $error_txt = "Error, tried to send $to_withdraw to ".$exchange_systems[$row['ec']]['name']." account # ".$accounts[$row['ec']].". Error:";
        if ($row['ec'] == 0) {
          list($res, $text, $batch) = send_money_to_egold($egold_password, $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 1) {
          list($res, $text, $batch) = send_money_to_evocash("$evocash_password|$evocash_code", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 2) {
          list($res, $text, $batch) = send_money_to_intgold("$intgold_password|$intgold_code", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
#SectionIfStart=debug
        if ($row['ec'] == 5 || $row['ec'] == 55) {
          list($res, $text, $batch) = send_money_to_ebullion("", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt, $row['ec']);
        }
#SectionIfEnd
        if ($row['ec'] == 8) {
          list($res, $text, $batch) = send_money_to_eeecurrency("$eeecurrency_password|$eeecurrency_code", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 9) {
          list($res, $text, $batch) = send_money_to_pecunix("$pecunix_password", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 11) {
          list($res, $text, $batch) = send_money_to_alertpay("$alertpay_password", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
/*
        if ($row['ec'] == 15) {
          list($res, $text, $batch) = send_money_to_libertyreserve("$libertyreserve_password|$libertyreserve_code", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
*/
        if ($row['ec'] == 16) {
          list($res, $text, $batch) = send_money_to_vmoney("$vmoney_password", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 17) {
          list($res, $text, $batch) = send_money_to_altergold("$altergold_password", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 18) {
          list($res, $text, $batch) = send_money_to_perfectmoney("$perfectmoney_password|$perfectmoney_payer_account", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 21) {
          list($res, $text, $batch) = send_money_to_strictpay("$strictpay_password|$strictpay_code", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 22) {
          list($res, $text, $batch) = send_money_to_solidtrustpay("$solidtrustpay_password", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 24) {
          list($res, $text, $batch) = send_money_to_evowallet("$evowallet_password|$evowallet_code", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 25) {
          list($res, $text, $batch) = send_money_to_remitfund("$remitfund_password|$remitfund_code", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 28) {
          list($res, $text, $batch) = send_money_to_gdp("{$frm['gdp_password']}|{$frm['gdp_store_id']}|{$frm['gdp_account']}", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 29) {
          list($res, $text, $batch) = send_money_to_liqpay("$liqpay_password", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 36) {
          list($res, $text, $batch) = send_money_to_egopay("{$egopay_password}|{$egopay_apiname}", $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 37) {
          list($res, $text, $batch) = send_money_to_capitalsure($capitalsure_password, $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 39) {
          list($res, $text, $batch) = send_money_to_okpay($okpay_password, $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }
        if ($row['ec'] == 42) {
          list($res, $text, $batch) = send_money_to_nixmoney($nixmoney_password, $to_withdraw, $accounts[$row['ec']], $success_txt, $error_txt);
        }

        if ($res == 1)
        {
          $batch = quote($batch);
          $kk = intval($kk);
          $q = "delete from hm2_history where id = $kk";
          mysql_query($q);
          $q = "insert into hm2_history set
              user_id = ".$row['user_id'].",
              amount = -$amount,
              actual_amount = -$amount,
              type='withdrawal',
              date = now(),
              ec = ".$row['ec'].",
              description = 'Withdrawal to account ".$accounts[$row['ec']].". Batch is $batch'";
          mysql_query($q) or print mysql_error();

          $info = array();
          $info['username'] = $row['username'];
          $info['name'] = $row['name'];
          $info['amount'] = sprintf("%.02f", -$row['amount']);
          $info['account'] = $accounts[$row['ec']];
          $info['batch'] = $batch;
          $info['currency'] = $exchange_systems[$row['ec']]['name'];
          send_mail('withdraw_user_notification', $row['email'], $settings['system_email'], $info);

          print "Sent \$ $to_withdraw to account ".$accounts[$row['ec']]." on ".$exchange_systems[$row['ec']]['name'].". Batch is $batch<br>";
        } else {
          print "$text<br>";
        }
        flush();
      }
    };
    db_close($dbconn);
    exit;
  }
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'auto-pay-settings') and ($frm['action'] == 'auto-pay-settings')) {
  if ($settings['demomode'] != 1)
  {
    if ($userinfo['transaction_code'] != '' && $userinfo['transaction_code'] != $frm['alternative_passphrase'])
    {
      header("Location: ?a=auto-pay-settings&say=invalid_passphrase");
      db_close($dbconn);
      exit;
    }

    $settings['use_auto_payment'] = $frm['use_auto_payment'];
#    $settings['egold_from_account'] = $frm['egold_from_account'];

/*
    $settings['evocash_from_account'] = $frm['evocash_from_account'];
    $settings['evocash_username'] = $frm['evocash_username'];

    if ($frm['evocash_account_password'] != '') {
      $evo_pass = quote(myencode_string($frm['evocash_account_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='evocash_account_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='evocash_account_password', v='$evo_pass'";
      mysql_query($q);
    }

    if ($frm['evocash_transaction_code'] != '') {
      $evo_code = quote(myencode_string($frm['evocash_transaction_code'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='evocash_transaction_code'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='evocash_transaction_code', v='$evo_code'";
      mysql_query($q);
    }

    $settings['intgold_from_account'] = $frm['intgold_from_account'];
    if ($frm['intgold_password'] != '') {
      $intgold_pass = quote(myencode_string($frm['intgold_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='intgold_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='intgold_password', v='$intgold_pass'";
      mysql_query($q);
    }
    if ($frm['intgold_transaction_code'] != '') {
      $intgold_code = quote(myencode_string($frm['intgold_transaction_code'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='intgold_transaction_code'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='intgold_transaction_code', v='$intgold_code'";
      mysql_query($q);
    }
*/

    $settings['eeecurrency_from_account'] = $frm['eeecurrency_from_account'];
    if ($frm['eeecurrency_password'] != '') {
      $eeecurrency_pass = quote(myencode_string($frm['eeecurrency_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='eeecurrency_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='eeecurrency_password', v='$eeecurrency_pass'";
      mysql_query($q);
    }

    if ($frm['eeecurrency_transaction_code'] != '') {
      $eeecurrency_code = quote(myencode_string($frm['eeecurrency_transaction_code'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='eeecurrency_transaction_code'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='eeecurrency_transaction_code', v='$eeecurrency_code'";
      mysql_query($q);
    }

    $settings['pecunix_from_account'] = $frm['pecunix_from_account'];
    if ($frm['pecunix_password'] != '') {
      $pecunix_pass = quote(myencode_string($frm['pecunix_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='pecunix_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='pecunix_password', v='$pecunix_pass'";
      mysql_query($q);
    }

    $settings['alertpay_from_account'] = $frm['alertpay_from_account'];
    if ($frm['alertpay_password'] != '') {
      $alertpay_pass = quote(myencode_string($frm['alertpay_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='alertpay_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='alertpay_password', v='$alertpay_pass'";
      mysql_query($q);
    }

/*
    $settings['libertyreserve_from_account'] = $frm['libertyreserve_from_account'];
    $settings['libertyreserve_apiname'] = $frm['libertyreserve_apiname'];
    if ($frm['libertyreserve_password'] != '') {
      $libertyreserve_pass = quote(myencode_string($frm['libertyreserve_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='libertyreserve_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='libertyreserve_password', v='$libertyreserve_pass'";
      mysql_query($q);
    }
*/  
/*
    $settings['vmoney_from_account'] = $frm['vmoney_from_account'];
    if ($frm['vmoney_password'] != '') {
      $vmoney_pass = quote(myencode_string($frm['vmoney_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='vmoney_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='vmoney_password', v='$vmoney_pass'";
      mysql_query($q);
    }
*/
/*
    $settings['altergold_from_account'] = $frm['altergold_from_account'];
    if ($frm['altergold_password'] != '') {
      $altergold_pass = quote(myencode_string($frm['altergold_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='altergold_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='altergold_password', v='$altergold_pass'";
      mysql_query($q);
    }
*/

    $settings['perfectmoney_from_account'] = $frm['perfectmoney_from_account'];
    $settings['perfectmoney_payer_account'] = $frm['perfectmoney_payer_account'];
    if ($frm['perfectmoney_password'] != '') {
      $perfectmoney_pass = quote(myencode_string($frm['perfectmoney_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='perfectmoney_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='perfectmoney_password', v='$perfectmoney_pass'";
      mysql_query($q);
    }
    if ($frm['perfectmoney_from_account'] == '') {
      $q = "delete from hm2_pay_settings where n='perfectmoney_password'";
      mysql_query($q);
    }


    $settings['nixmoney_from_account'] = $frm['nixmoney_from_account'];
    if ($frm['nixmoney_password'] != '') {
      $nixmoney_pass = quote(myencode_string($frm['nixmoney_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='nixmoney_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='nixmoney_password', v='$nixmoney_pass'";
      mysql_query($q);
    }
    if ($frm['nixmoney_from_account'] == '') {
      $q = "delete from hm2_pay_settings where n='nixmoney_password'";
      mysql_query($q);
    }

    $settings['strictpay_from_account'] = $frm['strictpay_from_account'];
    $settings['strictpay_email'] = $frm['strictpay_email'];
    if ($frm['strictpay_password'] != '') {
      $strictpay_pass = quote(myencode_string($frm['strictpay_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='strictpay_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='strictpay_password', v='$strictpay_pass'";
      mysql_query($q);
    }
    if ($frm['strictpay_code'] != '') {
      $strictpay_code = quote(myencode_string($frm['strictpay_code'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='strictpay_code'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='strictpay_code', v='$strictpay_code'";
      mysql_query($q);
    }


    $settings['solidtrustpay_apiname'] = $frm['solidtrustpay_apiname'];
    if ($frm['solidtrustpay_password'] != '') {
      $solidtrustpay_pass = quote(myencode_string($frm['solidtrustpay_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='solidtrustpay_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='solidtrustpay_password', v='$solidtrustpay_pass'";
      mysql_query($q);
    }


    $settings['evowallet_from_account'] = $frm['evowallet_from_account'];
    $settings['evowallet_apiname'] = $frm['evowallet_apiname'];
    if ($frm['evowallet_password'] != '') {
      $evowallet_pass = quote(myencode_string($frm['evowallet_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='evowallet_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='evowallet_password', v='$evowallet_pass'";
      mysql_query($q);
    }

/*
    $settings['remitfund_from_account'] = $frm['remitfund_from_account'];
    $settings['remitfund_apiname'] = $frm['remitfund_apiname'];
    if ($frm['remitfund_password'] != '') {
      $remitfund_pass = quote(myencode_string($frm['remitfund_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='remitfund_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='remitfund_password', v='$remitfund_pass'";
      mysql_query($q);
    }
*/

    $settings['liqpay_from_account'] = $frm['liqpay_from_account'];
    if ($frm['liqpay_password'] != '') {
      $liqpay_pass = quote(myencode_string($frm['liqpay_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='liqpay_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='liqpay_password', v='$liqpay_pass'";
      mysql_query($q);
    }
    
    $settings['gdp_from_account'] = $frm['gdp_from_account'];
    $settings['gdp_store_id'] = $frm['gdp_store_id'];
    if ($frm['gdp_password'] != '') {
      $gdp_pass = quote(myencode_string($frm['gdp_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='gdp_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='gdp_password', v='$gdp_pass'";
      mysql_query($q);
    }

    $settings['cosmicpay_from_account'] = $frm['cosmicpay_from_account'];
    $settings['cosmicpay_apiname'] = $frm['cosmicpay_apiname'];
    if ($frm['cosmicpay_password'] != '') {
      $cosmicpay_pass = quote(myencode_string($frm['cosmicpay_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='cosmicpay_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='cosmicpay_password', v='$cosmicpay_pass'";
      mysql_query($q);
    }

    $settings['egopay_from_account'] = $frm['egopay_from_account'];
    $settings['egopay_apiname'] = $frm['egopay_apiname'];
    if ($frm['egopay_password'] != '') {
      $egopay_pass = quote(myencode_string($frm_orig['egopay_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='egopay_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='egopay_password', v='$egopay_pass'";
      mysql_query($q);
    }

    $settings['okpay_from_account'] = $frm['okpay_from_account'];
    if ($frm['okpay_password'] != '') {
      $okpay_pass = quote(myencode_string($frm_orig['okpay_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='okpay_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='okpay_password', v='$okpay_pass'";
      mysql_query($q);
    }

    $settings['capitalsure_from_account'] = $frm['capitalsure_from_account'];
    if ($frm['capitalsure_password'] != '') {
      $capitalsure_pass = quote(myencode_string($frm_orig['capitalsure_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='capitalsure_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='capitalsure_password', v='$capitalsure_pass'";
      mysql_query($q);
    }

    
    $settings['min_auto_withdraw'] = $frm['min_auto_withdraw'];
    $settings['max_auto_withdraw'] = $frm['max_auto_withdraw'];
    $settings['max_auto_withdraw_user'] = $frm['max_auto_withdraw_user'];

    $settings['auto_withdraw_deposit_amount_checkbox'] = $frm['auto_withdraw_deposit_amount_checkbox'];
    $settings['auto_withdraw_hours_since_deposit'] = $frm['auto_withdraw_hours_since_deposit'];
    $settings['auto_withdraw_deposit_amount'] = $frm['auto_withdraw_deposit_amount'];

    save_settings2('hyip manager pro 2005 jul 26');
    if ($frm['egold_account_password'] != '') {
      $e_pass = quote(myencode_string($frm['egold_account_password'], 'hyip manager pro 2005 jul 27'));
      $q = "delete from hm2_pay_settings where n='egold_account_password'";
      mysql_query($q);
      $q = "insert into hm2_pay_settings set n='egold_account_password', v='$e_pass'";
      mysql_query($q);
    }
  }
  header("Location: ?a=auto-pay-settings&say=done");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'referal')and($frm['action'] == 'change')) {
  if ($settings['demomode'] == 1) {

  } else {
  
//    print_r($frm);
// дл€ fxipc.biz - это ежемес€чна€ рефералка, котора€ зависит от кол-ва собственных инвестиций и инвестиций рефералов.
    for ($i = 1; $i<6; $i++) {
      $settings['fxipc_ref'.$i.'_percent'] = $frm['fxipc_ref'.$i.'_percent'];
      $settings['fxipc_ref'.$i.'_persinv'] = $frm['fxipc_ref'.$i.'_persinv'];
      $settings['fxipc_ref'.$i.'_grpinv'] = $frm['fxipc_ref'.$i.'_grpinv'];
    }
    
    
    $q = "delete from hm2_referal where level = 1";
    mysql_query($q) or print mysql_error();
  
    for ($i = 0; $i<300; $i++) {
      if ($frm['active'][$i] == 1) {
        $qname = quote($frm['ref_name'][$i]);
        $from = sprintf("%d", $frm['ref_from'][$i]);
        $to = sprintf("%d", $frm['ref_to'][$i]);
        $percent = sprintf("%0.2f", $frm['ref_percent'][$i]);
        $percent_daily = sprintf("%0.2f", $frm['ref_percent_daily'][$i]);
        $percent_weekly = sprintf("%0.2f", $frm['ref_percent_weekly'][$i]);
        $percent_monthly = sprintf("%0.2f", $frm['ref_percent_monthly'][$i]);
        $q = "insert into hm2_referal set 
  	level = 1,
  	name= '$qname',
  	from_value = $from,
  	to_value= $to,
  	percent = $percent,
  	percent_daily = $percent_daily,
  	percent_weekly = $percent_weekly,
  	percent_monthly = $percent_monthly";
        mysql_query($q) or print mysql_error();
      }
    }
    $settings['use_referal_program'] = sprintf("%d", $frm['usereferal']);
    $settings['force_upline'] = sprintf("%d", $frm['force_upline']);
    $settings['get_rand_ref'] = sprintf("%d", $frm['get_rand_ref']);
    $settings['use_active_referal'] = sprintf("%d", $frm['useactivereferal']);
    $settings['pay_active_referal'] = sprintf("%d", $frm['payactivereferal']);
    $settings['use_solid_referral_commission'] = sprintf("%d", $frm['use_solid_referral_commission']);
    $settings['solid_referral_commission_amount'] = sprintf("%.02f", $frm['solid_referral_commission_amount']);
    $settings['no_ref_on_respend'] = sprintf("%d", $frm['no_ref_on_respend']);
    $settings['assign_no_upline'] = intval($frm['assign_no_upline']);
    $settings['assign_no_upline_name'] = $frm['assign_no_upline_name'];

    $settings['ref1_cms_minamount'] = sprintf("%0.2f", $frm['ref1_cms_minamount']);
    $settings['ref2_cms'] = sprintf("%0.2f", $frm['ref2_cms']);
    $settings['ref2_cms_minamount'] = sprintf("%0.2f", $frm['ref2_cms_minamount']);
    $settings['ref3_cms'] = sprintf("%0.2f", $frm['ref3_cms']);
    $settings['ref3_cms_minamount'] = sprintf("%0.2f", $frm['ref3_cms_minamount']);
    $settings['ref4_cms'] = sprintf("%0.2f", $frm['ref4_cms']);
    $settings['ref4_cms_minamount'] = sprintf("%0.2f", $frm['ref4_cms_minamount']);
    $settings['ref5_cms'] = sprintf("%0.2f", $frm['ref5_cms']);
    $settings['ref5_cms_minamount'] = sprintf("%0.2f", $frm['ref5_cms_minamount']);
    $settings['ref6_cms'] = sprintf("%0.2f", $frm['ref6_cms']);
    $settings['ref6_cms_minamount'] = sprintf("%0.2f", $frm['ref6_cms_minamount']);
    $settings['ref7_cms'] = sprintf("%0.2f", $frm['ref7_cms']);
    $settings['ref7_cms_minamount'] = sprintf("%0.2f", $frm['ref7_cms_minamount']);
    $settings['ref8_cms'] = sprintf("%0.2f", $frm['ref8_cms']);
    $settings['ref8_cms_minamount'] = sprintf("%0.2f", $frm['ref8_cms_minamount']);
    $settings['ref9_cms'] = sprintf("%0.2f", $frm['ref9_cms']);
    $settings['ref9_cms_minamount'] = sprintf("%0.2f", $frm['ref9_cms_minamount']);
    $settings['ref10_cms'] = sprintf("%0.2f", $frm['ref10_cms']);
    $settings['ref10_cms_minamount'] = sprintf("%0.2f", $frm['ref10_cms_minamount']);

    $settings['show_referals'] = sprintf("%d", $frm['show_referals']);
    $settings['show_refstat'] = sprintf("%d", $frm['show_refstat']);


    if ($settings['use_groups'] && $settings['use_groups_add_ref_percent']) {
      if (is_array($frm['group_add_percent'])) {
        foreach ($frm['group_add_percent'] as $id => $val) {
          $id = intval($id); if ($id <= 0) continue;
          $settings['group_add_ref_percent_'.$id] = sprintf("%0.2f", $val);
        }
      }
    }

    save_settings2('hyip manager pro 2005 jul 26');
  }
  header("Location: ?a=referal");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ((($frm['a'] == 'referral_settings_partner')or($frm['a'] == 'referral_settings_business_panama'))and($frm['action'] == 'change')) {
    
    
    $q = "delete from hm2_referal_pax where level = 1";
    mysql_query($q) or print mysql_error();
  
    for ($i = 0; $i<300; $i++) {
      if ($frm['active'][$i] == 1) {
        $qname = quote($frm['ref_name'][$i]);
        $from = sprintf("%d", $frm['ref_from'][$i]);
        $to = sprintf("%d", $frm['ref_to'][$i]);
        $percent = sprintf("%0.2f", $frm['ref_percent'][$i]);
        $percent_daily = sprintf("%0.2f", $frm['ref_percent_daily'][$i]);
        $percent_weekly = sprintf("%0.2f", $frm['ref_percent_weekly'][$i]);
        $percent_monthly = sprintf("%0.2f", $frm['ref_percent_monthly'][$i]);
        $q = "insert into hm2_referal_pax set 
  	level = 1,
  	name= '$qname',
  	from_value = $from,
  	to_value= $to,
  	percent = $percent,
  	percent_daily = $percent_daily,
  	percent_weekly = $percent_weekly,
  	percent_monthly = $percent_monthly";
        mysql_query($q) or print mysql_error();
      }
    }

    $settings['ref1_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref1_pax_cms_minamount']);
    $settings['ref2_pax_cms'] = sprintf("%0.2f", $frm['ref2_pax_cms']);
    $settings['ref2_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref2_pax_cms_minamount']);
    $settings['ref3_pax_cms'] = sprintf("%0.2f", $frm['ref3_pax_cms']);
    $settings['ref3_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref3_pax_cms_minamount']);
    $settings['ref4_pax_cms'] = sprintf("%0.2f", $frm['ref4_pax_cms']);
    $settings['ref4_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref4_pax_cms_minamount']);
    $settings['ref5_pax_cms'] = sprintf("%0.2f", $frm['ref5_pax_cms']);
    $settings['ref5_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref5_pax_cms_minamount']);
    $settings['ref6_pax_cms'] = sprintf("%0.2f", $frm['ref6_pax_pax_cms']);
    $settings['ref6_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref6_pax_cms_minamount']);
    $settings['ref7_pax_cms'] = sprintf("%0.2f", $frm['ref7_pax_cms']);
    $settings['ref7_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref7_pax_cms_minamount']);
    $settings['ref8_pax_cms'] = sprintf("%0.2f", $frm['ref8_pax_cms']);
    $settings['ref8_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref8_pax_cms_minamount']);
    $settings['ref9_pax_cms'] = sprintf("%0.2f", $frm['ref9_pax_cms']);
    $settings['ref9_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref9_pax_cms_minamount']);
    $settings['ref10_pax_cms'] = sprintf("%0.2f", $frm['ref10_pax_cms']);
    $settings['ref10_pax_cms_minamount'] = sprintf("%0.2f", $frm['ref10_pax_cms_minamount']);

    save_settings2('hyip manager pro 2005 jul 26');

    header("Location: ?a=referral_settings_partner");
    db_close($dbconn);
    exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'deleterate') {
  $id = sprintf("%d", $frm['id']);
  if (($id < 3) and ($settings['demomode'] == 1)) {
  } else {
    check_ordering();
    $q = "select ordering from hm2_types where id = $id";
    $sth = mysql_query($q);
    $row = mysql_fetch_array($sth);
    if ($row) {
      $q = "update hm2_types set ordering = ordering - 1 where ordering > {$row['ordering']}";
      mysql_query($q);

      $q = "delete from hm2_types where id = $id";
      mysql_query($q) or print mysql_error();
      $q = "delete from hm2_plans where parent = $id";
      mysql_query($q) or print mysql_error();
    }
  }
  header("Location: ?a=rates");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'rates')
{
  if ($frm['action'] == 'up')
  {
    $id = intval($frm['id']);
    check_ordering();
    $q = "select ordering from hm2_types where id = $id";
    $sth = mysql_query($q) or print(mysql_error());
    $row = mysql_fetch_array($sth);

    if ($row)
    {
      $q = "update hm2_types set ordering = ordering + 1 where ordering = " . ($row['ordering'] - 1);
      mysql_query($q) or print(mysql_error());

      $q = "update hm2_types set ordering = ordering - 1 where id = $id";
      mysql_query($q) or print(mysql_error());
    }

    header("Location: ?a=rates");
    db_close($dbconn);
    exit;
  }

  if ($frm['action'] == 'down')
  {
    $id = intval($frm['id']);
    check_ordering();
    $q = "select ordering from hm2_types where id = $id";
    $sth = mysql_query($q) or print(mysql_error());
    $row = mysql_fetch_array($sth);

    if ($row)
    {
      $q = "update hm2_types set ordering = ordering - 1 where ordering = " . ($row['ordering'] + 1);
      mysql_query($q) or print(mysql_error());

      $q = "update hm2_types set ordering = ordering + 1 where id = $id";
      mysql_query($q) or print(mysql_error());
    }

    header("Location: ?a=rates");
    db_close($dbconn);
    exit;
  }
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

function check_ordering()
{
  $orders = array();
  $q = "select id, ordering from hm2_types";
  $sth = mysql_query($q);
  while ($row = mysql_fetch_array($sth))
  {
    if ($row['ordering'] < 0) $row['ordering'] = 0;
    $orders[$row['id']] = $row['ordering'];
  }
  for ($i = 0; $i < sizeof($orders) - 1; $i++)
  {
    $found = 0;
    foreach ($orders as $id => $ord)
    {
      if ($i == $ord && $found == 1)
      {
        $orders[$id]++;
      }
      if ($i == $ord && $found == 0)
      {
        $found = 1;
      }
    }
    if ($found == 0)
    {
      foreach ($orders as $id => $ord)
      {
        if ($i < $ord)
        {
          $orders[$id]--;
        }
      }
      $i--;
    }
  }
  foreach ($orders as $id => $ord)
  {
    $id = intval($id);
    $q = "update hm2_types set ordering = $ord where id = $id";
    mysql_query($q);
  }
}

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'newsletter') and ($frm['action'] == 'newsletter'))
{
  $lang_q = '';
  if ($settings['license'] == 'KC3STYBTCATZNRVBYGDF')
  {
    $lang = intval($frm['lang']);
    if ($lang > 0) $lang_q = " and u.lang = $lang ";
  }

  if ($frm['to'] == 'user') {
    $q = "select * from hm2_users where username = '".quote($frm['username'])."'";
  } elseif ($frm['to'] == 'all') {
    $q = "select * from hm2_users as u where id > 1 $lang_q";
  } elseif ($frm['to'] == 'active') {
    $q = "select u.* from hm2_users as u, hm2_deposits where u.id > 1 and hm2_deposits.user_id = u.id $lang_q group by u.id";
  } elseif ($frm['to'] == 'passive') {
    $q = "select u.* from hm2_users as u left outer join hm2_deposits as d on u.id = d.user_id where u.id > 1 and d.user_id $lang_q is NULL";
  } else {
    header("Location: ?a=newsletter&say=someerror");
    db_close($dbconn);
    exit;
  }
  $sth = mysql_query($q) or print mysql_error();
  $flag = 0;
  $total = 0;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>HYIP Manager Pro. Auto-payment, mass payment included.</title>
<link href="images/adminstyle.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFF2" link="#666699" vlink="#666699" alink="#666699" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<center>
<?

print "<br><br><br><br><br><div id='newsletterplace'></div>";
print "<div id=self_menu0></div>";
  $description = $frm['text'];
  $use_html = intval($frm['use_html']);
  $html = $frm_orig['html'];
  if ($settings['demomode'] != 1) {
    @set_time_limit(9999999);
    while ($row = mysql_fetch_array($sth)) {
      $accounts = unserialize($row['accounts']);
      $flag = 1; $total ++;
      $mailcont = $description;
      $mailcont = str_replace("#username#", $row['username'], $mailcont);
      $mailcont = str_replace("#name#", $row['name'], $mailcont);
      $mailcont = str_replace("#date_register#", $row['date_register'], $mailcont);
      $mailcont = str_replace("#egold_account#", $accounts[0], $mailcont);
      $mailcont = str_replace("#paypal_account#", $accounts[6], $mailcont);
      $mailcont = str_replace("#eeecurrency_account#", $accounts[8], $mailcont);
      $mailcont = str_replace("#pecunix_account#", $accounts[9], $mailcont);
      $mailcont = str_replace("#alertpay_account#", $accounts[11], $mailcont);
      $mailcont = str_replace("#libertyreserve_account#", $accounts[15], $mailcont);
      $mailcont = str_replace("#vmoney_account#", $accounts[16], $mailcont);
      $mailcont = str_replace("#altergold_account#", $accounts[17], $mailcont);
      $mailcont = str_replace("#perfectmoney_account#", $accounts[18], $mailcont);
      $mailcont = str_replace("#cgold_account#", $accounts[19], $mailcont);
      $mailcont = str_replace("#webmoney_account#", $accounts[20], $mailcont);
      $mailcont = str_replace("#strictpay_account#", $accounts[21], $mailcont);
      $mailcont = str_replace("#solidtrustpay_account#", $accounts[22], $mailcont);
      $mailcont = str_replace("#ecumoney_account#", $accounts[23], $mailcont);
      $mailcont = str_replace("#evowallet_account#", $accounts[24], $mailcont);
      $mailcont = str_replace("#routepay_account#", $accounts[26], $mailcont);
      $mailcont = str_replace("#eurogoldcash_account#", $accounts[27], $mailcont);
      $mailcont = str_replace("#globaldigitalpay_account#", $accounts[28], $mailcont);
      $mailcont = str_replace("#liqpay_account#", $accounts[29], $mailcont);
      $mailcont = str_replace("#cosmicpay_account#", $accounts[31], $mailcont);
      $mailcont = str_replace("#capitalshure_account#", $accounts[37], $mailcont);
      $mailcont = str_replace("#egopay_account#", $accounts[36], $mailcont);
      $mailcont = str_replace("#okpay_account#", $accounts[39], $mailcont);
      $mailcont = str_replace("#email#", $row['email'], $mailcont);

      $mailconthtml = '';
      if ($use_html) {
        $mailconthtml = $html;
        $mailconthtml = str_replace("#username#", $row['username'], $mailconthtml);
        $mailconthtml = str_replace("#name#", $row['name'], $mailconthtml);
        $mailconthtml = str_replace("#date_register#", $row['date_register'], $mailconthtml);
        $mailconthtml = str_replace("#egold_account#", $accounts[0], $mailconthtml);
        $mailconthtml = str_replace("#paypal_account#", $accounts[6], $mailconthtml);
        $mailconthtml = str_replace("#eeecurrency_account#", $accounts[8], $mailconthtml);
        $mailconthtml = str_replace("#pecunix_account#", $accounts[9], $mailconthtml);
        $mailconthtml = str_replace("#alertpay_account#", $accounts[11], $mailconthtml);
        $mailconthtml = str_replace("#libertyreserve_account#", $accounts[15], $mailconthtml);
        $mailconthtml = str_replace("#vmoney_account#", $accounts[16], $mailconthtml);
        $mailconthtml = str_replace("#altergold_account#", $accounts[17], $mailconthtml);
        $mailconthtml = str_replace("#perfectmoney_account#", $accounts[18], $mailconthtml);
        $mailconthtml = str_replace("#cgold_account#", $accounts[19], $mailconthtml);
        $mailconthtml = str_replace("#webmoney_account#", $accounts[20], $mailconthtml);
        $mailconthtml = str_replace("#strictpay_account#", $accounts[21], $mailconthtml);
        $mailconthtml = str_replace("#solidtrustpay_account#", $accounts[22], $mailconthtml);
        $mailconthtml = str_replace("#ecumoney_account#", $accounts[23], $mailconthtml);
        $mailconthtml = str_replace("#evowallet_account#", $accounts[24], $mailconthtml);
        $mailconthtml = str_replace("#routepay_account#", $accounts[26], $mailconthtml);
        $mailconthtml = str_replace("#eurogoldcash_account#", $accounts[27], $mailconthtml);
        $mailconthtml = str_replace("#globaldigitalpay_account#", $accounts[28], $mailconthtml);
        $mailconthtml = str_replace("#liqpay_account#", $accounts[29], $mailconthtml);
        $mailconthtml = str_replace("#cosmicpay_account#", $accounts[31], $mailconthtml);
        $mailconthtml = str_replace("#capitalshure_account#", $accounts[37], $mailconthtml);
        $mailconthtml = str_replace("#egopay_account#", $accounts[36], $mailconthtml);
        $mailconthtml = str_replace("#okpay_account#", $accounts[39], $mailconthtml);
        $mailconthtml = str_replace("#email#", $row['email'], $mailconthtml);
      }
/*
      if ($use_html)
      {
        $boundary = get_rand_md5(12);
        $mailcont = encode_8bit($mailcont);
        $mailconthtml = EncodeQP($mailconthtml);
        $body = "--$boundary\nContent-Type: text/plain;\nContent-Transfer-Encoding: 8bit\n\n$mailcont\n\n".
"--$boundary\nContent-Type: text/html;\nContent-transfer-encoding: quoted-printable;\n\n$mailconthtml\n\n--$boundary--";
      }
      else
      {
        $body = $mailcont;
      }
*/

      simple_mail($row['email'], $settings['system_email'], $frm['subject'], $mailcont, $mailconthtml);
      print ("<script>var obj = document.getElementById('newsletterplace') ;
var menulast = document.getElementById('self_menu".($total-1)."');
menulast.style.display='none';</script>");
      print ("<div id='self_menu$total'>Just sent to ".$row['email']."<br>Total $total messages sent.</div>");

print ("<script>var menu = document.getElementById('self_menu$total') ;
obj.appendChild(menu) ;
</script>
");

      flush();
    }
  }
  if ($flag == 1) {
#    header("Location: ?a=newsletter&say=send&total=$total");
  } else {
#    header("Location: ?a=newsletter&say=notsend");
  }
  db_close($dbconn);
print "<br><br><br>Sent $total.</center></body></html>";
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'edit_emails') && ($frm['action'] == 'update_statuses'))
{
  $q = "update hm2_emails set status = 0";
  mysql_query($q);

  $update_emails = $frm['emails'];
  if (is_array($update_emails))
  {
    foreach ($update_emails as $email_id => $tmp)
    {
      $email_id = quote($email_id);
      $q = "update hm2_emails set status = 1 where id = '$email_id'";
      mysql_query($q);
    }
  }

  header("Location: ?a=edit_emails");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'test_email')
{
  global $settings;

  $use_html = intval($frm['use_html']);
  $subject = $frm['subject'];
  $text = $frm['text'];

  $text = preg_replace("/#site_name#/", $settings['site_name'], $text);
  $subject = preg_replace("/#site_name#/", $settings['site_name'], $subject);
  $text = preg_replace("/#site_url#/", $settings['site_url'], $text);
  $subject = preg_replace("/#site_url#/", $settings['site_url'], $subject);

  $html = '';
  if ($use_html) {
    $html = $frm_orig['html'];
    $html = preg_replace("/#site_name#/", $settings['site_name'], $html);
    $html = preg_replace("/#site_url#/", $settings['site_url'], $html);
  }

  $q = "select email from hm2_users where id = 1";
  $sth = mysql_query($q);
  $row = mysql_fetch_array($sth);

/*
  if ($use_html)
  {
    $boundary = get_rand_md5(12);
    $text = encode_8bit($text);
    $html = EncodeQP($html);
    $body = "--$boundary\nContent-Type: text/plain;\nContent-Transfer-Encoding: 8bit\n\n$text\n\n--$boundary\nContent-Type: text/html;\nContent-transfer-encoding: quoted-printable;\n\n$html\n\n--$boundary--";
  }
  else
  {
    $body = $text;
  }
*/
  simple_mail($row['email'], $settings['system_email'], $subject, $text, $html);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>HYIP Manager Pro. Auto-payment, mass payment included.</title>
<link href="images/adminstyle.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFF2" link="#666699" vlink="#666699" alink="#666699" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<center>
<b>Test Mail has been sent.</b>
</center>
</body>
</html>
<?
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'send_bonuce') && ($frm['action'] == 'send_bonuce' || $frm['action'] == 'confirm'))
{
  $amount = sprintf("%0.2f", $frm['amount']);
  if ($amount == 0)
  {
    header("Location: ?a=send_bonuce&say=wrongamount");
    db_close($dbconn);
    exit;
  }
  $ec = sprintf("%d", $frm['ec']);
  if ($frm['to'] == 'user')
  {
    $users = array();
    $users = preg_split('/\s*,\s*/', $frm['username']);
    for ($i = 0; $i < sizeof($users); $i++)
    {
      $users[$i] = quote($users[$i]);
    }

    $q_users = join("','", $users);

    $q = "select * from hm2_users where username in ('$q_users') and id > 1";
  }
  elseif ($frm['to'] == 'all')
  {
    $q = "select * from hm2_users where id > 1";
  }
  elseif ($frm['to'] == 'active')
  {
    $q = "select hm2_users.* from hm2_users, hm2_deposits where hm2_users.id > 1 and hm2_deposits.user_id = hm2_users.id group by hm2_users.id";
  }
  elseif ($frm['to'] == 'passive')
  {
    $q = "select u.* from hm2_users as u left outer join hm2_deposits as d on u.id = d.user_id where u.id > 1 and d.user_id is NULL";
  }
  else
  {
    header("Location: ?a=send_bonuce&say=someerror");
    db_close($dbconn);
    exit;
  }

  if ($settings['license'] == 'B27M2PF39WWSAPHDVKDB' || $settings['license'] == 'YSHTSQ4C87MU88WCCR8R')
  {
    $sth = mysql_query($q);
    $flag = 0;
    $total = 0;
    $description = quote($frm['description']);
    while ($row = mysql_fetch_array($sth))
    {
      $flag = 1;
      $total += $amount;
      $q = "insert into hm2_history set
  	user_id = ".$row['id'].",
  	amount = $amount,
  	description = '$description',
  	type='bonus',
  	actual_amount = $amount,
  	ec = $ec,
  	date = now()";
      mysql_query($q) or print mysql_error();
    }

    if ($flag == 1)
    {
      header("Location: ?a=send_bonuce&say=send&total=$total");
      db_close($dbconn);
      exit;
    }
    else
    {
      header("Location: ?a=send_bonuce&say=notsend");
      db_close($dbconn);
      exit;
    }
  }

  if ($frm['action'] == 'send_bonuce')
  {
    $code = substr($_SESSION['code'], 23, -32);
    if (($code == md5($frm['code']))or
		($settings_do_not_confirm_bonus == 1))
    {
      $sth = mysql_query($q);
      $flag = 0;
      $total = 0;
      $description = quote($frm['description']);
      while ($row = mysql_fetch_array($sth))
      {
        $flag = 1;
        $total += $amount;
        $q = "insert into hm2_history set
    	user_id = ".$row['id'].",
    	amount = $amount,
    	description = '$description',
    	type='bonus',
    	actual_amount = $amount,
    	ec = $ec,
    	date = now()";
        mysql_query($q) or print mysql_error();
      }

      if ($flag == 1)
      {
        header("Location: ?a=send_bonuce&say=send&total=$total");
      }
      else
      {
        header("Location: ?a=send_bonuce&say=notsend");
      }
      $_SESSION['code'] = '';
      db_close($dbconn);
      exit;
    }
    else
    {
      header("Location: ?a=send_bonuce&say=invalid_code");
      db_close($dbconn);
      exit;
    }
  }

  $code = '';
  if ($frm['action'] == 'confirm')
  {
    $account = preg_split("/,/", $frm['conf_email']);
    $conf_email = array_pop($account);
    $frm_env['HTTP_HOST'] = preg_replace('/www\./', '', $frm_env['HTTP_HOST']);
    $conf_email .= "@{$frm_env['HTTP_HOST']}";
    $conf_email = preg_replace('/\:\d+/', '', $conf_email);

    $code = get_rand_md5(8);
    if ($settings_do_not_confirm_bonus != 1) { 
#    if (($settings['license'] != '6Q8TRKEGMBBRN9XR534G')and($settings['license'] != 'MDKKVSUQQKD5BUHWM36R')and($settings['license'] != 'CWMUDCMJGKC39YJ7EQR7')and($settings['license'] != 'PNDFC2VT8HWAPXEH58VG')) {
      simple_mail($conf_email, $settings['system_email'], "Bonus Confirmation Code", "Code is: $code");
    }

    $code = get_rand_md5(23).md5($code).get_rand_md5(32);
    $_SESSION['code'] = $code;
  }
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'send_penality') and ($frm['action'] == 'send_penality')) {
  $amount = sprintf("%0.2f", abs($frm['amount']));
  if ($amount == 0) {
    header("Location: ?a=send_penality&say=wrongamount");
    db_close($dbconn);
    exit;
  }
  $ec = sprintf("%d", $frm['ec']);
  if ($frm['to'] == 'user') {
    $q = "select * from hm2_users where username = '".quote($frm['username'])."' and id > 1";
  } elseif ($frm['to'] == 'all') {
    $q = "select * from hm2_users where id > 1";
  } elseif ($frm['to'] == 'active') {
    $q = "select hm2_users.* from hm2_users, hm2_deposits where hm2_users.id > 1 and hm2_deposits.user_id = hm2_users.id group by hm2_users.id";
  } elseif ($frm['to'] == 'passive') {
    $q = "select u.* from hm2_users as u left outer join hm2_deposits as d on u.id = d.user_id where u.id > 1 and d.user_id is NULL";
  } else {
    header("Location: ?a=send_penality&say=someerror");
    db_close($dbconn);
    exit;
  }
  $sth = mysql_query($q);
  $flag = 0;
  $total = 0;
  $description = quote($frm['description']);
  while ($row = mysql_fetch_array($sth)) {
    $flag = 1;
    $total+=$amount;
    $q = "insert into hm2_history set
	user_id = ".$row['id'].",
	amount = -$amount,
	description = '$description',
	type='penality',
	actual_amount = -$amount,
	ec = $ec,
	date = now()";
    mysql_query($q) or print mysql_error();
  }
  if ($flag == 1) {
    header("Location: ?a=send_penality&say=send&total=$total");
  } else {
    header("Location: ?a=send_penality&say=notsend");
  }
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'info_box') and ($frm['action'] == 'info_box')) {
  if ($settings['demomode'] != 1) {
    $settings['show_info_box'] = sprintf("%d", $frm['show_info_box']);
    $settings['show_info_box_started'] = sprintf("%d", $frm['show_info_box_started']);
    $settings['show_info_box_running_days'] = sprintf("%d", $frm['show_info_box_running_days']);
    $settings['show_info_box_total_accounts'] = sprintf("%d", $frm['show_info_box_total_accounts']);
    $settings['show_info_box_active_accounts'] = sprintf("%d", $frm['show_info_box_active_accounts']);
    $settings['show_info_box_vip_accounts'] = sprintf("%d", $frm['show_info_box_vip_accounts']);
    $settings['vip_users_deposit_amount'] = sprintf("%d", $frm['vip_users_deposit_amount']);
    $settings['show_info_box_deposit_funds'] = sprintf("%d", $frm['show_info_box_deposit_funds']);
    $settings['show_info_box_today_deposit_funds'] = sprintf("%d", $frm['show_info_box_today_deposit_funds']);
    $settings['show_info_box_today_withdraw_funds'] = sprintf("%d", $frm['show_info_box_today_withdraw_funds']);
    $settings['show_info_box_total_withdraw'] = sprintf("%d", $frm['show_info_box_total_withdraw']);
    $settings['show_info_box_visitor_online'] = sprintf("%d", $frm['show_info_box_visitor_online']);
    $settings['show_info_box_members_online'] = sprintf("%d", $frm['show_info_box_members_online']);
    $settings['show_info_box_newest_member'] = sprintf("%d", $frm['show_info_box_newest_member']);
    $settings['show_info_box_last_update'] = sprintf("%d", $frm['show_info_box_last_update']);
    $settings['show_info_box_lastdeposit'] = sprintf("%d", $frm['show_info_box_lastdeposit']);
    $settings['show_info_box_lastwithdrawal'] = sprintf("%d", $frm['show_info_box_lastwithdrawal']);


    $settings['show_kitco_dollar_per_ounce_box'] = sprintf("%d", $frm['show_kitco_dollar_per_ounce_box']);
    $settings['show_kitco_euro_per_ounce_box'] = sprintf("%d", $frm['show_kitco_euro_per_ounce_box']);
    $settings['show_stats_box'] = sprintf("%d", $frm['show_stats_box']);
    $settings['show_members_stats'] = sprintf("%d", $frm['show_members_stats']);
    $settings['show_paidout_stats'] = sprintf("%d", $frm['show_paidout_stats']);
    $settings['show_top10_stats'] = sprintf("%d", $frm['show_top10_stats']);
    $settings['show_last10_stats'] = sprintf("%d", $frm['show_last10_stats']);
    $settings['show_refs10_stats'] = sprintf("%d", $frm['show_refs10_stats']);
    $settings['refs10_start_date'] = sprintf("%04d-%02d-%02d", substr($frm['refs10_start_date'], 0, 4), substr($frm['refs10_start_date'], 5, 2), substr($frm['refs10_start_date'], 8, 2));
    $settings['refs10_qusers'] = sprintf("%d", $frm['refs10_qusers']);
    $settings['show_news_box'] = sprintf("%d", $frm['show_news_box']);
    $settings['last_news_count'] = sprintf("%d", $frm['last_news_count']);
    save_settings2('hyip manager pro 2005 jul 26');
  }
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'reg_fee' && $frm['action'] == 'reg_fee') {
  $settings['reg_fee_enable'] = intval($frm['reg_fee_enable']);
  $settings['reg_fee_amount'] = sprintf("%0.2f", $frm['reg_fee_amount']);
  save_settings2('hyip manager pro 2005 jul 26');
  header("Location: ?a=reg_fee&say=done");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'settings') and ($frm['action'] == 'settings')) {
  if ($settings['demomode'] == 1) {
  } else {
    send_log_to_gc("change settings. Ref = ".$frm_env['HTTP_REFERER']);
    if ($userinfo['transaction_code'] != '' && $userinfo['transaction_code'] != $frm['alternative_passphrase'])
    {
      header("Location: ?a=settings&say=invalid_passphrase");
      db_close($dbconn);
      exit;
    }

    if ($frm['admin_stat_password'] == '') {
      $q = "update hm2_users set stat_password = '' where id = 1";
      mysql_query($q);
    } elseif ($frm['admin_stat_password'] != '*****') {
      $sp = md5($frm['admin_stat_password']);
      $q = "update hm2_users set stat_password = '$sp' where id = 1";
      mysql_query($q);
    }
    $settings['site_name'] = $frm['site_name'];
    $settings['site_url'] = $frm['site_url'];
    $settings['reverse_columns'] = sprintf("%d", $frm['reverse_columns']);
    $settings['tell_friend_page'] = sprintf("%d", $frm['tell_friend_page']);

/*    $settings['def_payee_account_libertyreserve'] = $frm['def_payee_account_libertyreserve'];
    $settings['md5altphrase_libertyreserve_store'] = $frm['md5altphrase_libertyreserve_store'];
    $settings['md5altphrase_libertyreserve'] = $frm['md5altphrase_libertyreserve'];
    $settings['lr_sci_advanced_api_name'] = $frm['lr_sci_advanced_api_name'];
    $settings['lr_sci_advanced_api_secret'] = $frm['lr_sci_advanced_api_secret'];*/

    $settings['def_payee_account_eurogoldcash'] = $frm['def_payee_account_eurogoldcash'];
    $settings['md5altphrase_eurogoldcash_store'] = $frm['md5altphrase_eurogoldcash_store'];
    $settings['md5altphrase_eurogoldcash'] = $frm['md5altphrase_eurogoldcash'];

    $settings['def_payee_account_hdmoney'] = $frm['def_payee_account_hdmoney'];
    $settings['hdmoney_storename'] = $frm['hdmoney_storename'];
    $settings['hdmoney_secretword'] = $frm['hdmoney_secretword'];

    $settings['def_payee_account_globaldigitalpay'] = $frm['def_payee_account_globaldigitalpay'];
    $settings['md5altphrase_globaldigitalpay_store'] = $frm['md5altphrase_globaldigitalpay_store'];
    $settings['md5altphrase_globaldigitalpay_store_id'] = $frm['md5altphrase_globaldigitalpay_store_id'];
    $settings['md5altphrase_globaldigitalpay_merchant_reference'] = $frm['md5altphrase_globaldigitalpay_merchant_reference'];
    $settings['md5altphrase_globaldigitalpay_api_key'] = $frm['md5altphrase_globaldigitalpay_api_key'];

    $settings['def_payee_account_evowallet'] = $frm['def_payee_account_evowallet'];
    $settings['md5altphrase_evowallet_store'] = $frm['md5altphrase_evowallet_store'];
    $settings['md5altphrase_evowallet'] = $frm['md5altphrase_evowallet'];

    $settings['def_payee_account_pexpay'] = $frm['def_payee_account_pexpay'];
    $settings['md5altphrase_pexpay'] = $frm['md5altphrase_pexpay'];

    $settings['def_payee_account_vmoney'] = $frm['def_payee_account_vmoney'];
    $settings['md5altphrase_vmoney'] = $frm['md5altphrase_vmoney'];

    $settings['def_payee_account'] = $frm['def_payee_account'];
    $settings['def_payee_name'] = $frm['def_payee_name'];
    $settings['md5altphrase'] = $frm['md5altphrase'];
    $settings['egold_withdraw_string'] = $frm['egold_withdraw_string'];

    $settings['def_payee_account_perfectmoney'] = $frm['def_payee_account_perfectmoney'];
    $settings['def_payee_name_perfectmoney'] = $frm['def_payee_name_perfectmoney'];
    $settings['perfectmoneyap'] = $frm['perfectmoneyap'];
    $settings['md5altphrase_perfectmoney'] = strtoupper(md5($frm['perfectmoneyap']));

    if ($frm['def_payee_account_nixmoney'] == '') {
      $settings['def_payee_account_nixmoney'] = '';
      $settings['def_payee_name_nixmoney'] = '';
      $settings['md5altphrase_nixmoney'] = '';
    } else {
      $settings['def_payee_account_nixmoney'] = $frm['def_payee_account_nixmoney'];
      $settings['def_payee_name_nixmoney'] = $frm['def_payee_name_nixmoney'];
      if ($frm['nixmoneyap'] != '') {
        $settings['md5altphrase_nixmoney'] = strtoupper(md5($frm['nixmoneyap']));
      }
    }


    $settings['def_payee_account_evocash'] = $frm['def_payee_account_evocash'];
    $settings['md5altphrase_evocash'] = $frm['md5altphrase_evocash'];

    $settings['def_payee_account_intgold'] = $frm['def_payee_account_intgold'];
    $settings['md5altphrase_intgold'] = $frm['md5altphrase_intgold'];
    $settings['intgold_posturl'] = sprintf("%d", $frm['intgold_posturl']);

    $settings['def_payee_account_stormpay'] = $frm['def_payee_account_stormpay'];
    $settings['md5altphrase_stormpay'] = $frm['md5altphrase_stormpay'];
    $settings['stormpay_posturl'] = $frm['stormpay_posturl'];
    $settings['dec_stormpay_fee'] = sprintf("%d", $frm['dec_stormpay_fee']);
    $settings['dec_stormpay_fee2'] = sprintf("%d", $frm['dec_stormpay_fee2']);

    $settings['def_payee_account_paypal'] = $frm['def_payee_account_paypal'];

    $settings['def_payee_account_goldmoney'] = $frm['def_payee_account_goldmoney'];
    $settings['md5altphrase_goldmoney'] = $frm['md5altphrase_goldmoney'];

    $settings['def_payee_account_eeecurrency'] = $frm['def_payee_account_eeecurrency'];
    $settings['md5altphrase_eeecurrency'] = $frm['md5altphrase_eeecurrency'];
    $settings['eeecurrency_posturl'] = sprintf("%d", $frm['eeecurrency_posturl']);

    $settings['def_payee_account_pecunix'] = $frm['def_payee_account_pecunix'];
    $settings['md5altphrase_pecunix'] = $frm['md5altphrase_pecunix'];

    $settings['def_payee_account_anonygold'] = $frm['def_payee_account_anonygold'];
    $settings['md5altphrase_anonygold'] = $frm['md5altphrase_anonygold'];

    $settings['def_payee_account_alertpay'] = $frm['def_payee_account_alertpay'];
    $settings['md5altphrase_alertpay'] = $frm['md5altphrase_alertpay'];

    $settings['def_payee_account_uniclear'] = $frm['def_payee_account_uniclear'];
    $settings['md5altphrase_uniclear'] = $frm['md5altphrase_uniclear'];
    
    $settings['def_payee_account_altergold'] = $frm['def_payee_account_altergold'];
    $settings['altphrase_altergold'] = $frm['altphrase_altergold'];

    $settings['def_payee_account_cgold'] = $frm['def_payee_account_cgold'];
    $settings['def_payee_name_cgold'] = $frm['def_payee_name_cgold'];
    $settings['md5altphrase_cgold'] = $frm['md5altphrase_cgold'];

    $settings['def_payee_account_egopay'] = $frm_orig['def_payee_account_egopay'];
    $settings['md5altphrase_egopay_storepass'] = $frm_orig['md5altphrase_egopay_storepass'];

    $settings['def_payee_account_solidtrustpay'] = $frm['def_payee_account_solidtrustpay'];
    $settings['def_payee_store_solidtrustpay'] = $frm['def_payee_store_solidtrustpay'];
    $settings['md5altphrase_solidtrustpay'] = $frm['md5altphrase_solidtrustpay'];

    $settings['def_payee_account_ecumoney'] = $frm['def_payee_account_ecumoney'];
    $settings['ecumoney_store'] = $frm['ecumoney_store'];
    $settings['md5altphrase_ecumoney'] = $frm['md5altphrase_ecumoney'];

    $settings['def_payee_account_remitfund'] = $frm['def_payee_account_remitfund'];
    $settings['remitfund_interface'] = $frm['remitfund_interface'];
    $settings['md5altphrase_remitfund'] = $frm['md5altphrase_remitfund'];

    $settings['def_payee_account_routepay'] = $frm['def_payee_account_routepay'];
    $settings['md5altphrase_routepay'] = $frm['md5altphrase_routepay'];

    $settings['def_payee_account_liqpay'] = $frm['def_payee_account_liqpay'];
    $settings['liqpay_merchantid'] = $frm['liqpay_merchantid'];
    $settings['md5altphrase_liqpay'] = $frm['md5altphrase_liqpay'];

    $settings['def_payee_account_interkassa'] = $frm['def_payee_account_interkassa'];
    $settings['interkassa_secret_key'] = $frm['interkassa_secret_key'];

    $settings['def_payee_account_freekassa'] = $frm['def_payee_account_freekassa'];
    $settings['md5altphrase_freekassa1'] = $frm['md5altphrase_freekassa1'];
    $settings['md5altphrase_freekassa2'] = $frm['md5altphrase_freekassa2'];
    $settings['freekassa_convert_to'] = intval($frm['freekassa_convert_to']);

/*    $settings['def_payee_account_libertyreserve'] = $frm['def_payee_account_libertyreserve'];
    $settings['md5altphrase_libertyreserve_store'] = $frm['md5altphrase_libertyreserve_store'];
    $settings['md5altphrase_libertyreserve'] = $frm['md5altphrase_libertyreserve'];*/

    $settings['def_payee_account_cosmicpay'] = $frm['def_payee_account_cosmicpay'];
    $settings['md5altphrase_cosmicpay_store'] = $frm['md5altphrase_cosmicpay_store'];
    $settings['md5altphrase_cosmicpay'] = $frm['md5altphrase_cosmicpay'];

    $settings['def_payee_account_capitalsure'] = $frm['def_payee_account_capitalsure'];
    $settings['md5altphrase_capitalsure'] = $frm['md5altphrase_capitalsure'];

    $settings['def_payee_account_okpay'] = $frm['def_payee_account_okpay'];


    $settings['site_start_day'] = $frm['site_start_day'];
    $settings['site_start_month'] = $frm['site_start_month'];
    $settings['site_start_year'] = $frm['site_start_year'];
    $settings['deny_registration'] = ($frm['deny_registration']) ? 1 : 0;
    $settings['use_opt_in'] = sprintf("%d", $frm['use_opt_in']);
    $settings['opt_in_email'] = $frm_orig['opt_in_email'];
    $settings['system_email'] = $frm_orig['system_email'];
    $settings['support_email'] = $frm['support_email'];
    $settings['usercanchangeegoldacc'] = sprintf("%d", $frm['usercanchangeegoldacc']);
    $settings['usercanchangeemail'] = sprintf("%d", $frm['usercanchangeemail']);
    $settings['sendnotify_when_userinfo_changed'] = sprintf("%d", $frm['sendnotify_when_userinfo_changed']);
    $settings['graph_validation'] = sprintf("%d", $frm['graph_validation']);
    $settings['graph_max_chars'] = $frm['graph_max_chars'];
    $settings['graph_text_color'] = $frm['graph_text_color'];
    $settings['graph_bg_color'] = $frm['graph_bg_color'];
    $settings['use_number_validation_number'] = sprintf("%d", $frm['use_number_validation_number']);
    $settings['advanced_graph_validation'] = ($frm['advanced_graph_validation']) ? 1 : 0;
    if (!function_exists('imagettfbbox'))
    {
      $settings['advanced_graph_validation'] = 0;
    }
    $settings['advanced_graph_validation_min_font_size'] = sprintf("%d", $frm['advanced_graph_validation_min_font_size']);
    $settings['advanced_graph_validation_max_font_size'] = sprintf("%d", $frm['advanced_graph_validation_max_font_size']);
    $settings['enable_calculator'] = $frm['enable_calculator'];
    $settings['accesswap'] = sprintf("%d", $frm['usercanaccesswap']);
    $settings['time_dif'] = $frm['time_dif'];	
    $settings['internal_transfer_enabled'] = ($frm['internal_transfer_enabled']) ? 1 : 0;

    $settings['mail_charset'] = preg_replace('~[^a-zA-Z0-9\-]+~', '', $frm['mail_charset']);
    $settings['mail_method'] = intval($frm['mail_method']);

    $settings['smtp_secure'] = ($frm['mail_charset'] == 'ssl' ? 'ssl' : (($frm['smtp_secure'] == 'tls') ? 'tls' : ''));
    $settings['smtp_host'] = preg_replace('~[^a-zA-Z0-9\-\.]+~', '', $frm['smtp_host']);
    $settings['smtp_port'] = intval($frm['smtp_port']);
    $settings['smtp_user'] = $frm['smtp_user'];
    $settings['smtp_pass'] = $frm['smtp_pass'];

    $settings['def_payee_account_webmoney'] = $frm['def_payee_account_webmoney'];
    $settings['md5altphrase_webmoney'] = $frm['md5altphrase_webmoney'];

    $settings['def_payee_account_strictpay'] = $frm['def_payee_account_strictpay'];
    $settings['md5altphrase_strictpay'] = $frm['md5altphrase_strictpay'];

    $settings['def_payee_account_psvictoria'] = $frm['def_payee_account_psvictoria'];
    $settings['storename_psvictoria'] = $frm['storename_psvictoria'];
    $settings['storeword_psvictoria'] = $frm['storeword_psvictoria'];


/*
    $wmkey = $HTTP_POST_FILES['webmoney_key'];
    $len = @filesize($wmkey['tmp_name']);
//    print $len;
    if ($wmkey['size'] > 0 && $wmkey['error'] == 0) {
      $fp = fopen($wmkey['tmp_name'], "rb");
      $buf = fread($fp, $len);
      fclose($fp);
      $fp = fopen("./tmpl_c/w{$settings['license']}", 'wb');
      fwrite($fp, $buf, $len);
      fclose($fp);
      unlink($wmkey['tmp_name']);
    }*/

/*
    $settings['gpg_path'] = $frm['gpg_path'];

    $atip_pl = $HTTP_POST_FILES['atip_pl'];
    if ($atip_pl['size'] > 0 && $atip_pl['error'] == 0)
    {
      $fp = fopen($atip_pl['tmp_name'], 'r');
      while (!feof($fp))
      {
         $buf = fgets($fp, 4096);
         if (preg_match('/my\s+\(\$account\)\s+\=\s+\'([^\']+)\'/', $buf, $matches))
         {
           $frm['def_payee_account_ebullion'] = $matches[1];
         }
         if (preg_match('/my\s+\(\$passphrase\)\s+\=\s+\'([^\']+)\'/', $buf, $matches))
         {
           $frm['md5altphrase_ebullion'] = $matches[1];
         }
      }
      fclose($fp);
      unlink($atip_pl['tmp_name']);
    }
    $status_php = $HTTP_POST_FILES['status_php'];
    if ($status_php['size'] > 0 && $status_php['error'] == 0)
    {
      $fp = fopen($status_php['tmp_name'], "r");
      while (!feof($fp))
      {
         $buf = fgets($fp, 4096);
         if (preg_match('/\$eb_keyID\s+\=\s+\'([^\']+)\'/', $buf, $matches))
         {
           $frm['ebullion_keyID'] = $matches[1];
         }
      }
      fclose($fp);
      unlink($status_php['tmp_name']);
    }
    $pubring_gpg = $HTTP_POST_FILES['pubring_gpg'];
    if ($pubring_gpg['size'] > 0 && $pubring_gpg['error'] == 0)
    {
      copy($pubring_gpg['tmp_name'], './tmpl_c/pubring.gpg');
      unlink($pubring_gpg['tmp_name']);
    }
    $secring_gpg = $HTTP_POST_FILES['secring_gpg'];
    if ($secring_gpg['size'] > 0 && $secring_gpg['error'] == 0)
    {
      copy($secring_gpg['tmp_name'], './tmpl_c/secring.gpg');
      unlink($secring_gpg['tmp_name']);
    }

    $settings['def_payee_account_ebullion'] = $frm['def_payee_account_ebullion'];
    $settings['enable_eb_gold'] = ($frm['enable_eb_gold']) ? 1 : 0;
    $settings['enable_eb_ecurrency'] = ($frm['enable_eb_ecurrency']) ? 1 : 0;
    $settings['def_payee_name_ebullion'] = $frm['def_payee_name_ebullion'];
    $settings['md5altphrase_ebullion'] = myencode_string($frm['md5altphrase_ebullion'], 'hyip manager pro 2005 jul 27');
    $settings['ebullion_keyID'] = $frm['ebullion_keyID'];
*/
    $settings['brute_force_handler'] = ($frm['brute_force_handler']) ? 1 : 0;      
    $settings['brute_force_max_tries'] = sprintf("%d", abs($frm['brute_force_max_tries']));
    $settings['redirect_to_https'] = ($frm['redirect_to_https']) ? 1 : 0;
    $settings['use_user_location'] = intval($frm['use_user_location']);
    $settings['use_transaction_code'] = ($frm['use_transaction_code']) ? 1 : 0;
    $settings['use_transaction_code_edit_account'] = ($frm['use_transaction_code_edit_account']) ? 1 : 0;
    
    $settings['min_user_password_length'] = sprintf("%d", $frm['min_user_password_length']);
    $settings['use_history_balance_mode'] = ($frm['use_history_balance_mode']) ? 1 : 0;
    $settings['account_update_confirmation'] = ($frm['account_update_confirmation']) ? 1 : 0;
    $settings['withdrawal_fee'] = sprintf("%.02f", $frm['withdrawal_fee']);
    if ($settings['withdrawal_fee'] < 0) $settings['withdrawal_fee'] = '0.00';
    if ($settings['withdrawal_fee'] > 100) $settings['withdrawal_fee'] = '100.00';
    $settings['withdrawal_fee_min'] = sprintf("%.02f", $frm['withdrawal_fee_min']);
    $settings['min_withdrawal_amount'] = sprintf("%.02f", $frm['min_withdrawal_amount']);
    $settings['max_withdrawal_amount'] = sprintf("%.02f", $frm['max_withdrawal_amount']);
    $settings['limit_withdraw_period_times'] = intval($frm['limit_withdraw_period_times']);
    $settings['limit_withdraw_period_date'] = in_array($frm['limit_withdraw_period_date'], array('n','day','week','month','year')) ? $frm['limit_withdraw_period_date'] : 'n';
    if ($settings['limit_withdraw_period_date'] == 'n') $settings['limit_withdraw_period_times'] = 0;
    if ($settings['limit_withdraw_period_times'] == 0) $settings['limit_withdraw_period_date'] = 'n';

    $settings['show_charts'] = sprintf("%0.2f", $frm['show_charts']);
    $settings['deposit_fee'] = sprintf("%.02f", $frm['deposit_fee']);
    if ($settings['deposit_fee'] < 0) $settings['deposit_fee'] = '0.00';
    if ($settings['deposit_fee'] > 100) $settings['deposit_fee'] = '100.00';
    $settings['deposit_fee_min'] = sprintf("%.02f", $frm['deposit_fee_min']);
    $settings['stop_withdraw_percent'] = sprintf("%d", $frm['stop_withdraw_percent']);
    if ($settings['stop_withdraw_percent'] < 0) $settings['stop_withdraw_percent'] = '0.00';
    if ($settings['stop_withdraw_percent'] > 100) $settings['stop_withdraw_percent'] = '100.00';

    $settings['police_value'] = sprintf("%.02f", $frm['police_value']);

    $settings['internal_transfer_fee'] = sprintf("%.02f", $frm['internal_transfer_fee']);
    if ($settings['internal_transfer_fee'] < 0) $settings['internal_transfer_fee'] = '0.00';
    if ($settings['internal_transfer_fee'] > 100) $settings['internal_transfer_fee'] = '100.00';
    $settings['minimum_internal_transfer_fee'] = sprintf("%.02f", $frm['minimum_internal_transfer_fee']);
    $settings['internal_transfer_fee_payer'] = ($frm['internal_transfer_fee_payer']) ? 1 : 0;
    $settings['internal_transfer_min'] = sprintf("%.02f", $frm['internal_transfer_min']);
    $settings['internal_transfer_max'] = sprintf("%.02f", $frm['internal_transfer_max']);
    $settings['limit_transfer_period_times'] = intval($frm['limit_transfer_period_times']);
    $settings['limit_transfer_period_date'] = in_array($frm['limit_transfer_period_date'], array('n','day','week','month','year')) ? $frm['limit_transfer_period_date'] : 'n';
    if ($settings['limit_transfer_period_date'] == 'n') $settings['limit_transfer_period_times'] = 0;
    if ($settings['limit_transfer_period_times'] == 0) $settings['limit_transfer_period_date'] = 'n';

    $settings['max_daily_withdraw'] = sprintf("%0.2f", $frm['max_daily_withdraw']);
    $settings['max_daily_withdraw_verified'] = sprintf("%0.2f", $frm['max_daily_withdraw_verified']);

    $settings['use_add_funds'] = ($frm['use_add_funds']) ? 1 : 0;

    $login = quote($frm['admin_login']);
    $pass = quote($frm['admin_password']);
    $email = quote($frm['admin_email']);
    if (($login != '') and ($email != ''))
    {
      $q = "update hm2_users set email='$email', username='$login' where id = 1";
      mysql_query($q) or print mysql_error();
#      setcookie("username", $frm['admin_login'], time()+630720000);
    }
    if ($pass != '')
    {
      $md_pass = md5("++++3jkljfds".$pass."7d8d0dj3k3l3,3m3h3t38d762");
      $q = "update hm2_users set password = '$md_pass' where id = 1";
      mysql_query($q) or print mysql_error();
    }
    if (($frm['use_alternative_passphrase'] == 1) && ($frm['new_alternative_passphrase'] != ''))
    {
      $altpass = quote($frm['new_alternative_passphrase']);
      $q = "update hm2_users set transaction_code = '$altpass' where id = 1";
      mysql_query($q) or print mysql_error();
    }
    if (($frm['use_alternative_passphrase'] == 0))
    {
      $q = "update hm2_users set transaction_code = '' where id = 1";
      mysql_query($q) or print mysql_error();
    }

    save_settings2('hyip manager pro 2005 jul 26');
  }
  header("Location: ?a=settings&say=done");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'rm_withdraw') {
  $id = sprintf("%d", $frm['id']);
  $q = "delete from hm2_history where id = $id";
  mysql_query($q) or print mysql_error();
  header("Location: ?a=thistory&ttype=withdraw_pending");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'releasedeposits')and ($frm['action'] == 'releasedeposits'))
{
  $u_id = sprintf("%d", $frm['u_id']);

  $type_ids = $frm['type_id'];
  while(list($kk,$vv)=each($type_ids))
  {
    $kk = intval($kk);
    $vv = intval($vv);

    $q = "select compound, actual_amount from hm2_deposits where id = $kk";
    $sth = mysql_query($q) or print(mysql_error());
    $row = mysql_fetch_array($sth);
    $compound = $row['compound'];
    $amount = $row['actual_amount'];

    $q = "select * from hm2_types where id = $vv";
    $sth = mysql_query($q) or print(mysql_error());
    $type = mysql_fetch_array($sth);

    if ($type['use_compound'] == 0)
    {
      $compound = 0;
    }
    else
    {
      if ($type['compound_max_deposit'] == 0)
      {
        $type['compound_max_deposit'] = $amount + 1;
      }
      if (($amount >= $type['compound_min_deposit']) && ($amount <= $type['compound_max_deposit']))
      {
        if ($type['compound_percents_type'] == 1)
        {
          $cps = preg_split('/\s*,\s*/', $type['compound_percents']);
          if (! in_array($compound, $cps))
          {
            $compound = $cps[0];
          }
        }
        else
        {
          if ($compound < $type['compound_min_percent']) $compound = $type['compound_min_percent'];
          if ($compound > $type['compound_max_percent']) $compound = $type['compound_max_percent'];
        }
      }
      else
      {
        $compound = 0;
      }
    }
    $q = "update hm2_deposits set type_id = $vv, compound = $compound where id = $kk";
    mysql_query($q) or print(mysql_error());
  }

  $releases = $frm['release'];
  while(list($kk,$vv)=each($releases))
  {
    $kk = intval($kk);
    if ($vv == 0) {
      continue;
    }

    $q = "select actual_amount, ec from hm2_deposits where id = $kk";
    $sth = mysql_query($q) or print(mysql_errstr());
    if ($row = mysql_fetch_array($sth))
    {
      $release_deposit = sprintf("%-.2f", $vv);
      if ($row['actual_amount'] >= $release_deposit)
      {
        $q = "insert into hm2_history set 
    		user_id = $u_id,
	    	amount = $release_deposit, 
    		type = 'early_deposit_release',
	    	actual_amount = $release_deposit,
        ec = ".$row['ec'].",
	    	date = now()";
        mysql_query($q) or print(mysql_error());

        $dif = (floor(($row['actual_amount'] - $release_deposit) * 100))/100;
        if ($dif == 0)
        {
          $q = "update hm2_deposits set actual_amount = 0, amount = 0, status = 'off' where id = $kk";
        }
        else
        {
          $q = "update hm2_deposits set actual_amount = actual_amount - $release_deposit where id = $kk";
        }
        mysql_query($q) or print(mysql_error());
      }
    }
  }
  header("Location: ?a=releasedeposits&u_id=$u_id");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

function do_monitor_files_list($in, $l) {
  if ($l > 10) return;
  if ($handle = opendir($in)) {
    while (false !== ($entry = readdir($handle))) {
        if (is_dir("$in/$entry")) {
          if (($entry == '.')or($entry == '..')) {
          } else {
//            echo "<b>$in/$entry</b><br>";
            do_monitor_files_list("$in/$entry", $l+1);
          }
        } else {
          $qfilename = quote("$in/$entry");
          $qkey = quote(md5_file("$in/$entry"));
          $q = "insert into hm2_fchk set
		filename = '$qfilename',
                `key` = '$qkey',
                tdate = now()";
          mysql_query($q) or print mysql_error();
//          echo "$in/$entry - ".md5_file("$in/$entry")."<br>";
        }
    }
    closedir($handle);
  }  
  return;
}


check_tmpl_files();



#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'monitor_files_on') {
# $q = "create table hm2_fchk (id int not null auto_increment primary key, filename varchar(200) not null default '', `key` varchar(50) not null default '', tdate datetime not null, inform int not null default 0)";
# mysql_query($q) or print mysql_error();
 $q = "delete from hm2_settings where name='fchk'";
 $sth = mysql_query($q) or print mysql_error();
 sleep(2);
 $q = "delete from hm2_fchk";
 $sth = mysql_query($q) or print mysql_error();
 do_monitor_files_list('./tmpl', 0);
 $q = "insert into hm2_settings set name='fchk', value=now()";
 $sth = mysql_query($q) or print mysql_error();
 
 header("Location: ?a=security");
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'monitor_files_off') {
 $q = "select * from hm2_settings where name='fchk'";
 $q = "select date_format(value + interval ".$settings['time_dif']." hour, '%b-%e-%Y %r') as d from hm2_settings where name = 'fchk'";
 $row = get_mysql_line($q);
 if (md5($row['d']) == $frm['k']) {
   $q = "delete from hm2_settings where name='fchk'";
   $sth = mysql_query($q) or print mysql_error();
   sleep(2);
   $q = "delete from hm2_fchk";
   $sth = mysql_query($q) or print mysql_error();
 }
# print 1;
 header("Location: ?a=security");
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS


#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'addbonuse') && ($frm['action'] == 'addbonuse' || $frm['action'] == 'confirm'))
{
  $deposit = intval($frm['deposit']);
  $hyip_id = intval($frm['hyip_id']);
  if ($deposit == 1)
  {
    $q = "select * from hm2_types where id = $hyip_id and status = 'on'";
    $sth = mysql_query($q);
    $type = mysql_fetch_array($sth);
    if (!$type)
    {
      header("Location: ?a=send_bonuce&say=wrongplan");
      db_close($dbconn);
      exit;
    }
  }

  if ($settings['license'] == 'B27M2PF39WWSAPHDVKDB' || $settings['license'] == 'YSHTSQ4C87MU88WCCR8R')
  {
      $id = sprintf("%d", $frm['id']);
      $amount = sprintf("%f", $frm['amount']);
      $description = quote($frm['desc']);
      $ec = sprintf("%d", $frm['ec']);
      $q = "insert into hm2_history set
              user_id = $id,
              amount = $amount,
              ec = $ec,
              actual_amount = $amount,
              type = 'bonus',
              date = now(),
              description = '$description'";
      mysql_query($q) or die(mysql_error());

      if ($frm['count_aff'] == 1)
      {
        $ref_sum = referral_commission($id, $amount, $ec);
      }

      if ($deposit)
      {
        $delay = $type['delay'] - 1;
        if ($delay < 0) $delay = 0;
        $user_id = intval($id);
     

        $q = "insert into hm2_deposits set
             user_id = $user_id,
             type_id = $hyip_id,
             deposit_date = now(),
             last_pay_date = now()+ interval $delay day,
             status = 'on',
             q_pays = 0,
             amount = '$amount',
             actual_amount = '$amount',
             ec = $ec
             ";
        mysql_query($q) or print mysql_error();
        $deposit_id = mysql_insert_id();
        $q = "insert into hm2_history set 
             user_id = $user_id,
             amount = '-$amount',
             type = 'deposit',
             description = 'Deposit to ".quote($type['name'])."',
             actual_amount = -$amount,
             ec = $ec,
             date = now(),
           deposit_id = $deposit_id
             ";
        mysql_query($q) or print mysql_error();

        if ($settings['banner_extension'] == 1)
        {
          $imps = 0;
          if ($settings['imps_cost'] > 0) $imps = $amount*1000 / $settings['imps_cost'];
          if ($imps > 0)
          {
            $q = "update hm2_users set imps = imps + $imps where id = $user_id";
            mysql_query($q) or print mysql_error();
          }
        }
      }

      if ($frm['inform'] == 1)
      {
        $q = "select * from hm2_users where id = $id";
        $sth = mysql_query($q);
        $row = mysql_fetch_array($sth);

        $info = array();
        $info['name'] = $row['username'];
        $info['amount'] = number_format($amount, 2);
        send_mail('bonus', $row['email'], $settings['system_email'], $info);
      }
      header("Location: ?a=addbonuse&say=done&id=$id");
      db_close($dbconn);
      exit;
  }

  if ($frm['action'] == 'addbonuse')
  {
    $code = substr($_SESSION['code'], 23, -32);
    if (($code == md5($frm['code']))or
		($settings_do_not_confirm_bonus == 1))
    {
      $id = sprintf("%d", $frm['id']);
      $amount = sprintf("%f", $frm['amount']);
      $description = quote($frm['desc']);
      $ec = sprintf("%d", $frm['ec']);
      $q = "insert into hm2_history set
              user_id = $id,
              amount = $amount,
              ec = $ec,
              actual_amount = $amount,
              type = 'bonus',
              date = now(),
              description = '$description'";
      mysql_query($q) or die(mysql_error());

      if ($frm['count_aff'] == 1)
      {
        $ref_sum = referral_commission($id, $amount, $ec);
      }

      if ($deposit)
      {
        $delay = $type['delay'] - 1;
        if ($delay < 0) $delay = 0;
        $user_id = $id;

        $q = "insert into hm2_deposits set
             user_id = $user_id,
             type_id = $hyip_id,
             deposit_date = now(),
             last_pay_date = now()+ interval $delay day,
             status = 'on',
             q_pays = 0,
             amount = '$amount',
             actual_amount = '$amount',
             ec = $ec
             ";
        mysql_query($q) or print mysql_error();
        $deposit_id = mysql_insert_id();
        $q = "insert into hm2_history set 
             user_id = $user_id,
             amount = '-$amount',
             type = 'deposit',
             description = 'Deposit to ".quote($type['name'])."',
             actual_amount = -$amount,
             ec = $ec,
             date = now(),
           deposit_id = $deposit_id
             ";
        mysql_query($q) or print mysql_error();

        if ($settings['banner_extension'] == 1)
        {
          $imps = 0;
          if ($settings['imps_cost'] > 0) $imps = $amount*1000 / $settings['imps_cost'];
          if ($imps > 0)
          {
            $q = "update hm2_users set imps = imps + $imps where id = $user_id";
            mysql_query($q) or print mysql_error();
          }
        }
      }

      if ($frm['inform'] == 1)
      {
        $q = "select * from hm2_users where id = $id";
        $sth = mysql_query($q);
        $row = mysql_fetch_array($sth);

        $info = array();
        $info['name'] = $row['username'];
        $info['amount'] = number_format($amount, 2);
        send_mail('bonus', $row['email'], $settings['system_email'], $info);
      }
      header("Location: ?a=addbonuse&say=done&id=$id");
      db_close($dbconn);
      exit;
    }
    else
    {
      $id = sprintf("%d", $frm['id']);
      header("Location: ?a=addbonuse&id=$id&say=invalid_code");
      db_close($dbconn);
      exit;
    }
  }

  $code = '';
  if ($frm['action'] == 'confirm')
  {
    $account = preg_split("/,/", $frm['conf_email']);
    $conf_email = array_pop($account);
    $frm_env['HTTP_HOST'] = preg_replace('/www\./', '', $frm_env['HTTP_HOST']);
    if ($settings['license'] == '2994C7R4BC4H9Z9K98T5') {
      $conf_email .= '@ghpi.org';
/*    } elseif ($settings['license'] == 'KGB9KZWP76TQ5PHKMDBZ') {
      $conf_email = 'goldinvestfund1@yahoo.com';*/
    } elseif ($settings['license'] == 'ARU7VSN32938WLKL737P') {
      $conf_email = 'smartdepositinvest@yahoo.com';
    } elseif ($settings['license'] == 'JAJALQUJESPM2D5VSWL3') {
      $conf_email = 'goldinvestfund1@yahoo.com';
    } elseif ($settings['license'] == '7VWRWW2NDPXMWKGECDNJ') {
      $conf_email = 'wealthyfunds@gmail.com';
    } else {
      $conf_email .= "@{$frm_env['HTTP_HOST']}";
    }

    $code = get_rand_md5(8);
    if ($settings_do_not_confirm_bonus != 1) { 
      simple_mail($conf_email, $settings['system_email'], "Bonus Confirmation Code", "Code is: $code");
      send_log_to_gc("code is $code");
    }
    
    $code = get_rand_md5(23).md5($code).get_rand_md5(32);
    $_SESSION['code'] = $code;
  }
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'addpenality')&&($frm['action'] == 'addpenality')) {
  $id = sprintf("%d", $frm['id']);
  $amount = sprintf("%f", abs($frm['amount']));
  $description = quote($frm['desc']);
  $ec = sprintf("%d", $frm['ec']);
  $q = "insert into hm2_history set
	user_id = $id,
	amount = -$amount,
	actual_amount = -$amount,
	ec = $ec,
	type = 'penality',
	date = now(),
	description = '$description'";
  mysql_query($q) or die(mysql_error());
  if ($frm['inform'] == 1) {
    $q = "select * from hm2_users where id = $id";
    $sth = mysql_query($q);
    $row = mysql_fetch_array($sth);

    $info = array();
    $info['name'] = $row['username'];
    $info['amount'] = number_format($amount, 2);
    send_mail('penalty', $row['email'], $settings['system_email'], $info);
//    mail($row['email'], $settings['site_name']." Penality notification.", $mailcont, "From: ".$settings['system_email']."\nReply-To: ".$settings['system_email']);
  }
  header("Location: ?a=addpenality&say=done&id=$id");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'deleteaccount') {
  $id = sprintf("%d", $frm['id']);
  $q = "delete from hm2_users where id = $id and id <> 1";
  mysql_query($q);
  header("Location: ?a=members&q=".$frm['q']."&p=".$frm['p']."&status=".$frm['status']);
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS


#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'editaccount')and($frm['action'] == 'editaccount')) {

  $id = sprintf("%d", $frm['id']);
#SectionIfStart=demo
  if (($settings['demomode'] == 1) and ($id <= 3)and($id > 0)) {
    header("Location: ?a=editaccount&id=".$frm['id']);
    db_close($dbconn);
    exit;
  }
#SectionIfEnd

  if (($userinfo['transaction_code'] != '') && (($userinfo['transaction_code'] != $frm['alternative_passphrase'])))
  {
    header("Location: ?a=editaccount&id=$id&say=invalid_passphrase");
    db_close($dbconn);
    exit;
  }

  $username = quote($frm['username']);
  $q = "select * from hm2_users where id <> $id and username = '$username'";
  $sth = mysql_query($q);
  $row = mysql_fetch_array($sth) or print(mysql_error());
  if ($row) {
    header("Location: ?a=editaccount&say=userexists&id=".$frm['id']);
    db_close($dbconn);
    exit;
  }
  if (($frm['password'] != '') and ($frm['password'] != $frm['password2'])) {
    header("Location: ?a=editaccount&say=incorrect_password&id=".$frm['id']);
    db_close($dbconn);
    exit;
  }
  if ($frm['username'] == '') {
    header("Location: ?a=editaccount&say=incorrect_username&id=".$frm['id']);
    db_close($dbconn);
    exit;
  }
  if (($frm['transaction_code'] != '') and ($frm['transaction_code'] != $frm['transaction_code2'])) {
    header("Location: ?a=editaccount&say=incorrect_transaction_code&id=".$frm['id']);
    db_close($dbconn);
    exit;
  }

  if ($id == 0)
  {
    $name = quote($frm['fullname']);
    $username = quote($frm['username']);
    $password = md5(quote($frm['password']));

    foreach ($exchange_systems as $pid => $data)
    {
      if ($data['has_account'] && $data['status'])
      {
        if (isset($frm['processing_account'][$pid]))
        {
          $accounts[$pid] = escape_hack($frm['processing_account'][$pid]);
        }
      }
    }
    $account = serialize($accounts);    
    $account = quote($account);

    $email = quote($frm['email']);
    $status = quote($frm['status']);
    $group_id = intval($frm['group_id']);
    $auto_withdraw = sprintf("%d", $frm['auto_withdraw']);
    $admin_auto_pay_earning = sprintf("%d", $frm['admin_auto_pay_earning']);
    $pswd = '';
    if ($settings['store_uncrypted_password'] == 1) {
      $pswd = quote($frm['password']);
    }

    if ($settings['license'] == 'KC3STYBTCATZNRVBYGDF')
    {
      $lang = intval($frm['lang']);
      if ($languages[$lang] == '') $lang = 1; 
      $lang_q = " lang = $lang, ";
    }

    $addfields = array();

    if ($settings['license'] == 'B8REXV4YAS6A9WVBNFEV') /* for 	fundswide.com */ {
      $addfields['limit_transfer_period_times'] = intval($frm['limit_transfer_period_times']);
      $addfields['limit_transfer_period_date'] = in_array($frm['limit_transfer_period_date'], array('n','day','week','month','year')) ? $frm['limit_transfer_period_date'] : 'n';
      if ($addfields['limit_transfer_period_date'] == 'n') $addfields['limit_transfer_period_times'] = 0;
      if ($addfields['limit_transfer_period_times'] == 0) $addfields['limit_transfer_period_date'] = 'n';
      $addfields['limit_withdraw_period_times'] = intval($frm['limit_withdraw_period_times']);
      $addfields['limit_withdraw_period_date'] = in_array($frm['limit_withdraw_period_date'], array('n','day','week','month','year')) ? $frm['limit_withdraw_period_date'] : 'n';
      if ($addfields['limit_withdraw_period_date'] == 'n') $addfields['limit_withdraw_period_times'] = 0;
      if ($addfields['limit_withdraw_period_times'] == 0) $addfields['limit_withdraw_period_date'] = 'n';
    }
    if ($settings['license'] == 'SF7W5B852ZYH28BBSREK') /* regional representative */ {
      $addfields['regional_representative'] = $frm['regional_representative'];
    }

    $addfieldsstr = quote(serialize($addfields));


    $q = "insert into hm2_users set
  	name = '$name',
  	username = '$username',
	password = '$password',
	accounts = '$account',
  	email = '$email',
  	status = '$status',
  	group_id = $group_id,
        $lang_q
	add_fields = '$addfieldsstr',
    auto_withdraw = $auto_withdraw,
    admin_auto_pay_earning = $admin_auto_pay_earning,
    user_auto_pay_earning = $admin_auto_pay_earning,
    pswd = '$pswd',
    date_register = now()";
    mysql_query($q) or print(mysql_error());


    $frm['id'] = mysql_insert_id();
  
  } else {
    $q = "select * from hm2_users where id = $id";
    $sth = mysql_query($q);
    $row = mysql_fetch_array($sth) or print(mysql_error());

    $name = quote($frm['fullname']);
    $address = quote($frm['address']);
    $city = quote($frm['city']);
    $state = quote($frm['state']);
    $zip = quote($frm['zip']);
    $country = quote($frm['country']);
    $edit_location = '';
    if ($settings['use_user_location'])
    {
      $edit_location = "address = '$address',
                        city = '$city',
                        state = '$state',
                        zip = '$zip',
                        country = '$country',
                       ";
    }
    $username = quote($frm['username']);
    $password = quote($frm['password']);
    $transaction_code = quote($frm['transaction_code']);

    $accounts = unserialize($row['accounts']);
    foreach ($exchange_systems as $pid => $data)
    {
      if ($data['has_account'] && $data['status'])
      {
        if (isset($frm['processing_account'][$pid]))
        {
          $accounts[$pid] = escape_hack($frm['processing_account'][$pid]);
        }
      }
    }
    $account = serialize($accounts);    
    $account = quote($account);

    $addfields = unserialize($row['add_fields']);
    if ($settings['license'] == 'B8REXV4YAS6A9WVBNFEV') /* for 	fundswide.com */ {
      $addfields['limit_transfer_period_times'] = intval($frm['limit_transfer_period_times']);
      $addfields['limit_transfer_period_date'] = in_array($frm['limit_transfer_period_date'], array('n','day','week','month','year')) ? $frm['limit_transfer_period_date'] : 'n';
      if ($addfields['limit_transfer_period_date'] == 'n') $addfields['limit_transfer_period_times'] = 0;
      if ($addfields['limit_transfer_period_times'] == 0) $addfields['limit_transfer_period_date'] = 'n';
      $addfields['limit_withdraw_period_times'] = intval($frm['limit_withdraw_period_times']);
      $addfields['limit_withdraw_period_date'] = in_array($frm['limit_withdraw_period_date'], array('n','day','week','month','year')) ? $frm['limit_withdraw_period_date'] : 'n';
      if ($addfields['limit_withdraw_period_date'] == 'n') $addfields['limit_withdraw_period_times'] = 0;
      if ($addfields['limit_withdraw_period_times'] == 0) $addfields['limit_withdraw_period_date'] = 'n';
      if ($addfields['limit_withdraw_period_times'] == 0) $addfields['limit_withdraw_period_date'] = 'n';
    }

    if ($settings['license'] == 'SF7W5B852ZYH28BBSREK') /* regional representative */ {
      $addfields['regional_representative'] = $frm['regional_representative'];
    }

    if (($settings['license'] == '6A44ZYTCAFKXSEP64FDN')or($settings['license'] == '8HEJQNFVSSJP3ERBXULU')or($settings['license'] == 'T6XVSZF7NZBK86HPSYD2')or($settings['license'] == '7ZQMKNALZ6DXGKCHFL8C')) {
      $addfields['ref_com_ch'] = intval($frm['ref_com_ch']);
      $addfields['ref_com'] = sprintf("%0.2f", $frm['ref_com']);

    }

    $addfields['ref_signup_bonus'] = sprintf("%0.2f", $frm['ref_signup_bonus']);
    
    $addfieldsstr = quote(serialize($addfields));

    $email = quote($frm['email']);
    $status = quote($frm['status']);
    $group_id = intval($frm['group_id']);
    $verify = intval($frm['verify']);
    $auto_withdraw = sprintf("%d", $frm['auto_withdraw']);
    $admin_auto_pay_earning = sprintf("%d", $frm['admin_auto_pay_earning']);
    $pax_utype = intval($frm['pax_utype']);
    $gfst_phone = quote($frm['gfst_phone']);
    $user_auto_pay_earning = $row['user_auto_pay_earning'];
    if (($row['admin_auto_pay_earning'] == 0)and($admin_auto_pay_earning == 1))
    {
      $user_auto_pay_earning = 1;
    }
    $user_auto_pay_earning = intval($user_auto_pay_earning);

    if ($settings['license'] == 'KC3STYBTCATZNRVBYGDF')
    {
      $lang = intval($frm['lang']);
      if ($languages[$lang] == '') $lang = 1; 
      $lang_q = " lang = $lang, ";
    }
    
    $add_phones = '';
    if ($settings['use_home_phone']) {
      $phone = quote($frm['home_phone']);
      $add_phones .= "home_phone = '$phone',";
    }
    if ($settings['use_cell_phone']) {
      $phone = quote($frm['cell_phone']);
      $add_phones .= "cell_phone = '$phone',";
    }
    if ($settings['use_work_phone']) {
      $phone = quote($frm['work_phone']);
      $add_phones .= "work_phone = '$phone',";
    }
    $admin_desc = quote($frm['admin_desc']);
    $max_daily_withdraw = sprintf("%0.2f", $frm['max_daily_withdraw']);

    $q = "update hm2_users set 
  	name = '$name',
        $edit_location
  	username = '$username',
  	accounts = '$account',
  	email = '$email',
        $lang_q
        $add_phones
  	status = '$status',
  	group_id = $group_id,
  	verify = $verify,
        auto_withdraw = $auto_withdraw,
        admin_auto_pay_earning = $admin_auto_pay_earning,
        user_auto_pay_earning = $user_auto_pay_earning,
        pax_utype = $pax_utype,
        gfst_phone = '$gfst_phone',
        add_fields = '$addfieldsstr',
        admin_desc = '$admin_desc',
        max_daily_withdraw = {$max_daily_withdraw}
  	where id = $id and id <> 1";
    mysql_query($q) or print(mysql_error());
    
    if ($frm['reset_security'] == 1) {
      $sec = array();
      $sec['detect_ip'] = 'disabled';
      $sec['detect_browser'] = 'disabled';
  
      $str = quote(serialize($sec));
      $q = "update hm2_users set ac = '$str' where id = $id and id <> 1";
#      print $q;
      mysql_query($q) or print mysql_error();
      
    }

    if ($password != '')
    {
      $pswd = quote($password);
      $password = md5($password);
      $q = "update hm2_users set password = '$password' where id = $id and id <> 1";
      mysql_query($q) or print(mysql_error());
      if ($settings['store_uncrypted_password'] == 1)
      {
        $q = "update hm2_users set pswd = '$pswd' where id = $id and id <> 1";
        mysql_query($q) or print(mysql_error());
      }
    }
    if ($transaction_code != '')
    {
      $pswd = quote($password);
      $password = md5($password);
      $q = "update hm2_users set transaction_code = '$transaction_code' where id = $id and id <> 1";
      mysql_query($q) or print(mysql_error());
    }
    if ($frm['activate'])
    {
      $q = "update hm2_users set activation_code = '', bf_counter = 0 where id = $id and id <> 1";
      mysql_query($q) or print(mysql_error());
    }
/* veryold
    if ($settings['license'] == 'UYKD37X8YLS5DNFFHL8R') {
        if ($frm['reset']) {
          $q = "update hm2_users set reset = 1 where id = $id and id <> 1";
          mysql_query($q) or print(mysql_error());
        }
    }*/ 

  }
  header("Location: ?a=editaccount&id=".$frm['id']."&say=saved");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'members')&&($frm['action'] == 'modify_status')) {
  if ($settings['demomode'] != 1) {
    $active = $frm['active'];
    while(list($id,$status)=each($active)) {
      $id = intval($id);
      $qstatus = quote($status);
      $qgroup = intval($frm['group'][$id]);
      $q = "update hm2_users set status = '$qstatus', group_id = $qgroup where id = $id";
      mysql_query($q) or print(mysql_error());
    }
  }
  header("Location: ?a=members");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'members')&&($frm['action'] == 'activate')) {
//  if ($settings['demomode'] != 1) {
    $active = $frm['activate'];
    while(list($id,$status)=each($active))
    {
      $id = intval($id);
      $q = "update hm2_users set activation_code = '', bf_counter = 0 where id = $id";
      mysql_query($q) or print(mysql_error());
    }
//  }
  header("Location: ?a=members&status=blocked");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['action'] == 'add_hyip') {

  $q_days = sprintf("%d", $frm['hq_days']);
  if ($frm['hq_days_nolimit'] == 1) {
    $q_days = 0;
  }
  $min_deposit = sprintf("%0.2f", $frm['hmin_deposit']);
  $max_deposit = sprintf("%0.2f", $frm['hmax_deposit']);
  $return_profit = sprintf("%d", $frm['hreturn_profit']);
  $return_profit_percent = sprintf("%.02f", $frm['hreturn_profit_percent']);
  if ($return_profit_percent > 100) $return_profit_percent = 100;
  $percent = sprintf("%0.2f", $frm['hpercent']);
  $pay_to_egold_directly = sprintf("%d", $frm['earning_to_egold']);
  $use_compound = sprintf("%d", $frm['use_compound']);
  $work_week = sprintf("%d", $frm['work_week']);
  $parent = sprintf("%d", $frm['parent']);
  $amount_mult = sprintf("%.02f", $frm['amount_mult']);

  $desc = quote($frm_orig['plan_description']);

  $withdraw_principal = sprintf("%d", $frm['withdraw_principal']);
  $withdraw_principal_percent = sprintf("%.02f", $frm['withdraw_principal_percent']);
  $withdraw_principal_duration = sprintf("%d", $frm['withdraw_principal_duration']);
  $withdraw_principal_duration_max = sprintf("%d", $frm['withdraw_principal_duration_max']);

  $compound_min_deposit = sprintf("%.02f", $frm['compound_min_deposit']);
  $compound_max_deposit = sprintf("%.02f", $frm['compound_max_deposit']);
  $compound_percents_type = sprintf("%d", $frm['compound_percents_type']);
  $compound_min_percent = sprintf("%.02f", $frm['compound_min_percent']);
  if ($compound_min_percent < 0 || $compound_min_percent > 100) $compound_min_percent = 0;
  $compound_max_percent = sprintf("%.02f", $frm['compound_max_percent']);
  if ($compound_max_percent < 0 || $compound_max_percent > 100) $compound_max_percent = 100;
  $cps = preg_split('/\s*,\s*/', $frm['compound_percents']);
  $cps1 = array();
  foreach ($cps as $cp)
  {
    if (! in_array($cp, $cps1) && ($cp >= 0) && ($cp <= 100))
    {
      array_push($cps1, sprintf("%d", $cp));
    }
  }
  sort($cps1);
  $compound_percents = join(',', $cps1);
  $hold = sprintf("%d", $frm['hold']);
  $delay = sprintf("%d", $frm['delay']);
  $rpcp = sprintf("%0.2f", $frm['reinvest_plan_complete_percent']);
  $pax_utype = intval($frm['pax_utype']);

  $q = "select max(ordering) as m from hm2_types";
  $sth = mysql_query($q) or print mysql_error();
  $row = mysql_fetch_array($sth);
  $ordering = $row['m']+1;

  $q = "insert into hm2_types set
	name='".quote($frm['hname'])."',
	q_days = $q_days,
	period = '".quote($frm['hperiod'])."',
	status = '".quote($frm['hstatus'])."',
	return_profit = '$return_profit',
	return_profit_percent = $return_profit_percent,
	pay_to_egold_directly = $pay_to_egold_directly,
	use_compound = $use_compound,
	work_week = $work_week,
	rpcp = $rpcp,
	parent = $parent,
	withdraw_principal = $withdraw_principal,
	withdraw_principal_percent = $withdraw_principal_percent,
	withdraw_principal_duration = $withdraw_principal_duration,
	withdraw_principal_duration_max = $withdraw_principal_duration_max,
	compound_min_deposit = $compound_min_deposit,
	compound_max_deposit = $compound_max_deposit,
	compound_percents_type = $compound_percents_type,
	compound_min_percent = $compound_min_percent,
	compound_max_percent = $compound_max_percent,
	compound_percents = '$compound_percents',
	pax_utype = $pax_utype,
	dsc = '$desc',
	hold = $hold,
	delay = $delay,
        ordering = $ordering,
        amount_mult = amount_mult
  ";
  mysql_query($q) or print(mysql_error());
  $parent = mysql_insert_id();

  $rate_amount_active = $frm['rate_amount_active'];
//  $rate_amount_active = $frm['rate_amount_active'];
  for ($i = 0; $i< 300; $i++) {
    if ($frm['rate_amount_active'][$i] == 1) {
      $name = quote($frm['rate_amount_name'][$i]);
      $min_amount = sprintf("%0.2f", $frm['rate_min_amount'][$i]);
      $max_amount = sprintf("%0.2f", $frm['rate_max_amount'][$i]);
      $percent = sprintf("%0.2f", $frm['rate_percent'][$i]);
      $q = "insert into hm2_plans set 
		parent=$parent, 
		name='$name', 
		min_deposit = $min_amount,
		max_deposit = $max_amount, 
		percent = $percent";
      mysql_query($q) or print(mysql_error());
    }
  }
  header("Location: ?a=rates");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'edit_rate') and ($frm['ajax_request'] == '1') and ($float_percent_mode_enabled == 1) and ($frm['action'] == 'get_float_rates')) {
  header("Content-type: text/xml") ;
  if (!function_exists('curl_init')) {
    print "<"."?xml version=\"1.0\" encoding=\"UTF-8\"?".">
	<float_percent_div>
	<content><![CDATA[ <span style='color: red;'><center><small>There is no curl installed on server. Please ask your hosting provider install curl to use this function</small></center> ]]></content>
        </float_percent_div>";
    exit;
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'http://www.goldcoders.com/GCfloatpercent');
  curl_setopt($ch, CURLOPT_POST, 1);
  $str = "license={$settings['license']}&";
  foreach ($frm as $k => $v) {
    $str .= "$k=".urlencode($v).'&';
  }
  curl_setopt($ch, CURLOPT_POSTFIELDS, "$str");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  $l = curl_exec ($ch);
  curl_close ($ch); 
  print $l;
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'edit_rate') and ($frm['ajax_request'] == '1') and ($float_percent_mode_enabled == 2) and ($frm['action'] == 'get_float_rates')) {
  header("Content-type: text/xml") ;
  if (!function_exists('curl_init')) {
    print "<"."?xml version=\"1.0\" encoding=\"UTF-8\"?".">
	<float_percent_div>
	<content><![CDATA[ <span style='color: red;'><center><small>There is no curl installed on server. Please ask your hosting provider install curl to use this function</small></center> ]]></content>
        </float_percent_div>";
    exit;
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'http://www.goldcoders.com/GCfloatpercent2');
  curl_setopt($ch, CURLOPT_POST, 1);
  $str = "license={$settings['license']}&";
  foreach ($frm as $k => $v) {
    $str .= "$k=".urlencode($v).'&';
  }
  curl_setopt($ch, CURLOPT_POSTFIELDS, "$str");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  $l = curl_exec ($ch);
  curl_close ($ch); 
  print $l;
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'edit_rate')and($frm['action'] == 'deletefrate')and($float_percent_mode_enabled == 2)and($frm['ajax_request'] == '1')) {
  header("Content-type: text/xml") ;
  if (!function_exists('curl_init')) {
    print "<"."?xml version=\"1.0\" encoding=\"UTF-8\"?".">
	<float_percent_div>
	<content><![CDATA[ <span style='color: red;'><center><small>There is no curl installed on server. Please ask your hosting provider install curl to use this function</small></center> ]]></content>
        </float_percent_div>";
    exit;
  }
  $ch = curl_init();
  $id = intval($frm['rate_id']);
  $q = "delete from hm2_plans where ext_id = $id";
  mysql_query($q) or print mysql_error();
  curl_setopt($ch, CURLOPT_URL, 'http://www.goldcoders.com/GCfloatpercent2');
  curl_setopt($ch, CURLOPT_POST, 1);
  $str = "license={$settings['license']}&";
  foreach ($frm as $k => $v) {
    $str .= "$k=".urlencode($v).'&';
  }
  curl_setopt($ch, CURLOPT_POSTFIELDS, "$str");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $l = curl_exec ($ch);
#  $file = fopen("./tmpl_c/ajax", "w");
#    fwrite($file, $str);
#    fwrite($file, $l);
#    fclose($file);
  curl_close ($ch); 
  print $l;
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['action'] == 'edit_hyip') {
  $id = sprintf("%d", $frm['hyip_id']);
#SectionIfStart=demo
  if (($id < 3) and ($settings['demomode'] == 1)) {
    header("Location: ?a=rates");
    db_close($dbconn);
    exit;
  }
#SectionIfEnd
  $q_days = sprintf("%d", $frm['hq_days']);
  if ($frm['hq_days_nolimit'] == 1) {
    $q_days = 0;
  }
/*
  foreach ($frm as $k => $v) {
    if (preg_match("/date(\d+)$/", $k, $matches)) {
      $m = $matches[1];
      $fpercent = sprintf("%0.2f", $frm["date$m"]);
      $q = "update manager3_daily_rates set
		fpercent = $fpercent where
		date_str = $m and
		type_id = $id";
      mysql_query($q) or print mysql_error();
    }
  }
*/

  if (($float_percent_mode_enabled == 1)and($frm['hperiod'] == 'df')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.goldcoders.com/GCfloatpercent');
    curl_setopt($ch, CURLOPT_POST, 1);
    $str = "license={$settings['license']}&action=update_rates&type_id=$id&";
    foreach ($frm as $k => $v) {
      if (preg_match("/date(\d+)$/", $k, $matches)) {
        $str .= "$k=".urlencode($v).'&';
      }
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, "$str");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    /*$l = */
    curl_exec ($ch);
    curl_close ($ch); 
  }
  
  if (($float_percent_mode_enabled == 2)and($frm['hperiod'] == 'df')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.goldcoders.com/GCfloatpercent2');
    curl_setopt($ch, CURLOPT_POST, 1);
    $str = "license={$settings['license']}&action=update_rates&type_id=$id&";
    foreach ($frm as $k => $v) {
      if (preg_match("/date(\d+)$/", $k, $matches)) {
        $str .= "$k=".urlencode($v).'&';
      }
      if (preg_match("/fp_deposit_/", $k, $matches)) {
        $str .= "$k=".urlencode($v).'&';
      }
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, "$str");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    /*$l = */
    $a = curl_exec ($ch);
    curl_close ($ch); 
  }
  

  $min_deposit = sprintf("%0.2f", $frm['hmin_deposit']);
  $max_deposit = sprintf("%0.2f", $frm['hmax_deposit']);
  $return_profit = sprintf("%d", $frm['hreturn_profit']);
  $return_profit_percent = sprintf("%.02f", $frm['hreturn_profit_percent']);
  if ($return_profit_percent > 100) $return_profit_percent = 100;
  $pay_to_egold_directly = sprintf("%d", $frm['earning_to_egold']);
  $percent = sprintf("%0.2f", $frm['hpercent']);
  $work_week = sprintf("%d", $frm['work_week']);
  $use_compound = sprintf("%d", $frm['use_compound']);
  $parent = sprintf("%d", $frm['parent']);
  $amount_mult = sprintf("%d", $frm['amount_mult']);

  $desc = quote($frm_orig['plan_description']);

  $withdraw_principal = sprintf("%d", $frm['withdraw_principal']);
  $withdraw_principal_percent = sprintf("%.02f", $frm['withdraw_principal_percent']);
  $withdraw_principal_duration = sprintf("%d", $frm['withdraw_principal_duration']);
  $withdraw_principal_duration_max = sprintf("%d", $frm['withdraw_principal_duration_max']);

  $compound_min_deposit = sprintf("%.02f", $frm['compound_min_deposit']);
  $compound_max_deposit = sprintf("%.02f", $frm['compound_max_deposit']);
  $compound_percents_type = sprintf("%d", $frm['compound_percents_type']);
  $compound_min_percent = sprintf("%.02f", $frm['compound_min_percent']);
  if ($compound_min_percent < 0 || $compound_min_percent > 100) $compound_min_percent = 0;
  $compound_max_percent = sprintf("%.02f", $frm['compound_max_percent']);
  if ($compound_max_percent < 0 || $compound_max_percent > 100) $compound_max_percent = 100;
  $cps = preg_split('/\s*,\s*/', $frm['compound_percents']);
  $cps1 = array();
  foreach ($cps as $cp)
  {
    if (! in_array($cp, $cps1) && ($cp >= 0) && ($cp <= 100))
    {
      array_push($cps1, sprintf("%d", $cp));
    }
  }
  sort($cps1);
  $compound_percents = join(',', $cps1);

  $closed = ($frm['closed']) ? 1 : 0;
  $hold = sprintf("%d", $frm['hold']);
  $delay = sprintf("%d", $frm['delay']);
  $deposits_limit_num = sprintf("%d", abs($frm['deposits_limit_num']));
  $ouma = sprintf("%0.2f", $frm['one_user_max_amount']);
  $pax_utype = intval($frm['pax_utype']);

  if ($settings['license'] == 'KC3STYBTCATZNRVBYGDF')
  {
    $send_profit_to_stocks = "send_profit_to_stocks = ".(abs($frm['send_profit_to_stocks']) ? 1 : 0).",";
    $send_profit_to_stocks .= "send_percent_to_stocks = ".intval($frm['send_percent_to_stocks']).",";
    $send_profit_to_stocks .= "add_2_bonus = ".(abs($frm['add_2_bonus']) ? 1 : 0).",";

    if ($frm['hperiod'] == 'm')
    {
      $send_profit_to_stocks .= "pay_by_button = ".(abs($frm['pay_by_button']) ? 1 : 0).",";
    }
  }
  $dawifi = intval($frm['disable_auto_withdraw_if_invested']);

  $rpcp = sprintf("%0.2f", $frm['reinvest_plan_complete_percent']);
  $parent_afterend = intval($frm['parent_afterend']); // депозиты принимаем у пользователей у которых закончилс€ депозит в этом плане.
  $q = "update hm2_types set
	name='".quote($frm['hname'])."',
	q_days = $q_days,
	period = '".quote($frm['hperiod'])."',
	status = '".quote($frm['hstatus'])."',
	return_profit = '$return_profit',
	return_profit_percent = $return_profit_percent,
	pay_to_egold_directly = $pay_to_egold_directly,
	use_compound = $use_compound,
	work_week = $work_week,
	parent = $parent,
        withdraw_principal = $withdraw_principal,
        withdraw_principal_percent = $withdraw_principal_percent,
        withdraw_principal_duration = $withdraw_principal_duration,
        withdraw_principal_duration_max = $withdraw_principal_duration_max,
        compound_min_deposit = $compound_min_deposit,
        compound_max_deposit = $compound_max_deposit,
        compound_percents_type = $compound_percents_type,
        compound_min_percent = $compound_min_percent,
        compound_max_percent = $compound_max_percent,
        compound_percents = '$compound_percents',
	rpcp = $rpcp,
        closed = $closed,
        $send_profit_to_stocks
        dsc='$desc',
        hold = $hold,
        delay = $delay,
        pax_utype = $pax_utype,
	ouma = $ouma,
	dawifi = $dawifi,
        deposits_limit_num = $deposits_limit_num,
        pae = $parent_afterend,
        amount_mult = $amount_mult
    where id=$id
  ";
//print $q; exit;
  mysql_query($q) or die(mysql_error());
  $parent = $id;
  $q = "delete from hm2_plans where parent = $id";
  mysql_query($q) or die(mysql_error());

  $rate_amount_active = $frm['rate_amount_active'];
  if (($frm['hperiod'] == 'df')and($float_percent_mode_enabled == 2)) { // дл€ daily float планов
    foreach ($frm as $k => $v) {
      if (preg_match("/fp_deposit_name_(\d+)$/", $k, $matches)) {
        $m = $matches[1];
        $qm = sprintf("%d", $m);
        $qrange_name = quote($frm['fp_deposit_name_'.$m]);
        $deposit_from = sprintf("%0.2f", $frm['fp_deposit_start_'.$m]);
        $deposit_to = sprintf("%0.2f", $frm['fp_deposit_end_'.$m]);
        if (($qm >0)or($qrange_name != '')) {
          $q = "insert into hm2_plans set 
		parent=$parent, 
		name='{$qrange_name}', 
		min_deposit = {$deposit_from},
		max_deposit = {$deposit_to}, 
		ext_id = $qm,
		percent = 0";
          mysql_query($q) or print(mysql_error());
        }
      }
    }
  } else { // дл€ остальных планов
    for ($i = 0; $i< 300; $i++) {
      if ($frm['rate_amount_active'][$i] == 1) {
        $name = quote($frm['rate_amount_name'][$i]);
        $min_amount = sprintf("%0.2f", $frm['rate_min_amount'][$i]);
        $max_amount = sprintf("%0.2f", $frm['rate_max_amount'][$i]);
        $percent = sprintf("%0.2f", $frm['rate_percent'][$i]);
        $q = "insert into hm2_plans set 
		parent=$parent, 
		name='$name', 
		min_deposit = $min_amount,
		max_deposit = $max_amount, 
		percent = $percent";
        mysql_query($q) or die(mysql_error());
      }
    }
  }
  header("Location: ?a=rates");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'myemails') {
  if ($settings['license'] == '5GUSAQ8P5QELLZXWZTYU') {
    $q = "select email from hm2_users where id > 1 order by id";
    $sth = mysql_query($q) or print mysql_error();
    while ($row = mysql_fetch_array($sth)) {
      print $row['email']."<br>";
    }
    exit;
  }
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS


#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'thistory' && $frm['action2'] == 'download_csv')
{

  $frm['day_to'] = sprintf("%d", $frm['day_to']);
  $frm['month_to'] = sprintf("%d", $frm['month_to']);
  $frm['year_to'] = sprintf("%d", $frm['year_to']);
  $frm['day_from'] = sprintf("%d", $frm['day_from']);
  $frm['month_from'] = sprintf("%d", $frm['month_from']);
  $frm['year_from'] = sprintf("%d", $frm['year_from']);


  if ($frm['day_to'] == 0)
  {
    $frm['day_to'] = date('j', time()+$settings['time_dif']*60*60);
    $frm['month_to'] = date('n', time()+$settings['time_dif']*60*60);
    $frm['year_to'] = date('Y', time()+$settings['time_dif']*60*60);

    $frm['day_from'] = 1;
    $frm['month_from'] = $frm['month_to'];
    $frm['year_from'] = $frm['year_to'];

  }
  $datewhere = "'".$frm['year_from'].'-'.$frm['month_from'].'-'.$frm['day_from']."' + interval 0 day < date + interval ".$settings['time_dif']." hour and ".
  	"'".$frm['year_to'].'-'.$frm['month_to'].'-'.$frm['day_to']."' + interval 1 day > date + interval ".$settings['time_dif']." hour ";

  if ($frm['ttype'] != '')
  {
    if ($frm['ttype'] == 'exchange')
    {
      $typewhere = " and (type='exchange_out' or type='exchange_in')";
    }
    else
    {
      $typewhere = " and type='".quote($frm['ttype'])."' ";
    }
  }

  $u_id = sprintf("%d", $frm['u_id']);

  if ($u_id > 1) {
    $userwhere = " and user_id = $u_id ";
  }
  $ecwhere = '';
  if ($frm['ec'] == '') $frm['ec'] = -1;
  $ec = sprintf("%d", $frm['ec']);
  if ($frm['ec'] > -1)
  {
    $ecwhere = " and ec = $ec";
  }

  $q = "select *, date_format(date + interval ".$settings['time_dif']." hour, '%b-%e-%Y %r') as d from hm2_history where $datewhere $userwhere $typewhere $ecwhere order by date desc, id desc";
  $sth = mysql_query($q) or print(mysql_error());
  $trans = array();
  while ($row = mysql_fetch_array($sth)) {
    $q = "select username from hm2_users where id = ".$row['user_id'];
    $sth1 = mysql_query($q);
    $row1 = mysql_fetch_array($sth1);
    if ($row1) {
      $row['username'] = $row1['username'];
    } else {
      $row['username'] = '-- deleted user --';
    }
    array_push($trans, $row);
  }

  $from = $frm['month_from'].'_'.$frm['day_from'].'_'.$frm['year_from'];
  $to = $frm['month_to'].'_'.$frm['day_to'].'_'.$frm['year_to'];

  header("Content-Disposition: attachment; filename=".$frm['ttype']."history-$from-$to.csv");
  header("Content-type: text/coma-separated-values");

  print '"Transaction Type","User","Amount","Currency","Date","Description"'."\n";
  for ($i = 0; $i < sizeof($trans); $i++)
  {
    print '"'.$transtype[$trans[$i]['type']].'","'.$trans[$i]['username'].'","$'.number_format(abs($trans[$i]['actual_amount']), 2).'","'.$exchange_systems[$trans[$i]['ec']]['name'].'","'.$trans[$i]['d'].'","'.$trans[$i]['description'].'"'."\n";
  }

  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'add_processing' && $frm['action'] == 'add_processing')
{
  if (!$settings['demomode'])
  {
    $status = ($frm['status']) ? 1 : 0;
    $name = quote($frm['name']);
    $description = quote($frm_orig['description']);
    $use = $frm['field'];
    $fields = array();
    if ($use)
    {
      reset($use);
      $i = 1;
      foreach ($use as $id => $value)
      {
        if ($frm['use'][$id])
        {
          $fields[$i] = $value;
          $i++;
        }
      }
    }
    $qfields = serialize($fields);

    $q = "select max(id) as max_id from hm2_processings";
    $sth = mysql_query($q);
    $row = mysql_fetch_array($sth);
    $max_id = $row['max_id'];
    if ($max_id < 999) { $max_id = 998; }
    $max_id++;

    $q = "insert into hm2_processings set
             id = $max_id,
             status = $status,
             name = '$name',
             description = '$description',
             infofields = '".quote($qfields)."'
         ";
    mysql_query($q) or print mysql_error();
  }

  header("Location: ?a=processings");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'edit_processing' && $frm['action'] == 'edit_processing')
{
  if (!$settings['demomode'])
  {
    $pid = intval($frm['pid']);
    $status = ($frm['status']) ? 1 : 0;
    $name = quote($frm['name']);
    $description = quote($frm_orig['description']);
    $use = $frm['field'];
    $fields = array();
    if ($use)
    {
      reset($use);
      $i = 1;
      foreach ($use as $id => $value)
      {
        if ($frm['use'][$id])
        {
          $fields[$i] = $value;
          $i++;
        }
      }
    }
    $qfields = serialize($fields);
    $q = "update hm2_processings set
             status = $status,
             name = '$name',
             description = '$description',
             infofields = '".quote($qfields)."'
           where id = $pid
         ";
    mysql_query($q) or print mysql_error();
  }

  header("Location: ?a=processings");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'update_processings')
{
  if (!$settings['demomode'])
  {
    $q = "update hm2_processings set status = 0";
    mysql_query($q) or print mysql_error();

    $status = $frm['status'];
    if ($status)
    {
      foreach ($status as $id => $v)
      {
        $id = intval($id);
        $q = "update hm2_processings set status = 1 where id = $id";
        mysql_query($q) or print mysql_error();
      }
    }
  }

  header("Location: ?a=processings");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'delete_processing')
{
  if (!$settings['demomode'])
  {
    $pid = intval($frm['pid']);
    $q = "delete from hm2_processings where id = $pid";
    mysql_query($q) or print mysql_error();
  }

  header("Location: ?a=processings");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS
                             

#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'holidays')and($frm['add_new'] == '1')) {
#   print_r($frm);
  for ($i = 1; $i<4; $i++) {
    if (preg_match("/(\d+)-(\d+)-(\d+)/", $frm["hol".$i], $a)) {
      $d = $a[1]; $m = $a[2]; $y = $a[3];
      if (checkdate($m, $d, $y)) {
        $hdesc = quote($frm['hold'.$i]);
        $q = "delete from hm2_holidays where hd = '$y-$m-$d'";
        mysql_query($q) or print mysql_error();
        $q = "insert into hm2_holidays set hd = '$y-$m-$d', hdescription = '$hdesc'";
        mysql_query($q) or print mysql_error();
      }
    }
  }
  header("Location: ?a=holidays");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS


#SectionStart=ADMIN_HIDDEN_ACTIONS
if (($frm['a'] == 'holidays')and($frm['delete_id'] != '')) {
  if (preg_match("/(\d+)-(\d+)-(\d+)/", $frm["delete_id"], $a)) {
    $y = $a[1]; $m = $a[2]; $d = $a[3];
    if (checkdate($m, $d, $y)) {
      $q = "delete from hm2_holidays where hd = '$y-$m-$d'";
      mysql_query($q) or print mysql_error();
    }
  }
  header("Location: ?a=holidays");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS



#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'ext_accounts_blacklist' && $frm['action'] == 'add')
{
  if (!$settings['demomode'])
  {
    $account = quote($frm['account']);
    $ec = intval($frm['ec']);
    $q = "insert into hm2_pay_settings set n = 'ext_accounts_blacklist', v = '$ec=$account'";
    mysql_query($q) or print mysql_error();
  }

  header("Location: ?a=ext_accounts_blacklist");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($frm['a'] == 'ext_accounts_blacklist' && $frm['action'] == 'delete')
{
  if (!$settings['demomode'])
  {
    if (is_array($frm['del'])) {
      foreach ($frm['del'] as $k => $val) {
        $q = "delete from hm2_pay_settings where n = 'ext_accounts_blacklist' and v = '" . quote($val) . "' limit 1";
        mysql_query($q) or print mysql_error();
      }
    }
  }

  header("Location: ?a=ext_accounts_blacklist");
  db_close($dbconn);
  exit;
}
#SectionEnd=ADMIN_HIDDEN_ACTIONS

#SectionStart=ADMIN_HIDDEN_ACTIONS
if ($settings['license'] == 'KC3STYBTCATZNRVBYGDF') {
if ($frm['a'] == 'add_earnings')
{
  $pid = intval($frm['pid']);

  if ($frm['prolong'])
  {
    // just count futher
  }
  elseif ($settings['last_run_'.$pid] + 60*30 > time())
  {
    print "Earnings just was added. I'm quit.";
    db_close($dbconn);
    exit;
  }
  else
  {
    $settings['last_run_'.$pid] = time();
    save_settings2('hyip manager pro 2005 jul 26');
  }


  $q = "select * from hm2_types where id = $pid";
  $sth = mysql_query($q) or print mysql_error();
  $type = mysql_fetch_array($sth);

  if ($type['period'] != 'm')
  {
    print "Package must have period 'monthly' to use this feature.";
    db_close($dbconn);
    exit;
  }

  print "<html><head><title>Do not close - Adding Earings...</title></head><body>Please, do not close this window...";
  flush();
  $start_time = time();


  $plans = array();
  $q = "select * from hm2_plans where parent = $pid";
  $sth = mysql_query($q);
  while ($row = mysql_fetch_array($sth))
  {
    array_push($plans, $row);
  }

  $q = "select
              d.*, 
              t.period as period, t.use_compound as use_compound,
              t.compound_min_deposit, t.compound_max_deposit,
              t.compound_min_percent, t.compound_max_percent,
              t.compound_percents_type, t.compound_percents,
              t.work_week as work_week,
              t.q_days as q_days, t.withdraw_principal,
              (d.deposit_date + interval t.withdraw_principal_duration day < now()) wp_ok,
              t.return_profit as return_profit, t.send_profit_to_stocks, t.send_percent_to_stocks, t.add_2_bonus
           from
              hm2_deposits as d,
              hm2_types as t,
              hm2_users as u
           where
              d.type_id = $pid and
              d.type_id = t.id and 
              u.id = d.user_id and
              u.status = 'on' and 
              d.status='on' and 
              t.status = 'on' and 
              date_format(d.deposit_date, '%Y%m') <= date_format(now() - interval 2 month, '%Y%m') and
              date_format(d.last_pay_date, '%Y%m') < date_format(now(), '%Y%m')
       ";
  $sth = mysql_query($q) or print(mysql_error());
  while ($row = mysql_fetch_array($sth))
  {
    $percent = 0;
    $last_percent = 0;
    reset($plans);
    foreach ($plans as $plan) {
      if (($plan['min_deposit'] <= $row['actual_amount']) and (($plan['max_deposit'] >= $row['actual_amount'])or($plan['max_deposit'] == 0))) {
        $percent = $plan['percent'];
      }
  
      if (($plan['min_deposit'] > $row['actual_amount']) and ($percent == 0)) {
        $percent = $last_percent;
      }
  
      if (($plan['min_deposit'] > $row['actual_amount']) and ($percent > 0)) {
        break;
      }
      $last_percent = $plan['percent'];
    }
    if (($plan['max_deposit'] != 0) && ($plan['max_deposit'] < $row['actual_amount']))
    {
      $percent = $last_percent;
    }

    $bonusp = 0;
    if ($row['add_2_bonus'])
    {
      $q = "select amount from user_shares_num_log where user_id = {$row['user_id']} and date_format(date, '%Y%m') = date_format(now() - interval 2 month, '%Y%m')";
      $sth1 = mysql_query($q);
      $row1 = mysql_fetch_array($sth1);
      if ($row1['amount'] > 20000)
      {
        $bonusp = 2;
      }
    }

    $inc = $row['actual_amount'] * ($percent + $bonusp) / 100;
    $interval = ' 1 month ';

    $flag_exists_earning = 0;
    if ($flag_exists_earning == 0)
    {
        $q = "insert into hm2_history set user_id = ".$row['user_id'].",
                amount = $inc,
                type = 'earning',
                description = 'Earning from deposit ".$settings['currency_sign'].number_format($row['actual_amount'], 2)." - {$percent}%".($bonusp > 0 ? " + {$bonusp}% bonus'" : "'").",
                actual_amount = $inc,
                date = now(),
                ec = ".$row['ec'].",
                str = '$pid',
                deposit_id = ".$row['id'];
        mysql_query($q) or print(mysql_error());      
    }

    $comp_amount = 0;
    if (($row['compound'] > 0) and ($row['compound'] <= 100) and ($row['use_compound'] == 1))
    {
      if ($row['compound_max_deposit'] == 0) $row['compound_max_deposit'] = $row['actual_amount'] + 1;
      if (($row['actual_amount'] >= $row['compound_min_deposit']) && ($row['actual_amount'] <= $row['compound_max_deposit']))
      {
        if ($row['compound_percents_type'] == 1)
        {
          $cps = preg_split('/\s*,\s*/', $row['compound_percents']);
          if (! in_array($row['compound'], $cps))
          {
            $row['compound'] = $cps[0];
          }
        }
        else
        {
          if ($row['compound'] < $row['compound_min_percent']) $row['compound'] = $row['compound_min_percent'];
          if ($row['compound'] > $row['compound_max_percent']) $row['compound'] = $row['compound_max_percent'];
        }
      }
      else
      {
        $row['compound'] = 0;
      }


      if (($row['compound'] > 0) and ($row['compound'] <=100))
      {
        $comp_amount = $inc * $row['compound'] / 100;
        $inc = floor((floor($inc*100000)/100000 - floor($comp_amount*100000)/100000)*100)/100;
        $q = "insert into hm2_history set user_id = ".$row['user_id'].",
                        amount = -$comp_amount,
            		type='deposit',
            		description = 'Compounding deposit',
            		actual_amount = -$comp_amount,
            		ec = ".$row['ec'].",
            		date = now(),
                        deposit_id = ".$row['id'];
        mysql_query($q) or print mysql_error();
        $q = "update hm2_deposits set amount = amount + $comp_amount,
            		actual_amount = actual_amount + $comp_amount
            		where id = ".$row['id'];
        mysql_query($q) or print mysql_error();
      }
    }

    if ($row['send_profit_to_stocks'])
    {
        $sinc = floor(($inc - $comp_amount) * $row['send_percent_to_stocks'])/100;
        if ($sinc > 0)
        {
          $q = "insert into hm2_history set user_id = ".$row['user_id'].",
                  amount = -$sinc,
                  type = 'penality',
                  description = 'Earning moved to Stocks account',
                  actual_amount = -$sinc,
                  date = now(),
                  ec = ".$row['ec'].",
                  str = 'gg',
                  deposit_id = ".$row['id'];
          mysql_query($q) or print(mysql_error());
          $q = "insert into sh2_history set user_id = ".$row['user_id'].",
                  amount = $sinc,
                  type = 'bonus',
                  description = 'Earning received to buy shares',
                  actual_amount = $sinc,
                  date = now(),
                  ec = ".$row['ec'].",
                  str = 'gg'";
          mysql_query($q) or print(mysql_error());           
        }
    }

    $q = "update hm2_deposits set 
            q_pays = q_pays + 1, 
            last_pay_date = now()
            where id = ".$row['id'];
    mysql_query($q) or print(mysql_error());

    if (time() - $start_time > 10)
    {
      print "<meta http-equiv='Refresh' content='0;?a=add_earnings&pid=$pid&prolong=1'></body></html>";
      db_close($dbconn);
      exit;
    }
    print ' ';
    flush();
  }

  if ($type['q_days'] > 0)
  {
    $q = "update hm2_deposits set
                 status = 'off'
            where
                 status = 'on' and
                 type_id = $pid and
                 deposit_date + interval {$type['q_days']} day < now()
         ";
    mysql_query($q) or print(mysql_error());
  }

  $refs = array();
  $q = "select
              u.id,
              u.ref,
              sum(d.actual_amount) as am
          from
              hm2_users as u,
              hm2_deposits as d,
              hm2_deposits as d2
         where
              u.ref > 0 and
              u.id = d.user_id and
              d.status = 'on' and
              u.ref = d2.user_id and
              d2.actual_amount > 0
         group by
              u.id,
              u.ref
       ";
  $sth = mysql_query($q);
  while ($row = mysql_fetch_array($sth))
  {
    $refs[$row['ref']]['ref_amount'] += $row['am'];
  }

  foreach ($refs as $id => $data)
  {
    if ($data['ref_amount'] < 3000)
    {
      $percent = 0;
      continue;
    }
    elseif ($data['ref_amount'] < 6000)
    {
      $percent = 0.02;
    }
    elseif ($data['ref_amount'] < 12000)
    {
      $percent = 0.05;
    }
    else
    {
      $percent = 0.10;
    }

    $q = "select count(id) as cnt from hm2_history where
            user_id = $id and
            type = 'commissions' and
            str = '$pid' and
            date_format(date, '%Y%m') = date_format(now(), '%Y%m') and
            description = 'Accomulated referral commission for this month profits'
    ";
    $sth = mysql_query($q) or print mysql_error();
    $row = mysql_fetch_array($sth);

    if ($row && $row['cnt'] == 0) 
    {
      $q = "select
                   h.ec,
                   sum(h.actual_amount) as amnt
             from
                   hm2_history as h,
                   hm2_users as u
             where
                   h.user_id = u.id and
                   u.ref = $id and
                   h.type = 'earning' and
                   date_format(h.date, '%Y%m') = date_format(now(), '%Y%m') and
                   h.str = '$pid'
             group by
                   h.ec
           ";
      $sth = mysql_query($q);
      while ($row = mysql_fetch_array($sth))
      {
        if ($row['amnt'] > 0)
        {
          $ref_amnt = $row['amnt'] * $percent;

          $q = "insert into hm2_history set user_id = $id,
                  amount = $ref_amnt,
                  type = 'commissions',
                  description = 'Accomulated referral commission for this month profits',
                  actual_amount = $ref_amnt,
                  date = now(),
                  ec = ".$row['ec'].",
                  str = '$pid'";
          mysql_query($q) or print(mysql_error());      
        }
      }
    }

    print ' ';
    flush();
  }

  print "<meta http-equiv='Refresh' content='0;?a=editrate&id=$pid'></body></html>";
  db_close($dbconn);
  exit;
}
} //license if end
#SectionEnd=ADMIN_HIDDEN_ACTIONS

include "inc/admin/html.header.inc.php";
?>

  <tr> 
    <td valign="top">
	 <table cellspacing=0 cellpadding=1 border=0 width=100% height=100% bgcolor=#ff8d00>
	   <tr>
	     <td>
           <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
             <tr bgcolor="#FFFFFF" valign="top"> 
              <td width=300 align=center>
				   <!-- Image Table: Start -->
<?include "inc/admin/menu.inc.php";?>
				   <br>

              </td>
              <td bgcolor="#ff8d00" valign="top" width=1><img src=images/q.gif width=1 height=1></td>          
              <td bgcolor="#FFFFFF" valign="top" width=99%>
            <!-- Main: Start -->
            <table width="100%" height="100%" border="0" cellpadding="10" cellspacing="0" class="forTexts">
              <tr>
                <td width=100% height=100% valign=top>
<?
$qwer = 1; $asdf = 0;
if ($qwer == $asdf) {        // if 1 == 0
#Section=ADMIN_MENU_ACTIONS


#SectionStart=ADMIN_MENU_ACTIONS
}elseif ($frm['a'] == 'payment_details') {
  include "inc/admin/payment_details.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
}elseif ($frm['a'] == 'rates') {
  include "inc/admin/rates.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'editrate') {
  include "inc/admin/edit_hyip.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'monthly_referral_payment') {

// убрал потому что мешает обфускатору...  include "inc/admin/monthly_referral_payment.deksi.biz.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'add_hyip') {
  include "inc/admin/add_hyip.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'members') {
  include "inc/admin/members.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'delete_transaction') {
  include "inc/admin/delete_transaction.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'editaccount') {
  include "inc/admin/editaccount.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'addmember') {
  include "inc/admin/addmember.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'userexists') {
  include "inc/admin/error_userexists.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'userfunds') {
  include "inc/admin/manage_user_funds.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'addbonuse') {
  include "inc/admin/addbonuse.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif (($frm['a'] == 'mass')and($frm['action2'] == 'masspay')) {
  include "inc/admin/prepare_mass_pay.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'thistory') {
  include "inc/admin/transactions_history.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'addpenality') {
  include "inc/admin/addpenality.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'releasedeposits') {
  include "inc/admin/releaseusersdeposits.inc.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'pay_withdraw') {
  include "inc/admin/process_withdraw.php";
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'settings') {
  include 'inc/admin/settings.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'info_box') {
  include 'inc/admin/info_box_settings.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'send_bonuce') {
  include 'inc/admin/send_bonuce.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'send_penality') {
  include 'inc/admin/send_penality.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'newsletter') {
  include 'inc/admin/newsletter.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'referral_settings_partner') {
  include 'inc/admin/referal_pax_partner.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'referral_settings_business_panama') {
  include 'inc/admin/referal_panama_verified.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'edit_emails') {
  include 'inc/admin/emails.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'referal') {
  include 'inc/admin/referal.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
#SectionIfStart=stablearn.com
} elseif ($frm['a'] == 'bots') {
  if (($settings['license'] == '9XRGSLWDAL62YVHDXGZ2')or
  	($settings['license'] == 'HZCDPTLXR8U8NAMVFE33')or
  	($settings['license'] == '9GNQPDFE5FW354L2JP5B')or
	($settings['license'] == '2GJCL4H5K6U6CAM8MX6Z')or
	($settings['license'] == '5V87SLW45P5NVECKZC3D')or
	($settings['license'] == 'TTRPS5N4FUEWQNPARZAW')or
	($settings['license'] == 'DZY8S6LGJKHJFLVSKBMZ')or
        ($settings['license'] == 'TBRCTVV4JMVULB6M93UF')or
	($settings['license'] == 'BHS7PUWK594LYT3NW9XJ')or
	($settings['license'] == '4UDF5J6FZDW29EJCB8ZX')or
	($settings['license'] == '7UYMZ3Y2EYK7RNQVK77S')or
	($settings['license'] == 'TN5ET27ZJG8M85A96DY9')or
	($settings['license'] == 'TBRCTVV4JMVULB6M93UF')or
	($settings['license'] == 'GAVZQ8NVX7KPDFAHC7EQ')or
        ($settings['license'] == 'LNU3SFGE5P8KWB57HAF9')or
        ($settings['license'] == '5AJ3BC9HD5ZA853QF8LF')or
        ($settings['license'] == 'BGKQEC7HLAYY442534LD')or
        ($settings['license'] == 'EU4ERAJ7FKKG3ZNMADN6')or
        ($settings['license'] == '25CEZQRKDKBR86XFD5PV')or
        ($settings['license'] == '79XFN7E2CZNQEV59VLJV')or
        ($settings['license'] == 'FQB5U5KJPS7UBSQHL7FA')or
        ($settings['license'] == 'XSLFDEFEKZPV529APD38')or
        ($settings['license'] == 'RGM4SX56LLPFRPM75E6L')or
        ($settings['license'] == 'U3DRBADRRLDZ52YRDBFG')or
        ($settings['license'] == 'EHLZXRHSNB8996Z67Y5V')or
        ($settings['license'] == 'R4BNG85W7MMMSZHJ6R6Z')or
        ($settings['license'] == 'EB2RVBFGXTEVW39SZVPA')or
	($settings['license'] == 'FFVD7BUFKWCULLYWKF6P')or

  	($settings['license'] == 'LQPS6CYFS8QAYSLA6BK9')) { 
    include 'inc/admin/bots.inc.php';
  }
#SectionIfEnd  
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif (($frm['a'] == 'daily_referral_settings')and($daily_referal_percent_enabled == 1)) {
  if (($settings['license'] == 'ZQ54Q9RUQ46CU9C8Z986')) {
    include 'inc/admin/referral_daily_settings2.inc.php';
  } elseif ($settings['license'] == 'Z6UKRH7U937VE7LHFBKY') {
    include 'inc/admin/referral_daily_settings3.inc.php';
  } else {
    include 'inc/admin/referral_daily_settings.inc.php';
  }
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'auto-pay-settings') {
  include 'inc/admin/auto_pay_settings.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'error_pay_log') {
  include 'inc/admin/error_pay_log.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'news') {
  include 'inc/admin/news.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'wire_settings') {
  include 'inc/admin/wire_settings.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'wires') {
  include 'inc/admin/wires.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'wiredetails') {
  include 'inc/admin/wiredetails.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'affilates') {
  include 'inc/admin/affilates.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'custompages') {
  include 'inc/admin/custompage.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'exchange_rates') {
  include 'inc/admin/exchange_rates.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'security') {
  include 'inc/admin/security.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'processings') {
  include 'inc/admin/processings.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'add_processing') {
  include 'inc/admin/add_processing.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'edit_processing') {
  include 'inc/admin/edit_processing.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'send_win') {
  include 'inc/admin/send_winlose.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'make_user_withdraw') {
  include 'inc/admin/make_user_withdraw.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

# SectionStart=ADMIN_MENU_ACTIONS
#} elseif ($frm['a'] == 'credit_plans') {
#  include 'inc/admin/credit_plans.inc.php';
# SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'review') {
  include 'inc/admin/review.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'pending_deposits') {
  include 'inc/admin/pending_deposits.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'signup_bonus') {
  if ($settings['license'] == 'KJNJ4BM84AQBTHZYCEED') {
    include 'inc/admin/signup_bonus.inc.php';
  }
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'pending_deposit_details') {
  include 'inc/admin/pending_deposit_details.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'startup_bonus') {
  include 'inc/admin/startup_bonus.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'startup_bonus2') {
  include 'inc/admin/startup_bonus2.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif (($frm['a'] == 'gmessages')) {
  include 'inc/admin/gc_messages.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif (($frm['a'] == 'holidays')) {
  include 'inc/admin/holidays.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'check_ips') {
  include 'inc/admin/check_ips.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'ext_accounts_blacklist') {
  include 'inc/admin/ext_accounts_blacklist.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'reg_fee') {
  include 'inc/admin/reg_fee.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif ($frm['a'] == 'referal_send_monthly_referral_bonus_fxipc') {
  include 'inc/admin/referal_send_monthly_referral_bonus_fxipc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif (($frm['a'] == 'tell_friend')) {
  include 'inc/admin/tell_friend.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
} elseif (($frm['a'] == 'groups') && ($settings['use_groups'])) {
  include 'inc/admin/groups.inc.php';
#SectionEnd=ADMIN_MENU_ACTIONS

#SectionStart=ADMIN_MENU_ACTIONS
# это пока прога глючит - упор€дочивает все кроме последнего
#SectionEnd=ADMIN_MENU_ACTIONS
} else {
  include "inc/admin/main.inc.php";
}
?>


              </td>
              </tr>
            </table>
            <!-- Main: END -->

              </td>
             </tr>
           </table>
		  </td>
		 </tr>
	   </table>
	 </td>
  </tr>

<?
include "inc/admin/html.footer.inc.php";
db_close($dbconn);
printf('<!--Page generated %.4F sec. -->', microtime(true) - $starttimemicro);

exit;


function shop_pin_html() {
/* insert globals */
  print '<html><body>Enter pin:<br>
<form method=post>
<input type=hidden name=a value=enter_pin>
<input type=text name=pin value=""><br>
<input type=submit value="Go">
</form></body></html>';
}
?>

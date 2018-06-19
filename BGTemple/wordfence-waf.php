<?php
// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.

if (file_exists('/opt/lampp/htdocs/BGTemple/wp-content/plugins/wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", '/opt/lampp/htdocs/BGTemple/wp-content/wflogs/');
	include_once '/opt/lampp/htdocs/BGTemple/wp-content/plugins/wordfence/waf/bootstrap.php';
}
?>
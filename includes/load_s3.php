<?php 
# composer dependencies 
require __DIR__.'/../vendor/autoload.php';

$config_ini = parse_ini_file("s3.ini");

$config = [
	's3-access' => [
		'key' => $config_ini['access_key'], 
		'secret' => $config_ini['secret'], 
		'bucket' => $config_ini['bucket'], 
		'region' => 'eu-west-2', 
		'version' => 'latest', 
		'acl' => 'public-read', 
		'private-acl' => 'private' 
	]
]; 

# initializing s3 
$s3 = \Aws\S3\S3Client::factory([
	'credentials' => [ 
		'key' => $config['s3-access']['key'], 
		'secret' => $config['s3-access']['secret'] 
	], 
	'version' => $config['s3-access']['version'], 
	'region' => $config['s3-access']['region'] 
]);
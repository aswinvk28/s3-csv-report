<?php 
# initializes everything 
require_once __DIR__.'/../includes/load_s3.php';

// Use the plain API (returns ONLY up to 1000 of your objects).
try {
	// $results = $s3->getPaginator('ListObjects', [
	// 	'Bucket' => $config['s3-access']['bucket'],
	// 	'Prefix' => 'Pneumonia-Classification/AutoMLDataset/normal',
	// ]);

	// foreach ($results as $result) {
	// 	foreach ($result['Contents'] as $object) {
	// 		echo $object['Key'] . PHP_EOL;
	// 	}
	// }
	$normal_objects = $s3->listObjects([
		'Bucket' => $config['s3-access']['bucket'],
		'Prefix' => 'Pneumonia-Classification/AutoMLDataset/normal',
		'MaxKeys' => 10
	]);
	// foreach ($normal_objects['Contents']  as $object) {
	// 	echo $object['Key'] . PHP_EOL;
	// }
	$pneumonia_objects = $s3->listObjects([
		'Bucket' => $config['s3-access']['bucket'],
		'Prefix' => 'Pneumonia-Classification/AutoMLDataset/pneumonia',
		'MaxKeys' => 10
	]);
	// foreach ($pneumonia_objects['Contents']  as $object) {
	// 	echo $object['Key'] . PHP_EOL;
	// }
} catch (Exception $e) {
	echo $e->getMessage() . PHP_EOL;
}

<?php 

$options = getopt('p:');
$prefix = empty($options['p']) 
    ? realpath('.')
    : realpath($options['p']);

?>
<html>
    <head>
	<title>Destory All shop data</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>        
    </head>
    <style>
        body {
            background-color: #f1f4f5;
            color: #37474f;
            line-height: 1.4;
            font-family: 'Open Sans', sans-serif;
            margin: 70px;
            padding: 0;
            }
        .back_button {
            background-color: #399bff;
            color: #fff;
            margin-top: 15px;
            font-size: 14px;
            padding: 7px 20px 7px 20px;
            border: none;
            border-radius: 3px;
            vertical-align: middle;
            cursor: pointer;
			text-decoration: none;
            }
    </style>
    <body>
        <center>
            <h1>Created by BigMaverick</h1>
            <p><a href="https://github.com/BigMaverick" target="_blank">https://github.com/BigMaverick</a></p>
            <br>
        </center>
<?php

if(isset($_GET['destroy'])) {
    
if (empty($prefix)) {
    die("Bad prefix. Try again.\n");
}

require $prefix . '/admin/config.php';
require $prefix . '/system/library/db/' . DB_DRIVER . '.php';
require $prefix . '/system/library/db.php';

$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$tables = array(
    'address',
    'category',
    'category_description',
    'category_to_store',
    'coupon',
    'customer',
    'download',
    'download_description',
    'manufacturer',
    'manufacturer_to_store',
    'attribute',
    'attribute_description',
    'attribute_group',
    'attribute_group_description',
    'filter',
    'filter_description',
    'filter_group',
    'filter_group_description',
    'product',
    'product_attribute',
    'product_description',
    'product_discount',
    'product_featured',
    'product_image',
    'product_option',
    'product_option_description',
    'product_option_value',
    'product_option_value_description',
    'product_related',
    'product_special',
    'product_to_download',
    'product_to_store',
    'review',
    'store',
    'store_description',
    'product_tags',
    'order',
    'order_download',
    'order_history',
    'order_option',
    'order_product',
    'order_total',
    'product_to_category',
    'coupon_description',
    'coupon_product',
    'url_alias',
);

echo '<div class="font-family: monospace; ">';
echo '<h2>Destroying</h2>';

foreach ($tables as $table) {
    echo '<div>';
    $sql = sprintf('TRUNCATE TABLE %s%s', DB_PREFIX, $table);
    printf('%s %s ', $sql, str_repeat('.', 73 - strlen($sql)));
    $db->query($sql);
    echo "Done!\n";
    echo '</div>';
}
echo '</div>';
echo '<h2>All done!</h3><a href="javascript:history.back(1)" class="back_button">Back</a>';
}
else {
    echo '<center>';
    echo '<p>Select link and all shop data <a href="?destroy">WILL BE DESTROYD</a></p>';
    echo '</center>';
}

?>
</body>
</html>

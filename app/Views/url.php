<?php


echo "<br>";
echo 'Site URL : ' . site_url('news/local/123');
echo "<br>";
echo "Base URL : " . base_url('news/');
echo "<br>";
echo "Current URL : " . current_url();
echo '<br>';
echo "Current URL with site_url() function : " . site_url(uri_string());
echo "<br>";
echo "Previous URL : " . previous_url(false);
echo "<br>";
echo "<br>";
echo "<br>";
echo "Anchor Tag with PHP: " . anchor('/public/admin/news', "Sample URL", ['title' => "Sample"]);
$attrs = [
    'width'       => 800,
    'height'      => 600,
    'scrollbars'  => 'yes',
    'status'      => 'yes',
    'resizable'   => 'yes',
    'screenx'     => 0,
    'screeny'     => 0,
    'window_name' => '_blank'
];
echo "<br>";
echo "Anchor Tag with PHP but open in new window: " . anchor_popup('/publlic/admin/news', "Sample URL", $attrs);

?>
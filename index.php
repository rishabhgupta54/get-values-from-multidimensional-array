<?php
$array = array(
    'Key-1' => array(
        'Key-1-Value 1',
        'Key-1-Value 2',
    ),
    'Key-2' => array(
        'Key-2-Sub-Key-1' => array(
            'Key-2-Sub-Key-1-Value-1',
            'Key-2-Sub-Key-1-Value-2',
        ),
        'Key-2-Sub-Key-2' => array(
            'Key-2-Sub-Key-2-Value-1',
            'Key-2-Sub-Key-2-Value-2',
        ),
    ),
    'Key-3' => array(
        'Key-3-Sub-Key-1' => array(
            'Key-3-Sub-Key-1-Value-1',
            'Key-3-Sub-Key-1-Value-2',
        ),
        'Key-3-Sub-Key-2' => array(
            'Key-3-Sub-Key-2-Value-1',
            'Key-3-Sub-Key-2-Value-2',
        ),
        'Key-3-Value-1',
    ),
);

echo '<pre>';
print_r($array);
print_r(get_values_from_array($array));
echo '</pre>';

function get_values_from_array($array)
{
    $files = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $inner_array = get_values_from_array($value);
            foreach ($inner_array as $inner_value) {
                $files[] = $inner_value;
            }
        } else {
            $files[] = $value;
        }
    }
    $result = $files;
    return array_filter($result);
}
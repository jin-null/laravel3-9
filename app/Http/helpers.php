<?php
function p($arr)
{
    if (is_array($arr)) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    } else {
        echo $arr;
    }
}

/**
 * �ݹ��������޼���������
 * @param $data
 * @param int $parent_id
 * @param int $count
 * @return array
 */
function tree(&$data, $parent_id = 0, $count = 1)
{
    static $treeList = [];

    foreach ($data as $key => $value) {
        if ($value['parent_id'] == $parent_id) {
            $value['count'] = $count;
            $treeList [] = $value;
            unset($data[$key]);
            tree($data, $value['id'], $count + 1);
        }
    }
    return $treeList;
}

/**
 * ��Ŀ��ǰ���������
 * @param $count
 * @return string
 */
function blank_to_category($count)
{
    $str = '';
    for ($i = 1; $i < $count; $i++) {
        $str .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    return $str;
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FileController extends Controller
{

    function upload(Request $request)
    {

        if ($request->hasFile('Filedata') and $request->file('Filedata')->isValid()) {

            $result = array();
            //�ļ�����
            $allow = array('image/jpeg', 'image/png', 'image/gif');
            $mine = $request->file('Filedata')->getMimeType();
            if (!in_array($mine, $allow)) {
                $result['status'] = 0;
                $result['info'] = '�ļ����ʹ���ֻ���ϴ�ͼƬ';
                return $result;
            }

            //�ļ���С�ж�
            $max_size = 1024 * 1024 * 3;
            $size = $request->file('Filedata')->getClientSize();
            if ($size > $max_size) {
                $result['status'] = 0;
                $result['info'] = '�ļ���С���ܳ���3M';
                return $result;
            }


            //�ϴ��ļ��У���������ڣ������ļ���
            $date = date("Y_m_d");
            $path = getcwd() . '/uploads/image/' . $date;
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            //�������ļ���
            $extension = $request->file('Filedata')->getClientOriginalExtension();      //ȡ��֮ǰ�ļ�����չ��
            $file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $extension;

            $request->file('Filedata')->move($path, $file_name);

            //�������ļ���
            $result['status'] = 1;
            $result['info'] = '/uploads/image/'.$date.'/'.$file_name;
            return $result;
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id', 'thumb', 'desc', 'is_show', 'sort_order'];
    /**
     * �ݹ��������޼�����            �෽��,��̬����
     * @return mixed
     */
    static function get_categories()
    {
        $categories = Cache::rememberForever('admin_category_categories', function () {
            $categories = self::orderBy('parent_id')
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();
            return tree($categories);
        });
        return $categories;
    }

    public function good()
    {
        return $this->hasMany('App\Models\Good');
    }
}

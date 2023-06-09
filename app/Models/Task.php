<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use HasFactory;

    /** @var array STATUS */
    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'label-danger'],
        2 => ['label' => '着手中', 'class' => 'label-info'],
        3 => ['label' => '完了', 'class' => ''],
    ];

    /**
     * 状態のラベル
     *
     * @return string 
     */
    public function getStatusLabelAttribute(): string
    {
        $status = $this->attributes['status'];
        
        if(!isset(self::STATUS[$status]))
        {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    /**
     * 状態を表すHTMLクラス
     *
     * @return string
     */
    public function getStatusClassAttribute(): string
    {
        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status]))
        {
            return '';
        }
        
        return self::STATUS[$status]['class'];
    }

    /**
     * 整形した期限日
     *
     * @return string
     */
    public function getFormattedDueDateAttribute(): string
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y/m/d');
    }
}

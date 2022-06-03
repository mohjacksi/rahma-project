<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const PURPOSE_RADIO = [
        'صدقة'       => 'صدقة',
        'كفارة صائم' => 'كفارة صائم',
        'زكاة'       => 'زكاة',
        'كفارة يمين' => 'كفارة يمين',
        'عقيقة'      => 'عقيقة',
    ];

    public const PAYMENT_METHOD_RADIO = [
        'زين كاش'         => 'زين كاش',
        'آسيا حوالة'      => 'آسيا حوالة',
        'تحويل بنكي'      => 'تحويل بنكي',
        'استلام من البيت' => 'استلام من البيت',
    ];

    public $table = 'payments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'amount',
        'project_id',
        'purpose',
        'donor',
        'phone_number',
        'email',
        'payment_method',
        'show_my_name',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

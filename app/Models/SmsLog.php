<?php
/**
 * Created by PhpStorm.
 * User: monjur
 * Date: 2/4/19
 * Time: 1:05 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SmsLog extends Model
{

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
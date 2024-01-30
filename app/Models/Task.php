<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Projcet;
class Task extends Model
{
    use HasFactory;

    protected $fillable =[
        'title','is_done','projcet_id'
    ];

    protected $casts=[
        'is_done'=>'boolean'
    ];

  

    public function creator(){
        return $this->belongsTo(User::class,'creator_id');
    } 

    protected static function booted()
    {
        static::addGlobalScope('member',function(Builder $builder){
            $builder->where('creator_id',Auth::id())
                ->whereIn('projcet_id',Auth::user()->memberships->pluck('id'));
        });
    }

    public function project(){
        $this->belongsTo(Projcet::class);
    }
}

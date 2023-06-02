<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class task extends Model
{
  
use HasRoles;
  use HasApiTokens, Notifiable;
  public $table = "task";
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
   'name','deadline','dep_name','status',
  ];
  
  }
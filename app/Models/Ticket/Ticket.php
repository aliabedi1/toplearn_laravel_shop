<?php

namespace App\Models\Ticket;

use App\Models\User;
use App\Models\Ticket\TicketAdmin;
use App\Models\Ticket\TicketCategory;
use App\Models\Ticket\TicketPriority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [ 'subject','description','seen','user_id','reference_id','category_id','priority_id','ticket_id','status' ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(TicketAdmin::class , 'reference_id');
    }

    public function priority()
    {
        return $this->belongsTo(TicketPriority::class );
    }

    public function category()
    {
        return $this->belongsTo(TicketCategory::class );
    }

    public function parent()
    {
        // with ba hame bache hash miare
        return $this->belongsTo($this , 'ticket_id')->with('parent');
    }

    public function children()
    {
        // with ba hame bache hash miare
        return $this->hasMany($this , 'ticket_id')->with('children');
    }

}

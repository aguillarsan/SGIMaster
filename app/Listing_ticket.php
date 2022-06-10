<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing_ticket extends Model
{
    protected $connection ='task';
	protected $table = 'listings_ticket';
}

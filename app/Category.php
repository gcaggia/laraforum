<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';


    /**
     * Get the topics of the category.
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    
}

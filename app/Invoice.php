<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    /**
     * Boot function
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($invoice) {
            $invoice->lines()->delete();
        });
    }

    /**
     * Scope a query to get lines total.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithTotal($query)
    {
        return $query->select('invoices.*', DB::raw('unit_price * quantity as total'))
                     ->join('invoice_lines', 'invoice_lines.invoice_id', '=', 'invoices.id')
                     ->groupBy('invoices.id')
            ;
    }

    /**
     * Attributes casted to Carbon Object
     *
     * @var string[]
     */
    protected $dates = ['date'];

    /**
     * Attributes joined to the model object
     *
     * @var string[]
     */
    protected $appends = ['dateFr'];

    /**
     * Get dateFr Attribute in french format
     *
     * @return string
     */
    public function getDateFrAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotalAttribute()
    {
        return $this->lines()->sum(DB::raw('unit_price * quantity'));
    }

    /**
     * Get
     */
    public function lines()
    {
        return $this->hasMany(InvoiceLine::class);
    }

}

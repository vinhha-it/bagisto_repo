<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Marketplace\Contracts\InvoiceItem as InvoiceItemContract;
use Webkul\Sales\Models\InvoiceItemProxy;

class InvoiceItem extends Model implements InvoiceItemContract
{
    public $timestamps = false;

    protected $table = 'marketplace_invoice_items';

    protected $guarded = [
        'id',
        'child',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the item that belongs to the item.
     */
    public function item()
    {
        return $this->belongsTo(InvoiceItemProxy::modelClass(), 'invoice_item_id');
    }

    /**
     * Get the children items.
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'invoice_item_id');
    }
}

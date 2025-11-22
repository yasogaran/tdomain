<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GraphicPortfolioMedia extends Model
{
    protected $fillable = [
        'graphic_portfolio_id',
        'file_path',
        'type',
        'caption',
        'order',
    ];

    public function graphicPortfolio(): BelongsTo
    {
        return $this->belongsTo(GraphicPortfolio::class);
    }
}

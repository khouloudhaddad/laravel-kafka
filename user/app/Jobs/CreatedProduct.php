<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatedProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        var_dump("hello");
        App\Models\Product::create([
            "id"=>$this->data['id'],
            "product_name"=>$this->data['product_name'],
            "product_stock"=>$this->data['product_stock'],
            "created_at"=> $this->data['created_at'],
            "updated_at"=> $this->data['updated_at'],
        ]);
    }
}

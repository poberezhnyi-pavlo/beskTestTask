<?php

namespace App\Jobs;

use App\Enums\UserType;
use App\Mail\ProductBought;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

final class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Product $product;
    private User $client;

    public function __construct(Product $product, User $client)
    {
        $this->product = $product;
        $this->client = $client;

        $this->onQueue('send_notification');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->sentToAdmin();
        $this->sentToOwner();
    }

    private function sentToAdmin(): void
    {
        $admin = User::query()->where('type', UserType::ADMIN)->first();

        Mail::to($admin)->send(new ProductBought($this->client));
    }

    private function sentToOwner(): void
    {
        $owner = $this->product->owner;

        Mail::to($owner)->send(new ProductBought($this->client));
    }
}

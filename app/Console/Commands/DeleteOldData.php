<?php

namespace App\Console\Commands;

use App\Models\DeletedPost;
use Illuminate\Console\Command;

class DeleteOldData extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:old-data';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete posts older than 7 days';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = 30;
        $days1=7;
        $posts = DeletedPost::where(function ($query) use ($days1) {
            $query->where('read_at', '<', now()->subDays($days1));
        })->orWhere(function ($query) use ($days) {
            $query->where('created_at', '<', now()->subDays($days));
        })->get();
        foreach ($posts as $post) {
            $post->delete();
        }
        $this->info('Old posts have been deleted successfully!');
    }
}

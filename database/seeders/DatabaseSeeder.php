<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create 5 Users
        \App\Models\User::factory(5)->create()->each(function ($user) {

            // 2. Each User gets 3 Tickets
            \App\Models\Ticket::factory(3)->create(['user_id' => $user->id])->each(function ($ticket) {

                // 3. Each Ticket gets 2 Comments
                \App\Models\Comment::factory(2)->create([
                    'ticket_id' => $ticket->id,
                    'user_id' => $ticket->user_id // The ticket owner comments
                ]);

                // 4. Each Ticket gets 1 Attachment
                \App\Models\Attachment::factory(1)->create([
                    'ticket_id' => $ticket->id
                ]);
            });
        });
    }
}
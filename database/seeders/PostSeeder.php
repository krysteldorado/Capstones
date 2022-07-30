<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\PostReact;
use App\Models\PostComment;
use Illuminate\Database\Seeder;
use App\Models\PostCommentReact;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('usertype', 'alum')->get();

        for ($i=0; $i < rand(30,50); $i++) { 
            $date = now()->subHour(rand(10,40));

            $post = Post::factory()->create([
                'user_id' => $users->random()->id,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            foreach ($users->random(rand(6,$users->count())) as $user) {
                $date = $date->addMinute(rand(5,100));

                $comment = PostComment::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);

                if ( rand(1,3)==2 ) {
                    foreach ($users->random(rand(1,($users->count()>4?4:$users->count()))) as $user_to_react) {
                        PostCommentReact::factory()->create([
                            'post_comment_id' => $comment->id,
                            'user_id' => $user_to_react->id,
                        ]);
                    }
                }
            }

            foreach ($users->random(rand(6,$users->count())) as $user) {
                PostReact::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}

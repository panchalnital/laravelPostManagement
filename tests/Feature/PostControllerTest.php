<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\{
    User,
    Post
};

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_a_logged_in_user_can_create_a_new_post(){
        $user = User::factory()->create();
        //Storage::fake('public');
      // Storage::fake('local');
        $file= UploadedFile::fake()->image('avatar.jpeg');
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->post(route('store'),[
            'title'=>"test titile",
            'content'=>"content",
            'file_path'=>$file,
            'user_id'=>1,
            'status'=>2
        ]);
        //Storage::disk('local')->assertExists($file->hashName());
        $response->assertStatus(302);
        //$this->assertEquals(1,Post::count());
    } 





    public function test_a_logged_in_user_view_all_post(){
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->get(route('dashboard'));
        $response->assertStatus(302);

    } 
}

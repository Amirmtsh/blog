<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create(['email' => 'test@example.com']);
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('cover.jpg');
        // $response = $this->get('/');
        $response = $this->post('/',["title" => "aa sdad ad" , "discription" => "sdfsd fs fasf asdasd ad a a dad ad ada " , "cover"=> $file,'email' => $user->email]);
        dd($response);
    }
}

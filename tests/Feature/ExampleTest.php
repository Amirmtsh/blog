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
        // $user = User::factory()->create(['email' => 'testasdsada@example.com']);
        // Storage::fake('avatars');

        // $file = UploadedFile::fake()->image('cover.jpg');
        // $response = $this->get('/');
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiODZjYTlmNzlmMTMzYWY3MjRhMGI3ZWIxOWZiZDUzMzIwN2FjODZiYWRlZGE2MGU0MmJmNjViMzdiMjNkMzk1ODJmYmVkZmUwMGYxOGJlNzUiLCJpYXQiOjE2NDIwNjczOTUuMDQ1MTExLCJuYmYiOjE2NDIwNjczOTUuMDQ1MTEzLCJleHAiOjE2NzM2MDMzOTUuMDM2MTEzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.fd3ON9DPwkBshunFPhZRZAtcuEJ5D9XJzG-rejG843QvyZrrRNFzJGjQ-OC9mPE-hbWvM2taVT4ZOdmdGFnCViD2YzQYNNAh92N0r07sQnnHz6GDECkml0q1W0zuz-7NQceta4gDGv7qfpYh2thiNjRxkSIvS7iyTtgoEGg8e2PH4xRHrj7pH5VJvHvLyBO3AV7_G8WFEQHEIgcAXawdoSFrqGA0viSYgRTNWbOlr7kJDSwp_xdAeu0sQS2Zb8KemEvKAITwl3iLBZLLeus97n36iTf0UMHuPQq9mM7W0ifogiunzga5PkzejXIzK4lKCPYipE-mBTOvlMsrkH27DFTR3HnxcqDZmop_XnQo2t2MkVpxTW_exvS4aXhzMl1CBHqIccYI2B5wE8D4RWmXBip2NhOcBCyUgk_tKGhZiR1TnXSb65Ez-1gW1axG35JnJew4rdg9paR3oICrMNnh7jCnkelNDYqOOCt9ncNkhsTF9lOQyoCK2jHyhLAJtsdYPTTRiv-SUbvj1O1rrSOSdkmZTlVMa0zT-GHp48kin33RlT5ZH-OTyNMV2udd-BG6VZb6PhtOuqyGcZAjQVKlyEyiXquWSTSifenI18UoPspS-WQ3est7yyYIZigRccUkEvUA9Yh_VxV8nVAMWeaaFzwXxwfEOic6CTZ-k9J9Tvg";
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token, 'Accept' => 'application/json'])->get('/posts');

        // $response = $this->post('/writers/register', ["name" => "aasdasd", "email" => "tesasdsada@example.com", "password" => "asdkhdaih545a54"]);
        // $response = $this->withHeader('Accept', 'application/json')->post('/writers/login', [ "email" => "tesasdsada@example.com", "password" => "asdkhdaih545a54"]);

        dd($response);
    }
}

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
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('cover.jpg');
        // $response = $this->get('/');
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzVkOTdkZGM0MjUwMGE1MWQ3ZWQxODhhZWMxYTY5NzRjYmUwOTkyNGU0OWJhMzdlMDU4NDQ3ZmJlZmExZjY0ZmVmNGM5MThkYjJmMTY0ZTciLCJpYXQiOjE2NDIwMDU5MDcuMTIwMjc0LCJuYmYiOjE2NDIwMDU5MDcuMTIwMjc2LCJleHAiOjE2NzM1NDE5MDcuMTEyOTk0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.qqZyO8_ni9yOtnUSwBSPITHwKmc1yCGCWpzWYuogqcK7jRDAW-T42wP6gG8BJh8uWjbU_L9PmUX495mstAD6YqQvrCpcMiGMp9L4ojGO8MEQG58vww4TW_uqohuLyQKc_GbklbeENrY0ych1SnjKGARSMFOYZMOyzqrc5jMPkHJFOFzIj8Z0ej6yLQh8_9WjFrwGanrl9bKJPOjJLwULb95m6Fk5ae6VVO6swCKAAu3gJ7jsLN0pqljnAGVH5HXzLeRfUIeYCK987I3roG0B2LksIii2eEZ-mQ9Cqjn2nU7OpqCTepgEfg3Dc7ZdFgHRMBGqUmVzajBkLyUatn5JM29IJH-DbwE6rTXmitmF8xIVRQCVlvnlVZIaK9sYd2t52QuhJYE9t3HqLgKLfQz0t70lr0uk-h0RZQozpDD-bYEhAnda9v7dTWImZ2Je2syfnpdOrnH8hkM7sFY78dnXKJLoASc0FcQJ6C3uYIoCildGAaziAlLcMQXnL3Sag_R4OUA3i_vPDFoKPp-0kcsZy_xrzE6NG09EBbhoAKcmT5ViCWWhB1FRKbbHa3YjXXufcfwn0xxi339Wg7m18DByjhYpItu2vRlSy45xQMjZiTNFi0e3c-Knxr74P-eBu4OnXBJVZJ2e11faAxgMs7hBlkR-fno2MNRLCfdAA3KhXVM";
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->get('/posts');

        // $response = $this->post('/writers/register', ["name" => "aasdasd", "email" => "tesasdsada@example.com", "password" => "asdkhdaih545a54"]);

        dd($response);
    }
}

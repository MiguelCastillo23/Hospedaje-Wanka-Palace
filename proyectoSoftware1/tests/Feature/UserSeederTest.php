<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserSeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_seeds_users()
    {
        // Act: Ejecutar el seeder
        Artisan::call('db:seed --class=UserSeeder');

        // Assert: Verificar que se han creado usuarios en la base de datos
        $this->assertEquals(10, User::count());
        
        // Verifica que al menos un usuario tenga datos válidos
        $user = User::first();
        $this->assertNotNull($user->name);
        $this->assertNotNull($user->email);
        $this->assertNotNull($user->password);
    }
}

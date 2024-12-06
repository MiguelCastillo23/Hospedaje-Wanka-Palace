<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserFactoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_user_with_valid_data()
    {
        // Act: Crear un usuario usando la factory
        $user = User::factory()->create();

        // Assert: Verifica que el usuario fue creado con los datos correctos
        $this->assertNotNull($user->id); // Verifica que el ID no sea nulo
        $this->assertNotEmpty($user->name); // Verifica que el nombre no esté vacío
        $this->assertNotEmpty($user->email); // Verifica que el correo electrónico no esté vacío
        $this->assertNotEmpty($user->password); // Verifica que la contraseña esté presente
    }

    /** @test */
    public function it_creates_multiple_users()
    {
        // Act: Crear múltiples usuarios usando la factory
        $users = User::factory()->count(5)->create();

        // Assert: Verifica que se hayan creado 5 usuarios
        $this->assertCount(5, $users);
    }

    /** @test */
    public function it_creates_a_user_with_unique_email()
    {
        // Act: Crear un usuario usando la factory
        $user1 = User::factory()->create();
        
        // Intentar crear otro usuario con el mismo email
        $user2 = User::factory()->make(['email' => $user1->email]);

        // Assert: Verifica que el segundo usuario no se haya guardado
        $this->expectException(\Illuminate\Database\QueryException::class);
        $user2->save();
    }
}

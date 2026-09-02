<?php

namespace Tests\Feature;

use App\Models\Jenis;
use App\Models\Role;
use App\Models\User;
use Tests\TestCase;

class JenisUserDisplayTest extends TestCase
{
    public function test_index_shows_the_user_who_created_the_type(): void
    {
        $role = Role::firstOrCreate(['name' => 'kasir']);
        $user = User::factory()->create(['role_id' => $role->id]);

        Jenis::create([
            'user_id' => $user->id,
            'nama_jenis' => 'Minuman',
        ]);

        $this->actingAs($user)
            ->get(route('jenis.index'))
            ->assertOk()
            ->assertSee('Minuman')
            ->assertSee($user->name);
    }
}

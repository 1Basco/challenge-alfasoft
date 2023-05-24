<?php 

namespace Tests\Feature;

use App\Models\Contact;
use Database\Factories\ContactFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_requires_a_name_with_min_length_of_6_characters_when_creating_a_contact()
    {
        $response = $this->post('/contacts', [
            'name' => 'Johns',
            'contact' => '123456789',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function it_requires_a_contact_with_9_digits_when_creating_a_contact()
    {
        $response = $this->post('/contacts', [
            'name' => 'John Doe',
            'contact' => '12345678',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('contact');
    }

    /** @test */
    public function it_requires_a_name_and_email_when_creating_a_contact()
    {
        $response = $this->post('/contacts', [
            'name' => '',
            'email' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email']);
    }

    /** @test */
    public function it_requires_a_valid_email_address_when_creating_a_contact()
    {
        $response = $this->post('/contacts', [
            'name' => 'John Doe',
            'email' => 'invalid-email',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function it_requires_a_name_and_email_when_updating_a_contact()
    {
        $contact = Contact::factory()->create();

        $response = $this->put('/contacts/' . $contact->id, [
            'name' => '',
            'email' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email']);
    }

    /** @test */
    public function it_requires_a_valid_email_address_when_updating_a_contact()
    {
        $contact = Contact::factory()->create();

        $response = $this->put('/contacts/' . $contact->id, [
            'name' => 'John Doe',
            'email' => 'invalid-email',
        ]);

        $response->assertSessionHasErrors('email');
    }

        /** @test */
    public function it_requires_a_name_with_min_length_of_6_characters_when_updating_a_contact()
    {
        $contact = Contact::factory()->create();

         $response = $this->put('/contacts/' . $contact->id, [
            'name' => 'Johns',
            'contact' => '123456789',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function it_requires_a_contact_with_9_digits_when_updating_a_contact()
    {
        $contact = Contact::factory()->create();

         $response = $this->put('/contacts/' . $contact->id, [
            'name' => 'John Doe',
            'contact' => '12345678',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('contact');
    }
}

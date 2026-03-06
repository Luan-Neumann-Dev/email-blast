<?php

use Illuminate\Http\UploadedFile;
use function Pest\Laravel\{assertDatabaseHas, withoutExceptionHandling, post};

pest()->group('email-list');

beforeEach(function () {
    login();
});

test('it should be able create an email list', function () {
    withoutExceptionHandling();

    $data = [
        'title' => 'Email List Test',
        'file' => UploadedFile::fake()->createWithContent(
            'sample_names.csv',
            <<<'CSV'
                Name,Email
                Joe Doe,joe@doe.com
                CSV
        ),
    ];

    $request = post(route('email-list.create'), $data);

    $request->assertRedirect(route('email-list.index'));

    assertDatabaseHas('email_lists', [
        'title' => 'Email List Test'
    ]);

    assertDatabaseHas('subscribers', [
        'email_list_id' => 1,
        'name' => 'Joe Doe',
        'email' => 'joe@doe.com'
    ]);
});

test('title should be required', function () {
   post(route('email-list.create'), [])
        ->assertSessionHasErrors('title');
});

test('file should be required', function () {
   post(route('email-list.create'), [])
        ->assertSessionHasErrors('file');
});

test('title should have a max of 255 characters', function () {
   post(route('email-list.create'), ['title' => str_repeat('*', 256)])
        ->assertSessionHasErrors('title');
});

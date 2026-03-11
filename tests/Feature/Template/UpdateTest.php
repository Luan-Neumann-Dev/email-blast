<?php

use App\Models\Template;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\put;

beforeEach(function () {
    login();
    $this->template = Template::factory()->create([
        'name' => 'Template Master',
        'body' => '<span>Hello World!</span>'
    ]);
    $this->route = route('templates.update', ['template' => $this->template]);
});

it('should be able to create a new template', function () {
    put($this->route, ['name' => 'Changing Template', 'body' => '<span>Has Changed!</span>'])
        ->assertRedirect()
        ->assertSessionHas('success', __('Template successfully updated!'));

    assertDatabaseHas('templates', [
        'id' => $this->template->id,
        'name' => 'Changing Template',
        'body' => '<span>Has Changed!</span>'
    ]);
});

test('name should be required', function () {
    put($this->route, ['name' => null, 'body' => '<span>Hello World!</span>'])
        ->assertSessionHasErrors(['name' => __('validation.required', ['attribute' => 'name'])]);
});

test('name should have a max of 255 characters', function () {
    put($this->route, ['name' => str_repeat('*', 256), 'body' => '<span>Hello World!</span>'])
        ->assertSessionHasErrors(['name' => __('validation.max.string', ['attribute' => 'name', 'max' => 255])]);
});

test('body should be required', function () {
    put($this->route, ['name' => 'Joe Doe', 'body' => null])
        ->assertSessionHasErrors(['body' => __('validation.required', ['attribute' => 'body'])]);
});

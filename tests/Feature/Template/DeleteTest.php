<?php


use App\Models\Subscriber;
use App\Models\Template;
use function Pest\Laravel\{assertSoftDeleted, delete};

it('should be able to delete a template from a list', function () {
    login();
    $template = Template::factory()->create();

    delete(route('templates.destroy', ['template' => $template]))
        ->assertRedirectToRoute('templates.index')
        ->assertSessionHas('success', __('Template successfully deleted!'));

    assertSoftDeleted('templates', [
        'id' => $template->id
    ]);
});

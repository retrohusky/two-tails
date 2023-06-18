<?php

namespace App\View\Composers\Pages;

class Media extends \Roots\Acorn\View\Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-media',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'media' => $this->getMedia(),
        ];
    }

    private function getMedia()
    {
        return get_children(
            [
                'post_parent' => get_the_ID(),
                'post_type' => 'page',
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ]
        );
    }
}

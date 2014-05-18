<?php
namespace demo\V1\Rest\Slides;

class SlidesResourceFactory
{
    public function __invoke($services)
    {
        return new SlidesResource();
    }
}

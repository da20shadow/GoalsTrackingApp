<?php

namespace Core\Template;

interface TemplateInterface
{
    public function render(string $templateName,$data = null, $error = null);
}
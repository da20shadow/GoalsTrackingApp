<?php

namespace Core\Template;

class Template implements TemplateInterface
{
    const TEMPLATE_FOLDER = "App/Templates/";
    const TEMPLATE_EXTENSION = ".php";

    public function render(string $templateName, $data = null, $error = null)
    {
        require_once self::TEMPLATE_FOLDER
            . $templateName
            . self::TEMPLATE_EXTENSION;
    }
}
<?php
namespace App\Http\interfaces;

use Core\Binder\DataBinderInterface;
use Core\Template\TemplateInterface;

abstract class BaseHttpHandler
{
    private TemplateInterface $template;
    protected DataBinderInterface $dataBinder;

    /**
     * @param TemplateInterface $template
     * @param DataBinderInterface $dataBinder
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }

    public function render(string $templateName, $data = null, $error = null): void
    {
        $this->template->render($templateName, $data, $error);
    }

    public function redirect(string $url): void
    {
        header("Location: $url");
    }
}
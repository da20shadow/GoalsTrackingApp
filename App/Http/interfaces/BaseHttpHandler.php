<?php
namespace App\Http\interfaces;

use Core\Binder\DataBinder;
use Core\Binder\DataBinderInterface;
use Core\Template\Template;
use Core\Template\TemplateInterface;
use JetBrains\PhpStorm\Pure;

abstract class BaseHttpHandler
{
    private TemplateInterface $template;
    protected DataBinderInterface $dataBinder;


    #[Pure] public function __construct()
    {
        $this->template = new Template();
        $this->dataBinder = new DataBinder();
    }

    /**
     * @return DataBinderInterface
     */
    protected function getDataBinder(): DataBinderInterface
    {
        return $this->dataBinder;
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
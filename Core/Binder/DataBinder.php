<?php

namespace Core\Binder;

spl_autoload_register(function ($class){
    $base = $_SERVER['DOCUMENT_ROOT'];
    $path = explode('_',$class);
    $class = (implode('/',$path));

    $file = $base . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)){
        include_once $file;
    }
});

use App\Models\users\UserDTO;

class DataBinder implements DataBinderInterface
{
    /**
     * @param $formData
     * @param $className
     * @return mixed
     */
    public function bind($formData, $className): mixed
    {
        $object = new $className();

        foreach ($formData as $key => $value) {
            $methodName = "set" . implode("",
                    array_map(function ($el) {
                        return ucfirst($el);
                    }, explode("_", $key)));

            if (method_exists($object, $methodName)) {
                $object->$methodName($value);
            }
        }
        return $object;
    }
}
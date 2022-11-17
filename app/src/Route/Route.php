<?php

namespace App\Route;

use Attribute;

#[Attribute]

class Route
{
    private ?string $name = null;
    private ?string $path = null;
    private ?string $controller = null;
    private ?string $action = null;
    private array $params = [];
    private array $methods = ["GET", "POST", "PUT", "PATCH", "DELETE", "OPTIONS"];

    public function __construct(string $path, ?string $name = null, ?array $methods = null)
    {
        $this->setPath($path);
        $this->setName($name);
        if ($methods) {
            $this->setMethods($methods);
        }
    }



    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name 
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param string|null $action 
     * @return self
     */
    public function setAction(?string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params 
     * @return self
     */
    public function setParams(array $params): self
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return array
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @param array $methods 
     * @return self
     */
    public function setMethods(array $methods): self
    {
        $this->methods = $methods;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string|null $path 
     * @return self
     */
    public function setPath(string $path): self
    {

        preg_match_all("/{(\w+)}/", $path, $match);
        $this->params = $match[1];
        $this->path = preg_replace("/{(\w+)}/", "([^/]+)", str_replace("/", "\/", $path));
        return $this;
    }



    /**
     * @return string|null
     */
    public function getController(): ?string
    {
        return $this->controller;
    }

    /**
     * @param string|null $controller 
     * @return self
     */
    public function setController(?string $controller): self
    {
        $this->controller = $controller;
        return $this;
    }

    public function mergeParams(string $url)
    {
        preg_match("#{$this->path}#", $url, $match);
        array_shift($match);
        return array_combine(
            $this->getParams(),
            $match
        );
    }

    public function match(string $url): bool
    {
        return (bool)preg_match("#^{$this->path}$#", $url);
    }
}

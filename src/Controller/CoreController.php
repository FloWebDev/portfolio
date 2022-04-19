<?php

abstract class CoreController
{
    private $params = array();

    protected function assign(array $params)
    {
        $this->params = array_merge($this->params, $params);
    }

    protected function renderView(string $templateName)
    {
        foreach ($this->params as $key => $value) {
            $$key = $value;
        }
        require __DIR__ . '/../../templates/layout.php';
    }

    protected function renderHtmlTemplate(string $templateName)
    {
        foreach ($this->params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        require __DIR__ . '/../../templates/' . $templateName . '.php';
        return ob_get_clean();
    }

    protected function renderJson(array $result)
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
        exit;
    }
}

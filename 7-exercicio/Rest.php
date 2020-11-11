<?php

class Rest {

    public $response;

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function call(int $code, string $type = null, string $message = null, string $rule = "errors")
    {
        http_response_code($code);

        if (!empty($type)) {
            $this->response = [
                $rule => [
                    "type" => $type,
                    "message" => (!empty($message) ? $message : null)
                ]
            ];
        }
        return $this;
    }

    public function back(array $response = null)
    {
        if (!empty($response)) {
            $this->response = (!empty($this->response) ? array_merge($this->response, $response) : $response);
        }

        echo json_encode($this->response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        return $this;
    }

}
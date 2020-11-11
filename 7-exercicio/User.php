<?php

class User {

    const CREATE = 'create';

    const UPDATE = 'update';

    const DELETE = 'delete';

    const LIST = 'list';

    protected $data;

    public $message;

    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }
        $this->data->$name = $value;
    }

    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    public function data(): ?object
    {
        return $this->data;
    }

    //Listar Registros
    public function list()
    {
        if(!$this->fileDB($this, self::LIST)) {
            return null;
        }

        return true;
    }

    //Deletar Registro
    public function delete()
    {
        if(!$this->fileDB($this, self::DELETE)) {
            return null;
        }

        return true;
    }

    public function getMessage() 
    {
        return $this->message;
    }

    // Criar e Atualizar
    public function save($primary = null) 
    {
        $action = self::CREATE;
        if($primary) {
            $action = self::UPDATE;
        }

        if(!$this->fileDB($this, $action)) {
            return null;
        }

        return true;
    }

    private function fileDB($data, $action)
    {

        if($action == self::LIST) {
            $file = file_get_contents('registros.txt');
            $lines = explode("\n", $file);

            foreach($lines as $line => $value) {
                $users[] = explode(",", $value);
            }

            $this->data = (object) $users;
            $this->message = "Todos os registros.";
            return true;
        }

        if($action == self::DELETE || $action == self::UPDATE) {
            $file = file_get_contents('registros.txt');
            $lines = explode("\n", $file);
            foreach($lines as $line => $value) {
                $position = preg_match("/\b$data->email\b/i", $value);
                if ($position) {
                    if ($action == self::DELETE) {
                        unset($lines[$line]);
                        $this->message = "Registro deletado.";
                    }

                    if ($action === self::UPDATE) {
                        $lines[$line] = implode(",", (array) $data->data());
                        $this->message = "Registro atualizado.";
                    }
                }
            }

            $file = implode("\n", $lines);
            file_put_contents('registros.txt', $file);
            
            return true;
        }

        $file = fopen('registros.txt', 'r');
        while(!feof($file)) {
            $line = fgets($file, 1024);

            if($action == self::CREATE) {
                if(strpos($line, $data->email)) {
                    $this->message = "{$data->email} já está cadastrado.";
                    return null;
                }
            }
        }
 
        $file = fopen("registros.txt", 'a');
        fwrite($file, implode(",", (array) $data->data()) . "\n");

        fclose($file);
        return true;
    }
}
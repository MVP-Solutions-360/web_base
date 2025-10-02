<?php

class User {
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->nombre = $data['nombre'] ?? '';
        $this->apellido = $data['apellido'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->password = $data['password'] ?? '';
    }
}

<?php
require_once __DIR__ . '/Servidor.php';

interface ServidorBuilderInterface {
    public function setCpu(string $cpu): self;
    public function setRam(string $ram): self;
    public function setArmazenamento(string $armazenamento): self;
    public function setFonteRedundante(bool $fonte): self;
    public function setSistemaOperacional(string $os): self;

    public function getServidor(): Servidor;
}
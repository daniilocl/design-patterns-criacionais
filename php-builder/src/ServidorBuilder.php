<?php

require_once __DIR__ . '/Servidor.php';
require_once __DIR__ . '/ServidorBuilderInterface.php';

class ServidorBuilder implements ServidorBuilderInterface {
    private string $cpu;
    private string $ram;
    private string $armazenamento;
    private bool $fonteRedundante;
    private string $sistemaOperacional;

    public function __construct() {
        $this->reset();
    }

    public function reset(): void {
        $this->cpu = '';
        $this->ram = '';
        $this->armazenamento = '';
        $this->fonteRedundante = false;
        $this->sistemaOperacional = '';
    }

    public function setCpu(string $cpu): self {
        $this->cpu = $cpu;
        return $this;
    }

    public function setRam(string $ram): self {
        $this->ram = $ram;
        return $this;
    }

    public function setArmazenamento(string $armazenamento): self {
        $this->armazenamento = $armazenamento;
        return $this;
    }

    public function setFonteRedundante(bool $fonte): self {
        $this->fonteRedundante = $fonte;
        return $this;
    }

    public function setSistemaOperacional(string $os): self {
        $this->sistemaOperacional = $os;
        return $this;
    }

    public function getServidor(): Servidor {
        $servidor = new Servidor(
            $this->cpu,
            $this->ram,
            $this->armazenamento,
            $this->fonteRedundante,
            $this->sistemaOperacional,
        );

        $this->reset();
        return $servidor;
    }
}
<?php

/**
 * Produto Final: O objeto complexo que estamos construindo.
 */
class Servidor {
    public string $cpu = '';
    public string $ram = '';
    public string $armazenamento = '';
    public bool $fonteRedundante = false;
    public string $sistemaOperacional = '';

    public function exibirConfiguracao(): void {
        echo "Servidor configurado com sucesso:\n";
        echo "- Processador: {$this->cpu}\n";
        echo "- Memória RAM: {$this->ram}\n";
        echo "- Armazenamento: {$this->armazenamento}\n";
        echo "- Fonte Redundante: " . ($this->fonteRedundante ? 'Sim' : 'Não') . "\n";
        echo "- OS: {$this->sistemaOperacional}\n";
        echo "--------------------------------------------------\n";
    }
}

/**ls -la
 * Interface do Builder (Opcional no modelo fluente mais simples, 
 * mas excelente para demonstrar boas práticas de POO acadêmico).
 */
interface ServidorBuilderInterface {
    public function setCpu(string $cpu): self;
    public function setRam(string $ram): self;
    public function setArmazenamento(string $armazenamento): self;
    public function setFonteRedundante(bool $fonte): self;
    public function setSistemaOperacional(string $os): self;
    public function getServidor(): Servidor;
}

/**
 * Concrete Builder: Implementa os passos de construção e guarda o estado.
 */
class ServidorBuilder implements ServidorBuilderInterface {
    private Servidor $servidor;

    public function __construct() {
        $this->reset();
    }

    public function reset(): void {
        $this->servidor = new Servidor();
    }

    // Retornar 'self' permite o encadeamento de métodos (Fluent Interface)
    public function setCpu(string $cpu): self {
        $this->servidor->cpu = $cpu;
        return $this; 
    }

    public function setRam(string $ram): self {
        $this->servidor->ram = $ram;
        return $this;
    }

    public function setArmazenamento(string $armazenamento): self {
        $this->servidor->armazenamento = $armazenamento;
        return $this;
    }

    public function setFonteRedundante(bool $fonte): self {
        $this->servidor->fonteRedundante = $fonte;
        return $this;
    }

    public function setSistemaOperacional(string $os): self {
        $this->servidor->sistemaOperacional = $os;
        return $this;
    }

    public function getServidor(): Servidor {
        $resultado = $this->servidor;
        // Reseta o builder para permitir a construção de um novo objeto
        $this->reset(); 
        return $resultado;
    }
}

// ==========================================
// USO DO PADRÃO (Client Code)
// ==========================================

$builder = new ServidorBuilder();

// Construindo um servidor de Banco de Dados de alta performance
$servidorDatabase = $builder->setCpu('AMD EPYC 7003')
                            ->setRam('256GB ECC')
                            ->setArmazenamento('4TB RAID 10')
                            ->setFonteRedundante(true)
                            ->setSistemaOperacional('Oracle Linux')
                            ->getServidor();

// Construindo um servidor Web mais simples
$servidorWeb = $builder->setCpu('Intel Xeon Gold')
                       ->setRam('32GB')
                       ->setArmazenamento('1TB SSD NVMe')
                       ->setSistemaOperacional('Ubuntu Server 22.04')
                       ->getServidor(); // Fonte redundante fica como 'false' por padrão

$servidorDatabase->exibirConfiguracao();
$servidorWeb->exibirConfiguracao();

// Teste 1: Construção Parcial
$servidorArquivos = $builder->setArmazenamento('20TB HDD')
                            ->setSistemaOperacional('TrueNAS')
                            ->getServidor();

$servidorArquivos->exibirConfiguracao();

// Teste 2: Isolamento de Instâncias
// Começamos a montar um servidor, mas abortamos antes do getServidor()
$builder->setCpu('Processador Perdido')->setRam('16GB');

// O reset limpa o estado atual do Builder
$builder->reset(); 

// Construímos um novo do zero
$servidorLimpo = $builder->setSistemaOperacional('Windows Server')->getServidor();
$servidorLimpo->exibirConfiguracao();
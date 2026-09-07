<?php
class Servidor {
    public function __construct(
        private string $cpu = '',
        private string $ram = '',
        private string $armazenamento = '',
        private bool $fonteRedundante = false,
        private string $sistemaOperacional = ''
    ){}
    public function exibirConfiguracao(): void {
    echo "Servidor configurado com sucesso:\n";
    echo "-Processador: {this->cpu}\n";
    echo "-Memória RAM: {this->armazenamento}\n";
    echo "- Fonte Redundante: " . ($this->fonteRedundante ? 'Sim' : 'Não') . "\n";
    echo "-OS: {this->sistemaOperacional}\n";
    echo "---------------------------------------\n";
}

}




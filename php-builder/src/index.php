<?php

require_once __DIR__ . '/src/ServidorBuilder.php';

$builder = new ServidorBuilder();

// 1. Servidor de Banco de Dados (Alta Performance)
$servidorDatabase = $builder
    ->setCpu('AMD EPYC 7003')
    ->setRam('256GB ECC')
    ->setArmazenamento('4TB RAID 10')
    ->setFonteRedundante(true)
    ->setSistemaOperacional('Oracle Linux')
    ->getServidor();

// 2. Servidor Web Simples
$servidorWeb = $builder
    ->setCpu('Intel Xeon Gold')
    ->setRam('32GB')
    ->setArmazenamento('1TB SSD NVMe')
    ->setSistemaOperacional('Ubuntu Server 22.04')
    ->getServidor();

// 3. Teste de Construção Parcial (Servidor de Arquivos / NAS)
$servidorArquivos = $builder
    ->setArmazenamento('20TB HDD')
    ->setSistemaOperacional('TrueNAS')
    ->getServidor();

// 4. Teste de Isolamento e Reset (Montagem Abortada)
$builder->setCpu('Processador Perdido')->setRam('16GB');
$builder->reset(); // Descarta os dados acima

$servidorLimpo = $builder
    ->setSistemaOperacional('Windows Server')
    ->getServidor();

// Impressão dos resultados no terminal
echo "=== SERVIDOR DATABASE ===\n";
$servidorDatabase->exibirConfiguracao();

echo "\n=== SERVIDOR WEB ===\n";
$servidorWeb->exibirConfiguracao();

echo "\n=== SERVIDOR DE ARQUIVOS (CONSTRUÇÃO PARCIAL) ===\n";
$servidorArquivos->exibirConfiguracao();

echo "\n=== SERVIDOR LIMPO (PÓS RESET) ===\n";
$servidorLimpo->exibirConfiguracao();
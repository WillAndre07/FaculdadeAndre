<?php

error_reporting(0);

function adicionaVertice(&$aVertices, &$aListaAdjacencia, $sVertice) {
    if (!in_array($sVertice, $aVertices)) {
        $aVertices[] = $sVertice;
        $aListaAdjacencia[$sVertice] = [];
    }
}

function adicionaAresta(&$aListaAdjacencia, $sVertice1, $sVertice2, $sCusto) {
    $aListaAdjacencia[$sVertice1][] = ['ligacao' => $sVertice2, 'custo' => $sCusto];
    $aListaAdjacencia[$sVertice2][] = ['ligacao' => $sVertice1, 'custo' => $sCusto];
}

function inicializaDistancia($aVertices) {
    $aDistancia = [];

    foreach ($aVertices as $sVertice) {
        $aDistancia[$sVertice] = INF;
    }

    return $aDistancia;
}

function algoritmoDjikstra($aListaAdjacencia, $aVertices, $sInicio, $sFim) {

    $aDistancia = inicializaDistancia($aVertices);
    $aAnterior = [];

    $aFilaPrioritaria = [];
    $aFilaPrioritaria[] = ['vertice' => $sInicio, 'prioridade' => 0];

    $aDistancia[$sInicio] = 0;

    while (!empty($aFilaPrioritaria)) {

        $nMenorDistancia = INF;
        $nIndiceMenorDistancia = -1;

        foreach ($aFilaPrioritaria as $i => $item) {

            if ($item['prioridade'] < $nMenorDistancia) {
                $nMenorDistancia = $item['prioridade'];
                $nIndiceMenorDistancia = $i;
            }
            
        }
        
        $xVerticeAtual = $aFilaPrioritaria[$nIndiceMenorDistancia]['vertice'];
        unset($aFilaPrioritaria[$nIndiceMenorDistancia]);
        
        $aFilaPrioritaria = array_values($aFilaPrioritaria);

        foreach ($aListaAdjacencia[$xVerticeAtual] as $aVerticeVizinho) {
            $nPotencial = $aDistancia[$xVerticeAtual] + $aVerticeVizinho['custo'];
            if ($nPotencial < $aDistancia[$aVerticeVizinho['ligacao']]) {
                $aDistancia[$aVerticeVizinho['ligacao']] = $nPotencial;
                $aAnterior[$aVerticeVizinho['ligacao']] = $xVerticeAtual;
                $aFilaPrioritaria[] = ['vertice' => $aVerticeVizinho['ligacao'], 'prioridade' => $nPotencial];
            }
        }
    }

    $aCaminho = [];
    $aAtual = $sFim;

    while ($aAtual !== null) {
        $aCaminho[] = $aAtual;
        $aAtual = $aAnterior[$aAtual];
    }

    $aCaminho = array_reverse($aCaminho);

    return ['path' => $aCaminho, 'distancia' => $aDistancia[$sFim]];
}

$aVertices = [];
$aListaAdjacencia = [];

adicionaVertice($aVertices, $aListaAdjacencia, 'RS1');
adicionaVertice($aVertices, $aListaAdjacencia, 'RS2');
adicionaVertice($aVertices, $aListaAdjacencia, 'SC1');
adicionaVertice($aVertices, $aListaAdjacencia, 'SC2');

adicionaAresta($aListaAdjacencia,'RS1', 'RS2', 12);
adicionaAresta($aListaAdjacencia,'RS1', 'SC1', 5);
adicionaAresta($aListaAdjacencia,'RS1', 'SC2', 3);

adicionaAresta($aListaAdjacencia,'RS2', 'RS1', 12);
adicionaAresta($aListaAdjacencia,'RS2', 'SC1', 2);
adicionaAresta($aListaAdjacencia,'RS2', 'SC2', 2);

adicionaAresta($aListaAdjacencia,'SC1', 'SC2', 6);
adicionaAresta($aListaAdjacencia,'SC1', 'PR1', 1);
adicionaAresta($aListaAdjacencia,'SC1', 'RS1', 5);
adicionaAresta($aListaAdjacencia,'SC1', 'RS2', 2);
adicionaAresta($aListaAdjacencia,'SC1', 'AC1', 10);

adicionaAresta($aListaAdjacencia,'SC2', 'PR2', 1);
adicionaAresta($aListaAdjacencia,'SC2', 'SC1', 6);
adicionaAresta($aListaAdjacencia,'SC2', 'RS1', 3);
adicionaAresta($aListaAdjacencia,'SC2', 'RS2', 2);
adicionaAresta($aListaAdjacencia,'SC2', 'SP3', 5);

$sInicio = 'SC1';
$sFim = 'AM1';

$resultado = algoritmoDjikstra($aListaAdjacencia, $aVertices, $sInicio, $sFim);

if (empty($resultado['path'])) {
    echo "Não foi possível encontrar um caminho de $sInicio para $sFim.";
} else {
    echo "Caminho mais curto de $sInicio para $sFim: " . implode(" -> ", $resultado['path']) . "\n";
    echo "Distância total: " . $resultado['distancia'] . " unidades.\n";
}

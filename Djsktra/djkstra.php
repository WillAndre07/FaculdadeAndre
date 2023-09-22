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
        // Encontre o vértice com a menor distância na fila
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
adicionaVertice($aVertices, $aListaAdjacencia, 'PR1');
adicionaVertice($aVertices, $aListaAdjacencia, 'PR2');
adicionaVertice($aVertices, $aListaAdjacencia, 'SP1');
adicionaVertice($aVertices, $aListaAdjacencia, 'SP2');
adicionaVertice($aVertices, $aListaAdjacencia, 'SP3');
adicionaVertice($aVertices, $aListaAdjacencia, 'SP4');
adicionaVertice($aVertices, $aListaAdjacencia, 'SP5');
adicionaVertice($aVertices, $aListaAdjacencia, 'MG1');
adicionaVertice($aVertices, $aListaAdjacencia, 'MG2');
adicionaVertice($aVertices, $aListaAdjacencia, 'MG3');
adicionaVertice($aVertices, $aListaAdjacencia, 'RJ1');
adicionaVertice($aVertices, $aListaAdjacencia, 'RJ2');
adicionaVertice($aVertices, $aListaAdjacencia, 'RJ3');
adicionaVertice($aVertices, $aListaAdjacencia, 'ES1');
adicionaVertice($aVertices, $aListaAdjacencia, 'MS1');
adicionaVertice($aVertices, $aListaAdjacencia, 'GO1');
adicionaVertice($aVertices, $aListaAdjacencia, 'GO2');
adicionaVertice($aVertices, $aListaAdjacencia, 'DF1');
adicionaVertice($aVertices, $aListaAdjacencia, 'BA1');
adicionaVertice($aVertices, $aListaAdjacencia, 'BA2');
adicionaVertice($aVertices, $aListaAdjacencia, 'MT1');
adicionaVertice($aVertices, $aListaAdjacencia, 'TO1');
adicionaVertice($aVertices, $aListaAdjacencia, 'SE1');
adicionaVertice($aVertices, $aListaAdjacencia, 'PI1');
adicionaVertice($aVertices, $aListaAdjacencia, 'MA1');
adicionaVertice($aVertices, $aListaAdjacencia, 'AL1');
adicionaVertice($aVertices, $aListaAdjacencia, 'PE1');
adicionaVertice($aVertices, $aListaAdjacencia, 'PE2');
adicionaVertice($aVertices, $aListaAdjacencia, 'PB1');
adicionaVertice($aVertices, $aListaAdjacencia, 'CE1');
adicionaVertice($aVertices, $aListaAdjacencia, 'CE2');
adicionaVertice($aVertices, $aListaAdjacencia, 'RN1');
adicionaVertice($aVertices, $aListaAdjacencia, 'PA1');
adicionaVertice($aVertices, $aListaAdjacencia, 'AM1');
adicionaVertice($aVertices, $aListaAdjacencia, 'AP1');
adicionaVertice($aVertices, $aListaAdjacencia, 'RR1');
adicionaVertice($aVertices, $aListaAdjacencia, 'AC1');
adicionaVertice($aVertices, $aListaAdjacencia, 'RO1');

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

adicionaAresta($aListaAdjacencia,'PR1', 'PR2', 2);
adicionaAresta($aListaAdjacencia,'PR1', 'SC1', 1);
adicionaAresta($aListaAdjacencia,'PR1', 'SP2', 3);

adicionaAresta($aListaAdjacencia,'PR2', 'PR1', 2);
adicionaAresta($aListaAdjacencia,'PR2', 'SC2', 1);
adicionaAresta($aListaAdjacencia,'PR2', 'SP3', 2);

adicionaAresta($aListaAdjacencia,'SP1', 'SP2', 2);
adicionaAresta($aListaAdjacencia,'SP1', 'SP4', 10);
adicionaAresta($aListaAdjacencia,'SP1', 'MG3', 2);
adicionaAresta($aListaAdjacencia,'SP1', 'MS1', 7);

adicionaAresta($aListaAdjacencia,'SP2', 'SP1', 2);
adicionaAresta($aListaAdjacencia,'SP2', 'PR1', 3);
adicionaAresta($aListaAdjacencia,'SP2', 'MS1', 8);
adicionaAresta($aListaAdjacencia,'SP2', 'SP3', 5);

adicionaAresta($aListaAdjacencia,'SP3', 'SP4', 6);
adicionaAresta($aListaAdjacencia,'SP3', 'SP5', 13);
adicionaAresta($aListaAdjacencia,'SP3', 'PR2', 2);
adicionaAresta($aListaAdjacencia,'SP3', 'SC2', 5);
adicionaAresta($aListaAdjacencia,'SP3', 'SP2', 5);

adicionaAresta($aListaAdjacencia,'SP4', 'SP3', 6);
adicionaAresta($aListaAdjacencia,'SP4', 'SP5', 3);
adicionaAresta($aListaAdjacencia,'SP4', 'MG1', 4);
adicionaAresta($aListaAdjacencia,'SP4', 'MG3', 1);
adicionaAresta($aListaAdjacencia,'SP4', 'SP1', 10);

adicionaAresta($aListaAdjacencia,'SP5', 'SP3', 13);
adicionaAresta($aListaAdjacencia,'SP5', 'SP4', 3);
adicionaAresta($aListaAdjacencia,'SP5', 'MG1', 7);
adicionaAresta($aListaAdjacencia,'SP5', 'RJ3', 1);

adicionaAresta($aListaAdjacencia,'MG1', 'RJ1', 2);
adicionaAresta($aListaAdjacencia,'MG1', 'RJ2', 2);
adicionaAresta($aListaAdjacencia,'MG1', 'SP5', 7);
adicionaAresta($aListaAdjacencia,'MG1', 'SP4', 4);
adicionaAresta($aListaAdjacencia,'MG1', 'MG3', 2);
adicionaAresta($aListaAdjacencia,'MG1', 'DF1', 9);

adicionaAresta($aListaAdjacencia,'MG2', 'DF1', 2);
adicionaAresta($aListaAdjacencia,'MG2', 'ES1', 15);
adicionaAresta($aListaAdjacencia,'MG2', 'BA1', 12);

adicionaAresta($aListaAdjacencia,'MG3', 'DF1', 3);
adicionaAresta($aListaAdjacencia,'MG3', 'SP1', 2);
adicionaAresta($aListaAdjacencia,'MG3', 'SP4', 1);
adicionaAresta($aListaAdjacencia,'MG3', 'MG1', 2);

adicionaAresta($aListaAdjacencia,'RJ1', 'RJ2', 8);
adicionaAresta($aListaAdjacencia,'RJ1', 'MG1', 2);
adicionaAresta($aListaAdjacencia,'RJ1', 'ES1', 7);

adicionaAresta($aListaAdjacencia,'RJ2', 'RJ1', 8);
adicionaAresta($aListaAdjacencia,'RJ2', 'MG1', 2);
adicionaAresta($aListaAdjacencia,'RJ2', 'RJ3', 1);

adicionaAresta($aListaAdjacencia,'RJ3', 'RJ2', 1);
adicionaAresta($aListaAdjacencia,'RJ3', 'SP5', 1);

adicionaAresta($aListaAdjacencia,'ES1', 'RJ1', 7);
adicionaAresta($aListaAdjacencia,'ES1', 'DF1', 9);
adicionaAresta($aListaAdjacencia,'ES1', 'MG2', 15);
adicionaAresta($aListaAdjacencia,'ES1', 'SE1', 4);

adicionaAresta($aListaAdjacencia,'MS1', 'RO1', 17);
adicionaAresta($aListaAdjacencia,'MS1', 'MT1', 15);
adicionaAresta($aListaAdjacencia,'MS1', 'SP2', 8);
adicionaAresta($aListaAdjacencia,'MS1', 'SP1', 7);
adicionaAresta($aListaAdjacencia,'MS1', 'GO1', 7);

adicionaAresta($aListaAdjacencia,'GO1', 'MS1', 7);
adicionaAresta($aListaAdjacencia,'GO1', 'GO2', 8);
adicionaAresta($aListaAdjacencia,'GO1', 'DF1', 1);

adicionaAresta($aListaAdjacencia,'GO2', 'GO1', 8);
adicionaAresta($aListaAdjacencia,'GO2', 'MT1', 18);
adicionaAresta($aListaAdjacencia,'GO2', 'DF1', 2);

adicionaAresta($aListaAdjacencia,'DF1', 'GO2', 2);
adicionaAresta($aListaAdjacencia,'DF1', 'GO1', 1);
adicionaAresta($aListaAdjacencia,'DF1', 'MG3', 3);
adicionaAresta($aListaAdjacencia,'DF1', 'MG1', 9);
adicionaAresta($aListaAdjacencia,'DF1', 'ES1', 9);
adicionaAresta($aListaAdjacencia,'DF1', 'MG2', 2);
adicionaAresta($aListaAdjacencia,'DF1', 'BA2', 11);
adicionaAresta($aListaAdjacencia,'DF1', 'TO1', 7);

adicionaAresta($aListaAdjacencia,'BA1', 'MG2', 12);
adicionaAresta($aListaAdjacencia,'BA1', 'BA2', 6);
adicionaAresta($aListaAdjacencia,'BA1', 'PI1', 4);
adicionaAresta($aListaAdjacencia,'BA1', 'PE2', 3);
adicionaAresta($aListaAdjacencia,'BA1', 'SE1', 2);

adicionaAresta($aListaAdjacencia,'BA2', 'TO1', 14);
adicionaAresta($aListaAdjacencia,'BA2', 'DF1', 11);
adicionaAresta($aListaAdjacencia,'BA2', 'BA1', 6);

adicionaAresta($aListaAdjacencia,'MT1', 'RO1', 11);
adicionaAresta($aListaAdjacencia,'MT1', 'MS1', 15);
adicionaAresta($aListaAdjacencia,'MT1', 'GO2', 18);
adicionaAresta($aListaAdjacencia,'MT1', 'TO1', 20);
adicionaAresta($aListaAdjacencia,'MT1', 'PA1', 19);

adicionaAresta($aListaAdjacencia,'TO1', 'PA1', 11);
adicionaAresta($aListaAdjacencia,'TO1', 'MA1', 2);
adicionaAresta($aListaAdjacencia,'TO1', 'PI1', 7);
adicionaAresta($aListaAdjacencia,'TO1', 'BA2', 14);
adicionaAresta($aListaAdjacencia,'TO1', 'DF1', 7);
adicionaAresta($aListaAdjacencia,'TO1', 'MT1', 20);

adicionaAresta($aListaAdjacencia,'SE1', 'AL1', 2);
adicionaAresta($aListaAdjacencia,'SE1', 'ES1', 4);
adicionaAresta($aListaAdjacencia,'SE1', 'BA1', 2);
adicionaAresta($aListaAdjacencia,'SE1', 'PE2', 2);

adicionaAresta($aListaAdjacencia,'PI1', 'BA1', 4);
adicionaAresta($aListaAdjacencia,'PI1', 'TO1', 7);
adicionaAresta($aListaAdjacencia,'PI1', 'PA1', 3);
adicionaAresta($aListaAdjacencia,'PI1', 'MA1', 16);
adicionaAresta($aListaAdjacencia,'PI1', 'CE1', 5);
adicionaAresta($aListaAdjacencia,'PI1', 'PE2', 4);

adicionaAresta($aListaAdjacencia,'MA1', 'CE1', 3);
adicionaAresta($aListaAdjacencia,'MA1', 'AP1', 5);
adicionaAresta($aListaAdjacencia,'MA1', 'PA1', 5);
adicionaAresta($aListaAdjacencia,'MA1', 'TO1', 2);
adicionaAresta($aListaAdjacencia,'MA1', 'PI1', 16);

adicionaAresta($aListaAdjacencia,'AL1', 'PE1', 1);
adicionaAresta($aListaAdjacencia,'AL1', 'SE1', 2);

adicionaAresta($aListaAdjacencia,'PE1', 'PB1', 1);
adicionaAresta($aListaAdjacencia,'PE1', 'AL1', 1);
adicionaAresta($aListaAdjacencia,'PE1', 'PE2', 7);

adicionaAresta($aListaAdjacencia,'PE2', 'PE1', 7);
adicionaAresta($aListaAdjacencia,'PE2', 'PB1', 8);
adicionaAresta($aListaAdjacencia,'PE2', 'SE1', 2);
adicionaAresta($aListaAdjacencia,'PE2', 'BA1', 3);
adicionaAresta($aListaAdjacencia,'PE2', 'PI1', 4);
adicionaAresta($aListaAdjacencia,'PE2', 'CE2', 2);

adicionaAresta($aListaAdjacencia,'PB1', 'RN1', 1);
adicionaAresta($aListaAdjacencia,'PB1', 'PE1', 1);
adicionaAresta($aListaAdjacencia,'PB1', 'PE2', 8);

adicionaAresta($aListaAdjacencia,'CE1', 'RN1', 6);
adicionaAresta($aListaAdjacencia,'CE1', 'CE2', 2);
adicionaAresta($aListaAdjacencia,'CE1', 'MA1', 3);
adicionaAresta($aListaAdjacencia,'CE1', 'PI1', 5);

adicionaAresta($aListaAdjacencia,'CE2', 'RN1', 9);
adicionaAresta($aListaAdjacencia,'CE2', 'CE1', 2);
adicionaAresta($aListaAdjacencia,'CE2', 'PE2', 2);

adicionaAresta($aListaAdjacencia,'RN1', 'CE1', 6);
adicionaAresta($aListaAdjacencia,'RN1', 'CE2', 9);
adicionaAresta($aListaAdjacencia,'RN1', 'PB1', 1);

adicionaAresta($aListaAdjacencia,'PA1', 'AP1', 1);
adicionaAresta($aListaAdjacencia,'PA1', 'RR1', 16);
adicionaAresta($aListaAdjacencia,'PA1', 'AM1', 2);
adicionaAresta($aListaAdjacencia,'PA1', 'RO1', 22);
adicionaAresta($aListaAdjacencia,'PA1', 'MT1', 19);
adicionaAresta($aListaAdjacencia,'PA1', 'TO1', 11);
adicionaAresta($aListaAdjacencia,'PA1', 'PI1', 3);
adicionaAresta($aListaAdjacencia,'PA1', 'MA1', 5);

adicionaAresta($aListaAdjacencia,'AM1', 'PA1', 2);
adicionaAresta($aListaAdjacencia,'AM1', 'RR1', 2);
adicionaAresta($aListaAdjacencia,'AM1', 'AC1', 6);
adicionaAresta($aListaAdjacencia,'AM1', 'RO1', 6);

adicionaAresta($aListaAdjacencia,'AP1', 'RR1', 3);
adicionaAresta($aListaAdjacencia,'AP1', 'PA1', 1);
adicionaAresta($aListaAdjacencia,'AP1', 'MA1', 5);

adicionaAresta($aListaAdjacencia,'RR1', 'AM1', 2);
adicionaAresta($aListaAdjacencia,'RR1', 'PA1', 16);
adicionaAresta($aListaAdjacencia,'RR1', 'AP1', 3);

adicionaAresta($aListaAdjacencia,'AC1', 'SC1', 10);
adicionaAresta($aListaAdjacencia,'AC1', 'AM1', 6);
adicionaAresta($aListaAdjacencia,'AC1', 'RO1', 3);

adicionaAresta($aListaAdjacencia,'RO1', 'AM1', 6);
adicionaAresta($aListaAdjacencia,'RO1', 'AC1', 3);
adicionaAresta($aListaAdjacencia,'RO1', 'MS1', 17);
adicionaAresta($aListaAdjacencia,'RO1', 'MT1', 11);
adicionaAresta($aListaAdjacencia,'RO1', 'PA1', 22);

$sInicio = 'SC1';
$sFim = 'AM1';

$resultado = algoritmoDjikstra($aListaAdjacencia, $aVertices, $sInicio, $sFim);

if (empty($resultado['path'])) {
    echo "Não foi possível encontrar um caminho de $sInicio para $sFim.";
} else {
    echo "Caminho mais curto de $sInicio para $sFim: " . implode(" -> ", $resultado['path']) . "\n";
    echo "Distância total: " . $resultado['distancia'] . " unidades.\n";
}

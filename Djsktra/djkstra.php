<?php

error_reporting(0);


function incluiAeroporto(&$aVertices, &$listaLigAeroportos, $sVertice) {
    if (!in_array($sVertice, $aVertices)) {
        $aVertices[] = $sVertice;
        $listaLigAeroportos[$sVertice] = [];
    }
}

function incluiLigacao(&$listaLigAeroportos, $sVertice1, $sVertice2, $sCusto) {
    $listaLigAeroportos[$sVertice1][] = ['ligacao' => $sVertice2, 'custo' => $sCusto];
    $listaLigAeroportos[$sVertice2][] = ['ligacao' => $sVertice1, 'custo' => $sCusto];
}

function inicializaDistancia($aVertices) {
    $aDistancia = [];

    foreach ($aVertices as $sVertice) {
        $aDistancia[$sVertice] = INF;
    }

    return $aDistancia;
}

function algoritmoDjikstra($listaLigAeroportos, $aVertices, $sInicio, $sFim) {
    // Seta tudo como infinito no intuito de iniciar o c
    $aDistancia = inicializaDistancia($aVertices);
    $aAnterior = [];

    // A fila prioritaria é um array que armazena o vértice que deve-se ser explorado
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
        
        $verticePresente = $aFilaPrioritaria[$nIndiceMenorDistancia]['vertice'];
        // Quando ele executa essa função UNSET ele retira o valor do array, indicando que esse cara já está visitado
        unset($aFilaPrioritaria[$nIndiceMenorDistancia]);
        
        $aFilaPrioritaria = array_values($aFilaPrioritaria);

        foreach ($listaLigAeroportos[$verticePresente] as $aVerticeVizinho) {
            $nPotencial = $aDistancia[$verticePresente] + $aVerticeVizinho['custo'];
            if ($nPotencial < $aDistancia[$aVerticeVizinho['ligacao']]) {
                $aDistancia[$aVerticeVizinho['ligacao']] = $nPotencial;
                $aAnterior[$aVerticeVizinho['ligacao']] = $verticePresente;
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
$listaLigAeroportos = [];

incluiAeroporto($aVertices, $listaLigAeroportos, 'RS1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'RS2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'SC1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'SC2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'PR1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'PR2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'SP1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'SP2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'SP3');
incluiAeroporto($aVertices, $listaLigAeroportos, 'SP4');
incluiAeroporto($aVertices, $listaLigAeroportos, 'SP5');
incluiAeroporto($aVertices, $listaLigAeroportos, 'MG1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'MG2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'MG3');
incluiAeroporto($aVertices, $listaLigAeroportos, 'RJ1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'RJ2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'RJ3');
incluiAeroporto($aVertices, $listaLigAeroportos, 'ES1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'MS1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'GO1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'GO2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'DF1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'BA1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'BA2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'MT1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'TO1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'SE1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'PI1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'MA1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'AL1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'PE1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'PE2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'PB1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'CE1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'CE2');
incluiAeroporto($aVertices, $listaLigAeroportos, 'RN1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'PA1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'AM1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'AP1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'RR1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'AC1');
incluiAeroporto($aVertices, $listaLigAeroportos, 'RO1');

incluiLigacao($listaLigAeroportos,'RS1', 'RS2', 12);
incluiLigacao($listaLigAeroportos,'RS1', 'SC1', 5);
incluiLigacao($listaLigAeroportos,'RS1', 'SC2', 3);

incluiLigacao($listaLigAeroportos,'RS2', 'RS1', 12);
incluiLigacao($listaLigAeroportos,'RS2', 'SC1', 2);
incluiLigacao($listaLigAeroportos,'RS2', 'SC2', 2);

incluiLigacao($listaLigAeroportos,'SC1', 'SC2', 6);
incluiLigacao($listaLigAeroportos,'SC1', 'PR1', 1);
incluiLigacao($listaLigAeroportos,'SC1', 'RS1', 5);
incluiLigacao($listaLigAeroportos,'SC1', 'RS2', 2);
incluiLigacao($listaLigAeroportos,'SC1', 'AC1', 10);

incluiLigacao($listaLigAeroportos,'SC2', 'PR2', 1);
incluiLigacao($listaLigAeroportos,'SC2', 'SC1', 6);
incluiLigacao($listaLigAeroportos,'SC2', 'RS1', 3);
incluiLigacao($listaLigAeroportos,'SC2', 'RS2', 2);
incluiLigacao($listaLigAeroportos,'SC2', 'SP3', 5);

incluiLigacao($listaLigAeroportos,'PR1', 'PR2', 2);
incluiLigacao($listaLigAeroportos,'PR1', 'SC1', 1);
incluiLigacao($listaLigAeroportos,'PR1', 'SP2', 3);

incluiLigacao($listaLigAeroportos,'PR2', 'PR1', 2);
incluiLigacao($listaLigAeroportos,'PR2', 'SC2', 1);
incluiLigacao($listaLigAeroportos,'PR2', 'SP3', 2);

incluiLigacao($listaLigAeroportos,'SP1', 'SP2', 2);
incluiLigacao($listaLigAeroportos,'SP1', 'SP4', 10);
incluiLigacao($listaLigAeroportos,'SP1', 'MG3', 2);
incluiLigacao($listaLigAeroportos,'SP1', 'MS1', 7);

incluiLigacao($listaLigAeroportos,'SP2', 'SP1', 2);
incluiLigacao($listaLigAeroportos,'SP2', 'PR1', 3);
incluiLigacao($listaLigAeroportos,'SP2', 'MS1', 8);
incluiLigacao($listaLigAeroportos,'SP2', 'SP3', 5);

incluiLigacao($listaLigAeroportos,'SP3', 'SP4', 6);
incluiLigacao($listaLigAeroportos,'SP3', 'SP5', 13);
incluiLigacao($listaLigAeroportos,'SP3', 'PR2', 2);
incluiLigacao($listaLigAeroportos,'SP3', 'SC2', 5);
incluiLigacao($listaLigAeroportos,'SP3', 'SP2', 5);

incluiLigacao($listaLigAeroportos,'SP4', 'SP3', 6);
incluiLigacao($listaLigAeroportos,'SP4', 'SP5', 3);
incluiLigacao($listaLigAeroportos,'SP4', 'MG1', 4);
incluiLigacao($listaLigAeroportos,'SP4', 'MG3', 1);
incluiLigacao($listaLigAeroportos,'SP4', 'SP1', 10);

incluiLigacao($listaLigAeroportos,'SP5', 'SP3', 13);
incluiLigacao($listaLigAeroportos,'SP5', 'SP4', 3);
incluiLigacao($listaLigAeroportos,'SP5', 'MG1', 7);
incluiLigacao($listaLigAeroportos,'SP5', 'RJ3', 1);

incluiLigacao($listaLigAeroportos,'MG1', 'RJ1', 2);
incluiLigacao($listaLigAeroportos,'MG1', 'RJ2', 2);
incluiLigacao($listaLigAeroportos,'MG1', 'SP5', 7);
incluiLigacao($listaLigAeroportos,'MG1', 'SP4', 4);
incluiLigacao($listaLigAeroportos,'MG1', 'MG3', 2);
incluiLigacao($listaLigAeroportos,'MG1', 'DF1', 9);

incluiLigacao($listaLigAeroportos,'MG2', 'DF1', 2);
incluiLigacao($listaLigAeroportos,'MG2', 'ES1', 15);
incluiLigacao($listaLigAeroportos,'MG2', 'BA1', 12);

incluiLigacao($listaLigAeroportos,'MG3', 'DF1', 3);
incluiLigacao($listaLigAeroportos,'MG3', 'SP1', 2);
incluiLigacao($listaLigAeroportos,'MG3', 'SP4', 1);
incluiLigacao($listaLigAeroportos,'MG3', 'MG1', 2);

incluiLigacao($listaLigAeroportos,'RJ1', 'RJ2', 8);
incluiLigacao($listaLigAeroportos,'RJ1', 'MG1', 2);
incluiLigacao($listaLigAeroportos,'RJ1', 'ES1', 7);

incluiLigacao($listaLigAeroportos,'RJ2', 'RJ1', 8);
incluiLigacao($listaLigAeroportos,'RJ2', 'MG1', 2);
incluiLigacao($listaLigAeroportos,'RJ2', 'RJ3', 1);

incluiLigacao($listaLigAeroportos,'RJ3', 'RJ2', 1);
incluiLigacao($listaLigAeroportos,'RJ3', 'SP5', 1);

incluiLigacao($listaLigAeroportos,'ES1', 'RJ1', 7);
incluiLigacao($listaLigAeroportos,'ES1', 'DF1', 9);
incluiLigacao($listaLigAeroportos,'ES1', 'MG2', 15);
incluiLigacao($listaLigAeroportos,'ES1', 'SE1', 4);

incluiLigacao($listaLigAeroportos,'MS1', 'RO1', 17);
incluiLigacao($listaLigAeroportos,'MS1', 'MT1', 15);
incluiLigacao($listaLigAeroportos,'MS1', 'SP2', 8);
incluiLigacao($listaLigAeroportos,'MS1', 'SP1', 7);
incluiLigacao($listaLigAeroportos,'MS1', 'GO1', 7);

incluiLigacao($listaLigAeroportos,'GO1', 'MS1', 7);
incluiLigacao($listaLigAeroportos,'GO1', 'GO2', 8);
incluiLigacao($listaLigAeroportos,'GO1', 'DF1', 1);

incluiLigacao($listaLigAeroportos,'GO2', 'GO1', 8);
incluiLigacao($listaLigAeroportos,'GO2', 'MT1', 18);
incluiLigacao($listaLigAeroportos,'GO2', 'DF1', 2);

incluiLigacao($listaLigAeroportos,'DF1', 'GO2', 2);
incluiLigacao($listaLigAeroportos,'DF1', 'GO1', 1);
incluiLigacao($listaLigAeroportos,'DF1', 'MG3', 3);
incluiLigacao($listaLigAeroportos,'DF1', 'MG1', 9);
incluiLigacao($listaLigAeroportos,'DF1', 'ES1', 9);
incluiLigacao($listaLigAeroportos,'DF1', 'MG2', 2);
incluiLigacao($listaLigAeroportos,'DF1', 'BA2', 11);
incluiLigacao($listaLigAeroportos,'DF1', 'TO1', 7);

incluiLigacao($listaLigAeroportos,'BA1', 'MG2', 12);
incluiLigacao($listaLigAeroportos,'BA1', 'BA2', 6);
incluiLigacao($listaLigAeroportos,'BA1', 'PI1', 4);
incluiLigacao($listaLigAeroportos,'BA1', 'PE2', 3);
incluiLigacao($listaLigAeroportos,'BA1', 'SE1', 2);

incluiLigacao($listaLigAeroportos,'BA2', 'TO1', 14);
incluiLigacao($listaLigAeroportos,'BA2', 'DF1', 11);
incluiLigacao($listaLigAeroportos,'BA2', 'BA1', 6);

incluiLigacao($listaLigAeroportos,'MT1', 'RO1', 11);
incluiLigacao($listaLigAeroportos,'MT1', 'MS1', 15);
incluiLigacao($listaLigAeroportos,'MT1', 'GO2', 18);
incluiLigacao($listaLigAeroportos,'MT1', 'TO1', 20);
incluiLigacao($listaLigAeroportos,'MT1', 'PA1', 19);

incluiLigacao($listaLigAeroportos,'TO1', 'PA1', 11);
incluiLigacao($listaLigAeroportos,'TO1', 'MA1', 2);
incluiLigacao($listaLigAeroportos,'TO1', 'PI1', 7);
incluiLigacao($listaLigAeroportos,'TO1', 'BA2', 14);
incluiLigacao($listaLigAeroportos,'TO1', 'DF1', 7);
incluiLigacao($listaLigAeroportos,'TO1', 'MT1', 20);

incluiLigacao($listaLigAeroportos,'SE1', 'AL1', 2);
incluiLigacao($listaLigAeroportos,'SE1', 'ES1', 4);
incluiLigacao($listaLigAeroportos,'SE1', 'BA1', 2);
incluiLigacao($listaLigAeroportos,'SE1', 'PE2', 2);

incluiLigacao($listaLigAeroportos,'PI1', 'BA1', 4);
incluiLigacao($listaLigAeroportos,'PI1', 'TO1', 7);
incluiLigacao($listaLigAeroportos,'PI1', 'PA1', 3);
incluiLigacao($listaLigAeroportos,'PI1', 'MA1', 16);
incluiLigacao($listaLigAeroportos,'PI1', 'CE1', 5);
incluiLigacao($listaLigAeroportos,'PI1', 'PE2', 4);

incluiLigacao($listaLigAeroportos,'MA1', 'CE1', 3);
incluiLigacao($listaLigAeroportos,'MA1', 'AP1', 5);
incluiLigacao($listaLigAeroportos,'MA1', 'PA1', 5);
incluiLigacao($listaLigAeroportos,'MA1', 'TO1', 2);
incluiLigacao($listaLigAeroportos,'MA1', 'PI1', 16);

incluiLigacao($listaLigAeroportos,'AL1', 'PE1', 1);
incluiLigacao($listaLigAeroportos,'AL1', 'SE1', 2);

incluiLigacao($listaLigAeroportos,'PE1', 'PB1', 1);
incluiLigacao($listaLigAeroportos,'PE1', 'AL1', 1);
incluiLigacao($listaLigAeroportos,'PE1', 'PE2', 7);

incluiLigacao($listaLigAeroportos,'PE2', 'PE1', 7);
incluiLigacao($listaLigAeroportos,'PE2', 'PB1', 8);
incluiLigacao($listaLigAeroportos,'PE2', 'SE1', 2);
incluiLigacao($listaLigAeroportos,'PE2', 'BA1', 3);
incluiLigacao($listaLigAeroportos,'PE2', 'PI1', 4);
incluiLigacao($listaLigAeroportos,'PE2', 'CE2', 2);

incluiLigacao($listaLigAeroportos,'PB1', 'RN1', 1);
incluiLigacao($listaLigAeroportos,'PB1', 'PE1', 1);
incluiLigacao($listaLigAeroportos,'PB1', 'PE2', 8);

incluiLigacao($listaLigAeroportos,'CE1', 'RN1', 6);
incluiLigacao($listaLigAeroportos,'CE1', 'CE2', 2);
incluiLigacao($listaLigAeroportos,'CE1', 'MA1', 3);
incluiLigacao($listaLigAeroportos,'CE1', 'PI1', 5);

incluiLigacao($listaLigAeroportos,'CE2', 'RN1', 9);
incluiLigacao($listaLigAeroportos,'CE2', 'CE1', 2);
incluiLigacao($listaLigAeroportos,'CE2', 'PE2', 2);

incluiLigacao($listaLigAeroportos,'RN1', 'CE1', 6);
incluiLigacao($listaLigAeroportos,'RN1', 'CE2', 9);
incluiLigacao($listaLigAeroportos,'RN1', 'PB1', 1);

incluiLigacao($listaLigAeroportos,'PA1', 'AP1', 1);
incluiLigacao($listaLigAeroportos,'PA1', 'RR1', 16);
incluiLigacao($listaLigAeroportos,'PA1', 'AM1', 2);
incluiLigacao($listaLigAeroportos,'PA1', 'RO1', 22);
incluiLigacao($listaLigAeroportos,'PA1', 'MT1', 19);
incluiLigacao($listaLigAeroportos,'PA1', 'TO1', 11);
incluiLigacao($listaLigAeroportos,'PA1', 'PI1', 3);
incluiLigacao($listaLigAeroportos,'PA1', 'MA1', 5);

incluiLigacao($listaLigAeroportos,'AM1', 'PA1', 2);
incluiLigacao($listaLigAeroportos,'AM1', 'RR1', 2);
incluiLigacao($listaLigAeroportos,'AM1', 'AC1', 6);
incluiLigacao($listaLigAeroportos,'AM1', 'RO1', 6);

incluiLigacao($listaLigAeroportos,'AP1', 'RR1', 3);
incluiLigacao($listaLigAeroportos,'AP1', 'PA1', 1);
incluiLigacao($listaLigAeroportos,'AP1', 'MA1', 5);

incluiLigacao($listaLigAeroportos,'RR1', 'AM1', 2);
incluiLigacao($listaLigAeroportos,'RR1', 'PA1', 16);
incluiLigacao($listaLigAeroportos,'RR1', 'AP1', 3);

incluiLigacao($listaLigAeroportos,'AC1', 'SC1', 10);
incluiLigacao($listaLigAeroportos,'AC1', 'AM1', 6);
incluiLigacao($listaLigAeroportos,'AC1', 'RO1', 3);

incluiLigacao($listaLigAeroportos,'RO1', 'AM1', 6);
incluiLigacao($listaLigAeroportos,'RO1', 'AC1', 3);
incluiLigacao($listaLigAeroportos,'RO1', 'MS1', 17);
incluiLigacao($listaLigAeroportos,'RO1', 'MT1', 11);
incluiLigacao($listaLigAeroportos,'RO1', 'PA1', 22);

$sInicio = 'SC1';
$sFim = 'AM1';

$resultado = algoritmoDjikstra($listaLigAeroportos, $aVertices, $sInicio, $sFim);

if (empty($resultado['path'])) {
    echo "Não foi possível encontrar um caminho de $sInicio para $sFim.";
} else {
    echo "Caminho mais curto de $sInicio para $sFim: " . implode(" -> ", $resultado['path']) . "\n";
    echo "Distância total: " . $resultado['distancia'] . " unidades.\n";
}
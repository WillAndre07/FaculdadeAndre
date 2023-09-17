<?php

class Djikstra {
  private $aVertices;
  private $aListaAdjacencia;

  public function __construct() {
    $this->aVertices = [];
    $this->aListaAdjacencia = [];
  }

  public function adicionaVertice($sVertice) {
    if (!in_array($sVertice, $this->aVertices)) {
      $this->aVertices[] = $sVertice;
      $this->aListaAdjacencia[$sVertice] = [];
    }
  }

  public function adicionaAresta($sVertice1, $sVertice2, $sCusto) {
    $this->aListaAdjacencia[$sVertice1][] = ['ligacao' => $sVertice2, 'custo' => $sCusto];
    $this->aListaAdjacencia[$sVertice2][] = ['ligacao' => $sVertice1, 'custo' => $sCusto];
  }

  private function inicializaDistancia() {
    $aDistancia = [];

    foreach ($this->aVertices as $sVertice) {
      $aDistancia[$sVertice] = INF;
    }

    return $aDistancia;
  }

  public function algoritmoDjikstra($sInicio, $sFim) {
    $aDistancia = $this->inicializaDistancia();
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

      foreach ($this->aListaAdjacencia[$xVerticeAtual] as $aVerticeVizinho) {
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
}

// Restante do código permanece o mesmo


// Exemplo de uso:
$oGrafo = new Djikstra();

$oGrafo->adicionaVertice('RS1');
$oGrafo->adicionaVertice('RS2');
$oGrafo->adicionaVertice('SC1');
$oGrafo->adicionaVertice('SC2');
$oGrafo->adicionaVertice('PR1');
$oGrafo->adicionaVertice('PR2');
$oGrafo->adicionaVertice('SP1');
$oGrafo->adicionaVertice('SP2');
$oGrafo->adicionaVertice('SP3');
$oGrafo->adicionaVertice('SP4');
$oGrafo->adicionaVertice('SP5');
$oGrafo->adicionaVertice('MG1');
$oGrafo->adicionaVertice('MG2');
$oGrafo->adicionaVertice('MG3');
$oGrafo->adicionaVertice('RJ1');
$oGrafo->adicionaVertice('RJ2');
$oGrafo->adicionaVertice('RJ3');
$oGrafo->adicionaVertice('ES1');
$oGrafo->adicionaVertice('MS1');
$oGrafo->adicionaVertice('GO1');
$oGrafo->adicionaVertice('GO2');
$oGrafo->adicionaVertice('DF1');
$oGrafo->adicionaVertice('BA1');
$oGrafo->adicionaVertice('BA2');
$oGrafo->adicionaVertice('MT1');
$oGrafo->adicionaVertice('TO1');
$oGrafo->adicionaVertice('SE1');
$oGrafo->adicionaVertice('PI1');
$oGrafo->adicionaVertice('MA1');
$oGrafo->adicionaVertice('AL1');
$oGrafo->adicionaVertice('PE1');
$oGrafo->adicionaVertice('PE2');
$oGrafo->adicionaVertice('PB1');
$oGrafo->adicionaVertice('CE1');
$oGrafo->adicionaVertice('CE2');
$oGrafo->adicionaVertice('RN1');
$oGrafo->adicionaVertice('PA1');
$oGrafo->adicionaVertice('AM1');
$oGrafo->adicionaVertice('AP1');
$oGrafo->adicionaVertice('RR1');
$oGrafo->adicionaVertice('AC1');
$oGrafo->adicionaVertice('RO1');


$oGrafo->adicionaAresta('RS1', 'RS2', 12);
$oGrafo->adicionaAresta('RS1', 'SC1', 6);
$oGrafo->adicionaAresta('RS1', 'SC2', 3);

$oGrafo->adicionaAresta('RS2', 'RS1', 12);
$oGrafo->adicionaAresta('RS2', 'SC1', 2);
$oGrafo->adicionaAresta('RS2', 'SC2', 2);

$oGrafo->adicionaAresta('SC1', 'SC2', 5);
$oGrafo->adicionaAresta('SC1', 'PR1', 2);
$oGrafo->adicionaAresta('SC1', 'RS1', 6);
$oGrafo->adicionaAresta('SC1', 'RS2', 1);
$oGrafo->adicionaAresta('SC1', 'AC1', 1);

$oGrafo->adicionaAresta('SC2', 'PR2', 3);
$oGrafo->adicionaAresta('SC2', 'SC1', 5);
$oGrafo->adicionaAresta('SC2', 'RS1', 6);
$oGrafo->adicionaAresta('SC2', 'RS2', 1);
$oGrafo->adicionaAresta('SC2', 'SP3', 1);

$oGrafo->adicionaAresta('PR1', 'PR2', 1);
$oGrafo->adicionaAresta('PR1', 'SC1', 2);
$oGrafo->adicionaAresta('PR1', 'SP2', 3);

$oGrafo->adicionaAresta('PR2', 'PR1', 1);
$oGrafo->adicionaAresta('PR2', 'SC2', 2);
$oGrafo->adicionaAresta('PR2', 'SP3', 2);

$oGrafo->adicionaAresta('SP1', 'SP2', 2);
$oGrafo->adicionaAresta('SP1', 'SP4', 10);
$oGrafo->adicionaAresta('SP1', 'MG3', 2);
$oGrafo->adicionaAresta('SP1', 'MS1', 7);

$oGrafo->adicionaAresta('SP2', 'SP1', 3);
$oGrafo->adicionaAresta('SP2', 'PR1', 2);
$oGrafo->adicionaAresta('SP2', 'MS1', 5);
$oGrafo->adicionaAresta('SP2', 'SP3', 8);

$oGrafo->adicionaAresta('SP3', 'SP4', 5);
$oGrafo->adicionaAresta('SP3', 'SP5', 2);
$oGrafo->adicionaAresta('SP3', 'PR2', 5);
$oGrafo->adicionaAresta('SP3', 'SC2', 6);
$oGrafo->adicionaAresta('SP3', 'SP2', 13);

$oGrafo->adicionaAresta('SP4', 'SP3', 10);
$oGrafo->adicionaAresta('SP4', 'SP5', 6);
$oGrafo->adicionaAresta('SP4', 'MG1', 3);
$oGrafo->adicionaAresta('SP4', 'MG3', 4);
$oGrafo->adicionaAresta('SP4', 'SP1', 1);

$oGrafo->adicionaAresta('SP5', 'SP3', 13);
$oGrafo->adicionaAresta('SP5', 'SP4', 3);
$oGrafo->adicionaAresta('SP5', 'MG1', 7);
$oGrafo->adicionaAresta('SP5', 'RJ3', 1);

$oGrafo->adicionaAresta('MG1', 'RJ1', 4);
$oGrafo->adicionaAresta('MG1', 'RJ2', 7);
$oGrafo->adicionaAresta('MG1', 'SP5', 2);
$oGrafo->adicionaAresta('MG1', 'SP4', 2);
$oGrafo->adicionaAresta('MG1', 'MG3', 2);
$oGrafo->adicionaAresta('MG1', 'DF1', 9);

$oGrafo->adicionaAresta('MG2', 'DF1', 15);
$oGrafo->adicionaAresta('MG2', 'ES1', 2);
$oGrafo->adicionaAresta('MG2', 'BA1', 12);

$oGrafo->adicionaAresta('MG3', 'DF1', 2);
$oGrafo->adicionaAresta('MG3', 'SP1', 1);
$oGrafo->adicionaAresta('MG3', 'SP4', 2);
$oGrafo->adicionaAresta('MG3', 'MG1', 3);

$oGrafo->adicionaAresta('RJ1', 'RJ2', 2);
$oGrafo->adicionaAresta('RJ1', 'MG1', 8);
$oGrafo->adicionaAresta('RJ1', 'ES1', 7);

$oGrafo->adicionaAresta('RJ2', 'RJ1', 2);
$oGrafo->adicionaAresta('RJ2', 'MG1', 8);
$oGrafo->adicionaAresta('RJ2', 'RJ3', 1);

$oGrafo->adicionaAresta('RJ3', 'RJ2', 1);
$oGrafo->adicionaAresta('RJ3', 'SP5', 1);

$oGrafo->adicionaAresta('ES1', 'RJ1', 15);
$oGrafo->adicionaAresta('ES1', 'DF1', 7);
$oGrafo->adicionaAresta('ES1', 'MG2', 9);
$oGrafo->adicionaAresta('ES1', 'SE1', 4);

$oGrafo->adicionaAresta('MS1', 'RO1', 7);
$oGrafo->adicionaAresta('MS1', 'MT1', 8);
$oGrafo->adicionaAresta('MS1', 'SP2', 7);
$oGrafo->adicionaAresta('MS1', 'SP1', 15);
$oGrafo->adicionaAresta('MS1', 'GO1', 17);

$oGrafo->adicionaAresta('GO1', 'MS1', 7);
$oGrafo->adicionaAresta('GO1', 'GO2', 8);
$oGrafo->adicionaAresta('GO1', 'DF1', 1);

$oGrafo->adicionaAresta('GO2', 'GO1', 8);
$oGrafo->adicionaAresta('GO2', 'MT1', 2);
$oGrafo->adicionaAresta('GO2', 'DF1', 18);

$oGrafo->adicionaAresta('DF1', 'GO2', 9);
$oGrafo->adicionaAresta('DF1', 'GO1', 2);
$oGrafo->adicionaAresta('DF1', 'MG3', 3);
$oGrafo->adicionaAresta('DF1', 'MG1', 9);
$oGrafo->adicionaAresta('DF1', 'ES1', 1);
$oGrafo->adicionaAresta('DF1', 'MG2', 2);
$oGrafo->adicionaAresta('DF1', 'BA2', 11);
$oGrafo->adicionaAresta('DF1', 'TO1', 7);

$oGrafo->adicionaAresta('BA1', 'MG2', 12);
$oGrafo->adicionaAresta('BA1', 'BA2', 6);
$oGrafo->adicionaAresta('BA1', 'PI1', 2);
$oGrafo->adicionaAresta('BA1', 'PE2', 4);
$oGrafo->adicionaAresta('BA1', 'SE1', 3);

$oGrafo->adicionaAresta('BA2', 'TO1', 11);
$oGrafo->adicionaAresta('BA2', 'DF1', 6);
$oGrafo->adicionaAresta('BA2', 'BA1', 14);

$oGrafo->adicionaAresta('MT1', 'RO1', 15);
$oGrafo->adicionaAresta('MT1', 'MS1', 18);
$oGrafo->adicionaAresta('MT1', 'GO2', 20);
$oGrafo->adicionaAresta('MT1', 'TO1', 19);
$oGrafo->adicionaAresta('MT1', 'PA1', 11);

$oGrafo->adicionaAresta('TO1', 'PA1', 7);
$oGrafo->adicionaAresta('TO1', 'MA1', 14);
$oGrafo->adicionaAresta('TO1', 'PI1', 20);
$oGrafo->adicionaAresta('TO1', 'BA2', 7);
$oGrafo->adicionaAresta('TO1', 'DF1', 2);
$oGrafo->adicionaAresta('TO1', 'MT1', 11);

$oGrafo->adicionaAresta('SE1', 'AL1', 4);
$oGrafo->adicionaAresta('SE1', 'ES1', 2);
$oGrafo->adicionaAresta('SE1', 'BA1', 2);
$oGrafo->adicionaAresta('SE1', 'PE2', 2);

$oGrafo->adicionaAresta('PI1', 'BA1', 4);
$oGrafo->adicionaAresta('PI1', 'TO1', 7);
$oGrafo->adicionaAresta('PI1', 'PA1', 16);
$oGrafo->adicionaAresta('PI1', 'MA1', 4);
$oGrafo->adicionaAresta('PI1', 'CE1', 5);
$oGrafo->adicionaAresta('PI1', 'PE2', 3);

$oGrafo->adicionaAresta('MA1', 'CE1', 2);
$oGrafo->adicionaAresta('MA1', 'AP1', 16);
$oGrafo->adicionaAresta('MA1', 'PA1', 3);
$oGrafo->adicionaAresta('MA1', 'TO1', 5);
$oGrafo->adicionaAresta('MA1', 'PI1', 5);

$oGrafo->adicionaAresta('AL1', 'PE1', 2);
$oGrafo->adicionaAresta('AL1', 'SE1', 1);

$oGrafo->adicionaAresta('PE1', 'PB1', 1);
$oGrafo->adicionaAresta('PE1', 'AL1', 7);
$oGrafo->adicionaAresta('PE1', 'PE2', 1);

$oGrafo->adicionaAresta('PE2', 'PE1', 3);
$oGrafo->adicionaAresta('PE2', 'PB1', 2);
$oGrafo->adicionaAresta('PE2', 'SE1', 7);
$oGrafo->adicionaAresta('PE2', 'BA1', 7);
$oGrafo->adicionaAresta('PE2', 'PI1', 8);
$oGrafo->adicionaAresta('PE2', 'CE2', 2);

$oGrafo->adicionaAresta('PB1', 'RN1', 1);
$oGrafo->adicionaAresta('PB1', 'PE1', 8);
$oGrafo->adicionaAresta('PB1', 'PE2', 1);

$oGrafo->adicionaAresta('CE1', 'RN1', 5);
$oGrafo->adicionaAresta('CE1', 'CE2', 3);
$oGrafo->adicionaAresta('CE1', 'MA1', 2);
$oGrafo->adicionaAresta('CE1', 'PI1', 6);

$oGrafo->adicionaAresta('CE2', 'RN1', 2);
$oGrafo->adicionaAresta('CE2', 'CE1', 2);
$oGrafo->adicionaAresta('CE2', 'PE2', 9);

$oGrafo->adicionaAresta('RN1', 'CE1', 1);
$oGrafo->adicionaAresta('RN1', 'CE2', 6);
$oGrafo->adicionaAresta('RN1', 'PB1', 9);

$oGrafo->adicionaAresta('PA1', 'AP1', 19);
$oGrafo->adicionaAresta('PA1', 'RR1', 11);
$oGrafo->adicionaAresta('PA1', 'AM1', 3);
$oGrafo->adicionaAresta('PA1', 'RO1', 5);
$oGrafo->adicionaAresta('PA1', 'MT1', 2);
$oGrafo->adicionaAresta('PA1', 'TO1', 1);
$oGrafo->adicionaAresta('PA1', 'PI1', 16);
$oGrafo->adicionaAresta('PA1', 'MA1', 22);

$oGrafo->adicionaAresta('AM1', 'PA1', 2);
$oGrafo->adicionaAresta('AM1', 'RR1', 2);
$oGrafo->adicionaAresta('AM1', 'AC1', 6);
$oGrafo->adicionaAresta('AM1', 'RO1', 6);

$oGrafo->adicionaAresta('AP1', 'RR1', 5);
$oGrafo->adicionaAresta('AP1', 'PA1', 1);
$oGrafo->adicionaAresta('AP1', 'MA1', 3);

$oGrafo->adicionaAresta('RR1', 'AM1', 16);
$oGrafo->adicionaAresta('RR1', 'PA1', 2);
$oGrafo->adicionaAresta('RR1', 'AP1', 3);

$oGrafo->adicionaAresta('AC1', 'SC1', 1);
$oGrafo->adicionaAresta('AC1', 'AM1', 6);
$oGrafo->adicionaAresta('AC1', 'RO1', 3);

$oGrafo->adicionaAresta('RO1', 'AM1', 17);
$oGrafo->adicionaAresta('RO1', 'AC1', 11);
$oGrafo->adicionaAresta('RO1', 'MS1', 22);
$oGrafo->adicionaAresta('RO1', 'MT1', 6);
$oGrafo->adicionaAresta('RO1', 'PA1', 3);

$sInicio = 'SC1';
$sFim = 'RS1';

$aResultado = $oGrafo->algoritmoDjikstra($sInicio, $sFim);

echo "Caminho mais curto de $sInicio a $sFim: " . implode(' -> ', $aResultado['path']) . "\n";
echo "Distância total: " . $aResultado['distancia'] . "\n";

?>
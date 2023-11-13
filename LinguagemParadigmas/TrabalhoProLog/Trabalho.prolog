1 - Nomes e Idades

pessoa(joao, 25).
pessoa(maria, 35).
pessoa(pedro, 40).
pessoa(ana, 28).
pessoa(lucas, 32).
pessoa(carla, 26).
pessoa(fernando, 45).
pessoa(camila, 22).
pessoa(alberto, 31).
pessoa(clara, 29).

pessoas_mais_de_30(Nome) :-
    pessoa(Nome, Idade),
    Idade > 30.

2 - Cores e Objetos
cor_objeto(verde, maça).
cor_objeto(azul, carro).
cor_objeto(vermelho, caneta).
cor_objeto(amarelo, banana).
cor_objeto(preto, laptop).
cor_objeto(branco, livro).
cor_objeto(roxo, caderno).
cor_objeto(rosa, celular).
cor_objeto(marrom, mesa).
cor_objeto(laranja, abajur).

cor_associada_objeto(Cor, Objeto) :-
    cor_objeto(Cor, Objeto).

3 - Cidades e Países
cidade_pais(paris, franca).
cidade_pais(berlim, alemanha).
cidade_pais(londres, reino_unido).
cidade_pais(tokyo, japao).
cidade_pais(nova_york, estados_unidos).
cidade_pais(roma, italia).
cidade_pais(sydney, australia).
cidade_pais(rio_de_janeiro, brasil).
cidade_pais(pequim, china).
cidade_pais(moscou, russia).

cidades_em_pais(Pais, Cidade) :-
    cidade_pais(Cidade, Pais).

4 - Produtos, Preços e Estoque
produto(preco_estoque(computador, 1000, 5)).
produto(preco_estoque(livro, 20, 10)).
produto(preco_estoque(camiseta, 15, 20)).
produto(preco_estoque(celular, 500, 8)).
produto(preco_estoque(cadeira, 50, 3)).
produto(preco_estoque(teclado, 30, 15)).
produto(preco_estoque(relogio, 100, 7)).
produto(preco_estoque(sapato, 40, 12)).
produto(preco_estoque(monitor, 150, 4)).
produto(preco_estoque(bolsa, 25, 18)).

produto_em_falta(Produto) :-
    produto(preco_estoque(Produto, _, Estoque)),
    Estoque = 0.

5 - Músicas e Gêneros
musica_genero(happy_song, pop).
musica_genero(rock_anthem, rock).
musica_genero(jazz_vibes, jazz).
musica_genero(dance_beat, eletronica).
musica_genero(country_tune, country).
musica_genero(rap_flow, rap).
musica_genero(blues_jam, blues).
musica_genero(reggae_groove, reggae).
musica_genero(classical_melody, classica).
musica_genero(indie_vibe, indie).

musicas_do_genero(Genero, Musica) :-
    musica_genero(Musica, Genero).

6 - Animais e Espécies
animal(esquilo, mamifero).
animal(papagaio, ave).
animal(tubarao, peixe).
animal(elefante, mamifero).
animal(tigre, mamifero).
animal(crocodilo, reptil).
animal(borboleta, inseto).
animal(aguia, ave).
animal(hipopotamo, mamifero).
animal(cobra, reptil).

animais_da_especie(Especie, Animal) :-
    animal(Animal, Especie).

7 - Alunos e Notas
aluno(natalia, 8).
aluno(pedro, 4).
aluno(beatriz, 6).
aluno(gustavo, 9).
aluno(mariana, 3).
aluno(rafael, 7).
aluno(ana_clara, 5).
aluno(lucas, 8).
aluno(isabela, 2).
aluno(felipe, 6).

aprovado_aluno(Aluno) :-
    aluno(Aluno, Nota),
    Nota >= 5.

8 - Cidades e Distâncias
distancia_cidades(paris, berlin, 1000).
distancia_cidades(paris, london, 500).
distancia_cidades(berlin, london, 700).
distancia_cidades(tokyo, sydney, 8000).
distancia_cidades(ny, la, 4000).
distancia_cidades(rome, berlin, 1200).
distancia_cidades(rio, sao_paulo, 400).
distancia_cidades(moscow, beijing, 5000).
distancia_cidades(beijing, tokyo, 1500).
distancia_cidades(sydney, auckland, 1200).

cidade_mais_proxima(CidadeOrigem, CidadeProxima) :-
    distancia_cidades(CidadeOrigem, CidadeProxima, Distancia),
    \+ (distancia_cidades(CidadeOrigem, OutraCidade, OutraDistancia), OutraDistancia < Distancia).

9 - Países, Capitais e Línguas
pais_capital_lingua(brasil, brasilia, portugues).
pais_capital_lingua(eua, washington_dc, ingles).
pais_capital_lingua(italia, roma, italiano).
pais_capital_lingua(japao, tokyo, japones).
pais_capital_lingua(china, pequin, mandarim).
pais_capital_lingua(alemanha, berlin, alemao).
pais_capital_lingua(russia, moscou, russo).
pais_capital_lingua(franca, paris, frances).
pais_capital_lingua(reino_unido, londres, ingles).
pais_capital_lingua(australia, camberra, ingles).

paises_com_lingua(Lingua, Pais) :-
    pais_capital_lingua(Pais, _, Lingua).

10 - Ingredientes e Receitas
receita(omelete, [ovo, queijo, tomate, sal]).
receita(bolo_chocolate, [farinha, acucar, chocolate, ovos]).
receita(salada_caesar, [alface, croutons, parmesao, molho]).
receita(sopa_cebola, [cebola, caldo_carne, queijo, pao]).
receita(pizza, [massa, molho_tomate, queijo, pepperoni]).
receita(torta_limao, [limao, leite_condensado, bolacha, manteiga]).
receita(macarrao_alho_oleo, [macarrao, alho, azeite, sal]).
receita(sushi, [arroz, alga, peixe, vinagre]).
receita(cafe, [cafe, agua, acucar]).
receita(smoothie, [banana, morango, iogurte, mel]).

receitas_com_ingrediente(Ingrediente, Receita) :-
    receita(Receita, Ingredientes),
    member(Ingrediente, Ingredientes).
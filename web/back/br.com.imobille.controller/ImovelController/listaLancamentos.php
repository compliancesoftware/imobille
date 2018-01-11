<?php
    require('../../../classloader.php');
    
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $imoveis = array();

    $construcao = new Construcao();
    $construcao->setId(1);
    $construcao->setTemAcessibilidade(false);
    $construcao->setNome('Edifício Gran Harmonia');
    $construcao->setCapa('http://app.smart.youdigital.com.br//arquivos/smart/390/fotos/241295_01.jpg');
    $construcao->setElevadoresDeServico(1);
    $construcao->setElevadoresSociais(1);
    $construcao->setIniciaObrasEm(null);
    $construcao->setAtualizadoEm(null);

    $endereco = new Endereco();
    $endereco->setId(1);
    $endereco->setEndereco('Rua da Harmonia');
    $endereco->setBairro('Casa Amarela');
    $endereco->setCidade('Recife');
    $endereco->setEstado('PE');
    $endereco->setComplemento('');
    $endereco->setNumero('305');
    $endereco->setCep('52051395');
    $endereco->setLatitude('-8.0236299');
    $endereco->setLongitude('-34.91631');
    $endereco->setCriadoEm(null);
    $endereco->setCriadoPor(null);
    $endereco->setAtualizadoEm(null);
	$endereco->setAtualizadoPor(null);

    $construtora = new Construtora();
    $construtora->setId(1);
    $construtora->setNome('Construtora Romarco');
    $construtora->setLogo('');
    $construtora->setResponsavel('Teste');
    $construtora->setContato('teste');
    $construtora->setEmail('teste@teste.com.br');
    $construtora->setEndereco(null);
    $construtora->setCriadoEm(null);
    $construtora->setCriadoPor(null);
    $construtora->setAtualizadoEm(null);
    $construtora->setAtualizadoPor(null);

    $construcao->setEndereco($endereco);
    $construcao->setConstrutora($construtora);
    $construcao->setAnunciarLancamento(true);
    $construcao->setCriadoPor(null);
    $construcao->setAtualizadoPor(null);

    $imovel = new Imovel();
    $imovel->setId(1);
    $imovel->setDisponivel(true);
    $imovel->setProgresso(null);
    $imovel->setQuartosComSuite(1);
    $imovel->setQuartosSemSuite(2);
    $imovel->setTipo('Apartamento'); // pode ser 'Casa', 'Apartamento', 'Galpão', 'Armazém', 'Ponto Comercial'
    $imovel->setModelo('Novo');// pode ser 'Novo', 'Usado', 'Aluguel'
    $imovel->setCaptadoEm(null);
    $imovel->setCriadoEm(null);
    $imovel->setDescricao('Lindo apartamento');
    $imovel->setSalasDeJantar(1);
    $imovel->setAndares(1);
    $imovel->setCategoriaDeAndares('Normal');// pode ser 'Normal','Duplex' ou 'Trilex'
    $imovel->setTemVaranda(true);
    $imovel->setTemHomeOffice(false);
    $imovel->setArea(53.0);
    $imovel->setAreaUtil(51.0);
    $imovel->setSalasDeEstar(1);
    $imovel->setNumero('101');
    $imovel->setVagasDeEstacionamento(1);
    $imovel->setBanheirosSociais(1);
    $imovel->setPosicaoDoSol('Nascente');// pode ser 'Nascente' ou 'Poente'
    $imovel->setAtualizadoEm(null);
    $imovel->setPreco(330000.01);
    $imovel->setConstrucao($construcao);
    $imovel->setCaptadoPor(null);
    $imovel->setCriadoPor(null);
    $imovel->setAtualizadoPor(null);

    $imoveis[] = $imovel;
    $imoveis[] = $imovel;
    $imoveis[] = $imovel;
    $imoveis[] = $imovel;
    
    echo Jsonify::arrayToJson($imoveis);
?>
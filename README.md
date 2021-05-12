
# Api Store Management

Projeto consiste no desenvolvimento de uma API que atenda os requisitos descritos abaixo, utilizando boas práticas de programação, SOLID, Design Patters e etc.

Repositório original: https://github.com/telium-networks/coding-test-sr

# O problema

Precisamos que você desenvolva uma API REST, em Laravel 5.4 (ou maior) e PHP 7, que irá servir de apoio a um sistema de gerenciamento de diversas lojas.

O sistema será utilizado por lojas e seus funcionários. Esse funcionário associado deve receber um email avisando-o que foi registrado na plataforma. Fique livre para propor a modelagem da relação lojas e funcionários.

O funcionário deve ser capaz de realizar o CRUD de:

- Produtos: código, nome, descrição, quantidade em estoque, preço e atributos que podem variar de produto para produto;
- Pedidos: codigo do pedido, data da compra, nome do comprador, status do pedido (novo, pago, entregue e cancelado), valor do frete e lista de itens do pedido (produto, quantidade e preço);

O sistema deve fornecer os seguintes relatórios, para cada loja:

- Produtos mais vendidos;
- Produtos com baixo estoque (estoque menor que 3);
- Ticket médio (você pode utilizar a formula Valor Total de Vendas/Numero de Vendas, mas pode sugerir outro calculo para definir o ticket médio. Caso decida utilizar outra formula, favor especificar qual)

Considerações importantes:

- Não permitir criação de pedido com um produto inexistente;
- Não permitir criação de pedido com um produto que não está disponivel em estoque;
- Manter o estoque de cada loja atualizado de acordo com os pedidos;
- O sistema deve exigir a autenticação do funcionário, quando necessário;
- Dados de inserção devem ser validadas;
- Erros devem ser tratados;
- Sistema deve ser seguro e as suas informações, consistentes
## O projeto está em progresso, mas fique a vontade para testar até o ponto atual seguindo os passos abaixo :)

## Instalação 

### 1. Clonar o projeto

```bash
git clone https://github.com/WenLopes/api-store-management
```


### 2. Configure as variáveis de ambiente
*Na **raiz do projeto**, crie o arquivo .env do **DOCKER** utilizando o arquivo .env.example como base. Modifique o valor das variáveis de acordo com a sua preferência.*

```bash
cp .env_example .env
```


*(Opcional) Se desejar, altere as portas padrão da aplicação no arquivo .env*

### 3. Na raíz do projeto, execute o comando:
```bash
docker-compose up --build
```


### 4. Instalando as dependências e configurando a API
*4.1 Instale as dependências do Laravel executando o comando na **raiz do projeto**:*
```bash
docker-compose exec php7_base composer install
```


*4.2 Corriga as permissões dos diretórios, executando os comandos abaixo no diretório **api**:*

```bash
sudo chgrp -R www-data storage bootstrap/cache
```


```bash
sudo chmod -R ug+rwx storage bootstrap/cache
```


*4.3 Crie o arquivo .env do diretório **api**, utilizando o .env.example como base:*

```bash
cp .env_example .env
```


*(Opcional) Se desejar, altere o email e senha padrão do funcionário que irá representar nosso usuário do banco de dados*

*4.4 Gere a chave do projeto executando o comando na **raiz do projeto**:*

```bash
docker-compose exec php7_base php artisan key:generate
```


*4.5 Gere a chave do JWT executando o comando na **raiz do projeto**:*

```bash
docker-compose exec php7_base php artisan jwt:secret
```


*4.6 Rode as migrations e Seeders executando o comando na **raiz do projeto**:*

```bash
docker-compose exec php7_base php artisan migrate:refresh --seed
```

## Rodando os testes

Na **raiz do projeto**, execute o comando:

```bash
docker-compose exec php7_base vendor/bin/phpunit
```
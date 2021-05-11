
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
## Trabalho em progresso :)  
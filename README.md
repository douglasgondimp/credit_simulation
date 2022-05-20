## Sobre o projeto

O projeto tem por finalidade simular emprestimos através de instituições e convênios.

## Executando o projeto

1) Importe o arquivo `/project-simulation-credit_insomnia-collection.json` para o Insomnia.

2) Acesse pelo terminal a pasta do projeto e execute o comando `php artisan serve` para executar o servidor de desenvolvimento PHP do Laravel.

3) Utilize o Insomnia para realizar as consultas.

Para a requisição POST, o envio dos dados são em formato JSON com os campos:
* `valor_emprestimo`: obrigatório | float;
* `instituicoes`: opcional | array;
* `convenios`: opcional | array;
* `parcela`: opcional | inteiro; 
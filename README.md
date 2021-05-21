Projeto foi desenvolvido utilizando Laravel 8 com MYSQL

Instruções para execução

Requisitos: 
1 - php 7.3 ou superior
2 - MYSQL 5 ou superior

Instruções:

1 - Git Clone do Projeto https://github.com/edisondouglas/teste-santri-solucoes.git

2 - Na raiz do projeto criar Arquivo .env com as credenciais do banco de dados, existe um arquivo .env.example como exemplo.

3 - Executar os seguintes comandos na raiz do projeto
composer install

php artisan migrate

php artisan db:seed

php artisan key:generate

4 - Para executar o servidor:

php artisan serve

5 - O comando db:seed inseriu alguns usuários, credenciais do usuário com maior permissão:

login: admin@admin.com
senha: admin123

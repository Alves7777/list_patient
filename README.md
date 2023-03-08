# Patient list
Projeto patient_list

# Instalação

### Clone o projeto
`git clone https://github.com/Alves7777/patient_list`
      

### Execute o comando abaixo no terminal para adquirir o .env

`cp .env.example .env`

### Crie o banco de dados e adicione no .env

`DB_DATABASE=patient_list`<br>
 `DB_USERNAME=*****` <br>
 `DB_PASSWORD=*****`

### Execute o comando abaixo no terminal para rodar e instalar o docker

`docker-compose up -d`

### Execute o comando abaixo para instalar as dependências do laravel

`sudo composer install`

### Execute o comando a seguir para gerar as tabelas do banco de dados

`docker-compose exec laravel_8 php artisan migrate:fresh`

### Execute o comando a seguir para gerar dados iniciais

`docker-compose exec laravel_8 php artisan db:seed`

### Pronto, agora é só colocar no navegador `http://127.0.0.1:8180` para acessar a aplicação

### Acesse o POSTMAN pra gerar o token
### Adicione a rota no método POST com email e senha em formato JSON

`Rota - POST: http://127.0.0.1:8180/api/auth` <br>
`email: lucas@gmail.com` <br>
`senha: 12345678`

### Em seguida, copie o token e cole nos HEADER nas demais ROTAS do projeto.
### Exemplo HEADER:
`New header: Authorization    | New value: cole o token` <br>
`New header: X-Requested-With | New value: XMLHttpRequest` <br>
`New header: Content-Type     | New value: application/json` <br>

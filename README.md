# [Teste Backend] NanoIncub
## Dashboard para gerenciamento de moeda virtual como bonificação para os funcionários

*O Dashboard fornece uma solução para gerenciar uma moeda digital onde os funcionários terão um saldo e essas moeda podem ser convertidos em recarga para celular, compra de produtos, etc.*

## Instalação

Clonar projeto no seu computador:

```bash
  git clone https://github.com/Luciano-Junior/NanoIncub.git
```

Executar o comando composer install:

```bash
  composer install
```

- Criar banco de dados

- Copiar arquivo ```.env.example``` e renomear para ```.env```

- Atualize as informações do seu banco local no arquivo ```.env``` de acordo com seu banco de dados
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nano
DB_USERNAME=root
DB_PASSWORD=
``` 

- Executar o comando abaixo para criação das tabelas no banco de dados e preencher banco de tabelas.
```bash
php artisan migrate --seed
``` 

- Executar comando abaixo para rodar o projeto
```bash
  php artisan serve
``` 
### Instruções de acesso

- Acesso de Administrador
Login: administrador@nanoincub.com.br 
Senha: password

### Tecnologias

Desenvolvido com as tecnologias:

- [PHP](https://www.php.net/)
- [LARAVEL](https://laravel.com/)


## Development

Desenvolvedor: Luciano Junior
Email: tec.luciano.ti@gmail.com
[GitHub](https://github.com/Luciano-Junior)
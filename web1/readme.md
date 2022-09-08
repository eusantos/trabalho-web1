<p align="center">
  <img src="https://github.com/eusantos/trabalho-web1/blob/master/web1/img/about_us.png">
</p>

# Trabalho de WEB 1 - UFPR - 2022
Trabalho desenvolvido para a disciplina de Desenvolvimento Web 1, do professor Alex, da universidade Federal do Paraná.

O tema deste trabalho era livre, então decidi criar um blog, proximo da sugestão dada pelo proprio professor, mas focando no tema especifico da divulgação cientifica.

Escolhi seguir como referencia o site [Inovação Tecnologica](https://www.inovacaotecnologica.com.br/), o qual visito diariamente.

## O trabalho
Esse trabalho foi desenvolvido em `PHP`, com `HTML5`, `CSS3` e `JS`.
O banco de dados utilizando foi o `MySql`.

### O sistema consiste num blog com as seguintes paginas e funcionalidades:

- Header
  - Exibido em todas as paginas da aplicação, exceto login
  - Exibe um menu com link para home, lista de artigos e "logar/cadastrar/deslogar"
- Footer
  - Exibe informações basicas, e tambem um barra lateral com o "Sobre nós" e link para categorias dos artigos
- Login/cadastro
  - Exibe formularios de login e novo cadastro
  - Quando um novo cadastro é criado, apenas o formulario de login é exibido
  - O logout é realizado pelo menu no header das paginas
- Pagina inicial
  - Uma pagina com os ultimos 5 artigos publicados, exibindo titulo, resumo e tumbnail do artigo
  - Para adminstradores, tambem é exibido um botão para novas publicações e um botão para editar cada postagem
- Novo artigo
  - Pagina acessivel apenas por administradores
  - Formulario para preenchimento e publicação de um artigo
  - Se fornecido o id de um artigo existente no get da pagina, abre em modo de edição do artigo
  - Quando um artigo é criado, sua categoria é criada tambem, se ja não existir
- Artigos
  - Assim como na pagina inicial, exibe o resumor de artigos, mas exibe todos e não apenas os 5 ultimos
  - Se fornecido o id de uma categoria via get, filtra os artigos pela categoria fornecida
  - Tambem exibe os botões de novo artigo e edição de artigos
- Artigo
  - Exibe o artigo completo, podendo renderizar tags HTML para um texto mais rico
  - Para administrador exibe o botão de edição do artigo
  - Para usuarios logados, exibe um formulario para inserir comentarios, e uma lista dos comentarios realizados
  - Para administradores, exibe um botão em cada  comentario, para sua exclusão. Uma confirmação é exigida.

## Como executar

Para rodar essa aplicação é necessario que o projeto esteja na pasta do servidor Apache, e o MySql esteja rodando.

- O arquivo db/db_credential.php devce ser editado para as credenciais corretas do banco de dados.
- Acessar o servidor, na url `{base_url_do_projeto}/db/setup/db_setup.php`. Esse criara(ou recriará) o banco de dados com as tabelas e informações necessarias para rodar a aplicação.
- Um usuario adminstrador, com login: admin@admin.com e senha: admin for criado


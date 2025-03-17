# **Site Doces da Vovó**
## Descrição
O site Doces da Vovó tem como objetivo permitir que os clientes conheçam os produtos, vejam fotos e entrem em contato para fazer pedidos. Foram criados 3 paginas: index, nossa história e contato. O seu wireframe foi realizado no figma e pode ser acessado no link [figma: Doces da Vovó](https://www.figma.com/design/PCEw7zcyWOh1kaEDE44g9w/doces-da-vovo?m=auto&t=rd9ehFDVxSyD43xI-6). 

As cores ultilizadas foram: 
- #fff8f4;
- #bb826d;
- #fff8f4;
- #fccfbe;

É as fonts do [Google](https://www.bing.com/ck/a?!&&p=355f126c3574215cae20b9d21460f67c5fa6fe47af7e02d63d06cfaef7110c44JmltdHM9MTc0MjE2OTYwMA&ptn=3&ver=2&hsh=4&fclid=1e41393c-85c0-67c9-3553-2c9b84ec66b9&psq=google+fonts&u=a1aHR0cHM6Ly9mb250cy5nb29nbGUuY29tLw&ntb=1):
- [Carattere]()
- [Cardo]() 

## Tecnologias e ferramentas que serão utilizadas no projeto:
Para realizar este projeto é necessário conhecimentos nas linguagem de JavaScript, Php e Sql, além disso html e css. As ferramentas necessarias são Xampp e figma.

## Instalação
Para rodar este projeto localmente, siga os passos abaixo:

1. Clona repositório dentro da pasta c:\xampp\htdocs\:
```bash
git clone https://github.com/gi-alves/doces-da-vovo
```
2. Acessa na url http:/localhost/phpmyadmin é configura o banco de dados:
- Nome do banco: formulario
- Nome da tabela: tb_contato
- SQL
```sql:
  CREATE TABLE `tb_contato` (
  `nome` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `mensagem` text NOT NULL,
  `id_contato` int(11) NOT NULL
)
  ```

## Recomendações de segurança
1. - Satinização: Validação do E-mail para confirmar a entrada no inicio do processo.
2. - htmlspecialchars(): Converte caracteres especiais em entidadea de HTML;
3. - strip_tags(): Remove todas as tags HTML e PHP dos dados;
4. - Proteção contra SQL Injection: Usar consultas preparadas. 



# Sistema de Arranchamento 9º B Com GE

Esse é o sistema de arranchamento utilizado no 9º B Com GE. Não foi desenvolvido por mim, apenas refatorei, apliquei algumas melhorias e dockerizei.

## Fazer deploy

### Pré-requisitos
- ter [git](https://git-scm.com/downloads) instalado
- ter [docker](https://docs.docker.com/engine/install/) instalado
- ter acesso à internet

Clonar este repositório
```
git clone https://github.com/nixoletas/sistema-arranchamento.git
```

Acessar a pasta do projeto
```
cd sistema-arranchamento
```

compose up 
```
docker compose up -d
```
Acessar servidor em: http://localhost:8080 ou pelo IP do seu servidor

Acessar PhpMyAdmin: http://localhost:8090


## Sucesso do compose ✅
```bash
 ✔ Network sistema-arranchamento_sisrancho-network  Created                                                                                                     0.1s 
 ✔ Volume "sistema-arranchamento_db_data"           Created                                                                                                     0.0s 
 ✔ Container sisrancho-db                           Started                                                                                                     0.9s 
 ✔ Container sisrancho-php                          Started                                                                                                     0.9s 
 ✔ Container sisrancho-admin                        Started
 ```

 ## Estrutura de pastas

```
└── 📁sistema-arranchamento
    └── 📁assets
        └── 📁bootstrap-datepicker
        └── 📁css
        └── 📁font-awesome
        └── 📁img
        └── 📁js
            └── app-rancho.js
            └── app.js
            └── bootstrap.js
            └── jquery.js
            └── jquery.validate-1.15.0.js
            └── mask.js
        └── 📁TCPDF
    └── 📁controllers
        └── 📁config
            └── conexao.php
        └── app.php
        └── autentica.php
        └── bloqueios.php
        └── consulta.php
        └── registros.php
    └── 📁inc
        └── footer.php
        └── header.php
        └── skeleton.php
    └── 📁rancho
        └── 📁controllers
            └── arranchar-outra-om.php
            └── arranchar.php
            └── auditoria.php
            └── autentica.php
            └── militares.php
            └── militares.php_bkp
            └── organizacao.php
            └── pesquisa-militar.php
            └── registros.php
            └── usuarios.php
        └── 📁relatorios
            └── arranchados-outra-om.php
            └── arranchados.php
        └── 📁views
            └── modals.php
        └── home.php
        └── index.php
        └── logout.php
    └── 📁views
        └── 📁home
            └── inicio.php
        └── index.php
    └── .gitignore
    └── database.sql
    └── docker-compose.yml
    └── Dockerfile
    └── index.php
    └── logout.php
```
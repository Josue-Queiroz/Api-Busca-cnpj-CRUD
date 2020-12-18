# eduxe
PHP - PLENO | EDUXE - TEST

- Ações: Listagem, criação, edição e deleção (soft-delete) + Regras de transição.


Ferramentas utilizadas:

- Vs Code
- WampServer
- Node.js
- PostMan Agent


Todas as Migrates usadas esntão disponivel em:
- DataBase > migrations 
- Execução: php artisan migrate.


- Todas as buscas estão respeitando o status Soft-Delete


Consultas de API's
- Router Pricipal |  get->all()  /api/enterprises
- Router Epeficando busca |  Where->get()  /api/enterprises?cnpj=999

Consulta API CNPJ -> ReveitasWS, CNPJ com Validação de cnpj existente para proximos passos.
- Ps* Chave API FREE permite somente 3 consultas de cnpj por ( minuto ).


Consulta API CEP -> viacep, campos com preenchimento de automatico.
- Ps* API FREE Até o momento Ilimitado o numero de consultas.


Maskara de visualização expericencia do usuario: Imask.js

Usuario Login: não aplicada, desabilitada!




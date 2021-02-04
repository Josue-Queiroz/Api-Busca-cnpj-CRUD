# LARAVEL 8+

CRUD PHP -> Ações: Listagem, criação, edição e deleção (soft-delete) + Regras de transição.

Ferramentas utilizadas:
-Vs Code
-WampServer
-Node.js
-PostMan Agent


Todas as Migrates usadas estão disponivel em:
DataBase > migrationsExecução: php artisan migrate.

Todas as buscas estão respeitando o status Soft-Delete

Consultas de API's
- Router Principal | get->all() /api/enterprises
- Router Especificando busca | Where->get() /api/enterprises?cnpj=999

Consultas API:
- CNPJ -> ReveitasWS, CNPJ com Validação de CNPJ existente para próximos passos.
Ps* Chave API FREE permite somente 3 consultas de cnpj por ( minuto ).

Consulta API CEP -> viacep, campos com preenchimento automático.
Ps* API FREE Até o momento Ilimitado o número de consultas.

Máscara de visualização experiência do usuário: 
- Mask.js

Usuário Login: não aplicada, desabilitada!

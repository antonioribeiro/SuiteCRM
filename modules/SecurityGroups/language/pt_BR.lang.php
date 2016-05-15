<?php

$mod_strings = array (
  'LBL_ALL_MODULES'=>'Todos',//rost fix
  'LBL_ASSIGNED_TO_ID' => 'Id Usuário Atribuído',
  'LBL_ASSIGNED_TO_NAME' => 'Atribuído a',
  'LBL_ID' => 'ID',
  'LBL_DATE_ENTERED' => 'Data de Criação',
  'LBL_DATE_MODIFIED' => 'Data de Modificação',
  'LBL_MODIFIED' => 'Modificado Por',
  'LBL_MODIFIED_ID' => 'Modificado Por Id',
  'LBL_MODIFIED_NAME' => 'Modificado Por Nome',
  'LBL_CREATED' => 'Criado por',
  'LBL_CREATED_ID' => 'Criado Por Id',
  'LBL_DESCRIPTION' => 'Descrição',
  'LBL_DELETED' => 'Excluído',
  'LBL_NONINHERITABLE' => 'Não herdável.',
  'LBL_LIST_NONINHERITABLE' => 'Não herdável.',
  'LBL_NAME' => 'Nome',
  'LBL_CREATED_USER' => 'Criado por Usuário',
  'LBL_MODIFIED_USER' => 'Modificado por Usuário',
  'LBL_LIST_FORM_TITLE' => 'Grupos de segurança',
  'LBL_MODULE_NAME' => 'Gerenciamento de Grupos de Segurança',
  'LBL_MODULE_TITLE' => 'Gerenciamento de Grupos de Segurança',
  'LNK_NEW_RECORD' => 'Novo Grupo de Segurança',
  'LNK_LIST' => 'Listagem',
  'LBL_SEARCH_FORM_TITLE' => 'Busca: Gerenciamento de Grupos de Segurança',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Histórico',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Atividades',
  'LBL_SECURITYGROUPS_SUBPANEL_TITLE' => 'Gerenciamento de Grupos de Segurança',
  'LBL_USERS' => 'usuários:',
  'LBL_USERS_SUBPANEL_TITLE' => 'usuários:',
  'LBL_ROLES_SUBPANEL_TITLE' => 'Funções',
  
  'LBL_CONFIGURE_SETTINGS' => 'Configurar',
  'LBL_ADDITIVE' => 'Permissões Adicionais',
  'LBL_ADDITIVE_DESC' => "O usuário obtem os maiores direitos de toos os perfís associados a ele ou ao(s) seu(s) Grupo(s) de Segurança",
  'LBL_STRICT_RIGHTS' => 'Permissões Restritas',
  'LBL_STRICT_RIGHTS_DESC' => "Se um usuário for membro de vários grupos, serão usados apenas os respectivos direitos do grupo atribuído ao registro atual.",
  'LBL_USER_ROLE_PRECEDENCE' => 'Precedência de Perfís de Usuário',
  'LBL_USER_ROLE_PRECEDENCE_DESC' => 'Se um perfil está associado diretamente ao usuário, quele perfil tem precedência sobre qualquer outro grupo de perfís.',
  'LBL_INHERIT_TITLE' => 'Regra de Herança de Grupos de Segurança',
  'LBL_INHERIT_CREATOR' => 'Herdar do Usuário criador',
  'LBL_INHERIT_CREATOR_DESC' => 'O registro herdará todos os grupos associados ao usuário que o criou.',
  'LBL_INHERIT_PARENT' => 'Herdar de registro ancestral',
  'LBL_INHERIT_PARENT_DESC' => 'Por exemplo: se uma Ocorrência for criada por um contato, a ocorrência herdará do grupo associado ao contato.',
  'LBL_USER_POPUP' => 'Tela de seleção de Grupos de Segurança para Novos Usuários',
  'LBL_USER_POPUP_DESC' => 'Quando um novo usuário for criado, será exibida uma tela de seleção de Grupos de Segurança para associar o usuário ao(s) grupo(s).',
  'LBL_INHERIT_ASSIGNED' => 'Herdar do Usuário Responsável',
  'LBL_INHERIT_ASSIGNED_DESC' => 'O registro herdará todos os Grupos de Segurança do usuário responsável. Outros grupos associados ao registro <b>não</b> serão removidos.',
  'LBL_POPUP_SELECT' => 'Use Criador Grupo Select',
  'LBL_POPUP_SELECT_DESC' => 'Quando um registro é criado por um usuário em mais de um grupo mostrar um painel de selecção do grupo na tela de criação. Caso contrário herdar que um grupo.',
  'LBL_FILTER_USER_LIST' => 'Lista de usuário do filtro',
  'LBL_FILTER_USER_LIST_DESC' => "Os usuários Não-admin podem somente atribuir aos usuários nos mesmos grupo(s)",  
  
  'LBL_DEFAULT_GROUP_TITLE' => 'Grupo Padrão para Novos Registros',
  'LBL_ADD_BUTTON_LABEL' => 'Adicionar',
  'LBL_REMOVE_BUTTON_LABEL' => 'Remover',
  'LBL_GROUP' => 'Grupo:',
  'LBL_MODULE' => 'Módulo:',
  
  'LBL_MASS_ASSIGN' => 'Grupos de Segurança: Associação em Massa',
  'LBL_ASSIGN' => 'Atribuir [Alt+A]',
  'LBL_REMOVE' => 'Remover',
  'LBL_ASSIGN_CONFIRM' => 'Você tem certeza que quer adicionar este grupo a(o) ',
  'LBL_REMOVE_CONFIRM' => 'Você tem certeza que quer remover este grupo da(o) ',
  'LBL_CONFIRM_END' =>' resgistro(s) selecionado(s)?',
  
  'LBL_SECURITYGROUP_USER_FORM_TITLE' => 'Grupo de Segurança/Usuário',
  'LBL_USER_NAME' => 'Nome do usuário:',
  'LBL_SECURITYGROUP_NAME' => 'Grupo de Segurança',
  'LBL_LIST_USER_NONINHERITABLE' => 'Não herdável.',
  'LBL_HOMEPAGE_TITLE' => 'Mensagens do Grupo',
  'LBL_TITLE' => 'Título',
  'LBL_ROWS' => 'Linhas',
  'LBL_MAKE_POST' => 'Fazer um Post',
  'LBL_POST' => 'Publicar',
  'LBL_SELECT_GROUP' => 'Selecione um Grupo',
  'LBL_SELECT_GROUP_ERROR' => 'Por favor, selecione um grupo e tente novamente.',
  
  'LBL_HOOKUP_SELECT' => "Selecione um módulo",
  'LBL_HOOKUP_CONFIRM_PART1' => "Você está prestes a adicionar um relacionamento entre grupos de segurança e ",
  'LBL_HOOKUP_CONFIRM_PART2' => ". Continuar?",
  
  'LBL_GROUP_SELECT' => 'Selecionar quais grupos devem ter acesso a este registro',
  'LBL_ERROR_DUPLICATE' => 'Devido a uma possível duplicidade detectada pelo SuiteCRM, você terá que adicionar os Grupos de Segurança para seu novo registro criado manualmente.',

  'LBL_INBOUND_EMAIL' => 'Conta de e-mail de entrada',
  'LBL_INBOUND_EMAIL_DESC' => 'Só permitir o acesso a uma conta de e-mail se o usuário pertence a um grupo que é atribuído à conta de correio.',
  'LBL_PRIMARY_GROUP' => 'Grupo Principal',

);
?>
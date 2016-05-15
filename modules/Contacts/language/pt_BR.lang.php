<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2016 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

/*********************************************************************************
 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = array(
    //DON'T CONVERT THESE THEY ARE MAPPINGS
    'db_last_name' => 'LBL_LIST_LAST_NAME',
    'db_first_name' => 'LBL_LIST_FIRST_NAME',
    'db_title' => 'LBL_LIST_TITLE',
    'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
    'db_email2' => 'LBL_LIST_OTHER_EMAIL_ADDRESS',
    //END DON'T CONVERT
    'ERR_DELETE_RECORD' => 'Especifique o número do registro para excluir o contato.',
    'LBL_ACCOUNT_ID' => 'ID da Conta:',
    'LBL_ACCOUNT_NAME' => 'Nome da Conta:',
    'LBL_CAMPAIGN' => 'Campanha:',
    'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Atividades',
    'LBL_ADD_BUSINESSCARD' => 'Insira o Cartão de Visita',
    'LBL_ADDMORE_BUSINESSCARD' => 'Adicionar outro cartão de visita',
    'LBL_ADDRESS_INFORMATION' => 'Informações de Endereço',
    'LBL_ALT_ADDRESS_CITY' => 'Alternativo - Cidade:',
    'LBL_ALT_ADDRESS_COUNTRY' => 'Alternativo - País:',
    'LBL_ALT_ADDRESS_POSTALCODE' => 'Alternativo - CEP:',
    'LBL_ALT_ADDRESS_STATE' => 'Alternativo - Estado:',
    'LBL_ALT_ADDRESS_STREET_2' => 'Alternativo - Rua 2:',
    'LBL_ALT_ADDRESS_STREET_3' => 'Alternativo - Rua 3:',
    'LBL_ALT_ADDRESS_STREET' => 'Alternativo - Rua:',
    'LBL_ALTERNATE_ADDRESS' => 'Endereço Alternativo:',
    'LBL_ALT_ADDRESS' => 'Endereço Alternativo:',
    'LBL_ANY_ADDRESS' => 'Qualquer Endereço:',
    'LBL_ANY_EMAIL' => 'Qualquer Email:',
    'LBL_ANY_PHONE' => 'Qualquer Telefone:',
    'LBL_ASSIGNED_TO_NAME' => 'Atribuí­do a:',
    'LBL_ASSIGNED_TO_ID' => 'Usuário Atribuído',
    'LBL_ASSISTANT_PHONE' => 'Telefone do Assistente:',
    'LBL_ASSISTANT' => 'Assistente:',
    'LBL_BIRTHDATE' => 'Data de Nascimento:',
    'LBL_BUSINESSCARD' => 'Cartão de Visita',
    'LBL_CITY' => 'Cidade:',
    'LBL_CAMPAIGN_ID' => 'ID da Campanha',
    'LBL_CONTACT_INFORMATION' => 'Visão Geral',
    'LBL_CONTACT_NAME' => 'Nome do Contato:',
    'LBL_CONTACT_OPP_FORM_TITLE' => 'Contacto-Oportunidade:',
    'LBL_CONTACT_ROLE' => 'Função:',
    'LBL_CONTACT' => 'Contato:',
    'LBL_COUNTRY' => 'País:',
    'LBL_CREATED_ACCOUNT' => 'Criou uma nova conta',
    'LBL_CREATED_CALL' => 'Registrou uma nova ligação',
    'LBL_CREATED_CONTACT' => 'Criou um novo contato',
    'LBL_CREATED_MEETING' => 'Criou uma nova reunião',
    'LBL_CREATED_OPPORTUNITY' => 'Criou uma nova oportunidade',
    'LBL_DATE_MODIFIED' => 'Data de Modificação:',
    'LBL_DEFAULT_SUBPANEL_TITLE' => 'Contatos',
    'LBL_DEPARTMENT' => 'Departamento:',
    'LBL_DESCRIPTION_INFORMATION' => 'Informações da Descrição',
    'LBL_DESCRIPTION' => 'Descrição:',
    'LBL_DIRECT_REPORTS_SUBPANEL_TITLE' => 'Reporta a',
    'LBL_DO_NOT_CALL' => 'Não Telefonar:',
    'LBL_DUPLICATE' => 'Possíveis Contatos Duplicados',
    'LBL_EMAIL_ADDRESS' => 'Endereço de Email:',
    'LBL_EMAIL_OPT_OUT' => 'Não Recebe Emails:',
    'LBL_EXISTING_ACCOUNT' => 'Usada uma conta existente',
    'LBL_EXISTING_CONTACT' => 'Usado um contato existente',
    'LBL_EXISTING_OPPORTUNITY' => 'Usada uma oportunidade existente',
    'LBL_FAX_PHONE' => 'Fax:',
    'LBL_FIRST_NAME' => 'Nome:',
    'LBL_FULL_NAME' => 'Nome Completo:',
    'LBL_HISTORY_SUBPANEL_TITLE' => 'Histórico',
    'LBL_HOME_PHONE' => 'Início:',
    'LBL_ID' => 'ID:',
    'LBL_IMPORT_VCARD' => 'Importar vCard',
    'LBL_VCARD' => 'vCard',
    'LBL_IMPORT_VCARDTEXT' => 'Criar automaticamente um novo contato ao importar um vCard de seu computador.',
    'LBL_INVALID_EMAIL' => 'E-mail inválido:',
    'LBL_INVITEE' => 'Reporta a',
    'LBL_LAST_NAME' => 'Sobrenome:',
    'LBL_LEAD_SOURCE' => 'Origem do Lead:',
    'LBL_LIST_ACCEPT_STATUS' => 'Status do Convite',
    'LBL_LIST_ACCOUNT_NAME' => 'Nome da Conta',
    'LBL_LIST_CONTACT_NAME' => 'Nome do Contato',
    'LBL_LIST_CONTACT_ROLE' => 'Função',
    'LBL_LIST_EMAIL_ADDRESS' => 'Email',
    'LBL_LIST_FIRST_NAME' => 'Nome',
    'LBL_LIST_FORM_TITLE' => 'Lista de Contatos',
    'LBL_VIEW_FORM_TITLE' => 'Exibir Contato',
    'LBL_LIST_LAST_NAME' => 'Sobrenome',
    'LBL_LIST_NAME' => 'Nome',
    'LBL_LIST_OTHER_EMAIL_ADDRESS' => 'Outro Email',
    'LBL_LIST_PHONE' => 'Telefone Comercial',
    'LBL_LIST_TITLE' => 'Cargo',
    'LBL_MOBILE_PHONE' => 'Celular:',
    'LBL_MODIFIED' => 'Modificado Por:',
    'LBL_MODULE_NAME' => 'Contatos',
    'LBL_MODULE_TITLE' => 'Contatos: Início',
    'LBL_NAME' => 'Nome:',
    'LBL_NEW_FORM_TITLE' => 'Novo Contato',
    'LBL_NEW_PORTAL_PASSWORD' => 'Nova Senha do Portal:',
    'LBL_NOTE_SUBJECT' => 'Assunto da Nota',
    'LBL_OFFICE_PHONE' => 'Telefone Comercial:',
    'LBL_OPP_NAME' => 'Nome da Oportunidade:',
    'LBL_OPPORTUNITY_ROLE_ID' => 'ID da Função da Oportunidade:',
    'LBL_OPPORTUNITY_ROLE' => 'Função da Oportunidade',
    'LBL_OTHER_EMAIL_ADDRESS' => 'Outro Email:',
    'LBL_OTHER_PHONE' => 'Outro Telefone:',
    'LBL_PHONE' => 'Telefone:',
    'LBL_PORTAL_ACTIVE' => 'Portal Ativo:',
    'LBL_PORTAL_APP' => 'Aplicação do Portal:',
    'LBL_PORTAL_INFORMATION' => 'Informações do Portal',
    'LBL_PORTAL_NAME' => 'Nome do Portal:',
    'LBL_PORTAL_PASSWORD_ISSET' => 'Senha do Portal está Definida:',
    'LBL_STREET' => 'Rua',
    'LBL_POSTAL_CODE' => 'CEP:',
    'LBL_PRIMARY_ADDRESS_CITY' => 'Principal - Cidade:',
    'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Principal - Paí­s:',
    'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Principal - CEP:',
    'LBL_PRIMARY_ADDRESS_STATE' => 'Principal - Estado:',
    'LBL_PRIMARY_ADDRESS_STREET_2' => 'Principal - Rua 2:',
    'LBL_PRIMARY_ADDRESS_STREET_3' => 'Principal - Rua 3:',
    'LBL_PRIMARY_ADDRESS_STREET' => 'Principal - Rua:',
    'LBL_PRIMARY_ADDRESS' => 'Endereço Principal:',
    'LBL_PRODUCTS_TITLE' => 'Produtos',
    'LBL_RELATED_CONTACTS_TITLE' => 'Contatos Relacionados',
    'LBL_REPORTS_TO_ID' => 'Reporta ao ID:',
    'LBL_REPORTS_TO' => 'Reporta a:',
    'LBL_RESOURCE_NAME' => 'Nome de Recurso',
    'LBL_SALUTATION' => 'Saudação:',
    'LBL_SAVE_CONTACT' => 'Salvar Contato',
    'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Contatos',
    'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'Selecionar Contatos Marcados',
    'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'Selecionar Contatos Marcados',
    'LBL_STATE' => 'Estado:',
    'LBL_SYNC_CONTACT' => 'Sincronizar com Outlook&reg;:',
    'LBL_PROSPECT_LIST' => 'Lista de Prospects',
    'LBL_TITLE' => 'Cargo:',
    'LNK_CONTACT_LIST' => 'Exibir Contatos',
    'LNK_IMPORT_VCARD' => 'Criar Contato com um vCard',
    'LNK_NEW_ACCOUNT' => 'Criar Conta',
    'LNK_NEW_APPOINTMENT' => 'Criar Compromisso',
    'LNK_NEW_CALL' => 'Registrar Ligação',
    'LNK_NEW_CASE' => 'Criar Ocorrência',
    'LNK_NEW_CONTACT' => 'Criar Contato',
    'LNK_NEW_EMAIL' => 'Arquivar Email',
    'LNK_NEW_MEETING' => 'Agendar Reunião',
    'LNK_NEW_NOTE' => 'Criar Nota',
    'LNK_NEW_OPPORTUNITY' => 'Criar Oportunidade',
    'LNK_NEW_TASK' => 'Criar Tarefa',
    'LNK_SELECT_ACCOUNT' => "Selecionar Conta",
    'MSG_DUPLICATE' => 'O registro de contato que está sendo criado pode estar em duplicidade com um registro de contato que já existe. Os Contatos com nomes parecidos estão listado abaixo. <br>Clique em Criar Contato para continuar a criar este novo contato, ou selecione um contato existente da lista abaixo.',
    'MSG_SHOW_DUPLICATES' => 'O registro de contato que está sendo criado pode estar em duplicidade com um registro de contato que já existe. Os Contatos com nomes parecidos estão listado abaixo. <br>Clique em Salvar para continuar a criar este novo contato, ou clique em Cancelar para retornar ao módulo sem criar o contato.',
    'NTC_COPY_ALTERNATE_ADDRESS' => 'Copia endereço alternativo para o endereço principal',
    'NTC_COPY_PRIMARY_ADDRESS' => 'Copiar o endereço principal para o endereço alternativo',
    'NTC_DELETE_CONFIRMATION' => 'Tem certeza que deseja excluir este registro?',
    'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Criar uma Oportunidade requer uma Conta.\n Por favor, cria uma nova conta ou selecione uma existente.',
    'NTC_REMOVE_CONFIRMATION' => 'Tem a certeza que deseja remover este contato da ocorrência?',
    'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Tem certeza que deseja remover este registro como um colaborador direto?',

    'LBL_USER_PASSWORD' => 'Senha:',

    'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
    'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Oportunidades',
    'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documentos',
    'LBL_COPY_ADDRESS_CHECKED_PRIMARY' => 'Copiar para a Endereço Principal',
    'LBL_COPY_ADDRESS_CHECKED_ALT' => 'Copiar para Outro Endereço',

    'LBL_CASES_SUBPANEL_TITLE' => 'Ocorrências',
    'LBL_BUGS_SUBPANEL_TITLE' => 'Bugs',
    'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projetos',
    'LBL_PROJECTS_RESOURCES' => 'Recursos do Projeto',
    'LBL_TARGET_OF_CAMPAIGNS' => 'Campanhas (Alvo de) :',
    'LBL_CAMPAIGNS' => 'Campanhas',
    'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Campanhas',
    'LBL_LIST_CITY' => 'Cidade',
    'LBL_LIST_STATE' => 'Estado',
    'LBL_HOMEPAGE_TITLE' => 'Meus Contatos',
    'LBL_OPPORTUNITIES' => 'Oportunidades',

    'LBL_CHECKOUT_DATE' => 'Data do Checkout',
    'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contatos',
    'LBL_PROJECT_SUBPANEL_TITLE' => 'Projetos',
    'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Campanhas',
    'LNK_IMPORT_CONTACTS' => 'Importar Contatos',

    //For export labels
    'LBL_PHONE_HOME' => 'Telefone Residencial',
    'LBL_PHONE_MOBILE' => 'Celular',
    'LBL_PHONE_WORK' => 'Telefone Comercial',
    'LBL_PHONE_OTHER' => 'Outro Telefone',
    'LBL_PHONE_FAX' => 'Fax',

    'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Nome de Usuário Atribuído',
    'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID Usuário Atribuído',
    'LBL_EXPORT_MODIFIED_USER_ID' => 'Modificado Pelo ID',
    'LBL_EXPORT_CREATED_BY' => 'Criado Pelo ID',
    'LBL_EXPORT_PHONE_HOME' => 'Telefone Residencial',
    'LBL_EXPORT_PHONE_MOBILE' => 'Telefone Celular',
    // SNIP
    'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Emails de Contatos Relacionados',
    'LBL_USER_SYNC' => 'Sincronizar Usuário',

    'LBL_FP_EVENTS_CONTACTS_FROM_FP_EVENTS_TITLE' => 'Eventos',
    'LBL_FP_EVENT_DELEGATES_CONTACTS_1_FROM_FP_EVENT_DELEGATES_TITLE' => 'Delegações',

    'LBL_AOP_CASE_UPDATES' => 'Atualizações da Ocorrência',
    'LBL_CREATE_PORTAL_USER' => 'Criar Usuário do Portal',
    'LBL_ENABLE_PORTAL_USER' => 'Ativar Usuário do Portal',
    'LBL_DISABLE_PORTAL_USER' => 'Desativar Usuário do Portal',
    'LBL_CREATE_PORTAL_USER_FAILED' => 'Falha ao criar o usuário do portal',
    'LBL_ENABLE_PORTAL_USER_FAILED' => 'Falha ao ativar o usuário do portal',
    'LBL_DISABLE_PORTAL_USER_FAILED' => 'Falha ao desativar o usuário do portal',
    'LBL_CREATE_PORTAL_USER_SUCCESS' => 'Usuário do portal criado',
    'LBL_ENABLE_PORTAL_USER_SUCCESS' => 'Usuário do portal ativado',
    'LBL_DISABLE_PORTAL_USER_SUCCESS' => 'Usuário do portal desativado',
    'LBL_NO_JOOMLA_URL' => 'URL do portal não foi informada',
    'LBL_PORTAL_USER_TYPE' => 'Tipo de Usuário do Portal',
    'LBL_PORTAL_ACCOUNT_DISABLED' => 'Conta Desativada',
);

?>

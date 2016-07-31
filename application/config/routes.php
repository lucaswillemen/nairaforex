<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = "login";
$route['404_override'] = '';

$route['patrocinador/(:any)'] = 'cadastrar/p/$1';
$route['redirecionar/(:num)'] = 'conta/redirecionar/$1';
$route['cotas'] = 'conta/cotas';
$route['cotas/comprar'] = 'conta/comprar_cotas';
$route['faturas'] = 'conta/faturas';
$route['faturas/pagar/(:num)'] = 'conta/pagar_fatura/$1';
$route['faturas/cancelar/(:num)'] = 'conta/cancelar_fatura/$1';
$route['extrato'] = 'conta/extrato';
$route['transferir'] = 'conta/transferir';
$route['pagar/saldo'] = 'conta/pagar_saldo';
$route['comprovante'] = 'conta/comprovante';
$route['saque'] = 'conta/saque';
$route['saque/solicitar'] = 'conta/solicitar_saque';
$route['usuario/configuracoes'] = 'conta/configuracoes';
$route['usuario/logout'] = 'conta/sair';
$route['indicados'] = 'conta/indicados';
$route['tickets'] = 'conta/tickets';
$route['tickets/novo'] = 'conta/novo_ticket';
$route['tickets/visualizar/(:num)'] = 'conta/visualizar_ticket/$1';

/* * **** ADMINISTRADOR ***** */
$route['ctadmin/pacotes/novo'] = 'ctadmin/novo_pacotes';
$route['ctadmin/pacotes/editar/(:num)'] = 'ctadmin/editar_pacote/$1';
$route['ctadmin/usuarios/visualizar/(:num)'] = 'ctadmin/visualizar_usuario/$1';
$route['ctadmin/usuarios/editar/(:num)'] = 'ctadmin/editar_usuario/$1';
$route['ctadmin/usuarios/excluir/(:num)'] = 'ctadmin/excluir_usuario/$1';
$route['ctadmin/faturas/liberar/(:num)'] = 'ctadmin/liberar_fatura/$1';
$route['ctadmin/saques/visualizar/(:num)'] = 'ctadmin/visualizar_saque/$1';
$route['ctadmin/saques/pago/(:num)'] = 'ctadmin/pagar_saque/$1';
$route['ctadmin/saques/estornar/(:num)'] = 'ctadmin/estornar_saque/$1';
$route['ctadmin/anuncios/visualizar/(:num)'] = 'ctadmin/visualizar_anuncio/$1';
$route['ctadmin/anuncios/desativar/(:num)'] = 'ctadmin/desativar_anuncio/$1';
$route['ctadmin/anuncios/excluir/(:num)'] = 'ctadmin/excluir_anuncio/$1';
$route['ctadmin/anuncios/aprovar/(:num)'] = 'ctadmin/aprovar_anuncio/$1';
$route['ctadmin/tickets/visualizar/(:num)'] = 'ctadmin/visualizar_ticket/$1';
$route['ctadmin/tickets/fechar/(:num)'] = 'ctadmin/fechar_ticket/$1';
$route['ctadmin/tickets/reabrir/(:num)'] = 'ctadmin/reabrir_ticket/$1';
$route['ctadmin/users/novo'] = 'ctadmin/novo_user_admin';
$route['ctadmin/users/editar/(:num)'] = 'ctadmin/editar_user_admin/$1';
$route['ctadmin/users/excluir/(:num)'] = 'ctadmin/excluir_user_admin/$1';
$route['ctadmin/bancario/nova'] = 'ctadmin/nova_conta_bancaria';
$route['ctadmin/bancario/editar/(:num)'] = 'ctadmin/editar_conta_bancaria/$1';
$route['ctadmin/bancario/excluir/(:num)'] = 'ctadmin/excluir_conta_bancaria/$1';
$route['ctadmin/graduacoes'] = 'ctadmin/graduacoes';
$route['ctadmin/graduacao/nova'] = 'ctadmin/nova_graduacao';
$route['ctadmin/graduacao/editar/(:num)'] = 'ctadmin/editar_graduacao/$1';

/* inativo */
$route['inativo/faturas'] = 'inativo/index';
$route['inativo/faturas/pagar/(:num)'] = 'inativo/pagar_fatura/$1';
$route['inativo/faturas/cancelar/(:num)'] = 'inativo/cancelar_fatura/$1';
$route['inativo/comprovante'] = 'inativo/comprovante';
$route['inativo/usuario/configuracoes'] = 'inativo/configuracoes';
$route['inativo/usuario/logout'] = 'inativo/sair';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
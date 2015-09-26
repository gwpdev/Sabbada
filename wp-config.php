<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'guilh029_sabbada');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'guilh029_geerox');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'gui412289');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EX&uwOeC3[tIzg?E _7lO+h2Gx9coL-:+F%#5AS8/|wIOr*Ei[- HqXHp_%z:9BF');
define('SECURE_AUTH_KEY',  'xTX+AjSY}6uhCh;i ?oGr&d98Odxt6<~-u!|r. 9a13W_,8yJ~~w`T(tdR#^!aL&');
define('LOGGED_IN_KEY',    '+|O6O|([> 4~|EA@E8x0Od4Nh>j<Z;lxWfgs41r,o++!5) F?zA&BgKfOo!JC3,/');
define('NONCE_KEY',        'Yi6?M!xfn$wn3t0gC?JWS^uZ)iO8/1k6k_<Ny*,`O8tAItSut7hTH+;?-%-+OcU/');
define('AUTH_SALT',        '2WJ1UAx)L |).kIS-+HFW;HZ/-55OFL;.40S+C;2 $3=]5*KJqF1`qmgL_-E)L(n');
define('SECURE_AUTH_SALT', 'qk+5&%,}?p5C({_-S?Xkq]!|>F<_OjU.XJ?cq+-Y1^9iY}6:[q&0n$k)tLu/Ww{/');
define('LOGGED_IN_SALT',   'X./9aM:=:{v#`l&#wy/8oTje+,9!HF&{<(XKOv<=j%%zmESK=@kqhi!K&Xtnt+MD');
define('NONCE_SALT',       'FEibjS*PX?XKi;Rc|5w51y8BY~Gy|d c/OY0sOvh[C=Dlsu#Lz-SvX{J<5XSV4mW');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');

<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'wp_blog');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'wangsong4293346');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|0OL*zoNOSqz{Y^*o;qwN{y{0q^4bSZCkhLWQ4%:^>v|]9+/xDrtA%n~N-+zRm|a');
define('SECURE_AUTH_KEY',  '|`Za!S7Wp=Fc4}zPdX:0@0@]6%gN+-/$Z|>t_&=d^t{m@&]2v]i[|H>#-(]ojs|R');
define('LOGGED_IN_KEY',    ' =,}*n$*aik%Ha}T9AE-/*.&ae~o_bY>(~7-iCWXB:Wx?u)Vn&Rh6b3-j2&VYz.d');
define('NONCE_KEY',        'OQ 3kA-07b|s.A7+qg @ZDk*uN)20++ZT#O:Y3.jR8%$:xR3f9f^WcK{0F9)1==[');
define('AUTH_SALT',        '>XoqmAz{AeG@MEPt8p*3s.k-{9bC%u02aV0g+lyH.V,]RQ1Q92-J0t0sGPZ]-&*k');
define('SECURE_AUTH_SALT', 'tFMOY{yj68,z53|{S9Ht#3:[w(xyCs[_t$NhXmqb|0U,R~5!>iy.rra6YWb+OS^[');
define('LOGGED_IN_SALT',   'yH^A% /FIh=t|=A.`7 !mmhc|i,#a15o-}Uxo6m]V~?:y!V0b8==:zelL6v9Ccg*');
define('NONCE_SALT',       'o|N7piOsdWp!?{LP51Rx+_`?X-<$)kK&W0CzsJE%B-a_h4Nx8./0]HN%_>^P&I@f');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wpb_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');

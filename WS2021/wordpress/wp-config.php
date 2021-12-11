<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'ws-wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '123' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Z%1/r$1iv^K_CfH<t!O?YLk,;Ug$23oqfVG]j8v?Q|y]h/!{:3HTi[a4xXLXm]g%' );
define( 'SECURE_AUTH_KEY',  'Cq]9]>}eLW<$?+j]/q,n!ke:k>gBY9LR<]mk;R9yojf03K%GK_{Y1G&3Wd}}O&~o' );
define( 'LOGGED_IN_KEY',    '(-e.@=/~J??:}s3LBq/8T5lo~QC2St^%^$YZLM1lQ&b`I6V ]TW^r3dIsoJP3bgq' );
define( 'NONCE_KEY',        '/*?;)8y-{A.a1M]QrcW3At#9Hw>?RzA~OGhzMGSnBkk[y<;TQZS?hJwlEZ&5P4WA' );
define( 'AUTH_SALT',        'jP11!2axd_;7?z(A|{Jc4s1Eo>1M}bg5@hito)7Ws!z-maS|HbB[2vrG!,AV9OhF' );
define( 'SECURE_AUTH_SALT', '/s3ZN8XoD5zdUtLpY|f%xSY~_n@JyZQxj1j<[IbLPe`}r4>juh@>K+gE5jKEHGW4' );
define( 'LOGGED_IN_SALT',   'a @n9m9kMfh:Y5N@,)d*n*$]C7S79T98[{<B>jMM:=!l>R9@mLavg1UxW.^IM` c' );
define( 'NONCE_SALT',       'SXB1A2]Er!.>les!GLgW{Kk^b5:p}@UsSEcY.Wiy4p?%z0DZ- xST o3@94st,/s' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */

define('FS_METHOD','direct');


/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

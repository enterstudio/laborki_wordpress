<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawień MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy i ABSPATH. Więcej informacji
 * znajduje się na stronie
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a możesz zdobyć
 * od administratora Twojego serwera.
 *
 * Ten plik jest używany przez skrypt automatycznie tworzący plik
 * wp-config.php podczas instalacji. Nie musisz korzystać z tego
 * skryptu, możesz po prostu skopiować ten plik, nazwać go
 * "wp-config.php" i wprowadzić do niego odpowiednie wartości.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', 'laborki_wordpress');

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', 'sebastian');

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', 'sebastian');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', 'localhost');

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'X9Kj`u.&R^oIrEj56&qI9-EIh>xHuxS ;m$Jr|%.%!9vWd@?sRP6;|#@)/}drag+');
define('SECURE_AUTH_KEY',  'P-))E?3<[HGpy(P-<cP}bBP7<El;9~Aqpu)`)=t_#bl}+E%5}Y Eo5EDhsj[bSj&');
define('LOGGED_IN_KEY',    'VbFwPKz~/|M|h[3&@+R1|8q(Vf!ZA[6wH.9xWp7S.:@+ eu]Qe! EJxC/t>zz$T-');
define('NONCE_KEY',        '&jM|:2f+]c(}p[;5@=/b=|GB$BBi-t|b`*PG`](4H9HqQG>8%u q`DZIh2#~uA9p');
define('AUTH_SALT',        '/EVn]!-{@~FTzTS76PA(+5SF|U8$-TKu4_AktXW+~}?jTjkHWtNR4D#Q^8^>4k)N');
define('SECURE_AUTH_SALT', '^wrmoy: ztRVkA3K<#t|IKs~J#lffVJq]}dp:b1(.H_w-mGj|TqajAf4bL#cy.H~');
define('LOGGED_IN_SALT',   '+fei+3xS!:-Uf,yh;Hi!t|41h*Wt4Beym:>||U.^-ny#G-4E5}sh*Wfj2[4FHN%^');
define('NONCE_SALT',       '*|t>[diM5jxjjjAmo-E`O$)vmev0SHrdPivfy[J:w,LPcYMPV2XHoWcEP4~+P-gW');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix  = 'laborki_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie ostrzeżeń
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
define('WP_DEBUG', false);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');

<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'rush_wp' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',#LqH^z{>n=F#P<v4BNl`{3P4dL?JOJVJ%#-nSx7*N(J`F 6b<{)Q8L*Oi9k]ZKQ' );
define( 'SECURE_AUTH_KEY',  '_N&#yR&Tnl*LV;aPrB<_]^V^R0dBMn)fdEI6T?F ;yMjlUoVOXa.g`b%kJgM8/e9' );
define( 'LOGGED_IN_KEY',    '`-fB=eLp-oMHCQY|t Zm2z]C5!njiA%?n(gQ<$4}ZF=I3<ck%(on<o )dND9UIbh' );
define( 'NONCE_KEY',        '-4fjN/SHB3yg7A.dh*m!2+X:d]E@hd%ZmiLMT*`]ylvN`_)(#qD_y ITAmxC]^Uz' );
define( 'AUTH_SALT',        'I%_uk>mwFSz4jEY7[UEd`1Hv5%.rK?T7EM^]T}gCLb0WY!?,l <Pn<2J/jKicQQU' );
define( 'SECURE_AUTH_SALT', '9j[][f7)r` $1Tw2P]/(;h&rEV/{TxBf4:O$694vPg0l.oW>xBY>9PIkOM]T;.uA' );
define( 'LOGGED_IN_SALT',   'cyM]{e>EJMfz%X84R( _<TN03I;d5jL3h@Nk=[np7{3+%yEIE`q<o{<Q{oxD!gk?' );
define( 'NONCE_SALT',       'mhg2`7O+rYA,#!g2hXu/|,cE)TA}ny,d/fNg!_0Va)URy;ecj5A#$JO!h?GOz@)j' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'roj46a_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

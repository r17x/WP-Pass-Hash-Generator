<?php 

    function wp_hash_password($pwd){
        require_once('src/class-phpass.php');
        $wp_hasher = new PasswordHash(8, true);
        return $wp_hasher->HashPassword( trim($pwd) );
    }

function helpme() {
    return "php index.php -p <mysecretpass>\n\n[DESCRIPTION]\n  -p <password>\n  -h this help\n\n";
}

    $args = getopt("p:h:");
    
if ( count($args) <=0 ||
     isset($args['h'])){
        echo helpme();
        exit();
    }
    
    echo "Your Password Input: '". $args['p'] . "'\nYour Hash Password: ". wp_hash_password($args['p']).PHP_EOL;


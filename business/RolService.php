<?php 
// business/RolService.php

namespace business;

class RolService {
    public static function getPermissions() {
        return [
            // 2 = admin
            2 => ['/pizzeria/', '/pizzeria/adminpage.php', '/pizzeria/bestellingsoverzicht.php', '/pizzeria/logout.php', '/pizzeria/login.php', '/pizzeria/index.php'],
            // 1 is customer
            1 => ['/pizzeria/', '/pizzeria/bestellingsoverzicht.php', '/pizzeria/logout.php', '/pizzeria/login.php', '/pizzeria/index.php'],
        ];
    }
}
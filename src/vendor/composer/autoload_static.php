<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e0cace9835689a825fc02759e8ac1eb
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '0d59ee240a4cd96ddbb4ff164fccea4d' => __DIR__ . '/..' . '/symfony/polyfill-php73/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php73\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Contracts\\Translation\\' => 30,
            'Symfony\\Contracts\\Service\\' => 26,
            'Symfony\\Component\\Yaml\\' => 23,
            'Symfony\\Component\\Validator\\' => 28,
            'Symfony\\Component\\Translation\\' => 30,
            'Symfony\\Component\\Finder\\' => 25,
            'Symfony\\Component\\Filesystem\\' => 29,
            'Symfony\\Component\\Console\\' => 26,
            'Symfony\\Component\\Config\\' => 25,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Container\\' => 14,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'C' => 
        array (
            'Carbon\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Php73\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php73',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Contracts\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation-contracts',
        ),
        'Symfony\\Contracts\\Service\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/service-contracts',
        ),
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Symfony\\Component\\Validator\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/validator',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Symfony\\Component\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/filesystem',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Symfony\\Component\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/config',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
        'P' => 
        array (
            'Propel' => 
            array (
                0 => __DIR__ . '/..' . '/propel/propel/src',
            ),
        ),
    );

    public static $classMap = array (
        'Agendas' => __DIR__ . '/../..' . '/classes/Agendas.php',
        'AgendasQuery' => __DIR__ . '/../..' . '/classes/AgendasQuery.php',
        'Base\\Agendas' => __DIR__ . '/../..' . '/classes/Base/Agendas.php',
        'Base\\AgendasQuery' => __DIR__ . '/../..' . '/classes/Base/AgendasQuery.php',
        'Base\\Cidades' => __DIR__ . '/../..' . '/classes/Base/Cidades.php',
        'Base\\CidadesQuery' => __DIR__ . '/../..' . '/classes/Base/CidadesQuery.php',
        'Base\\DiasDisponiveis' => __DIR__ . '/../..' . '/classes/Base/DiasDisponiveis.php',
        'Base\\DiasDisponiveisQuery' => __DIR__ . '/../..' . '/classes/Base/DiasDisponiveisQuery.php',
        'Base\\DiasIndisponiveis' => __DIR__ . '/../..' . '/classes/Base/DiasIndisponiveis.php',
        'Base\\DiasIndisponiveisQuery' => __DIR__ . '/../..' . '/classes/Base/DiasIndisponiveisQuery.php',
        'Base\\Feriados' => __DIR__ . '/../..' . '/classes/Base/Feriados.php',
        'Base\\FeriadosQuery' => __DIR__ . '/../..' . '/classes/Base/FeriadosQuery.php',
        'Base\\Juizes' => __DIR__ . '/../..' . '/classes/Base/Juizes.php',
        'Base\\JuizesQuery' => __DIR__ . '/../..' . '/classes/Base/JuizesQuery.php',
        'Base\\Plantoes' => __DIR__ . '/../..' . '/classes/Base/Plantoes.php',
        'Base\\PlantoesJuizes' => __DIR__ . '/../..' . '/classes/Base/PlantoesJuizes.php',
        'Base\\PlantoesJuizesQuery' => __DIR__ . '/../..' . '/classes/Base/PlantoesJuizesQuery.php',
        'Base\\PlantoesQuery' => __DIR__ . '/../..' . '/classes/Base/PlantoesQuery.php',
        'Base\\Usuarios' => __DIR__ . '/../..' . '/classes/Base/Usuarios.php',
        'Base\\UsuariosQuery' => __DIR__ . '/../..' . '/classes/Base/UsuariosQuery.php',
        'Cidades' => __DIR__ . '/../..' . '/classes/Cidades.php',
        'CidadesQuery' => __DIR__ . '/../..' . '/classes/CidadesQuery.php',
        'Controller\\Agenda' => __DIR__ . '/../..' . '/classes/Controller/Agenda.php',
        'Controller\\DistribuicaoAutomatica' => __DIR__ . '/../..' . '/classes/Controller/DistribuicaoAutomatica.php',
        'Controller\\Login' => __DIR__ . '/../..' . '/classes/Controller/Login.php',
        'Controller\\User' => __DIR__ . '/../..' . '/classes/Controller/User.php',
        'DiasDisponiveis' => __DIR__ . '/../..' . '/classes/DiasDisponiveis.php',
        'DiasDisponiveisQuery' => __DIR__ . '/../..' . '/classes/DiasDisponiveisQuery.php',
        'DiasIndisponiveis' => __DIR__ . '/../..' . '/classes/DiasIndisponiveis.php',
        'DiasIndisponiveisQuery' => __DIR__ . '/../..' . '/classes/DiasIndisponiveisQuery.php',
        'Feriados' => __DIR__ . '/../..' . '/classes/Feriados.php',
        'FeriadosQuery' => __DIR__ . '/../..' . '/classes/FeriadosQuery.php',
        'JsonException' => __DIR__ . '/..' . '/symfony/polyfill-php73/Resources/stubs/JsonException.php',
        'Juizes' => __DIR__ . '/../..' . '/classes/Juizes.php',
        'JuizesQuery' => __DIR__ . '/../..' . '/classes/JuizesQuery.php',
        'Map\\AgendasTableMap' => __DIR__ . '/../..' . '/classes/Map/AgendasTableMap.php',
        'Map\\CidadesTableMap' => __DIR__ . '/../..' . '/classes/Map/CidadesTableMap.php',
        'Map\\DiasDisponiveisTableMap' => __DIR__ . '/../..' . '/classes/Map/DiasDisponiveisTableMap.php',
        'Map\\DiasIndisponiveisTableMap' => __DIR__ . '/../..' . '/classes/Map/DiasIndisponiveisTableMap.php',
        'Map\\FeriadosTableMap' => __DIR__ . '/../..' . '/classes/Map/FeriadosTableMap.php',
        'Map\\JuizesTableMap' => __DIR__ . '/../..' . '/classes/Map/JuizesTableMap.php',
        'Map\\PlantoesJuizesTableMap' => __DIR__ . '/../..' . '/classes/Map/PlantoesJuizesTableMap.php',
        'Map\\PlantoesTableMap' => __DIR__ . '/../..' . '/classes/Map/PlantoesTableMap.php',
        'Map\\UsuariosTableMap' => __DIR__ . '/../..' . '/classes/Map/UsuariosTableMap.php',
        'Plantoes' => __DIR__ . '/../..' . '/classes/Plantoes.php',
        'PlantoesJuizes' => __DIR__ . '/../..' . '/classes/PlantoesJuizes.php',
        'PlantoesJuizesQuery' => __DIR__ . '/../..' . '/classes/PlantoesJuizesQuery.php',
        'PlantoesQuery' => __DIR__ . '/../..' . '/classes/PlantoesQuery.php',
        'Usuarios' => __DIR__ . '/../..' . '/classes/Usuarios.php',
        'UsuariosQuery' => __DIR__ . '/../..' . '/classes/UsuariosQuery.php',
        'View\\DelForm' => __DIR__ . '/../..' . '/classes/View/DelForm.php',
        'View\\LayoutPadrao' => __DIR__ . '/../..' . '/classes/View/LayoutPadrao.php',
        'View\\Login' => __DIR__ . '/../..' . '/classes/View/Login.php',
        'View\\Tabela' => __DIR__ . '/../..' . '/classes/View/Tabela.php',
        'View\\TabelaAgenda' => __DIR__ . '/../..' . '/classes/View/TabelaAgenda.php',
        'View\\UserForm' => __DIR__ . '/../..' . '/classes/View/UserForm.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e0cace9835689a825fc02759e8ac1eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e0cace9835689a825fc02759e8ac1eb::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit3e0cace9835689a825fc02759e8ac1eb::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit3e0cace9835689a825fc02759e8ac1eb::$classMap;

        }, null, ClassLoader::class);
    }
}

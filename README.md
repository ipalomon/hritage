# hritage
El proyecto no está terminado. Se ha hecho actualizar estados de un arbol familiar cuando el progenitor muere siguiendo las indicaciones del ejercicio. Pero sólo para dinero, el tema de tierras e inmuebles está en TODO. Para hacer los test he usado phpUnit con la configuración de PhpStorm. los test estan en app/tests o bien:

C:\ruta_al_php\php.exe C:/ruta_al_server/heritage/vendor/phpunit/phpunit/phpunit --no-configuration --filter "/(App\\tests\\HeritageEntitiesTest::testCreateMembersOfFamilyTree)( .*)?$/" --test-suffix HeritageEntitiesTest.php C:\wamp64\www\heritage\app\tests --teamcity --cache-result-file=C:\wamp64\www\heritage\.phpunit.result.cache

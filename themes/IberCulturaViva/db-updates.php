<?php
$app = MapasCulturais\App::i();
$em = $app->em;
$conn = $em->getConnection();

return [
    'update registrations set category = owner.pais' => function() use($conn){
        $sql = "UPDATE registration r SET category = (
                    SELECT m.value
                    FROM agent a
                        JOIN agent_meta m ON
                            a.id = m.object_id AND
                            m.key = 'En_Pais'
                    WHERE a.id = r.agent_id
                ) WHERE r.opportunity_id = 17";

        $conn->executeQuery($sql);

        $paises = array(
            'AD' => 'Andorra',
            'AR' => 'Argentina',
            'BO' => 'Bolivia',
            'BR' => 'Brasil',
            'CL' => 'Chile',
            'CO' => 'Colombia',
            'CR' => 'Costa Rica',
            'CU' => 'Cuba',
            'EC' => 'Ecuador',
            'SV' => 'El Salvador',
            'ES' => 'España',
            'GT' => 'Guatemala',
            'HN' => 'Honduras',
            'MX' => 'México',
            'NI' => 'Nicarágua',
            'PA' => 'Panamá',
            'PY' => 'Paraguay',
            'PE' => 'Perú',
            'PT' => 'Portugal',
            'DO' => 'República Dominicana',
            'UY' => 'Uruguay',
            'VE' => 'Venezuela',
        );

        foreach($paises as $sigla => $pais){
            $conn->executeQuery("UPDATE registration SET category = '$pais' WHERE category = '$sigla' AND opportunity_id = 17");
        }

        $paises = '["Andorra","Argentina","Bolivia","Chile","Colombia","Costa Rica","Cuba","Ecuador","El Salvador","Espa\u00f1a","Guatemala","Honduras","M\u00e9xico","Nicar\u00e1gua","Panam\u00e1","Paraguay","Per\u00fa","Portugal","Rep\u00fablica Dominicana","Uruguay"]';
        $conn->executeQuery("UPDATE opportunity SET registration_categories = '$paises' WHERE id = 17");
        $conn->executeQuery("UPDATE opportunity_meta SET value = 'País' WHERE object_id = 17 AND key = 'registrationCategTitle'");
        $conn->executeQuery("UPDATE opportunity_meta SET value = 'Seleccione un país' WHERE object_id = 17 AND key = 'registrationCategDescription'");

        return false;
    },
    "apply default activity to agents" => function () use ($app, $conn) {
        $ids = $conn->executeQuery("SELECT id FROM agent WHERE id NOT IN (
            SELECT a.id FROM agent a
                JOIN term_relation tr ON a.id=tr.object_id AND tr.object_type='MapasCulturais\\Entities\\Agent'
                JOIN term t ON tr.term_id=t.id AND t.taxonomy='area')")->fetchAll();
        foreach ($ids as $id) {
            $entity = $app->repo("Agent")->find($id);
            $terms = $entity->terms ?? [];
            $terms["area"] = [$app->config["app.defaultActivity"]];
            $entity->save(true);
            $app->em->clear();
        }
        return true;
    },
    "apply default activity to spaces" => function () use ($app, $conn) {
        $ids = $conn->executeQuery("SELECT id FROM space WHERE id NOT IN (
            SELECT s.id FROM space s
                JOIN term_relation tr ON s.id=tr.object_id AND tr.object_type='MapasCulturais\\Entities\\Space'
                JOIN term t ON tr.term_id=t.id AND t.taxonomy='area')")->fetchAll();
        foreach ($ids as $id) {
            $entity = $app->repo("Space")->find($id);
            $terms = $entity->terms ?? [];
            $terms["area"] = [$app->config["app.defaultActivity"]];
            $entity->save(true);
            $app->em->clear();
        }
        return true;
    },
];

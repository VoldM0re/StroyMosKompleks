<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
function listServices($title, $caregory)
{ ?>
    <h2><?= $title ?></h2>
    <div class='services_cards'>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM `services` WHERE `category` = :category;");
        $stmt->execute([':category' => $caregory]);
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($services):
            foreach ($services as $service):
                $price_units = match ($service['price_units']) {
                    'noUnits' => '',
                    'm2' => '/м²',
                    'pog_m' => '/пог. м',
                    default => ''
                }; ?>
                <div class='service_card'>
                    <img class='service-img' src='/assets/uploads/services_images/<?= $service['image_url'] ?>' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <h3 class='service_title'><?= $service['name'] ?></h3>
                        <p class='service_description'><?= $service['short_description'] ?></p>
                        <?php if ($service['price'] != null): ?>
                            <p class='service_price'>от <?= $service['price'] ?> ₽<?= $price_units ?> </p>
                        <?php else: ?>
                            <p class='service_price'>Цена договорная</p>
                        <?php endif; ?>
                    </div>
                    <a href='/service_page.php' class='action_button actbtn-o'>Подробнее</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h3>Услуг в этой категории пока нет</h3>
        <?php endif; ?>
    </div>
<?php } ?>
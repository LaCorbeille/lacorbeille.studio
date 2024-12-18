<div class="gameCard">
    <div class="contentWrapperInfo" style="display:none;">
        <a class="title"><?php echo htmlspecialchars($title); ?></a>
        <a class="description"><?php echo htmlspecialchars($description); ?></a>
        <a class="tags"><?php echo htmlspecialchars(implode(',', $gameTags)); ?></a>
        <a class="avaiblePlatforms"><?php echo htmlspecialchars(implode( ',', $platforms)); ?></a>
        <a class="action"><?php echo htmlspecialchars($action); ?></a>
        <a class="unavaible"><?php echo htmlspecialchars($unavailable); ?></a>
        <a class="actionLink"><?php echo htmlspecialchars($actionLink); ?></a>
    </div>
    <div class="foreground">
        <?php
        $foregroundImage = "assets/img/gameCards/{$title}_Foreground.svg";
        if (!file_exists($foregroundImage)) {
            $foregroundImage = "assets/img/gameCards/Default_Foreground.svg";
        }
        echo file_get_contents($foregroundImage);
        ?>

        <h2 class="gameTitle"><?php echo $title; ?></h2>
        <div class="platforms">
            <?php foreach ($platforms as $platform): ?>
                <?php if (!empty($platform)): ?>
                    <img src="assets/img/icons/platforms/<?php echo $platform; ?>.svg" alt="<?php echo $platform; ?>"/>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if (!empty($cover)): ?>
        <img class="cover" src="assets/img/games/<?php echo $cover; ?>" alt="<?php echo $title; ?>" />
    <?php endif; ?>
</div>
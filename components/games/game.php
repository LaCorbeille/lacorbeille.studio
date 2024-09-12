<div class="game" onclick="window.location.href='<?php echo $target; ?>'">
    <div class="status <?php echo $status; ?>"><?php echo $status; ?></div>
    <div class="platforms">
        <img src="assets/img/icons/platforms/Windows.svg" alt="Windows"
            style="<?php echo in_array('Windows', $platforms) ? '' : 'display:none;'; ?>">
        <img src="assets/img/icons/platforms/Linux.svg" alt="Linux"
            style="<?php echo in_array('Linux', $platforms) ? '' : 'display:none;'; ?>">
        <img src="assets/img/icons/platforms/Switch.svg" alt="Switch"
            style="<?php echo in_array('Switch', $platforms) ? '' : 'display:none;'; ?>">
        <img src="assets/img/icons/platforms/XBox.svg" alt="XBox"
            style="<?php echo in_array('XBox', $platforms) ? '' : 'display:none;'; ?>">
        <img src="assets/img/icons/platforms/PlayStation.svg" alt="PlayStation"
            style="<?php echo in_array('PlayStation', $platforms) ? '' : 'display:none;'; ?>">
    </div>
    <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
</div>
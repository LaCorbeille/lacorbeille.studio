<footer>
    <div id="footerTop">
        <div id="socialWrap">
            <a href="https://www.linkedin.com/company/lacorbeille-studio" target="_blank"><img src="assets/img/social/LinkedIn.svg" alt="LinkedIn"></a>
            <a href="https://www.instagram.com/lacorbeille.studio" target="_blank"><img src="assets/img/social/Instagram.svg" alt="Instagram"></a>
            <a href="https://x.com/LaCorbeilleSTD" target="_blank"><img src="assets/img/social/X.svg" alt="X"></a>
            <a href="https://www.facebook.com/people/LaCorbeille-Studio/61565357266191/" target="_blank"><img src="assets/img/social/Facebook.svg" alt="Facebook"></a>
            <a href="https://discord.gg/hmPzS4k" target="_blank"><img src="assets/img/social/Discord.svg" alt="Discord"></a>
        </div>
        <img src="assets/img/branding/logoFullWhite.svg" alt="LaCorbeille STUDIO">
        <a id="copyright">© LaCorbeille STUDIO 2024</a>
    </div>
    <div id="footerBottom">
        <div>
            <a href="https://www.noasecond.com" target="_blank"><?php getValueFromJson('createdBy'); ?></a>
        </div>
        <div>
            <a href="legal.php#legalNotice"><?php getValueFromJson('legalNotice'); ?></a>
            <a>|</a>
            <a href="legal.php#privacyPolicy"><?php getValueFromJson('privacyPolicy'); ?></a>
            <a>|</a>
            <a href="sitemap.xml"><?php getValueFromJson('sitemap'); ?></a>
            <a>|</a>
            <a href="branding.zip"><?php getValueFromJson('branding'); ?></a>
        </div>
        <div>
            <button type="button" data-theme-toggle=""><img src="assets/img/icons/dark-mode.svg"></button>
            <select id="langSelect">
                <option value="en" <?php if ($_SESSION['lang'] == 'en') echo 'selected'; ?>>🇬🇧</option>
                <option value="fr" <?php if ($_SESSION['lang'] == 'fr') echo 'selected'; ?>>🇫🇷</option>
            </select>
        </div>
    </div>
</footer>
<?php

use YiiPress\Content\Model\Navigation;
use YiiPress\Render\NavigationRenderer;

/**
 * The footer of minimal with a credit line. Every other template, partial, translation and asset of this theme comes
 * from minimal (`fallback: minimal` in extension.yaml).
 *
 * @var ?Navigation $nav
 * @var string $rootPath
 * @var string $uiLanguage
 * @var Closure(string, int, ?string, bool): string $h
 * @var Closure(string): string $themeAsset
 */
$uiLanguage ??= 'en';
?>
<footer class="site-footer sample-footer">
    <div class="container">
<?php if ($nav !== null && $nav->menu('footer') !== []): ?>
        <?= NavigationRenderer::render($nav, 'footer', $rootPath, $uiLanguage, $uiLanguage) ?>
        <script>
            (function () {
                if (typeof window.__yiipressApplyMenuTranslations !== 'function') {
                    return;
                }

                window.__yiipressApplyMenuTranslations(document.currentScript.previousElementSibling);
            })();
        </script>
<?php endif; ?>
        <p class="sample-credit">Built with <a href="https://github.com/yiipress/engine">YiiPress</a> and the
            <a href="https://github.com/yiipress/theme-sample">sample theme</a>.</p>
    </div>
</footer>
<script src="<?= $h($themeAsset('dark-mode.js')) ?>"></script>

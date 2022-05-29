<?php
header('Content-type: application/xml; charset="ISO-8859-1"', true);
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url() ?></loc>
        <lastmod><?= date('Y-m-d H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url('pages/profile') ?></loc>
        <lastmod><?= date('Y-m-d H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url('pages/produk') ?></loc>
        <lastmod><?= date('Y-m-d H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url('pages/blog') ?></loc>
        <lastmod><?= date('Y-m-d H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url('pages/kontak') ?></loc>
        <lastmod><?= date('Y-m-d H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url('pages/testimoni') ?></loc>
        <lastmod><?= date('Y-m-d H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.1</priority>
    </url>
    <?php foreach ($produk as $item) { ?>
        <url>
            <loc><?= base_url('pages/produk_detail/' . $item['slug']) ?></loc>
            <lastmod><?= date('Y-m-d H:i:s', strtotime($item['created_at'])) ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>0.1</priority>
        </url>
    <?php } ?>
</urlset>